<?php    
if(!isset($_SESSION)) { 
    session_start(); } 
include_once 'navbar.php'; 
?>


<?php
$id=$_GET['dept_name'];
$conn=mysqli_connect("localhost","root","","ewu_books");
$res=mysqli_query($conn,"select * from pdf  where dept_name='$id' ");
$stmt=mysqli_query($conn,"select * from pdf  ORDER BY pdf_group");
$current_cat = null;
echo "<table >";

while ($row=mysqli_fetch_array($res))
	
{ if ($row["pdf_group"] != $current_cat) {
    $current_cat = $row["pdf_group"];
	echo " <tr>";
	echo "<tr >"; echo '<li >' ."{$current_cat}\n". '</li>'; 
   
  }

	
echo " <tr>";

 echo "<tr>"; echo  $row["pdf_name"] ; 

echo "</td>";?> 
<a href="<?php echo $row['pdf'] ; ?> "> Download </a> <?php echo "</td>";
 echo "</br>";
echo "</td>";


}

echo "</table>";   
 ?>

 