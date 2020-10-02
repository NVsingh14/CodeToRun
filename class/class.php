<?php
class Login
{
	public $dbo;

	public function __construct()
	{
			global $dbo;
			if ($_SERVER['REMOTE_ADDR']=='127.0.0.1')
			{
				$hostname="localhost";
				$database="codetorun";
				$username="root";
				$password="";

			}
			else
			{
				$hostname="localhost";
				$database="codetorun";
				$username="root";
				$password="";
			}

			try 
			{
				$dbo= new PDO('mysql:host='.$hostname.';dbname='.$database,$username,$password);

			}
			catch(PDOException $e) 
			{
				print "ERROR!: ".$e->getMessage() . "<br/>";
			}
	}
}


$objlogin = new Login;


