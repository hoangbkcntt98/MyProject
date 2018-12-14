<?php include_once('connect_db.php'); ?>
<?php session_start(); ?>
<?php 
	if(isset($_POST['submit'])){
		$name = $_POST['name'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$pwd = $_POST['pwd'];
		$ad = $_POST['adress'];
		$age = $_POST['age'];
		if(empty($username)||empty($pwd)||empty($email)||empty($name)){
			header('location:../../frontend/login.php?error=empty');
		}else{
			$sql = "SELECT * FROM users WHERE username='$username';";
			$result=pg_query($conn,$sql);
			$num=pg_num_rows($result);
			if($num==0){
				$sql = "SELECT * FROM users WHERE email='$email';";
				$result=pg_query($conn,$sql);
				$num=pg_num_rows($result);
				if($num==0)
				{
					$sql ="INSERT INTO users(Username,Email,Password,Name,Adress,age) VALUES ('$username','$email','$pwd','$name','$ad','$age');";
					$result=pg_query($conn,$sql);
					$sql = "SELECT * FROM users WHERE Username='$username';";
					$result=pg_query($conn,$sql);
					$result=pg_fetch_assoc($result);
					$_SESSION['id']= $result['id'];
					$_SESSION['name']= $result['name'];
					$_SESSION['username']= $result['username'];
					$_SESSION['email']= $result['email'];
					$idc = $result['id'];
					$sql ="INSERT INTO customer(idc) VALUES ('$idc');";
					$result=pg_query($conn,$sql);
					$sql ="INSERT INTO manufacturer(idm) VALUES ('$idc');";
					$result=pg_query($conn,$sql);
					header('location:../../frontend/index.php');
				}
				else
				{
					header('location:../../frontend/login.php?error=email');
				}
			}else
			{
				header('location:../../frontend/login.php?error=exist');
			}

		}
	}
 ?>