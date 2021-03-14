<?php include('partial/logo-part.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Ndryshimi i Fjalekalimit</h1>
        <br><br>

        <?php 
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
            }
        ?>
        <form action="" method="POST">      
            <table class="tbl-30">
                <tr>
                    <td>Fjalekalimi i tanishem: </td>
                    <td>
                        <input type="password" name="current_password" placeholder="Fjalekalimi i tanishem">
                    </td>
                </tr>

                <tr>
                    <td>Fjalekalimi i ri:</td>
                    <td>
                        <input type="password" name="new_password" placeholder="Fjalekalimi i ri">
                    </td>
                </tr>

                <tr>
                    <td>Konfirmo Fjalekalimin: </td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Konfirmo Fjalekalimin">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>

    </div>
</div>

<?php 

            if(isset($_POST['submit']))
            {
                //1. Get the Data from Form
                $id=$_POST['id'];
                $current_password = md5($_POST['current_password']);
                $new_password = md5($_POST['new_password']);
                $confirm_password = md5($_POST['confirm_password']);


                //2. Check whether the user with current ID and Current Password Exists or Not
                $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";

                $res = mysqli_query($conn, $sql);

                if($res==true)
                {
                    //Check whether data is available or not
                    $count=mysqli_num_rows($res);

                    if($count==1)
                    {
                        //Check whether the new password and confirm match or not
                        if($new_password==$confirm_password)
                        {
                            //Update the Password
                            $sql2 = "UPDATE tbl_admin SET 
                                password='$new_password' 
                                WHERE id=$id
                            ";

                            $res2 = mysqli_query($conn, $sql2);

                            //Check whether the query exeuted or not
                            if($res2==true)
                            {
                                //Redirect to Manage Admin Page with Success Message
                                $_SESSION['change-pwd'] = "<div class='success'>Fjalekalimi eshte ndryshuar me sukses!</div>";
                                //Redirect the User
                                header('location:'.SITEURL.'admin/manage-admin.php');
                            }
                            else
                            {
                                //Redirect to Manage Admin Page with Error Message
                                $_SESSION['change-pwd'] = "<div class='error'>Kemi deshtuar te ndryshojme fjalekalimin, provoni perseri!</div>";
                                //Redirect the User
                                header('location:'.SITEURL.'admin/manage-admin.php');
                            }
                        }
                        else
                        {
                            //Redirect to Manage Admin Page with Error Message
                            $_SESSION['pwd-not-match'] = "<div class='error'>Fjalekalimi nuk eshte perputhur! </div>";
                            //Redirect the User
                            header('location:'.SITEURL.'admin/manage-admin.php');

                        }
                    }
                    else
                    {
                        //User Does not Exist Set Message and Redirect
                        $_SESSION['user-not-found'] = "<div class='error'>Perdoruesi nuk ekziston!</div>";
                        //Redirect the User
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }
                }

            }

?>


<?php include('partial/footer.php'); ?>