<?php

try
{
	$con=new PDO('mysql:host=localhost;dbname=tp1p','root','');
}
catch (exception $x)
{
die("message". $x->getmessage());

}


?>