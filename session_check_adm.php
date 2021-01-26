<!-- ΕΛΕΓΧΟΣ ΕΑΝ ΕΧΕΙ ΓΙΝΕΙ LOGIN ΔΙΑΧΕΙΡΙΣΤΗ -->

<?php
	if(empty($_SESSION["administrator"]))
	{		
		echo 	"<div class='section_2'>
					<div class='section_2L'>
					</div>
					<div class='section_2R'>
						<div class='wrapper'>
							<fieldset>
							<legend> Ενημέρωση </legend>
							<br> Δεν έχετε δικαίωμα πρόσβασης σε αυτή τη σελίδα. <br>
							</fieldset>
						</div>
					</div>
				</div>";
		include "footer.php";
		exit;
	}
?>