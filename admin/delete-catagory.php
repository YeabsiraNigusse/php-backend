<?php 

include("../config/constants.php");

if(isset($_GET['id']) AND isset($_GET['image_name'])){

    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    if ($image_name != ""){

        //delete the image

        $path = "../images/catagory/".$image_name;

        $remove = unlink($path);

        if($remove == false){
            $_SESSION['remove'] = '<div class="error">Failed to Remove Catagory</div>';

            header("location:".SITEURL.'admin/manage-catagory.php');

            die();
        }

        $sql = "DELETE FROM tebl_catagory WHERE id=$id";


        $res = mysqli_query($con, $sql);

        if($res == true){

            $_SESSION['delete'] = '<div class="success">Catagory deleted Successfully</div>';
            header('location:'.SITEURL.'admin/manage-catagory.php');

        }else{

            $_SESSION['delete'] = '<div class="error"> Failed to Delete Catagory</div>';
            header('location:'.SITEURL.'admin/manage-catagory.php');

        }
    }else
    {
        header("location:".SITEURL.'admin/manage-catagory.php');
    
    }
}else

{
    header("location:".SITEURL.'admin/manage-catagory.php');

}

?>  