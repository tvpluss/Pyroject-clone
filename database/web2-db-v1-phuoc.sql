-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2021 at 01:12 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

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
(3, 2, 4),
(4, 4, 5),
(5, 4, 6),
(6, 4, 7),
(7, 4, 8),
(8, 4, 9),
(9, 4, 10),
(10, 4, 11),
(11, 4, 12),
(12, 4, 13),
(13, 4, 14),
(14, 4, 15),
(15, 15, 16),
(16, 16, 17);

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
(12, 7),
(16, 11),
(17, 12),
(18, 13),
(19, 14),
(20, 15),
(21, 16);

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
(6, 2, 2),
(7, 4, 3),
(7, 7, 2),
(16, 3, 1),
(16, 13, 6),
(18, 3, 2),
(19, 1, 1),
(19, 6, 1);

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
(3, 'PROTOCOL CONVERTER MODULE', 2),
(4, '4G MODULE', 3),
(5, 'ANALOG ACQUISITION MODULE', 4),
(7, 'IOT GATEWAY', 6),
(8, 'DIGITAL INPUT OUTPUT MODULE', 7),
(11, '12', 10),
(13, 'abc', 12),
(14, 'giải trí', 13),
(15, '1', 14);

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
  `Message_content` mediumtext NOT NULL,
  `Status` varchar(255) DEFAULT NULL,
  `Created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`ID`, `Name`, `Telephone`, `Email`, `Message_content`, `Status`, `Created`) VALUES
(11, 'Phước', 123456789, 'Phuoc@gmail.com', 'Đây là tin nhắn 1', 'Xác nhận', '2021-11-30 00:00:00'),
(12, 'Phước', 123456789, 'Phuoc@gmail.com', 'Đây là tin nhắn 2', 'Xác nhận', '2021-11-30 00:00:00'),
(13, 'Phước', 123456789, 'Phuoc@gmail.com', 'Đây là tin nhắn 3', 'Mới', '2021-11-30 05:02:57'),
(14, 'Phuowsc', 213456789, 'phuoc@gmail.com', 'Xin chafo', 'Mới', '2021-11-30 07:20:14'),
(15, 'Hoà', 123456789, 'example@mail.com', 'Xin chào pyroject\n', 'Mới', '2021-11-30 08:09:48'),
(16, 'Đạt', 123456789, 'example@mail.com', 'Tạm biệt Pyroject, khóc xong rồi thì thôi cất gọn poster anh vào góc, mình tạm thời không nhìn nhau anh nhé. Mỗi lần nhìn thấy anh em sợ lại làm tim mình đau hơn. Em không biết em có vượt qua cú sốc này không nữa. Chờ anh nửa năm, để rồi nhận trái đắng như vậy. Album đặt rồi cũng không muốn lấy về nữa. Em chưa đủ chín chắn để chấp nhận sự thật này, chắc là vậy, nên em đành ích kỷ vậy thôi. Chưa được 2 năm mà, anh có cần vội vã hẹn hò vậy không? Cắt đứt liên lạc với mọi người để không liên lụy tới họ nhưng vẫn hẹn hò được ạ? Em cảm thấy như bị lừa vậy, công sức lo lắng cho anh thừa rồi vì anh chắc vẫn luôn hạnh phúc bên ai kia. Vừa showcase gặp fan xong đã đi gặp bạn gái luôn, tình yêu của fan với anh chắc không đủ. Anh thừa biết fan girl là ntn mà ????, vậy mà anh vẫn như vậy. \nTạm biệt anh, cho em ích kỷ lần này nhé. Hẹn gặp lại khi em đã mạnh mẽ hơn, em không quay lưng đi nhưng em sẽ dừng lại.', 'Xác nhận', '2021-11-30 08:10:33'),
(17, 'Phước', 123456789, 'phuoc@gmail.com', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'Mới', '2021-11-30 08:46:56'),
(18, 'Phuc', 123456789, 'toan@gmail.com', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'Xác nhận', '2021-11-30 08:49:12'),
(19, 'Trương Vĩnh Phước', 123456789, 'truongphuocst310301@gmail.com', 's simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with des', 'Mới', '2021-11-30 09:19:34');

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
  `Content` mediumtext NOT NULL,
  `Picture` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`ID`, `Title`, `Author`, `Post_Date`, `Content`, `Picture`) VALUES
(1, 'INTERNET OF THINGS (IOT) : CHO NGƯỜI MỚI BẮT ĐẦU', 'Trương Vĩnh Phước', '2021-11-25', '                    <h2>Giao thức MQTT với ESP32 và Node-red: Người mới bắt đầu cần nắm bắt điều gì?</h2>\r\n                    <h3>Giới thiệu nội dung :</h3>\r\n                    <p>\r\n                        <strong>MQTT (Message Queuing Telemetry Transport)</strong> là một giao thức truyền thông sử dụng cho các thiết bị IoT, giao thức này có độ tin cậy cao và khả năng được sử dụng trong các đường tuyền không ổn định bởi vì giao thức này chỉ sử dụng băng thông thấp trong môi trường có độ trễ cao nên nói là một giao thức lý tưởng cho các ứng dụng M2M và IoT.\r\n                        MQTT cũng là giao thức sử dụng trong Facebook Messenger.\r\n                        Bài viết này cung cấp các kiến thức cơ bản, đủ để người đọc hiểu về MQTT, xung quanh các yếu tố cốt lõi của giao thức này, bao gồm “subscribe“, “publish“, “qos“, “retain“, “last will and testament (lwt)“.\r\n                    </p>\r\n                    <h4>Publish, subcribe</h4>\r\n                    <img src=\"https://pyroject.com/wp-content/uploads/2021/09/Publish-subcribe.webp\" alt=\"\">\r\n                    <p>Hệ thống MQTT bao gồm các node trạm ( MQTT client ) và một MQTT Server (gọi là Broker). Các client kết nối với Broker, mỗi client sẽ đăng ký một hoặc nhiều kênh (topic), ví dụ “/esp32/humidity” , “house/money ”. Khi một client đăng ký tới một topic, điều này gọi là subcribe, điều này tương tự như khi ta đăng ký một kênh Youtube\r\n                        <strong>Lưu ý: </strong>Nếu có nhiều client subcribe tới một topic, khi một client publish một dữ liệu lên topic thì tất cả các client subcribe tới topic đều sẽ nhận được thông báo về dữ liệu này.\r\n                    </p>\r\n                    <h4>QoS</h4>\r\n                    <p>QoS (Quality of service) là tùy chọn đường tuyền quyết định độ trễ và độ chính xác của thông tin khi “publish” và “subcribe”.\r\n                        – QoS 0: Broker/Client sẽ gửi dữ liệu đúng 1 lần, thông qua giao thức TCP/IP, không cần xác nhận bởi điểm nhân, giống như người giao báo, chỉ cần đặt báo trước cửa chứ không cần quan tâm người nhận có nhận được hay không.\r\n                        – QoS 1: Broker/Client sẽ gửi dữ liệu và cần ít nhất 1 lần xác nhận từ điểm nhận.\r\n                        – QoS 2: Broker/Client sẽ gửi dữ liệu và cần đúng 1 lần xác nhận từ đầu kia, quá trình này phải trải qua 4 bước bắt tay.\r\n                        Đọc thêm: <a href=\"https://code.google.com/archive/p/mqtt4erl/wikis/QualityOfServiceUseCases.wiki\">Code Archive – Long-term storage for Google Code Project Hosting</a> .\r\n                        Một gói tin có thể được gởi ở bất kỳ QoS nào, các Client cũng có thể subcribe tới topic với bất kỳ QoS nào. Nếu một client subcribe tới 1 topic với QoS 2, thì QoS tối đa của các gói tin được gửi/nhận bởi client đó là QoS 2.</p>\r\n                    <h4>Retain</h4>\r\n                    <p>Nếu Retain = 1, khi Client publish 1 gói tin, Broker bắt buộc phải lưu trữ lại gói tin với QoS. Khi một Client kết nối tới Broker và subcribe một topic, nó sẽ nhận được gói tin cuối cùng có Retain = 1 của topic đó.\r\n                        – Khi một Client subcribe tới một topic, Broker sẽ gửi một gói tin có Retain = 1 như là một xác nhận cho việc subcribe thanh công của Client.</p>\r\n                    <h4>LWT</h4>\r\n                    <p>Khi một Client subcribe tới một topic A và có đăng ký LWT tới 1 topic B một tin nhắn lwt. Trong trường hợp người dùng cũng đăng ký tới topic này, nếu vì một lý do gì đó, Client này rơi vào trạng thái ngoại tuyến, vì Client đã đăng kí LWT, người dùng sẽ nhận được một gói tin từ Broker là ID của Client ngoại tuyến trên topic B.</p>\r\n                    <h4>ESP32 MQTT Client</h4>\r\n                    <p> Ta đã biết 2 thành phần chinh của giao thức MQTT là Broker và Client, thông thường, vai trò của ESP32 trong giao thức MQTT là Client.</p>\r\n                    <h3>PubSubClient</h3>\r\n                    <p>1. Thư viện này cho phép ESP32 tương tác với Broker MQTT node – red.\r\n                        2. Tải file zip thư viện PubSubClient: <a href=\"https://github.com/knolleary/pubsubclient\">https://github.com/knolleary/pubsubclient</a>\r\n                        3. Bạn cũng có thể cài đặt qua mục quản lý thư viện của Arduino IDE.</p>4\r\n                    <h3>Thư viện cho cảm biến DHT</h3>\r\n                    <p>\r\n                        – Phần này gồm 2 thư viện DHT sensor library & Adafruit Unified Sensor\r\n                    </p>\r\n                    <img src=\"https://pyroject.com/wp-content/uploads/2021/09/Thu-vien-cho-cam-bien-DHT-1.webp\" alt=\"\">\r\n                    <img src=\"https://pyroject.com/wp-content/uploads/2021/09/Thu-vien-cho-cam-bien-DHT-2.webp\" alt=\"\">', 'https://pyroject.com/wp-content/uploads/2021/09/IOT-cho-nguoi-moi-bat-dau-pyroject.webp'),
(2, 'TẠI SAO CÁC DỰ ÁN IOT KHÔNG THÀNH CÔNG?', 'Nguyễn Quốc Hoà', '2021-11-28', '<h2>Giao thức MQTT với ESP32 và Node-red: Người mới bắt đầu cần nắm bắt điều gì?</h2>\r\n                    <h3>Giới thiệu nội dung :</h3>\r\n                    <p>\r\n                        <strong>MQTT (Message Queuing Telemetry Transport)</strong> là một giao thức truyền thông sử dụng cho các thiết bị IoT, giao thức này có độ tin cậy cao và khả năng được sử dụng trong các đường tuyền không ổn định bởi vì giao thức này chỉ sử dụng băng thông thấp trong môi trường có độ trễ cao nên nói là một giao thức lý tưởng cho các ứng dụng M2M và IoT.\r\n                        MQTT cũng là giao thức sử dụng trong Facebook Messenger.\r\n                        Bài viết này cung cấp các kiến thức cơ bản, đủ để người đọc hiểu về MQTT, xung quanh các yếu tố cốt lõi của giao thức này, bao gồm “subscribe“, “publish“, “qos“, “retain“, “last will and testament (lwt)“.\r\n                    </p>\r\n                    <h4>Publish, subcribe</h4>\r\n                    <img src=\"https://pyroject.com/wp-content/uploads/2021/09/Publish-subcribe.webp\" alt=\"\">\r\n                    <p>Hệ thống MQTT bao gồm các node trạm ( MQTT client ) và một MQTT Server (gọi là Broker). Các client kết nối với Broker, mỗi client sẽ đăng ký một hoặc nhiều kênh (topic), ví dụ “/esp32/humidity” , “house/money ”. Khi một client đăng ký tới một topic, điều này gọi là subcribe, điều này tương tự như khi ta đăng ký một kênh Youtube\r\n                        <strong>Lưu ý: </strong>Nếu có nhiều client subcribe tới một topic, khi một client publish một dữ liệu lên topic thì tất cả các client subcribe tới topic đều sẽ nhận được thông báo về dữ liệu này.\r\n                    </p>\r\n                    <h4>QoS</h4>\r\n                    <p>QoS (Quality of service) là tùy chọn đường tuyền quyết định độ trễ và độ chính xác của thông tin khi “publish” và “subcribe”.\r\n                        – QoS 0: Broker/Client sẽ gửi dữ liệu đúng 1 lần, thông qua giao thức TCP/IP, không cần xác nhận bởi điểm nhân, giống như người giao báo, chỉ cần đặt báo trước cửa chứ không cần quan tâm người nhận có nhận được hay không.\r\n                        – QoS 1: Broker/Client sẽ gửi dữ liệu và cần ít nhất 1 lần xác nhận từ điểm nhận.\r\n                        – QoS 2: Broker/Client sẽ gửi dữ liệu và cần đúng 1 lần xác nhận từ đầu kia, quá trình này phải trải qua 4 bước bắt tay.\r\n                        Đọc thêm: <a href=\"https://code.google.com/archive/p/mqtt4erl/wikis/QualityOfServiceUseCases.wiki\">Code Archive – Long-term storage for Google Code Project Hosting</a> .\r\n                        Một gói tin có thể được gởi ở bất kỳ QoS nào, các Client cũng có thể subcribe tới topic với bất kỳ QoS nào. Nếu một client subcribe tới 1 topic với QoS 2, thì QoS tối đa của các gói tin được gửi/nhận bởi client đó là QoS 2.</p>\r\n                    <h4>Retain</h4>\r\n                    <p>Nếu Retain = 1, khi Client publish 1 gói tin, Broker bắt buộc phải lưu trữ lại gói tin với QoS. Khi một Client kết nối tới Broker và subcribe một topic, nó sẽ nhận được gói tin cuối cùng có Retain = 1 của topic đó.\r\n                        – Khi một Client subcribe tới một topic, Broker sẽ gửi một gói tin có Retain = 1 như là một xác nhận cho việc subcribe thanh công của Client.</p>\r\n                    <h4>LWT</h4>\r\n                    <p>Khi một Client subcribe tới một topic A và có đăng ký LWT tới 1 topic B một tin nhắn lwt. Trong trường hợp người dùng cũng đăng ký tới topic này, nếu vì một lý do gì đó, Client này rơi vào trạng thái ngoại tuyến, vì Client đã đăng kí LWT, người dùng sẽ nhận được một gói tin từ Broker là ID của Client ngoại tuyến trên topic B.</p>\r\n                    <h4>ESP32 MQTT Client</h4>\r\n                    <p> Ta đã biết 2 thành phần chinh của giao thức MQTT là Broker và Client, thông thường, vai trò của ESP32 trong giao thức MQTT là Client.</p>\r\n                    <h3>PubSubClient</h3>\r\n                    <p>1. Thư viện này cho phép ESP32 tương tác với Broker MQTT node – red.\r\n                        2. Tải file zip thư viện PubSubClient: <a href=\"https://github.com/knolleary/pubsubclient\">https://github.com/knolleary/pubsubclient</a>\r\n                        3. Bạn cũng có thể cài đặt qua mục quản lý thư viện của Arduino IDE.</p>4\r\n                    <h3>Thư viện cho cảm biến DHT</h3>\r\n                    <p>\r\n                        – Phần này gồm 2 thư viện DHT sensor library & Adafruit Unified Sensor\r\n                    </p>', 'https://pyroject.com/wp-content/uploads/2021/10/Tai-sao-IOT-that-bai-_-Pyroject.webp'),
(11, 'Tại sao mèo có 9 mạng', 'Tô Hoà', '2021-11-30', 'orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Why do we use it? It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lore', 'https://cf.shopee.vn/file/eb49688650606b3bdb51e9dfa147c2a9'),
(13, 'Tại sao mèo có 9 mạng', 'Tô Hoà', '2021-11-30', 'orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  Why do we use it? It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lore', 'https://cf.shopee.vn/file/eb49688650606b3bdb51e9dfa147c2a9'),
(14, 'Tại sao mèo có 10 mạng', 'Tô Hoà', '2021-11-30', 'orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining ', 'https://cf.shopee.vn/file/eb49688650606b3bdb51e9dfa147c2a9');

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
  `Telephone` varchar(20) NOT NULL,
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
(1, 'Thành công', 1, 'Nguyễn Thị', 'Trang', 'ntrang123@gmail.com', '123456789', '58, Phạm Văn Đồng, quận Bình Thạnh', NULL, 'TP.Hồ Chí Minh', '2021-11-15', 111222444666888, 'OCB', NULL),
(2, 'Chờ xác nhận', 2, 'Đỗ Nhật', 'Hoàng', 'hoangdo7789@gmail.com', '326789562', '125/26/8, Lương Định Của, Phường 2, Quận 4', NULL, 'Hồ Chí Minh', '2021-11-15', 225303569503256, 'ACB', NULL),
(4, 'Đã xác nhận', 2, 'Đỗ Nhật', 'Hoàng', 'hoangdo7789@gmail.com', '326789562', '125/26/8, Lương Định Của, phường 2, quận 4', NULL, 'Thành phố Hồ Chí Minh', '2021-11-07', 332659783236, 'BIDV', NULL),
(5, 'Chờ xác nhận', 4, 'Trương Vĩnh', 'Phước', 'example@example.com', '123456789', '62, Cộng Hòa, phường 13, quận Tân Bình', 0, 'Thành phố Hồ Chí Minh', '2021-11-29', 121212, 'OCB', ''),
(6, 'Chờ xác nhận', 4, 'Trương Vĩnh', 'Phước', 'example@example.com', '123456789', '62, Cộng Hòa, phường 13, quận Tân Bình', 0, 'Thành phố Hồ Chí Minh', '2021-11-29', 12, 'OCB', ''),
(7, 'Thành công', 4, 'Trương Vĩnh', 'Phước', 'example@example.com', '123456789', '62, Cộng Hòa, phường 13, quận Tân Bình', 0, 'Thành phố Hồ Chí Minh', '2021-11-29', 12, 'OCB', ''),
(8, 'Chờ xác nhận', 4, 'Trương Vĩnh', 'Phước', 'example@example.com', '123456789', '62, Cộng Hòa, phường 13, quận Tân Bình', 0, 'Thành phố Hồ Chí Minh', '2021-11-29', 123141, 'BIDV', ''),
(9, 'Chờ xác nhận', 4, 'Trương Vĩnh', 'Phước', 'phuocvinh@gmail.com', '2147483647', '62, Cộng Hòa, phường 13, quận Tân Bình', 123141, 'Thành phố Hồ Chí Minh', '2021-11-29', 1233434242342, 'BIDV', ''),
(10, 'Đang chờ', 4, 'Trương Vĩnh', 'Phước', 'phuocvinh@gmail.com', '2147483647', '62, Cộng Hòa, phường 13, quận Tân Bình', 123141, 'Thành phố Hồ Chí Minh', '2021-11-29', 1233434242342, 'BIDV', ''),
(11, 'Chờ xác nhận', 4, 'Trương Vĩnh', 'Phước', 'phuocvinh@gmail.com', '2147483647', '62, Cộng Hòa, phường 13, quận Tân Bình', 123141, 'Thành phố Hồ Chí Minh', '2021-11-29', 1233434242342, 'BIDV', ''),
(12, 'Chờ xác nhận', 4, 'Trương Vĩnh', 'Phước', 'phuocvinh@gmail.com', '2147483647', '62, Cộng Hòa, phường 13, quận Tân Bình', 123141, 'Thành phố Hồ Chí Minh', '2021-11-29', 1233434242342, 'BIDV', ''),
(13, 'Chờ xác nhận', 4, 'Trương Vĩnh', 'Phước', 'phuocvinh@gmail.com', '2147483647', '62, Cộng Hòa, phường 13, quận Tân Bình', 123141, 'Thành phố Hồ Chí Minh', '2021-11-29', 1233434242342, 'BIDV', 'Đây là 1 lời nhắn vu vơ'),
(14, 'Thành công', 4, 'Trương Vĩnh', 'Hạnh', 'phuocvinh@gmail.com', '0123456789', '62, Cộng Hòa, phường 13, quận Tân Bình', 123141, 'Thành phố Sóc Trăng', '2021-11-30', 1233434242342, 'BIDV', ''),
(15, 'Chờ xác nhận', 4, 'Trương Vĩnh', 'Hạnh', '2@mgial.com', '0123456789', '62, Cộng Hòa, phường 13, quận Tân Bình', 1231411, 'Thành phố Sóc Trăng', '2021-11-30', 1233434242342, 'BIDV', 'Không có lời nhắn'),
(16, 'Chờ xác nhận', 15, 'Phúc', 'Toàn', 'toan@gmail.com', '0123456789', '12 ĐBP', 12345, 'ST', '2021-11-30', 121121232, 'BIDV', 'TEst'),
(17, 'Chờ xác nhận', 16, 'Phước', 'Trương', 'phuoc@gmail.com', '0123456789', '12 ĐBP', 123121, 'ST', '2021-11-30', 123213123, 'BIDV', 's sfefeeffe');

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
(1, 'Pyriot 4G Relay Module', 'https://pyroject.com/wp-content/uploads/2021/09/MG_1084-150x150.webp', 100, 1000000, 2000000, ' Pyriot 4G Relay Module cung cấp khả năng điều khiển từ xa đồng loạt nhiều relay. Kết nối internet thông qua mạng di động 4G, giúp thực hiện giao tiếp với Cloud qua MQTT/HTTP. Được sử dụng để xây dựng hệ thống điều khiển và thu thập trạng thái relay.Cấu hình qua giao diện đồ họa được nhúng trên thiết bị.', '2021-11-15'),
(2, 'Pyriot Convert Module RS485 – TCP/IP', 'https://pyroject.com/wp-content/uploads/2020/10/Picture9-600x535.jpg', 50, 1000000, 1500000, 'Pyriot – Convert Module có khả năng chuyển đổi tín hiệu giữa RS485 và Ethernet( qua cổng RJ45). Sản phẩm hỗ trợ chuyển nhiều giao thức như: Modbus RTU RS485 – Modbus RTU TCP, TCP server – RS485, TCP client – RS485, Websocket server – RS485,…', '2021-11-15'),
(3, 'Pyriot 4G Module – Quectel', 'https://pyroject.com/wp-content/uploads/2021/09/MG_0778-600x400.webp', 0, 2000000, 3250000, 'Pyriot 4G Module cung cấp khả năng kết nối internet thông qua mạng di động 4G, giúp thực hiện giao tiếp với Cloud qua MQTT/HTTP. Được sử dụng để chuyển đổi dữ liệu, điều khiển hoặc giao tiếp với thiết bị khác.\r\n\r\nCấu hình qua giao diện đồ họa được nhúng trên thiết bị.', '2021-11-15'),
(4, 'Pyriot AD Module', 'https://pyroject.com/wp-content/uploads/2020/10/Picture2-600x535.jpg', 25, 400000, 800000, 'Pyriot – AD Module cung cấp các ngõ vào analog với chức năng đọc các tín hiệu dòng điện (0-20mA, 4-20mA), tín hiệu điện áp (0-5V, 0-10V) và sử dụng giao thức Modbus RTU thông qua đường truyền vật lý RS485 để trao đổi dữ liệu với PLC, HMI, Controller', '2021-11-15'),
(5, 'Pyriot Industrial Edge Gateway', 'https://pyroject.com/wp-content/uploads/2021/07/Screenshot-2021-07-15-224621-600x390.webp', 30, 7000000, 8900000, 'Pyriot Industrial Edge Gateway là các máy tính công nghiệp chạy phần mềm của Pyroject, được thiết kế để hoạt động liên tục, tiết kiệm năng lượng và tản nhiệt trực tiếp qua vỏ. Sử dụng làm gateway tổng hoặc gateway biên (edge), database mini hoặc Server mini', '2021-11-15'),
(6, 'Pyriot MQTT Edge Gateway', 'https://pyroject.com/wp-content/uploads/2021/07/Picture1-600x620.webp', 45, 4500000, 6500000, 'Pyriot – MQTT Edge Gateway chạy trên hệ điều hành Linux đã được cấu hình phần mềm để nhận dữ liệu từ nhiều nguồn, chủ yếu thông qua truyền thông Ethernet hoặc USB (mở rộng). Cho phép người dùng tạo data-flow và truyền dữ liệu lên server thông qua MQTT.', '2021-11-15'),
(7, 'Pyriot IO Module – RS485', 'https://pyroject.com/wp-content/uploads/2021/07/Picture16-600x553.webp', 75, 600000, 900000, 'Pyriot – IO Module cung cấp 4 ngõ vào digital (12-24V) và 4 ngõ ra relay. Module sử dụng giao thức Modbus RTU thông qua RS485 để trao đổi dữ liệu với PLC, HMI, Controller.', '2021-11-15'),
(8, 'Pyriot AD Module – TCP/IP', 'https://pyroject.com/wp-content/uploads/2021/07/Picture7-2-600x535.webp', 150, 600000, 1100000, 'Pyriot – AD Module cung cấp các ngõ vào analog với chức năng đọc các tín hiệu dòng điện (0-20mA, 4-20mA), tín hiệu điện áp (0-5V, 0-10V) và sử dụng giao thức Modbus TCP/IP thông qua đường truyền vật lý Ethernet / Wifi để trao đổi dữ liệu với PLC, HMI, Controller hoặc Gateway', '2021-11-15'),
(10, '12', 'abc', 11, 11111, 11111, '12', NULL),
(12, 'abc', 'https://cf.shopee.vn/file/2ff107e87f7cdff2a4a93d48bf6f0fbd', 12, 112423, 123312, '12a', NULL),
(13, 'Tai nghe Bluetooth AMOI', 'https://cf.shopee.vn/file/a20395a741241ad0ab5749747f814727', 6, 1100000, 1000000, 'Tai nghe chống nước bảo hành 1 năm', NULL),
(14, '1', '1000000', 1, 12, 1, '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE `review` (
  `ID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Content` varchar(255) DEFAULT NULL,
  `Email` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`ID`, `ProductID`, `Content`, `Email`, `Name`, `Status`) VALUES
(1, 2, 'Text review', 'Phuoc@gmail.com', 'Phước', 'Xác nhận'),
(2, 2, 'text review2', 'hoa@gmail.com', 'Hoà', 'Xác nhận'),
(3, 2, 'Sản phẩm tốt', 'phuoc@gmail.com', 'Phước', 'Xác nhận'),
(4, 3, 'Test', 'phuoc@gmail.com', 'Phuoc', 'Xác nhận'),
(5, 3, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one ', 'Phuoc@gmail.com', 'Phuoc', 'Xác nhận'),
(6, 2, 's simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not on', 'phuoc@gmail.com', 'Phước', 'Xác nhận');

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
(11, 'GATEWAY', 6),
(12, 'IOT GATEWAY', 6),
(13, 'MQTT GATEWAY', 6),
(14, 'EDGE GATEWAY', 6),
(16, '12', 10),
(18, 'abc', 12),
(19, 'Tai nghe', 13),
(20, '1', 14);

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
(4, 6, 10, 65000000),
(5, 2, 2, 3000000),
(6, 2, 2, 3000000),
(7, 2, 1, 1500000),
(8, 1, 1, 1850000),
(8, 2, 1, 1500000),
(8, 3, 1, 3250000),
(8, 7, 1, 900000),
(9, 2, 1, 1500000),
(10, 5, 1, 8900000),
(10, 8, 1, 1100000),
(11, 3, 1, 3250000),
(12, 6, 1, 6500000),
(13, 2, 3, 4500000),
(13, 5, 1, 8900000),
(14, 2, 1, 1500000),
(15, 3, 1, 3250000),
(16, 2, 4, 6000000),
(17, 2, 2, 3000000),
(17, 3, 4, 13000000);

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
  `Telephone` varchar(11) DEFAULT NULL,
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
(1, 'Nguyễn Thị', 'Trang', 'trang123', '$2y$10$XUpPZZVtTPo8uGAqKSPNVe7yIjC6QR67xAoSJ84x5TYApSV7.hv0.', 'ntrang123@gmail.com', '12345671111', '58, Phạm Văn Đồng, quận Bình Thạnh', 'Thành phố Hồ Chí Minh', 700000, 111222444666888, 'OCB', 'member'),
(2, 'Đỗ Nhật', 'Hoàng', 'hoang2', '$2y$10$XUpPZZVtTPo8uGAqKSPNVe7yIjC6QR67xAoSJ84x5TYApSV7.hv0.', 'hoangdo7789@gmail.com', '326789562', '125/26/8, Lương Định Của, phường 2, quận 4', 'Thành phố Hồ Chí Minh', 700000, NULL, NULL, 'member'),
(3, 'Đào Quốc', 'Bảo', 'bao', '$2y$10$XUpPZZVtTPo8uGAqKSPNVe7yIjC6QR67xAoSJ84x5TYApSV7.hv0.', 'baoquoc30', '334226326', '192/2, Trần Hưng Đạo, phường 1, quận 9', 'Thành phố Hồ Chí Minh', NULL, NULL, NULL, 'admin'),
(4, 'Trương Vĩnh', 'Hạnh', 'phuoc', '$2y$10$Pm74vQYnvHaE/CDdJHHccOrjA7GeQ7CSCa9kfw2OhJIaEvcNOIPMq', 'phuocvinh@gmail.com', '0123456789', '62, Cộng Hòa, phường 13, quận Tân Bình', 'Thành phố Sóc Trăng', 123141, 1233434242342, 'BIDV', 'admin'),
(5, 'Thành', 'Đạt', 'dat', '$2y$10$XUpPZZVtTPo8uGAqKSPNVe7yIjC6QR67xAoSJ84x5TYApSV7.hv0.', 'dat.thanh@gmail.com', '986159489', '256, Trường Chinh, phường 9, quận Tân Phú', 'Thành phố Hồ Chí Minh', NULL, NULL, NULL, 'admin'),
(6, 'Tô', 'Hòa', 'hoa', '$2y$10$XUpPZZVtTPo8uGAqKSPNVe7yIjC6QR67xAoSJ84x5TYApSV7.hv0.', 'hoa.to@gmail.com', '953678593', '105, Lý Thường Kiệt, phường 5, quận 10', 'Thành phố Hồ Chí Minh', NULL, NULL, NULL, 'admin'),
(7, 'asfsfasfasf', 'sdhgdhdhdh', 'aaaaaaasfsdsf', '$2y$10$XUpPZZVtTPo8uGAqKSPNVe7yIjC6QR67xAoSJ84x5TYApSV7.hv0.', 'adasfsdgs@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'member'),
(11, 'Thanh', 'Toàn', 'Toan', '$2y$10$On.NTaYjoA.4WVlfG1G7GuFPrEOKtEK.dJJT1mjZN.8I30CNGj90q', 'toan@gmail.com', '', '', '', 0, 0, '', 'member'),
(12, '', '', 'Hue', '$2y$10$HuZRm0BCBjd5jmMGilfTe.aTvJYAcD7clS5g.HqjNQWPakE0nGKVO', 'hue@gmail.com', NULL, '', '', NULL, 0, '', 'member'),
(13, 'lam', 'lan', 'lan', '$2y$10$4u6P859SgakBZMncTDE3tOtxNsho/y1OAYBMVa6RNXRcfWHDH/mE2', 'lan@gmail.com', NULL, '', '', NULL, 0, '', 'member'),
(14, 'Phuocws', 'Truowng', 'tvplus', '$2y$10$qp/DjcZW458yTGNSMlZoheUEO.cg08PCpyqL9AMKMwhQwTldta3M6', 'vinhphuoc@gmail.com', '0123456789', '', '', 0, 9223372036854775807, '', 'member'),
(15, 'Phúc', 'Toàn', 'Phuc', '$2y$10$db1ypmcjnnp1A7xNLhHxce93m1z2UCGHHnCbY.lo.TtungAtxojNW', 'toan@gmail.com', '0123456789', '12 ĐBP', 'ST', 0, 0, '', 'member'),
(16, 'Phước', 'Trương', 'Phuocc', '$2y$10$d3ezFS2qDZ3JSJ0WVCYmBu4dIhLS3tFLqrQSaPT514enTND.RjIbu', 'phuoc@gmail.com', '0123456789', '', '', 0, 0, '', 'member');

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
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ProductID` (`ProductID`);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `catalog`
--
ALTER TABLE `catalog`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ID`);

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
