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
    z-index:10;
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
    left:9%;
    z-index:13;
    height:80%;
    
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

        $db = new PDO('mysql:host = localhost; dbname=Mak', 'rijnder', 'GodspeedF#A#');
        $db->setAttribute(PDO::ERRMODE_SILENT,PDO::CASE_NATURAL);
   ?>

<div id="text">

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
    $categorieSql = "SELECT DISTINCT Categorie FROM Product";
    $categorien = $db->query($categorieSql);
    

    foreach($categorien as $row)
    {
        echo '<input type="checkbox" onchange="generateCategories()" name="' . $row['Categorie'] . '" value="' . $row["Categorie"] . '" id ="' . $row["Categorie"]. '"> <a href="#' . $row["Categorie"]. '"> ' . $row["Categorie"]. '</a>';      
        echo "<br>";
        $categorienArray[] = $row["Categorie"];
    }

    ?>



    <input type="checkbox" name="Snoep" value="Snoep"> <a href="#Snoep"> Snoepgoed </a> <br>
    <input type="checkbox" name="Auto" value="Auto"> <a  href="#Auto"> Auto's </a> <br>
    </form>
</div>
</nav>

<section id="Producten">


        <?php
            include("printProducten.php");
            /* Generate the products */
        
            $orderingColumn = "Productnaam";
            printProducten(array(), $orderingColumn, $db);

        ?>

<a class ="product" href="ProductPagina1.html" title="product1">
        <div class="productAfbeelding">
            <img src="images/ProductImages/263.jpg" alt="Foto van product1"></img><br>
        </div>
        <hr>
        <div class="productNaam"> Reizen zonder John - Opzoek Naar Amerika</div>
    <span class="secundaire-info"> Geert Mak</span>
    <br> <br>
    <span class="prijstekst"> &euro;700,00</span>
    <br> 
</a>


<a class ="product" href="ProductPagina1.html" title="Product2">
    <div class="productAfbeelding">
        <img src="images/ProductImages/2.jpg" alt="Foto van product2"></img><br>
    </div>
    <hr>
    <div class="productNaam"> Product 2 </div>
    <span class="secundaire-info"> </span>
    <br> <br> <br>
    <span class="prijstekst"> &euro;9001,00</span>
    <br>
</a>

<a class ="product" href="ProductPagina1.html" title="Product3">
        <div class="productAfbeelding">
            <img src="images/ProductImages/3.jpg" alt="Foto van product3"></img>
        </div>
        <hr>
        <div class="productNaam"> Product 3 </div>
    <span class="secundaire-info"> Extra Informatie </span>
    <br> <br> <br>
    <span class="prijstekst">&euro;69,69</span>
    <br>
</a>

<a class ="product" href="ProductPagina1.html" title="Product4">
    <div class="productAfbeelding">
        <img src="images/ProductImages/4.jpg" alt="Foto van product4"></img><br>
    </div>
    <hr>
    <div class="productNaam"> Product 4 </div>    
    <span class="secundaire-info"> </span>
    <br> <br>
    <span class="prijstekst" id="afgeprijst">&euro;5,25</span>
    <br><span class="afgeprijst">&euro;3,02 </span>
</a>

<a class ="product" href="ProductPagina1.html" title="Product5">
    <div class="productAfbeelding">
        <img src="images/ProductImages/5.jpg" alt="Foto van product5"></img><br>
    </div>
    <hr>
    <div class="productNaam"> Geert Mak & Europa: Een analyse - Waarom Geert Mak onbetrouwbaar is </div>
    <span class="secundaire-info"> ;) </span>
    <br> <br>
    <span class="prijstekst" >&euro;6,25</span>
    <br> <br>
</a>

</section>



</div>

<?php include 'footer.php'; ?>

    <script>
        function generateCategories()
        {

            document.getElementById("Producten").innerHTML  = "";        
            var categorienLijst = <?php echo json_encode($categorienArray); ?>;
            var disableCategorien = new Array();
            
            for(i = 0; i < categorienLijst.length; i++)
            {
                if(!document.getElementById(categorienLijst[i]).checked)
            }
            if
            {
                
            }           
            else 
            { 
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() 
                {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
                    {
                        
                    }
                }
                xmlhttp.open("GET","printProducten.php?cat=",true);
                xmlhttp.send();
            }
        }
    </script>


</body>

</html>
