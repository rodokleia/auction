<!-- ΔΗΜΙΟΥΡΓΙΑ ΑΡΧΙΚΗΣ ΣΕΛΙΔΑΣ -->

<?php session_start();?>
   
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1253">
		<title>Δημοπρασίες Μήτσου</title>
		<link rel="stylesheet" type="text/css" href="auction_style.css">
		
	</head>
	<body>
		
	<?php include "header.php"?>

	<div class="section_2">
		<div class="section_2L">
			<?php
				if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true)
				{	
					if (isset($_SESSION["provider"]) && $_SESSION["provider"] == true)
					{
						include "menu_prov.php";
					}
					else if (isset($_SESSION["administrator"]) && $_SESSION["administrator"] == true)
					{
						include "menu_mod.php";
					}
					else
					{
						include "menu_user.php";
					}
				}
				else
				{
					echo 	"<div class='wrapper'>
							<p> Για να μπορείτε να συμμετέχετε στις δημοπρασίες απαιτείται σύνδεση στο λογαριασμό σας. </p>
							<p> <b> Δεν έχετε λογαριασμό; </b> </p>
							<p> <a href='register.php'> Δημιουργία λογαριασμού </a> </p>
							</div>";
				}
					
			?>	
		</div>
		<div class="section_2R">
			<h3> ΕΝΕΡΓΕΣ ΔΗΜΟΠΡΑΣΙΕΣ </h3>
			<hr>
			<?php include "auctions.php"; ?>
		</div>
	</div>
	
	<?php include "footer.php"?>
	
	</body>
</html>