<?php
include 'admin/dbcon.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Log In</title>
    <?php include './links.php'; ?>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #00ffcc, #ff0099);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            color: white;
        }

        .login-container {
            background: rgba(0, 0, 0, 0.9);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 400px;
            box-sizing: border-box;
        }

        .login-container h4 {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 20px;
            text-transform: uppercase;
            font-weight: bold;
            color: #ffcc00;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            font-size: 1rem;
            color: white;
            background-color: rgba(255, 255, 255, 0.2);
            border: 1px solid #ff00ff;
            border-radius: 5px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-group input:focus {
            border-color: #ff00ff;
            outline: none;
            box-shadow: 0 0 10px rgba(255, 0, 255, 0.5);
        }

        .btn-success {
            width: 100%;
            padding: 12px;
            font-size: 1.1rem;
            background-color: #ff00ff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-success:hover {
            background-color: #ff3399;
            box-shadow: 0 0 10px rgba(255, 0, 255, 0.8);
        }

        .text-center {
            text-align: center;
            font-size: 0.9rem;
            color: #ddd;
        }

        .text-center a {
            color: #ffcc00;
            text-decoration: none;
        }

        .text-center a:hover {
            text-decoration: underline;
        }

        .alert {
            margin-top: 20px;
            background-color: rgba(255, 0, 0, 0.7);
            color: white;
            border-radius: 5px;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php 
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $pass = $_POST['password'];

        $email_check = "SELECT * FROM user_info WHERE email='$email'";
        $query = mysqli_query($con, $email_check);
        $email_count = mysqli_num_rows($query);

        if ($email_count > 0) {
            $email_pass = mysqli_fetch_assoc($query);
            $dbpass = $email_pass['password'];
            
            session_start();
            $_SESSION['username'] = $email_pass['username'];
            $_SESSION['uphone'] = $email_pass['phone'];
            $_SESSION['email'] = $email_pass['email'];
            $_SESSION['id'] = $email_pass['id'];

            $passDecrypt = password_verify($pass, $dbpass);
            if ($passDecrypt) {
                echo '<script>alert("Login Successful!");</script>';
                header('location: Find_jobs.php');
            } else {
                echo '<div class="alert">Incorrect Password!</div>';
            }
        } else {
            echo '<div class="alert">User  does not exist in our records!</div>';
        }
    }
    ?>

    <div class="login-container">
        <h4 class="card-title">Login</h4>
        <form action="<?php echo htmlentities ($_SERVER['PHP_SELF']); ?>" method="POST">
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                </div>
                <input name="email" type="email" placeholder="Enter User Email" class="form-control" required>
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                </div>
                <input name="password" type="password" placeholder="Enter Password" class="form-control" required>
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-success btn-block">Log In</button>
            </div>
            <p class="text-center">Don't have an account? <a href="registration.php">Register here</a></p>
        </form>
    </div>
</body>
</html>