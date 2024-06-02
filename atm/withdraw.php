<?php
require_once "config.php";

session_start();
$mainid = $_SESSION['mainid'];
// echo $mainid;
// return;

if($_SESSION['mainid']){


$qryBalance = mysqli_query($conn, "SELECT acc_bal FROM u_login WHERE status='1' AND u_id='$mainid'") or die(mysqli_error($conn));

if ($qryBalance) {
    $rowBalance = mysqli_fetch_assoc($qryBalance);
    $accBalance = $rowBalance['acc_bal'];
}

$qryone = mysqli_query($conn, "SELECT one FROM atm WHERE status='1'") or die(mysqli_error($conn));
if ($qryone) {
    $rowone = mysqli_fetch_assoc($qryone);
    $accone = $rowone['one'];
}

$qrytwo = mysqli_query($conn, "SELECT two FROM atm WHERE status='1'") or die(mysqli_error($conn));
if ($qrytwo) {
    $rowtwo = mysqli_fetch_assoc($qrytwo);
    $acctwo = $rowtwo['two'];
}

$qryfive = mysqli_query($conn, "SELECT five FROM atm WHERE status='1'") or die(mysqli_error($conn));
if ($qryfive) {
    $rowfive = mysqli_fetch_assoc($qryfive);
    $accfive = $rowfive['five'];
}

// if ($qry3) {
//     $r3 = mysqli_fetch_assoc($qry3);
//     $a3 = $r3['u_name'];
// }

if(isset($_POST['back'])){

    header("location:options.php");


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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

                <div class="col" style="text-align: center; justify-content: center; align-items: center; display: flex; flex-direction: column; padding-top: 30px; padding-bottom: 30px;">
                <label for="">
                        <h2 style="font-family: 'Times New Roman', Times, serif;"><b>Your Account Balance is: <?php echo isset($accBalance) ? $accBalance : ''; ?></b></h2>
                    </label><br>

                    <label for="">
                        <h5 style="font-family: 'Times New Roman', Times, serif;"><b>Notes Avaliable: 100's: <?php echo isset($accone) ? $accone : ''; ?>  , 200's: <?php echo isset($acctwo) ? $acctwo : ''; ?>  , 500's: <?php echo isset($accfive) ? $accfive : ''; ?></b></h5>
                    </label><br>
                <form action="" method="post">

                    <label for="">
                        <h3 style="font-family: 'Times New Roman', Times, serif;">Please Enter Amount</h3><br>
                        </label><br>
                        <input type="text" class="form-control" id='w1' name='w1' placeholder="Enter Withdrawal Amount" style="width:250px;height:50px;" /><br><br>
                        
                        <input type="submit" class="btn btn-light" id="back" name="back" value="Back to Menu" />

                        <input type="submit" class="btn btn-dark" id="proceed" name="proceed" value="Submit" />
                    </form>
                </div>
            </div>
        </div><br><br>
    </div>
</body>

<script>
    <?php

if($_SESSION['mainid']){




$qryATM = mysqli_query($conn, "SELECT one, two, five FROM atm WHERE status='1'") or die(mysqli_error($conn));
if ($qryATM) {
    $rowATM = mysqli_fetch_assoc($qryATM);
    $accone = $rowATM['one'];
    $acctwo = $rowATM['two'];
    $accfive = $rowATM['five'];
}


if (isset($_POST['proceed'])) {
    $wd = $_POST['w1'];
    $totalWithdrawalAmount = $wd;


    $sel1 = mysqli_query($conn, "SELECT acc_bal FROM u_login WHERE status='1' AND u_id='$mainid'") or die(mysqli_error($conn));
    $r1 = mysqli_fetch_assoc($sel1);
    $com = $r1['acc_bal'];


    if (!filter_var($wd, FILTER_VALIDATE_INT)) {
        echo 'Swal.fire({
            icon: "error",
            title: "Invalid withdrawal amount",
            text: "Please try again."
        });';
    }

    elseif ($wd <= 0 || $wd>$com) {
        echo 'Swal.fire({
            icon: "error",
            title: "Invalid withdrawal amount",
            text: "Please try again."
        });';
    }

    elseif (($wd % 100 == 0 && $accone >= $wd / 100) ||                
    ($wd % 200 == 0 && $acctwo >= $wd / 200) ||                
    ($wd % 500 == 0 && $accfive >= $wd / 500) ||               
    ($wd % 200 == 100 && $accone >= 1 && $acctwo >= ($wd - 100) / 200) || 
    ($wd % 500 == 100 && $accone >= 3 && $accfive >= ($wd - 300) / 500) || 
    ($wd % 500 == 200 && $acctwo >= 1 && $accfive >= ($wd - 200) / 500)    
) {

    $totalWithdrawalAmount = $wd;

    $remaining = $wd; 
    $notesRemoved = array(0, 0, 0); 

    $notesRemoved[2] = min($accfive, intval($remaining / 500)); 
    $remaining -= $notesRemoved[2] * 500; 

    $notesRemoved[1] = min($acctwo, intval($remaining / 200)); 
    $remaining -= $notesRemoved[1] * 200; 

    $notesRemoved[0] = min($accone, intval($remaining / 100)); 

    if ($accfive >= $notesRemoved[2] && $acctwo >= $notesRemoved[1] && $accone >= $notesRemoved[0]) {
        $updateQuery = "UPDATE atm SET 
                        five = five - $notesRemoved[2], 
                        two = two - $notesRemoved[1], 
                        one = one - $notesRemoved[0] WHERE status='1'";
        $updateResult = mysqli_query($conn, $updateQuery);

        if ($updateResult) {
            $newBal = $accBalance - $wd;

            $insertAccQuery = mysqli_query($conn, "INSERT INTO u_acc (u_id, withdraw) VALUES ('$mainid', '$wd')") or die(mysqli_error($conn));
            $qrysel1 = mysqli_query($conn, "SELECT atm_bal FROM atm WHERE status='1'") or die(mysqli_error($conn));
            $rowBeneficiary = mysqli_fetch_assoc($qrysel1);
            $nb = $rowBeneficiary['atm_bal'] - $wd;

            $updateLoginQuery = mysqli_query($conn, "UPDATE u_login SET acc_bal = '$newBal' WHERE u_id = '$mainid'") or die(mysqli_error($conn));
            $updateLoginQuery1 = mysqli_query($conn, "UPDATE atm SET atm_bal = '$nb' WHERE status='1'") or die(mysqli_error($conn));

            if ($insertAccQuery && $updateLoginQuery && $updateLoginQuery1) {
                echo 'Swal.fire({
                    title: "Withdrawal Initiated",
                    text: "Please proceed.",
                    icon: "success",
                    showCancelButton: false,
                    confirmButtonText: "Proceed"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "loadwd.php";
                    }
                });';
            }
        } else {
            echo 'Swal.fire({
                icon: "error",
                title: "Failed to update ATM",
                text: "Please try again."
            });';
        }
    } else {
        echo 'Swal.fire({
            icon: "error",
            title: "Insufficient funds in ATM",
            text: "Please try again."
        });';
    }
} else {
    echo 'Swal.fire({
        icon: "error",
        title: "Cash not avaliable in ATM",
        text: "Please try again."
    });';
}


}

}else{
    header("location:login.php");

}

?>
</script>

</html>
