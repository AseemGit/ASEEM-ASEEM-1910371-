-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 15, 2022 at 12:33 AM
-- Server version: 10.2.44-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;

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

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteCustomers` (IN `in_id` INT(11))  BEGIN
       DELETE FROM customers WHERE id=in_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteOrders` (IN `in_id` INT(11))  BEGIN
       DELETE FROM orders WHERE id=in_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteProducts` (IN `in_id` INT(11))  BEGIN
       DELETE FROM products WHERE id=in_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `searchOrders` (IN `in_order_date` DATE)  BEGIN
	if in_order_date is null then
		SELECT
             c.firstname,
             c.city,
             p.product_code,
             p.description,
			 o.quantity,
			 o.price,
			 o.subtotal,
			 o.tax_amount,
			 o.grand_total
         FROM orders o
         INNER JOIN customers c ON o.customerId = c.id
         INNER JOIN products p ON o.productId = p.id
         WHERE o.id!='' order by o.order_date_time desc;
	else
	SELECT
             c.firstname,
             c.city,
             p.product_code,
             p.description,
			 o.quantity,
			 o.price,
			 o.subtotal,
			 o.tax_amount,
			 o.grand_total
         FROM orders o
         INNER JOIN customers c ON o.customerId = c.id
         INNER JOIN products p ON o.productId = p.id
         WHERE DATE(o.order_date_time) = in_order_date;
	end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectCustomers` ()  BEGIN
       SELECT * FROM customers ORDER BY creation_date_time;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectonerowCustomers` (IN `in_id` INT(11))  BEGIN
       SELECT * FROM customers where id=in_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectonerowOrders` (IN `in_id` INT(11))  BEGIN
       SELECT * FROM orders where id=in_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectonerowProducts` (IN `in_id` INT(11))  BEGIN
       SELECT * FROM products where id=in_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectOrders` ()  BEGIN
       SELECT * FROM orders ORDER BY order_date_time;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectPassword` (IN `in_username` CHAR(15))  BEGIN
       SELECT password FROM customers where username=in_username;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectProducts` ()  BEGIN
       SELECT * FROM products ORDER BY creation_date_time;
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
(2, 'Smith', 'Thomas', '9400 GLACIER HWY', 'FAIRBANKS', '456465', 'smith', 'a66e44736e753d4533746ced572ca821', 'customerimage/smith.jpg', '2022-12-03 02:13:13', '2022-12-03 05:15:06'),
(3, 'John', 'Smith', 'STE. 10 BLDG 1', 'ANCHORAGE', '456456', 'john', '527bd5b5d689e2c32ae974c6229ff785', 'customerimage/john.png', '2022-12-03 02:13:13', '2022-12-03 05:15:06'),
(4, 'Williams', 'Lopez', 'SUITE 170', 'ANCHORAGE', '456746', 'williams', '44e7cdc8f1386a1820b02f504f38317d', 'customerimage/williams.jpg', '2022-12-03 02:13:13', '2022-12-03 05:15:06'),
(5, 'Brown1', 'Moore', '2131 S MCKENZIE ST.', 'FOLEY', '4556646', 'brown', '6f7e9ca1d5ce4c84b69d7793f4de8e23', 'customerimage/brown.png', '2022-12-03 02:13:13', '2022-12-03 02:13:13'),
(7, 'swaleha', 'parveen', 'test', 'jbp', '48546', 'swaleha', '202cb962ac59075b964b07152d234b70', '1670330926_team-2.jpg', '2022-12-06 12:36:38', '2022-12-06 12:48:46'),
(8, 'Shraddha', 'Pathak', 'test', 'Jabalpur', '482003', 'test123', '202cb962ac59075b964b07152d234b70', '1670331154_barelal.jpeg', '2022-12-06 12:52:34', '2022-12-06 12:52:34'),
(12, 'aman455', 'kaur', 'amana', 'aman', '111338t', 'aman', 'ccda1683d8c97f8f2dff2ea7d649b42c', '1670716764_download-(2).png', '2022-12-10 23:59:24', '2022-12-10 23:59:24'),
(13, 'aman', 'aman', 'Apartment 1\\r\\n480 Decari', 'Saint-Laurent', 'H4L 3K9', 'aman1', 'ccda1683d8c97f8f2dff2ea7d649b42c', '1670716793_download-(2).png', '2022-12-10 23:59:53', '2022-12-10 23:59:53'),
(14, 'shraddha', 'pathak', 'ts', 'ja', 'jj', 'hello', '5d41402abc4b2a76b9719d911017c592', '1670736974_rajbhan.jpg', '2022-12-11 05:36:14', '2022-12-11 05:36:14'),
(15, 'vipin', 'pathak', '123', '123', '123123', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1670821681_photo_2022-11-10_19-24-09.jpg', '2022-12-12 05:08:01', '2022-12-12 05:08:01'),
(16, 'Amaninder', 'Kaur22', 'Apartment 1\\\\\\\\r\\\\\\\\n480', 'Saint-Laurent', 'H4L 3K9', 'test2', '8ad8757baa8564dc136c1e07507f4a98', '1671077923_anul-removebg-preview.png', '2022-12-15 04:18:43', '2022-12-15 04:19:47');

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
(5, 1, 5, 2, 5.00, 10.00, 1.61, 11.61, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '2022-12-03 16:25:16'),
(6, 7, 2, 3, 17.00, 51.00, 6.99, 57.99, 'Contrary to popular belief, Lorem Ipsum is not simply random text', '2022-12-06 12:50:04'),
(7, 8, 2, 2, 17.00, 34.00, 4.66, 38.66, 'test', '2022-12-06 12:53:38');

-- --------------------------------------------------------

--
-- Stand-in structure for view `order_search`
-- (See below for the actual view)
--
CREATE TABLE `order_search` (
`firstname` char(20)
,`city` char(25)
,`product_code` char(12)
,`description` char(100)
,`quantity` int(11)
,`price` float(10,2)
,`subtotal` float(10,2)
,`tax_amount` float(10,2)
,`grand_total` float(10,2)
);

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
(2, '565-prd-test', 'It is a long established fact that a reader will be distracted by the readable content of a page whe', 17.00, NULL, '2022-12-03 15:57:00', '2022-12-03 15:57:00'),
(3, '74897-prd-te', 'It is a long established fact that a reader will be distracted by the readable content of a page whe', 15.00, 25.00, '2022-12-03 15:57:00', '2022-12-03 15:57:00'),
(4, '4568-prd-tes', 'It is a long established fact that a reader will be distracted by the readable content of a page whe', 55.00, NULL, '2022-12-03 15:57:00', '2022-12-03 15:57:00'),
(5, '4448-prd-tes', 'It is a long established fact that a reader will be distracted by the readable content of a page whe', 5.00, 40.00, '2022-12-03 15:57:00', '2022-12-03 15:57:00');

-- --------------------------------------------------------

--
-- Structure for view `order_search`
--
DROP TABLE IF EXISTS `order_search`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `order_search`  AS SELECT `c`.`firstname` AS `firstname`, `c`.`city` AS `city`, `p`.`product_code` AS `product_code`, `p`.`description` AS `description`, `o`.`quantity` AS `quantity`, `o`.`price` AS `price`, `o`.`subtotal` AS `subtotal`, `o`.`tax_amount` AS `tax_amount`, `o`.`grand_total` AS `grand_total` FROM ((`orders` `o` join `customers` `c` on(`o`.`customerId` = `c`.`id`)) join `products` `p` on(`o`.`productId` = `p`.`id`)) ORDER BY `o`.`order_date_time` DESC ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`,`product_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
