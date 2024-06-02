<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loading...</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>
    <script>
        Swal.fire({
            title: "Please wait",
            html: "Processing Deposit...",
            showConfirmButton: false, 
            didOpen: () => {
                Swal.showLoading();
                setTimeout(() => {
                    window.location.href = "dep3.php";
                }, 1800); 
            }
        });
    </script>
</body>
</html>
