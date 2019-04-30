-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema h18grdb2
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema h18grdb2
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `h18grdb2` DEFAULT CHARACTER SET utf8 ;
USE `h18grdb2` ;

-- -----------------------------------------------------
-- Table `h18grdb2`.`Clothes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `h18grdb2`.`Clothes` (
  `IdClothes` INT(11) NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(40) NULL DEFAULT NULL,
  `Category` VARCHAR(40) NULL DEFAULT NULL,
  `Price` DECIMAL(8,2) NULL DEFAULT NULL,
  `Brand` VARCHAR(40) NULL DEFAULT NULL,
  `Gender` VARCHAR(1) NULL DEFAULT NULL,
  `Quantity` SMALLINT(6) NULL DEFAULT NULL,
  `Color` VARCHAR(40) NULL DEFAULT NULL,
  `Size` VARCHAR(10) NULL DEFAULT NULL,
  `ProductImage` VARCHAR(40) NULL DEFAULT NULL,
  PRIMARY KEY (`IdClothes`))
ENGINE = InnoDB
AUTO_INCREMENT = 30
DEFAULT CHARACTER SET = utf8;


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



-- -----------------------------------------------------
-- Table `h18grdb2`.`Customer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `h18grdb2`.`Customer` (
  `IdCustomer` INT(11) NOT NULL AUTO_INCREMENT,
  `First_Name` VARCHAR(40) NULL DEFAULT NULL,
  `Last_Name` VARCHAR(40) NULL DEFAULT NULL,
  `Email` VARCHAR(40) NULL DEFAULT NULL,
  `Phone` VARCHAR(20) NULL DEFAULT NULL,
  `Password` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`IdCustomer`))
