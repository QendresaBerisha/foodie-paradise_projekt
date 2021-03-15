<?php include('partial/logo-part.php'); ?>
<br>
<div class="main-content">
    <div class="wrapper">
        <h1>Shto Ushqimin</h1>

        <br><br>

        <?php 
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
        
            <table class="tbl-30">

                <tr>
                    <td>Titulli: </td>
                    <td>
                        <input type="text" name="titulli" placeholder="Titulli i ushqimit">
                    </td>
                </tr>

                <tr>
                    <td>Pershkrimi: </td>
                    <td>
                        <textarea name="pershkrimi" cols="30" rows="5" placeholder="Pershkrimi i ushqimit."></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Cmimi: </td>
                    <td>
                        <input type="number" name="cmimi">
                    </td>
                </tr>

                <tr>
                    <td>Zgjedhni nje fotografi: </td>
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
                                        $id = $row['id'];
                                        $titulli = $row['titulli'];

                                        ?>

                                        <option value="<?php echo $id; ?>"><?php echo $titulli; ?></option>

                                        <?php
                                    }
                                }
                                else
                                {
                                    ?>
                                    <option value="0">No Category Found</option>
                                    <?php
                                }
                           ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Po"> Po 
                        <input type="radio" name="featured" value="Jo"> Jo
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Po"> Po 
                        <input type="radio" name="active" value="Jo"> Jo
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Food" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>

        
        <?php 

            if(isset($_POST['submit']))
            {
                
                $titulli = $_POST['titulli'];
                $pershkrimi = $_POST['pershkrimi'];
                $cmimi = $_POST['cmimi'];
                $kategoria = $_POST['kategoria'];

                if(isset($_POST['featured']))
                {
                    $featured = $_POST['featured'];
                }
                else
                {
                    $featured = "Jo"; 
                }

                if(isset($_POST['active']))
                {
                    $active = $_POST['active'];
                }
                else
                {
                    $active = "Jo"; 
                }

                if(isset($_FILES['image']['name']))
                {
                   $image_name = $_FILES['image']['name'];
                    
                     if( $image_name != "")
                    {

                        $ext =end(explode('.', $image_name));
                        
                        

                        //Rename the Image
                        $image_name = "Food_Name_".rand(0000, 9999).'.'.$ext; 
                        

                        $source_path = $_FILES['image']['tmp_name'];

                        $destination_path = "../image/food/".$image_name;

                        $upload = move_uploaded_file($source_path, $destination_path);

                        if($upload==false)
                        {
                            $_SESSION['upload'] = "<div class='error'>Ka deshtuar te ngarkohet fotografia! </div>";
                            header('location:'.SITEURL.'admin/add-food.php');
                            die();
                        }

                    }
                }
                else
                {
                    $image_name="";
                }

                $sql = "INSERT INTO ushqimi SET 
                    titulli='$titulli',
                    pershkrimi='$pershkrimi',
                    cmimi='$cmimi',
                    image_name='$image_name',
                    kategori_id='$kategoria',
                    featured='$featured',
                    active='$active'
                ";

                $res = mysqli_query($conn, $sql);

                if($res==true)
                {
                    $_SESSION['add'] = "<div class='success'>Ushqimi eshte shtuar me sukses ne Menu!</div>";
                    //Redirect to Manage Category Page
                    header('location:'.SITEURL.'admin/manage-food.php');
                }
                else
                {
                    //Failed to Add Category
                    $_SESSION['add'] = "<div class='error'>Kemi deshtuar te shtojme Ushqimin ne Menu!</div>";
                    //Redirect to Manage Category Page
                    header('location:'.SITEURL.'admin/add-food.php');
                }
            }
        
        ?>
    </div>
</div>
<br><br>
<?php include('partial/footer.php'); ?>