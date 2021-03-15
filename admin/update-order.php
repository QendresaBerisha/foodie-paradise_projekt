<?php include('partial/logo-part.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Menaxhimi i Porosise</h1>
        <br><br>


        <?php 
        
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];

                //Get all other details based on this id
                //SQL Query to get the order details
                $sql = "SELECT * FROM porosia WHERE id=$id";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    $row=mysqli_fetch_assoc($res);

                    $ushqimi = $row['ushqimi'];
                    $cmimi = $row['cmimi'];
                    $sasia = $row['sasia'];
                    $statusi = $row['statusi'];
                    $emri_konsumatorit = $row['emri_konsumatorit'];
                    $numri_telefonit = $row['numri_telefonit'];
                    $email = $row['email'];
                    $adresa= $row['adresa'];
                }
                else
                {


                    header('location:'.SITEURL.'admin/manage-order.php');
                }
            }
            else
            {
                header('location:'.SITEURL.'admin/manage-order.php');
            }
        
        ?>

        <form action="" method="POST">
        
            <table class="tbl-30">
                <tr>
                    <td>Emri i Ushqimit</td>
                    <td><b> <?php echo $ushqimi; ?> </b></td>
                </tr>

                <tr>
                    <td>Cmimi</td>
                    <td>
                        <b> $ <?php echo $cmimi; ?></b>
                    </td>
                </tr>

                <tr>
                    <td>Sasia</td>
                    <td>
                        <input type="number" name="sasia" value="<?php echo $sasia; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Status</td>
                    <td>
                        <select name="status">
                            <option <?php if($status=="Porositur"){echo "selected";} ?> value="Porositur">Porositur</option>
                            <option <?php if($status=="Ne Dergese"){echo "selected";} ?> value="Ne Dergese">Ne Dergese</option>
                            <option <?php if($status=="E Derguar"){echo "selected";} ?> value="E Derguar">E Derguar</option>
                            <option <?php if($status=="Anuluar"){echo "selected";} ?> value="Anuluar">Anuluar</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Customer Name: </td>
                    <td>
                        <input type="text" name="emri_konsumatorit" value="<?php echo $emri_konsumatorit; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Numri i telefonit: </td>
                    <td>
                        <input type="text" name="numri_telefonit" value="<?php echo $numri_telefonit; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Email Adresa: </td>
                    <td>
                        <input type="text" name="email" value="<?php echo $email; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Adresa: </td>
                    <td>
                        <textarea name="adresa" cols="30" rows="5"><?php echo $adresa; ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td clospan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="cmimi" value="<?php echo $cmimi; ?>">

                        <input type="submit" name="submit" value="Update Order" class="btn-secondary">
                    </td>
                </tr>
            </table>
        
        </form>


        <?php 
            //Check whether Update Button is Clicked or Not
            if(isset($_POST['submit']))
            {
                
                $id = $_POST['id'];
                $cmimi = $_POST['cmimi'];
                $sasia = $_POST['sasia'];

                $total = $cmimi * $sasia;

                $statusi = $_POST['statusi'];

                $emri_konsumatorit = $_POST['emri_konsumatorit'];
                $numri_telefonit = $_POST['numri_telefonit'];
                $email = $_POST['email'];
                $adresa = $_POST['adresa'];

                $sql2 = "UPDATE porosia SET 
                    sasia = $sasia,
                    total = $total,
                    statusi = '$statusi',
                    emri_konsumatorit = '$emri_konsumatorit',
                    numri_telefonit = '$numri_telefonit',
                    email = '$email',
                    adresa = '$adresa'
                    WHERE id=$id
                ";

                $res2 = mysqli_query($conn, $sql2);

               
                if($res2==true)
                {
                    //Updated
                    $_SESSION['update'] = "<div class='success'>Porosia eshte perditesuar me sukses!</div>";
                    header('location:'.SITEURL.'admin/manage-order.php');
                }
                else
                {
                    //Failed to Update
                    $_SESSION['update'] = "<div class='error'>Kemi deshtuar te perditesojme porosine!</div>";
                    header('location:'.SITEURL.'admin/manage-order.php');
                }
            }
        ?>


    </div>
</div>
<br><br>
<?php include('partial/footer.php'); ?>
