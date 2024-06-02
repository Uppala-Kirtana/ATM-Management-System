<?php
require_once "config.php";

session_start();
$mainid = $_SESSION['mainid'];

if($_SESSION['mainid']){


$qry = mysqli_query($conn, "SELECT acc_type FROM u_login WHERE status='1' AND u_id='$mainid'") or die(mysqli_error($conn));

if ($qry) {
    $row = mysqli_fetch_assoc($qry);
    $accType = $row['acc_type'];

    if ($accType == 'C') {
        $accountTypeMessage = "CURRENT";
    } elseif ($accType == 'S') {
        $accountTypeMessage = "SAVINGS";
    } else {
        $accountTypeMessage = "Invalid account type";
    }
} else {
    $accountTypeMessage = "Error fetching account type";
}

if (isset($_POST['exit'])) {
    session_destroy();
    header("location:login.php");
}

if(isset($_POST['proceed'])){

    header("location:withdraw.php");


}


if ($qry3) {
    $r3 = mysqli_fetch_assoc($qry3);
    $a3 = $r3['u_name'];
}

$qry4 = mysqli_query($conn, "SELECT u_name FROM u_login WHERE status='1' AND u_id='$mainid'") or die(mysqli_error($conn));

if ($qry4) {
    $r4 = mysqli_fetch_assoc($qry4);
    $a4 = $r4['u_name'];
}

}else{
    header("location:login.php");

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinnacle Bank</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="c1">
        <h1 class="display-4" style="color: aliceblue; font-family: 'Times New Roman', Times, serif;">PINNACLE BANK</h1><br>
        <h6 style="color: rgb(137, 195, 194);"><i>Peak Performance in Every Transaction.</i></h6><br>
        <div style="text-align: right;padding-right:10px;padding-bottom:10px;">
            <a href="logout.php"><input type="submit" class="btn btn-light" value="Logout"></a>
        </div>
    </div><br><br><br>

    <div style="padding-left:20px; padding-right:20px; padding-bottom:20px;">
    <div style="padding-left:20px;"><h4>User Name: <?php echo isset($a4) ? $a4 : ''; ?></h4></div>

        <div class="container row-cols-1 text-center" style="border: 2px solid black;">
            <div class="row">
                <div class="col" style="background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSdNS5cXHQUws46X_jDpngLWqthWMmiyw_AYA&usqp=CAU);"></div>

                <div class="col" style="text-align: center; justify-content: center; align-items: center; display: flex; padding-top: 30px; padding-bottom: 30px;">
                    <form action="" method="post">
                        <label for="">
                            <h2 style="font-family: 'Times New Roman', Times, serif;">Your Account Type is: <?php echo isset($accountTypeMessage) ? $accountTypeMessage : ''; ?></h2><br>
                        </label><br>

                        <input type="submit" class="btn btn-dark" id="proceed" name="proceed" value="Click to proceed" />

                    </form>
                </div>
            </div>
        </div><br><br>
    </div>
</body>
</html>
