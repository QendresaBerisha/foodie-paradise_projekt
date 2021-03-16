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

 

                