CREATE TABLE school (
    id VARCHAR(255) PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE program (
    id VARCHAR(255) PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    specialization VARCHAR(255) NOT NULL,
    type VARCHAR(255) NOT NULL,
    semester_size INT(2) NOT NULL,
    FOREIGN KEY school REFERENCES school(id)
);

CREATE TABLE staff (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    FOREIGN KEY school REFERENCES school(id),
    type VARCHAR(255) NOT NULL,
    active TINYINT(1) NOT NULL,
    mobile INT(10) NOT NULL,
    email VARCHAR(255) NOT NULL
);

CREATE TABLE class (
    id INT AUTO_INCREMENT PRIMARY KEY,
    FOREIGN KEY program REFERENCES program(id),
    section TINYINT(2) NOT NULL,
    group VARCHAR(1) NOT NULL,
    active TINYINT(1) NOT NULL,
    semester INT(2) NOT NULL,
    batch INT(4) NOT NULL,
    FOREIGN KEY mentor REFERENCES staff(id),
    FOREIGN KEY coordinator REFERENCES staff(id)
);

CREATE TABLE student (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    active TINYINT(1) NOT NULL,
    FOREIGN KEY class REFERENCES class(id),
    mobile INT(10) NOT NULL,
    email VARCHAR(255) NOT NULL,
    nationality VARCHAR(255) NOT NULL,
    reporting_form TINYINT(1) DEFAULT NULL,
    no_dues_form TINYINT(1) DEFAULT NULL
);

CREATE TABLE reporting_form (
    id INT AUTO_INCREMENT PRIMARY KEY,
    FOREIGN KEY registration_number REFERENCES student(id),
    name VARCHAR(255) NOT NULL,
    FOREIGN KEY class REFERENCES class(id),
    mobile INT(10) NOT NULL,
    email VARCHAR(255) NOT NULL,
    FOREIGN KEY program REFERENCES program(id),
    batch INT(4) NOT NULL,
    type VARCHAR(255) NOT NULL,
    FOREIGN KEY school REFERENCES school(id),
    semester INT(2) NOT NULL,
    mode VARCHAR(255) NOT NULL,
    father VARCHAR(255) NOT NULL,
    father_mobile INT(10) NOT NULL,
    mother VARCHAR(255) NOT NULL,
    mother_mobile INT(10) NOT NULL,
    address TEXT NOT NULL,
    city VARCHAR(255) NOT NULL,
    zip_code INT(10) NOT NULL,
    state VARCHAR(255) NOT NULL,
    country VARCHAR(255) NOT NULL,
    proof INT(255) NOT NULL
);
    