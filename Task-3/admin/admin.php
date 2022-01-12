<?php
session_start();
error_reporting(0);

include "../configuration/config.php";

if ($_SESSION['user'] !== "admin") {
    header("Location: /auth.php");
}

$fetchListQuery = "SELECT * FROM examslist ";
$fetchexamrequest = mysqli_query($conn, $fetchListQuery);
$examslist = mysqli_fetch_all($fetchexamrequest);

$examname = $_POST['examchooser'];
$_SESSION['editorialexam'] = $_POST['examchooser'];

if (isset($_POST['examchooser'])) {
    $examfetchersql = "SELECT * FROM `$examname`";
    $examfetchrequest = mysqli_query($conn, $examfetchersql);
    $entireexam = mysqli_fetch_all($examfetchrequest, $mode = MYSQLI_ASSOC);
}




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
    <link rel="stylesheet" href="./admin.css">
    <link rel="stylesheet" href="../styles/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
</head>

<body>
    <?php //print_r($entireexam) 
    ?>
    <header>
        <?php include "../assets/navigation.php"; ?>
    </header>
    <main class="mainsec">
        <div class="admin-main">
            <div class="container-fluid mt-3">
                <form method="POST">
                    <label for="examchooser">Select Exam</label>
                    <select name='examchooser' <?php echo "required"; ?> class="input-field" value="">
                        <option value="">Select Exam</option>
                        <?php
                        for ($i = 0; $i < count($examslist); $i++) {
                            echo "<option value='" . $examslist[$i][1] . "'>" . $examslist[$i][1] . "</option>";
                        }
                        ?>
                    </select>
                    <input type="submit" value="Go" class="input-field" name="go" />
                </form>
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
                        <?php

                        for ($i = 0; $i < count($entireexam); $i++) {


                            echo "<form method='POST' action='/admin/edit/edit.php'>" . "<tr class='p-3'  >" .
                                "<td class='text-center'>" . $entireexam[$i]['id'] . "</td>"
                                . "<td  class='text-center'>" . $entireexam[$i]['rollnumber'] . "</td>"
                                . "<td  class='text-center'>" . $entireexam[$i]['name'] . "</td>"
                                . "<td  class='text-center'>" . $entireexam[$i]['dob'] . "</td>"
                                . "<td  class='text-center'>" . $entireexam[$i]['language-1'] . "</td>"
                                . "<td  class='text-center'>" . $entireexam[$i]['english'] . "</td>"
                                . "<td  class='text-center'>" . $entireexam[$i]['maths'] . "</td>"
                                . "<td  class='text-center'>" . $entireexam[$i]['science'] . "</td>"
                                . "<td  class='text-center'>" . $entireexam[$i]['socialscience'] . "</td>"
                                . "<td  class='text-center'>" . $entireexam[$i]['total'] . "</td>"
                                . "<td  class='text-center'>" . $entireexam[$i]['status'] . "</td>"
                                . "<td  class='text-center'><button name='submit' type='submit' value='" . $entireexam[$i]['rollnumber'] . "' name='submit' class='btn btn-primary'>Edit</button></td>"
                                . "</tr>" . "</form>";
                            $value = 'submit' . $i;
                        }

                        echo "<script> console.log('$i')</script>";
                        ?>
                    </tbody>
                </table>

            </div>

            <div class="class=" container-fluid mt-3">
                <table class="table widther mx-auto table-bordered table-striped table-hover">
                    <thead class="bg-dark">
                        <tr class="text-center text-light">
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
                            <th>Query</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="edit/updater.php" method="POST">
                        <tr class="text-center">
                            <td><input class="w-100" name="rollnumberins" type="text" placeholder="Roll Number"></td>
                            <td><input class="" name="nameins" type="text" placeholder="name"></td>
                            <td><input class="w-100" name="dobins" type="text" placeholder="mm/dd/yyyy"></td>
                            <td><input class="w-50" name="languageins" type="text" placeholder="00"></td>
                            <td><input class="w-50" name="englishins" type="text" placeholder="00"></td>
                            <td><input class="w-50" name="mathsins" type="text" placeholder="00"></td>
                            <td><input class="w-50" name="scienceins" type="text" placeholder="00"></td>
                            <td><input class="w-50" name="socialscienceins" type="text" placeholder="00"></td>
                            <td><input class="w-100" name="totalins" type="text" placeholder="000"></td>
                            <td><input class="w-100" name="statusins" type="text" placeholder="Pass / Fail"></td>
                            <td><input type="submit" name="submitins" value="Add" class="btn btn-primary"></td>
                        </tr>
                    </form>
                    </tbody>
                </table>
            </div>

        </div>
    </main>
</body>

</html>