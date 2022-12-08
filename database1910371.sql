-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 08, 2022 at 10:12 PM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database1910371`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `addCustomers` (IN `in_id` INT(11), IN `in_firstname` CHAR(20), IN `in_lastname` CHAR(20), IN `in_address` CHAR(25), IN `in_city` CHAR(25), IN `in_postalcode` CHAR(7), IN `in_username` CHAR(15), IN `in_password` CHAR(255), IN `in_customer_picture` CHAR(255), IN `in_creation_date_time` DATETIME, IN `in_modification_date_time` DATETIME)  BEGIN
       INSERT INTO customers(firstname, lastname, address, city, postalcode, username, password, customer_picture, creation_date_time, modification_date_time) 
         VALUES (in_firstname, in_lastname, in_address, in_city, in_postalcode, in_username, in_password, in_customer_picture, in_creation_date_time, in_modification_date_time);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addOrders` (IN `in_id` INT(11), IN `in_customerId` INT(11), IN `in_productId` INT(11), IN `in_quantity` INT(11), IN `in_price` FLOAT(10,2), IN `in_subtotal` FLOAT(10,2), IN `in_tax_amount` FLOAT(10,2), IN `in_grand_total` FLOAT(10,2), IN `in_comments` CHAR(200), IN `in_order_date_time` DATETIME)  BEGIN
       INSERT INTO orders(customerId, productId, quantity, price, subtotal, tax_amount, grand_total, comments, order_date_time) 
         VALUES (in_customerId, in_productId, in_quantity, in_price, in_subtotal, in_tax_amount, in_grand_total, in_comments, in_order_date_time);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addProducts` (IN `in_id` INT(11), IN `in_product_code` CHAR(12), IN `in_description` CHAR(100), IN `in_retail_price` FLOAT(10,2), IN `in_cost_price` FLOAT(10,2), IN `in_creation_date_time` DATETIME, IN `in_modification_date_time` DATETIME)  BEGIN
       INSERT INTO products(product_code, description, retail_price, cost_price, creation_date_time, modification_date_time) 
         VALUES (in_product_code, in_description, in_retail_price, in_cost_price, in_creation_date_time, in_modification_date_time);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteCustomers` (IN `in_id` INT(11), IN `in_firstname` CHAR(20), IN `in_lastname` CHAR(20), IN `in_address` CHAR(25), IN `in_city` CHAR(25), IN `in_postalcode` CHAR(7), IN `in_username` CHAR(15), IN `in_password` CHAR(255), IN `in_customer_picture` CHAR(255), IN `in_creation_date_time` DATETIME, IN `in_modification_date_time` DATETIME)  BEGIN
       DELETE FROM customers WHERE id=in_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteProducts` (IN `in_id` INT(11), IN `in_firstname` CHAR(20), IN `in_lastname` CHAR(20), IN `in_address` CHAR(25), IN `in_city` CHAR(25), IN `in_postalcode` CHAR(7), IN `in_username` CHAR(15), IN `in_password` CHAR(255), IN `in_customer_picture` CHAR(255), IN `in_creation_date_time` DATETIME, IN `in_modification_date_time` DATETIME)  BEGIN
       DELETE FROM products WHERE id=in_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectCustomers` (IN `in_id` INT(11), IN `in_firstname` CHAR(20), IN `in_lastname` CHAR(20), IN `in_address` CHAR(25), IN `in_city` CHAR(25), IN `in_postalcode` CHAR(7), IN `in_username` CHAR(15), IN `in_password` CHAR(255), IN `in_customer_picture` CHAR(255), IN `in_creation_date_time` DATETIME, IN `in_modification_date_time` DATETIME)  BEGIN
       SELECT * FROM customers;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectonerowCustomers` (IN `in_id` INT(11), IN `in_firstname` CHAR(20), IN `in_lastname` CHAR(20), IN `in_address` CHAR(25), IN `in_city` CHAR(25), IN `in_postalcode` CHAR(7), IN `in_username` CHAR(15), IN `in_password` CHAR(255), IN `in_customer_picture` CHAR(255), IN `in_creation_date_time` DATETIME, IN `in_modification_date_time` DATETIME)  BEGIN
       SELECT * FROM customers where id=in_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectonerowProducts` (IN `in_id` INT(11), IN `in_product_code` CHAR(12), IN `in_description` CHAR(100), IN `in_retail_price` FLOAT(10,2), IN `in_cost_price` FLOAT(10,2), IN `in_creation_date_time` DATETIME, IN `in_modification_date_time` DATETIME)  BEGIN
       SELECT * FROM products where id=in_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectOrders` (IN `in_id` INT(11), IN `in_customerId` INT(11), IN `in_productId` INT(11), IN `in_quantity` INT(11), IN `in_price` FLOAT(10,2), IN `in_subtotal` FLOAT(10,2), IN `in_tax_amount` FLOAT(10,2), IN `in_grand_total` FLOAT(10,2), IN `in_comments` CHAR(200), IN `in_order_date_time` DATETIME)  BEGIN
       SELECT * FROM orders;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectProducts` (IN `in_id` INT(11), IN `in_product_code` CHAR(12), IN `in_description` CHAR(100), IN `in_retail_price` FLOAT(10,2), IN `in_cost_price` FLOAT(10,2), IN `in_creation_date_time` DATETIME, IN `in_modification_date_time` DATETIME)  BEGIN
       SELECT * FROM products;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateCustomers` (IN `in_id` INT(11), IN `in_firstname` CHAR(20), IN `in_lastname` CHAR(20), IN `in_address` CHAR(25), IN `in_city` CHAR(25), IN `in_postalcode` CHAR(7), IN `in_username` CHAR(15), IN `in_password` CHAR(255), IN `in_customer_picture` CHAR(255), IN `in_creation_date_time` DATETIME, IN `in_modification_date_time` DATETIME)  BEGIN
       UPDATE customers 
         SET firstname = in_firstname, 
             lastname = in_lastname, 
             address = in_address,
			 city = in_city,
			 postalcode = in_postalcode,
			 username = in_username,
			 password = in_password,
			 customer_picture = in_customer_picture, 
             modification_date_time       = in_modification_date_time 
         WHERE id = in_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateOrders` (IN `in_id` INT(11), IN `in_customerId` INT(11), IN `in_productId` INT(11), IN `in_quantity` INT(11), IN `in_price` FLOAT(10,2), IN `in_subtotal` FLOAT(10,2), IN `in_tax_amount` FLOAT(10,2), IN `in_grand_total` FLOAT(10,2), IN `in_comments` CHAR(200), IN `in_order_date_time` DATETIME)  BEGIN
       UPDATE orders 
         SET customerId = in_customerId, 
             productId = in_productId, 
             quantity = in_quantity,
			 price = in_price,
			 subtotal = in_subtotal,
			 tax_amount = in_tax_amount,
			 grand_total = in_grand_total,
			 comments = in_comments,
             order_date_time       = in_order_date_time 
         WHERE id = in_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateProducts` (IN `in_id` INT(11), IN `in_product_code` CHAR(12), IN `in_description` CHAR(100), IN `in_retail_price` FLOAT(10,2), IN `in_cost_price` FLOAT(10,2), IN `in_creation_date_time` DATETIME, IN `in_modification_date_time` DATETIME)  BEGIN
       UPDATE products 
         SET product_code = in_product_code, 
             description = in_description, 
             retail_price = in_retail_price,
			 cost_price = in_cost_price,
             modification_date_time       = in_modification_date_time 
         WHERE id = in_id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `firstname` char(20) NOT NULL,
  `lastname` char(20) NOT NULL,
  `address` char(25) NOT NULL,
  `city` char(25) NOT NULL,
  `postalcode` char(7) NOT NULL,
  `username` char(15) NOT NULL,
  `password` char(255) NOT NULL,
  `customer_picture` char(255) NOT NULL,
  `creation_date_time` datetime NOT NULL,
  `modification_date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `firstname`, `lastname`, `address`, `city`, `postalcode`, `username`, `password`, `customer_picture`, `creation_date_time`, `modification_date_time`) VALUES
