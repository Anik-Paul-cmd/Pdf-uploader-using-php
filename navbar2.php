<?php if(!isset($_SESSION)) { 
    session_start(); } 
      
    ?> 
<!DOCTYPE html>
<html lang="en">
<head>
 <?php include_once 'link.php'; ?>
<title>EWU BOOKS</title>
</head>
<body>

  <nav class="navbar navbar-expand-sm  navbar-light" style="font-family: 'Montserrat', sans-serif; background:#6cf;">
        <ul class="navbar-nav">
        <li class="nav-item">
            
        </li>
        <a class="navbar-brand" href="admin.php">EWU BOOKS</a>
        <li class="nav-item">
            <a class="nav-link" href="admin.php">ADMIN PANEL</a>
        </li>
        
          <li class="nav-item">
            <a class="nav-link" href="commentadmin.php">CHAT </a>
          </li>
          
          
        </ul>
        <?php 
              include_once 'common/nav_username2.php';
          
             
        ?>
        
    </nav>

</body>
</html>

 