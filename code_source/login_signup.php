<?php
if(!isset($_SESSION))
{
session_start();

}
require('config.php');
if (isset($_POST['reg_user'])){
if (isset($_REQUEST['Username'], $_REQUEST['Email'], $_REQUEST['Password'],  $_REQUEST['Phone']))
{
    if (testMail( $_REQUEST['Email'])===true   )
  {
      $username = $_REQUEST['Username'] ;
    $email = $_REQUEST['Email'] ;
    $password = $_REQUEST['Password'];
    $phone = stripslashes($_REQUEST['Phone']);
    
    $sql = "INSERT INTO User (Username,Email,Password,phone) 
  			  VALUES('$username', '$email', '$password','$phone')";
    // use exec() because no results are returned
    $conn->exec($sql);
  }
  else
 {
    echo "Mot de passe ou Email  ou phone invalide" ;
}

    
}
}

elseif(isset($_POST['log_in'])){
if (isset($_REQUEST['name'],$_REQUEST['pass']))
{
    
    //Retrieve the field values from our login form.
    $username = $_POST['name'];
    $password =$_POST['pass'];
    
  
   
    //Retrieve the user account information for the given username.
    $sql = "SELECT  ID,Username, Password FROM User WHERE Username = :username and Password =:password";
    $stmt = $conn->prepare($sql);
    
    //Bind value.
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':password', $password);
    
    //Execute.
    $stmt->execute();
    
    //Fetch row.
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    //If $row is FALSE.
    if($user === false){
        //Could not find a user with that username!
        //PS: You might want to handle this error in a more user-friendly manner!
        echo('Incorrect username / password combination!');
    } else{
        //User account found. Check to see if the given password matches the
        //password hash that we stored in our users table.
        
        //Compare the passwords.
      //  $validPassword = password_verify($passwordAttempt, $user['Password']);
        
        //If $validPassword is TRUE, the login has been successful.
      // if($validPassword){
            
            //Provide the user with a login session.
           
            $_SESSION['username'] = $username;
          //print_r($_SESSION);
            $_SESSION['ID'] = $user['ID'];
          // print_r($_SESSION['ID']);
            //  $_SESSION['logged_in'] = time();
            
            //Redirect to our protected page, which we called home.php
            header('Location: Commmandes.php');
            exit;
            
        // } else{
        //     //$validPassword was FALSE. Passwords do not match.
        //     die('Incorrect username / password combination!');
        // }
    }
    
}
session_destroy();
}


function testmot($password){
    
        //  $password = $_POST['password'];
   
      if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $password) && strlen($password) >= 8) {
          return true ;
      }
      
      else {
          return false ;
      }
          
      
    }
/// verifier phone
function testphone($phone){
    
        
      if (preg_match('[0-9]', $phone) && strlen($phone)==10) {
         
          return true ;
      }
      
      else {
          return false ;
      }
          
      
    }

    

/// verifier l'email

    function testMail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true ;

          }
        else 
        {
            return false ;
        }
    } 
    

?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'><link rel="stylesheet" href="css/style.css">

</head>
<body>
<!--<div class="w3-top">-->
<!-- <div class=" w3-theme-d2 w3-left-align">-->
<!--  <a ><img src="image\17.jpg" style="width: 200px; height: 100px;"></a>-->
  
<!--  </div>-->
<!--  </div>-->
<div class="pen-title">
  <span>
    
     <a  href="index.php" class="w3-bar-item  w3-hide-small w3-hover-white"> ><img src="image\17.jpg" style="width: 200px; height: 100px;"></a>
  </span>
</div>
 <!--Form Module-->
<div class="module form-module">
  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
    <div class="tooltip">CLICK TO REGISTER</div>
  </div>
   
  <div class="form">
    <h2>Login to your account</h2>
 <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "name" class = "box"  required/><br /><br />
                  <label>Password  :</label><input type = "password" name = "pass" class = "box" required/><br/><br />
                  <!--<input name="log_in" type = "submit" value = " Submit "/><br />-->
                  <button type="submit" class="btn" name="log_in">Login</button>
               </form>
  </div>
  
  <div class="form">
      
    <h2>Create an account</h2>
  
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  	
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="Username" value="" required>
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="Email" value="" required>
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="Password" required>
  	</div>
  	<div class="input-group">
  	  <label>Phone</label>
  	  <input type="text" name="Phone" required>
  	</div>
  	
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
  </div>
  <div class="cta"></div>
</div>
 
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://codepen.io/andytran/pen/vLmRVp.js'></script><script  src="JS/script.js"></script>

</body>
</html>




