--Backup
CREATE TABLE `curbackup` (
  `Track_Name` char(20) DEFAULT NULL,
  `Race_ID` varchar(20) NOT NULL,
  `Race_Date` date DEFAULT NULL,
  `Predicted_Forecast` char(20) DEFAULT NULL
)

--Cursor
DELIMITER $$
CREATE PROCEDURE curs()
   BEGIN
      DECLARE done INT DEFAULT 0;
      DECLARE raceid varchar(20);
      DECLARE trackname, predictedforecast CHAR(20);
      DECLARE racedate date;
      DECLARE cur CURSOR FOR SELECT * FROM race_schedule;
      DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;
      OPEN cur;
      label: LOOP
      FETCH cur INTO trackname, raceid, racedate, predictedforecast;
      INSERT INTO curbackup VALUES(trackname, raceid, racedate, predictedforecast);
      IF done = 1 THEN LEAVE label;
      END IF;
      END LOOP label;
      CLOSE cur;
   END;$$
DELIMITER ;

--
call curs;
SELECT * FROM curbackup;