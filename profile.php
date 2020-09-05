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
<div align="center">
<table border='2'>
		<tr> 
		
		<th> Name</th>
		<th> Email  </th>
		<th>  Department</th>
		<th>  Delete</th>
		
		</tr>
<?php

$conn=mysqli_connect("localhost","root","");
mysqli_select_db($conn,"ewu_books");

		if(isset($_GET['del'])){
	
	$del_id=$_GET['del'];
	if(mysqli_query($conn,"delete from users  where user_id='$del_id'")){
		echo"<h2 align='center'>User of id $del_id Deleted Successfuly</h2>";
	}
}

		$res=mysqli_query($conn,"select * from users ");
		while($row=mysqli_fetch_array($res)){
			$showid=$row[0];
			echo "<tr>";
		echo "<td>"; echo $row["name"]; echo"</td>";
		echo "<td>"; echo $row["email"]; echo"</td>";
		echo "<td>"; echo $row["department"]; echo"</td>";
		echo "<td>"; echo "<a href='profile.php?del=$showid'>Delete</a>";echo"</td>";
			echo "</tr>";
		}




?>