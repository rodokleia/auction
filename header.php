<!-- ΔΗΜΙΟΥΡΓΙΑ HEADER -->

<div class="header">
	<a href="index.php"><img src="auctions_logo.png" alt="Auctions_Logo" width="60px" height="60px" class="header_a"></a>
	<h1 class="header_text"> MITSOU AUCTIONS</h1>
</div>

<div class="section_1">
	<?php
		
		if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true) 
		{
			include "login.php"; 
		}
		else if (isset($_SESSION["administrator"]) && $_SESSION["administrator"] == true) 
		{
			echo "Καλώς ήλθατε,&nbsp;<b>".htmlspecialchars($_SESSION['administrator'])."</b>&nbsp;&nbsp;<a href='logout.php'>Αποσύνδεση</a>";							
		}
		else
		{
			echo "Καλώς ήλθατε,&nbsp;<b>".htmlspecialchars($_SESSION['username'])."</b>&nbsp;&nbsp;<a href='logout.php'>Αποσύνδεση</a>";
		}
	?>
</div>

