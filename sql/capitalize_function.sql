DROP FUNCTION IF EXISTS capitalize;
DELIMITER ::
CREATE FUNCTION `capitalize`(s varchar(255)) RETURNS varchar(255) 
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
END::