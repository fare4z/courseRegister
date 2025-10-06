   <?php
   // Header
   include_once "include/db_connect.php";
     include_once "include/header.php";
   ?>

   <!-- Start Content -->
   <h4>Create an account</h4>

   <form method="POST" action="process_register.php">

      <div class="mb-3 mt-2">
         <label class="form-label">Username</label>
         <input type="text" class="form-control" name="username" placeholder="Enter Your Username" required>
      </div>

      <div class="mb-3">
         <label class="form-label">Password</label>
         <input type="password" class="form-control" name="password" placeholder="Enter Your Password" required>
      </div>

      <div class="mb-3">
         <label class="form-label">Fullname</label>
         <input type="text" class="form-control" name="fullname" placeholder="Enter Your Fullname" required>
      </div>

      <div class="mb-3">
         <label class="form-label">Date of Birth</label>
         <input type="date" class="form-control" name="dob" required>
      </div>

      <button type="submit" name="submit" class="btn btn-primary">Register</button>



   </form>


   <!-- End Content -->


   <?php
   // Footer
   include "include/footer.php";
   ?>