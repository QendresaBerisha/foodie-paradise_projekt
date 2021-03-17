<?php include('partial/logo-part.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Menaxhimi i Porosise</h1>

                <br /><br /><br />

                <?php 
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                ?>
                <br><br>

                <table class="tbl-full">
                    <tr>
                        <th>Numri Serik</th>
                        <th>Ushqimi</th>
                        <th>Cmimi</th>
                        <th>Sasia</th>
                        <th>Totali</th>
                        <th>Data e Porosise</th>
                        <th>Statusi</th>
                        <th>Emri i Konsumatorit</th>
                        <th>Kontakti</th>
                        <th>Email</th>
                        <th>Adresa</th>
                        <th>Actions</th>
                    </tr>

                    <?php 
                        //Get all the orders from database
                        $sql = "SELECT * FROM porosia ORDER BY id DESC"; 
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);

                        $sn = 1; 

                        if($count>0)
                        {
                            //Order Available
                            while($row=mysqli_fetch_assoc($res))
                            {
                                //Get all the order details
                                $id = $row['id'];
                                $emri_ushqimit = $row['emri_ushqimit'];
                                $cmimi = $row['cmimi'];
                                $sasia = $row['sasia'];
                                $total = $row['total'];
                                $data_porosise = $row['data_porosise'];
                                $statusi = $row['statusi'];
                                $emri_konsumatorit = $row['emri_konsumatorit'];
                                $numri_telefonit = $row['numri_telefonit'];
                                $email = $row['email'];
                                $adresa = $row['adresa'];
                                
                                ?>

                                    <tr>
                                        <td><?php echo $sn++; ?>. </td>
                                        <td><?php echo $emri_ushqimit; ?></td>
                                        <td><?php echo $cmimi; ?>€</td>
                                        <td><?php echo $sasia; ?></td>
                                        <td><?php echo $total; ?>€</td>
                                        <td><?php echo $data_porosise; ?></td>

                                        <td>
                                            <?php 
                                    
                                               if($statusi=="Porositur")
                                                {
                                                    echo "<label>$statusi</label>";
                                                }
                                                elseif($statusi=="Ne Dergese")
                                                {
                                                    echo "<label style='color: orange;'>$statusi</label>";
                                                }
                                                elseif($statusi=="E Derguar")
                                                {
                                                    echo "<label style='color: green;'>$statusi</label>";
                                                }
                                                elseif($statusi=="Anuluar")
                                                {
                                                    echo "<label style='color: red;'>$statusi</label>";
                                                }
                                            ?>
                                        </td>

                                        <td><?php echo $emri_konsumatorit; ?></td>
                                        <td><?php echo $numri_telefonit; ?></td>
                                        <td><?php echo $email; ?></td>
                                        <td><?php echo $adresa; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id; ?>" class="btn-secondary">Update Order</a>
                                        </td>
                                    </tr>

                                <?php

                            }
                        }
                        else
                        {
                            //Order not Available
                            echo "<tr><td colspan='12' class='error'>Porosia nuk eshte e disponueshme!</td></tr>";
                        }
                    ?>

 
                </table>
    </div>
    
</div>
<br><br>
<?php include('partial/footer.php'); ?>