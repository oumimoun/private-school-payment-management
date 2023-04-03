<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=esgi','root','');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) 
{
	$e->getMessage();
}

?>