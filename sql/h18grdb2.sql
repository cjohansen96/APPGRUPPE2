-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 29. Apr, 2019 12:16 PM
-- Tjener-versjon: 5.7.24
-- PHP Version: 5.6.39-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `h18grdb2`
--

DELIMITER $$
--
-- Funsjoner
--
CREATE DEFINER=`h18gr2`@`%` FUNCTION `capitalize` (`s` VARCHAR(255)) RETURNS VARCHAR(255) CHARSET utf8 BEGIN
  declare c int;
  declare x varchar(255);
  declare y varchar(255);
  declare z varchar(255);

  set x = UPPER( SUBSTRING( s, 1, 1));
  set y = SUBSTR( s, 2);
  set c = instr( y, ' ');

  while c > 0
    do
      set z = SUBSTR( y, 1, c);
      set x = CONCAT( x, z);
      set z = UPPER( SUBSTR( y, c+1, 1));
      set x = CONCAT( x, z);
      set y = SUBSTR( y, c+2);
      set c = INSTR( y, ' ');     
  end while;
  set x = CONCAT(x, y);
  return x;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `Clothes`
--

CREATE TABLE `Clothes` (
  `IdClothes` int(11) NOT NULL,
  `Name` varchar(40) DEFAULT NULL,
  `Category` varchar(40) DEFAULT NULL,
  `Price` decimal(8,2) DEFAULT NULL,
  `Brand` varchar(40) DEFAULT NULL,
  `Gender` varchar(1) DEFAULT NULL,
  `Quantity` smallint(6) DEFAULT NULL,
  `Color` varchar(40) DEFAULT NULL,
  `Size` varchar(10) DEFAULT NULL,
  `ProductImage` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dataark for tabell `Clothes`
--

INSERT INTO `Clothes` (`IdClothes`, `Name`, `Category`, `Price`, `Brand`, `Gender`, `Quantity`, `Color`, `Size`, `ProductImage`) VALUES
(3, 'Exizt T-shirt', 'Tshirt', '10.00', 'Exizt', 'M', 20, 'Red', 'L', '1.PNG'),
(4, 'Plain T-shirt', 'Tshirt', '10.00', 'Exizt', 'M', 20, 'Red', 'M', '2.PNG'),
(5, 'Exizt T-shirt', 'Tshirt', '15.00', 'Exizt', 'M', 20, 'Blue', 'L', '3.PNG'),
(6, 'Exizt sweater', 'Sweater', '30.00', 'Exizt', 'M', 40, 'Blue', 'L', '11.PNG'),
(8, 'Exizt sweater', 'Sweater', '50.00', 'Exizt', 'F', 100, 'Grey', 'M', '19.PNG'),
(10, 'Jeans', 'Jeans', '40.00', 'Exizt', 'M', 30, 'Blue', 'L', '18.PNG'),
(11, 'Jeans', 'Jeans', '40.00', 'Vans', 'F', 30, 'Blue', 'M', '18.PNG'),
(12, 'Jeans', 'Jeans', '40.00', 'Exizt', 'M', 20, 'Blue', 'S', '18.PNG'),
(13, 'Jeans', 'Jeans', '40.00', 'Gizmo', 'M', 30, 'Blue', 'L', '18.PNG'),
(14, 'Jeans', 'Jeans', '40.00', 'Exizt', 'F', 30, 'Blue', 'M', '18.PNG'),
(15, 'Jeans', 'Jeans', '40.00', 'Levis', 'M', 20, 'Blue', 'S', '18.PNG'),
(16, 'Exizt T-shirt', 'Tshirt', '15.00', 'Exizt', 'F', 20, 'Blue', 'L', '9.PNG'),
(17, 'Plain T-shirt', 'Tshirt', '10.00', 'Exizt', 'F', 20, 'Grey', 'M', '5.PNG'),
(18, 'Exizt sweater', 'Sweater', '50.00', 'Exizt', 'M', 100, 'Blue', 'L', '7.PNG'),
(19, 'Exizt T-shirt', 'Tshirt', '5.00', 'Exizt', 'M', 200, 'White', 'S', '2.PNG'),
(20, 'Exizt T-shirt', 'Tshirt', '5.00', 'Exizt', 'M', 100, 'Grey', 'L', '5.PNG'),
(21, 'Plain T-shirt', 'Tshirt', '4.00', 'Vans', 'M', 70, 'Black', 'S', '4.PNG'),
(22, 'Shorts', 'Shorts', '10.00', 'Levis', 'M', 90, 'Blue', 'M', '14.PNG'),
(23, 'Shorts', 'Shorts', '10.00', 'Levis', 'F', 90, 'Blue', 'S', '13.PNG'),
(24, 'Shorts', 'Shorts', '8.00', 'Adidas', 'M', 50, 'Green', 'L', '15.PNG'),
(25, 'Shorts', 'Shorts', '8.00', 'Nike', 'F', 50, 'Black', 'M', '17.PNG'),
(26, 'Exizt sweater', 'Sweater', '15.00', 'Exizt', 'M', 200, 'Black', 'S', '3.PNG'),
(27, 'Exizt sweater', 'Sweater', '30.00', 'Exizt', 'M', 170, 'Black', 'L', '11.PNG'),
(28, 'Exizt sweater', 'Sweater', '40.00', 'Exizt', 'F', 140, 'Red', 'L', '19.PNG'),
(29, 'Exizt T-shirt', 'Tshirt', '30.00', 'Exizt', 'F', 160, 'Green', 'S', '9.PNG');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `Customer`
--

CREATE TABLE `Customer` (
  `IdCustomer` int(11) NOT NULL,
  `First_Name` varchar(40) DEFAULT NULL,
  `Last_Name` varchar(40) DEFAULT NULL,
  `Email` varchar(40) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggere `Customer`
--
DELIMITER $$
CREATE TRIGGER `tr_UpperName_ins` BEFORE INSERT ON `Customer` FOR EACH ROW BEGIN
  SET NEW.First_Name = capitalize(NEW.First_Name);
  SET NEW.Last_Name = capitalize(NEW.Last_Name);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_UpperName_upd` BEFORE UPDATE ON `Customer` FOR EACH ROW BEGIN
  SET NEW.First_Name = capitalize(NEW.First_Name);
  SET NEW.Last_Name = capitalize(NEW.Last_Name);
END
$$
DELIMITER ;

--
-- Tabellstruktur for tabell `CustomerScore`
--

CREATE TABLE `CustomerScore` (
  `IdUserScore` int(11) NOT NULL,
  `Score` int(11) DEFAULT NULL,
  `Category_IdCategory` int(11) NOT NULL,
  `Customer_IdCustomer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tabellstruktur for tabell `OrderLine`
--

CREATE TABLE `OrderLine` (
  `IdOrder` int(11) NOT NULL,
  `IdClothes` int(11) NOT NULL,
  `Quantity` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `Orders`
--

CREATE TABLE `Orders` (
  `IdOrder` int(11) NOT NULL,
  `IdCustomer` int(11) DEFAULT NULL,
  `Sum_Pris` decimal(8,2) DEFAULT NULL,
  `OrderDate` datetime DEFAULT NULL,
  `ShippedDate` datetime DEFAULT NULL,
  `ShipTo` varchar(255) DEFAULT NULL,
  `Total_price` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `QuizCategory`
--

CREATE TABLE `QuizCategory` (
  `IdCategory` int(11) NOT NULL,
  `Cat_Name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dataark for tabell `QuizCategory`
--

INSERT INTO `QuizCategory` (`IdCategory`, `Cat_Name`) VALUES
(1, 'Space'),
(2, 'Geography');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `QuizQuestion`
--

CREATE TABLE `QuizQuestion` (
  `IdQuestion` int(11) NOT NULL,
  `Question` varchar(255) NOT NULL,
  `Option 1` varchar(255) NOT NULL,
  `Option 2` varchar(255) NOT NULL,
  `Option 3` varchar(255) NOT NULL,
  `Option 4` varchar(255) NOT NULL,
  `CorrectAns` varchar(255) NOT NULL,
  `Category_IdCategory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dataark for tabell `QuizQuestion`
--

INSERT INTO `QuizQuestion` (`IdQuestion`, `Question`, `Option 1`, `Option 2`, `Option 3`, `Option 4`, `CorrectAns`, `Category_IdCategory`) VALUES
(1, 'What is the largest planet in our solar system?', 'Earth', 'Jupiter', 'Saturn', 'Mars', 'Jupiter', 1),
(2, 'Which planet is the hottest in our solar system?', 'Mars', 'Venus', 'Saturn', 'Neptune', 'Venus', 1),
(3, 'What is the capital of Bangladesh?', 'Khulna', 'Dhaka', 'Jamalpur', 'Rajshahi', 'Dhaka', 2),
(4, 'What is the name of earths biggest lake?', 'Lake Victoria', 'Lake Superior', 'Lake Huron', 'Caspian Sea', 'Caspian Sea', 2),
(5, 'What is the capital of Netherlands?', 'Amsterdam', 'Rotterdam', 'The Hague', 'Utrecht', 'Amsterdam', 2),
(6, 'What is the biggest ocean on earth?', 'Atlantic Ocean', 'Indian Ocean', 'Arctic Ocean', 'Pacific Ocean', 'Pacific Ocean', 2),
(7, 'What is the name of earths largest country?', 'USA', 'Canada', 'Russia', 'China', 'Russia', 2);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `Refere_Friend`
--

CREATE TABLE `Refere_Friend` (
  `refereId` int(11) NOT NULL,
  `IdCustomer` int(11) DEFAULT NULL,
  `Email` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tabellstruktur for tabell `Sale`
--

CREATE TABLE `Sale` (
  `IdSale` int(11) NOT NULL,
  `IdClothes` int(11) DEFAULT NULL,
  `Start_Date` date NOT NULL,
  `End_Date` date DEFAULT NULL,
  `New_Price` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dataark for tabell `Sale`
--

INSERT INTO `Sale` (`IdSale`, `IdClothes`, `Start_Date`, `End_Date`, `New_Price`) VALUES
(2, 3, '2019-04-10', '2019-04-30', '5.00'),
(3, 13, '2019-04-10', '2019-04-23', '15.00'),
(4, 4, '2019-04-11', '2019-04-29', '6.00'),
(5, 12, '2019-04-12', '2019-05-23', '9.00'),
(6, 15, '2019-04-12', '2019-05-31', '9.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Clothes`
--
ALTER TABLE `Clothes`
  ADD PRIMARY KEY (`IdClothes`);

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`IdCustomer`);

--
-- Indexes for table `CustomerScore`
--
ALTER TABLE `CustomerScore`
  ADD PRIMARY KEY (`IdUserScore`),
  ADD KEY `Category_IdCategory` (`Category_IdCategory`),
  ADD KEY `Customer_IdCustomer` (`Customer_IdCustomer`);

--
-- Indexes for table `OrderLine`
--
ALTER TABLE `OrderLine`
  ADD PRIMARY KEY (`IdOrder`,`IdClothes`),
  ADD KEY `IdClothes_FK` (`IdClothes`);

--
-- Indexes for table `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`IdOrder`),
  ADD KEY `IdCustomer` (`IdCustomer`);

--
-- Indexes for table `QuizCategory`
--
ALTER TABLE `QuizCategory`
  ADD PRIMARY KEY (`IdCategory`);

--
-- Indexes for table `QuizQuestion`
--
ALTER TABLE `QuizQuestion`
  ADD PRIMARY KEY (`IdQuestion`),
  ADD KEY `Category_IdCategory` (`Category_IdCategory`);

--
-- Indexes for table `Refere_Friend`
--
ALTER TABLE `Refere_Friend`
  ADD PRIMARY KEY (`refereId`),
  ADD KEY `IdCustomer` (`IdCustomer`);

--
-- Indexes for table `Sale`
--
ALTER TABLE `Sale`
  ADD PRIMARY KEY (`IdSale`),
  ADD KEY `IdClothes` (`IdClothes`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Clothes`
--
ALTER TABLE `Clothes`
  MODIFY `IdClothes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `Customer`
--
ALTER TABLE `Customer`
  MODIFY `IdCustomer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `CustomerScore`
--
ALTER TABLE `CustomerScore`
  MODIFY `IdUserScore` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `Orders`
--
ALTER TABLE `Orders`
  MODIFY `IdOrder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `QuizCategory`
--
ALTER TABLE `QuizCategory`
  MODIFY `IdCategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `QuizQuestion`
--
ALTER TABLE `QuizQuestion`
  MODIFY `IdQuestion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `Refere_Friend`
--
ALTER TABLE `Refere_Friend`
  MODIFY `refereId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `Sale`
--
ALTER TABLE `Sale`
  MODIFY `IdSale` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Begrensninger for dumpede tabeller
--

--
-- Begrensninger for tabell `CustomerScore`
--
ALTER TABLE `CustomerScore`
  ADD CONSTRAINT `CustomerScore_ibfk_1` FOREIGN KEY (`Category_IdCategory`) REFERENCES `QuizCategory` (`IdCategory`),
  ADD CONSTRAINT `CustomerScore_ibfk_2` FOREIGN KEY (`Customer_IdCustomer`) REFERENCES `Customer` (`IdCustomer`);

--
-- Begrensninger for tabell `OrderLine`
--
ALTER TABLE `OrderLine`
  ADD CONSTRAINT `IdClothes_FK` FOREIGN KEY (`IdClothes`) REFERENCES `Clothes` (`IdClothes`),
  ADD CONSTRAINT `IdOrder_FK` FOREIGN KEY (`IdOrder`) REFERENCES `Orders` (`IdOrder`);

--
-- Begrensninger for tabell `Orders`
--
ALTER TABLE `Orders`
  ADD CONSTRAINT `Orders_ibfk_1` FOREIGN KEY (`IdCustomer`) REFERENCES `Customer` (`IdCustomer`);

--
-- Begrensninger for tabell `QuizQuestion`
--
ALTER TABLE `QuizQuestion`
  ADD CONSTRAINT `QuizQuestion_ibfk_1` FOREIGN KEY (`Category_IdCategory`) REFERENCES `QuizCategory` (`IdCategory`);

--
-- Begrensninger for tabell `Refere_Friend`
--
ALTER TABLE `Refere_Friend`
  ADD CONSTRAINT `Refere_Friend_ibfk_1` FOREIGN KEY (`IdCustomer`) REFERENCES `Customer` (`IdCustomer`);

--
-- Begrensninger for tabell `Sale`
--
ALTER TABLE `Sale`
  ADD CONSTRAINT `Sale_ibfk_1` FOREIGN KEY (`IdClothes`) REFERENCES `Clothes` (`IdClothes`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
