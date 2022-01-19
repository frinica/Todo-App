CREATE DATABASE todoApp;

use todoApp;

CREATE TABLE todo (
    id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(20) NOT NULL,
    body VARCHAR(100) NOT NULL,
    checked TINYINT(1),
    PRIMARY KEY (id)
);