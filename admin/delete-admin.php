<?php 
    include('../config/constants.php');

    $id = $_GET['id'];

    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    $res = mysqli_query($conn, $sql);

    if($res==true)
    {
        //Query Executed Successully and Admin Deleted
        $_SESSION['delete'] = "<div class='success'>Admini eshte fshire me sukses!</div>";
        //Redirect to Manage Admin Page
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else
    {
        $_SESSION['delete'] = "<div class='error'>Kemi deshtuar te fshijme Adminin, provo perseri!</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }

?>