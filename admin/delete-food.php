<?php 
    include('../config/constants.php');


    if(isset($_GET['id']) && isset($_GET['image_name'])) 
    {
        

        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

       
        if($image_name != "")
        {
            
            $path = "../image/food".$image_name;

            $remove = unlink($path);

            if($remove==false)
            {
                $_SESSION['upload'] = "<div class='error'>Kemi deshtuar te fshijme fotografine!</div>";
                header('location:'.SITEURL.'admin/manage-food.php');
                die();
            }

        }

        $sql = "DELETE FROM ushqimi WHERE id=$id";
        //Execute the Query
        $res = mysqli_query($conn, $sql);

    
        if($res==true)
        {
            //Food Deleted
            $_SESSION['delete'] = "<div class='success'>Ushqimi eshte fshire me sukses!</div>";\
            header('location:'.SITEURL.'admin/manage-food.php');
        }
        else
        {
            $_SESSION['delete'] = "<div class='error'>Kemi deshtuar te fshijme Ushqimin!</div>";\
            header('location:'.SITEURL.'admin/manage-food.php');
        }

        

    }
    else
    {
    
        $_SESSION['unauthorize'] = "<div class='error'>Casje e paautorizuar!</div>";
        header('location:'.SITEURL.'admin/manage-food.php');
    }

?>