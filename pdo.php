<?php 
$db= new PDO('mysql:host=localhost; dbname=codetorun','root','');

$query = $db->query('SELECT * FROM users ');
while($row = $query->fetch() )
{
	print_r($row);
}




?>