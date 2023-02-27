<?php session_start();
  session_unset();
  session_destroy();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Title</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/StylesPages.css">
  </head>

  <body class="Menu1">
  
    <h1 class="title">Bienvenue sur Notre site</h1> 

    
    <?php
    
      include 'Includes/database.php'; 
      global $db;
      
    ?>
      <p class="Textlogin1">
        Enter your login and passsword :
      </p>

      <form class="connection" method="post">
        <input class="Textinput" type="text" name="lpseudo" id="lpseudo" placeholder="login" size="25" ><br/>
        <input class="Textinput" type="text" name="lpassword" id="lpassword" placeholder="password" size="25" ><br/>
        <input class="Buttonconnection" type="submit" name="formlogin" id="formlogin" value = "Connect">
        <input class="Buttonconnection" type="submit" name="formsignin" id="formsignin" value = "Sign-in">
     </form>
     
     <?php include 'Includes/Login.php';?>

  </body>
  
</html>

