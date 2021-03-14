<?php include('partial/logo-part.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Shto Admin</h1>

        <br><br>

        <?php 
            if(isset($_SESSION['add'])) 
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']); 
                        }
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Emri Mbiemri: </td>
                    <td>
                        <input type="text" name="emri" placeholder="Shkruaj Emrin dhe Mbiemrin">
                    </td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" placeholder="Username juaj">
                    </td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" placeholder="Fjalekalimi juaj">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>


    </div>
</div>

<?php include('partial/footer.php'); ?>


<?php 
   
    if(isset($_POST['submit']))
    {

        //1. Get the Data from form
        $emri = $_POST['emri'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); //Password Encryption with MD5

        //2. SQL Query to Save the data into database
        $sql = "INSERT INTO tbl_admin SET 
            emri='$emri',
            username='$username',
            password='$password'
        ";
 
        //Executing Query and Saving Data into Database
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        if($res==TRUE)
        {
            
            //Create a Session Variable to Display Message
            $_SESSION['add'] = "<div class='success'>Admini eshte shtuar me sukses!</div>";
            //Redirect Page to Manage Admin
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else
        {
            //Failed to Insert Data
            $_SESSION['add'] = "<div class='error'>Admini nuk eshte shtuar, provo perseri!</div>";
            //Redirect Page to Add Admin
            header("location:".SITEURL.'admin/add-admin.php');
        }

    }
    
?>