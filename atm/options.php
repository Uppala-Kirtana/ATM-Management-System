<?php
require_once "config.php";

session_start();
$mainid = $_SESSION['mainid'];

if($_SESSION['mainid']){


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
        <h1 class="display-4" style="color: aliceblue;font-family: 'Times New Roman', Times, serif;">PINNACLE BANK</h1><br>
        <h6  style="color: rgb(137, 195, 194);"><i>Peak Performance in Every Transaction.</i></h6><br>
        <div style="text-align: right;padding-right:10px;padding-bottom:10px;">
            <a href="logout.php"><input type="submit" class="btn btn-light" value="Logout"></a>
        </div>
    </div><br><br>
    <div style="padding-left:20px;"><h4>User Name: <?php echo isset($a4) ? $a4 : ''; ?></h4></div>

        <div class="container row-cols-1 text-center" style="border: 2px solid black;">
            <h1 style="font-family: 'Times New Roman', Times, serif;">Please Select an Option</h1>
            <div class="row">
                <div class="col" style="text-align: center;justify-content: center; align-items: center; display: flex; padding-top: 30px; padding-bottom: 30px;">
                    <form action="" method="post">
                        <a href="cashwithdraw.php" class="btn btn-light b1" style="background-color:rgb(2, 73, 92);color:white;width:300px;height:70px;font-size: 23px; text-align: center; display: block; line-height: 60px; text-decoration: none;">Cash Withdrawal</a><br>
                        <a href="fundtransfer.php" class="btn btn-light b1" style="background-color:rgb(2, 73, 92);color:white;width:300px;height:70px;font-size: 23px; text-align: center; display: block; line-height: 60px; text-decoration: none;">Fund Transfer</a><br>
                        <a href="dep.php" class="btn btn-light b1" style="background-color:rgb(2, 73, 92);color:white;width:300px;height:70px;font-size: 23px; text-align: center; display: block; line-height: 60px; text-decoration: none;">Cash Deposit</a><br>
                    </form>
                </div>
                <div class="col" style="text-align: center;justify-content: center; align-items: center; display: flex; padding-top: 30px; padding-bottom: 30px;">
                    <form action="" method="post">
                    <a href="mini.php" class="btn btn-light b1" style="background-color:rgb(2, 73, 92);color:white;width:300px;height:70px;font-size: 23px; text-align: center; display: block; line-height: 60px; text-decoration: none;">Mini Statement</a><br>

                        <a href="bal.php" class="btn btn-light b1" style="background-color:rgb(2, 73, 92);color:white;width:300px;height:70px;font-size: 23px; text-align: center; display: block; line-height: 60px; text-decoration: none;">Balance Enquiry</a><br>
                        <a href="pinchange.php" class="btn btn-light b1" style="background-color:rgb(2, 73, 92);color:white;width:300px;height:70px;font-size: 23px; text-align: center; display: block; line-height: 60px; text-decoration: none;">Pin Change</a><br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
