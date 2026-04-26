<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Form</title>
    <style>
        /* Reset some default styles */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #386473;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: darkolivegreen;
            
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
        <h2>Register</h2>
        <form action="#" method="POST">
            <div class="form-group">
                <label for="fullname">Full Name</label>
                <input type="text" id="fullname" name="fullname" placeholder="Enter your full name" required>
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Choose a username" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter password" required>
            </div>

            <div class="form-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="cpassword" placeholder="Confirm password" required>
            </div>

            <button type="submit" class="btn" name="register">Register</button>

            <div class="form-footer">
                Already have an account? <a href="login.php">Login here</a>
            </div>
        </form>
    </div>
</body>
</html>
<?php
include'connect.php';
if(isset($_POST['register'])){
    $fullname=$_POST['fullname'];
    $email=$_POST['email'];
    $username=$_POST["username"];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    if($password==$cpassword){
        $insert=mysqli_query($conn,"insert into register(fullname,email,username,password)values('$fullname','$email','$username','$password')");
    if($insert){
        echo "<script>alert('ACCOUNT CREATED')</script>";
        header("location:login.php");
    }
    else{
         echo "<script>alert('data not inserted')</script>";
    }
    }
    else{
        echo "<script>alert('check password')</script>";
    }


}
?>