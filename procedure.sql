DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateage`()
BEGIN
DECLARE x DATE;
SELECT sysdate() into x;
update personnel
SET age=year(x)-year(birthdate);
END$$
DELIMITER ;