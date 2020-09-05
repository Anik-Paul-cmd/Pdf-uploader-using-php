<?php    
if(!isset($_SESSION)) { 
    session_start(); } 
include_once 'navbar.php'; 
?>


<form name="form1" method="post" action="comment.php" onSubmit="return validation()">
<table width="500" border="0" cellspacing="3" cellpadding="3" style="margin:auto;">
  <h1 style="text-align:40px; margin-left: 400px; color:blue;"> Something To say:</h1>
    <td align="right" id="one"></td>
    <td><textarea name="message" id="tmessageid"></textarea></td>
  </tr>
  <tr>
  <td align="right" id="one"></td>
  <td><input type="submit" name="submit " class='btn btn-danger btn-md'value="submit"></td>
  </tr>
</table>
</form>



<?php
$conn=mysqli_connect("localhost","root","");
mysqli_select_db($conn,"ewu_books");
if(isset($_POST["submit"]))
{	
	
	$_POST['userName']=$_SESSION["username"];
	$name=$_POST['userName'];

	
mysqli_query($conn,"insert into commenttable values ('$name','$_POST[message]')");

 }



$select= mysqli_query($conn,"select * from commenttable");
while($row=mysqli_fetch_array($select))
{
 echo "<div id='sty' >";
 echo "<img src='img/icon.png'"."' width='50px' 
                                                height='50px' 
                                                align='left' />";

											
echo "<div >" . $row["userName"]."</div>";
 echo "<div >"."=> ". $row["message"]."</div>";	


 echo "</div><br />";
}
?>
