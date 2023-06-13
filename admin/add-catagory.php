<?php
include("partials/menu.php");
?>

<div class="main-content">
           <div class="wrapper">
            <h1>Add Catagory</h1>

            <br><br>

            <?php  
            
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']); } 
                
            if(isset($_SESSION['upload'])){
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']); } 
                     
                
                ?>

            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl-30">
                    <tr>
                        <td>Title</td>
                        <td><input type="text" name="title"placeholder="catagory title"></td>
                    </tr>

                    <tr>
                        <td>Select Image:</td>
                        <td>
                            <input type="file" name="image">
                        </td>
                    </tr>

                    <tr>
                        <td>Feature:</td>
                        <td>
                            <input type="radio" name="featured"  value="Yes">YES
                            <input type="radio" name="featured"  value="No">NO
                        </td>
                    </tr>

                    <tr>
                        <td>Active:</td>
                        <td>
                            <input type="radio" name="active"  value="Yes">YES
                            <input type="radio" name="active"  value="No">NO
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Catagory" class="btn-second">
                        </td>
                    </tr>

                </table>
            </form>

            <?php
            
            if(isset($_POST['submit'])){
                
                $title = $_POST['title'];

                if(isset($_POST['featured'])){
                    $featured = $_POST['featured'];

                }else{

                    $featured = 'No';

                }

                if(isset($_POST['active'])){
                    $active = $_POST['active'];

                }else{

                    $active = 'No';

                }

                // print_r($_FILES['image']);

                // die();

                if(isset($_FILES['image']['name'])){

                    $image_name = $_FILES['image']['name'];


                            if($image_name != "")
                            {


                                $ext = end(explode('.', $image_name));

                                $image_name = "Food Catagory_".rand(000,999).'.'.$ext;

        
                                $source_path = $_FILES['image']['tmp_name'];
                                $destination_path = "../images/catagory/".$image_name;


                                $upload = move_uploaded_file($source_path, $destination_path);

                                if ($upload == false){
                                $_SESSION['upload'] = '<div class="error">Failed to Upload, Please Upload the Image</div>';

                                header("location:".SITEURL.'admin/add-catagory.php');

                                die();

                                }

                                }
                                else{
                                    $image_name = "";
        
                                    }

                                        $sql = "INSERT INTO tebl_catagory SET
                                        title = '$title',
                                        image_name='$image_name',
                                        featured = '$featured',
                                        active= '$active'";

                                        $res = mysqli_query($con, $sql);

                                    if($res==true){

                                    $_SESSION['add'] = "<div class='success'> Catagory Added Sucessefully. </div>";

                            header('location:'.SITEURL.'admin/manage-catagory.php');

                        }
                          else{

                            $_SESSION['add'] = "<div class='success'> Failed to Add Catagory. </div>";

                            header("location:".SITEURL.'admin/add-catagory.php');

                            }

                }

            }
            ?>

           </div></div>

<?php  include("partials/footer.php");?>