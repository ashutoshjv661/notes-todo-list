<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Register New User</title>
    <link rel="stylesheet" href="assets/extra/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
</head>

<script rel="text/javascript">
var check = function() {
  if (document.getElementById('Password').value ==
    document.getElementById('RepeatPassword').value && document.getElementById('Password').value ) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
    document.getElementById('submitbutton').style.display = "block";
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
    document.getElementById('submitbutton').style.display = "none";
  }
}

  </script>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="card shadow-lg o-hidden border-0 my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-flex">
                        <div class="flex-grow-1 bg-register-image" style="background-image: url(&quot;assets/img/dogs/image2.jpeg&quot;);"></div>
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h4 class="text-dark mb-4">Create an Account!</h4>
                            </div>
                            <form class="user" action="process/admin/usr_process.php" method ="POST">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="text" id="fname" placeholder="Full Name" name="fname" style="width: 41em;"></div>
                                </div>
                                <div class="form-group"><input class="form-control form-control-user" type="text" id="InputUserName"  placeholder="UserName" name="username" style="opacity: 1;"></div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="password" id="Password" placeholder="Password" name="password" onkeyup='check();'></div>
                                    <div class="col-sm-6"><input class="form-control form-control-user" type="password" id="RepeatPassword" placeholder="Repeat Password" name="password_repeat" onkeyup='check();' ></div>
                                    <div> <p id="message"></p></div>
                                </div>
                                
                                <input type="hidden" name="role" value="11">
                                <hr>

                                <input id="submitbutton" type="submit" value="Register" name="addUserHome" class="btn btn-rose btn-link btn-lg">
                                
                            <a href="functions/signout.php" class="btn btn-rose btn-link btn-lg" value="Home">Home</a>
                                <hr>

                            </form>
                            <div class="text-center"></div>
                            <div class="text-center"><a class="small" href="login.php">Already have an account? Login!</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/extra/assets/js/jquery.min.js"></script>
    <script src="assets/extra/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/extra/assets/js/theme.js"></script>
</body>

</html>
<?php
    if(isset($_GET['error'])){
           if($_GET['error']==1){        
            echo "<script>alert('Please Fill The Form!');</script>";
        }
    }
        
?>