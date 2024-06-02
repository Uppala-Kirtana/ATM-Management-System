<?php
require_once "config.php";

session_start();
$mainid = $_SESSION['mainid'];
// echo $mainid;
// return;

if($_SESSION['mainid']){

    if(isset($_POST['back'])){

        header("location:options.php");
    
    
    }

$qryBalance = mysqli_query($conn, "SELECT acc_bal FROM u_login WHERE status='1' AND u_id='$mainid'") or die(mysqli_error($conn));

if ($qryBalance) {
    $rowBalance = mysqli_fetch_assoc($qryBalance);
    $accBalance = $rowBalance['acc_bal'];
}

if (isset($_POST['exit'])) {
    session_destroy();
    header("location:login.php");
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
                <form action="" method="post">

                    <label for="">
                        <h3 style="font-family: 'Times New Roman', Times, serif;">Please Enter Amount</h3><br>
                        </label><br>
                        <input type="text" class="form-control" id='w1' name='w1' placeholder="Enter Deposit Amount" style="width:250px;height:50px;" /><br><br>
                        

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

if (isset($_POST['proceed'])) {
    $wd = $_POST['w1'];
    $limit=200000;

    $storedMainid = $mainid;

    $balQuery = mysqli_query($conn, "SELECT acc_bal FROM u_login WHERE status='1' AND u_id='$storedMainid'") or die(mysqli_error($conn));
    $balRow = mysqli_fetch_assoc($balQuery);
    $currentBal = $balRow['acc_bal'];

    if (!filter_var($wd, FILTER_VALIDATE_INT)) {
        echo 'Swal.fire({
            icon: "error",
            title: "Invalid Deposit Amount",
            text: "Please enter a valid amount."
        });';
    }

    elseif ($wd <= 0) {
        echo 'Swal.fire({
            icon: "error",
            title: "Invalid Deposit Amount",
            text: "Please enter a valid amount."
        });';
    }

    elseif ($wd > $limit) {
        echo 'Swal.fire({
            icon: "error",
            title: "Deposit amount must be less than 2 lakhs",
            text: "Please enter a valid amount."
        });';
    }
    
    
    
    else {
        $newBal = $currentBal + $wd;

    $insertAccQuery = mysqli_query($conn, "INSERT INTO u_acc (u_id,deposit) VALUES ('$storedMainid','$wd')") or die(mysqli_error($conn));

    $updateLoginQuery = mysqli_query($conn, "UPDATE u_login SET acc_bal='$newBal' WHERE u_id='$storedMainid'") or die(mysqli_error($conn));

    if ($insertAccQuery && $updateLoginQuery) {
        echo 'Swal.fire({
            title: "Deposit Initiated",
            text: "Please proceed.",
            icon: "success",
            showCancelButton: false,
            confirmButtonText: "Proceed"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "loaddp.php";
            }
        });';
    }
}


    }
}else{
    header("location:login.php");

}


?>
</script>


</html>
