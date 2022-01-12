<?php
include "../configuration/config.php";
session_start();
error_reporting(0);

$examname = $_SESSION['examname'];
$rolls = $_SESSION['rollnumber'];
$old_date = $_SESSION['dob'];
$new_date = date('m/d/Y', strtotime($old_date));


$result_req = "SELECT * FROM `$examname` WHERE rollnumber = '$rolls' AND dob = '$new_date'";
$result_func = mysqli_query($conn, $result_req);


$resultList = mysqli_fetch_assoc($result_func);
$resultListarr = mysqli_fetch_array($result_func);

if ($resultList == false) {
    echo "<script>alert('No results found, enter correct credentials in required format')</script>";
}

if ($resultList['total'] < 250) {
    $totalSelector = "bg-danger";
} else {
    $totalSelector = "bg-success";
}

if($resultList['status'] == "PASS"){
    $statusselector = "bg-success";
} else {
    $statusselector = "bg-danger";
    $totalSelector = "bg-danger";
}


function statusfinder($value)
{
    if ($value < 50) {
        echo "<td class='bg-danger'>F</td>";
    } else {
        echo "<td class='bg-success'>P</td>";
    }
}

$_SESSION['user'] = $resultList['name'];

?>

<html>

<head>
    <title><?php echo $_SESSION['examname'] ?> results</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width = device-width; initial-scale = 1.0 ">
    <meta name="og:title" content="<?php echo $_SESSION['examname'] ?> results">
    <meta name="og:description" content="LetsGrowMore Web-Developement Intern TAsk-3">
    <meta name="theme-color" content="#ff00ff">
    <meta name="X-UA-Compatible" content="IE-edge">
    <link rel="stylesheet" href="./results.css">
    <link rel="stylesheet" href="../styles/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <?php include "../assets/navigation.php"; ?>
    </header>
    <main class="mainsec">
        <div class="result-main">
            <h2 class="headline"> Result for <?php print_r($resultList['rollnumber']); ?> for <?php echo $examname ?> </h2>
            <table class="table w-50 table-bordered table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Content</th>
                        <th>Results</th>
                        <th>Status</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Name</td>
                        <td><?php echo $resultList['name'] ?></td>

                    </tr>
                    <tr>
                        <td>Roll Number</td>
                        <td><?php echo $resultList['rollnumber'] ?></td>

                    </tr>
                    <tr>
                        <td>Language</td>
                        <td><?php echo $resultList['language-1'] ?></td>
                        <?php statusfinder($resultList['language-1']) ?>
                    </tr>
                    <tr>
                        <td>English</td>
                        <td><?php echo $resultList['english'] ?></td>
                        <?php statusfinder($resultList['english']) ?>
                    </tr>
                    <tr>
                        <td>Maths</td>
                        <td><?php echo $resultList['maths'] ?></td>
                        <?php statusfinder($resultList['maths']) ?>
                    </tr>
                    <tr>
                        <td>Science</td>
                        <td><?php echo $resultList['science'] ?></td>
                        <?php statusfinder($resultList['science']) ?>
                    </tr>
                    <tr>
                        <td>Social-Science</td>
                        <td><?php echo $resultList['socialscience'] ?></td>
                        <?php statusfinder($resultList['socialscience']) ?>
                    </tr>
                    <tr class="<?php echo $totalSelector ?>">
                        <td>Total</td>
                        <td><?php echo $resultList['total'] ?></td>
                        <td class="<?php echo $statusselector ?>" ><?php echo $resultList['status'] ?></td>
                    </tr>
                </tbody>
            </table>

        </div>

    </main>
</body>

</html>