<?php session_start()
?>

<?php
	
	if(isset($_POST['formlogin']))
	{
		extract($_POST);
		if(!empty($lpseudo) &&!empty($lpassword))
        {
			$q = $db->prepare("SELECT * FROM users WHERE pseudo = :pseudo");
			$q->execute(['pseudo' => $lpseudo]);

			global $resultlogin;

			$resultlogin = $q->fetch();
			if($resultlogin == true){
				// le compte exist
				$hashpassword = $resultlogin['password'];
				if(password_verify($lpassword, $hashpassword)){
					echo "the password is correct, connection!";
					$_SESSION['pseudo'] = $resultlogin['pseudo'];
					$_SESSION['date'] = $resultlogin['date'];
					header("Location:Menunavigation.php");
					exit;
				} else {
					?>
		        	<p class="error">
		        		Password incorrect!
		        	</p>
		        	<?php
				}
			} else {
				?>
	        	<p class="error">
	        		This account doesn't exist, please sign in!
	        	</p>
	        	<?php
			}
        } else {
        	?>
        	<p class="error">
        		Some information are ot filled!
        	</p>
        	<?php
        }
	}
	if(isset($_POST['formsignin']))
	{
		header("Location:Signin.php");
		exit;
	}
?>