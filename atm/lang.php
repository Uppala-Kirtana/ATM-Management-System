<?php
require_once "config.php";

session_start();

$mainid=$_SESSION['mainid'];
if($_SESSION['mainid']){
    if(isset($_POST['submit'])){

        header("location:enterpin.php");
    
    
    }
} else{
    header("location:login.php");

}
// echo $mainid;
// return;

// if (isset($_POST['exit'])) {
//     session_destroy();
//     header("location:logout.php");
// }


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
        <h6  style="color: rgb(137, 195, 194);"><i>Peak Performance in Every Transaction.</i></h6>
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
                        <h2 style="font-family: 'Times New Roman', Times, serif;">Please Select a Language</h2><br>
                        </label><br>
                        <input type="submit" id="submit" name="submit" class="btn btn-light b1" style="background-color:rgb(2, 73, 92);color:white;width:250px;height:50px;" id="login" name="login" value="English" /><br><br>
                        <input type="submit" id="submit" name="submit" class="btn btn-light b1" style="background-color:rgb(2, 73, 92);color:white;width:250px;height:50px;" id="login" name="login" value="Hindi" /><br><br>
                        <input type="submit" id="submit" name="submit" class="btn btn-light b1" style="background-color:rgb(2, 73, 92);color:white;width:250px;height:50px;" id="login" name="login" value="Telugu" /><br><br>

                    </form>
                    
                </div>

            </div>
        </div><br><br>
</div>
    
</body>
</html>