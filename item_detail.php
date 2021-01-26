<!-- ΛΕΠΤΟΜΕΡΕΙΕΣ ΔΗΜΟΠΡΑΣΙΑΣ -->

<html>
    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1253">
		<title>Λεπτομέρειες Δημοπρασίας</title>
		<link rel="stylesheet" href="auction_style.css">
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
			<div class="wrapper"> 
				<?php
					require_once "config.php";
				   
					$status=1;
					$auctionID = $_POST['auction_id'];
					$statement = "SELECT * FROM auctions WHERE a_status=? AND auction_id=?";
					$stmt = $link->prepare($statement);
					$stmt->bind_param("ii", $status,$auctionID);
					$stmt->execute();
					$result = $stmt->get_result();
					$row = $result->fetch_assoc();
					
					$auction_id = $row['auction_id'];
					$owner = $row['owner'];
					$prod_or_serv_name = $row['prod_or_serv_name'];
					$prod_or_serv_descr = $row['prod_or_serv_descr'];
					$main_duration = $row['main_duration'];
					$start_price = $row['start_price'];
					$price_step = $row['price_step'];

					echo "<div class='item'>";	
					echo "<div class='item_row'>Auction Id: $auction_id</div>";
					echo "<div class='item_row'>Δημοπράτης: $owner</div>";
					echo "<div class='item_row'>Όνομα αντικειμένου: $prod_or_serv_name</div>";
					echo "<div class='item_row'>Περιγραφή αντικειμένου: $prod_or_serv_descr</div>";
					echo "<div class='item_row'>Διάρκεια δημοπρασίας: $main_duration</div>";
					echo "<div class='item_row'>Τιμή εκκίνησης: $start_price</div>";
					echo "</div>";

					mysqli_close($link);
				?>
			</div>
		</div>
	</div>
	<?php 
		include "footer.php"; /* Χρησιμοποιείται το footer της αρχικής σελίδας */				
	?> 
    </body>
</html>