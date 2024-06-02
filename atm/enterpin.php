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
        <h1 class="display-4" style="color: aliceblue;font-family: 'Times New Roman', Times, serif;">PINNACLE BANK</h1><br>
        <h6  style="color: rgb(137, 195, 194);"><i>Peak Performance in Every Transaction.</i></h6><br>
        <div style="text-align: right;padding-right:10px;padding-bottom:10px;">
            <a href="logout.php"><input type="submit" class="btn btn-light" value="Logout"></a>
        </div>
    </div><br><br><br>
    <div style="padding-left:20px;padding-right:20px;padding-bottom:20px;">

        <div class="container row-cols-1 text-center" style="border: 2px solid black;">
            <div class="row">
                <div class="col" style="background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSdNS5cXHQUws46X_jDpngLWqthWMmiyw_AYA&usqp=CAU);">
                    
                </div>

                <div class="col" style="text-align: center;justify-content: center; align-items: center; display: flex; padding-top: 30px; padding-bottom: 30px;">
                    <form action="" method="post">
                        <label for="">
                        <h2 style="font-family: 'Times New Roman', Times, serif;">Enter Pin</h2><br>
                        </label><br>
                        <input type="text" class="form-control" id='p1' name='p1' placeholder="Enter Pin" style="width:250px;height:50px;" /><br><br>
                        <input type="submit" class="btn btn-dark" id="submit" name="submit" value="Submit" /><br><br>
                        <a href="generatepin.php" style="color: black;">Generate Pin</a>

                    </form>
                    
                </div>

            </div>
        </div><br><br>
</div>
<script>
<?php
require_once "config.php";

session_start();
$mainid = $_SESSION['mainid'];

if($_SESSION['mainid']){


if (isset($_POST['submit'])) {
    $pin = $_POST['p1'];
    $qry = mysqli_query($conn, "SELECT * from u_login where status='1' and u_id='$mainid' and u_pin='$pin'") or die(mysqli_error($conn));

    if ($qry && mysqli_num_rows($qry) > 0) {
        header("location: options.php");
    } else {
            echo 'Swal.fire({
                    icon: "error",
                    title: "Incorrect Pin",
                    text: "Please try again."
                });';
        }
    }

}else{
    header("location:login.php");

}
    ?>
</script>
</body>
</html>