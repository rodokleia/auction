<!-- ΑΠΕΝΕΡΓΟΠΟΙΗΣΗ ΧΡΗΣΤΗ -->
	
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1253">
		<title>Απενεργοποίηση Χρήστη</title>
		<link rel="stylesheet" type="text/css" href="auction_style.css">
	</head>
	<body>
		<?php 
			session_start();
			include "header.php"; 
			include "config.php"; 
			include "session_check_adm.php"; 
			$administrator = $_SESSION["administrator"];
			echo 	"<div class='section_2'>
					<div class='section_2L'>";
					if (isset($_SESSION["provider"]) && $_SESSION["provider"] == true)
						include "menu_prov.php";
					else
						include "menu_mod.php";
			echo 	"</div>
					<div class='section_2R'>
					<h3> ΑΠΕΝΕΡΓΟΠΟΙΗΣΗ ΧΡΗΣΤΗ </h3> <hr>
					<div class='wrapper'>
					<p> Εισάγετε το User ID: </p>
						<form action='user_deact.php' method='post'>
						<input type='text' name='user_id' class='form-input'> <br>
						<br><input type='submit' class='button' value='Αναζήτηση' name='button_search'> 
						</form>
					</div>";		
			if(isset($_POST['button_search']))
			{      
				$id = $_POST['user_id'];
				$statement = "SELECT * FROM users WHERE user_id=?";
				$stmt = $link->prepare($statement);
				$stmt->bind_param("i", $id);
				$stmt->execute();
				$result = $stmt->get_result();
				if (mysqli_num_rows($result) > 0) 
				{
					while($row = $result->fetch_assoc()) 
					{
						$status = $row['u_status']; 
						$statement = "SELECT * FROM user_status WHERE u_status_id=?"; 
						$stmt = $link->prepare($statement);
						$stmt->bind_param("i", $status);
						$stmt->execute();
						$result = $stmt->get_result();
						$row1 = $result->fetch_assoc();
						$status_descr = $row1['u_status_descr']; 
						echo "<div class='wrapper'>
								<fieldset>
									<legend> Στοιχεία Χρήστη</legend>
									<div class='item'> 
										<form action='user_deact_confirm.php?user_id=".$id."' method='post'>
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
											<div class='item_col'> <label> Κατάσταση </label> </div>
											<div class='item_col'> ". $row1["u_status_descr"]. " </div>
										</div>
										<div class='item_row'>
											<div class='item_col'> <input type='submit' class='button' value='Οριστική Απενεργοποίηση' name='button_deact_fin'> </div>
											<div class='item_col'> <input type='submit' class='button' value='Προσωρινή Απενεργοποίηση' name='button_deact_temp'> </div>
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
							<p> Ο χρήστης που αναζητήσατε δεν βρέθηκε <p>
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