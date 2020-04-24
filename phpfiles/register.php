<?php	
	if(isset($_POST['register']))
	{
		require 'database_con.php';
		if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email'])
			&& isset($_POST['repeatpassword'])){
			
			$name=$_POST['firstname'];
			$surname=$_POST['lastname'];
			$username=$_POST['username'];
			$password=$_POST['password'];
			$email=$_POST['email'];
			$repeatPassword=$_POST['repeatpassword'];
			$typeUser="user";
		
			
			$sql="SELECT * FROM users WHERE username = '".$username."'";
	
			$result = mysqli_query($conn,$sql);
			$resultNumberRows = mysqli_num_rows($result);
			
			if($resultNumberRows == 1 )
			{
				header("location:../createAccount.php?UserExist=User already exists!");
			}
			else {
				
				if( $password != $repeatPassword)
				{
					header("location:../createAccount.php?InvalidEmailPas=Invalid email and incorect password!Try again!");
				}
				else
				{
					if($password != $repeatPassword)
					{
						header("location:../createAccount.php?InvalidPass=Incorrect password!Try again!");
					}
					else
							
							{
								$sql = "INSERT INTO users (username,password,firstname,lastname,typeUser,email) VALUES ('".$username."','".$password."', '".$name."','".$surname."','".$typeUser."','".$email."')";

									if (mysqli_query($conn, $sql)) {
										header("location:../login.php?LoginR=Registration complete! Login now");
									} 

									mysqli_close($conn);
							}
					
				}
			}
			
		}
	}
	else
	{
		exit();
	}
	
?>