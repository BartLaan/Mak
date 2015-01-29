<!DOCTYPE html>

<html>
	<head>
		<title>
			Contact
		</title>
		<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
        <link href="opmaak.css" rel="stylesheet" type="text/css" />
        <link href="opmaakmenu.css" rel="stylesheet" type="text/css" />

    <style>
    h1
    {
        text-align: left; 
    }
    h1.about, p.about
    {
        color: black;
    }    
    .paginaSectie
    {
        padding:5%;
        padding-right:-3%;
        margin-top: 5%;
        background-color: #fff4e6;
        border-radius:10px;
        border: solid #854442;
    }
    table td
    {
        padding-right:20px;   
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

                <h1> Contact </h1>
                <p> Voor vragen of opmerking kunt u contact met ons opnemen via mail of langskomen op onze locatie. </p>

        		<p> 
        			<h3> Adres Gegevens </h3>
                    <address>
        			Mak <br>
        			<i> <b>Science Park 904, </b></i><br>
                    1098 XH Amsterdam   <br>
                    </address>
        		</p>

                <h3> Emailadressen </h2>
        		<table>
        			<tr>
        				<td>Bart Laan: </td>
        				<td>
                        <a href="mailto:bart.laan@uva.nl ">bart.laan@uva.nl </a>
                        </td>
        			</tr>
        			<tr>
        				<td>Caitlin Lagrand: </td>
        				<td>
                        <a href="mailto:caitlin.lagrand@uva.nl">caitlin.lagrand@uva.nl</a> 
                        </td>
        			</tr>
        			<tr>
        				<td>Barry Servaas: </td>
        				<td>
                        <a href="mailto:barry.servaas@uva.nl ">barry.servaas@uva.nl </a> 
                        </td>
        			</tr>
        			<tr> 
        				<td>Simon Verboom: </td>
        				<td>
                        <a href="mailto:simon.verboom@uva.nl">simon.verboom@uva.nl </a>
                        </td>
        			</tr>
        			<tr>
        				<td>Rijnder Wever: </td>
        				<td>
                        <a href="mailto:rijnder.wever@uva.nl">rijnder.wever@uva.nl </a>
                         </td>
        			</tr>
        		</table>            
            </div>
        </div>
        </div>
        
<?php include 'footer.php'; ?>
	</body>

<html>