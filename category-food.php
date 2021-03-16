<?php include('partials/header.php'); ?>

 

<?php 

    //CHeck whether id is passed or not

    if(isset($_GET['kategoria_id']))

    {

        //Category id is set and get the id

        $kategoria_id = $_GET['kategoria_id'];

        // Get the CAtegory Title Based on Category ID

        $sql = "SELECT titulli FROM kategoria WHERE id=$kategoria_id";

 

        //Execute the Query

        $res = mysqli_query($conn, $sql);

 

        //Get the value from Database

        $row = mysqli_fetch_assoc($res);

        //Get the TItle

        $kategoria_titulli = $row['titulli'];

    }

    else

    {

        //CAtegory not passed

        //Redirect to Home page

        header('location:'.SITEURL);

    }

?>

 

<!-- fOOD sEARCH Section Starts Here -->

<section class="food-search text-center">

    <div class="container">

        

        <h2>Ushqimet ne<a href="#" class="text-white">"<?php echo $kategoria_titulli; ?>"</a></h2>

 

    </div>

</section>

<!-- fOOD sEARCH Section Ends Here -->




<!-- fOOD MEnu Section Starts Here -->

<section class="food-menu">

    <div class="container">

        <h2 class="text-center">Ushqimet e Kategorise se zgjedhur</h2>

 

        <?php 

        

            //Create SQL Query to Get foods based on Selected CAtegory

            $sql2 = "SELECT * FROM ushqimi WHERE kategori_id=$kategoria_id";

 

            //Execute the Query

            $res2 = mysqli_query($conn, $sql2);

 

            //Count the Rows

            $count2 = mysqli_num_rows($res2);

 

            //CHeck whether food is available or not

            if($count2>0)

            {

                //Food is Available

                while($row2=mysqli_fetch_assoc($res2))

                {

                    $id = $row2['id'];

                    $titulli = $row2['titulli'];

                    $cmimi = $row2['cmimi'];

                    $pershkrimi = $row2['pershkrimi'];

                    $image_name = $row2['image_name'];

                    ?>

                    

                    <div class="food-menu-box">

                        <div class="food-menu-img">

                            <?php 

                                if($image_name=="")

                                {

                                    //Image not Available

                                    echo "<div class='error'>Image not Available.</div>";

                                }

                                else

                                {

                                    //Image Available

                                    ?>

                                    <img src="<?php echo SITEURL; ?>image/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">

                                    <?php

                                }

                            ?>

                            

                        </div>

 

                        <div class="food-menu-desc">

                            <h4><?php echo $titulli; ?></h4>

                            <p class="food-price">$<?php echo $cmimi; ?></p>

                            <p class="food-detail">

                                <?php echo $pershkrimi; ?>

                            </p>

                            <br>

 

                            <a href="<?php echo SITEURL; ?>order.php?ushqimi_id=<?php echo $id; ?>" class="btn btn-primary">Porosit Tani</a>

                        </div>

                    </div>

 

                    <?php

                }

            }

            else

            {

                //Food not available

                echo "<div class='error'>Food not Available.</div>";

            }

        

        ?>

 

        

 

        <div class="clearfix"></div>

 

        

 

    </div>

 

</section>

<!-- fOOD Menu Section Ends Here -->

 

<?php include('partials/footer.php'); ?>