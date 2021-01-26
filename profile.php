<!-- ΕΜΦΑΝΙΣΗ ΣΤΟΙΧΕΙΩΝ ΧΡΗΣΤΗ -->

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1253"> 
		<title>Προφίλ Χρήστη</title> 
		<link rel="stylesheet" type="text/css" href="auction_style.css">  
	</head>
	<body>
		<?php 
			session_start();
			include "header.php"; 
			include "config.php";
			include "session_check_user.php";			
			$username = $_SESSION["username"]; 
			$statement = "SELECT * FROM users WHERE username=?"; 
			$stmt = $link->prepare($statement);
			$stmt->bind_param("s", $username);
			$stmt->execute();
			$result = $stmt->get_result();	
			echo 	"<div class='section_2'>
					<div class='section_2L'>";
					include "menu_user.php";
			echo 	"</div>
					<div class='section_2R'>";
						if (mysqli_num_rows($result) > 0)
						{
							while($row = mysqli_fetch_array($result))
							{
								echo 	"<h3>ΣΤΟΙΧΕΙΑ ΧΡΗΣΤΗ</h3>
										<hr>
										<div class='wrapper'>
											<div class='item'> 
												<div class='item_row'>
													<div class='item_col'><label>Όνομα χρήστη:</label></div>
													<div class='item_col'>".$row["username"]."</div>
												</div>
												<div class='item_row'>
													<div class='item_col'><label>Κωδικός χρήστη:</label></div>
													<div class='item_col'>".$row["password"]."</div>
												</div>
												<div class='item_row'>
													<div class='item_col'><label>Όνομα:</label></div>
													<div class='item_col'>".$row["firstname"]."</div>
												</div>
												<div class='item_row'>
													<div class='item_col'><label>Επώνυμο:</label></div>
													<div class='item_col'>".$row["lastname"]."</div>
												</div>
												<div class='item_row'>
													<div class='item_col'><label>Διεύθυνση:</label></div>
													<div class='item_col'>".$row["address"]."</div>
												</div>
												<div class='item_row'>
													<div class='item_col'><label>email:</label></div>
													<div class='item_col'>".$row["email"]."</div>
												</div>
												<div class='item_row'>
													<div class='item_col'><label>Τηλέφωνο:</label></div>
													<div class='item_col'>".$row["telephone"]."</div>
												</div>							
											</div>
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