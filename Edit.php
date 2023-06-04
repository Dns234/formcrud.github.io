<?php 
include 'conn.php';

if (isset($_POST["submit"])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $CnfPwd= $_POST['cnfrm_pwd'];
    $hash_pwd = password_hash($pwd, PASSWORD_DEFAULT);

    $checkname= "SELECT * FROM user Where username = '$username'";
    $checkemail = "SELECT *FROM user Where email ='$email'";
    $resultemail = $conn -> query($checkemail);
    $resultname = $conn -> query($checkname);


    if ($pwd != $CnfPwd ) {
        echo("Password tidak sama dengan konfirmasi password");
    }elseif ($resultname -> num_rows>0 ) {
        echo("Maaf nama anda sudah terdaftar");
    }elseif ($resultemail -> num_rows>0) {
        echo("Maaf email anda sudah terdaftar");
    }else {
        $sign = "INSERT INTO user (name, username, email, pwd) VALUES ('$name', '$username', '$email','$hash_pwd')";
        if ($conn ->query($sign) === TRuE) {
            echo"
            <script>
                alert('Data berhasil ditambahkan!');
                document.location.href = 'index.php';
            </script>
            ";
        }else {
            echo("Anda Gagal terdaftar");
        }
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
    <title>Edit</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Home</a>
        </div>
    </nav>
    <div class="container-sm bg-dark bg-opacity-75 text-white m-5 p-5 my-10">
        <legend>Update</legend>
        <form action="edit.php" method="post">
        <div class="mb-3 mt-3">
                <label for="name" class="form-label" id="name">name</label></label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required>
            </div>
            <div class="mb-3 mt-3">
                <label for="username" class="form-label" id="username">Username</label></label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" required>
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label" id="email">Email</label></label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
            </div>
            <div class="mb-3 mt-3">
                <label for="pwd" class="form-label" id="pwd">Password</label></label>
                <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter password" required>
            </div>
            <div class="mb-3 mt-3">
                <label for="cnfrm_pwd" class="form-label" id="cnfrm_pwd">Konfiramsi Password</label></label>
                <input type="password" class="form-control" id="cnfrm_pwd" name="cnfrm_pwd" placeholder="Konfirmasi Password" required>
            </div>
            <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    
</body>
</html>