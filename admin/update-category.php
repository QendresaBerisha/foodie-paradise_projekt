<?php include('partial/logo-part.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Perditesimi i Kategorise</h1>

        <br><br>


        <?php 
        
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
                $sql = "SELECT * FROM kategoria WHERE id=$id";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    $row = mysqli_fetch_assoc($res);
                    $titulli = $row['titulli'];
                    $current_image = $row['image_name'];
                    $featured = $row['featured'];
                    $active = $row['active'];
                }
                else
                {
                    $_SESSION['no-category-found'] = "<div class='error'>Category not Found.</div>";
                    header('location:'.SITEURL.'admin/manage-category.php');
                }

            }
            else
            {
                header('location:'.SITEURL.'admin/manage-category.php');
            }
        
        ?>

        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Titulli: </td>
                    <td>
                        <input type="text" name="title" value="<?php echo $titulli; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Fotografia e tanishme: </td>
                    <td>
                        <?php 
                            if($current_image != "")
                            {
                                ?>
                                <img src="<?php echo SITEURL; ?>image/category/<?php echo $current_image; ?>" width="150px">
                                <?php
                            }
                            else
                            {
                                echo "<div class='error'>Fotografia nuk eshte shtuar!</div>";
                            }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>Fotografia e re: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input <?php if($featured=="Po"){echo "checked";} ?> type="radio" name="featured" value="Po"> Po 

                        <input <?php if($featured=="Jo"){echo "checked";} ?> type="radio" name="featured" value="Jo"> Jo 
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input <?php if($active=="Po"){echo "checked";} ?> type="radio" name="active" value="Po"> Po 

                        <input <?php if($active=="Jo"){echo "checked";} ?> type="radio" name="active" value="Jo"> Jo 
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Category" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>

        <?php 
        
            if(isset($_POST['submit']))
            {
                //Get all the values from our form
                $id = $_POST['id'];
                $titulli = $_POST['title'];
                $current_image = $_POST['current_image'];
                $featured = $_POST['featured'];
                $active = $_POST['active'];

                //Updating New Image if selected
                if(isset($_FILES['image']['name']))
                {
                    //Get the Image Details
                    $image_name = $_FILES['image']['name'];

                    //Check whether the image is available or not
                    if($image_name != "")
                    {

                        //Get the Extension of our image (jpg, png, gif, etc) e.g. "specialfood1.jpg"
                        $ext = end(explode('.', $image_name));

                        //Rename the Image
                        $image_name = "Food_Category_".rand(000, 999).'.'.$ext; // e.g. Food_Category_834.jpg
                        

                        $source_path = $_FILES['image']['tmp_name'];

                        $destination_path = "../image/category/".$image_name;

                        $upload = move_uploaded_file($source_path, $destination_path);

                        //Check whether the image is uploaded or not
                        //And if the image is not uploaded then we will stop the process and redirect with error message
                        if($upload==false)
                        {
                            $_SESSION['upload'] = "<div class='error'>Kemi deshtuar te shtojme fotografine!</div>";
                            header('location:'.SITEURL.'admin/manage-category.php');
                            die();
                        }

                        //Remove the Current Image if available
                        if($current_image!="")
                        {
                            $remove_path = "../image/category/".$current_image;

                            $remove = unlink($remove_path);

                            //Check whether the image is removed or not
                            //If failed to remove then display message and stop the processs
                            if($remove==false)
                            {
                                $_SESSION['failed-remove'] = "<div class='error'>Kemi deshtuar te fshijme fotografine!</div>";
                                header('location:'.SITEURL.'admin/manage-category.php');
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

                //Update the Database
                $sql2 = "UPDATE kategoria SET 
                    titulli = '$titulli',
                    image_name = '$image_name',
                    featured = '$featured',
                    active = '$active' 
                    WHERE id=$id
                ";

                $res2 = mysqli_query($conn, $sql2);

               
                if($res2==true)
                {
                    $_SESSION['update'] = "<div class='success'>Kategoria eshte perditesuar me sukses!</div>";
                    header('location:'.SITEURL.'admin/manage-category.php');
                }
                else
                {
                    //failed to update category
                    $_SESSION['update'] = "<div class='error'>Kemi deshtuar te perditesojme kategorine!</div>";
                    header('location:'.SITEURL.'admin/manage-category.php');
                }

            }
        
        ?>

    </div>
</div>

<?php include('partial/footer.php'); ?>