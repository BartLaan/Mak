<!DOCTYPE html>
<html>
<head>

	<title>Product Catalogus </title>
    <link href="opmaakmenu.css" rel="stylesheet" type="text/css"/>
<style>

body
{
    height:100%;
}

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
    -webkit-line-clamp: 1; /* number of lines to show when overflow is reached */
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
    min-height:85%;
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
    margin-top:2%;
    position: relative;
    float: right;
    width: 86%;
    background-color:white;
    padding-top:1%;
    padding-left:3%;
    padding-right:-4%;
    z-index:10;
    left:0px;
    padding-bottom:1%;
   
}

nav
{
    position:fixed;
    top:7%;
    background-color: white;
    max-width:15%;
    min-width:10%;
    height:78%;
    text-align: left;
    float: left;
    padding: 15px;
    padding-top:7%;
    overflow:hidden;
    left:9%;
    z-index:13;
    
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
        include "database_connect.php";
        $db->setAttribute(PDO::ERRMODE_SILENT,PDO::CASE_NATURAL);
    ?>

<div id="text">

<nav role="navigation">

<h4> Sorteren </h4>

<form>
    <select name="taskOption" onchange="generateCategories(this)" id="Sorting">
        <option value="Productnaam">Alfabetisch</option>
        <option value="Prijs">Op Prijs</option>
        <option value="Categorie">Op Catogorie</option>
    </select>

</form>

<br>

<div class="category">


<h4> Catogorie </h4>


    <form>

    <?php
    $categorieSql = "SELECT DISTINCT Categorie FROM Product";
    $categorien = $db->query($categorieSql);
    

    foreach($categorien as $row)
    {
        echo '<input type="checkbox" onchange="generateCategories()" name="' . $row['Categorie'] . '" value="' . $row["Categorie"] . '" id ="' . $row["Categorie"]. '" checked> <a onclick="setCategorieSorting()" href="#' . $row["Categorie"]. '" >' . $row["Categorie"] . '</a>';      
        echo "<br>";
        $categorienArray[] = $row["Categorie"];
    }

    ?>

   <script type="text/javascript">


//        urlCategorieen();
//        function urlCategorieen() 
//        {
//            var urlCategorie = <?php echo json_encode($_GET["categorie"]); ?>;
//            console.log(<?php echo json_encode($_GET["categorie"]); ?>);
//            var categorienLijst = <?php echo json_encode($categorienArray); ?>;
//            if(urlCategorie != "" && urlCategorie != null) 
//            {
//                for (var i = 0; i < categorienLijst.length; i++) 
//                {
//                    document.getElementById(categorienLijst[i]).checked = false;
//                }
//                document.getElementById(urlCategorie).checked = true;
//                generateCategories();
//            }
//        }

        function generateCategories()
        {

//            var url = "printProducten.php?";
//            var categoriesSelected = false;
            var categorienLijst = <?php echo json_encode($categorienArray); ?>;
            for(i = 0; i < categorienLijst.length; i++)
            {
                if(!document.getElementById(categorienLijst[i]).checked)
                {
                    url = url.concat("cat" + i.toString() + "=" + categorienLijst[i] + "&");
                }
                else
                {
                    categoriesSelected = true;
                }
            }



            if(!categoriesSelected)
            {
                console.log("test");
                hideFooter();
            }
            else
            {
                console.log("meh");
            }


            if(url.slice(-1) == "&")
            {
                url = url.concat("& " + "ord= " + document.getElementById("Sorting").value);
            }
            else
            {
                url = url.concat("ord= " + document.getElementById("Sorting").value);
            }


            console.log(url);


            if (window.XMLHttpRequest) 
            {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } 
            else 
            {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() 
            {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
                {
                    document.getElementById("Producten").innerHTML  = xmlhttp.responseText;
                }

            }
            console.log(url);
            xmlhttp.open("GET",url,true);
            xmlhttp.send();
        }

        function setCategorieSorting()
        {
            document.getElementById("Sorting").value = "Categorie";
            generateCategories(document.getElementById("Sorting"));
        }

    </script>



    <input type="checkbox" name="Snoep" value="Snoep"> <a href="#Snoep"> Snoepgoed </a> <br>
    <input type="checkbox" name="Auto" value="Auto"> <a  href="#Auto"> Auto's </a> <br>
    </form>
</div>
</nav>

<section>

        <script type="text/javascript">
            generateCategories();
        </script>



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

<script >

function hideFooter() 
{
    document.getElementById("footer").style.visibility = "hidden";
    console.log("test");

}

</script>

</body>

</html>
