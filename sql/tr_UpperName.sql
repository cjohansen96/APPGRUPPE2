USE h18grdb2;
DROP TRIGGER IF EXISTS tr_UpperName_upd;
DELIMITER ::
CREATE TRIGGER tr_UpperName_upd
  BEFORE Update ON Customer
    FOR EACH ROW 
BEGIN
  SET NEW.First_Name = capitalize(NEW.First_Name);
  SET NEW.Last_Name = capitalize(NEW.Last_Name);
END::
DELIMITER ; 

USE h18grdb2;
DROP TRIGGER IF EXISTS tr_UpperName_ins;
DELIMITER ::
CREATE TRIGGER tr_UpperName_ins
  BEFORE INSERT ON Customer
    FOR EACH ROW 
BEGIN
  SET NEW.First_Name = capitalize(NEW.First_Name);
  SET NEW.Last_Name = capitalize(NEW.Last_Name);
END::
DELIMITER ; 

