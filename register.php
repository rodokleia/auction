<!-- ΕΓΓΡΑΦΗ ΝΕΟΥ ΧΡΗΣΤΗ -->

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1253"> 
		<title>Εγγραφή Χρήστη</title>
		<link rel="stylesheet" type="text/css" href="auction_style.css">
		
		<script type="text/javascript">
			function check_number(nchar)
			{
			 var charCode = (nchar.which) ? nchar.which : event.keyCode
			 if (charCode < 48 || charCode > 57)
				return false;
			 return true;
			}
			
			function check_fields()
			{
				var a = document.getElementById("username");
				var b = document.getElementById("password");
				var c = document.getElementById("firstname");
				var d = document.getElementById("lastname");
				var e = document.getElementById("email");
				if (a.value=="" || b.value=="" || c.value=="" || d.value=="" || e.value=="")
				{
					alert("Δεν έχουν συμπληρωθεί όλα τα υποχρεωτικά πεδία");
				}
				else
				{
					document.getElementById("form_register").submit();
				}
			}
		</script>
		
	</head>
	<body>
		<?php include "header.php"; ?> 
		<div class="section_2">
			<div class="section_2L">
				<div class="wrapper">
					<p> Για εγγραφή νέου χρήστη καταχωρήστε τα στοιχεία σας στη φόρμα εγγραφής. 
						Ο λογαριασμός σας θα ενεργοποιηθεί αφού ολοκληρωθεί ο έλεγχος των στοιχείων σας 
						από τον διαχειριστή του συστήματος. Μετά την ενεργοποίηση του λογαριασμού σας θα
						μπορείτε να συμμετέχετε σε δημοπρασίες, χωρίς δυνατότητα αποποίησης των δεσμεύσεων που απορρέουν
						από τη συμμετοχή σας σε αυτές.</p>
					<p><a href="index.php">Επιστροφή στην αρχική σελίδα </a></p>
				</div>
			</div>
			<div class="section_2R">
				<div class="wrapper-extended">
					<h3 style="display:inline">ΕΓΓΡΑΦΗ ΝΕΟΥ ΧΡΗΣΤΗ</h3>
					<hr>
					<p>(τα πεδία με * είναι υποχρεωτικά)</p>
					<form id="form_register" action="register_confirm.php" method="post">
						<div class="form-container"> 
							<label>Όνομα χρήστη *</label> </br>
							<input id="username" type="text" name="username" maxlength = "25" class="form-input">
						</div>
						<div class="form-container"> 
							<label>Κωδικός χρήστη *</label> </br>
							<input id="password" type="password" name="password" maxlength = "8" class="form-input">
						</div>
						<div class="form-container"> 
							<label>Όνομα *</label> </br>
							<input id="firstname" type="text" name="firstname" maxlength = "25" class="form-input">
						</div>
						<div class="form-container"> 
							<label>Επώνυμο *</label> </br>
							<input id="lastname" type="text" name="lastname" maxlength = "25" class="form-input">
						</div>
						<div class="form-container"> 
							<label>Διεύθυνση (Οδός, Αριθμός, Περιοχή, Τ.Κ.)</label> </br>
							<textarea cols="40" rows="5" id="address" type="text" name="address" maxlength = "255" class="form-input"> </textarea> 
						</div>
						<div class="form-container"> 
							<label>email *</label> </br>
							<input id="email" type="text" name="email" maxlength = "45" class="form-input"> 
						</div>
						<div class="form-container"> 
							<label>Τηλέφωνο</label> </br>
							<input id="telephone" type="text" name="telephone" maxlength = "10" class="form-input" onkeypress="return check_number(event)">
						</div>
						<div class="form-container"> 
							<input id="button_register" type="button" class="button" value="Εγγραφή" name="button_register" onclick="check_fields()">
						</div>
					</form>
				</div>
			</div>
		</div>
		<?php include "footer.php"; ?>
   </body>
</html>