<?php include('partial/logo-part.php'); ?>
<br>
<?php 
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];

        $sql2 = "SELECT * FROM ushqimi WHERE id=$id";
        $res2 = mysqli_query($conn, $sql2);

        $row2 = mysqli_fetch_assoc($res2);

        $titulli = $row2['titulli'];
        $pershkrimi = $row2['pershkrimi'];
        $cmimi = $row2['cmimi'];
        $current_image = $row2['image_name'];
        $current_category = $row2['kategori_id'];
        $featured = $row2['featured'];
        $active = $row2['active'];

    }
    else
    {
        //Redirect to Manage Food
        header('location:'.SITEURL.'admin/manage-food.php');
    }
?>


<div class="main-content">
    <div class="wrapper">
        <h1>Perditesimi i Menuse</h1>
        <br><br>

        <form action="" method="POST" enctype="multipart/form-data">
        
        <table class="tbl-30">

            <tr>
                <td>Titulli: </td>
                <td>
                    <input type="text" name="titulli" value="<?php echo $titulli; ?>">
                </td>
            </tr>

            <tr>
                <td>Pershkrimi: </td>
                <td>
                    <textarea name="description" cols="30" rows="5"><?php echo $pershkrimi; ?></textarea>
                </td>
            </tr>

            <tr>
                <td>Cmimi: </td>
                <td>
                    <input type="number" name="cmimi" value="<?php echo $cmimi; ?>">
                </td>
            </tr>

            <tr>
                <td>Fotografia e tanishme: </td>
                <td>
                    <?php 
                        if($current_image == "")
                        {
                            echo "<div class='error'>Fotografia nuk eshte ne dispozicion!</div>";
                        }
                        else
                        {
                            ?>
                            <img src="<?php echo SITEURL; ?>image/food/<?php echo $current_image; ?>" width="150px">
                            <?php
                        }
                    ?>
                </td>
            </tr>

            <tr>
                <td>Zgjedhni nje fotografi te re: </td>
                <td>
                    <input type="file" name="image">
                </td>
            </tr>

            <tr>
                <td>Kategoria: </td>
                <td>
                    <select name="kategoria">

                        <?php 
                            $sql = "SELECT * FROM kategoria WHERE active='Po'";
                            $res = mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($res);

                            if($count>0)
                            {
                                while($row=mysqli_fetch_assoc($res))
                                {
                                    $titulli_kategorise = $row['titulli'];
                                    $kategoria_id = $row['id'];
                                    
                                    ?>
                                    <option <?php if($current_category==$kategoria_id){echo "selected";} ?> value="<?php echo $kategoria_id; ?>"><?php echo $titulli_kategorise; ?></option>
                                    <?php
                                }
                            }
                            else
                            {
                                echo "<option value='0'>Kategoria nuk eshte ne dispozicion</option>";
                            }

                        ?>

                    </select>
                </td>
            </tr>

            <tr>
                <td>Featured: </td>
                <td>
                    <input <?php if($featured=="Po") {echo "checked";} ?> type="radio" name="featured" value="Po"> Po 
                    <input <?php if($featured=="Jo") {echo "checked";} ?> type="radio" name="featured" value="Jo"> Jo 
                </td>
            </tr>

            <tr>
                <td>Active: </td>
                <td>
                    <input <?php if($active=="Po") {echo "checked";} ?> type="radio" name="active" value="Po"> Po 
                    <input <?php if($active=="Jo") {echo "checked";} ?> type="radio" name="active" value="Jo"> Jo 
                </td>
            </tr>

            <tr>
                <td>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">

                    <input type="submit" name="submit" value="Update Food" class="btn-secondary">
                </td>
            </tr>
        
        </table>
        
        </form>

        <?php 
        
            if(isset($_POST['submit']))
            {

                $id = $_POST['id'];
                $titulli = $_POST['titulli'];
                $pershkrimi = $_POST['pershkrimi'];
                $cmimi = $_POST['cmimi'];
                $current_image = $_POST['current_image'];
                $kategoria = $_POST['kategoria'];

                $featured = $_POST['featured'];
                $active = $_POST['active'];

            
                if(isset($_FILES['image']['name']))
                {
                    $image_name = $_FILES['image']['name']; 
                    if($image_name!="")
                    {
                        
                        $ext = end(explode('.', $image_name)); 
                        $image_name = "Food-Name-".rand(0000, 9999).'.'.$ext;

                        $src_path = $_FILES['image']['tmp_name']; 
                        $dest_path = "../image/food/".$image_name; 

                        $upload = move_uploaded_file($src_path, $dest_path);

                        if($upload==false)
                        {
                            $_SESSION['upload'] = "<div class='error'>Kemi deshtuar te ngarkojme fotografine e re!</div>";
                            header('location:'.SITEURL.'admin/manage-food.php');
                            die();
                        }
                        
                        if($current_image!="")
                        {
                            
                            $remove_path = "../image/food/".$current_image;

                            $remove = unlink($remove_path);

                            
                            if($remove==false)
                            {
                                $_SESSION['remove-failed'] = "<div class='error'>Kemi deshtuar te fshijme foton e tanishme!</div>";
                                header('location:'.SITEURL.'admin/manage-food.php');
                                die();
                            }
                        }
                    }
                    else
                    {
                        $image_name = $current_image; 
                    }
                }
                else
                {
                    $image_name = $current_image; 
                }

                

                $sql3 = "UPDATE ushqimi SET 
                    titulli = '$titulli',
                    pershkrimi = '$pershkrimi',
                    cmimi = $cmimi,
                    image_name = '$image_name',
                   /* kategoria_id = '$kategoria_id',*/
                    kategori_id = '$kategoria_id',
                    featured = '$featured',
                    active = '$active'
                    WHERE id=$id
                ";

                $res3 = mysqli_query($conn, $sql3);

                if($res3==true)
                {
                    $_SESSION['update'] = "<div class='success'>Menuja eshte perditesuar me sukses!</div>";
                    header('location:'.SITEURL.'admin/manage-food.php');
                }
                else
                {
                    $_SESSION['update'] = "<div class='error'>Kemi deshtuar te perditesojme Menu-ne!</div>";
                    header('location:'.SITEURL.'admin/manage-food.php');
                }

                
            }
        
        ?>

    </div>
</div>
<br><br>
<?php include('partial/footer.php'); ?>