<?php 
include 'conn.php';

if (isset($_POST["submit"])) {
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $hash_pwd = password_hash($pwd, PASSWORD_DEFAULT);

    $checkemail = "SELECT *FROM user Where email ='$email'";
    $resultemail = $conn -> query($checkemail);

    if ($resultemail -> num_rows==1) {
        $row = $resultemail-> fetch_assoc();
        $hashpwd =  $row['pwd'];
        if (password_verify($pwd, $hash_pwd)) {
            echo"
        <script>
            alert('Selamat Anda berhasil Login!');
            document.location.href = 'login.php';
        </script>       ";
        echo$hash_pwd;
        }else {
            echo"
        <script>
            alert('Password salah!');
            document.location.href = 'login.php';
        </script>  ";   
        }
    }else {
        echo"
        <script>
            alert('email tidak ditemukan!');
            document.location.href = 'admin.php';
        </script> ";    
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>    
    <title>Login</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Login</a>
    </div>
</nav>
<div class="container-sm bg-dark bg-opacity-75 text-white m-5 p-5 my-10">
    <legend>Login</legend>
    <form action="" method="post">
        <div class="mb-3 mt-3">
            <label for="email" class="form-label" id="email">Email</label></label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
        </div>
        <div class="mb-3 mt-3">
            <label for="pwd" class="form-label" id="pwd">Password</label></label>
            <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter password" required>
        </div>
        <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
    
</body>
</html>