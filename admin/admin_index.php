<?php
   require_once('phpscripts/config.php');
   confirm_logged_in();



?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome to the admin panel login</title>
</head>
<body>
   <h2><?php echo $_SESSION['user_name'];?></h2>
   <a href="admin_createuser.php">Create User</a>
   <a href="phpscripts/caller.php?caller_id=logout">Sign Out</a>


</body>
</html>
