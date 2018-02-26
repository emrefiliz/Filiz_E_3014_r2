<?php
   require_once('phpscripts/config.php');
   // confirm_logged_in();
   if(isset($_POST['submit'])){
     $fname = trim($_POST['fname']);
     $username = trim($_POST['username']);     
     $email = trim($_POST['email']);
     $lvllist = $_POST['lvllist'];
       if(empty($lvllist)){
         $message = "Please select the user level.";
       }else {
         $password = generatePassword();
         $crypted_password = encrypt("YOUR_PASSWORD", $password);
         $result = createUser($fname, $username, $email,  $password, $lvllist);
         // decrypt
      //echo decrypt($crypted_password, $password);
      if($result = "User creation successful.") {
        $to = $email;        
        $from = "admin@test.com";
        $url = "http://localhost/admin/admin_login.php";
        $headers  = "From: " . $from;
        $subject  = "Welcome, " . $fname;
        $message  = $fname.",\n\nYour account details are as below;\n\nUsername: ".$username."\nPassword: ".$password."\n\nPlease visit ".$url." to login.";        
        ///mail($to, $subject, $message , $headers);
        }       
        $message = $result;
       }  
       
  }
 

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome to the admin panel login</title>
</head>
<body>
  <h2>Create User</h2>
  <?php if(!empty($message)){ echo $message;} ?>
  <form action="admin_createuser.php" method="post">
    <label>First Name:</label>
    <input type="text" name="fname" value="">
    <label>Username:</label>
    <input type="text" name="username" value="">
    <label>Email:</label>
    <input type="text" name="email" value="">
    <select name="lvllist">
      <option value="">select the  user level</option>
      <option value="2">Web Admin<option>
      <option value="1">Web Master</option>
    </select>
    <input type="submit" name="submit" value="Create User">
    </form>

</body>
</html>
