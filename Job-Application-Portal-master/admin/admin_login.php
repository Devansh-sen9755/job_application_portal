<?php
    include 'dbcon.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <?php include '../links.php'; ?>
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
            background: rgba(0, 0, 0, 0.6);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 400px;
            box-sizing: border-box;
        }

        .login-container h2 {
            text-align: center;
            font-size: 2.5rem;
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

        .btn-login {
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

        .btn-login:hover {
            background-color: #ff3399;
            box-shadow: 0 0 10px rgba(255, 0, 255, 0.8);
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9rem;
            color: #ddd;
        }

        .footer a {
            color: #ffcc00;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
    

</head>

<body>

    <?php
        if (isset($_POST['submit'])) {
            $admin_username = $_POST['admin_username'];
            $pass = $_POST['password'];

            $admin_check = " SELECT * FROM admin_login WHERE admin_user_name='$admin_username' ";
            $query = mysqli_query($con, $admin_check);

            $admin_count = mysqli_num_rows($query);

            if ($admin_count > 0) {
                $admin_check = mysqli_fetch_assoc($query);
                $dbpass = $admin_check['admin_password'];

                session_start();
                $_SESSION['admin_username'] = $admin_check['admin_user_name'];

                $passDecrypt = password_verify($pass, $dbpass);
                if ($passDecrypt) {
                    echo "<script>alert('Login Successful!');</script>";
                    header('location: index.php');
                } else {
                    echo "<script>alert('Incorrect Password!');</script>";
                }
            } else {
                echo "<script>alert('Invalid User Details!');</script>";
            }
        }
    ?>

    <div class="login-container">
        <h2>Admin Login</h2>

        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
            <div class="form-group">
                <input name="admin_username" type="text" placeholder="Username" required>
            </div>
            <div class="form-group">
                <input name="password" type="password" placeholder="Password" required>
            </div>
            <button type="submit" name="submit" class="btn-login">Log In</button>
        </form>

        <div class="footer">
            <p>&copy; 2024 Job Application Portal | <a href="#">Forgot Password?</a></p>
        </div>
    </div>

</body>
</html>
