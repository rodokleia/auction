--
-- Δημιουργία της βάσης δεδομένων: `dbauction`
--
DROP DATABASE IF EXISTS `dbauction`;
CREATE DATABASE IF NOT EXISTS `dbauction` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `dbauction`;

-- --------------------------------------------------------

--
-- Δομή του πίνακα `Auctions`
--
CREATE TABLE `Auctions` (
  `auction_id` int UNSIGNED NOT NULL,
  `owner` int UNSIGNED NOT NULL COMMENT 'Ο κωδικός του χρήστη που δημιούργησε τη δημοπρασία',
  `prod_or_serv_name` varchar(45) NOT NULL COMMENT 'Το όνομα του προϊόντος ή της υπηρεσίας που τίθεται προς δημοπρασία',
  `prod_or_serv_descr` varchar(255) DEFAULT NULL COMMENT 'Η περιγραφή του αντικειμένου ή της υπηρεσίας που τίθεται προς δημοπρασία',
  `start_datetime` datetime NOT NULL COMMENT 'Η ακριβής ημερομηνία και ώρα έναρξης της δημοπρασίας',
  `main_duration` int UNSIGNED NOT NULL COMMENT 'Η διάρκεια της δημοπρασίας',
  `start_price` int UNSIGNED NOT NULL COMMENT 'Η τιμή εκκίνησης της δημοπρασίας',
  `price_step` int UNSIGNED DEFAULT NULL COMMENT 'Το βήμα (αύξησης ή μείωσης) των χτυπημάτων',
  `allow_extensions` boolean NOT NULL COMMENT 'Δηλώνει αν επιτρέπονται ή όχι παρατάσεις',
  `max_extensions` bigint UNSIGNED DEFAULT NULL COMMENT 'Το μέγιστο πλήθος των παρατάσεων που επιτρέπονται',
  `extension_duration` int UNSIGNED DEFAULT NULL COMMENT 'Η διάρκεια κάθε παράτασης',
  `crucial_time` int UNSIGNED DEFAULT NULL COMMENT 'Η διάρκεια του χρόνου πριν τη λήξη, εντός του οποίου πρέπει να υπάρξει χτύπημα, προκειμένου να ενεργοποιηθεί μια ακόμα παράταση',
  `type` tinyint(1) UNSIGNED NOT NULL COMMENT 'Ο τύπος της δημοπρασίας',
  `last_extension` bigint UNSIGNED DEFAULT NULL COMMENT 'Ο αύξοντας αριθμός της τελευταίας παράτασης',
  `a_status` tinyint(1) UNSIGNED NOT NULL COMMENT 'Η κατάσταση της δημοπρασίας'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Δημοπρασίες';

--
-- Ευρετήρια και αυτόματη αρίθμηση για τον πίνακα `Auctions`
--
ALTER TABLE `Auctions`
  ADD PRIMARY KEY (`auction_id`),
  ADD UNIQUE KEY `auction_id_UNIQUE` (`auction_id`),
  MODIFY `auction_id` int UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Ο κωδικός της δημοπρασίας';

-- --------------------------------------------------------

--
-- Δομή του πίνακα `Auction_Status`
--
CREATE TABLE `Auction_Status` (
  `a_status_id` tinyint(1) UNSIGNED NOT NULL COMMENT 'Ο κωδικός της κατάστασης της δημοπρασίας',
  `a_status_descr` varchar(255) NOT NULL COMMENT 'Η περιγραφή της κατάστασης της δημοπρασίας'  
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Κατάσταση Δημοπρασίας';

--
-- Ευρετήρια για τον πίνακα `Auction_Status`
--
ALTER TABLE `Auction_Status`
  ADD PRIMARY KEY (`a_status_id`),
  ADD UNIQUE KEY `a_status_id_UNIQUE` (`a_status_id`);

-- --------------------------------------------------------

--
-- Δομή του πίνακα `Auction_Type`
--
CREATE TABLE `Auction_Type` (
  `a_type_id` tinyint(1) UNSIGNED NOT NULL COMMENT 'Ο κωδικός του τύπου δημοπρασίας',
  `a_type_descr` varchar(255) NOT NULL COMMENT 'Η περιγραφή του τύπου δημοπρασίας'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Τύπος Δημοπρασίας';

--
-- Ευρετήρια για τον πίνακα `Auction_Type`
--
ALTER TABLE `Auction_Type`
  ADD PRIMARY KEY (`a_type_id`),
  ADD UNIQUE KEY `a_type_id_UNIQUE` (`a_type_id`);

-- --------------------------------------------------------

--
-- Δομή του πίνακα`Bids`
--
CREATE TABLE `Bids` (
  `Bid_Id` bigint UNSIGNED NOT NULL,
  `WhoDoes` int UNSIGNED NOT NULL COMMENT 'Ο κωδικός του χρήστη που έκανε το χτύπημα',
  `Auction` int UNSIGNED NOT NULL COMMENT 'Ο κωδικός της δημοπρασίας που αφορά το χτύπημα',
  `When` datetime NOT NULL COMMENT 'Η ακριβής ημερομηνία και ώρα που έγινε το χτύπημα',
  `Ammount` int UNSIGNED NOT NULL COMMENT 'Το ποσό του χτυπήματος',
  `b_status` tinyint(1) UNSIGNED NOT NULL COMMENT 'Η κατάσταση του χτυπήματος'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Χτυπήματα (οικονομικές προσφορές)';

--
-- Ευρετήρια και αυτόματη αρίθμηση για τον πίνακα `Bids`
--
ALTER TABLE `Bids`
  ADD PRIMARY KEY (`Bid_Id`),
  ADD UNIQUE KEY `Bid_Id_UNIQUE` (`Bid_Id`),
  MODIFY `Bid_Id` bigint UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Ο κωδικός του χτυπήματος';

-- --------------------------------------------------------

--
-- Δομή του πίνακα`Bid_Status`
--
CREATE TABLE `Bid_Status` (
  `b_status_id` tinyint(1) UNSIGNED NOT NULL COMMENT 'Ο κωδικός κατάστασης του χτυπήματος',
  `b_status_descr` varchar(255) NOT NULL COMMENT 'Η περιγραφή της κατάστασης του χτυπήματος'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Κατάσταση Χτυπήματος';

--
-- Ευρετήρια για τον πίνακα `Bid_Status`
--
ALTER TABLE `Bid_Status`
  ADD PRIMARY KEY (`b_status_id`),
  ADD UNIQUE KEY `b_status_id_UNIQUE` (`b_status_id`);

-- --------------------------------------------------------

--
-- Δομή του πίνακα `KnockDown`
--
CREATE TABLE `KnockDown` (
  `Bid_Id` bigint UNSIGNED NOT NULL COMMENT 'Ο κωδικός του χτυπήματος που κέρδισε τη δημοπρασία',
  `IsDelivered` boolean NOT NULL COMMENT 'Δηλώνει αν το προϊόν παραδόθηκε στον συμμετέχοντα στη δημοπρασία',
  `IsPaidByBuyer` boolean NOT NULL COMMENT 'Δηλώνει αν έχει πληρωθεί το ποσό από τον αγοραστή',
  `IsPaidSeller` boolean NOT NULL COMMENT 'Δηλώνει αν έχει αποδοθεί το ποσό πληρωμής στον πωλητή',
  `ProviderFees` double NOT NULL COMMENT 'Το ποσό της αμοιβής του παρόχου, ως ποσοστό επί του χτυπήματος που κέρδισε τη δημοπρασία',
  `IsFeesPaid` boolean NOT NULL COMMENT 'Δηλώνει αν έχει καταβληθεί το ποσό της αμοιβής του παρόχου'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Κατακυρώσεις δημοπρασιών';

--
-- Ευρετήρια για τον πίνακα `KnockDown`
--
ALTER TABLE `KnockDown`
  ADD PRIMARY KEY (`Bid_Id`),
  ADD UNIQUE KEY `Bid_Id_UNIQUE` (`Bid_Id`);

-- --------------------------------------------------------

--
-- Δομή του πίνακα `ProviderOrModerator`
--
CREATE TABLE `ProviderOrModerator` (
  `pom_id` int UNSIGNED NOT NULL COMMENT 'Ο κωδικός του διαχειριστή',
  `Username` varchar(25) NOT NULL COMMENT 'Το όνομα χρήστη του διαχειριστή',
  `Password` varchar(11) NOT NULL COMMENT 'Ο κωδικός χρήστη του διαχειριστή',
  `IsProvider` boolean NOT NULL COMMENT 'Δηλώνει αν πρόκειται για πάροχο',
  `IsModerator` boolean NOT NULL COMMENT 'Δηλώνει αν πρόκειται για διαμεσολαβητή'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Διαχειριστές (πάροχοι και διαμεσολαβητές)';

--
-- Ευρετήρια για τον πίνακα `ProviderOrModerator`
--
ALTER TABLE `ProviderOrModerator`
  ADD PRIMARY KEY (`pom_id`),
  ADD UNIQUE KEY `pom_id_UNIQUE` (`pom_id`);

-- --------------------------------------------------------

--
-- Δομή του πίνακα `Users`
--
CREATE TABLE `Users` (
  `user_id` int UNSIGNED NOT NULL,
  `u_status` tinyint(1) UNSIGNED NOT NULL COMMENT 'Η κατάσταση του χρήστη',
  `approval_pom` int UNSIGNED DEFAULT NULL COMMENT 'Ο κωδικός του διαχειριστή που ενεργοποίησε τον χρήστη',
  `approval_date` date DEFAULT NULL COMMENT 'Η ημερομηνία ενεργοποίησης του χρήστη',
  `last_modif_pom` int UNSIGNED DEFAULT NULL COMMENT 'Ο κωδικός του διαχειριστή που έκανε την τελευταία τροποποίηση στην κατάσταση του χρήστη',
  `last_modif_date` date DEFAULT NULL COMMENT 'Η ημερομηνία τελευταίας τροποποίησης στην κατάσταση του χρήστη',
  `username` varchar(25) NOT NULL COMMENT 'Το όνομα χρήστη',
  `password` varchar(8) NOT NULL COMMENT 'Ο κωδικός χρήστη',
  `firstname` varchar(25) NOT NULL COMMENT 'Το κύριο όνομα του χρήστη',
  `lastname` varchar(25) NOT NULL COMMENT 'Το επώνυμο του χρήστη',
  `address` varchar(255) DEFAULT NULL COMMENT 'Η πλήρης διεύθυνση του χρήστη',
  `email` varchar(45) NOT NULL COMMENT 'Το email του χρήστη',
  `telephone` varchar(10) DEFAULT NULL COMMENT 'Το τηλέφωνο του χρήστη'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Χρήστες (δημοπράτες και ενδιαφερόμενοι)';

--
-- Ευρετήρια και αυτόματη αρίθμηση για τον πίνακα `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id_UNIQUE` (`user_id`),
  MODIFY `user_id` int UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Ο κωδικός του χρήστη';

-- --------------------------------------------------------

--
-- Δομή του πίνακα`User_Status`
--
CREATE TABLE `User_Status` (
  `u_status_id` tinyint(1) UNSIGNED NOT NULL COMMENT 'Ο κωδικός της κατάστασης του χρήστη',
  `u_status_descr` varchar(255) NOT NULL COMMENT 'Η περιγραφή της κατάστασης του χρήστη'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Κατάσταση Χρήστη';

--
-- Ευρετήρια για τον πίνακα `User_Status`
--
ALTER TABLE `User_Status`
  ADD PRIMARY KEY (`u_status_id`),
  ADD UNIQUE KEY `u_status_id_UNIQUE` (`u_status_id`);

-- --------------------------------------------------------

--
-- Περιορισμοί για τον πίνακα `Auctions`
--
ALTER TABLE `Auctions`
  ADD CONSTRAINT `FK_owner_user_id` FOREIGN KEY (`owner`) REFERENCES `Users` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_a_status_a_status_id` FOREIGN KEY (`a_status`) REFERENCES `Auction_Status` (`a_status_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_type_a_type_id` FOREIGN KEY (`type`) REFERENCES `Auction_Type` (`a_type_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Περιορισμοί για τον πίνακα `Bids`
--
ALTER TABLE `Bids`
  ADD CONSTRAINT `FK_WhoDoes_user_id` FOREIGN KEY (`WhoDoes`) REFERENCES `Users` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Auction_auction_id` FOREIGN KEY (`Auction`) REFERENCES `Auctions` (`auction_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_b_status_b_status_id` FOREIGN KEY (`b_status`) REFERENCES `Bid_Status` (`b_status_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Περιορισμοί για τον πίνακα `KnockDown`
--
ALTER TABLE `KnockDown`
  ADD CONSTRAINT `FK_KnockDown_Bids_Id` FOREIGN KEY (`Bid_Id`) REFERENCES `Bids` (`Bid_Id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Περιορισμοί για τον πίνακα `Users`
--
ALTER TABLE `Users`
  ADD CONSTRAINT `FK_u_status_u_status_id` FOREIGN KEY (`u_status`) REFERENCES `User_Status` (`u_status_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_approval_pom_pom_id` FOREIGN KEY (`approval_pom`) REFERENCES `ProviderOrModerator` (`pom_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_last_modif_pom_pom_id` FOREIGN KEY (`last_modif_pom`) REFERENCES `ProviderOrModerator` (`pom_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

-- --------------------------------------------------------

--
-- Εγγραφές στον πίνακα 'Auction_Status`
-- 
  INSERT INTO `auction_status` (`a_status_id`, `a_status_descr`) VALUES ('1', 'Ενεργή Δημοπρασία'), ('2', 'Ολοκληρωμένη Δημοπρασία'), ('3', 'Ακυρωμένη Δημοπρασία');

--
-- Εγγραφές στον πίνακα 'Auction_Type`
--    
  INSERT INTO `auction_type` (`a_type_id`, `a_type_descr`) VALUES ('1', 'Πλειοδοτική Δημοπρασία'), ('2', 'Μειοδοτική Δημοπρασία');

--
-- Εγγραφές στον πίνακα 'Bid_Status`
--    
  INSERT INTO `bid_status` (`b_status_id`, `b_status_descr`) VALUES ('1', 'Αποδεκτό'), ('2', 'Μη αποδεκτό (παραβιάζει το βήμα)');
  INSERT INTO `bid_status` (`b_status_id`, `b_status_descr`) VALUES ('3', 'Μη αποδεκτό (εκτός χρόνου)'), ('4', 'Μη αποδεκτό (απροσδιόριστη ή άλλη αιτία)');

--
-- Εγγραφές στον πίνακα 'User_Status`
--    
  INSERT INTO `user_status` (`u_status_id`, `u_status_descr`) VALUES ('1', 'Δεν έχει γίνει ενεργοποίηση'), ('2', 'Προσωρινή απενεργοποίηση');
  INSERT INTO `user_status` (`u_status_id`, `u_status_descr`) VALUES ('3', 'Οριστική απενεργοποίηση'), ('4', 'Ενεργός');
  
--
-- Εγγραφές στον πίνακα 'ProviderOrModerator`
--  
  INSERT INTO `providerormoderator` (`pom_id`, `Username`, `Password`, `IsProvider`, `IsModerator`) VALUES ('1', 'amitsou', 'am12345678!', TRUE, TRUE);
  INSERT INTO `providerormoderator` (`pom_id`, `Username`, `Password`, `IsProvider`, `IsModerator`) VALUES ('2', 'knikolopoulos', 'kn12345678!', FALSE, TRUE);
  INSERT INTO `providerormoderator` (`pom_id`, `Username`, `Password`, `IsProvider`, `IsModerator`) VALUES ('3', 'rkarali', 'rk12345678!', FALSE, TRUE);
  
--
-- Εγγραφές στον πίνακα 'Users`
-- 
INSERT INTO `users` (`user_id`, `u_status`, `approval_pom`, `approval_date`, `last_modif_pom`, `last_modif_date`, `username`, `password`, `firstname`, `lastname`, `address`, `email`, `telephone`) VALUES
(1, 1, NULL, NULL, NULL, NULL, 'aandreou', 'aa123456', 'Ανδρέας', 'Ανδρέου', 'Αθήνα', 'aa@gmail.com', 6941234567),
(2, 1, NULL, NULL, NULL, NULL, 'vvasileiou', 'vv123456', 'Βασίλειος', 'Βασιελίου', 'Βέροια', 'vv@gmail.com', 6971234567),
(3, 1, NULL, NULL, NULL, NULL, 'ggeorgiou', 'gg123456', 'Γεώργιος', 'Γεωργίου', 'Γρεβενά', 'gg@gmail.com', 6931234567),
(4, 1, NULL, NULL, NULL, NULL, 'ddimitriou', 'dd123456', 'Δημήτριος', 'Δημητρίου', 'Δράμα', 'dd@gmail.com', 6991234567),
(5, 1, NULL, NULL, NULL, NULL, 'eevaggelou', 'ee123456', 'Ευάγγελος', 'Ευαγγέλου', 'Εύβοια', 'ee@gmail.com', 2101234567);