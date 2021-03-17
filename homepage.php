<?php include('partials/header.php'); ?>

    <?php 

        if(isset($_SESSION['order']))

        {

            echo $_SESSION['order'];

            unset($_SESSION['order']);

        }

    ?>

    <!-- CAtegories Section Starts Here -->

    <section class="categories">

        <div class="container1">

            <h2 class="h1-menu">Eksploro Ushqimet</h2>

 

            <?php 

                //Create SQL Query to Display CAtegories from Database

                $sql = "SELECT * FROM kategoria WHERE active='Po' AND featured='Po' LIMIT 3";

                //Execute the Query

                $res = mysqli_query($conn, $sql);

                //Count rows to check whether the category is available or not

                $count = mysqli_num_rows($res);

 

                if($count>0)

                {

                    //CAtegories Available

                    while($row=mysqli_fetch_assoc($res))

                    {

                        //Get the Values like id, title, image_name

                        $id = $row['id'];

                        $titulli = $row['titulli'];

                        $image_name = $row['image_name'];

                        ?>

                        

                        <a href="<?php echo SITEURL; ?>category-food.php?kategoria_id=<?php echo $id; ?>">

                            <div class="box-3 float-container">

                                <?php 

                                    if($image_name=="")

                                    {

                                        echo "<div class='error'>Fotografia nuk eshte ne dispozicion!</div>";

                                    }

                                    else

                                    {
                                        ?>

                                        <img src="<?php echo SITEURL; ?>image/category/<?php echo $image_name; ?>" alt="Image not available" class="img-responsive img-curve">

                                        <?php

                                    }

                                ?>

                                

 

                                <h3 class="float-text text-white"><?php echo $titulli; ?></h3>

                            </div>

                        </a>
                        <?php

                    }

                }

                else

                {
                    echo "<div class='error'>Kategoria nuk eshte shtuar.</div>";

                }

            ?>
            <div class="clearfix"></div>

        </div>

    </section>

    <section class="food-menu">

        <div class="container1">

            <h2 class="h1-menu">Menuja e Ushqimit</h2>

 

            <?php 

            $sql2 = "SELECT * FROM ushqimi WHERE active='Po' AND featured='Po' LIMIT 6";

            $res2 = mysqli_query($conn, $sql2);

            $count2 = mysqli_num_rows($res2);


            if($count2>0)

            {

                while($row=mysqli_fetch_assoc($res2))

                {

                    $id = $row['id'];

                    $titulli = $row['titulli'];

                    $cmimi = $row['cmimi'];

                    $pershkrimi = $row['pershkrimi'];

                    $image_name = $row['image_name'];

                    ?>

 

                    <div class="food-menu-box">

                        <div class="food-menu-img">

                            <?php 

                                if($image_name=="")

                                {

                                    echo "<div class='error'>Fotografia nuk eshte ne dispozicion!</div>";

                                }

                                else

                                {
                                    ?>

                                    <img src="<?php echo SITEURL; ?>image/food/<?php echo $image_name; ?>" alt="Image not available" class="img-responsive img-curve">

                                    <?php

                                }

                            ?>
                        </div>
                       <div class="food-menu-desc">

                            <h4><?php echo $titulli; ?></h4>

                            <p class="food-price"><?php echo $cmimi; ?>€</p>

                            <p class="food-detail">

                                <?php echo $pershkrimi; ?>

                            </p>

                            <br>
                            <a href="<?php echo SITEURL; ?>order.php?ushqimi_id=<?php echo $id; ?>" class="btn btn-primary">Porosit tani</a>

                        </div>

                    </div>
                    <?php

                }

            }

            else

            {

                echo "<div class='error'>Ushqimi nuk eshte ne dispozicion!</div>";

            }

            

            ?>

            <div class="clearfix"></div>
        </div>

    </section>

      <?php include('partials/footer.php'); ?>