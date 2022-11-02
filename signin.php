<?php
    session_start();
    include 'connection.php';  
    if(isset($_POST['signin'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $_SESSION['signin'] = $_POST['signin'];

        $result = mysqli_query($connection, "SELECT * FROM user WHERE username = '$username'");

        if(mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password, $row['password'])){
                $_SESSION['signin'] = true;
                echo "<script>alert('Sign In berhasil!');window.location='dashboard.php';</script>";
                exit;
            } 
        } else {
            echo "<script>alert('Username atau Password salah!');window.location='signin.php';</script>";
        }
    }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Sign In</title>
        <link rel="stylesheet" href="style2.css">
		<link rel="icon" href="./img/icon.ico">
    </head>
    <body>
		  <div class="signin_body">
			  <div class="signin_box">
				<h2>Sign In</h2>
				<form action="" method="POST">
					<div class="input_wrap">
						<input type="username" name="username" placeholder="Username" required autocomplete="off">
					</div>
					<div class="input_wrap">
						<input type="password" name="password" placeholder="Password" required>
					</div>
					<div class="input_wrap">
						<button type="submit" name="signin" >Sign In</button>
					</div>
				</form>
				<p>Belum punya akun? <a href="signup.php" style="color: red; text-decoration: none;">Sign Up</a></p>
			  </div>
		  </div>
           
    </body>
</html> 