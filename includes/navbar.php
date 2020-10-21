
<header class="main-header">
  <nav class="navbar navbar-static-top" style="background-color:blue; height:60px">
    <div class="container">
      <div class="navbar-header" >
        <a href="index.php" class="navbar-brand"><b>E-Ration</b>Shop</a>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
          <i class="fa fa-bars"></i>
        </button>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
        <ul class="nav navbar-nav">
          <li><a href="index.php"><b>HOME</b></a></li>
          <!--<li><a href="">ABOUT US</a></li>-->

        <!--  <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">CATEGORY <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">-->
            <!--  <li><a href="" role="menu">All Items </a></li> -->
              <?php
              if(isset($_SESSION['user'])){
            //    $image = (!empty($user['photo'])) ? 'images/'.$user['photo'] : 'images/profile.jpg';
            $conn = $pdo->open();
            try{
              //	$ration_colour=$conn->prepare("SELECT * FROM users WHERE email=:email");
              //  $ration_colour->execute(['email'=>$user['email']]);
              //  $colour	=$ration_colour->fetch();
              $stmt = $conn->prepare("SELECT * FROM category WHERE name =:name");
              $stmt->execute(['name'=> $user['dropdown']]);
              foreach($stmt as $row){
                echo "
                  <li><a href='category.php?category=".$row['cat_slug']."'>".$row['name'].' card(View-Items)'. "</a></li>
                ";
              }
            }
            catch(PDOException $e){
              echo "There is some problem in connection: " . $e->getMessage();
            }

            $pdo->close();

              }
              else{

                $conn = $pdo->open();
                try{
                  $stmt = $conn->prepare("SELECT * FROM category");
                  $stmt->execute();
                  echo "<li><a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Ration Products<span class=\"caret\"></span></a>
						<ul class=\"dropdown-menu\" role=\"menu\"></li>";
                  foreach($stmt as $row){
                  echo "
                      <li><a href='category.php?category=".$row['cat_slug']."'>".$row['name']."</a></li>
                    ";
                  }
                }
                catch(PDOException $e){
                  echo "There is some problem in connection: " . $e->getMessage();
                }

                $pdo->close();

             }
              //echo"hello";

              ?>
            </ul>
          </li>
        </ul>
        <form method="POST" class="navbar-form navbar-left" action="search.php">
          <div class="input-group" style="border: 2px solid lightblue; width:150px">
              <input type="text" class="form-control" id="navbar-search-input" name="keyword" placeholder="Search for Product" required>
              <span class="input-group-btn" id="searchBtn" style="display:none;">
                  <button type="submit" class="btn btn-default btn-flat" style="background-color:lightgreen"><i class="fa fa-search"></i> </button>
              </span>
          </div>
        </form>
      </div>
      <!-- /.navbar-collapse -->
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-shopping-cart"></i>
              <span class="label label-success cart_count"></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have <span class="cart_count"></span> item(s) in cart</li>
              <li>
                <ul class="menu" id="cart_menu">
                </ul>
              </li>
              <li class="footer"><a href="cart_view.php">Go to Cart</a></li>
            </ul>
          </li>
          <?php
            if(isset($_SESSION['user'])){
              $image = (!empty($user['photo'])) ? 'images/'.$user['photo'] : 'images/profile.jpg';
              echo '
                <li class="dropdown user user-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="'.$image.'" class="user-image" alt="User Image">
                    <span class="hidden-xs">'.$user['firstname'].' '.$user['lastname'].'</span>
                  </a>
                  <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                      <img src="'.$image.'" class="img-circle" alt="User Image">

                      <p>
                        '.$user['firstname'].' '.$user['lastname'].'
                        <small>Member since '.date('M. Y', strtotime($user['created_on'])).'</small>
                      </p>
                    </li>
                    <li class="user-footer">
                      <div class="pull-left">
                        <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                      </div>
                      <div class="pull-right">
                        <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                      </div>
                    </li>
                  </ul>
                </li>
              ';
            }
            else{
              echo "
                <li><a href='login.php'><b>LOGIN</b></a></li>
                <li><a href='signup.php'><b>SIGNUP</b></a></li>
              ";
            }
          ?>
		  <li style="background-color:red; height:60px"><a href=""><b>CONTACT US</b></a></li>

        </ul>
      </div>
    </div>
  </nav>
</header>
