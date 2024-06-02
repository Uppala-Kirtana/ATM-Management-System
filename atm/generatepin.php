<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinnacle Bank</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">

    

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
                        <h3 style="font-family: 'Times New Roman', Times, serif;">Enter Account No.</h3>
                        </label><br>
                        <input type="text" id="np1" name="np1" class="form-control" placeholder="Enter Account No." style="width:250px;height:50px;" /><br>
                        <h3 style="font-family: 'Times New Roman', Times, serif;">Enter New Pin</h3>
                        </label>
                        <div style="position: relative;">
                            <input type="password" class="form-control" style="width:250px;height:50px;" id="np2" name="np2" placeholder="Enter Password" aria-label="Username" aria-describedby="basic-addon1" />
                            <span id="togglePassword" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">
    <i class="bi bi-eye-slash"></i>
</span>

                        </div><br>
                        <h3 style="font-family: 'Times New Roman', Times, serif;">Confirm New Pin</h3>
                        </label>
                        <input type="text" id="np3" name="np3" class="form-control" placeholder="Enter New Pin" style="width:250px;height:50px;" /><br>
                        
                        <input type="submit" class="btn btn-dark" id="submit" name="submit" value="Submit" /><br><br>


                    </form>
                    
                </div>

            </div>
        </div><br><br>
    </div>




    <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#np2');

    togglePassword.addEventListener('click', function (e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // remove existing icon
        togglePassword.innerHTML = '';
        // add new icon
        togglePassword.innerHTML = type === 'password' ? '<i class="bi bi-eye-slash"></i>' : '<i class="bi bi-eye"></i>';
    });
</script>

    


<script>
    <?php
require_once "config.php";

session_start();
$mainid = $_SESSION['mainid'];

if($_SESSION['mainid']){


if (isset($_POST['submit'])) {
    $an = $_POST['np1'];
    $np = $_POST['np2'];
    $cnp = $_POST['np3'];

    if (!ctype_digit($np) || !ctype_digit($cnp)) {
        echo 'Swal.fire({
            icon: "error",
            title: "Only Integers are allowed for pin",
            text: "Please try again."
        });';
    } elseif ($np === $cnp) {
        if (strlen($np) <= 4) {
            // Modified the SQL query to use BINARY for case-sensitive comparison
            $qry = mysqli_query($conn, "SELECT * FROM u_login WHERE status='1' AND BINARY u_acc='$an' AND u_id='$mainid'");
        
            if ($qry && mysqli_num_rows($qry) > 0) {
                // Fetch the current pin from the database
                $row = mysqli_fetch_assoc($qry);
                $currentPin = $row['u_pin'];
                
                // Check if the new pin is different from the current pin
                if ($np !== $currentPin) {
                    $uqry = mysqli_query($conn, "UPDATE u_login SET u_pin='$np' WHERE status='1' AND u_id='$mainid'");
            
                    if ($uqry) {
                        echo 'Swal.fire({
                            title: "Pin Changed Successfully",
                            text: "Please proceed.",
                            icon: "success",
                            showCancelButton: false,
                            confirmButtonText: "Proceed"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "enterpin.php";
                            }
                        });';
                    } 
                } else {
                    echo 'Swal.fire({
                        icon: "error",
                        title: "Pin Error",
                        text: "This pin has already been used. Please choose a different pin."
                    });';
                }
            } else {
                echo 'Swal.fire({
                    icon: "error",
                    title: "Account number is incorrect",
                    text: "Please try again."
                });';
            }
        } else {
            echo 'Swal.fire({
                icon: "error",
                title: "Pin should not exceed 4 digits",
                text: "Please try again."
            });';
        }
    } else {
        echo 'Swal.fire({
            icon: "error",
            title: "New pin and confirm new pin do not match",
            text: "Please try again."
        });';
    }
}
}
else{
    header("location:login.php");

}
?>
</script>




    
</body>
</html>