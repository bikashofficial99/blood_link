
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('conn.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($conn, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($conn, $query) or die("Connection error");
        $rows = mysqli_num_rows($result);
        if($row["usertype"]=="user")
	{
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: dashboard.php");
        } elseif($row["usertype"]=="admin")
        {$_SESSION["username"]=$username;
		
            header("location:adashboard.php");
        }
    
        else
        {
            echo "username or password incorrect";
        }
    
?>
    <form class="form" method="post" name="login">
    <a class="logo"><img src="image\Logo final222.png" style="width:100px; height:100px; float:left; display:inline-block;background-color:red;" > </a><br><br>
        <h1 class="login-title">BloodLink Login Page</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"required/>
        <input type="password" class="login-input" name="password" placeholder="Password" required/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link">Don't have an account? <a href="registration.php">Registration Now</a></p>
  </form>
<?php
    }
?>
</body>
</html>
