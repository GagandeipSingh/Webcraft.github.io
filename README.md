-> Database & Table Creation for Uploads.php

-- Host: localhost
-- Database: registration

CREATE DATABASE IF NOT EXISTS registration;
USE registration;

CREATE TABLE IF NOT EXISTS registration_data (
    id INT(11) NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    selected_plan VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    aemail VARCHAR(255) NOT NULL,
    phone VARCHAR(255) NOT NULL,
    aphone VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-> Database & Table Creation for process_form.php

-- Host: localhost
-- Database: messages

CREATE DATABASE IF NOT EXISTS messages;
USE messages;

CREATE TABLE IF NOT EXISTS form_data (
    id INT(11) NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    number INT(11) NOT NULL,
    message TEXT NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;