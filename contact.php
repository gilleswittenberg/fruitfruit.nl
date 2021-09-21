<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<title>FruitFruit - Studios</title> 
 
<!-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> -->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
<meta http-equiv="Content-Style-Type" content="text/css" /> 
<meta http-equiv="Content-Script-Type" content="text/javascript" />
 
<meta name="robots" content="follow, index" /> 
<meta name="description" lang="en" content="contactsite FruitFruit Studios" /> 
<meta name="keywords" content="FruitFruit, studios, fruit, nl, netherlands, music, design" /> 
<meta name="author" content="sdld.nl" /> 

<style type="text/css">

html, body, #flash_content{
background-color:#E3FEFD;
height:100%;
}

body{
overflow:hidden;
margin:0px;
padding:0px;
}

object { 
display:block; 
}	

#content
{
margin:8px;
}

p, h1{
font-family:Verdana, Arial, Helvetica, sans-serif;
font-size:87.5%;
margin:0px;
padding:0px;
line-height:1.3em;
}

p{
padding:8px 0px 8px;
margin-bottom:30px;
border-bottom:#3399CC 1px solid;
}

a{
color:#3399CC;
}

a:hover
{
text-decoration:none;
}

label
{
display:block;
}





</style>

</head>

<body>

<div id="flash_content">

<div id="content">

<h1>FruitFruit - Studios</h1>
<p>
Amsterdam, The Netherlands<br />
</p>

<?php

include_once("content/php/clean_input.php");
include_once("content/php/checkmail.php");

 
// geef e-mail adres op van ontvanger 
$mail_ontv = "contact@fruitfruit.nl";


// post values
$naam = clean_input($_POST['naam']);
$email = checkmail(clean_input($_POST['email']));
$bericht = clean_input($_POST['bericht']);


// als er niet op submit is gedrukt, of als er wel op is gedrukt maar niet alles ingevoerd is 

if (!$_POST['submit'] || ($_POST['submit'] && (!$naam || !$email || !$bericht))) 
{ 
    if ($_POST['submit']) 
    { 
        echo "<p>One of the field has not been or not been rightly submitted.</p>"; 
    } 
	
	else
	{
		echo "<p>Fill in the form to send us a message.</p>";
	}
      
    // form + tabel 
    //echo "<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">"; 
    echo "<form method=\"POST\" ACTION=\"" . $_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'] . "\" />"; 
	echo "\n";
      
    // naam 
    echo "<label>Name:</label>"; 
    echo "<input class='inputI' type=\"text\" name=\"naam\" value=\"" . $_POST['naam'] . "\" />"; 
    echo "\n";
     
    // mail 
    echo "<label>E-mail:</label>"; 
    echo "<input class='inputI'  type=\"text\" name=\"email\" value=\"" . $_POST['email'] . "\" />"; 
    echo "\n";
     
    // mail 
    echo "<label>Message:</label>"; 
    echo "<textarea name=\"bericht\" ROWS=\"6\" COLS=\"45\">" . htmlentities($_POST['bericht']) . "</textarea>"; 
    echo "\n";
	
    // button 
    echo "<input class='button' type=\"submit\" name=\"submit\" value=\"Send\" />"; 
    echo "\n";
	  
    // sluit form + tabel 
    echo "</form>"; 

} 
// versturen naar 
else 
{      
    // set datum 
    $datum = date("d.m.Y H:i"); 
      
    // set ip 
    $ip = $_SERVER['REMOTE_ADDR']; 
    
	$inhoud_mail = "Verstuurd op " . $datum . " via het ip " . $ip . "\n\n"; 

    $inhoud_mail .= "Naam: $naam \n"; 
    $inhoud_mail .= "E-mail adres: $email \n"; 
    $inhoud_mail .= "Bericht: \n"; 
    $inhoud_mail .= "$bericht \n\n"; 
      
    
    // -------------------- 
    // spambot protectie 
    // ------ 
    // van de tutorial: http://www.phphulp.nl/php/tutorials/10/340/ 
    // ------ 
    
    $headers = "From: $naam";
    
    $headers = stripslashes($headers);
    $headers = str_replace("\n", "", $headers); // Verwijder \n 
    $headers = str_replace("\r", "", $headers); // Verwijder \r 
    $headers = str_replace("\"", "\\\"", str_replace("\\", "\\\\", $headers)); // Slashes van quotes 
    
	
	$_onderwerp = "contact: $naam";
     
	mail($mail_ontv, $_onderwerp, $inhoud_mail, $headers); 
     
    echo "<p>Message send.</p>";
} 

?> 


</div>

</div>

</body>
</html>
