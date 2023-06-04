<?php
include 'conn.php';

$query = "SELECT * FROM user ORDER BY name ASC";
$result = $conn -> query($query);



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Admin page</title>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Home</a>
        </div>
    </nav>
    <div class="container mt-5 bg-light text-dark">
        <h1>Daftar User yang terdaftar</h1>
        <table class="table table-striped">
    <thead>
      <tr class="text-center">
        <th>name</th>
        <th>username</th>
        <th>Email</th>
        <th colspan="2">Editing</th>
      </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <tr class="text-center">
        <td><?php echo $row["name"];?></td>
        <td><?php echo $row["username"];?></td>
        <td><?php echo $row["email"];?></td>
        <td><a href="" class="btn btn-info"   >Edit</a></td>
        <td>
            <a href="hapus.php?id=<?php echo $row["IDuser"];?>" class="btn btn-warning" >Hapus</a>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>

    </div>
</body>
</html>