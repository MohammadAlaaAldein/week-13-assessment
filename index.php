<html>
<head>
    <style>
        * {box-sizing: border-box}

        /* Add padding to containers */
        .container {
            padding: 16px;

        }

        /* Full-width input fields */
        input[type=text], input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        input[type=text]:focus, input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }

        /* Overwrite default styles of hr */
        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }

        /* Set a style for the submit/register button */
        .registerbtn {
            background-color: #4CAF50;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }

        .registerbtn:hover {
            opacity:1;
        }

        /* Add a blue text color to links */
        a {
            color: dodgerblue;
        }

        /* Set a grey background color and center the text of the "sign in" section */
        .signin {
            background-color: #f1f1f1;
            text-align: center;
        }
    </style>
</head>
<body>
<h1> Instructions </h1>
<ul>
       <li>Create a database called myapplication.</li>
       <li>Create a table called users. (Id,username,password,email,phone_number). Those fields should have the right datatype and right size.
       <li>Connect the form to the database, When the user insert the information in the registration form, those information should stored in the database.</li>
       <li>After submission, the page should be redirect to new page.</li>
       <li>The new page should display, "Hello (username)" </li>
</ul>
<form action="" method="post">
    <div class="container">
        <h1>Register</h1>
        <p>Please fill in this form to create an account.</p>
        <hr>

        <label for="username"><b>Username</b></label>
        <input type="text" placeholder="Username" name="username" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>

        <label for="psw-repeat"><b>Repeat Password</b></label>
        <input type="password" placeholder="Repeat Password" name="psw-repeat" required>

        <label for="Email"><b>Email</b></label>
        <input type="text" placeholder="Email" name="email" required>

        <label for="phone-number"><b>Phone Number</b></label>
        <input type="text" placeholder="phone-number" name="phone-number" required>
        <hr>

        <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
        <button name="submit" type="submit" class="registerbtn">Register</button>
    </div>

    <div class="container signin">
        <p>Already have an account? <a href="#">Sign in</a>.</p>
    </div>
</form>
</body>
<?php

    // create database myapplication;
    // use myapplication;
    // create table users(id int Primary key auto_increment, username varchar(30), password varchar(30), repassword varchar(30), email varchar(30), phone_number int);
    
    
    session_start();
    require "db.php"; 
  
    if(isset($_POST['submit'])){
      
      $username = $_POST['username'];
      $email = $_POST['email'];
      $psw = $_POST['psw'];
      $psw_repeat = $_POST['psw-repeat'];
      $phone_number = $_POST['phone-number'];
      $massage = "";
  
      if(!empty($email) && !empty($psw) && !empty($psw_repeat) && !empty($username) && !empty($phone_number)){
        if ($psw != $psw_repeat){
          $massage = "Passwords do not match, Try Again";
        }
        else {
        $sql = "INSERT INTO users (username, password, repassword, email, phone_number)
                VALUES ('$username','$psw','$psw_repeat','$email','$phone_number')"; 
  
        if ($conn->exec($sql)){
          $_SESSION['username'] = $username;
          header("Location: hello.php");
        }
        else{
          $massage = "Username or Email is Already Registered";        
        }
      }
    }
    else{
      $massage = "All Field Required";
    }
  }
?>