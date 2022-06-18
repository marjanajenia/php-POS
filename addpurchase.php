<?php include 'includes/head.php' ?>

<?php include 'includes/navbar.php' ?>
<?php include 'includes/sidebar.php' ?>
<?php include 'function/datacon.php' ?>

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

  <form action="" method="POST">
    <div class="row m-4">
      <?php 
        if(isset($_POST["addProduct"])){
          $br_id=$_POST["br_id"];
          $com_id=$_POST["com_id"];
          $purDate=$_POST["pDate"];
          $invoiceNumber=$_POST["invoice"];
          $proBarcode=$_POST["barcode"];
          $proPrice=$_POST["pPrice"];
          $purQuantity=$_POST["quantity"];
          $totalPrice=$_POST["totalPrice"];
          $pid=$_POST["sPid"];
          $qnt=$_POST["pQnt"];
          $msg = addProduct($br_id,$com_id,$purDate,$invoiceNumber,$proBarcode,$proPrice,$purQuantity,$totalPrice);
          updateProductQnt($pid,$qnt);
          echo $msg;
        }
      ?>
      <div class="col-md-12">
        <div class="info p-2 border rounded">
          <input type="text" name="br_id" placeholder="Branch Id" readonly value="<?php echo $_SESSION['brid'] ?>">

          <select name="com_id" id="">
            <option  value="0">---select Compan name---</option>
            <?php
              $result= companyShowforPurchase();
              while($data=$result->fetch_assoc()){ ?>
                <option value="<?php echo $data["com_id"]; ?>"><?php echo $data["comName"]; ?></option>
              <?php }
             ?> 
          </select>
          <input type="date" name="pDate" value="<?php  if (isset($_POST["search"]) OR isset($_POST["addProduct"])){ echo $_POST['pDate'];} ?>">
          <input type="text" name="invoice" placeholder="Enter invoice Number" value="<?php  if (isset($_POST["search"]) OR isset($_POST["addProduct"])){ echo $_POST['invoice']; } ?>">
          
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="info p-2 border rounded">
          <input type="text" name="barcode" placeholder="enter your barcode" value="<?php  if (isset($_POST["search"])){ echo $_POST['barcode'];} ?>">
          <button name="search">Ok</button>

           <?php 
             if (isset($_POST["search"])){
              $barcode=$_POST['barcode'];
              $result=searchProductforPurchase($barcode);
              while($data=$result->fetch_assoc()){
              ?>
          <input type="text" name="pPrice" id="pPrice" placeholder="enter product price" value="<?php echo $data["proCostPrice"] ?>">

          <input type="text" name="pQnt" id="pQnt"  value="<?php echo $data["quantity"] ?>">          
          <input type="text" name="sPid" id="sPid"  value="<?php echo $data["pro_id"] ?>">            
             <?php 
            }
           }         
         ?>         
          <input type="text" name="quantity" id="quantity" value="0">
          <input type="button" id="add" value="+" onclick="adddd()">
          <input type="button" id="sub" value="-" onclick="subb()">
          <input type="text" name="totalPrice" id="totalPrice">
          <button name="addProduct">Add</button>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <table class="m-3" border="1">
          <tr>
            <th>SI</th>
            <th>Date</th>
            <th>Invoice</th>
            <th>Company Name</th>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Quantity</th>
            <th>Total Price</th>
          </tr>
          <?php 
             if(!isset($_POST['invoice'])){

             }
             else{
             $result=showPurchaseDetails($invoiceNumber,$purDate);
             $sl=1;
             $grandTotalQnt=0;
             $grandTotalPrice=0;
             if($result->num_rows>0){
             foreach($result as $data){$grandTotalQnt+=$data['purQuantity']; $grandTotalPrice+=$data['totalPrice']; ?>
              <tr>
                <td><?php echo $sl ?></td>
                <td><?php echo $data['purDate'] ?></td>
                <td><?php echo $data['invoiceNumber'] ?></td>
                <td><?php echo $data['invoiceNumber'] ?></td>
                <td><?php echo $data['invoiceNumber'] ?></td>
                <td><?php echo $data['prPrice'] ?></td>
                <td><?php echo $data['purQuantity'] ?></td>
                <td><?php echo $data['totalPrice'] ?></td>

              </tr>

            <?php $sl++; } ?>
            <tr>
              <td>
                <input type="text" value="<?php  echo $grandTotalQnt;?>">
              </td>
              <td>
                <input type="text" value="<?php  echo $grandTotalPrice;?>">
              </td>
              <td></td>
              <td>
                <input type="text" value="">
              </td>
              <td>
                <input type="text" value="">
              </td>
              <td>
                <input type="text" value="">
              </td>
            </tr>
            <?php }
            else{
              echo '<td>data not found</td>';
            }
          }
          ?>
        </table>
      </div>
    </div>
  </form>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <script>
    function adddd(){
      var qnt=parseInt(document.getElementById("quantity").value);      
      var pPrice=parseInt(document.getElementById("pPrice").value);
      var spqnt=parseInt(document.getElementById("pQnt").value);
      var totalqnt= qnt +1;
      var stotalqnt= spqnt+1;
      document.getElementById("quantity").value=totalqnt;
      var totalPrice= pPrice*totalqnt;
      document.getElementById("totalPrice").value= totalPrice;
      document.getElementById("pQnt").value= stotalqnt;
    }
    function subb(){
      var qnt=parseInt(document.getElementById("quantity").value);
      var pPrice=parseInt(document.getElementById("pPrice").value);
      var spqnt=parseInt(document.getElementById("pQnt").value);
      if(qnt==0){
        document.getElementById("quantity").value=0;
        document.getElementById("totalPrice").value=0;
      }
      else{
        var totalqnt= qnt -1;
        var stotalqnt= spqnt-1;
        document.getElementById("quantity").value=totalqnt;        
        var totalPrice= pPrice*totalqnt;
        document.getElementById("totalPrice").value= totalPrice;
        document.getElementById("pQnt").value= stotalqnt;
      }
      
    }
  </script>

  <?php include 'includes/footer.php' ?>