<?php include('partials/header.php'); ?>

<section class="categories">

    <div class="container1">

        <h2 class="text-center">Ushqimet me Kategori</h2>
        <?php
            $sql = "SELECT * FROM kategoria WHERE active='Po'";

 

            //Execute the Query

            $res = mysqli_query($conn, $sql);

 

            //Count Rows

            $count = mysqli_num_rows($res);

 

            //CHeck whether categories available or not

            if($count>0)

            {

                //CAtegories Available

                while($row=mysqli_fetch_assoc($res))

                {

                    //Get the Values

                    $id = $row['id'];

                    $titulli = $row['titulli'];

                    $image_name = $row['image_name'];

                    ?>

                   

                    <a href="<?php echo SITEURL; ?>category-food.php?kategoria_id=<?php echo $id; ?>">

                        <div class="box-3 float-container">

                            <?php

                                if($image_name=="")

                                {

                                    //Image not Available

                                    echo "<div class='error'>Fotografia nuk ekziston!</div>";

                                }

                                else

                                {

                                    //Image Available

                                    ?>

                                    <img src="<?php echo SITEURL; ?>image/category/<?php echo $image_name; ?>" alt="Image not available" class="img-responsive img-curve">

                                    <?php

                                }

                            ?>

                            <h3 class="float-text text-color"><?php echo $titulli; ?></h3>

                        </div>

                    </a>
                    <?php

                }

            }

            else

            {

                //CAtegories Not Available

                echo "<div class='error'>Kategoria nuk ekziston!</div>";

            }      

        ?>
        <div class="clearfix"></div>

    </div>

</section> 

<?php include('partials/footer.php'); ?>

 