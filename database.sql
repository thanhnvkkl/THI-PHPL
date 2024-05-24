CREATE DATABASE phonebook;

USE phonebook;
CREATE TABLE contacts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    phone_name VARCHAR(255),
    phone_number VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO contacts (phone_name, phone_number) VALUES
('Thanh', '081234567890'),
('Hieu', '080123456789'),
('Anh', '080234567890'),
('Lan', '080345678901'),
('Tuan', '080456789012'),
('Trang', '080567890123'),
('Hong', '080678901234'),
('Thuy', '080789012345'),
('Thanh Nguyen', '080890123456'),
('Van', '080901234567');

