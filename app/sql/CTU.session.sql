-- @block STUDENT 
INSERT INTO student (username, password, name, program, section, classGroup, reportingStatus, semester, active, totalSemester) 
VALUES ('72311282', 'CHANI', 'Fake Chani', 'BSC-CS', '2', 'A', '0', '1', '1', '6');

-- @block Display student
SELECT * FROM student;

-- @block 
    



-- @block STAFF 
INSERT INTO staff (username, password, name, programAssigned, sectionAssigned)
VALUES ('CT0002', 'madamji', 'Silky', 'BCA-CS', '1');

-- @block Display staff
SELECT * FROM staff;