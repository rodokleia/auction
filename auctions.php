<?php
	require_once "config.php";

	$status=1;
	$statement = "SELECT * FROM auctions WHERE a_status=?";
	$stmt = $link->prepare($statement);
	$stmt->bind_param("i", $status);
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
			
			if ($endTime>$nowTime)
			{				
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
			else{
				/* θέτει την κατάσταση "ολοκληρωμένη" σε όσες δημοπρασίες έχουν λείξει ΧΡΟΝΙΚΑ ανεξάρτητα αν έχει γίνει προσφορά ή όχι*/
				$statement = "UPDATE auctions SET a_status='2' WHERE auction_id=?";
				$stmt = $link->prepare($statement);
				$stmt->bind_param("i", $auction_id);
				$stmt->execute();
			}
		}
	} 
	else 
	{
		echo "Στην Ιστοσελίδα δεν φιλοξενείται καμία δημοπρασία αυτή τη στιγμή";
	}
	mysqli_close($link);
?>