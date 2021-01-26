<!-- ΕΠΙΒΕΒΑΙΩΣΗ ΣΤΟΙΧΕΙΩΝ LOGIN -->

<html>
    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1253">
		<title>Είσοδος Χρήστη</title>
		<link rel="stylesheet" type="text/css" href="auction_style.css">
	</head>
    <body>
		<?php 
			session_start();
			include "header.php"; 
			include "config.php";
			echo 	"<div class='section_2'>
					<div class='section_2L'>
					</div>
					<div class='section_2R'>";
			if(isset($_POST['button_login']))
			{
				$username = $_POST['username'];
				$password = $_POST['password']; 
				if ($username != "" && $password != "")
				{
					$statement = "SELECT u_status FROM users WHERE username=? and password=?";
					$stmt = $link->prepare($statement);
					$stmt->bind_param("ss", $username,$password);
					$stmt->execute();
					$result = $stmt->get_result();
					$row = $result->fetch_assoc();
 
					if (mysqli_num_rows($result) > 0) 
					{
						$status = $row['u_status']; 
						
						if ($status==4) 
						{
							$_SESSION["username"] = $username; 
							$_SESSION["loggedin"] = true; 
							header('Location: index.php'); 
							exit;
						}
						else 
						{
							echo 	"<div class='wrapper'>
									<fieldset>
									<legend> Ενημέρωση </legend>
									<br> Ο λογαριασμός σας δεν είναι ενεργός <br>
									</fieldset>
									</div>";
						}
					}
					else 
					{
						$statement = "SELECT IsProvider FROM ProviderOrModerator WHERE username=? and password=?";
						$stmt = $link->prepare($statement);
						$stmt->bind_param("ss", $username,$password);
						$stmt->execute();
						$result = $stmt->get_result();
						$row = $result->fetch_assoc();
						if (mysqli_num_rows($result) > 0) 
						{
							$IsProvider = $row['IsProvider'];
							
							if ($IsProvider==1) 
							{
								$_SESSION["provider"] = true; 
							}
							$_SESSION["loggedin"] = true; 
							$_SESSION["administrator"] = $username; 
							header('Location: index.php');
							exit;
						}
						else 
						{
							echo 	"<div class='wrapper'>
									<fieldset>
									<legend> Ενημέρωση </legend>
									<br> Τα στοιχεία που καταχωρήσατε δεν είναι σωστά <br>
									</fieldset>
									</div>";
						}
					}
				}
				else 
				{
					header('Location: index.php'); 
					exit;
				}
			}
			echo 	"</div>
					</div>";
			mysqli_close($link);
			include "footer.php";			
		?> 
   </body>
</html>