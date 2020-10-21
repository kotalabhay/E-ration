<?php include 'includes/session.php'; ?>
<?php
  if(isset($_SESSION['user'])){
    header('location: cart_view.php');
  }
?>
<?php include 'includes/header.php'; ?>
<style>
#log
{
	border:2px solid white;
	padding:60px 40px;
	margin-top:80px;
	-webkit-box-shadow: 9px -7px 9px 0px rgba(0,0,0,0.79);
	-moz-box-shadow: 9px -7px 9px 0px rgba(0,0,0,0.79);
	box-shadow: 9px -7px 9px 0px rgba(0,0,0,0.79);
}
h1
{
	color:green;
	text-align:center;
	font-weight:bold;
	margin-top:-20px;
}
button
{
	-webkit-box-shadow: 9px 1px 25px 0px rgba(0,0,0,0.8);
	-moz-box-shadow: 9px 1px 25px 0px rgba(0,0,0,0.8);
	box-shadow: 9px 1px 25px 0px rgba(0,0,0,0.8);
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
</style>
<body class="hold-transition login-page" style="background:url('images/wood.jpeg'); background-size: cover;">
<div class="login-box">
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
  	<div class="login-box-body" id="log" style="background:url('images/wood.jpeg'); width:400px">
    	<p class="login-box-msg"><h1>Login Form</h1></p>

    	<form action="verify.php" method="POST">
      		<div class="form-group has-feedback">
        		<input type="email" class="form-control" name="email" placeholder="Email" required>
        		<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      		</div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
      		<div class="row">
    			<div class="col-xs-4">
					<button type="submit" name="login" id="but" class="btn btn-success btn-block">Login</button><br>
          			<!--<button type="submit" class="btn btn-primary btn-block btn-flat" name="login"><i class="fa fa-sign-in"></i> Sign In</button>-->
        		</div>
      		</div>
    	</form>
		<a href="password_forgot.php">Forgot password?</a><br><br>
		<p>New Customer? <a href="signup.php">Click here to register</a></p>
      <!--<a href="password_forgot.php">I forgot my password</a><br>
      <a href="signup.php" class="text-center">Register a new membership</a><br>-->
      <a href="index.php"><i class="fa fa-home"></i> Home</a>
  	</div>
</div>
	
<?php include 'includes/scripts.php' ?>
</body>
</html>