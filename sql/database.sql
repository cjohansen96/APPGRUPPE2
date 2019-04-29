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
