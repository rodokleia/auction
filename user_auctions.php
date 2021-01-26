<!-- ΔΗΜΟΠΡΑΣΙΕΣ ΧΡΗΣΤΗ -->

<html>
    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1253">
		<title>Οι Δημοπρασίες μου</title>
		<link rel="stylesheet" href="auction_style.css">
	</head>
	<body>
	
	<?php 
		session_start();
		include "header.php"; 
		include "session_check_user.php";
		require_once "config.php";
	?>
		<div class="section_2">
			<div class="section_2L">
				<?php include "menu_user.php"; ?>
			</div>
			<div class="section_2R">
			   <h3>ΟΙ ΔΗΜΟΠΡΑΣΙΕΣ ΜΟΥ</h3>
			   <hr>
				<?php
				/* βρίσκω το User_id */ 
				$username = $_SESSION["username"]; 
				$statement = "SELECT * FROM users WHERE username=?";
				$stmt = $link->prepare($statement);
				$stmt->bind_param("s", $username);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				$user_id=$row["user_id"];
							
				$statement = "SELECT * FROM auctions WHERE owner=?";
				$stmt = $link->prepare($statement);
				$stmt->bind_param("i", $user_id);
				$stmt->execute();
				$result = $stmt->get_result();

				if ($result->num_rows > 0) 
				{
					while($row = $result->fetch_assoc()) {
						
					$auction_id=$row["auction_id"];
					$start_datetime = $row['start_datetime'];
					$main_duration = $row['main_duration'];
					$nowTime=date("Y-m-d H:i:s");
					$starttimestr = strtotime("$start_datetime");
					$endTimestr = $starttimestr + $main_duration;
					$endTime = date("Y-m-d H:i:s", $endTimestr);
						
					echo "
						<div class='border'>
						<form action='item_detail.php'method='post'>
						<input type='hidden' name='auction_id' value='$auction_id'/>
						<input type='submit' class='button' value='Λεπτομέρειες'>
						<label class='item'>". $row["prod_or_serv_name"]." - Κωδικός Δημοπρασίας: ". $row["auction_id"]." - Δημοπράτης: ". $row["owner"]." - ".$row["start_datetime"]."</label>
						</form>
						</div>
						"; 
					}

				}
				else 
				{
					echo "Στην Ιστοσελίδα δεν φιλοξενείται καμία δημοπρασία σας αυτή τη στιγμή";
				}	
				?>
		</div>
	</div>
	
	<?php
		mysqli_close($link);
		include "footer.php"; /* Χρησιμοποιείται το footer της αρχικής σελίδας */
	?>	
	</body>
</html>