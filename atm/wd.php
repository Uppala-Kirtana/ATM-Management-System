<?php
require_once "config.php";

session_start();
$mainid=$_SESSION['mainid'];
// echo $mainid;
// return;

if($_SESSION['mainid']){


if(isset($_POST['done'])){

    header("location:options.php");


}

$qry1= mysqli_query($conn, "SELECT u_acc FROM u_login WHERE status='1' AND u_id='$mainid'") or die(mysqli_error($conn));

if ($qry1) {
    $r1 = mysqli_fetch_assoc($qry1);
    $a1 = $r1['u_acc'];
}


$qry2 = mysqli_query($conn, "SELECT withdraw FROM u_acc WHERE status='1' AND u_id='$mainid' AND withdraw IS NOT NULL ORDER BY cdt DESC LIMIT 1") or die(mysqli_error($conn));

if ($qry2) {
    $r2 = mysqli_fetch_assoc($qry2);
    $a2 = $r2['withdraw'];
}

$qry3 = mysqli_query($conn, "SELECT cdt FROM u_acc WHERE status='1' AND u_id='$mainid' AND withdraw IS NOT NULL ORDER BY cdt DESC LIMIT 1") or die(mysqli_error($conn));

if ($qry3) {
    $r3 = mysqli_fetch_assoc($qry3);
    $a3 = $r3['cdt'];
}

$qry4 = mysqli_query($conn, "SELECT u_name FROM u_login WHERE status='1' AND u_id='$mainid'") or die(mysqli_error($conn));

if ($qry4) {
    $r4 = mysqli_fetch_assoc($qry4);
    $a4 = $r4['u_name'];
}

if(isset($_POST['submit'])){

    header("location:enterpin.php");


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
    </div><br><br><br>

    <div style="padding-left:20px;padding-right:20px;padding-bottom:20px;">
    <div style="padding-left:20px;"><h4>User Name: <?php echo isset($a4) ? $a4 : ''; ?></h4></div>

        <div class="container row-cols-1 text-center" style="border: 2px solid black;">
            <div class="row">
                <div class="col" style="background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSdNS5cXHQUws46X_jDpngLWqthWMmiyw_AYA&usqp=CAU);">
                    
                </div>

                <div class="col" style="text-align: center;justify-content: center; align-items: center; display: flex; padding-top: 30px; padding-bottom: 30px;">
                    <form action="" method="post">
                        <label for="">
                        <h2 style="font-family: 'Times New Roman', Times, serif;">Transaction Details</h2><br>
                        </label><br>
                        <table style="border:2px solid black; padding: 20px;">
                            <tr>

                                <th style="border:2px solid black; padding: 20px;">Account No.</th>

                                <th style="border:2px solid black; padding: 20px;">Amount Withdrawn</th>
                                <th style="border:2px solid black; padding: 20px;">Last Withdrawn Timestamp</th>
                            </tr>
                            <tr>

                                <td style="border:2px solid black; padding: 20px;"><?php echo isset($a1) ? $a1 : ''; ?></td>
                                <td style="border:2px solid black; padding: 20px;"><?php echo isset($a2) ? $a2 : ''; ?></td>
                                <td style="border:2px solid black; padding: 20px;"><?php echo isset($a3) ? $a3 : ''; ?></td>

                            </tr>
                        </table><br><br>
                            <input type="submit" class="btn btn-dark" id="done" name="done" value="Done" />
                    </form>
                    
                </div>

            </div>
        </div><br><br>
</div>
    
</body>
</html>