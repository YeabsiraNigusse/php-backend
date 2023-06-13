<?php
include("partials/menu.php");
?>


        <!-- main content section starts -->
        <div class="main-content">
           <div class="wrapper">
               <h1>Manage Catagory</h1>

               <br><br><br>

               <?php  if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);

               }

                if(isset($_SESSION['remove'])){
                    echo $_SESSION['remove'];
                    unset($_SESSION['remove']);
            }  

            if(isset($_SESSION['delete'])){
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);}

                if(isset($_SESSION['no-catagory-found'])){
                    echo $_SESSION['no-catagory-found'];
                    unset($_SESSION['no-catagory-found']);
        } 
            
            ?>

            <br>

               <a href="<?php echo SITEURL.'admin/add-catagory.php'?>" class="btn-primary">Add Catagory</a>
               <br><br><br>

               <table class="full-table">

                <tr>
                <th>S.N</th>
                <th>Title</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Action</th>
                </tr>


                <?php 

                $sql = "SELECT * FROM tebl_catagory";


                $res = mysqli_query($con, $sql);


                $count = mysqli_num_rows($res);

                $sn = 1;

                if ($count > 0){

                    while($row=mysqli_fetch_assoc($res)){
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        $featured = $row['featured'];
                        $active = $row['active'];

                        ?>

                 <tr>
                    <td><?php echo $sn++; ?></td>
                    <td><?php echo $title ?></td>
                    <td><?php  
                    if ($image_name != ""){
                        ?>

                        <img src="<?php echo SITEURL; ?>images/catagory/<?php echo $image_name; ?>" width="90px" alt="">

                        <?php
                    }else{
                        echo '<div class="error">"No Image";</div>';
                    } ?>
                    
                    </td>
                    <td><?php echo $featured ?></td>
                    <td><?php echo $active ?></td>
                    <td>
                        <a href="<?php echo SITEURL;?>admin/update-catagory.php?id=<?php echo $id; ?>" class="btn-second">Update Catagory</a>
                        <a href="<?php echo SITEURL;?>admin/delete-catagory.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name;?>" class="btn-danger">Delete Catagory</a>
                    </td>
                </tr>

                        <?php
                    }

                }else{
                    ?>
                    <tr>
                        <td colspan="6"><div class="error">No Catagory Added</div></td>
                    </tr>
                    <?php  

                    
                }
                
                
                
                ?>

               </table>

           </div>
        </div>
        <!-- main content section ends -->

<?php  include("partials/footer.php");?>