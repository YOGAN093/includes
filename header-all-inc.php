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
  line-height: 15px;
  border-radius: 4px;
}

.header a.logo {
  font-size: 40px;
  font-weight: bold;
}

.header a:hover {
  background-color: #263547;
  color: black;
}

.header a.active {
    color:  black;
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
<div class="header">
  <a href="#default" class="logo">ESTIMATOR</a>
  <div class="header-right">
    <a class="active" href="../index.php">Home</a>
  </div>
</div>

</body>
</html>
