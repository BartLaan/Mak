<!DOCTYPE html>
<html>
<head>

	<title>Product Catalogus </title>
    <link href="opmaakmenu.css" rel="stylesheet" type="text/css"/>
<style>


.product
{
    color: #81736f;
    border-style: none;
    border-width: thin;
    border-color: #EFEFEF;
    text-decoration: none;
    float: left;
    margin-right: 15px;
    padding: 10px;
    text-align: center;
    vertical-align: bottom;
    width:20%;
    min-width:170px;
    min-height:130px;
    max-height:20%;
    overflow: hidden;
    position: relative;
}

.product:hover
{
    background-color: #FFF6E9;
}

.product a
{
    color:#81736f;
    text-decoration: none;
}

.product a:visited
{
    color:#81736f;
}

.product a:hover
{
    color:#4b3832;
    text-decoration: underline;
}

.productNaam
{
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 2; /* number of lines to show when overflow is reached */
    -webkit-box-orient: vertical;
    overflow:hidden;
}

.productAfbeelding
{
    min-width:90%;
    vertical-align: bottom;
    height: 180px;
    position: relative;
}

.productAfbeelding img
{
    position: absolute;
    bottom:0;
    margin:auto;
    left:0;
    right:0;
    max-width:90%;
    max-height:100%;
    min-heigt:90%;
    min-width:55%;
    overflow:hidden;
}


.secundaire-info
{
    color: #a59b98;
    font-size:85%;
    font-style: italic;
}

.prijstekst
{
    color:#4b3832;
}

.prijstekst#afgeprijst
{
    text-decoration: line-through;
}

.afgeprijst
{
    color: #854442;
}

.category a
{
    color: #4b3832;
    text-decoration: none;
}

section
{
    margin-top:5%;
    position: relative;
    float: right;
    width: 84%;
    margin-right:2%;
    background-color:white;
    padding-top:1%;
    padding-left:5%;
    padding-right:-2%;
}

nav
{
    position:fixed;
    top:7%;
    background-color: white;
    max-width:15%;
    min-width:10%;
    height: 100%;
    text-align: left;
    float: left;
    padding: 15px;
    padding-top:7%;
    overflow:hidden;
    left:10%;
    
}

nav h4
{
    margin-top:10%;
    color: #4b3832;
    text-decoration: underline;
}

h4 select
{
    float:left;
}

hr
{
    /* Work around for changing the color */
    height: 1px;
    border: 0; 
    border-top: 1px solid #A2A2A2;
     
    position:relative;
    left:0;
    right:0;
    margin-top: 18px;
    margin-bottom: 18px; 
    width: 100%;
}

</style>
   
</head>

<body>

    <?php
       include "menu.php";

        $db = new PDO('mysql:host = localhost; dbname=test', 'rijnder', 'GodspeedF#A#');
        $db->setAttribute(PDO::ERRMODE_SILENT,PDO::CASE_NATURAL);
    ?>

<div id="text">

<section>

<nav role="navigation">

<h4> Sorteren </h4>

<form action="" method="post">
    <select name="taskOption">
        
        <option value="Alfabetisch">Alfabetisch</option>
        <option value="Prijs">Op Prijs</option>
        <option value="None">Geen Sortering</option>  
        <option value="Catogorie">Op Catogorie</option>
    </select>

</form>

<br>

<div class="category">



<h4> Catogorie </h4>
    <form action="post" method="">
    <?php
    $categorieSql = "SELECT DISTINCT  Categorie FROM Test";
    $categorien = $db->query($categorieSql);

    foreach($categorien as $row)
    {
        echo '<input type="checkbox" name="' . $row['Categorie'] . '" value="' . $row["Categorie"] . '"> <a href="#' . $row["Categorie"]. '"> ' . $row["Categorie"]. '</a>';      
        echo "<br>";
    }

    ?>

    <input type="checkbox" name="Snoep" value="Snoep"> <a href="#Snoep"> Snoepgoed </a> <br>
    <input type="checkbox" name="Auto" value="Auto"> <a  href="#Auto"> Auto's </a> <br>
    </form>
</div>
</nav>
        <?php

            /* Generate the products */
        
            $f = fopen("/tmp/phpLog.txt", "w");
            $orderingColumn = "ProductNaam";
    
            $productenSql = "SELECT ProductNaam, SecundaireInfo, Prijs, Afbeelding, Aanbieding, ProductID FROM Test ORDER BY " . $orderingColumn;
            $stmt = $db->prepare($productenSql); 
            $stmt->execute();
 
            while($row =$stmt->fetch() )
            {
                // Not sure if '#' is correct here
                $id = $row["ProductID"];
                echo "<a class ='product' href='ProductPagina.php?id=$id'>" ;
                echo '<div class="productAfbeelding">';
                echo '<img src="images/' . $row["Afbeelding"] . '" alt="' . $row["ProductNaam"] . '"></img><br>';
                echo '</div>';
                echo ' <hr>';
                // Geen ondersteuning speciale chars

                // Niet de juiste manier

                echo '<div class="productNaam">' .  $row['ProductNaam']. '</div>';

                if ( strlen($row["SecundaireInfo"]) != NULL)
                {
                    echo '<span class="secundaire-info">' . $row["SecundaireInfo"] . '</span>';
                }


                echo "<br>";

                if ( strlen($row["ProductNaam"]) < 22 )
                {
                    echo "<br>";
                }
                

                if( $row['Aanbieding'] == 0)    // Geen aanbieding
                {   
                    echo "<br>";
                    echo '<span class="prijstekst"> &euro;' . $row["Prijs"] . '</span>';
                }
                else
                {
                    echo '<span class="prijstekst" id="afgeprijst"> &euro;' .$row["Prijs"] . '</span>';
                    echo '<br><span class="afgeprijst">&euro;' . $row["Aanbieding"] . ' </span>';
                }

                echo "<br>";
                echo "</a>";    
            }

            fclose($f); 
            $db = NULL;
        ?>

</section>

</div>

 <?php include 'footer.php'; ?>

</body>

</html>
