<!DOCTYPE html>

<html>
    <head>
        <title>
            Verzonden
        </title>
        <meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
        <link href="opmaakmenu.css" rel="stylesheet" type="text/css" />

    <style>
    h1.about, p.about
    {
        color: black;
    }    
    .paginaSectie
    {
        padding:2%;
        margin-left: auto;
        margin-right: auto;
        margin-top: 2%;
    }
    .paginaSectie p 
    {
        font-family: 'Helvetica Light', 'Helvetica', Arial, sans-serif;
        font-weight:lighter;
        font-size:150%;
        color:black;
        text-align: center;
    }
    .paginaSectie a
    {
        display: block;
        margin-left: auto;
        margin-right: auto }
    }

    </style>

    </head>


    <body>
        <?php include 'menu.php';
            session_start();
        ?>
        <div id="page">
        <div id="text">
        <div class="paginaSectie">
            <p> U hebt betaald! Bedankt voor uw bestelling! </p>
            <img src="images/barry_banner.jpg" alt="Barry's Bakery Banner" style="width:1000px">
            <a href="https://ki30.webdb.fnwi.uva.nl/Mak/productCatalogus.php">
                <img src="images/verderwinkelen.png" border="0" alt="Winkel verder" style="width:200px">
            </a>
        </div>
        </div>
        </div>
        
<?php include 'footer.php'; ?>
    </body>

<html>