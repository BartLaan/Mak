<!DOCTYPE html>
<html>
<head>
    <title>Bestellingsoverzicht - Barry's Bakery</title>
    <link href="opmaakmenu.css" rel="stylesheet" type="text/css"/>
    <link href="opmaak.css" rel="stylesheet" type="text/css"/>
    <link href="klantenBeheren.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php include 'menu.php' ?>

<div id='page'>
<div id='text'>
<?php
    # Factuurnummer, datum, Klantnummer (met link naar klantGegevens.php?id=*klantnummer*), producten, verzendmethode, bedrag
    if (isset($_SESSION['Klant_ID'])) {
        if (!isset($_GET['pagina'])) {
            $pagina = 0;
        } else {
            $pagina = $_GET['pagina'] - 1;
        }
        echo '
            <h1>Bestellingsoverzicht</h1>
            <div align="center">
            <form action="'. $_SERVER['PHP_SELF'] .'" method="GET">
                <input type="text" name="zoek">
                <input type="submit" name="submit" value="Zoeken">
            </form>
            </div> <br />
            <table>
                <tr>
                    <th>Factuurnummer</th>
                    <th>Datum</th>                  
                    <th>Totaalprijs</th>
                </tr>
        ';
        # Check of gebruiker een zoekopdracht heeft gedaan en constructeer bijbehorende query
        if (isset($_GET['zoek']) && preg_match("/^[a-zA-Z0-9]*$/", $_GET['zoek'])) 
        {
            $zoek = $_GET['zoek'];
            $query = "SELECT Factuur_ID, Totaalprijs, Factuur_Datum FROM Factuur
                WHERE Factuur_ID LIKE '%". $zoek . "%' OR 
                OR Factuur_Datum LIKE '%". $zoek  ."%' OR Totaalprijs LIKE '%". $zoek  ."%' 
                ORDER BY Factuur_Datum DESC LIMIT 10 OFFSET ". ($pagina * 10);

        } elseif (isset($_GET['zoek']) && !preg_match("/^[a-zA-Z0-9]*$/", $_GET['zoek'])) {
            echo "<script>window.alert('Alleen letters en cijfers invoeren a.u.b.')</script>";
            $query = "SELECT Factuur_ID, Totaalprijs, Factuur_Datum FROM Factuur ORDER BY Factuur_Datum DESC LIMIT 10 OFFSET ". ($pagina * 10);
        } else {
            $query = "SELECT Factuur_ID, Totaalprijs, Factuur_Datum FROM Factuur WHERE Klant_ID = '".$_SESSION['Klant_ID']."' ORDER BY Factuur_Datum DESC LIMIT 10 OFFSET ". ($pagina * 10);
        }
        $stmt = $db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $factuur) {
            $factuurLink = "<a href='factuurGegevens.php?id=". $factuur['Factuur_ID'] ."'>";
            echo '<tr>
                <td>'. $factuurLink . $factuur['Factuur_ID'] .'</a></td>
                <td>'. $factuurLink . $factuur['Factuur_Datum'] .'</a></td>
                <td>'. $factuurLink .' &#128; '. $factuur['Totaalprijs'] .'</a></td>
                <td>'. $factuurLink .'<button>Details</button></a></td>
            </tr>
            ';
        }
        echo '</table><div align="center">';
        if ($pagina != 0) {
            echo '
                <br />
                <form action="'. $_SERVER['PHP_SELF'] .'" method="GET">
                    <input type="hidden" value="'. $pagina .'" name="pagina">
                    <input type="submit" name="submit" value="Vorige pagina">
                </form>
            ';
        }
            echo '
                <br />
                <form action="'. $_SERVER['PHP_SELF'] .'" method="GET">
                    <input type="hidden" value="'. ($pagina + 2) .'" name="pagina">
                    <input type="submit" name="submit" value="Volgende pagina">
                </form>
                </div>
            ';
        
    } else {
        echo "<p class='enter'> U bent niet ingelogd. </p>";
    }
?>
            
</div>
</div>
        <!-- include footer -->
        <?php include 'footer.php'; ?>
</body>
</html>