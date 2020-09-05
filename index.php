<?php if(!isset($_SESSION)) { 
    session_start(); 
    }
    if(!isset($_SESSION['loginstatus'])){
        $_SESSION['loginstatus']="false";
    }
    
    if($_SESSION['loginstatus']=="false"){
        header('Location:log_in.php');
    }
    
?>
<?php include_once 'navbar.php'; 
?>

<img src="img/background.png" style="height:600px; width:100%;"

		<link rel="stylesheet" href="style.css" />
 	</head>

<div class="middle">
<div class="container-fluid">
 
       <div class="container"  style="margin-left:30%;
                                      margin-top:650px;
                                      padding: 30px;
                                      font-size:40px;
  position: absolute;
  top: 0;
  left: auto;
  bottom: 0;
  right: auto;
  height: 50px;">
      <?php       $dept="cse";	  echo "<a href='cse.php?dept_name=$dept'  
   class='btn btn-success btn-lg'>Computer Science & Engineering</a>";
            
			
			
			$dept="eee";	  echo "<a href='eee.php?dept_name=$dept' style='margin:4px;'  class='btn btn-danger btn-lg'> Electrical and Electronics Engineering</a>";
 ?>
    

    </div>
</div>
</div>
</body>
</html>