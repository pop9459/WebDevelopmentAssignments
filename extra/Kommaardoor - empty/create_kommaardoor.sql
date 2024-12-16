CREATE DATABASE IF NOT EXISTS kommaardoor;

USE kommaardoor;

CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    productname VARCHAR(255) NOT NULL,
    short_description VARCHAR(255),
    image_url VARCHAR(255)
);

-- Example
-- INSERT INTO producten (productname, short_description, image_url)
-- VALUES ('Product 1', 'Example product', 'https://voorbeeld.com/afbeelding1.jpg');


-- Example
-- INSERT INTO producten (productname, short_description, image_url)
-- VALUES ('Product 1', 'Example product', 'https://voorbeeld.com/afbeelding1.jpg');


CREATE TABLE IF NOT EXISTS administrators (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);