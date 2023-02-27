<?php session_start() ?>

<!DOCTYPE html>
<html>
  <head>
    <title>Title</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/StylesPages.css">
  </head>

  <body class="Menu1">
  
  <h1 class="title">Inscription</h1>  

  <?php
    include 'Includes/database.php'; 
    global $db;
  ?>
  
   <h1>Sign-in</h1> 
   <form method="post">
      <input class="Textinput" type="text" name="pseudo" id="pseudo" placeholder="login" ><br/>
      <input class="Textinput" type="text" name="password" id="password" placeholder="password" ><br/>
      <input class="Textinput" type="text" name="cpassword" id="cpassword" placeholder="confirm password" ><br/>
      <input class="Buttonconnection" type="submit" name="formsend" id="formsend" value = "Send">
      <input class="Buttonconnection" type="submit" name="formconnect" id="formconnect" value = "Go to connection">

   </form>

   <?php

      if(isset($_POST['formsend'])){
        extract($_POST);

        if(!empty($pseudo) &&!empty($password) && !empty($cpassword))
        {
          if($password == $cpassword)
          {
            // cryptage mot de passe
            $options = [
              'cost' => 12,
            ];

            $hashpass = password_hash($password, PASSWORD_BCRYPT,  $options);

            // verify si l'utilisatuer n'existe pas deja
            $c = $db->prepare("SELECT pseudo FROM users WHERE pseudo = :pseudo");
            $c->execute([
              'pseudo' => $pseudo
            ]);

            $result = $c->rowCount();

            if($result == 0){
              // ajoute a la base de donné les parametres
              $q = $db->prepare("INSERT INTO users(pseudo,password) VALUES(:pseudo,:password)");
              $q->execute([
                'pseudo' => $pseudo,
                'password'=> $hashpass
              ]);
              ?>
              <p class="Ok">
                Account created!, connect you with your account.
              </p>
              <?php

            } else {
              ?>
                <p class="error">
                  This account already exist!
                </p>
              <?php
            }
          } else {
            ?>
              <p class="error">
                Password confirmation incorrect!
              </p>
            <?php
          }
        } else {
          ?>
            <p class="error">
              Some information are not filled!
            </p>
          <?php
        }
      }
      if (isset($_POST['formconnect'])) {
        header("Location:Index.php");
        exit;
      }
    ?>

  </body>
  <footer>
    
  </footer>
</html>

