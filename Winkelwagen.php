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

    </style>
        
</head>

<body>
    <!-- Problemen:  
    1. Knoppen voor "op voorraad" en "verwijder" staan niet in het midden
    2. Afreken knop is raar gepositioneerd (ik (rijnder) heb hem daar neergezet met een het absolute property als een tijdelijk work-around)
    -->
    <?php include 'menu.php'; ?>
        <div id="page">
           <div id="text">
                <h1>Winkelwagen</h1>
                <?php
                    if (!empty($_POST['button'])) {  
                        /*$winkelwagen_array[$_POST['button']] = $_POST['button'];
                        $_SESSION['winkelwagen'] = $winkelwagen_array;*/
                        $_SESSION['winkelwagen'] [] = $_POST['button'];
                    }
                    ?>
                    echo '<table>

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
                    #print_r($_SESSION['winkelwagen']);
                    foreach ($_SESSION['winkelwagen'] as $value) {
                        $query = 'SELECT Product_ID, Productnaam, Prijs, Voorraad, img_filepath FROM Product WHERE Product_ID=?';
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

                            echo ' <tr>
                                    <td ><form><input type="number" name="aantal" min="1" ></form></td>
                                    <td> <img src="images/' . $row["img_filepath"] . '" alt="' . $row["Productnaam"] . '"  style ="max-width:50px; max-height:80px; min-height:30px; min-width:20px;"><img></td>
                                    <td>' . $row["Productnaam"] . '</td>
                                    <td><img src="images/'.$voorraad.'.png" alt="'.$voorraad.'" style=" margin-left: 45%; margin-right: 45%; width:15px; height:15px;"> </td>
                                    <td><p> &#128; '. trimLeadingZeroes($row["Prijs"]). '</p>
                                    <td><a href="#placeholder"> <img src="images/Verwijder.gif" alt="Verwijder artikel" style=" margin-left: 45%; margin-right: 45%;"> </img> </a> </td>
                                </tr>';
                        }
                    }
                    echo '</table> ';
                ?> 

                <div class="updateKnop">
                    <a href="#" class="button1">Update winkelwagen</a>
                </div>

                <!--<div class="underTable">
                    <div class="bestellingsInformatie">
                        <p>Subtotaal: &#8364 299,99</p>
                        <p>Verzending:
                            <select>
                                <option value="verzenden">
                                    Verzending met PostNL (&#8364 6,95)</option>
                                <option value="ophalen">Ophalen (&#8364 0,00)</option>
                            </select></p>
                        <p style="color:#666666">Totaal Excl. BTW: &#8364 245,88</p>
                        <p>Totaal Incl. BTW: &#8364: 306,94</p>
                        <a href="#">Afrekenen</a>
                    </div>
                </div> -->
            </div>
        </div>

        <?php include 'footer.php'; ?>
    </body>
</html>