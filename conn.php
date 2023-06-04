<?php
define('host','localhost');
define('user','root');
define('pass','');
define('db','dbformtest');

$conn = mysqli_connect(host, user, pass, db);


if (!$conn) {
    echo("Tidak terkoneksi");
}
?>
