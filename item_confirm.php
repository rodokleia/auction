<!-- ΕΠΙΒΕΒΑΙΩΣΗ ΣΤΟΙΧΕΙΩΝ ΑΝΤΙΚΕΙΜΕΝΟΥ -->

<html>
    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1253">
		<title>Επιβεβαίωση Προσθήκης Δημοπρασίας</title> 
		<link rel="stylesheet" href="auction_style.css"> 
	</head>
    <body>
		<?php 
			session_start();
			include "header.php";
			include "config.php";

			if(isset($_POST['add_item']))
			{
				if ($_POST['prod_or_serv_name']!= "" && $_POST['start_datetime']!= "" && $_POST['main_duration']!= "" && $_POST['start_price']!= "" && $_POST['allow_extensions']!= "" && $_POST['type']!= "")
				{
				$username=$_SESSION["username"];
					
				$statement = "select user_id from users where username=?";
				$stmt = $link->prepare($statement);
				$stmt->bind_param("s", $username);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				
				$user_id=$row['user_id'];
				$prod_or_serv_name = $_POST['prod_or_serv_name'];
				$prod_or_serv_descr = $_POST['prod_or_serv_descr'];
				$start_datetime = $_POST['start_datetime'];
				$main_duration = $_POST['main_duration'];
				$start_price = $_POST['start_price'];
				$price_step = $_POST['price_step'];
				$allow_extensions = $_POST['allow_extensions'];
				$max_extensions = $_POST['max_extensions'];
				$extension_duration = $_POST['extension_duration'];
				$crucial_time = $_POST['crucial_time'];
				$type = $_POST['type'];
				
				$statement = "INSERT INTO auctions VALUES (NULL,?,?,?,?,?,?,?,?,?,?,?,?,NULL,1)";
				$stmt = $link->prepare($statement);
				$stmt->bind_param("isssiiiiiiii", $user_id,$prod_or_serv_name,$prod_or_serv_descr,$start_datetime,$main_duration,$start_price,$price_step,$allow_extensions,$max_extensions,$extension_duration,$crucial_time,$type);
				$stmt->execute();
				
					if ($stmt) /* Εάν πραγματοποιηθεί η εισαγωγή */
					{
						echo "<br> ΕΠΙΤΥΧΗΣ ΠΡΟΣΘΗΚΗ ΔΗΜΟΠΡΑΣΙΑΣ <br>";
						echo "<br> <a href='index.php'> Επιστροφή στην αρχική σελίδα </a> </br>";
					}
					else
					{
						echo "<br> Δεν συμπληρώσατε όλα τα απαραίτητα στοιχεία <br>";
						echo "<br> <a href='item_add.php'> Επιστροφή στην σελίδα καταχώρησης δημοπρασίας</a> <br>";
					}
				} 
			}
			mysqli_close($link);
			include "footer.php";			
		?> 
   </body>
</html>