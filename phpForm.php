<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple PHP Form with Database Connectivity | Free Projects1</title>
    <meta name="keywords" content="sign up php, login and signup in php, user registration with email verification in php, login and signup page in php, php sign up ,signup form in php, login signup php, php sign up and login, user registration form in php, user registration in php, signup and login form in php, php signup and login code, user registration form with php, php signup form with database, signup page in php, login and signup form using php, signup form using php, login signup php, sign up php, sign up form php, sign up php, php user registration form with mysql, signup php, sign up page php, user registration and login in php, freeprojects1 blog, bholu singh blogger">
    <meta name="description" content="This is a PHP project that maintains connectivity with a database. In this project, we will store and retrieve user data in the form of a PHP database.">
    <link rel="shortcut icon" href="https://github.com/BHOLU-SINGH/source-code/raw/master/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container" id="signup" style="display: none;">
        <form action="#" method="post">
            <h2>SignUp Form</h2>
            <input type="text" placeholder="Username" name="username" autocomplete="off" required>
            <input type="email" placeholder="Email Address" name="email" autocomplete="off" required>
            <input type="password" placeholder="Password" name="password" autocomplete="off" required>
            <input type="password" placeholder="Confirm password" name="cpassword" autocomplete="off" required>
            <div class="btns">
                <button class="btn" type="submit" name="signup_btn">SignUp</button>
            </div>
            <p>Have an account? <a href="#signin" id="signin-link">login here</a></p>
        </form>
    </div>
    
    <div class="form-container" id="signin">
        <form action="#" method="post">
            <h2>SignIn Form</h2>
            <input type="email" placeholder="Email Address" name="email" autocomplete="off" required>
            <input type="password" placeholder="Password" name="password" autocomplete="off" required>
            <div class="btns">
                <button class="btn" type="submit" name="signin_btn">SignIn</button>
            </div>
            <p>Don't have an account? <a href="#signup" id="signup-link">signup here</a></p>
        </form>
    </div>

    <?php
        $conn = mysqli_connect("localhost", "root","","php_tutorials");

        if(isset($_POST['signup_btn'])){
            // now we access all input fields with name attribute
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];

            //now we store data into our table
            $sql = "INSERT INTO users (username, email, password, cpassword) VALUES('$username', '$email', '$password', '$cpassword')";
            $rs = mysqli_query($conn, $sql);
            
            // if query is successful
            if($rs){
                ?><script> alert('user registered successfully');  </script> <?php
                // echo "user registered successfully";
            }
            // if query is failed 
            else {
                ?><script> alert('user registration failed');  </script> <?php
                // echo "user registration failed";
            }
        } else if(isset($_POST['signin_btn'])){
            $email = $_POST['email'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM users WHERE email = '$email' ";
            $rs = mysqli_query($conn, $sql);

            if($rs){
                ?><script> alert('user login success!');</script> <?php
            } else{
                ?><script> alert('user login failed!');  </script> <?php
            }
        }
    ?>

    <script src="jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#signup-link").click(function(){
                $("#signup").show();
                $("#signin").hide();
            });
            $("#signin-link").click(function(){
                $("#signin").show();
                $("#signup").hide();
            });
        })
    </script>
</body>
</html>
