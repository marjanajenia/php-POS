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
            <h1 class="m-0">Dashboard v2</h1>
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
    <section class="content">
      <div class="container-fluid">
        <!-- form -->
        <?php 
          include 'function/datacon.php';
          if (isset($_POST["save"])) {
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
              $id=$_GET["userId"];
              $msg=updatedata($brId,$emDesignation,$emName,$emAdd,$emNid,$emPhone,$emEmail,$emJoiningDate,$emSalary,$pass,$status,$id);
              echo $msg;
            }
          }          
          if (isset($_GET["userId"])) {
              $id=$_GET["userId"];
              $user=Edit($id);
              while($data=$user->fetch_assoc()){?>
                <div class="card card-default">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="brId">branch Id</label>
                            <input type="text" class="form-control" id="brId" placeholder="branch number" name="brId" value="<?php echo $data["br_id"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="emDesignation">employee position</label>
                            <input type="text" class="form-control" id="emDesignation" placeholder="branch number" name="emDesignation" value="<?php echo $data["emDesignation"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="emName">Name</label>
                            <input type="text" class="form-control" id="emName" placeholder="branch number" name="emName" value="<?php echo $data["emName"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="emAdd">Address</label>
                            <input type="text" class="form-control" id="emAdd" placeholder="branch number" name="emAdd" value="<?php echo $data["emAdd"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="emNid">Nid Number</label>
                            <input type="text" class="form-control" id="emNid" placeholder="branch number" name="emNid" value="<?php echo $data["emNid"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="emPhone">Phone</label>
                            <input type="text" class="form-control" id="emPhone" placeholder="branch number" name="emPhone" value="<?php echo $data["emPhone"] ?>">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="emEmail">Email</label>
                            <input type="text" class="form-control" id="emEmail" placeholder="branch number" name="emEmail" value="<?php echo $data["emEmail"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="emJoiningDate">Joining Date</label>
                            <input type="text" class="form-control" id="emJoiningDate" placeholder="branch number" name="emJoiningDate" value="<?php echo $data["emJoiningDate"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="emSalary">Salary</label>
                            <input type="text" class="form-control" id="emSalary" placeholder="branch number" name="emSalary" value="<?php echo $data["emSalary"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="pass">Password</label>
                            <input type="text" class="form-control" id="pass" placeholder="branch number" name="pass" value="<?php echo $data["pass"] ?>">
                          </div>
                          <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control">
                              <option value="<?php echo $data["status"] ?>"><?php if ($data["status"]==1){echo'Active';}else{echo 'Inactive';} {
                              } ?></option>
                              <option value="1">Active</option>
                              <option value="2">Inactive</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary" name="save">Submit</button>
                    </div>
                </div>
      <?php 
              }
          }
          else{
            header('location: empShow.php');
          }
      ?>
      </div>
    </section>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <?php include 'includes/footer.php' ?>