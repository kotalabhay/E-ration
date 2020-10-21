<html>
<link href="sweetalert/sweetalert2.css" rel="stylesheet" type="text/css" />
<script src="sweetalert/sweetalert2.min.js"></script>
</html>
<?php

	include 'includes/session.php';

	if(isset($_POST['signup'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$repassword = $_POST['repassword'];
		$rationnum = $_POST['rationnum'];
		$head = $_POST['head'];
		$dob = $_POST['dob'];
		$gender = $_POST['gender'];
		$address = $_POST['address'];
		$contact_info = $_POST['contact_info'];
		$dropdown = $_POST['dropdown'];
		$cylinder = $_POST['cylinder'];
		$family = $_POST['family'];
		$adult = $_POST['adult'];
		$children = $_POST['children'];


		$_SESSION['firstname'] = $firstname;
		$_SESSION['lastname'] = $lastname;
		$_SESSION['email'] = $email;



		if($password != $repassword){
			$_SESSION['error'] = 'Passwords did not match';
			header('location: signup.php');
		}
		else{
			$conn = $pdo->open();

			$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM users WHERE email=:email");
			$stmt->execute(['email'=>$email]);
			$row = $stmt->fetch();
			if($row['numrows'] > 0){
				$_SESSION['error'] = 'Email already taken';
				header('location: signup.php');
			}
			else{
				$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM government WHERE rationnum=:rationnum ");
				$stmt->execute(['rationnum'=>$rationnum]);
				$row = $stmt->fetch();

					//	$sql = "SELECT id FROM government WHERE ration = $_POST[rationnum]";
					//	$db_num = mysqli_query($conn, $sql);

							if($row['numrows'] > 0)
								{

									try
									{
										$now = date('Y-m-d');
										$password = password_hash($password, PASSWORD_DEFAULT);
				//generate code
										$set='123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
										$code=substr(str_shuffle($set), 0, 12);
										$status=1;
										$stmt = $conn->prepare("INSERT INTO users (email, password, firstname, lastname, activate_code, created_on, rationnum,head,dob,gender,address,contact_info,dropdown,cylinder,family,adult,children,status ) VALUES (:email, :password, :firstname, :lastname, :code, :now,:rationnum,:head,:dob,:gender,:address,:contact_info,:dropdown,:cylinder,:family,:adult,:children,:status )");
										$stmt->execute(['email'=>$email, 'password'=>$password, 'firstname'=>$firstname, 'lastname'=>$lastname, 'code'=>$code, 'now'=>$now, 'rationnum'=>$rationnum,'head'=>$head,'dob'=>$dob,'gender'=>$gender,'address'=>$address,'contact_info'=>$contact_info,'dropdown'=>$dropdown,'cylinder'=>$cylinder,'family'=>$family,'adult'=>$adult,'children'=>$children,'status'=>$status]);
										$userid = $conn->lastInsertId();
										//echo'You was successfully registered';
										 echo '<script type="text/javascript">
										 Swal.fire({type: "success", title: "Good Job!", text: "You was successfully registered", timer: 1400});
										 </script>';
										header("refresh:2; url=index.php");
								}
								catch(PDOException $e){
					$_SESSION['error'] = $e->getMessage();
					header('location: register.php');
				}
								}

							else {
									echo '<script type="text/javascript">
									Swal.fire({type: "error!", title: "oops...", text: "Your ration number or ration card colour is not matched in the Governments database"});
									</script>';
									//echo'You were failed moron registration;
									header("refresh:2; url=signup.php");
								}
			}
			$pdo->close();
		}
	}
?>
