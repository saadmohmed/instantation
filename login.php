<?php include_once("includes/init.php");?>
<?php
if ($session->is_signed_in()) {
   
header("Location: index.php"); 
}
$the_message = '';
if (isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $found_user = User::verify_the_user($password , $username);

if ($found_user) {
      $session->login($found_user);
      header("Location: index.php"); 
}else{
    $the_message = "Your password or email is wrong";
}
}
  

?>
<div class="col-md-4 col-md-offset-3">

<h4 class="bg-danger"><?php echo $the_message; ?></h4>
    
<form id="login-id" action="" method="post">
    
<div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" name="username"  >

</div>

<div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" >
    
</div>


<div class="form-group">
<input type="submit" name="submit" value="Submit" class="btn btn-primary">

</div>


</form>


</div>