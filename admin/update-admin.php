<?php
include("partials/menu.php");
?>


        <!-- main content section starts -->
        <div class="main-content">
           <div class="wrapper">
               <h1>Update Admin</h1>
               <br><br>

               <form action="#" method="POST">
               <table class="tbl-30">
         <tr>
            <td> Full Name: </td>
            <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
         </tr>
         <tr>
             <td> Username: </td>
             <td><input type="text" name="username" placeholder="Enter Your Username"></td>
         </tr>
            <tr>
               <td> Password: </td>
               <td><input type="password" name="password" placeholder="Enter Your Password"></td>
            </tr>

            <tr>
               <td colspan="2">
                <input type="submit" name="submit" value="Update Admin" class="btn-second">
               </td>
              </tr>
               </table>
               </form>



<?php  include("partials/footer.php");?>