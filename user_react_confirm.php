<!-- ΕΠΑΝΑΦΟΡΑ ΧΡΗΣΤΗ - ΕΝΗΜΕΡΩΣΗ ΒΑΣΗΣ-->
	
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1253">
		<title>Επιβεβαίωση Επαναφοράς Χρήστη</title> 
		<link rel="stylesheet" type="text/css" href="auction_style.css">  
	</head>
	<body>
		<?php
			session_start();		
			include "header.php"; 
			include "config.php";  
			include "session_check_adm.php";
			echo 	"<div class='section_2'>
					<div class='section_2L'>";
			if (isset($_SESSION["provider"]) && $_SESSION["provider"] == true)
				include "menu_prov.php";
			else
				include "menu_mod.php";
			echo 	"</div>
					<div class='section_2R'>";
			$administrator = $_SESSION["administrator"]; 
			$statement = "SELECT * FROM providerormoderator WHERE Username=?"; 
			$stmt = $link->prepare($statement);
			$stmt->bind_param("s", $administrator);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$administrator_id = $row["pom_id"];
			if(isset($_POST['button_react_temp']) || isset($_POST['button_deact_fin'])) 
			{      
				$id = $_GET['user_id']; 
				$statement = "UPDATE users SET u_status='4', last_modif_pom=?,last_modif_date=NOW() WHERE user_id=?"; 
				$stmt = $link->prepare($statement);
				$stmt->bind_param("ii", $administrator_id,$id);
				$stmt->execute();
				if ($stmt)
				{
					echo  "
						<div class='wrapper-extended'>
						<fieldset>
						<legend> Ενημέρωση </legend>
						<p> Επιτυχής επαναφορά χρήστη με User ID ".$id." <p>
						</fieldset>
						</div>";	
				}
			}
			echo "</div>";
			echo "</div>";
			mysqli_close($link);
			include "footer.php"; 
		?> 
	</body>
</html>