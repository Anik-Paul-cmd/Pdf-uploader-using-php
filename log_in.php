<?php if(!isset($_SESSION)) { 
    session_start(); } ?> 
 <?php
      include_once 'link.php'; 
    include_once 'database.php';
    $con = new DB_con();
    if(isset($_POST['submit']))
    {   
        
        $email = test_input($_POST['email']);
        $password = test_input($_POST['password']);
        $selectresult = $con->log_in($email,$password);
		$adminresult= $con->admin($email,$password);
		$adminn=mysqli_fetch_array($adminresult);
        $result=mysqli_fetch_array($selectresult);
        if(mysqli_num_rows($selectresult)>0)
        {
             $_SESSION["username"]= $result[0];
            $_SESSION["email"]=$result[1];
            $_SESSION["user_id"]=$result[2];
			
            $_SESSION["loginstatus"]="true";
		    header("location:index.php");
        }else {?>
            <script>
            alert("user not found");
            </script>
            <?php
        }
		if(mysqli_num_rows($adminresult)>0){
			$_SESSION["username"]= $adminn[0];
            $_SESSION["email"]=$adminn[1];
     
			
            $_SESSION["loginstatus_admin"]="true";
			
			header("location:admin.php");
		}
        else {?>
            <script>
            alert("admin not found");
            </script>
            <?php
        }
    }
   
 
    if(isset($_POST['sign_up']))
    {
        $msg="";
        $name = test_input($_POST['name']);
        $email = test_input($_POST['email']);
        $password = test_input($_POST['password']);
        $cpassword =test_input ($_POST['c_password']);
        $department = test_input($_POST['department']);
        $selectresult = $con->serach_email($email);
		$adminresult=$con->serach_adminemail($email);
        
		if(mysqli_num_rows($adminresult)>0 )
        {
            ?>
            <script>
            alert("This email account is only for admin");
            </script>
            <?php
        }
		elseif(mysqli_num_rows($selectresult)>0 )
        {
             ?>
            <script>
            alert("email already exists");
            </script>
            <?php
        }
		
		
        elseif($password != $cpassword){
            echo "passwords doesn't match";
        }
        else{
            $res = $con->users_insert($name,$email,$password,$department);
            if($res)
            {
                ?>
                <script>
                alert('account created ');
                window.location='log_in.php'
                </script>
                <?php
        
            }
            else
            {
                ?>
                <script>
                alert('error inserting record...');
                window.location='log_in.php'
                </script>
                <?php
            } 
        }       
        
    }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
 ?>
 <h3 style="text-align:center;" class="text-success">Welcome To EWU BOOKS</h3>



<body>
    <div class="login_page">
        <div class="form">
            <form class="register_form" method="post">
                <input type="text" class="form-control" name="name" placeholder="Enter name" required>
                <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                <input type="password" class="form-control" name="password" placeholder="Enter password" required>
                 <input type="password" class="form-control" name="c_password" placeholder="Enter password" required>
					
					
					Department:
                <select name="department" class="form-control">
                    <option value="cse">CSE</option>
                    <option value="eee">EEE</option>
					 <option value="civil">CIVIL</option>
					  <option value="ece">ECE</option>
                    <option value="ohters">ohters</option>
                </select>

                 <button type="submit" class="btn btn-primary" name="sign_up">Submit</button>

                <p class="message">Already registered?<a href="#">Login</a></p>
            </form>

            <form class="login_form" method="post">
                 <input type="email" class="form-control" name="email" placeholder="Enter email" required>
               <input type="password" class="form-control" name="password" placeholder="Enter password" required>

                 <button type="submit" class="btn btn-primary" name="submit">Log In</button>
                <p class="message">Not Registered?<a href="#">Register</a></p>
            </form>

        </div>
        
    </div>

    <script src='https://code.jquery.com/jquery-3.4.1.min.js'></script>

    <script >
        $('.message a').click(function(){
        $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
        });
    </script>

</body>
</html>