(1, 'Michael', 'Thomas', '356 OLD STEESE HWY', 'FAIRBANKS', '455646', 'michael', '0acf4539a14b3aa27deeb4cbdf6e989f', 'customerimage/michael.jpg', '2022-12-03 02:13:13', '2022-12-03 05:15:06'),
(3, 'John', 'Smith', 'STE. 10 BLDG 1', 'ANCHORAGE', '456456', 'john', '527bd5b5d689e2c32ae974c6229ff785', 'customerimage/john.png', '2022-12-03 02:13:13', '2022-12-03 05:15:06'),
(4, 'Williams', 'Lopez', 'SUITE 170', 'ANCHORAGE', '456746', 'williams', '44e7cdc8f1386a1820b02f504f38317d', 'customerimage/williams.jpg', '2022-12-03 02:13:13', '2022-12-03 05:15:06'),
(5, 'Brown1', 'Moore', '2131 S MCKENZIE ST.', 'FOLEY', '4556646', 'brown', '6f7e9ca1d5ce4c84b69d7793f4de8e23', 'customerimage/brown.png', '2022-12-03 02:13:13', '2022-12-03 02:13:13');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float(10,2) NOT NULL,
  `subtotal` float(10,2) NOT NULL,
  `tax_amount` float(10,2) NOT NULL,
  `grand_total` float(10,2) NOT NULL,
  `comments` char(200) DEFAULT NULL,
  `order_date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customerId`, `productId`, `quantity`, `price`, `subtotal`, `tax_amount`, `grand_total`, `comments`, `order_date_time`) VALUES
(1, 1, 2, 2, 17.00, 34.00, 5.47, 39.40, NULL, '2022-12-03 16:19:57'),
(2, 2, 4, 5, 55.00, 275.00, 44.27, 319.27, 'It is a long established', '2022-12-03 16:21:45'),
(3, 4, 3, 4, 15.00, 60.00, 9.66, 69.66, NULL, '2022-12-04 16:22:50'),
(4, 4, 4, 4, 55.00, 220.00, 35.42, 255.42, NULL, '2022-12-03 16:23:46'),
(5, 4, 3, 4, 15.00, 60.00, 9.66, 69.66, 'It is a long established', '2022-12-05 02:13:13');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_code` char(12) NOT NULL,
  `description` char(100) NOT NULL,
  `retail_price` float(10,2) NOT NULL,
  `cost_price` float(10,2) DEFAULT NULL,
  `creation_date_time` datetime NOT NULL,
  `modification_date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `description`, `retail_price`, `cost_price`, `creation_date_time`, `modification_date_time`) VALUES
(1, '438-prd-test', 'It is a long established fact that a reader will be distracted by the readable content of a page whe', 15.00, 20.00, '2022-12-03 15:57:00', '2022-12-03 15:57:00'),
(3, '74897-prd-te', 'It is a long established fact that a reader will be distracted by the readable content of a page whe', 15.00, 25.00, '2022-12-03 15:57:00', '2022-12-03 15:57:00'),
(4, '4568-prd-tes', 'It is a long established fact that a reader will be distracted by the readable content of a page whe', 55.00, NULL, '2022-12-03 15:57:00', '2022-12-03 15:57:00'),
(5, '565-prd-test', 'It is a long established', 66.00, 55.00, '2022-12-03 15:57:00', '2022-12-05 02:13:13');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
