<?php 
 
include 'config.php';
 
error_reporting(0);
 
session_start();
 
if (isset($_SESSION['username'])) {
    header("Location: halaman-depan.php");
}
 
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = ($_POST['password']);
 
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: halaman-depan.php");
    } else {
        echo "<script>alert('Username Atau Password Anda Salah. Silahkan Coba Lagi!')</script>";
    }
}
 
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" type="text/css" href="style.css">
 
    <title>Halaman Login</title>

    <style>
        body {
            background-image: url("https://asset.kompas.com/crops/_JNx4qMilh-DuimKD-U4lqCHikc=/0x0:1000x667/750x500/data/photo/2021/12/21/61c161511efb8.jpg");
        }
    </style>
</head>
<body>
    <div class="alert alert-warning" role="alert">
        <?php echo $_SESSION['error']?>
    </div>
 
    <div class="container" style="background: linear-gradient(90deg, #4F709C, #213555);">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
            <div class="input-group">
                <input type="text" placeholder="Username" name="username" style="background: white;" value="<?php echo $username; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" style="background: white;" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Login</button>
            </div>
            <p class="login-register-text" style="text-align: center;">Anda Belum Memiliki Akun? <a href="register.php">Register</a></p>
        </form>
    </div>
</body>
</html>