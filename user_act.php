<!-- ΕΝΕΡΓΟΠΟΙΗΣΗ ΧΡΗΣΤΗ -->
	
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1253">
		<title>Ενεργοποίηση Χρήστη</title>
		<link rel="stylesheet" type="text/css" href="auction_style.css"> 
	</head>
	<body>
		<?php 
			session_start();
			include "header.php";
			include "config.php";
			include "session_check_adm.php";
			$administrator = $_SESSION["administrator"];
			$statement = "SELECT * FROM users WHERE u_status='1'";
			$stmt = $link->prepare($statement);
			$stmt->execute();
			$result = $stmt->get_result();
			echo 	"<div class='section_2'>
					<div class='section_2L'>";
					if (isset($_SESSION["provider"]) && $_SESSION["provider"] == true)
						include "menu_prov.php";
					else
						include "menu_mod.php";
			echo 	"</div>
					<div class='section_2R'>";
			if (mysqli_num_rows($result) > 0)
			{
				echo 	"<h3>ΧΡΗΣΤΕΣ ΤΩΝ ΟΠΟΙΩΝ ΕΚΚΡΕΜΕΙ Η ΕΝΕΡΓΟΠΟΙΗΣΗ</h3> <hr>";
				while($row = mysqli_fetch_array($result))
				{	
					echo 	"<div class='wrapper'>
							<fieldset>
							<legend> Στοιχεία Χρήστη</legend>
							<div class='item'>  
								<form action='user_act_confirm.php?user_id=".$row['user_id']."' method='post'>
									<div class='item_row'> 
										<div class='item_col'> <label> User ID </label> </div>
										<div class='item_col'> ". $row["user_id"]. "</div>
									</div>		
									<div class='item_row'> 
										<div class='item_col'> <label> Όνομα </label> </div>
										<div class='item_col'> ". $row["firstname"]. " </div>
									</div>
									<div class='item_row'> 
										<div class='item_col'> <label> Επώνυμο </label> </div>
										<div class='item_col'> ". $row["lastname"]. " </div>
									</div>
									<div class='item_row'> 
										<div class='item_col'> <label> Διεύθυνση </label> </div>
										<div class='item_col'> ". $row["address"]. " </div>
									</div>
									<div class='item_row'> 
										<div class='item_col'> <label> email </label> </div>
										<div class='item_col'> ". $row["email"]. " </div>
									</div>
									<div class='item_row'> 
										<div class='item_col'> <label> Τηλέφωνο </label> </div>
										<div class='item_col'> ". $row["telephone"]. " </div>
									</div>
									<div class='item_row'>
										<div class='item_col'> <input type='submit' class='button' value='Ενεργοποίηση χρήστη' name='button_user_act'> </div>
									</div>
								</form>
							</div>				
						</fieldset>
						</div>";
				}
			}
			else
			{
				echo 	"<div class='wrapper'>
						<fieldset>
						<legend> Ενημέρωση </legend>
						<p> Δεν υπάρχουν χρήστες προς ενεργοποίηση <p>
						</fieldset>
						</div>";
			}
			echo "</div>";
			echo "</div>";
			mysqli_close($link); 
			include "footer.php"; 
		?>
   </body>
</html>