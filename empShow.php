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
    <style>
    .head{
      background: rgba(255, 100, 0, .7);
      overflow: hidden;
    }
  </style>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 "> 
      <div class="head bg-info py-2 px-4 text-white">
        <h3 class="float-left">User Data</h3>
        <a href="add.php" class="btn btn-warning float-right"><i class="fa fa-add"></i>User</a>
      </div>
      <table id="mydata" class="display">
        <thead>
          <tr>
            <th>Serial No</th>
            <th>Branch No</th>
            <th>Emp_Position</th>
            <th>Emp_Name</th>
            <th>Emp_Add</th>
            <th>Emp_Nid</th>
            <th>Emp_Phone</th>
            <th>Emp_Email</th>
            <th>Emp_JoiningDate</th>
            <th>Emp_Salary</th>
            <th>Emp_Pass</th>
            <th>Status</th>
            <th>Action</th>
            </tr>
          </thead>         
          <tbody>
          <?php 
            include 'function/datacon.php';
                    $users =  showtable();
            $sl=1;
          if ($users->num_rows>0) {
            while($data=$users->fetch_assoc()){ ?>
              <tr>

                <td><?php echo $sl;?></td>
                <td><?php echo $data["br_id"];?></td>
                <td><?php echo $data["emDesignation"];?></td>
                <td><?php echo $data["emName"];?></td>
                <td><?php echo $data["emAdd"];?></td>
                <td><?php echo $data["emNid"];?></td>
                <td><?php echo $data["emPhone"];?></td>
                <td><?php echo $data["emEmail"];?></td>
                <td><?php echo $data["emJoiningDate"];?></td>
                <td><?php echo $data["emSalary"];?></td>
                <td><?php echo $data["pass"];?></td>
                <td>
                <?php 
                  if ($data["status"]==1) {
                    echo '<span class="badge badge-info">Active</span>';
                  }
                  else{
                    echo '<span class="badge badge-warning">Inactive</span>';
                  }
                ?>
                </td>
                <td>
                  <a href="empEdit.php?userId=<?php echo $data["em_id"] ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>

                  <button data-toggle="modal" data-target="#d<?php echo $data["id"] ?>" class="btn btn-danger btn-sm" ><i class="fa fa-trash-can"></i></button>
                </td>
              </tr>
                <?php 
                $sl++;?>
<div class="modal fade" id="d<?php echo $data["id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure want to delte this User?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <a href="index.php?id=<?php echo $data['id']?>" type="button" class="btn btn-danger" name="delete">Confirm</a>
      </div>
    </div>
  </div>
</div>
                <?php               
              }
            }
            else{
              echo '<tr><td>Data Not Found</td></tr>';
            } 
            ?> 
          </tbody>
      </table>
    </div>
  </div>
</div>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <?php include 'includes/footer.php' ?>