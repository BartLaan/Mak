<?php 
    session_start();
?>
<!DOCTYPE html>

<html>
    <head>
        <title>
            Verzonden
        </title>
        <meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
        <link href="opmaakmenu.css" rel="stylesheet" type="text/css" />
        <link href="opmaak.css" rel="stylesheet" type="text/css" />

    </head>


    <body>
        <?php include 'menu.php'; ?>
        <div id="page">
            <div id="text">
                <p class="center"> U hebt betaald! Bedankt voor uw bestelling! </p>
                <img class="betaald" src="images/barry_banner.jpg" alt="Barry's Bakery Banner" style="width:800px">
                <p class="center"> <a href="https://ki30.webdb.fnwi.uva.nl/Mak/productCatalogus.php">
                    <img src="images/verderwinkelen.png" border="0" alt="Winkel verder" style="width:200px">
                </a> </p>
            </div>
        </div>
        
<?php include 'footer.php'; ?>
    </body>

<html>