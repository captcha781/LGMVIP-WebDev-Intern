<?php
session_start();
error_reporting(0);

include "../../configuration/config.php";

if ($_SESSION['user'] !== "admin") {
    header("Location: /auth.php");
}


$editorialexam = $_SESSION['editorialexam'];

$rollnumber = $_POST['submit'];

$editorialsqlreq = "SELECT * FROM `$editorialexam` WHERE rollnumber='$rollnumber'";
$editorialres = mysqli_query($conn, $editorialsqlreq);
$editorialarr = mysqli_fetch_assoc($editorialres);

$_SESSION['id'] = $editorialarr['id'];

?>


<html>

<head>
    <title>Admin Page</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width = device-width; initial-scale = 1.0 ">
    <meta name="og:title" content="<?php echo $_SESSION['examname'] ?> results">
    <meta name="og:description" content="LetsGrowMore Web-Developement Intern TAsk-3">
    <meta name="theme-color" content="#ff00ff">
    <meta name="X-UA-Compatible" content="IE-edge">
    <link rel="stylesheet" href="../admin.css">
    <link rel="stylesheet" href="../../styles/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
</head>

<body>
    
    <header>
        <?php include "../../assets/navigation.php"; ?>
    </header>
    <main class="mainsec">
        <div class="admin-main">
            <div class="container-fluid mt-3">
                <form method="POST" action="updater.php">
                    <table class="table widther mx-auto table-bordered table-striped table-hover">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th>S.no</th>
                                <th>Roll Number</th>
                                <th>Name</th>
                                <th>DOB[mm/dd/yyyy]</th>
                                <th>Language</th>
                                <th>English</th>
                                <th>Maths</th>
                                <th>Science</th>
                                <th>Social Science</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Update</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center">
                                <td><?php echo $editorialarr['id']; $idval = $editorialarr['id'] ?></td>
                                <td><input class="w-100" name="rollnumber" value="<?php echo $editorialarr['rollnumber'] ?>"></td>
                                <td><input class="" name="name" value="<?php echo $editorialarr['name'] ?>"></td>
                                <td><input class="w-100" name="dobs" value="<?php echo $editorialarr['dob'] ?>"></td>
                                <td><input class="w-50" name="language-1" value="<?php echo $editorialarr['language-1'] ?>"></td>
                                <td><input class="w-50" name="english" value="<?php echo $editorialarr['english'] ?>"></td>
                                <td><input class="w-50" name="maths" value="<?php echo $editorialarr['maths'] ?>"></td>
                                <td><input class="w-50" name="science" value="<?php echo $editorialarr['science'] ?>"></td>
                                <td><input class="w-50" name="socialscience" value="<?php echo $editorialarr['socialscience'] ?>"></td>
                                <td><input class="w-100" name="total" value="<?php echo $editorialarr['total'] ?>"></td>
                                <td><input class="w-100" name="status" value="<?php echo $editorialarr['status'] ?>"></td>
                                <td><input class="btn btn-success" type="submit" value="Save" name="submit"></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </main>
</body>

</html>