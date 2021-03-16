<?php include('partials/header.php'); ?>

 

<?php 

    //CHeck whether food id is set or not

    if(isset($_GET['ushqimi_id']))

    {

        //Get the Food id and details of the selected food

        $ushqimi_id = $_GET['ushqimi_id'];

 

        //Get the DEtails of the SElected Food

        $sql = "SELECT * FROM ushqimi WHERE id=$ushqimi_id";

        //Execute the Query

        $res = mysqli_query($conn, $sql);

        //Count the rows

        $count = mysqli_num_rows($res);

        //CHeck whether the data is available or not

        if($count==1)

        {

            //WE Have DAta

            //GEt the Data from Database

            $row = mysqli_fetch_assoc($res);

 

            $titulli = $row['titulli'];

            $cmimi = $row['cmimi'];

            $image_name = $row['image_name'];

        }

        else

        {

            //Food not Availabe

            //REdirect to Home Page

            header('location:'.SITEURL);

        }

    }

    else

    {

        //Redirect to homepage

        header('location:'.SITEURL);

    }

?>

 

<!-- fOOD sEARCH Section Starts Here -->

<section class="food-search">

    <div class="container">

        

        <h2 class="text-center text-white">Plotesoni formen per te porositur ushqimin.</h2>

 

        <form action="" method="POST" class="order">

            <fieldset>

                <legend>Zgjedhni ushqimin</legend>

 

                <div class="food-menu-img">

                    <?php 

                    

                        //CHeck whether the image is available or not

                        if($image_name=="")

                        {

                            //Image not Availabe

                            echo "<div class='error'>Image not Available.</div>";

                        }

                        else

                        {

                            //Image is Available

                            ?>

                            <img src="<?php echo SITEURL; ?>image/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">

                            <?php

                        }

                    

                    ?>

                    

                </div>

 

                <div class="food-menu-desc">

                    <h3><?php echo $titulli; ?></h3>

                    <input type="hidden" name="emri_ushqimit" value="<?php echo $titulli; ?>">

 

                    <p class="food-price">€<?php echo $cmimi; ?></p>

                    <input type="hidden" name="cmimi" value="<?php echo $cmimi; ?>">

 

                    <div class="order-label">Sasia</div>

                    <input type="number" name="sasia" class="input-responsive" value="1" required>

                    

                </div>

 

            </fieldset>

            

            <fieldset>

                <legend>Detajet e dergeses</legend>

                <div class="order-label">Emri dhe Mbiemri</div>

                <input type="text" name="emri-mbiemri" placeholder="Emri dhe Mbiemri" class="input-responsive" required>

 

                <div class="order-label">Numri i Telefonit</div>

                <input type="tel" name="numri_t" placeholder="Numri i telefonit" class="input-responsive" required>

 

                <div class="order-label">Email</div>

                <input type="email" name="email" placeholder="email" class="input-responsive" required>

 

                <div class="order-label">Adresa</div>

                <textarea name="adresa" rows="10" placeholder="adresa" class="input-responsive" required></textarea>

 

                <input type="submit" name="submit" value="Konfirmo porosine" class="btn btn-primary">

            </fieldset>

 

        </form>

 

        <?php 

 

            //CHeck whether submit button is clicked or not

            if(isset($_POST['submit']))

            {

                // Get all the details from the form

 

                $emri_ushqimit = $_POST['emri_ushqimit'];

                $cmimi = $_POST['cmimi'];

                $sasia = $_POST['sasia'];

 

                $total = $cmimi * $sasia; // total = price x qty 

 

                $data_porosise = date("Y-m-d h:i:sa"); //Order DAte

 

                $statusi = "Porositur";  // Ordered, On Delivery, Delivered, Cancelled

 

                $emri_konsumatorit = $_POST['emri-mbiemri'];

                $numri_telefonit = $_POST['numri_t'];

                $email = $_POST['email'];

                $adresa = $_POST['adresa'];

 

                //Save the Order in Databaase

                //Create SQL to save the data

                $sql2 = "INSERT INTO porosia SET 

                    emri_ushqimit = '$emri_ushqimit',

                    cmimi = $cmimi,

                    sasia = $sasia,

                    total = $total,

                    data_porosise = '$data_porosise',

                    statusi = '$statusi',

                    emri_konsumatorit = '$emri_konsumatorit',

                    numri_telefonit = '$numri_telefonit',

                    email = '$email',

                    adresa = '$adresa'

                ";

 

                //echo $sql2; die();

 

                //Execute the Query

                $res2 = mysqli_query($conn, $sql2);

 

                //Check whether query executed successfully or not

                if($res2==true)

                {

                    //Query Executed and Order Saved

                    $_SESSION['order'] = "<div class='success text-center'>Ushqimi eshte porositur me sukses!</div>";

                    header('location:'.SITEURL);

                }

                else

                {

                    //Failed to Save Order

                    $_SESSION['order'] = "<div class='error text-center'>Keni deshtuar te porosisni ushqimin!</div>";

                    header('location:'.SITEURL);

                }

 

            }

        

        ?>

 

    </div>

</section>

<!-- fOOD sEARCH Section Ends Here -->

 

<?php include('partials/footer.php'); ?>