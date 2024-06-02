<?php
require_once "config.php";

session_start();
$mainid = $_SESSION['mainid'];

if($_SESSION['mainid']){

$i=1;


if (isset($_POST['done'])) {
    header("location:options.php");
}

$qry1= mysqli_query($conn, "SELECT u_acc FROM u_login WHERE status='1' AND u_id='$mainid'") or die(mysqli_error($conn));

if ($qry1) {
    $r1 = mysqli_fetch_assoc($qry1);
    $a1 = $r1['u_acc'];
}

$qry2 = mysqli_query($conn, "SELECT acc_bal FROM u_login WHERE status='1' AND u_id='$mainid'") or die(mysqli_error($conn));

if ($qry2) {
    $r2 = mysqli_fetch_assoc($qry2);
    $a2 = $r2['acc_bal'];
}


$qry4 = mysqli_query($conn, "SELECT u_name FROM u_login WHERE status='1' AND u_id='$mainid'") or die(mysqli_error($conn));

if ($qry4) {
    $r4 = mysqli_fetch_assoc($qry4);
    $a4 = $r4['u_name'];
}

$query = "SELECT *, 
            CASE
                WHEN withdraw IS NOT NULL THEN 'Withdraw'
                WHEN ftransfer IS NOT NULL THEN 'Fund Transfer'
                WHEN deposit IS NOT NULL THEN 'Deposit'
                ELSE 'Unknown'
            END AS transaction_type
            FROM u_acc WHERE u_id='$mainid' ORDER BY cdt DESC LIMIT 5";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));


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
                        <h2 style="font-family: 'Times New Roman', Times, serif;">Transaction Details</b></h2><br>
                        <h4 style="font-family: 'Times New Roman', Times, serif;">Account No: <b><?php echo isset($a1) ? $a1 : ''; ?></b>, Balance: <b><?php echo isset($a2) ? $a2 : ''; ?></b></h4><br>

                        </label><br>
                        <table style="border:2px solid black; padding: 20px;">
                            <tr>
                            <th style="border:2px solid black; padding: 20px;">S.No</th>
                                <th style="border:2px solid black; padding: 20px;">Transaction Type</th>
                                <th style="border:2px solid black; padding: 20px;">Amount</th>
                                <th style="border:2px solid black; padding: 20px;">Date</th>
                            </tr>
                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                            <td style="border:2px solid black; padding: 20px;"><?php echo $i++ ?></td>

                                <td style="border:2px solid black; padding: 20px;"><?php echo $row['transaction_type']; ?></td>
                                <td style="border:2px solid black; padding: 20px;"><?php echo $row['withdraw'] ?? $row['ftransfer'] ?? $row['deposit']; ?></td>
                                <td style="border:2px solid black; padding: 20px;"><?php echo $row['cdt']; ?></td>
                            </tr>
                            <?php } ?>
                        </table><br><br>
                        <input type="submit" class="btn btn-dark" id="done" name="done" value="Done" />
                    </form>
                </div>
            </div>
        </div><br><br>
    </div>
</body>
</html>
