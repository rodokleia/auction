<!-- ΔΗΜΙΟΥΡΓΙΑ ΜΕΝΟΥ ΠΑΡΟΧΟΥ (provider) -->

<?php 
	if (!isset($_SESSION["administrator"]) || $_SESSION["administrator"] != true)
	{
		header("location:index.php");
	}
	else
	{
		echo "<div class='wrapper'>
				<h3>ΜΕΝΟΥ ΠΑΡΟΧΟΥ</h3>
				<hr>
				<ul> 
					<li> <a href='user_act.php'> Ενεργοποίηση νέου χρήστη </a> </li>
					<br>
					<li> <a href='user_deact.php'> Απενεργοποίηση χρήστη </a> </li>
					<br>
					<li> <a href='user_react.php'> Επαναφορά χρήστη </a> </li>
					<br>
					<li> <a href='#'> Έλεγχος ολοκλήρωσης δημοπρασίας </a> </li>
					<br>
					<li> <a href='#'> Έλεγχος στοιχείων πληρωμών </a> </li>
					<br>
					<li> <a href='#'> Ακύρωση δημοπρασίας </a> </li>
					<br>
				</ul>
			</div>";
	}
?>
