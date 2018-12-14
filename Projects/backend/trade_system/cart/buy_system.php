<?php session_start() ?>
<?php include_once('../../login_system/connect_db.php') ?>

<?php 	
		
		$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		if(strpos($fullUrl,'idp=')){
			
			$idp = $_GET['idp'];

			$sql = "SELECT * FROM product WHERE idp = ".$idp."";
			$result = pg_query($conn,$sql);
			$row = pg_fetch_assoc($result);
			$idm = $row['idm'];
			$idc = $_SESSION['id'];
			$quantity = $_POST['select'];
			if($idc==$idm)
			{
				header('location:../../../frontend/index.php?fail');
			}else
			{
			$sql = "INSERT INTO buy(idm,idc,idp,quantity,date) values ('$idm','$idc','$idp','$quantity','".date("d/m/Y")."')";
			pg_query($conn,$sql);
			
			echo $_GET['idp'];
			$url = $_SERVER['HTTP_REFERER'];
			if(strpos($url,'?'))
			{
				if(strpos($url,'&sucess'))
				{
					$url = explode('&suc', $url);
					array_pop($url);
					$url = implode($url);
					header("location:".$url."&sucess");
				}
				else if(strpos($url,'?sucess'))
				{
					$url = explode('?suc', $url);
					array_pop($url);
					$url = implode($url);
					header("location:".$url."?sucess");
				}
				else
				{
					
					header("location:".$url."&sucess");
				}
				
			}else
			{
				header("location:".$url."?sucess");
			}
			
			}

			
		}
		
 ?>