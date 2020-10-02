<?php

class FormLogin
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



			public function form_add($post,$img)
			{
				global $dbo;
				date_default_timezone_set('Asia/Kolkata');
				$date = date('Y-m-d H:i:s');
				$q= "INSERT INTO users SET name=:a,phone=:b,email=:c,password=:d,image=:e,insertdate='".$date."'";
				$sql = $dbo->prepare($q);
				$sql->bindParam(':a',$post['fname'],PDO::PARAM_STR,200);
				$sql->bindParam(':b',$post['phone'],PDO::PARAM_STR,200);
				$sql->bindParam(':c',$post['email'],PDO::PARAM_STR,200);
				$sql->bindParam(':d',$post['pass'],PDO::PARAM_STR,200);
				$sql->bindParam(':e',trim($img),PDO::PARAM_STR,200);

				$sql->execute();
				$no = $sql->rowCount();
				//echo $no;exit;
				if($no = 1)
				{
					return 1; 
				}
				else
				{
					return 0;
				}

			}





}

	$objLogin = new FormLogin;

?>
