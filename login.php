<?php 
    session_start();
    require_once 'config.php';

    if( isset($_SESSION['Login_admin']) ) {
        header("Location: admin.php");
        exit;
    }else if( isset($_SESSION['Login_user']) ) {
        header("Location: index.php");
        exit;
    }

    if(isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $result = mysqli_query($con, "SELECT * FROM akun where username = '$username'");

        if(mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_array($result);

            if($row['level'] == "admin") {
            	if($password == $row['password']) {
                $_SESSION['Login_admin'] = true;
                $_SESSION['id'] = $row['id_covid_ranger'];
                header("Location: admin.php");
                exit;
            }else {
            	echo "<script>
            	alert('username atau password yang anda masukkan salah');
            	document.location.href = 'login.php';
            	</script>
            	";
            	}
            }else {
            	if($password == $row['password']) {
                $_SESSION['Login_user'] = true;
                $_SESSION['id'] = $row['id_covid_ranger'];
                header("Location: index.php");
                exit;
            	}else {
            		echo "<script>
            	alert('username atau password yang anda masukkan salah');
            	document.location.href = 'login.php';
            	</script>
            	";
            	}
            }

            
        }else {
        	echo "<script>
            	alert('username atau password yang anda masukkan salah');
            	document.location.href = 'login.php';
            	</script>
            	";
        }
    }

 ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Firal Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="img/icons/favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
    
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="img/img-01.png" alt="IMG">
                </div>

                <form class="login100-form" method="post">
                    <span class="login100-form-title">
                        FIRAL COVID RANGER
                    </span>

                    <div class="wrap-input100 validate-input" data-validate = "Username dibutuhkan">
                        <input class="input100" type="text" name="username" placeholder="Username" required autocomplete="off">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Password dibutuhkan">
                        <input class="input100" type="password" name="password" placeholder="Password" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit" name="login">
                            Login
                        </button>
                    </div>
                <div class="text-center p-t-20">
						<a class="txt2" href="pendaftaran.php">
							Create your Account
							<!-- <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i> -->
						</a>
					</div>
                </form>
            </div>
            </div>
        </div>
    </div>
    
    

    
<!--===============================================================================================-->  
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/tilt/tilt.jquery.min.js"></script>
    <script >
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
<!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>
</html>