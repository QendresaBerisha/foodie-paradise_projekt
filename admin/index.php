<?php include('partial/logo-part.php'); ?>
 
        <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Faqja Kryesore</h1>
                <br><br>
               
                <br><br>

                <div class="col-4 text-center">

                    <?php 
                        $sql = "SELECT * FROM kategoria";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);
                    ?>

                    <h1><?php echo $count; ?></h1>
                    <br />
                    Kategorite
                </div>

                <div class="col-4 text-center">

                    <?php 
                        //Sql Query 
                        $sql2 = "SELECT * FROM ushqimi";
                        //Execute Query
                        $res2 = mysqli_query($conn, $sql2);
                        //Count Rows
                        $count2 = mysqli_num_rows($res2);
                    ?>

                    <h1><?php echo $count2; ?></h1>
                    <br />
                    Ushqimet
                </div>

                <div class="col-4 text-center">
                    
                    <?php 
                        $sql3 = "SELECT * FROM porosia";
                        $res3 = mysqli_query($conn, $sql3);
                        $count3 = mysqli_num_rows($res3);
                    ?>

                    <h1><?php echo $count3; ?></h1>
                    <br />
                    Porosite ne Total
                </div>

                <div class="col-4 text-center">
                    
                    <?php 
                      
                        $sql4 = "SELECT SUM(total) AS total FROM porosia WHERE status='E Derguar'";

                        $res4 = mysqli_query($conn, $sql4);

                        $row4 = mysqli_fetch_assoc($res4);
                        
                        $total_revenue = $row4['total'];

                    ?>

                    <h1>$<?php echo $total_revenue; ?></h1>
                    <br />
                    Revenue Generated
                </div>

                <div class="clearfix"></div>

            </div>
        </div>
        <!-- Main Content Setion Ends -->
<br><br>
<?php include('partial/footer.php') ?>