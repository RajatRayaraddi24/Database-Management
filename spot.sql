--Function
select Department_ID, Department_Name, validatecap(Department_ID) as Validate, count(ProjectNo) as Project_Count from projects NATURAL JOIN rd_departments group by Department_ID;

--Procedure
call updateage();

--Trigger
INSERT INTO `rd_departments`(`Department_Name`, `Department_ID`, `Manager_ID`, `Manager_Start_Date`) VALUES ('Factory','5',NULL,NULL)

--Cursors
call curs;