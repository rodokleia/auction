<!-- ΔΗΜΙΟΥΡΓΙΑ ΜΕΝΟΥ ΧΡΗΣΤΗ -->

<?php 
	if (!isset($_SESSION["username"]) || $_SESSION["username"] != true)
	{
		header("location:index.php");
	}
	else
	{
		echo 	" <div class='wrapper'>
					<h3>ΜΕΝΟΥ ΧΡΗΣΤΗ</h3>
					<hr>
					<ul> 
						<li> <a href='profile.php'> Πληροφορίες προφίλ </a> </li>
						<br>
						<li> <a href='user_auctions.php'> Οι δημοπρασίες μου </a> </li>
						<br>
						<li> <a href='#'> Οι προσφορές μου </a> </li>
						<br>
						<li> <a href='item_add.php'> Καταχώρηση νέας δημοπρασίας </a> </li>
						<br>
						<li> <a href='index.php'>Επιστροφή στην αρχική σελίδα </a> </li>
						<br>
					</ul>
				</div>";
	}
?>
