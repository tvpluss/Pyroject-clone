-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 28, 2021 at 08:27 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web2-db-v1`
--
CREATE DATABASE IF NOT EXISTS `web2-db-v1` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `web2-db-v1`;

-- --------------------------------------------------------

--
-- Table structure for table `buying_history`
--

DROP TABLE IF EXISTS `buying_history`;
CREATE TABLE `buying_history` (
  `ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Order_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `buying_history`
--

INSERT INTO `buying_history` (`ID`, `User_ID`, `Order_ID`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`ID`, `User_ID`) VALUES
(6, 1),
(7, 2),
(8, 3),
(9, 4),
(10, 5),
(11, 6),
(12, 7);

-- --------------------------------------------------------

--
-- Table structure for table `cart_item_list`
--

DROP TABLE IF EXISTS `cart_item_list`;
CREATE TABLE `cart_item_list` (
  `cart_ID` int(11) NOT NULL,
  `product_ID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart_item_list`
--

INSERT INTO `cart_item_list` (`cart_ID`, `product_ID`, `quantity`) VALUES
(6, 1, 1),
(6, 6, 4),
(7, 4, 3),
(7, 7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `catalog`
--

DROP TABLE IF EXISTS `catalog`;
CREATE TABLE `catalog` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Product_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `catalog`
--

INSERT INTO `catalog` (`ID`, `Name`, `Product_ID`) VALUES
(1, '4G MODULE', 1),
(2, 'PROTOCOL CONVERTER MODULE', 1),
(3, 'PROTOCOL CONVERTER MODULE', 2),
(4, '4G MODULE', 3),
(5, 'ANALOG ACQUISITION MODULE', 4),
(6, 'IOT GATEWAY', 5),
(7, 'IOT GATEWAY', 6),
(8, 'DIGITAL INPUT OUTPUT MODULE', 7),
(9, 'ANALOG ACQUISITION MODULE', 8);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Telephone` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Message_content` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `ID` int(11) NOT NULL,
  `Title` mediumtext NOT NULL,
  `Author` varchar(255) NOT NULL,
  `Post_Date` date NOT NULL,
  `Content` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE `order_details` (
  `ID` int(11) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Last_Name` varchar(255) NOT NULL,
  `First_name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Telephone` int(11) NOT NULL,
  `Street_address` varchar(255) NOT NULL,
  `Postcode_ZIP` int(11) DEFAULT NULL,
  `Town_City` varchar(255) NOT NULL,
  `Created` date NOT NULL,
  `Account` bigint(255) NOT NULL,
  `Bank_Name` varchar(255) NOT NULL,
  `Note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`ID`, `Status`, `User_ID`, `Last_Name`, `First_name`, `Email`, `Telephone`, `Street_address`, `Postcode_ZIP`, `Town_City`, `Created`, `Account`, `Bank_Name`, `Note`) VALUES
(1, 'Thành công', 1, 'Nguyễn Thị', 'Trang', 'ntrang123@gmail.com', 123456789, '58, Phạm Văn Đồng, quận Bình Thạnh', NULL, 'TP.Hồ Chí Minh', '2021-11-15', 111222444666888, 'OCB', NULL),
(2, 'Chờ xác nhận', 2, 'Đỗ Nhật', 'Hoàng', 'hoangdo7789@gmail.com', 326789562, '125/26/8, Lương Định Của, Phường 2, Quận 4', NULL, 'Hồ Chí Minh', '2021-11-15', 225303569503256, 'ACB', NULL),
(4, 'Đã xác nhận', 2, 'Đỗ Nhật', 'Hoàng', 'hoangdo7789@gmail.com', 326789562, '125/26/8, Lương Định Của, phường 2, quận 4', NULL, 'Thành phố Hồ Chí Minh', '2021-11-07', 332659783236, 'BIDV', NULL);

--
-- Triggers `order_details`
--
DROP TRIGGER IF EXISTS `after_order_details_insert`;
DELIMITER $$
CREATE TRIGGER `after_order_details_insert` AFTER INSERT ON `order_details` FOR EACH ROW INSERT INTO buying_history(buying_history.User_ID, buying_history.Order_ID) VALUES (NEW.User_ID, NEW.ID)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `ID` int(11) NOT NULL,
  `Nane` varchar(1000) DEFAULT NULL,
  `Picture` mediumtext DEFAULT NULL,
  `Quantity` int(11) NOT NULL,
  `Buy_price` int(11) NOT NULL,
  `Sell_price` int(11) NOT NULL,
  `Description` mediumtext DEFAULT NULL,
  `Last_modified_day` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ID`, `Nane`, `Picture`, `Quantity`, `Buy_price`, `Sell_price`, `Description`, `Last_modified_day`) VALUES
(1, 'Pyriot 4G Relay Module', 'https://pyroject.com/wp-content/uploads/2021/09/MG_1084-150x150.webp', 100, 1000000, 1850000, 'Pyriot 4G Relay Module cung cấp khả năng điều khiển từ xa đồng loạt nhiều relay. Kết nối internet thông qua mạng di động 4G, giúp thực hiện giao tiếp với Cloud qua MQTT/HTTP. Được sử dụng để xây dựng hệ thống điều khiển và thu thập trạng thái relay.\r\nCấu hình qua giao diện đồ họa được nhúng trên thiết bị.', '2021-11-15'),
(2, 'Pyriot Convert Module RS485 – TCP/IP', 'https://pyroject.com/wp-content/uploads/2020/10/Picture9-600x535.jpg', 50, 1000000, 1500000, 'Pyriot – Convert Module có khả năng chuyển đổi tín hiệu giữa RS485 và Ethernet( qua cổng RJ45). Sản phẩm hỗ trợ chuyển nhiều giao thức như: Modbus RTU RS485 – Modbus RTU TCP, TCP server – RS485, TCP client – RS485, Websocket server – RS485,…', '2021-11-15'),
(3, 'Pyriot 4G Module – Quectel', 'https://pyroject.com/wp-content/uploads/2021/09/MG_0778-600x400.webp', 0, 2000000, 3250000, 'Pyriot 4G Module cung cấp khả năng kết nối internet thông qua mạng di động 4G, giúp thực hiện giao tiếp với Cloud qua MQTT/HTTP. Được sử dụng để chuyển đổi dữ liệu, điều khiển hoặc giao tiếp với thiết bị khác.\r\n\r\nCấu hình qua giao diện đồ họa được nhúng trên thiết bị.', '2021-11-15'),
(4, 'Pyriot AD Module', 'https://pyroject.com/wp-content/uploads/2020/10/Picture2-600x535.jpg', 25, 400000, 800000, 'Pyriot – AD Module cung cấp các ngõ vào analog với chức năng đọc các tín hiệu dòng điện (0-20mA, 4-20mA), tín hiệu điện áp (0-5V, 0-10V) và sử dụng giao thức Modbus RTU thông qua đường truyền vật lý RS485 để trao đổi dữ liệu với PLC, HMI, Controller', '2021-11-15'),
(5, 'Pyriot Industrial Edge Gateway', 'https://pyroject.com/wp-content/uploads/2021/07/Screenshot-2021-07-15-224621-600x390.webp', 30, 7000000, 8900000, 'Pyriot Industrial Edge Gateway là các máy tính công nghiệp chạy phần mềm của Pyroject, được thiết kế để hoạt động liên tục, tiết kiệm năng lượng và tản nhiệt trực tiếp qua vỏ. Sử dụng làm gateway tổng hoặc gateway biên (edge), database mini hoặc Server mini', '2021-11-15'),
(6, 'Pyriot MQTT Edge Gateway', 'https://pyroject.com/wp-content/uploads/2021/07/Picture1-600x620.webp', 45, 4500000, 6500000, 'Pyriot – MQTT Edge Gateway chạy trên hệ điều hành Linux đã được cấu hình phần mềm để nhận dữ liệu từ nhiều nguồn, chủ yếu thông qua truyền thông Ethernet hoặc USB (mở rộng). Cho phép người dùng tạo data-flow và truyền dữ liệu lên server thông qua MQTT.', '2021-11-15'),
(7, 'Pyriot IO Module – RS485', 'https://pyroject.com/wp-content/uploads/2021/07/Picture16-600x553.webp', 75, 600000, 900000, 'Pyriot – IO Module cung cấp 4 ngõ vào digital (12-24V) và 4 ngõ ra relay. Module sử dụng giao thức Modbus RTU thông qua RS485 để trao đổi dữ liệu với PLC, HMI, Controller.', '2021-11-15'),
(8, 'Pyriot AD Module – TCP/IP', 'https://pyroject.com/wp-content/uploads/2021/07/Picture7-2-600x535.webp', 150, 600000, 1100000, 'Pyriot – AD Module cung cấp các ngõ vào analog với chức năng đọc các tín hiệu dòng điện (0-20mA, 4-20mA), tín hiệu điện áp (0-5V, 0-10V) và sử dụng giao thức Modbus TCP/IP thông qua đường truyền vật lý Ethernet / Wifi để trao đổi dữ liệu với PLC, HMI, Controller hoặc Gateway', '2021-11-15');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

DROP TABLE IF EXISTS `tag`;
CREATE TABLE `tag` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Product_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`ID`, `Name`, `Product_ID`) VALUES
(4, 'ADC', 4),
(5, 'CONVERTER', 4),
(6, 'ANALOG MODULE', 4),
(7, 'ANALOG TO DIGITAL', 4),
(8, 'EDGE GATEWAY', 5),
(9, 'INDUSTRIAL GATEWAY', 5),
(10, 'IOT GATEWAY', 5),
(11, 'GATEWAY', 6),
(12, 'IOT GATEWAY', 6),
(13, 'MQTT GATEWAY', 6),
(14, 'EDGE GATEWAY', 6);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE `transaction` (
  `Order_ID` int(11) NOT NULL,
  `Product_ID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Total_amount_of_each_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`Order_ID`, `Product_ID`, `Quantity`, `Total_amount_of_each_product`) VALUES
(1, 1, 2, 3700000),
(1, 7, 2, 1800000),
(2, 2, 3, 4500000),
(2, 5, 2, 17800000),
(2, 7, 4, 3600000),
(4, 1, 1, 1850000),
(4, 2, 3, 4500000),
(4, 4, 6, 4800000),
(4, 6, 10, 65000000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `Last_Name` varchar(255) NOT NULL,
  `First_Name` varchar(255) NOT NULL,
  `Usename` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Telephone` int(20) DEFAULT NULL,
  `Street_Address` varchar(255) DEFAULT NULL,
  `Town_City` varchar(255) DEFAULT NULL,
  `Postcode_ZIP` int(20) DEFAULT NULL,
  `Account` bigint(255) DEFAULT NULL,
  `Bank_Name` varchar(255) DEFAULT NULL,
  `User_Type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Last_Name`, `First_Name`, `Usename`, `Password`, `Email`, `Telephone`, `Street_Address`, `Town_City`, `Postcode_ZIP`, `Account`, `Bank_Name`, `User_Type`) VALUES
(1, 'Nguyễn Thị', 'Trang', 'trang123', '$2y$10$XUpPZZVtTPo8uGAqKSPNVe7yIjC6QR67xAoSJ84x5TYApSV7.hv0.', 'ntrang123@gmail.com', 123456789, '58, Phạm Văn Đồng, quận Bình Thạnh', 'Thành phố Hồ Chí Minh', 700000, 111222444666888, 'OCB', 'member'),
(2, 'Đỗ Nhật', 'Hoàng', 'hoang2', '$2y$10$XUpPZZVtTPo8uGAqKSPNVe7yIjC6QR67xAoSJ84x5TYApSV7.hv0.', 'hoangdo7789@gmail.com', 326789562, '125/26/8, Lương Định Của, phường 2, quận 4', 'Thành phố Hồ Chí Minh', 700000, NULL, NULL, 'member'),
(3, 'Đào Quốc', 'Bảo', 'bao', '$2y$10$XUpPZZVtTPo8uGAqKSPNVe7yIjC6QR67xAoSJ84x5TYApSV7.hv0.', 'baoquoc30', 334226326, '192/2, Trần Hưng Đạo, phường 1, quận 9', 'Thành phố Hồ Chí Minh', NULL, NULL, NULL, 'admin'),
(4, 'Trương Vĩnh', 'Phước', 'phuoc', '$2y$10$XUpPZZVtTPo8uGAqKSPNVe7yIjC6QR67xAoSJ84x5TYApSV7.hv0.', 'phuocvinh@gmail.com', 963459999, '62, Cộng Hòa, phường 13, quận Tân Bình', 'Thành phố Hồ Chí Minh', NULL, NULL, NULL, 'admin'),
(5, 'Thành', 'Đạt', 'dat', '$2y$10$XUpPZZVtTPo8uGAqKSPNVe7yIjC6QR67xAoSJ84x5TYApSV7.hv0.', 'dat.thanh@gmail.com', 986159489, '256, Trường Chinh, phường 9, quận Tân Phú', 'Thành phố Hồ Chí Minh', NULL, NULL, NULL, 'admin'),
(6, 'Tô', 'Hòa', 'hoa', '$2y$10$XUpPZZVtTPo8uGAqKSPNVe7yIjC6QR67xAoSJ84x5TYApSV7.hv0.', 'hoa.to@gmail.com', 953678593, '105, Lý Thường Kiệt, phường 5, quận 10', 'Thành phố Hồ Chí Minh', NULL, NULL, NULL, 'admin'),
(7, 'asfsfasfasf', 'sdhgdhdhdh', 'aaaaaaasfsdsf', '$2y$10$XUpPZZVtTPo8uGAqKSPNVe7yIjC6QR67xAoSJ84x5TYApSV7.hv0.', 'adasfsdgs@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'member');

--
-- Triggers `user`
--
DROP TRIGGER IF EXISTS `after_user_insert`;
DELIMITER $$
CREATE TRIGGER `after_user_insert` AFTER INSERT ON `user` FOR EACH ROW INSERT INTO cart SET cart.User_ID = NEW.ID
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buying_history`
--
ALTER TABLE `buying_history`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Order_ID` (`Order_ID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `cart_item_list`
--
ALTER TABLE `cart_item_list`
  ADD PRIMARY KEY (`cart_ID`,`product_ID`),
  ADD KEY `product_ID` (`product_ID`);

--
-- Indexes for table `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Product_ID` (`Product_ID`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Product_ID` (`Product_ID`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`Order_ID`,`Product_ID`),
  ADD KEY `Product_ID` (`Product_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Usename` (`Usename`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buying_history`
--
ALTER TABLE `buying_history`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `catalog`
--
ALTER TABLE `catalog`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buying_history`
--
ALTER TABLE `buying_history`
  ADD CONSTRAINT `buying_history_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `buying_history_ibfk_2` FOREIGN KEY (`Order_ID`) REFERENCES `order_details` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `user` (`ID`);

--
-- Constraints for table `cart_item_list`
--
ALTER TABLE `cart_item_list`
  ADD CONSTRAINT `cart_item_list_ibfk_1` FOREIGN KEY (`cart_ID`) REFERENCES `cart` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_item_list_ibfk_2` FOREIGN KEY (`product_ID`) REFERENCES `product` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `catalog`
--
ALTER TABLE `catalog`
  ADD CONSTRAINT `catalog_ibfk_1` FOREIGN KEY (`Product_ID`) REFERENCES `product` (`ID`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tag`
--
ALTER TABLE `tag`
  ADD CONSTRAINT `tag_ibfk_1` FOREIGN KEY (`Product_ID`) REFERENCES `product` (`ID`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`Order_ID`) REFERENCES `order_details` (`ID`),
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`Product_ID`) REFERENCES `product` (`ID`),
  ADD CONSTRAINT `transaction_ibfk_3` FOREIGN KEY (`Order_ID`) REFERENCES `order_details` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
