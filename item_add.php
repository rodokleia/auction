<!-- ΔΗΜΙΟΥΡΓΙΑ ΦΟΡΜΑΣ ΑΝΤΙΚΕΙΜΕΝΟΥ -->

<html>
    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1253">
		<title>Προσθήκη Δημοπρασίας</title>
		<link rel="stylesheet" href="auction_style.css">
		
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
		
	<?php 
		session_start();
		include "header.php"; 
		include "session_check_user.php";
	?>
	<div class="section_2">
		<div class="section_2L">
			<?php include "menu_user.php"; ?>
		</div>
		<div class="section_2R">
			<div class="wrapper-extended"> 
			   <h3 style="display:inline">ΠΡΟΣΘΗΚΗ ΔΗΜΟΠΡΑΣΙΑΣ</h3>
			   <hr>
			   <p>(τα πεδία με * είναι υποχρεωτικά)</p>
			   <form action="item_confirm.php" method="post"> 
				  <div class="form-container"> 
					 <label>Όνομα αντικειμένου *</label></br> 
					 <input type="text" name="prod_or_serv_name" maxlength = "45" class="form-input"> 
				  </div>
				  <div class="form-container">
					 <label>Περιγραφή αντικειμένου</label></br>
					 <textarea cols="40" rows="5" name="prod_or_serv_descr" maxlength = "255" class="form-input"></textarea>
				  </div>
				  <div class="form-container">
					 <label>Έναρξη δημοπρασίας *</label></br>
					 <input type="datetime-local" name="start_datetime" class="form-input">
				  </div>
				  <div class="form-container">
					 <label>Διάρκεια δημοπρασίας (σε λεπτά) *</label></br>
					 <input type="number" name="main_duration" maxlength = "10" class="form-input" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
				  </div>
				  <div class="form-container">
					 <label>Τιμή εκκίνησης *</label></br>
					 <input type="number" name="start_price" maxlength = "10" class="form-input" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
				  </div>
				  <div class="form-container">
					 <label>Βήμα προσφοράς</label></br>
					 <input type="number" name="price_step" maxlength = "10" class="form-input" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
				  </div>
				  <div class="form-container">
					 <label>Επέτρεψε παράταση *</label></br>
					 <input type="radio" value="1" name="allow_extensions">Ναι<br>
					 <input type="radio" value="0" name="allow_extensions">Οχι
				  </div>
				  <div class="form-container">
					 <label>Μέγιστος αριθμός παρατάσεων</label></br>
					 <input type="number" name="max_extensions" maxlength = "20" class="form-input" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
				  </div>
				  <div class="form-container">
					 <label>Διάρκεια παράτασης</label></br>
					 <input type="number" name="extension_duration" maxlength = "10" class="form-input" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
				  </div>
				  <div class="form-container">
					 <label>Χρόνος προσφοράς πριν την λήξη της παράτασης</label></br>
					 <input type="number" name="crucial_time" maxlength = "10" class="form-input" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
				  </div>
				  <div class="form-container">
					 <label>Είδος δημοπρασίας: *</label></br>
					 <input type="radio" value="1" name="type">Πλειοδοτική<br>
					 <input type="radio" value="2" name="type">Μειοδοτική
				  </div>

				  <div class="form-container">
					 <input type="submit" class="button" value="Υποβολή Δημοπρασίας" name="add_item">
				  </div>
			   </form>
			</div>
		</div>
	</div>
	<?php 
		include "footer.php"; /* Χρησιμοποιείται το footer της αρχικής σελίδας */				
	?> 
		
	</body>
</html>
