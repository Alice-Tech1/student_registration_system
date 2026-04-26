<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <style>
        /* Reset default styles */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            background-color: #ccc;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #26434d;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .form-container {
            background: #fff;
            padding: 25px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #555;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        input:focus {
            border-color: #007BFF;
            outline: none;
        }

        .btn {
            width: 100%;
            padding: 10px;
            background: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .btn:hover {
            background: #0056b3;
        }

        .form-footer {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }

        .form-footer a {
            color: #007BFF;
            text-decoration: none;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Login</h2>
        <form action="#" method="POST">
            <div class="form-group">
                <label for="username">Username or Email</label>
                <input type="text" id="username" name="username" placeholder="Enter username or email" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter password" required>
            </div>

            <button type="submit" class="btn" name="login">Login</button>

            <div class="form-footer">
                Don't have an account? <a href="index.php">Register here</a>
            </div>
        </form>
    </div>
</body>
</html>
<?php
session_start();
include'connect.php';
if(isset($_POST['login'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $que=mysqli_query($conn,"select * from register where password='$password' AND username='$username'");
    if(mysqli_num_rows($que)>0){
        $_SESSION['username']=$username;
        header("location:home.php");
    }
    else{
        echo "<script>alert('check password or username')</script>";
    }
}
?>
