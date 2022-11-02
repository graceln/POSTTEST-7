<?php
    session_start();
    include 'connection.php';
    if(isset($_POST['signup'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $cpass = $_POST['cpass'];
        if($password === $cpass) {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $result = mysqli_query($connection, "SELECT username FROM user WHERE username = '$username'");

            if(mysqli_fetch_assoc($result)){
                echo "<script>alert('Username telah digunakan!');window.location='signup.php';</script>";
            } else {
                $result = mysqli_query($connection, "INSERT INTO user VALUES ('', '$username', '$password')");

                if(mysqli_affected_rows($connection) > 0){
                    echo "<script>alert('Sign Up berhasil!');window.location='signin.php';</script>";
                } else {
                    echo "<script>alert('Sign Up gagal!');window.location='signup.php';</script>";
            
                }
            }
        } else {
            echo "<script>alert('Password tidak sama!');</script>";
    
        }
    
    }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Sign Up</title>
        <link rel="stylesheet" href="style2.css">
		<link rel="icon" href="./img/icon.ico">
    </head>
    <body>
		  <div class="signup_body">
			  <div class="signup_box">
				<h2>Sign Up</h2>
				<form action="" method="POST">
                    <div class="input_wrap">
						<input type="text" name="username" placeholder="Username" required autocomplete="off">
					</div>
					<div class="input_wrap">
						<input type="password"  name="password" placeholder="Password" required>
					</div>
                    <div class="input_wrap">
						<input type="password" name="cpass" placeholder="Confirm Password" required>
					</div>
					<div class="input_wrap">
						<a href="signin.php">
							<button type="submit" name="signup">Sign Up</button>
						</a>
					</div>
				</form>
				<p>Sudah punya akun? <a href="signin.php"  style="color: red; text-decoration: none;">Sign In</a></p>
			  </div>
		  </div>
    </body>
</html>
