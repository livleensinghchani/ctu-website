CREATE TABLE school {
    id VARCHAR(255) PRIMARY KEY,
    name VARCHAR(255) NOT NULL
};

CREATE TABLE program {
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    specialization VARCHAR(255) NOT NULL,
    type VARCHAR(255) NOT NULL,
    semester_size INT(2) NOT NULL,
    FOREIGN KEY school REFERENCES school(id),
};