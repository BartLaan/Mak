<!DOCTYPE html>
<html>
<head>

	<title>Productcatalogus - Barry's Bakery</title>
    <link href="opmaakmenu.css" rel="stylesheet" type="text/css"/>
<style>
    
    /* A container that displays all the product information */ 
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
    

    /* The image shown by the product */
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
    
    /* Less important information about the product */
    .secundaire-info
    {
        color: #a59b98;
        font-size:85%;
        font-style: italic;
    }
    
    /* Styling for text that indicates the price of a product */
    .prijstekst
    {
        color:#4b3832;
    }
    
    .prijstekst#afgeprijst
    {
        text-decoration: line-through;
    }
    
    /* Styling for text that indicates a sale */
    .afgeprijst
    {
        color: #854442;
    }
    
    .category a
    {
        color: #4b3832;
        text-decoration: none;
    }
    
    /* Container of all the products */
    section
    {
        margin-top:4%;
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
        min-width:50%;
       
    }
    

    /* Vertical navigation bar */
    nav
    {
        position:fixed;
        top:7%;
        background-color: white;
        max-width:15%;
        min-width:90px;
        height:90%;
        text-align: left;
        float: left;
        padding: 15px;
        padding-top:7%;
        left:9%;
        z-index:13;
        margin-right:1%;
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
    <select name="taskOption" onchange="generateProducts()" id="Sorting">
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
    $categorieSql = "SELECT DISTINCT Categorie FROM Product WHERE Categorie <> ";
    $stmt = $db->prepare($categorieSql);
    $stmt->execute();

    while($row = $stmt->fetch())
    {
        echo '<input type="checkbox" onchange="generateProducts()" name="' . $row['Categorie'] . '" value="' . $row["Categorie"] . '" id ="' . $row["Categorie"]. '" checked> <a onclick="setCategorieSorting()" href="#' . $row["Categorie"]. '" >' . $row["Categorie"] . '</a>';      
        echo "<br>";
        $categorienArray[] = $row["Categorie"];
    }

    ?>


 <script>
        var categorienLijst = <?php echo json_encode($categorienArray); ?>;

        
        function getCategorie() 
        {
            var urlArray = document.URL.split('=');
            if(urlArray.length > 1)
            {
                return urlArray[urlArray.length - 1];
            }
            return "";
        }

        // Generare the product to be shown based on the URL
        categorieenBasedOnURL();
        function categorieenBasedOnURL() 
        {
            urlCategorie =  getCategorie();
            if(urlCategorie != "" && urlCategorie != null) 
            {
                for (var i = 0; i < categorienLijst.length; i++) 
                {
                    document.getElementById(categorienLijst[i]).checked = false;
                }
                document.getElementById(urlCategorie).checked = true;
                generateProducts();
            }
        }

        // Generate the products to be shown, based on the  selected categories and sorting method
        function generateProducts()
        {

            var url = "printProducten.php?";
            var categoriesSelected = false;
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
                hideFooter();
            }


            if(url.slice(-1) == "&")
            {
                url = url.concat("& " + "ord= " + document.getElementById("Sorting").value);
            }
            else
            {
                url = url.concat("ord= " + document.getElementById("Sorting").value);
            }


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
//                    correctLineBreaks();
                }

            }
            xmlhttp.open("GET",url,true);
            xmlhttp.send();
            
        }

        function setCategorieSorting()
        {
            document.getElementById("Sorting").value = "Categorie";
            generateProducts();
        }

        function hideFooter() 
        {
            document.getElementById("footer").style.visibility = "hidden";
        }

</script> 
    </form>
</div>
</nav>

<section id="Producten">

 <script type="text/javascript">
            generateProducts();
</script> 

</section>




</div>



<?php include 'footer.php'; ?>



</body>

</html>
