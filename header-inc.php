<html>
<head>
<style>
* {box-sizing: border-box;}


.header {
  overflow: hidden;
  background-color: #f1f1f1;
  padding: 20px 10px;
}

.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 17px;
  text-decoration: none;
  font-size: 15px; 
  line-height: 25px;
  border-radius: 4px;
}

.header a.logo {
  font-size: 40px;
  font-weight: bold;
}

.header a:hover {
  background-color: #ddd;
  color: black;
}

.header a.active {
  background-color: #263547;
  color: white;
}

.header-right {
  float: right;
}

@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  
  .header-right {
    float: none;
  }
}

</style>
</head>
<body>
                                
                                  <?php 
                                  if(isset($_SESSION['email']))
                                    {
                                        if($_SESSION['role']==='Engineer')
                                        {?>
                                            <div class="header">
                                            <a href="#default" class="logo">ESTIMATOR</a>
                                            <div class="header-right">
                                              <a class="active" href="../index.php">Home</a>
                                              <a href="contact.php">Contact us</a>
                                              <a href="Engineer.php">Update profile</a>
                                              <a href="plan.php">Upload your idea</a>
                                              <a href="includes/logout-inc.php">Logout</a>
                                            </div>
                                          </div>
                                         <?php
                                                              }
                                        else if($_SESSION['role']==='User')
                                        {?>
                                           <div class="header">
                                          <a href="#default" class="logo">ESTIMATOR</a>
                                            <div class="header-right">
                                            <a class="active" href="../index.php">Home</a>
                                            <a href="contact.php">Contact us</a>
                                            <a href="includes/detail.php">Search for engineers</a>
                                            <a href="includes/plan-table-user.php">Our engineers plans</a>
                                            <a href="estimator.php">Estimation</a>
                                            <a href="includes/logout-inc.php">Logout</a>
                                            </div>
                                            </div>

                                      <?php  }

                                        }
                                        else
                                        {?>
                                            <div class="header">
                                            <a href="#default" class="logo">ESTIMATOR</a>
                                            <div class="header-right">
                                              <a class="active" href="../index.php">Home</a>
                                              <a href="contactus.php">Contact us</a>
                                              <a href="#about">About</a>
                                              <a href="register.php">Signup</a>
                                              <a href="login.php">Login</a>
                                            </div>
                                          </div>
                                          
                                       <?php }
                                    ?>
</body>
</html>
