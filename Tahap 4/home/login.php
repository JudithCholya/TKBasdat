<?php
 require_once "database.php";
 $db_handle = connectDB();   

 $resp= "";
 $resp2= "";
 $name="";
 $passwordErr="";
 $emailErr="";
 
 if(isset($_POST['username'])){
 
  if(checkName($_POST['username']) && checkPassword($_POST['password'])) {
   session_start();
   $_SESSION["userlogin"] = $_POST["username"];
   $db_handle = connectDB();
   
   $name = $_POST['username'];
   
   $pgsql = "SELECT role FROM sisidang.user WHERE username='$name'";
   $result = pg_exec($db_handle, $pgsql);
   
   $role = "";
   if ($result) {   
    for ($row = 0; $row < pg_numrows($result); $row++) {     
     $data = "<li><a> ";
     $values = pg_fetch_row($result, $row);    
     for ($col = 0; $col < count($values); $col++) {   $role .=$values[$col];        
     }        
    }    
   } 
   if($role=='ADM'){
    header('Location: fitur2-admin.html'); 
   } else if ($role=='MHS'){
    header('Location: fitur2-mahasiswa.html');
   } else {
    header('Location: fitur2-dosen.html');
   }

    } else{
   if(!checkName($_POST['username']) && !checkPassword($_POST['password'])){
    $resp = "akun tidak ditemukan";
   } else if (!checkName($_POST['username'])) {
    $resp = "username tidak valid";
   } else if (!checkPassword($_POST['password'])){
    $resp = "password tidak valid";
   } 
  } 
 }
 
 function checkName($username){ 
  $db_handle = connectDB();
  
  $pgsql = "SELECT username FROM sisidang.user WHERE username='$username'";
  $result = pg_exec($db_handle, $pgsql);
  
  if(pg_numrows($result) > 0){
   return true;
  }
  return false;
 }
 
 function checkPassword($password){ 
  $db_handle = connectDB();
  $pgsql = "SELECT password FROM sisidang.user WHERE password='$password'";
  $result = pg_exec($db_handle, $pgsql);
  
  if(pg_numrows($result) > 0){
   return true;
  }
  return false;
 }
     
   pg_close($db_handle);  

?>


<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>SI Sidang</title>
  
  
  
      <link rel="stylesheet" href="login.css">

  
</head>

<body>
  <h1>Welcome to SI Sidang</h1>

<!-- Login Container -->
<section class="login">
    <form action="login.php" method="POST">
      
        <!-- The Username Field -->
        <label for="username">Username
        <input type="text" name="username" id="username" />
      </label>
        
        <!-- The Password Field -->
        <label for="password">Password
        <input type="password" name="password" id="password" />
        </label>
        
        <!-- The Remember Me Checkbox -->
        <input type="checkbox" name="remember" id="remember" />
        <label class="check" for="remember"><span></span>Remember Me</label>
        
        <!-- Clearn both sides -->
        <div class="clear"></div>
        <br>
        <input id="submit-input" type="submit" value="Submit" />
        
        <!-- Recover Button --><!-- 
        <input type="button" value="Login" action = "home.html"/> -->
                   <!-- <button onclick="home.html='/page2'">Continue</button>
 -->        
        <!-- The Login Button -->
            </form>
            <?php echo $resp; ?>
    </section>
  
  
</body>
</html>
