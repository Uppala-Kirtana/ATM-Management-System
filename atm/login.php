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
    </div><br><br><br>
    <div style="padding-left:20px;padding-right:20px;padding-bottom:20px;">

        <div class="container row-cols-1 text-center" style="border: 2px solid black;">
            <div class="row">
                <div class="col" style="background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSdNS5cXHQUws46X_jDpngLWqthWMmiyw_AYA&usqp=CAU);">
                    
                </div>
                <div class="col" style="text-align: center;justify-content: center; align-items: center; display: flex; padding-top: 30px; padding-bottom: 30px;">
                    <form action="" method="post">
                        <label for="">
                            <h3 style="font-family: 'Times New Roman', Times, serif;">Enter Email ID</h3>
                        </label>
                        <input type="email" class="form-control" style="width:250px;height:50px;" id="l1" name="l1" placeholder="Enter Email ID" aria-label="Username" aria-describedby="basic-addon1" /><br>
                        
                        <label for="">
                        <h3 style="font-family: 'Times New Roman', Times, serif;">Enter Password</h3>
                        </label>
                        <div style="position: relative;">
                            <input type="password" class="form-control" style="width:250px;height:50px;" id="l2" name="l2" placeholder="Enter Password" aria-label="Username" aria-describedby="basic-addon1" />
                            <span id="togglePassword" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">
    <i class="bi bi-eye-slash"></i>
</span>

                        </div>

                        <br>
                        <input type="submit" class="btn btn-dark" id="login" name="login" value="Submit" />
                    </form>
                    
                </div>

            </div>
        </div><br><br>
</div>

<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#l2');

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

    if(isset($_POST['login'])){
        $email = $_POST['l1'];
        $pass = $_POST['l2'];
        $qry = mysqli_query($conn, "SELECT u_id FROM u_login WHERE status='1' AND BINARY u_email='$email' AND BINARY u_pass='$pass'") or die(mysqli_error($conn));

        if(mysqli_num_rows($qry) > 0) {
            $res = mysqli_fetch_object($qry);
            $mainid = $res->u_id;  
            session_start();
            $_SESSION['mainid'] = $mainid;
            $mainid = $_SESSION['mainid'];
            header("location:lang.php");
        } else {
            echo 'Swal.fire({
                    icon: "error",
                    title: "Incorrect Username or Password",
                    text: "Please try again."
                });';
        }
    }
    ?>
</script>
    
</body>
</html>
