<?php
session_start();
error_reporting(0);

include "configuration/config.php";

$_SESSION['user'] = $_POST['userid'];

$user = $_POST['userid'];
$pass = $_POST['pass'];

if (isset($_POST['userid']) && isset($_POST['pass']) && isset($_POST['submit'])) {
    $userfetchsql = "SELECT * FROM `auth` WHERE username = '$user'";
    $userfetchrequest = mysqli_query($conn, $userfetchsql);
    $userdata = mysqli_fetch_assoc($userfetchrequest);
    if ($userdata) {

        if ($pass == $userdata['password']) {
            header("Location: /admin/admin.php");
        } else {
            echo "<script>alert('Incorrect Password')</script>";
        }
    } else {
        echo "<script>alert('Incorrect Username')</script>";
    }
}



?>

<html>

<head>
    <title>Admin Login</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width = device-width; initial-scale = 1.0 ">
    <meta name="og:title" content="<?php echo $_SESSION['examname'] ?> results">
    <meta name="og:description" content="LetsGrowMore Web-Developement Intern TAsk-3">
    <meta name="theme-color" content="#ff00ff">
    <meta name="X-UA-Compatible" content="IE-edge">
    <link rel="stylesheet" href="./styles/auth.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
</head>

<body>
    <section class="vh-100" style="background-color: #508bfc;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <form method="POST">
                                <h3 class="mb-5">Admin Sign-in</h3>

                                <div class="form-outline mb-4">
                                    <input name="userid" type="text" id="typeEmailX-2" class="form-control form-control-lg" />
                                    <label class="form-label" for="typeEmailX-2">ID</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input name="pass" type="password" id="typePasswordX-2" class="form-control form-control-lg" />
                                    <label class="form-label" for="typePasswordX-2">Password</label>
                                </div>

                                <input class="btn btn-primary btn-lg btn-block" type="submit" name="submit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>