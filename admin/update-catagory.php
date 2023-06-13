<?php
include("partials/menu.php");
?>

<div class="main-content">
           <div class="wrapper">
            <h1>Update Catagory</h1>
            <br><br>


            <?php  
                    if(isset($_GET['id'])){
                        


                        $id = $_GET['id'];
                        $sql = "SELECT * FROM tebl_catagory WHERE id=$id";


                        $res = mysqli_query($con, $sql);

                        $count = mysqli_num_rows($res);

                        if($count == 1){

                            $row = mysqli_fetch_assoc($res);

                            $title = $row['title'];
                            $current_image = $row['image_name'];
                            $featured = $row['featured'];
                            $active = $row['active'];

                         }
                         else{
                            $_SESSION['no-catagory-found'] = '<div class="error">No Catagory Found</div>';
                            header("location:".SITEURL.'admin/manage-catagory.php');
                         }

                         }
                         else{

                            header("location:".SITEURL.'admin/manage-catagory.php');

                         } ?>

                         <form action="" method="POST" enctype="multipart/form-data">
                            <table>
                                <tr>
                                    <td>Title:</td>
                                    <td><input type="text" name="title" value="<?php echo $title; ?>"></td>
                                </tr>

                                <tr>
                                    <td>Current Image:</td>
                                    <td>
                                        <?php
                                    if ($current_image != ""){

                                        ?>

                                         <img src="<?php echo SITEURL; ?>images/catagory/<?php echo $current_image; ?>" width="90px" alt="">


                                            <?php
                                        }else{
                                            echo '<div class="error">"Image Not Added";</div>';
                                        } ?>
                                        
                                    </td>
                                </tr>

                                <tr>
                                    <td>New Image: </td>
                                    <td><input type="file" name="image"></td>
                                </tr>

                                <tr>
                                        <td>Feature:</td>
                                        <td>
                                            <input <?php if($featured=="Yes"){echo "checked";}  ?> type="radio" name="featured"  value="Yes">YES
                                            <input <?php if($featured=="No"){echo "checked";} ?> type="radio" name="featured"  value="No">NO
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Active:</td>
                                        <td>
                                        <input <?php if($active=="Yes"){echo "checked";}  ?> type="radio" name="featured"  value="Yes">YES
                                        <input <?php if($active=="No"){echo "checked";} ?> type="radio" name="featured"  value="No">NO
                                        </td>
                                    </tr>   

                                    <tr>
                                        <td colspan="2">
                                            <input type="submit" name="submit" value="Update Catagory" class="btn-second">
                                        </td>
                                    </tr>
                            </table>
                </form>
            </div></div>



    <?php  include("partials/footer.php");?>