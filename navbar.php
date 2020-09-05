<?php if(!isset($_SESSION)) { 
    session_start(); } 
      
    ?> 
<!DOCTYPE html>
<html lang="en">
<head>
 <?php include_once 'link.php'; ?>
<!--    	<link rel="stylesheet" href="style.css" />-->
<title>EWU BOOKS</title>
</head>
<body>

  <nav class="navbar navbar-expand-sm  navbar-light" style="font-family: 'Montserrat', sans-serif; background:#6cf;">
        <ul class="navbar-nav">
        <li class="nav-item">
            
        </li>
        <a class="navbar-brand" href="index.php">EWU BOOKS</a>
        <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
        </li>
        
          <li class="nav-item">
            <a class="nav-link" href="comment.php">CHAT </a>
          </li>
          
          
        </ul>
        <?php 
              include_once 'common/nav_username.php';
          
             
        ?>
        
    </nav>


 