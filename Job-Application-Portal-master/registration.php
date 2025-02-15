<?php
// session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Registration</title>
    <?php include 'links.php'; ?>
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

        .registration-container {
            background: rgba(0, 0, 0, 0.9);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 400px;
            box-sizing: border-box;
        }

        .registration-container h4 {
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

        .btn-primary {
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

        .btn-primary:hover {
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
    include 'admin/dbcon.php';

    if (isset($_POST['submit'])) {
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

        $passEncrypt = password_hash($password, PASSWORD_BCRYPT);

        $emailquery = "SELECT * FROM user_info WHERE email='$email'";
        $query = mysqli_query($con, $emailquery);
        $emailcount = mysqli_num_rows($query);

        if ($emailcount > 0) {
            echo '<div class="alert">Email already exists!</div>';
        } else {
            if ($password === $cpassword) {
                $insertquery = "INSERT INTO user_info(username, email, phone, password) 
                VALUES('$username','$email','$phone','$passEncrypt')";

                $iquery = mysqli_query($con, $insertquery);

                if ($iquery) {
                    echo '<div class="alert alert-success">Success! Account Created Successfully. <a href="login.php">Click here to login</a></div>';
                } else {
                    echo '<script>alert ("Not Inserted");</script>';
                }
            } else {
                echo '<script>alert("Password not matching!");</script>';
            }
        }
    }
    ?>
   
    <div class="registration-container">
        <h4 class="card-title">Create Account</h4>
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
                <input name="username" type="text" maxlength="50" placeholder="Enter Full Name" class="form-control" required>
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                </div>
                <input name="email" type="email" placeholder="Enter Email" class="form-control" required>
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                </div>
                <input name="phone" type="text" maxlength="10" placeholder="Phone Number" class="form-control" required>
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                </div>
                <input name="password" type="password" placeholder="Create Password" class="form-control" required>
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                </div>
                <input name="cpassword" type="password" placeholder="Confirm Password" class="form-control" required>
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary btn-block">Create Account</button>
            </div>
            <p class="text-center">Already registered? <a href="login.php">Log In</a></p>
        </form>
    </div>
</body>
</html>