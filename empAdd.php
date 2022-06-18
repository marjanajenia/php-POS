<?php include 'includes/head.php' ?>
<?php include 'includes/navbar.php' ?>
<?php include 'includes/sidebar.php' ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">ADD EMPLOYEE</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- main content -->
    <style>
    .head{
      background: rgba(255, 100, 0, .7);
      overflow: hidden;
    }
  </style>
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <div class="head bg-info py-2 px-4 my-4 text-white">
        <h3 class="float-left">Add Employee</h3>
        <a href="index.php" class="btn btn-warning float-right"><i class="fa fa-eye"></i>User List</a>
      </div>
      <!-- data insert in database -->
       <?php 
        include 'function/datacon.php';
          if (isset($_POST["save"])){
            $brId = $_POST["brId"];
            $emDesignation=$_POST["emDesignation"];
            $emName=$_POST["emName"];
            $emAdd=$_POST["emAdd"];
            $emNid=$_POST["emNid"];
            $emPhone=$_POST["emPhone"];
            $emEmail=$_POST["emEmail"];
            $emJoiningDate=$_POST["emJoiningDate"];
            $emSalary=$_POST["emSalary"];
            $pass=$_POST["pass"];
            $status=$_POST["status"];
            if (empty($brId)) {
              echo '<div class="alert alert-danger" role="alert">Name is Required</div>';
            }
            elseif (empty($emDesignation)) {
              echo '<div class="alert alert-danger" role="alert">User Name is Required</div>';
            }
            elseif (empty($emName)) {
              echo '<div class="alert alert-danger" role="alert">Email is Required</div>';
            }
            elseif (empty($emAdd)) {
              echo '<div class="alert alert-danger" role="alert">Phone is Required</div>';
            }
            elseif (empty($emNid)) {
              echo '<div class="alert alert-danger" role="alert">Phone is Required</div>';
            }
            elseif (empty($emPhone)) {
              echo '<div class="alert alert-danger" role="alert">Phone is Required</div>';
            }
            elseif (empty($emEmail)) {
              echo '<div class="alert alert-danger" role="alert">Phone is Required</div>';
            }
            elseif (empty($emJoiningDate)) {
              echo '<div class="alert alert-danger" role="alert">Phone is Required</div>';
            }
            elseif (empty($emSalary)) {
              echo '<div class="alert alert-danger" role="alert">Phone is Required</div>';
            }
            elseif (empty($pass)) {
              echo '<div class="alert alert-danger" role="alert">Phone is Required</div>';
            }
            elseif ($status==0) {
              echo '<div class="alert alert-danger" role="alert">Status is Required</div>';
            }
            else{

              $msg=insertData($brId,$emDesignation,$emName,$emAdd,$emNid,$emPhone,$emEmail,$emJoiningDate,$emSalary,$pass,$status);
              echo $msg;

            }
          }
        ?> 
      <!-- student form  -->
      <form method="POST">
        <!-- branch id -->
          <div class="form-group">
              <label for="brId">branch Id</label>
              <input type="text" class="form-control" id="brId" placeholder="Student Name" name="brId" value="<?php  if (isset($_POST["save"])) {echo $brId;} ?>">
          </div>
            <!-- emp position -->
          <div class="form-group">
              <label for="emDesignation">employee position</label>
              <input type="text" class="form-control" id="emDesignation" placeholder="Student User Name" name="emDesignation" value="<?php  if (isset($_POST["save"])) {echo $emDesignation;}?>">
          </div>
            <!-- name -->
          <div class="form-group">
              <label for="emName">Name</label>
              <input type="text" class="form-control" id="emName" placeholder="Email Address" name="emName" value="<?php  if (isset($_POST["save"])) {echo $emName;}?>">
          </div>
          <!-- address -->
          <div class="form-group">
              <label for="emAdd">Address</label>
              <input type="text" class="form-control" id="emAdd" placeholder="Email Address" name="emAdd" value="<?php  if (isset($_POST["save"])) {echo $emAdd;}?>">
          </div>
          <!-- nid number -->
          <div class="form-group">
              <label for="emNid">Nid Number</label>
              <input type="text" class="form-control" id="emNid" placeholder="Email Address" name="emNid" value="<?php  if (isset($_POST["save"])) {echo $emNid;}?>">
          </div>
            <!-- phone -->
          <div class="form-group">
              <label for="emPhone">Phone</label>
              <input type="text" class="form-control" id="emPhone" placeholder="Email Address" name="emPhone" value="<?php  if (isset($_POST["save"])) {echo $emPhone;}?>">
          </div>
          <!-- email -->
          <div class="form-group">
              <label for="emEmail">Email</label>
              <input type="text" class="form-control" id="emEmail" placeholder="Email Address" name="emEmail" value="<?php  if (isset($_POST["save"])) {echo $emEmail;}?>">
          </div>
          <!-- joining date -->
          <div class="form-group">
              <label for="emJoiningDate">Joining Date</label>
              <input type="text" class="form-control" id="emJoiningDate" placeholder="Email Address" name="emJoiningDate" value="<?php  if (isset($_POST["save"])) {echo $emJoiningDate;}?>">
          </div>
          <!-- salary -->
          <div class="form-group">
              <label for="emSalary">Salary</label>
              <input type="text" class="form-control" id="emSalary" placeholder="Email Address" name="emSalary" value="<?php  if (isset($_POST["save"])) {echo $emSalary;}?>">
          </div>
          <!-- password -->
          <div class="form-group">
              <label for="pass">Password</label>
              <input type="pass" class="form-control" id="pass" placeholder="Email Address" name="pass" value="<?php  if (isset($_POST["save"])) {echo $pass;}?>">
          </div>
          <!-- status -->
          <div class="form-group">
              <label for="status">Status</label>
              <select name="status" class="form-control">
                <option value="0">-------Select Status-------</option>
                <option value="1">Active</option>
                <option value="2">Inactive</option>
              </select>     
          </div>
          <button type="submit" class="btn btn-primary" name="save">Submit</button>
      </form>
      </div>
  </div>

    

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <?php include 'includes/footer.php' ?>