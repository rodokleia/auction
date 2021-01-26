<!-- ΕΠΑΝΑΦΟΡΑ ΧΡΗΣΤΗ -->
	
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1253"> 
		<title>Επαναφορά Χρήστη</title> 
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
					<h3> ΠΡΟΣΩΡΙΝΑ ΑΠΕΝΕΡΓΟΠΟΙΗΜΕΝΟΙ ΧΡΗΣΤΕΣ </h3> <hr>";
			$statement = "SELECT * FROM users WHERE u_status='2'"; 
			$result = mysqli_query($link,$statement); 
			if (mysqli_num_rows($result) > 0)
			{
				while($row = mysqli_fetch_array($result)) 
				{
					echo "<div class='wrapper-extended'>
						<fieldset>
						<legend> Στοιχεία Χρήστη</legend>
						<div class='item'> 
							<form action='user_react_confirm.php?user_id=".$row['user_id']."' method='post'>
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
									<div class='item_col'> </div>
									<div class='item_col'> <input type='submit' class='button' value='Επαναφορά χρήστη' name='button_deact_fin'> </div>
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
							<p> Δεν υπάρχουν αποτελέσματα <p>
							</fieldset>
							</div>";
				}
			if (isset($_SESSION["provider"]) && $_SESSION["provider"] == true)
			{
				echo " <h3> ΟΡΙΣΤΙΚΑ ΑΠΕΝΕΡΓΟΠΟΙΗΜΕΝΟΙ ΧΡΗΣΤΕΣ </h3> <hr>";
				$statement = "select * from users where u_status='3'"; 
				$result = mysqli_query($link,$statement); 
				if (mysqli_num_rows($result) > 0) 
				{
					while($row = mysqli_fetch_array($result)) 
					{
						echo "<div class='wrapper-extended'>
							<fieldset>
							<legend> Στοιχεία Χρήστη</legend>
							<div class='item'> 
							<form action='user_react_confirm.php?user_id=".$row['user_id']."' method='post'>
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
									<div class='item_col'> </div>
									<div class='item_col'> <input type='submit' class='button' value='Επαναφορά χρήστη' name='button_deact_fin'> </div>
								</div>
							</div>
							</form>
							</fieldset>
							</div>";
					}
				}		
				else
				{
					echo 	"<div class='wrapper'>
							<fieldset>
							<legend> Ενημέρωση </legend>
							<p> Δεν υπάρχουν αποτελέσματα <p>
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