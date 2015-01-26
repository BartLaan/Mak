<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Mak - Wonkelwagen</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="css-button.css" type="text/css" />
    <link href="opmaakmenu.css" rel="stylesheet" type="text/css" />

    <style>

    h1 {
        text-align: center;
    }

    td
    {
        padding:10px;
        margin:5px;
    }

    tr:nth-child(even) 
    {
        background-color: #F9F9F9;
    }

    tr:nth-child(odd) 
    {
        background-color: white;
    }

    .underTable /* Alle content onder de bestellingsTabel */
    {

    }

    .bestellingsInformatie
    {
        position: relative;
        text-align: right;
    }

    .updateKnop
    {
        margin: auto;
        text-align: center;
        width: 20%;
    }

    input.aantal {
        width: 60px;
        text-align: center;
    }

    table {
        margin: 0 auto;
    }

    p.center {
        text-align: center;
    }

    a.productennaam {
        text-decoration: none;
        color: black;
    }

    </style>

<script src="verzendmethode.js" type="application/javascript"></script>       
</head>

<body>
    <!-- Problemen:  
    1. Knoppen voor "op voorraad" en "verwijder" staan niet in het midden
    2. Afreken knop is raar gepositioneerd (ik (rijnder) heb hem daar neergezet met een het absolute property als een tijdelijk work-around)
    -->
    <?php include 'menu.php'; ?>
    <noscript>
        Your browser does not support Javascript.
    </noscript>
        <div id="page">
           <div id="text">
                <h1>Winkelwagen</h1>
                <?php
                    if (!empty($_POST['button'])) {  
                        # als winkelwagen niet leeg is check of er geen dubbele zijn
                        if (!empty($_SESSION['winkelwagen'])){
                            $key = array_search($_POST['button'], $_SESSION['winkelwagen']);
                            if ($key===false) {
                                $_SESSION['winkelwagen'] [] = $_POST['button'];  
                            }
                        } else {
                            $_SESSION['winkelwagen'] [] = $_POST['button'];
                        }
                    }

                    if (!empty($_POST['delete'])) {
                        $key = array_search($_POST['delete'], $_SESSION['winkelwagen']);
                        if ($key!==false) {
                            unset($_SESSION['winkelwagen'][$key]);
                        }
                    }

                    if (!empty($_POST['aantal']) && !empty($_POST['id'])) {
                        $_SESSION['aantalproducten'] [$_POST['id']] = $_POST['aantal'];
                    }

                    $verzending = 0.00;
                    if (!empty($_POST['verzending'])) {
                        if ($_POST['verzending'] == "verzenden") {
                            $verzending = 6.95;
                        } else {
                            $verzending = 0.00;
                        }
                    } 

                    if (!empty($_SESSION['winkelwagen'])){ 
                        $subtotaal = 0.00;
                        echo '<table class="center">

                        <tr>
                            <th>Aantal</th>
                            <th></th>
                            <th>Artikel</th>
                            <th>Voorraad</th>
                            <th>Prijs</th>
                            <th>Verwijder</th>
                        </tr>';
                        include 'database_connect.php';
                        include 'TrimLeadingZeroes.php';

                        foreach ($_SESSION['winkelwagen'] as $value) {
                            $query = 'SELECT Product_ID, Productnaam, Prijs, Voorraad, img_filepath, Aanbieding FROM Product WHERE Product_ID=?';
                            $stmt = $db->prepare($query);
                            $stmt->bindValue(1, $value, PDO::PARAM_INT); 
                            $stmt->execute();

                            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            foreach ($result as $row){
                        
                                if ($row['Voorraad'] > 0) {
                                    $voorraad = "voorraad";
                                } else {
                                    $voorraad = "nietvoorraad";
                                }

                                if (isset($_SESSION['aantalproducten'] [$row['Product_ID']])) {
                                        $aantal = $_SESSION['aantalproducten'] [$row['Product_ID']];
                                } else {
                                    $aantal = 1;
                                }


                                if ($row['Aanbieding'] == 00000000.00) {
                                    $prijs = $aantal * $row["Prijs"] ;
                                } else {
                                    $prijs =  $aantal * $row['Aanbieding']; 
                                }


                                $goede_prijs = number_format("$prijs", 2);
                                $subtotaal = $subtotaal + $goede_prijs;
                                $goede_subtotaal = number_format("$subtotaal", 2);
                                $totaal = $subtotaal + $verzending;
                                $goede_totaal = number_format("$totaal", 2);

                                echo ' <tr>
                                        <td ><form action="Winkelwagen.php" method="POST">
                                            <input type="number" name="aantal" min="1" value="'.$aantal.'" class="aantal">
                                            <input type="hidden" name="id" value="'.$row['Product_ID'].'">
                                            <input type="submit" value="Kies">
                                            </form>
                                        </td>
                                        <td><a class="productennaam" href="ProductPagina.php?id=' . $row["Product_ID"] . '"> <img src="images/' . $row["img_filepath"] . '" alt="' . $row["Productnaam"] . '"  style ="max-width:50px; max-height:80px; min-height:30px; min-width:20px;"></img></a></td>
                                        <td><a class="productennaam" href="ProductPagina.php?id=' . $row["Product_ID"] . '">' . $row["Productnaam"] . '</a></td>
                                        <td><img src="images/'.$voorraad.'.png" alt="'.$voorraad.'" style=" margin-left: 45%; margin-right: 45%; width:20px; height:20px;"> </td>
                                        <td><p> &#128; '.trimLeadingZeroes($goede_prijs). '</p>
                                        <td>
                                            <form action="Winkelwagen.php" method="POST">
                                            <input type="hidden" value="'.$row['Product_ID'].'" name="delete">
                                            <input type="image" src="images/prullenbak.png" alt="Verwijder" width="20" height="20">
                                            </form>
                                        </td>
                                    </tr>';
                            }
                        }                    
                        echo '</table> ';

                        /*echo '<div class="updateKnop">
                            <a href="#" class="button1">Update winkelwagen</a>
                            </div>';*/

                        $exBTW = trimLeadingZeroes(($totaal/121)*100);
                        echo '<div class="underTable">
                            <div class="bestellingsInformatie">
                                <p>Subtotaal: &#8364 '.trimLeadingZeroes($goede_subtotaal).'</p> ';?>
                                <p>Verzending:

                                    <form action="Winkelwagen.php" method="POST">
                                    <select name="verzending">
                                        <option value="verzenden" <?php if ($verzending == 6.95) {echo 'selected = "selected"';} ?> >
                                            Verzending met PostNL (&#8364 6,95)</option>
                                        <option value="ophalen" <?php if ($verzending== 0.00) {echo 'selected = "selected"';}?> >Ophalen (&#8364 0,00)</option>
                                    </select>
                                    </br>
                                        <input type="submit" value="Kies">
                                        
                                    </form></p>
                                <?php
                                    if (!empty($_POST['verzending'])) {
                                        echo '<p style="color:#666666">Totaal Excl. BTW: &#8364 '.number_format("$exBTW", 2).'</p>
                                <p>Totaal Incl. BTW: &#8364: '.trimLeadingZeroes($goede_totaal).'</p>';
                                    } else {
                                        echo 'Kies eerst uw verzendmethode.';
                                    }

                        if (isset($_SESSION['login_success']) && $_SESSION['login_success'] == true) {
                            echo '<a href="bestellen.php">Afrekenen</a>';
                        } else {
                            echo '<a href="log_in.php">Afrekenen</a>';
                        }
                        echo' </div>
                        </div> ';
                    } else {
                        echo '<p class="center"> Uw wonkelmandje is leeg, klik <a href="productCatalogus.php">hier</a> om naar het overzicht te gaan </p>';
                    }
                 

                
                ?>
            </div>
        </div>

        <?php include 'footer.php'; ?>
    </body>
</html>