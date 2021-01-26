<!-- ΕΠΙΒΕΒΑΙΩΣΗ ΣΤΟΙΧΕΙΩΝ ΝΕΟΥ ΧΡΗΣΤΗ -->

<html>
    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1253">
		<title>Έλεγχος Εγγραφής Χρήστη</title>
		<link rel="stylesheet" type="text/css" href="auction_style.css">
	</head>
    <body>
		<?php 
			include "header.php"; 
			include "config.php"; 
			echo 	"<div class='section_2'>
					<div class='section_2L'>
					</div>
					<div class='section_2R'>";
			if(!empty($_POST))
			{
				$username = $_POST['username']; 
				$password = $_POST['password']; 
				$firstname = $_POST['firstname']; 
				$lastname = $_POST['lastname']; 
				$address = $_POST['address']; 
				$email = $_POST['email']; 
				$telephone = $_POST['telephone'];
				if ($username != "" && $password != "" && $firstname != "" && $lastname != "" && $email != "")
				{
					$statement = "SELECT username FROM users WHERE username=?";
					$stmt = $link->prepare($statement);
					$stmt->bind_param("s", $username);
					$stmt->execute();
					$result = $stmt->get_result();
					$row = $result->fetch_assoc();
					if (mysqli_num_rows($result) > 0) 
					{
						echo 	"<div class='wrapper-extended'>
									<fieldset>
									<legend> Ενημέρωση </legend>
									<br> Το όνομα χρήστη που επιλέξατε χρησιμοποιείται ήδη <br>
									<br> <a href='register.php'> Επιστροφή στη φόρμα εγγραφής </a> <br>
									</fieldset>
								</div>";
					}
					else 
					{
						$statement = "INSERT INTO users VALUES (NULL,'1',NULL,NULL,NULL,NULL,?,?,?,?,?,?,?)";
						$stmt = $link->prepare($statement);
						$stmt->bind_param("sssssss",$username,$password,$firstname,$lastname,$address,$email,$telephone);
						$stmt->execute();
						if ($stmt) /* Εάν πραγματοποιηθεί η εισαγωγή */
						{
							echo 	"<div class='wrapper-extended'>
										<fieldset>
										<legend> Ενημέρωση </legend>
										<br> ΕΠΙΤΥΧΗΣ ΕΓΓΡΑΦΗ ΝΕΟΥ ΧΡΗΣΤΗ <br> Αναμένεται ενεργοποίηση του λογαριασμού από τον διαχειριστή του συστήματος. <br>
										<br> <a href='index.php'> Επιστροφή στην αρχική σελίδα </a> <br>
										</fieldset>
									</div>";
						}
					}
				}
				else /* Εάν δεν έχουν συμπληρωθεί όλα τα πεδία */
				{
					echo 	"<div class='wrapper-extended'>
								<fieldset>
								<legend> Ενημέρωση </legend>
								<br> Δεν έχουν συμπληρωθεί όλα τα υποχρεωτικά πεδία <br>
								<br> <a href='register.php'> Επιστροφή στη φόρμα εγγραφής </a> <br>
								</fieldset>
							</div>";
				}
			}		
			echo 	"</div>
					</div>";	
			mysqli_close($link); /* Κλείνει η σύνδεση με τη βάση δεδομένων */
			include "footer.php";	
		?> 
   </body>
</html>