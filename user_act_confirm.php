<!-- ΕΝΕΡΓΟΠΟΙΗΣΗ ΧΡΗΣΤΗ - ΕΝΗΜΕΡΩΣΗ ΒΑΣΗΣ-->
	
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1253">
		<title>Επιβεβαίωση Ενεργοποίησης Χρήστη</title>
		<link rel="stylesheet" type="text/css" href="auction_style.css">
	</head>
	<body>
		<?php 
			session_start();
			include "header.php";
			include "config.php";
			include "session_check_adm.php";
			$administrator = $_SESSION["administrator"];
			$statement = "SELECT * FROM providerormoderator WHERE Username=?";
			$stmt = $link->prepare($statement);
			$stmt->bind_param("s", $administrator);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$administrator_id = $row["pom_id"];
			echo 	"<div class='section_2'>
					<div class='section_2L'>";
					if (isset($_SESSION["provider"]) && $_SESSION["provider"] == true)
						include "menu_prov.php";
					else
						include "menu_mod.php";
			echo 	"</div>
					<div class='section_2R'>";
			if(isset($_POST['button_user_act']))
			{      
				$id = $_GET['user_id'];
				$statement = "UPDATE users SET u_status='4', approval_pom=?,approval_date=NOW() WHERE user_id=?"; 
				$stmt = $link->prepare($statement);
				$stmt->bind_param("ii", $administrator_id,$id);
				$stmt->execute();
				if ($stmt)
				{
					echo 	"<div class='wrapper-extended'>
							<fieldset>
							<legend> Ενημέρωση </legend>
							<p> Επιτυχής ενεργοποίηση χρήστη με User ID ".$id." <p>
							</fieldset>
							</div>";		
				}
			}
			echo "</div>";
			echo "</div>";
			include "footer.php";
		?> 
	</body>
</html>