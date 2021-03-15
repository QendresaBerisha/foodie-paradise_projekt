<?php 
    include('../config/constants.php');

    if(isset($_GET['id']) && isset($_GET['image_name'])) 
    {
    
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        if($image_name != "")
        {
            $path = "../image/food/".$image_name;

            $remove = unlink($path);

            if($remove==false)
            {
                $_SESSION['upload'] = "<div class='error'>Kemi deshtuar te fshijme fotografine!</div>";
                header('location:'.SITEURL.'admin/manage-food.php');
                die();
            }

        }
        $sql = "DELETE FROM ushqimi WHERE id=$id";
        $res = mysqli_query($conn, $sql);

        if($res==true)
        {
            $_SESSION['delete'] = "<div class='success'>Ushqimi eshte fshire me sukses nga Menu-ja!</div>";\
            header('location:'.SITEURL.'admin/manage-food.php');
        }
        else
        {
            $_SESSION['delete'] = "<div class='error'>Kemi deshtuar te fshijme ushqimin nga Menu-ja!</div>";\
            header('location:'.SITEURL.'admin/manage-food.php');
        }

        

    }
    else
    {
        $_SESSION['unauthorize'] = "<div class='error'>Hyrje e paautorizuar!</div>";
        header('location:'.SITEURL.'admin/manage-food.php');
    }

?>