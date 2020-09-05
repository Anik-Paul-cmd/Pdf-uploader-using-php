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
<?php include_once 'navbar2.php'; 
?>

<?php
// connect to the database
$conn=mysqli_connect("localhost","root","");
mysqli_select_db($conn,"ewu_books");
	
// Uploads files
if (isset($_POST['click']))
	{ 
$pdfname=$_POST['pdfname'];
	$deptname=$_POST['deptname'];
	$pdfgroup=$_POST['pdfgroup'];
	

	$i=date('d_m_y_H_i_s');
	$tmp_name = $_FILES['myfile']['name'];
	$name="pdf/".$i.$_FILES['myfile']['name'];
	$tmp_name=$_FILES['myfile']['tmp_name'];
	
	$tr=move_uploaded_file($tmp_name,$name);
   
	
	$res=mysqli_query($conn,"insert into pdf (pdf_name,pdf,dept_name,pdf_group ) values ('$pdfname','$name','$deptname','$pdfgroup')");
	if($res){
		echo "<h2> ADD Succesfully </h2>"
		?>
            <script>
            alert("File Uploaded");
            </script>
            <?php
		//header("location:admin.php");
	}else{
	 ?>
            <script>
            alert("File not Uploaded ");
            </script>
            <?php
		}
		
	
   }
	
/*if (isset($_POST['delete']))
	
{
	$pdfname=$_POST['pdfname'];
	$deptname=$_POST['deptname'];
	$pdfgroup=$_POST['pdfgroup'];
	$res=mysqli_query($conn,"delete from pdf  where pdf_name='$pdfname'");
		if($res){
		
		?>
            <script>
            alert("File Delete Successfully");
            </script>
            <?php
		//header("location:admin.php");
	}else{
	 ?>
            <script>
            alert("Not Delete ");
            </script>
            <?php
		}
}
   */
/*if (isset($_POST['update']))
	
{	$pdfid=$_['pdfid'];
	$pdfname=$_POST['pdfname'];
	$deptname=$_POST['deptname'];
	$pdfgroup=$_POST['pdfgroup'];
	
	
	$res=mysqli_query($conn,"update pdf set  dept_name='$deptname' and pdf_group='$pdfgroup' and where pdf_id='$pdfid'");
		if($res){
		
		?>
            <script>
            alert("File Update Successfully");
            </script>
            <?php
		//header("location:admin.php");
	}else{
	 ?>
            <script>
            alert("Not Update ");
            </script>
            <?php
		}
}*/
?>
<div align="center">
<table border='2' width="600">
		<tr> 
		<th>ID</th>
		<th>Book Name</th>
		<th> Department  </th>
		<th>  Category</th>
		<th> Edit</th>
		<th>  Delete</th>
		</tr>
<?php		
	
	$conn=mysqli_connect("localhost","root","");
mysqli_select_db($conn,"ewu_books");
if(isset($_GET['del'])){
	
	$del_id=$_GET['del'];
	if(mysqli_query($conn,"delete from pdf  where pdf_id='$del_id'")){
		echo"<h2 align='center'>User of id $del_id Deleted Successfuly</h2>";
	}
}



	$res=mysqli_query($conn,"select * from pdf ");
		
		while($row=mysqli_fetch_array($res)){
		$showid=$row[0];
		echo "<tr>";
		echo "<td>"; echo "$showid"; echo"</td>";
		echo "<td>"; echo $row["pdf_name"]; echo"</td>";
		echo "<td>"; echo $row["dept_name"]; echo"</td>";
		echo "<td>"; echo $row["pdf_group"]; echo"</td>";
		echo "<td>"; echo "<a href='update.php?edit=$showid'>Update</a>";echo"</td>";
		echo "<td>"; echo "<a href='admin.php?del=$showid'>Delete</a>";echo"</td>";
		echo "</tr>";
	}

/*if (isset($_POST['show']))
	
{
	$pdfname=$_POST['pdfname'];
	$deptname=$_POST['deptname'];
	$pdfgroup=$_POST['pdfgroup'];
	$res=mysqli_query($conn,"select * from pdf where pdf_name='$pdfname'");
		echo "<table border='1'>";
		echo "<tr>";
		echo "<th>"; echo  "Book Name"; echo"</th>";
		echo "<th>"; echo  "Department Name"; echo"</th>";
		echo "<th>"; echo  "Category"; echo"</th>";
		echo "</tr>";
	if($row=mysqli_fetch_array($res)){
	
		echo "<tr>";
		echo "<td>"; echo $row["pdf_name"]; echo"</td>";
		echo "<td>"; echo $row["dept_name"]; echo"</td>";
		echo "<td>"; echo $row["pdf_group"]; echo"</td>";
		echo "</tr>";
	}else{
	 ?>
            <script>
            alert("Not SHOW");
            </script>
            <?php
		
}
}*/


?>
<html lang="en">
  <head>
    <link rel="stylesheet" href="style.css">
    <title>Files Upload and Download</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <form action="admin.php" method="post" enctype="multipart/form-data" >
          <h3>Upload File</h3>
		  
		  <input type="name" class="form-control" name="pdfname" placeholder="Enter BOOK Name" required>
          <input type="name" class="form-control" name="deptname" placeholder="Enter Your Department" required>
		<input type="name" class="form-control" name="pdfgroup" placeholder="Enter Category" required>
		
             
		  
          <input type="file" name="myfile"> <br>
          <button type="submit" name="click">upload</button>
		  
        </form>
      </div>
    </div>
  </body>
</html>