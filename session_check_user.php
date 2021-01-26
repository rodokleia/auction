<!-- ΕΛΕΓΧΟΣ ΕΑΝ ΕΧΕΙ ΓΙΝΕΙ LOGIN USER -->

<?php
	if(empty($_SESSION["username"]))
	{		
		echo 	"<div class='section_2'>
					<div class='section_2L'>
					</div>
					<div class='section_2R'>
						<div class='wrapper'>
							<fieldset>
							<legend> Ενημέρωση </legend>
							<br> Απαιτείται σύνδεση στο λογαριασμό σας. <br>
							</fieldset>
						</div>
					</div>
				</div>";
		include "footer.php";
		exit;
	}
?>