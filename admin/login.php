<?php include('../config/constants.php'); ?>
<html>
    <head>
        <title>Login - Foodie Paradise</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>
        
        <div class="login">
            <h1 class="text-center">Login</h1>
            

            <?php 
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>            
            <!-- Login Form Starts Here -->
            <form action="" method="POST" class="text-center">
            Username: <br>
            <input type="text" name="username" placeholder="Shkruani Username tuaj"><br>

            Password: <br>
            <input type="password" name="password" placeholder="Shkruani Password tuaj"><br><br>

            <input type="submit" name="submit" value="Login" class="btn-primary">
            
            </form>
            <!-- Login Form Ends Here -->

            <p class="text-center">Created by - <a href="foodieparadise">Foodie Paradise Group</a></p>
        </div>

    </body>
</html>

<?php 

    if(isset($_POST['submit']))
    {
        //Get the Data from Login form
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        //SQL to check whether the user with username and password exists or not
        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        if($count==1)
        {
            $_SESSION['login'] = "<div class='success'>Jeni lidhur me sukses!</div>";
            $_SESSION['user'] = $username;

            header('location:'.SITEURL.'admin/');
        }
        else
        {
            $_SESSION['login'] = "<div class='error text-center'>Nuk keni shkruar sakte Username-in ose Password-in.</div>";
            header('location:'.SITEURL.'admin/login.php');
        }


    }

?>