<?php include 'includes/session.php'; ?>
<?php
  if(isset($_SESSION['user'])){
    header('location: cart_view.php');
  }

  if(isset($_SESSION['captcha'])){
    $now = time();
    if($now >= $_SESSION['captcha']){
      unset($_SESSION['captcha']);
    }
  }

?>
<?php include 'includes/header.php'; ?>
<style type="text/css">
.image
{
	background:url('images/wood.jpeg') ;
	background-size: cover;
}
#log
{
	border:2px solid white;
	padding:60px 40px;
	margin-top:80px;
	-webkit-box-shadow: 9px -7px 9px 0px rgba(0,0,0,0.79);
	-moz-box-shadow: 9px -7px 9px 0px rgba(0,0,0,0.79);
	box-shadow: 9px -7px 9px 0px rgba(0,0,0,0.79);
}
button
{
	-webkit-box-shadow: 9px 1px 25px 0px rgba(0,0,0,0.8);
	-moz-box-shadow: 9px 1px 25px 0px rgba(0,0,0,0.8);
	box-shadow: 9px 1px 25px 0px rgba(0,0,0,0.8);
}
img
{
	width:150px;
	margin:0 auto;
}
.center-block
{
	display:block;
	margin-right:auto;
	margin-left:auto;
}
h1
{
	color:green;
	text-align:center;
	font-weight:bold;
	margin-top:-20px;
}
label
{
	font-size:20px;
	color:black;
	font-weight:bold;
}
a
{
	font-size:15px;
	color: black;
	text-decoration: none;
	font-weight:bold;
}
a:hover
{
	font-size:18px;
	color: green;
	transition:all 0.7s;
	text-decoration: none;
}
p
{
	font-weight:bold;
	font-size:15px;
}
p a
{
	font-weight:bold;
	font size:15px;
	transition:font-size 12s;
	-webkit-transition:font-size 12s;
	-o-transition:font-size 12s;
	transition:violet 12s;
	-webkit-transition:violet 12s;
	-o-transition:violet 12s;
}
p a:hover
{
	font-size:18px;
	color:green;
	text-decoration: none;
}
.dropdown select
{
	font-size:15px;
	font-weight:bold;
	line-height:30px;
	border:1px solid white;
	width:140px;
	height:30px;
	text-align:center;
	padding:0 20px;
	box-sizing:border-box;
	border-radius: 6px;
}
.dropdown select:hover
{

	background-color: lightgreen;
}
</style>
<body class="hold-transition register-page" style="background:url('images/wood.jpeg'); background-size: cover;">
  <div class="image">
<div class="register-box">
  	<?php
      if(isset($_SESSION['error'])){
        echo "
          <div class='callout callout-danger text-center'>
            <p>".$_SESSION['error']."</p>
          </div>
        ";
        unset($_SESSION['error']);
      }

      if(isset($_SESSION['success'])){
        echo "
          <div class='callout callout-success text-center'>
            <p>".$_SESSION['success']."</p>
          </div>
        ";
        unset($_SESSION['success']);
      }
    ?>

  	<div class="register-box-body" id=log style="background:url('images/wood.jpeg'); width:400px">
    	<p class="login-box-msg"><h1>Registration Form</h1></p><br>

    	<form action="register.php" method="POST">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="firstname" placeholder="Firstname" value="<?php echo (isset($_SESSION['firstname'])) ? $_SESSION['firstname'] : '' ?>" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="lastname" placeholder="Lastname" value="<?php echo (isset($_SESSION['lastname'])) ? $_SESSION['lastname'] : '' ?>"  required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
      		<div class="form-group has-feedback">
        		<input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : '' ?>" required>
        		<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      		</div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="repassword" placeholder="Retype password" required>
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>
          <div class="form-group">
					<label>Ration Card Number</label>
					<input type="ration" class="form-control" placeholder="Ration card number" name="rationnum" required>
				</div>
				<div class="form-group">
					<label>Family Head</label>
					<input type="Familyhead" class="form-control" placeholder="Family Head" name="head" required>
				</div>
				<div class="form-group">
					<label>Date of Birth</label>
					<input type="dob" class="form-control" placeholder="Date of Birth" name="dob" required>
				</div>
				<div class="radio">
					<label>Gender:</label>&nbsp&nbsp&nbsp&nbsp
					<label><input type="radio" name="gender" value="male">Male</label>&nbsp&nbsp&nbsp&nbsp
					<label><input type="radio" name="gender" value="female">Female</label>
				</div>
				<div class="form-group">
					<label for="address">Address:</label>
					<textarea class="form-control" rows="4" id="address" placeholder="Address" name="address" required></textarea>
				</div>
				<div class="form-group">
					<label>Phone number</label>
					<input type="contact" class="form-control" placeholder="Phone no." maxlength="10" name="contact_info" required>
				</div>
				<!--<div class="dropdown">
					<label>Card Colour</label>&nbsp&nbsp&nbsp&nbsp
					<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-hashpopup="true" aria-expanded="false">Dropdown
					<span class="caret"></span>
					</button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<li class="dropdown-item">Yellow</li>
					<li class="dropdown-item">Orange</li>
					<li class="dropdown-item">White</li>
					</div>
				</div>-->

				<div class="dropdown">
					<label>Card Colour:</label>&nbsp&nbsp&nbsp&nbsp
					<select name="dropdown" required>
					<option value="orange">orange</option>
					<option value="yellow">yellow</option>
					<option value="white">white</option> </select><br><br>
				</div>
				<div class="form-group">
					<label>No. of cylinders</label>
					<input type="cylinders" class="form-control" placeholder="cylinders" name="cylinder" required>
				</div>
				<div class="form-group">
					<label>Family Members</label>
					<input type="members" class="form-control" placeholder="Family Members" name="family" required>
				</div>
				<div class="form-group">
					<label>Adults</label>
					<input type="adult" class="form-control" placeholder="adults" name="adult" required>
				</div>
				<div class="form-group">
					<label>Childrens</label>
					<input type="children" class="form-control" placeholder="childrens" name="children" required>
				</div>
          
      		<div class="row">
    			<div class="col-xs-4">
					<button type="submit" id="btnAlert" class="btn btn-success btn-block" name="signup">Signup</button><br>
          			<!--<button type="submit" class="btn btn-primary btn-block btn-flat" name="signup"><i class="fa fa-pencil"></i> Sign Up</button>-->
        		</div>
      		</div>
    	</form>
      <br>
      <p>Already Registered? <a href="login.php">Click here to Login</a></p>
      <a href="index.php"><i class="fa fa-home"></i> Home</a>
  	</div>
</div>

<?php include 'includes/scripts.php' ?>
</div>
</body>
</html>
