   <?php
   // Header
   include_once "include/db_connect.php";
   include_once "include/header.php";
   ?>

   <!-- Start Content -->
   <h4>Login</h4>

   <form method="POST" action="process_login.php">

      <div class="mb-3 mt-2">
         <label class="form-label">Username</label>
         <input type="text" class="form-control" name="username" placeholder="Enter Your Username" required>
      </div>

      <div class="mb-3">
         <label class="form-label">Password</label>
         <input type="password" class="form-control" name="password" placeholder="Enter Your Password" required>
      </div>

      <button type="submit" class="btn btn-primary" name="btnLogin">Login</button>
   </form>


   <!-- End Content -->


   <?php
   // Footer
   include "include/footer.php";
   ?>