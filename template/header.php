<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style>
* {box-sizing: border-box;}

body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
.vl {
  border-left: 6px solid green;
  height: 500px;
}

.header {
  overflow: hidden;
  background-color: #f1f1f1;
  padding: 20px 10px;
}

.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}

.header a.logo {
  font-size: 25px;
  font-weight: bold;
}

.header a:hover {
  background-color: #ddd;
  color: black;
}

.header a.active {
  background-color: dodgerblue;
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
  .table{
    border: solid black 1px;
    border-collapse: collapse;
  }
  .p {
  border: 2px solid red;
  border-radius: 5px;
}
  }
}
</style>
    <!-- header -->
    <?php
      if($title == "home"){
    ?>
    <div class="header">
      <a  class="logo">welcome</a>
        <div class="header-left">
          <a class="active" href="#" >Home</a>
          <a href="#">Contact</a>
          <a href="#">About</a>
        </div>
    </div>
    <?php
      }else{
    ?>
    <div class="header">
      <a href="#default" class="logo">Not Home</a>
        <div class="header-left">
          <a class="active" href="#">Home</a>
          <a href="#">Contact</a>
          <a href="#">About</a>
        </div>
    </div>
    <?php
      }
    ?>
  </head>