ENGINE = InnoDB
AUTO_INCREMENT = 56
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `h18grdb2`.`QuizCategory`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `h18grdb2`.`QuizCategory` (
  `IdCategory` INT(11) NOT NULL AUTO_INCREMENT,
  `Cat_Name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`IdCategory`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;

INSERT INTO `QuizCategory` (`IdCategory`, `Cat_Name`) VALUES
(1, 'Space'),
(2, 'Geography');


-- -----------------------------------------------------
-- Table `h18grdb2`.`CustomerScore`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `h18grdb2`.`CustomerScore` (
  `IdUserScore` INT(11) NOT NULL AUTO_INCREMENT,
  `Score` INT(11) NULL DEFAULT NULL,
  `Category_IdCategory` INT(11) NOT NULL,
  `Customer_IdCustomer` INT(11) NOT NULL,
  PRIMARY KEY (`IdUserScore`),
  INDEX `Category_IdCategory` (`Category_IdCategory` ASC),
  INDEX `Customer_IdCustomer` (`Customer_IdCustomer` ASC),
  CONSTRAINT `CustomerScore_ibfk_1`
    FOREIGN KEY (`Category_IdCategory`)
    REFERENCES `h18grdb2`.`QuizCategory` (`IdCategory`),
  CONSTRAINT `CustomerScore_ibfk_2`
    FOREIGN KEY (`Customer_IdCustomer`)
    REFERENCES `h18grdb2`.`Customer` (`IdCustomer`))
ENGINE = InnoDB
AUTO_INCREMENT = 20
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `h18grdb2`.`Orders`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `h18grdb2`.`Orders` (
  `IdOrder` INT(11) NOT NULL AUTO_INCREMENT,
  `IdCustomer` INT(11) NULL DEFAULT NULL,
  `Sum_Pris` DECIMAL(8,2) NULL DEFAULT NULL,
  `OrderDate` DATETIME NULL DEFAULT NULL,
  `ShippedDate` DATETIME NULL DEFAULT NULL,
  `ShipTo` VARCHAR(255) NULL DEFAULT NULL,
  `Total_price` DECIMAL(8,2) NULL DEFAULT NULL,
  PRIMARY KEY (`IdOrder`),
  INDEX `IdCustomer` (`IdCustomer` ASC),
  CONSTRAINT `Orders_ibfk_1`
    FOREIGN KEY (`IdCustomer`)
    REFERENCES `h18grdb2`.`Customer` (`IdCustomer`))
ENGINE = InnoDB
AUTO_INCREMENT = 19
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `h18grdb2`.`OrderLine`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `h18grdb2`.`OrderLine` (
  `IdOrder` INT(11) NOT NULL,
  `IdClothes` INT(11) NOT NULL,
  `Quantity` SMALLINT(6) NOT NULL,
  PRIMARY KEY (`IdOrder`, `IdClothes`),
  INDEX `IdClothes_FK` (`IdClothes` ASC),
  CONSTRAINT `IdClothes_FK`
    FOREIGN KEY (`IdClothes`)
    REFERENCES `h18grdb2`.`Clothes` (`IdClothes`),
  CONSTRAINT `IdOrder_FK`
    FOREIGN KEY (`IdOrder`)
    REFERENCES `h18grdb2`.`Orders` (`IdOrder`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `h18grdb2`.`QuizQuestion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `h18grdb2`.`QuizQuestion` (
  `IdQuestion` INT(11) NOT NULL AUTO_INCREMENT,
  `Question` VARCHAR(255) NOT NULL,
  `Option 1` VARCHAR(255) NOT NULL,
  `Option 2` VARCHAR(255) NOT NULL,
  `Option 3` VARCHAR(255) NOT NULL,
  `Option 4` VARCHAR(255) NOT NULL,
  `CorrectAns` VARCHAR(255) NOT NULL,
  `Category_IdCategory` INT(11) NOT NULL,
  PRIMARY KEY (`IdQuestion`),
  INDEX `Category_IdCategory` (`Category_IdCategory` ASC),
  CONSTRAINT `QuizQuestion_ibfk_1`
    FOREIGN KEY (`Category_IdCategory`)
    REFERENCES `h18grdb2`.`QuizCategory` (`IdCategory`))
ENGINE = InnoDB
AUTO_INCREMENT = 13
DEFAULT CHARACTER SET = utf8;

INSERT INTO `QuizQuestion` (`IdQuestion`, `Question`, `Option 1`, `Option 2`, `Option 3`, `Option 4`, `CorrectAns`, `Category_IdCategory`) VALUES
(1, 'What is the largest planet in our solar system?', 'Earth', 'Jupiter', 'Saturn', 'Mars', 'Jupiter', 1),
(2, 'Which planet is the hottest in our solar system?', 'Mars', 'Venus', 'Saturn', 'Neptune', 'Venus', 1),
(3, 'What is the capital of Bangladesh?', 'Khulna', 'Dhaka', 'Jamalpur', 'Rajshahi', 'Dhaka', 2),
(4, 'What is the name of earths biggest lake?', 'Lake Victoria', 'Lake Superior', 'Lake Huron', 'Caspian Sea', 'Caspian Sea', 2),
(5, 'What is the capital of Netherlands?', 'Amsterdam', 'Rotterdam', 'The Hague', 'Utrecht', 'Amsterdam', 2),
(6, 'What is the biggest ocean on earth?', 'Atlantic Ocean', 'Indian Ocean', 'Arctic Ocean', 'Pacific Ocean', 'Pacific Ocean', 2),
(7, 'What is the name of earths largest country?', 'USA', 'Canada', 'Russia', 'China', 'Russia', 2);


-- -----------------------------------------------------
-- Table `h18grdb2`.`Refere_Friend`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `h18grdb2`.`Refere_Friend` (
  `refereId` INT(11) NOT NULL AUTO_INCREMENT,
  `IdCustomer` INT(11) NULL DEFAULT NULL,
  `Email` VARCHAR(40) NULL DEFAULT NULL,
  PRIMARY KEY (`refereId`),
  INDEX `IdCustomer` (`IdCustomer` ASC),
  CONSTRAINT `Refere_Friend_ibfk_1`
    FOREIGN KEY (`IdCustomer`)
    REFERENCES `h18grdb2`.`Customer` (`IdCustomer`))
ENGINE = InnoDB
AUTO_INCREMENT = 17
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `h18grdb2`.`Sale`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `h18grdb2`.`Sale` (
  `IdSale` INT(11) NOT NULL AUTO_INCREMENT,
  `IdClothes` INT(11) NULL DEFAULT NULL,
  `Start_Date` DATE NOT NULL,
  `End_Date` DATE NULL DEFAULT NULL,
  `New_Price` DECIMAL(8,2) NULL DEFAULT NULL,
  PRIMARY KEY (`IdSale`),
  INDEX `IdClothes` (`IdClothes` ASC),
  CONSTRAINT `Sale_ibfk_1`
    FOREIGN KEY (`IdClothes`)
    REFERENCES `h18grdb2`.`Clothes` (`IdClothes`))
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8;

INSERT INTO `Sale` (`IdSale`, `IdClothes`, `Start_Date`, `End_Date`, `New_Price`) VALUES
(2, 3, '2019-04-10', '2019-04-30', '5.00'),
(3, 13, '2019-04-10', '2019-04-23', '15.00'),
(4, 4, '2019-04-11', '2019-04-29', '6.00'),
(5, 12, '2019-04-12', '2019-05-23', '9.00'),
(6, 15, '2019-04-12', '2019-05-31', '9.00');


USE `h18grdb2` ;

-- -----------------------------------------------------
-- function capitalize
-- -----------------------------------------------------

DELIMITER $$
USE `h18grdb2`$$
CREATE DEFINER=`h18gr2`@`%` FUNCTION `capitalize`(s varchar(255)) RETURNS varchar(255) CHARSET utf8
BEGIN
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
USE `h18grdb2`;

DELIMITER $$
USE `h18grdb2`$$
CREATE
DEFINER=`h18gr2`@`%`
TRIGGER `h18grdb2`.`tr_UpperName_ins`
BEFORE INSERT ON `h18grdb2`.`Customer`
FOR EACH ROW
BEGIN
  SET NEW.First_Name = capitalize(NEW.First_Name);
  SET NEW.Last_Name = capitalize(NEW.Last_Name);
END$$

USE `h18grdb2`$$
CREATE
DEFINER=`h18gr2`@`%`
TRIGGER `h18grdb2`.`tr_UpperName_upd`
BEFORE UPDATE ON `h18grdb2`.`Customer`
FOR EACH ROW
BEGIN
  SET NEW.First_Name = capitalize(NEW.First_Name);
  SET NEW.Last_Name = capitalize(NEW.Last_Name);
END$$


DELIMITER ;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
