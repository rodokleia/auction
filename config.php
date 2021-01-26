<!-- ΣΥΝΔΕΣΗ ΜΕ ΤΗ ΒΑΣΗ ΔΕΔΟΜΕΝΩΝ -->

<?php
	/* Προσδιορίζονται το όνομα του server, το username, το password και το όνομα της βάσης δεδομένων */
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_NAME', 'dbauction');
	
	/* Γίνεται προσπάθεια σύνδεσης με τη βάση δεδομένων, με χρήση των παραπάνω σταθερών. Επιστρέφει TRUE ή FALSE */
	$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
	
	/* Εάν δεν πραγματοποιηθεί σύνδεση με τη βάση δεδομένων εμφανίζεται μήνυμα λάθους */
	if($link == false)
	{
		die ("ΣΦΑΛΜΑ: Αδυναμία σύνδεσης με τη βάση δεδομένων");
	}
?>