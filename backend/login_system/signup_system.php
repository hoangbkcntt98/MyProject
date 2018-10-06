<?php include_once('connect_db.php'); ?>
<?php session_start(); ?>
<?php 
	if(isset($_POST['submit'])){
		$name = $_POST['name'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$pwd = $_POST['pwd'];
		if(empty($username)||empty($pwd)||empty($email)||empty($name)){
			header('location:../../frontend/login.php?error=empty');
		}else{
			$sql = "SELECT * FROM customer WHERE username='$username';";
			$result=pg_query($conn,$sql);
			$num=pg_num_rows($result);
			if($num==0){
				$sql = "SELECT * FROM customer WHERE email='$email';";
				$result=pg_query($conn,$sql);
				$num=pg_num_rows($result);
				if($num==0)
				{
					$sql ="INSERT INTO customer(username,email,pwd,name) VALUES ('$username','$email','$pwd','$name');";
					$result=pg_query($conn,$sql);
					$sql = "SELECT * FROM customer WHERE username='$username';";
					$result=pg_query($conn,$sql);
					$result=pg_fetch_assoc($result);
					$_SESSION['id']= $result['id'];
					$_SESSION['name']= $result['name'];
					$_SESSION['username']= $result['username'];
					$_SESSION['email']= $result['email'];
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