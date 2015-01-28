<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" >
	<link href="opmaakmenu.css" rel="stylesheet" type="text/css" />

	<style>
/*----- Tabs -----*/
.tabs-scherm {
    width:100%;
    display:inline-block;
}
 
    /*----- Tab Links -----*/
    /* Clearfix */
    .tabs:after {
        display:block;
        clear:both;
        content:'';
    }
 
    .tabs-scherm li {
        margin:0px 5px;
        float:left;
        list-style:none;
    }
 
        .tabs-scherm a {
            padding:9px 15px;
            display:inline-block;
            border-radius:3px 3px 0px 0px;
            background:#7FB5DA;
            font-size:16px;
            font-weight:600;
            color:#4c4c4c;
            transition:all linear 0.15s;
        }
 
        .tabs-scherm a:hover {
            background:#a7cce5;
            text-decoration:none;
        }
 
    li.huidige-tab a, li.huidige-tab a:hover {
        background:#fff;
        color:#4c4c4c;
    }
 
    /*----- Content of Tabs -----*/
    .inhoud {
        padding:15px;
        border-radius:3px;
        box-shadow:-1px 1px 1px rgba(0,0,0,0.15);
        background:#fff;
    }
 
        .tab {
            display:none;
        }
 
        .tab.huidige-tab {
            display:block;
        }
    </style>
</head>
<body>
<?php include 'menu.php'; ?>
<div class="tabs-scherm">
    <ul class="tabs">
        <li class="huidige-tab"><a href="#klanten" onClick="showTab(this)">Klanten</a></li>
        <li><a href="#product_aanpassen" onClick="showTab()">Producten aanpassen</a></li>
        <li><a href="#tab3">Tab #3</a></li>
        <li><a href="#tab4">Tab #4</a></li>
    </ul>
 
    <div class="inhoud">
        <div id="klanten" class="huidige-tab">
            <p>Tab #1 content goes here!</p>
            <p></p>
        </div>
 
        <div id="product-aanpassen" class="tab">
            <p>Tab #2 content goes here!</p>
        </div>
 
        <div id="tab3" class="tab">
            <p>Tab #3 content goes here!</p>
        </div>
 
        <div id="tab4" class="tab">
            <p>Tab #4 content goes here!</p>
        </div>
    </div>
</div>
<script>
	function showTab(caller) 
	{
		var currentTab = document.getElementsByClassName(huidige-tab)
	}
</script>
</body>
</html>