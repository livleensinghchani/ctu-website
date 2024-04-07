-- @block School
CREATE TABLE school (
    id VARCHAR(255) PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

-- @block Program
CREATE TABLE  program (
    id VARCHAR(255) PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    specialization VARCHAR(255) NOT NULL,
    type VARCHAR(255) NOT NULL,
    semester_size INT(2) NOT NULL,
    school VARCHAR(255) NOT NULL,
    FOREIGN KEY (school) REFERENCES school(id)
);

-- @block Staff
CREATE TABLE staff (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    school VARCHAR(255) NOT NULL,
    FOREIGN KEY (school) REFERENCES school(id),
    type VARCHAR(255) NOT NULL,
    active TINYINT(1) NOT NULL,
    mobile INT(10) NOT NULL,
    email VARCHAR(255) NOT NULL
);

-- @block Class
CREATE TABLE class (
    id INT AUTO_INCREMENT PRIMARY KEY,
    program VARCHAR(255) NOT NULL,
    FOREIGN KEY (program) REFERENCES program(id),
    section TINYINT(2) NOT NULL,
    class_group VARCHAR(1) NOT NULL,
    active TINYINT(1) NOT NULL,
    semester INT(2) NOT NULL,
    batch INT(4) NOT NULL,
    mentor INT NOT NULL,
    FOREIGN KEY (mentor) REFERENCES staff(id),
    coordinator INT NOT NULL,
    FOREIGN KEY (coordinator) REFERENCES staff(id)
);

-- @block Student
CREATE TABLE student (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    active TINYINT(1) NOT NULL,
    class INT NOT NULL,
    FOREIGN KEY (class) REFERENCES class(id),
    mobile INT(10) NOT NULL,
    email VARCHAR(255) NOT NULL,
    nationality VARCHAR(255) NOT NULL,
    reporting_form TINYINT(1) DEFAULT NULL,
    no_dues_form TINYINT(1) DEFAULT NULL
);

-- @block Reporting Form
CREATE TABLE reporting_form (
    id INT AUTO_INCREMENT PRIMARY KEY,
    registration_number INT NOT NULL,
    FOREIGN KEY (registration_number) REFERENCES student(id),
    name VARCHAR(255) NOT NULL,
    class INT NOT NULL,
    FOREIGN KEY (class) REFERENCES class(id),
    mobile INT(10) NOT NULL,
    email VARCHAR(255) NOT NULL,
    program VARCHAR(255) NOT NULL,
    FOREIGN KEY (program) REFERENCES program(id),
    batch INT(4) NOT NULL,
    type VARCHAR(255) NOT NULL,
    school VARCHAR(255) NOT NULL,
    FOREIGN KEY (school) REFERENCES school(id),
    semester INT(2) NOT NULL,
    mode VARCHAR(255) NOT NULL,
    guardian VARCHAR(255) NOT NULL,
    guardian_mobile VARCHAR(255) NOT NULL,
    address TEXT NOT NULL,
    city VARCHAR(255) NOT NULL,
    zip_code INT(10) NOT NULL,
    state VARCHAR(255) NOT NULL,
    country VARCHAR(255) NOT NULL,
    proof INT(255) NOT NULL
);
    