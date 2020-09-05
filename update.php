<?php if(!isset($_SESSION)) { 
    session_start(); 
    }
    if(!isset($_SESSION['loginstatus_admin'])){
        $_SESSION['loginstatus_admin']="false";
    }
    
    if($_SESSION['loginstatus_admin']=="false"){
        header('Location:log_in.php');
    }
    
?>
<?php include_once 'navbar3.php'; 
?>

<?php		
	
	$conn=mysqli_connect("localhost","root","");
mysqli_select_db($conn,"ewu_books");
if(isset($_GET['edit'])){
	
	$edit_id=$_GET['edit'];
	$res=mysqli_query($conn,"select * from pdf  where pdf_id='$edit_id'");
	
	while($row=mysqli_fetch_array($res))
	{
		$id=$row[0];
		$pdfname=$row[1];
		$deptname=$row[3];
		$pdfgroup=$row[4];
	}
}

?>
<?php 
$conn=mysqli_connect("localhost","root","");
mysqli_select_db($conn,"ewu_books");
if(isset($_POST['update'])){
	$uid=$_GET['edit_form'];
		$updfname=$_POST['updfname'];
		$udeptname=$_POST['udeptname'];
		$updfgroup=$_POST['updfgroup'];
		
	$i=date('d_m_y_H_i_s');
	$tmp_name = $_FILES['myfile']['name'];
	$name="pdf/".$i.$_FILES['myfile']['name'];
	$tmp_name=$_FILES['myfile']['tmp_name'];
	
	move_uploaded_file($tmp_name,$name);
   
		$res=mysqli_query($conn,"update pdf set  pdf_name='$updfname' , pdf='$name' ,dept_name='$udeptname', pdf_group='$updfgroup' where pdf_id='$uid'");
			
			
		if($res){
			header('location:admin.php');
		}
}
?>

<html lang="en">
  <head>
   <link rel="stylesheet" href="style.css">
    <title>Files Upload and Download</title>
  </head>
  <body>
 
    <div class="container">
      <div class="row">
        <form action="update.php?edit_form=<?php echo $id ?>" method="post" enctype="multipart/form-data" >
          <h3>Upload File</h3>
		  
		  <input type="name" class="form-control" name="updfname" value="<?php echo $pdfname ?>"  placeholder="Enter BOOK Name" required> </br>
          <input type="name" class="form-control" name="udeptname" value="<?php echo $deptname ?>" placeholder="Enter Your Department" required> </br>
		<input type="name" class="form-control" name="updfgroup" value="<?php echo $pdfgroup ?>"placeholder="Enter Category" required></br>
		
             
		  
          <input type="file" name="myfile"> <br>
          <button type="submit" name="update">Update</button>

        </form>
      </div>
    </div>
	
  </body>
</html>