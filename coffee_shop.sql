DROP DATABASE IF EXISTS coffee_shop;

CREATE DATABASE coffee_shop;

USE coffee_shop;


CREATE TABLE CUSTOMER (
    customer_id INT PRIMARY KEY,
    phone_num VARCHAR(15),
    customer_name VARCHAR(100),
    customer_addr VARCHAR(255)
);


CREATE TABLE EMPLOYEE (
    employee_id INT PRIMARY KEY,
    employee_name VARCHAR(100),
    customer_id INT,
    FOREIGN KEY (customer_id) REFERENCES CUSTOMER(customer_id)
);


CREATE TABLE ROLES (
    employee_id INT,
    FOREIGN KEY (employee_id) REFERENCES EMPLOYEE(employee_id),
    pay DECIMAL(8, 2),
    cashier BOOLEAN,
    cleaner BOOLEAN,
    barista BOOLEAN
);


CREATE TABLE ORDERS (
    order_num INT PRIMARY KEY,
    customer_id INT,
    FOREIGN KEY (customer_id) REFERENCES CUSTOMER(customer_id),
    quantity INT,
    subtotal DECIMAL(8, 2)
);


CREATE TABLE DISTRIBUTOR (
    product_name VARCHAR(100) PRIMARY KEY,
    dist_shipping DECIMAL(8, 2),
    dist_name VARCHAR(100),
    dist_address VARCHAR(255)
);


CREATE TABLE PRODUCT (
    product_id INT PRIMARY KEY,
    product_name VARCHAR(100),
    customer_id INT,
    descriptions TEXT,
    size VARCHAR(20),
    price DECIMAL(8, 2),
    FOREIGN KEY (customer_id) REFERENCES CUSTOMER(customer_id),
    FOREIGN KEY (product_name) REFERENCES DISTRIBUTOR(product_name)
);

