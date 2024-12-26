--Join
SELECT Part_Name, ProjectNo, Status, Expected, Department_Name, Department_ID FROM projects NATURAL JOIN rd_departments;
SELECT Race_ID, Track_Name, Race_Date, Driver_1_Position,Driver_2_Position  FROM race_schedule NATURAL JOIN race_report;
SELECT Transaction_ID, Description, Incharge_ID, firstname, lastname FROM finances NATURAL JOIN personnel WHERE finances.Incharge_ID=personnel.personnel_id;
SELECT Department_Name, Department_ID, Manager_ID, firstname, lastname FROM rd_departments NATURAL JOIN personnel WHERE rd_departments.Manager_ID=personnel.personnel_id;

--Aggregate
SELECT Department_ID, Department Name, avg(Impact) as Avg_Impact from projects NATURAL JOIN rd_departments WHERE projects.Department_ID=rd_departments.Department_ID GROUP by Department_ID;
SELECT Department_ID, Department Name, count (ProjectNo) as Project_Count FROM projects NATURAL JOIN rd_departments GROUP BY Department_ID;
SELECT avg(Driver_1_Position) as Avg_Driver_1, avg(Driver_2_Position) as Avg_Driver_2 from race_report;
SELECT Part_Name, ProjectNo, Department_ID, max(Impact) as Max_Impact from projects GROUP BY Department_ID;

--Set Operations
(SELECT * FROM personnel where superior_id=1) UNION (SELECT FROM personnel where superior_id=9);
(SELECT * FROM projects where Status='Developing') UNION (SELECT * FROM projects where Status = 'Integrated');
(SELECT * FROM race_report where Driver_1_Position=1) INTERSECT (SELECT * FROM race_report where Driver_2_Position<=3);
(SELECT * FROM race_schedule where Predicted_Forecast='Clear') UNION (SELECT * FROM race_schedule where Predicted_Forecast = 'Rainy');