 <?php
session_start();
if(!$_SESSION['userid'])
{
  header("Location: index.php");
  exit();
}
require_once("db.php");
 ?>
 <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">

<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style type="text/css">
  body{
   margin-top: 20px;
  background-image: url("data:image/jpeg;base64,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");
  background-size: cover; 
  color: white;
  }
</style>
    <title>EMPTAL</title>
  </head>
  <body>
    <style>
       .navbar {
    margin-bottom: 0;
    background-color: #0d0d0d;
    z-index: 9999;
    border: 0;
    font-size: 12px !important;
    line-height: 1.42857143 !important;
    letter-spacing: 4px;
    border-radius: 0;
}
.navbar .dropdown-menu{
  background-color: #0d0d0d;
}
.navbar li a, .navbar .navbar-brand {
    color: #fff !important;
}

.navbar-nav li a:hover, .navbar-nav li.active a {
    color: #f4511e !important;
    background-color: #fff !important;
}

.navbar-default .navbar-toggle {
    border-color: transparent;
    color: #fff !important;
}
.form{
  color:#0d0d0d;
  margin-top: 80px;
}
.btn{
  background-color: #0d0d0d;
}
.navbar-brand{
 font-family: "Bauhaus 93", Times, serif; 
}
</style>
  <header>
    <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="index.php">EMPTAL</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
            <li><a href="dashboard.php">DASHBOARD</a></li> 
         <li><a href="logout.php">LOGOUT<span class="glyphicon glyphicon-log-out logo"></span></a></li> 
      </ul>
    </div>
  </div>
</nav>
</header>
<section>
<div class="container text-dark form">
<div class="row">
<div class="col-md-8">
<h2 class="text-center text-dark">Profile</h2>
   <form action="update.php" method="POST">
    <?php
    $sql="SELECT * FROM register WHERE userid='$_SESSION[userid]'";
    $result=$conn->query($sql);
    if($result->num_rows>0)
    {
      while($row=$result->fetch_assoc()){
    ?>
    <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" value="<?php echo $row['name']?>"  placeholder="Name">
    </div>
    <div class="form-row">
    <div class="form-group col-md-12">
      <label for="email">Email</label>
      <input type="email" class="form-control" name="email" value="<?php echo $row['email']?>" placeholder="Email" readonly>
    </div>
  </div>
  <div class="form-group">
    <label for="address">Address</label>
    <input type="text" class="form-control" name="address" value="<?php echo $row['address']?>" placeholder="Address">
  </div>
  <div class="form-row">
  <div class="form-group col-md-4">
    <label for="country">Country</label>
    <input type="text" class="form-control" name="country" value="<?php echo $row['country']?>" placeholder="Country">
  </div>
    <div class="form-group col-md-4">
      <label for="city">City</label>
      <input type="text" class="form-control" value="<?php echo $row['city']?>" name="city">
    </div>
    <div class="form-group col-md-4">
      <label for="pincode">Zip</label>
      <input type="text" class="form-control" onkeypress="return validatephone(event);" value="<?php echo $row['pincode']?>" name="pincode">
    </div>
  </div>
	<div class="form-group col-md-12">
      <label for="sex">SEX</label>
      <input type="text" class="form-control" name="sex" maxlength="1" onkeypress="return validatesex(event);" value="<?php echo $row['sex']?>" placeholder="M or F">
    </div>
	<div class="form-row">
    <div class="form-group col-md-6">
      <label for="mobile">Mobile No.</label>
      <input type="text" class="form-control" name="mobile" minlength="10"  onkeypress="return validatephone(event);" value="<?php echo $row['mobile']?>" maxlength="10" placeholder="Mobile">
    </div>
    <div class="form-group col-md-6">
      <label for="phone">Phone No.</label>
      <input type="text" class="form-control"  onkeypress="return validatephone(event);" name="phone" value="<?php echo $row['phone']?>" placeholder="Phone">
  </div>
  </div>
	<div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputdob">Date of Birth</label>
      <input type="Date" class="form-control" name="dob" value="<?php echo $row['dob']?>" placeholder="DD-MM-YYYY">
    </div>
    <div class="form-group col-md-6">
      <label for="inputdoj">Date of Join</label>
      <input type="Date" class="form-control" name="doj" value="<?php echo $row['doj']?>" placeholder="DD-MM-YYYY">
  </div>
  </div>
	<div class="form-group">
    <label for="inputDepartment">Department</label>
    <input type="text" class="form-control" name="department" value="<?php echo $row['department']?>" placeholder="Department">
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary btn-block" name="submit">Update</button>
  </div> 
  <?php
}
}
?>
  </form>
</div>
</div>
</div>
</section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script type="text/javascript">
      function validatephone(event){
        var key=window.event?event.keyCode:event.which;
        if (event.keyCode==8 || event.keyCode==46 || event.keyCode==37 || event.keyCode==39) {return true;}else if (key<48 || key>57) {return false;}else return true;
      }
      function validatesex(event) {
        var key=window.event?event.keyCode:event.which;
        if (event.keyCode==8 || event.keyCode==46 || event.keyCode==37 || event.keyCode==39) {return true;}else if (key==70 || key==77 || key==102 || key==109) {return true;}else return false;

        // body...
      }
    </script>
  </body>
</html> 