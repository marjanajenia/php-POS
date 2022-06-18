<?php
$con=new mysqli("localhost","root","","admin");

function userLogin($email,$pass){
	global $con;
	$command="SELECT *FROM tbl_employee WHERE (emEmail='$email' OR emPhone='$email') AND pass='$pass' AND status='1' ";
	$result=$con->query($command);
	if ($result->num_rows>0) {
		while($data=$result->fetch_assoc()){
			$_SESSION['name']=$data["emName"];
			// $_SESSION['email']=$data["emEmail"];
			$_SESSION['brid']=$data["br_id"];
			header('location: dashboard.php');
		}
	}
	else{

		$_SESSION['title']="Error Message";
        $_SESSION['text']="emial or pass not found";
        $_SESSION['icon']="error";
	}

}

function insertData($brId,$emDesignation,$emName,$emAdd,$emNid,$emPhone,$emEmail,$emJoiningDate,$emSalary,$pass,$status){
	global $con;
	$command="INSERT INTO tbl_employee(br_id,emDesignation,emName,emAdd,emNid,emPhone,emEmail,emJoiningDate,emSalary,pass,status)VALUES('$brId','$emDesignation','$emName','$emAdd','$emNid','$emPhone','$emEmail','$emJoiningDate','$emSalary','$pass','$status')";
	$result=$con->query($command);
	if ($result) {
		return '<div class="alert alert-success" role="alert">
  		Data Successfully Saved</div>';
	}
	else{
		return '<div class="alert alert-danger" role="alert">
  		Data not saved'.$con->error.'</div>';
	}
}
function showtable(){
	global $con;
	$command ="SELECT *FROM tbl_employee";
	$result =$con->query($command);
	return $result;
}
function Edit($id){
	global $con;
	$command ="SELECT *FROM tbl_employee WHERE em_id='$id'";
	$result =$con->query($command);
	return $result;
}
function updatedata($brId,$emDesignation,$emName,$emAdd,$emNid,$emPhone,$emEmail,$emJoiningDate,$emSalary,$pass,$status,$id){
	global $con;
	$command="UPDATE tbl_employee SET br_id='$brId',emDesignation='$emDesignation',emName='$emName',emAdd='$emAdd',emNid='$emNid',emPhone='$emPhone',emEmail='$emEmail',emJoiningDate='$emJoiningDate',emSalary='$emSalary',pass='$pass',status='$status' WHERE em_id='$id'";
	$result=$con->query($command);
	if ($result) {
		header("location: empShow.php");
	}
	else{
		return '<div class="alert alert-danger" role="alert">
  		Data not Updated'.$con->error.'</div>';
	}
}
function companyShowforPurchase(){
	global $con;
	$br_id=$_SESSION['brid'];
	$command="SELECT *FROM tbl_company WHERE br_id='$br_id' AND status='1'";
	$result=$con->query($command);
	if ($result->num_rows>0) {
	 	return $result;
	 }	
}
function searchProductforPurchase($barcode){
	global $con;
	$br_id=$_SESSION['brid'];
	$command="SELECT *FROM tbl_product WHERE proBarcode='$barcode' AND status='1'";
	$result=$con->query($command);
	if ($result->num_rows>0) {
	 	return $result;
	 }	
}
function addProduct($br_id,$com_id,$purDate,$invoiceNumber,$proBarcode,$proPrice,$purQuantity,$totalPrice){
	global $con;
	$command="INSERT INTO tbl_purchase_details(br_id,com_id,purDate,invoiceNumber,proBarcode,prPrice,purQuantity,totalPrice)VALUES('$br_id','$com_id','$purDate','$invoiceNumber','$proBarcode','$proPrice','$purQuantity','$totalPrice')";
	$result=$con->query($command);
	if ($result) {
	 	return "product added Successfully";
	 }
	 else{
	 	return "Error".$con->error;
	 }	

}
function showPurchaseDetails($invoice,$date){
	global $con;
	$br_id=$_SESSION['brid'];
	$command="SELECT *FROM tbl_purchase_details WHERE invoiceNumber='$invoice' AND purdate='$date' AND br_id='$br_id'";
	$result=$con->query($command);	
	 	return $result;	
}
function updateProductQnt($id,$qnt){
	global $con;
	$br_id=$_SESSION['brid'];
	$command="UPDATE tbl_product SET quantity='$qnt' WHERE pro_id='$id'";
	$result=$con->query($command);	
}