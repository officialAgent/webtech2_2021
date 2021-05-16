
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'functions/register.php';
include 'functions/login.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/index.css" type="text/css">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<body>


<header class="header">
    <div class="brand-box">
        <span class="brand">Online Test Aplication  </span>
    </div>

    <div class="text-box">
        <h1 class="heading-primary">
            <span class="heading-primary-main">Online Test Aplication</span>
            <span class="heading-primary-sub">STU FEI WETECH 2 FINAL ZADANIE 2021  </span>
        </h1>
        <a href="#login" class="btn btn-white btn-animated">Login </a>
        <button type="button" style="    border-radius: 100px;text-transform: uppercase;padding: 10px 20px;" class="btn btn-white btn-animated" data-toggle="modal" data-target="#form">
           Register
        </button>
    </div>
</header>

<div>
    <div id="login" class="page">
        <div class="container">
            <div class="left">
                <div class="login"><?php
                    if (isset($error2)){
                        echo $error2;

                    }
                    else{
                        echo "Login";
                    }
                    ?></div>
                <div class="eula">By logging in you agree to the ridiculously long terms that you didn't bother to read</div>
            </div>
            <div class="right">
                <svg viewBox="0 0 320 300">
                    <defs>
                        <linearGradient
                                inkscape:collect="always"
                                id="linearGradient"
                                x1="13"
                                y1="193.49992"
                                x2="307"
                                y2="193.49992"
                                gradientUnits="userSpaceOnUse">
                            <stop
                                    style="stop-color:#ff00ff;"
                                    offset="0"
                                    id="stop876" />
                            <stop
                                    style="stop-color:#ff0000;"
                                    offset="1"
                                    id="stop878" />
                        </linearGradient>
                    </defs>
                    <path d="m 40,120.00016 239.99984,-3.2e-4 c 0,0 24.99263,0.79932 25.00016,35.00016 0.008,34.20084 -25.00016,35 -25.00016,35 h -239.99984 c 0,-0.0205 -25,4.01348 -25,38.5 0,34.48652 25,38.5 25,38.5 h 215 c 0,0 20,-0.99604 20,-25 0,-24.00396 -20,-25 -20,-25 h -190 c 0,0 -20,1.71033 -20,25 0,24.00396 20,25 20,25 h 168.57143" />
                </svg>
                <div class="form" >
                    <form method="get" action="">
                    <label for="email">Email</label>
                    <input type="email" name="logemail" id="email">
                    <label for="password">Password</label>
                    <input type="password" name="logpassword" id="password">
                    <input type="submit" id="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>




    <div class="modal fade" id="form" tabindex="-1" role="dialog" data-target="#exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <h5 class="modal-title" id="exampleModalLabel"><?php
                        if (isset($error)){
                            echo $error;

                        }
                        else{
                            echo "Create Account";
                        }
                        ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post">
                    <div  class="modal-body  ">

                        <select name="role"  class="form-select kerek" aria-label="Default select example">
                            <option selected>Select Role</option>
                            <option value="1">Student</option>
                            <option value="2">Teacher</option>

                        </select>

                        <div class="form-group">
                            <label for="email1">Email address</label>
                            <input type="email" class="form-control kerek" name="email" id="email1" aria-describedby="emailHelp" placeholder="Enter email">

                        </div>
                        <div class="form-group">
                            <label for="password1">Password</label>
                            <input type="password" class="form-control kerek" name="password" id="password1" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="id">ID</label>
                            <input type="text" class="form-control kerek" name="uid" id="id" placeholder="ID">
                        </div>

                        <div class="form-group">
                            <label for="name"> First Name</label>
                            <input type="text" class="form-control kerek" name="fname" id="name" placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <label for="lname">Last Name</label>
                            <input type="text" class="form-control kerek" name="lname" id="lname" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="modal-footer border-top-0 d-flex justify-content-center">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



</div>



<div class="container-fluid pb-0 mb-0 justify-content-center text-light ">
    <footer>
        <div class="row my-5 justify-content-center py-5">
            <div class="col-11">
                <div class="row ">
                    <div class="col-xl-8 col-md-4 col-sm-4 col-12 my-auto mx-auto a">
                        <h3 class="text-muted mb-md-0 mb-5 bold-text ">Made by:</h3>
                        <h4></h4>
                        <h4>Tibor Ládi</h4>
                        <h4>Ladislav Rajcsányi</h4>
                        <h4>Tódor Sándor</h4>
                        <h4>Zsombor Orosz</h4>
                    </div>
                    <div class="col-xl-2 col-md-4 col-sm-4 col-12">

                    </div>
                    <div class="col-xl-2 col-md-4 col-sm-4 col-12">
                        <h6 class="mb-3 mb-lg-4 text-muted bold-text mt-sm-0 mt-5"><b>Contact</b></h6>
                        <p class="mb-1">tibififa@gmail.com</p>
                        <p>+421 918 725 469</p>
                    </div>
                </div>
               <!-- <div class="row ">
                    <div class="col-xl-8 col-md-4 col-sm-4 col-auto my-md-0 mt-5 order-sm-1 order-3 align-self-end">
                        <p class="social text-muted mb-0 pb-0 bold-text"> <span class="mx-2"><i class="fa fa-facebook" aria-hidden="true"></i></span> <span class="mx-2"><i class="fa fa-linkedin-square" aria-hidden="true"></i></span> <span class="mx-2"><i class="fa fa-twitter" aria-hidden="true"></i></span> <span class="mx-2"><i class="fa fa-instagram" aria-hidden="true"></i></span> </p><small class="rights"><span>&#174;</span> All Rights Reserved.</small>
                    </div>
                    <div class="col-xl-2 col-md-4 col-sm-4 col-auto order-1 align-self-end ">
                        <h6 class="mt-55 mt-2 text-muted bold-text"><b>ANIRUDH SINGLA</b></h6><small> <span><i class="fa fa-envelope" aria-hidden="true"></i></span> anirudh@gmail.com</small>
                    </div>
                    <div class="col-xl-2 col-md-4 col-sm-4 col-auto order-2 align-self-end mt-3 ">
                        <h6 class="text-muted bold-text"><b>RISHABH SHEKHAR</b></h6><small><span><i class="fa fa-envelope" aria-hidden="true"></i></span> rishab@gmail.com</small>
                    </div>
                </div>-->
            </div>
        </div>
    </footer>
</div>





<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src=https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.js"></script>
<script src="js/js.js"></script>

<?php

if (isset($error)){

    echo "<script>
                                $('#form').modal('show')

</script>";
}
?>
</body>
</html>
