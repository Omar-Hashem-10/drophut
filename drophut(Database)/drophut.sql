-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2024 at 11:02 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drophut`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `about_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`about_id`, `title`, `description`, `image`, `created_at`) VALUES
(1, 'eCommerce Bootstrap Template for Electronics Store', 'Adipiscing lacus ut elementum, nec duis, tempor litora turpis dapibus. Imperdiet cursus odio tortor in elementum. Egestas nunc eleifend feugiat lectus laoreet, vel nunc taciti integer cras. Hac pede dis, praesent nibh ac dui mauris sit. Pellentesque mi, facilisi mauris, elit sociis leo sodales accumsan. Iaculis ac fringilla torquent lorem consectetuer, sociosqu phasellus risus urna aliquam, ornare.', 'about_1.jpg', '2024-09-18 21:38:05'),
(2, 'What do we do?', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ‘Content here, content here’, making it look like readable English.', 'about_2.jpg', '2024-09-18 21:40:21'),
(3, 'History Of Us', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ‘Content here, content here’, making it look like readable English.', 'about_3.jpg', '2024-09-18 21:40:46');

-- --------------------------------------------------------

--
-- Table structure for table `awesome_features`
--

CREATE TABLE `awesome_features` (
  `id` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `awesome_features`
--

INSERT INTO `awesome_features` (`id`, `icon`, `title`, `description`, `image`) VALUES
(1, 'awesome_features_1.png', 'Impressive Distance', 'consectetur adipisicing elit. Ut praesentium earum, blanditiis, voluptatem repellendus rerum voluptatibus dignissimos', 'product.jpg'),
(2, 'awesome_features_2.png', '100% self safe', 'consectetur adipisicing elit. Ut praesentium earum, blanditiis, voluptatem repellendus rerum voluptatibus dignissimos', NULL),
(3, 'awesome_features_3.png', 'Awesome Support', 'consectetur adipisicing elit. Ut praesentium earum, blanditiis, voluptatem repellendus rerum voluptatibus dignissimos', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `post_date` date DEFAULT curdate(),
  `excerpt` text NOT NULL,
  `quote` text NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `major` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `author`, `post_date`, `excerpt`, `quote`, `content`, `image`, `major`) VALUES
(1, 'How to start drone', 'Rahul', '2024-09-16', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less', 'Quisque semper nunc vitae erat pellentesque, ac placerat arcu consectetur. In venenatis elit ac ultrices convallis. Duis est nisi, tincidunt ac urna sed, cursus blandit lectus. In ullamcorper sit amet ligula ut eleifend. Proin dictum tempor ligula, ac feugiat metus. Sed finibus tortor eu scelerisque scelerisque.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.you are going a passage of Lorem Ipsum, you need be sure there isn\'t anything embarrassingthe middle of. All the Lorem Ipsum generators the Internet tend predefined chunks necessary, making this the true generator the Internet. It uses a dictionary Contrary popular belief, Lorem Ipsum simply random. It has roots a piece of classical Latin literature BC, making it years old. Richard McClintock, a Latin professor Hampden-Sydney College Virginia, looked up one of the more obscure Latin words, consectetur, a Lorem Ipsum passage, going through the cites of the word classical literature, discovered the undoubtable source. Lorem Ipsum comes sections of (The Extremes of Good Evil) Cicero, written BC. This book a treatise the theory of ethics, very popular during the Renaissance. The of Lorem Ipsum', 'blog-post-2.jpg', 'blog posts'),
(2, 'See the tutorial', 'Rahul', '2024-09-16', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less', 'Quisque semper nunc vitae erat pellentesque, ac placerat arcu consectetur. In venenatis elit ac ultrices convallis. Duis est nisi, tincidunt ac urna sed, cursus blandit lectus. In ullamcorper sit amet ligula ut eleifend. Proin dictum tempor ligula, ac feugiat metus. Sed finibus tortor eu scelerisque scelerisque.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.you are going a passage of Lorem Ipsum, you need be sure there isn\'t anything embarrassingthe middle of. All the Lorem Ipsum generators the Internet tend predefined chunks necessary, making this the true generator the Internet. It uses a dictionary Contrary popular belief, Lorem Ipsum simply random. It has roots a piece of classical Latin literature BC, making it years old. Richard McClintock, a Latin professor Hampden-Sydney College Virginia, looked up one of the more obscure Latin words, consectetur, a Lorem Ipsum passage, going through the cites of the word classical literature, discovered the undoubtable source. Lorem Ipsum comes sections of (The Extremes of Good Evil) Cicero, written BC. This book a treatise the theory of ethics, very popular during the Renaissance. The of Lorem Ipsum', 'blog-post-1.jpg', 'blog posts'),
(3, 'How to start drone', 'Rahul', '2024-09-16', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less', 'Quisque semper nunc vitae erat pellentesque, ac placerat arcu consectetur. In venenatis elit ac ultrices convallis. Duis est nisi, tincidunt ac urna sed, cursus blandit lectus. In ullamcorper sit amet ligula ut eleifend. Proin dictum tempor ligula, ac feugiat metus. Sed finibus tortor eu scelerisque scelerisque.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.you are going a passage of Lorem Ipsum, you need be sure there isn\'t anything embarrassingthe middle of. All the Lorem Ipsum generators the Internet tend predefined chunks necessary, making this the true generator the Internet. It uses a dictionary Contrary popular belief, Lorem Ipsum simply random. It has roots a piece of classical Latin literature BC, making it years old. Richard McClintock, a Latin professor Hampden-Sydney College Virginia, looked up one of the more obscure Latin words, consectetur, a Lorem Ipsum passage, going through the cites of the word classical literature, discovered the undoubtable source. Lorem Ipsum comes sections of (The Extremes of Good Evil) Cicero, written BC. This book a treatise the theory of ethics, very popular during the Renaissance. The of Lorem Ipsum', 'blog-post-2.jpg', 'blog posts'),
(4, 'bibendum massa nec, fermentum odio', 'admin', '2024-09-16', 'Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Praesent ornare tortor ac ante egestas hendrerit. Aliquam et metus pharetra, bibendum massa nec, fermentum odio.', 'Quisque semper nunc vitae erat pellentesque, ac placerat arcu consectetur. In venenatis elit ac ultrices convallis. Duis est nisi, tincidunt ac urna sed, cursus blandit lectus. In ullamcorper sit amet ligula ut eleifend. Proin dictum tempor ligula, ac feugiat metus. Sed finibus tortor eu scelerisque scelerisque.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.you are going a passage of Lorem Ipsum, you need be sure there isn\'t anything embarrassingthe middle of. All the Lorem Ipsum generators the Internet tend predefined chunks necessary, making this the true generator the Internet. It uses a dictionary Contrary popular belief, Lorem Ipsum simply random. It has roots a piece of classical Latin literature BC, making it years old. Richard McClintock, a Latin professor Hampden-Sydney College Virginia, looked up one of the more obscure Latin words, consectetur, a Lorem Ipsum passage, going through the cites of the word classical literature, discovered the undoubtable source. Lorem Ipsum comes sections of (The Extremes of Good Evil) Cicero, written BC. This book a treatise the theory of ethics, very popular during the Renaissance. The of Lorem Ipsum', 'blog_1.jpg', 'blogs'),
(5, 'Aenean posuere libero eu augue', 'admin', '2024-09-16', 'Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Praesent ornare tortor ac ante egestas hendrerit. Aliquam et metus pharetra, bibendum massa nec, fermentum odio.', 'Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Praesent ornare tortor ac ante egestas hendrerit. Aliquam et metus pharetra, bibendum massa nec, fermentum odio.&amp;amp;quot;', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&amp;amp;#039;t look even slightly believable.you are going a passage of Lorem Ipsum, you need be sure there isn&amp;amp;#039;t anything embarrassingthe middle of. All the Lorem Ipsum generators the Internet tend predefined chunks necessary, making this the true generator the Internet. It uses a dictionary Contrary popular belief, Lorem Ipsum simply random. It has roots a piece of classical Latin literature BC, making it years old. Richard McClintock, a Latin professor Hampden-Sydney College Virginia, looked up one of the more obscure Latin words, consectetur, a Lorem Ipsum passage, going through the cites of the word classical literature, discovered the undoubtable source. Lorem Ipsum comes sections of (The Extremes of Good Evil) Cicero, written BC. This book a treatise the theory of ethics, very popular during the Renaissance. The of Lorem Ipsum', 'blog_2.jpg', 'blogs'),
(6, 'Donec vitae hendrerit arcu, sit amet', 'admin', '2024-09-16', 'Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Praesent ornare tortor ac ante egestas hendrerit. Aliquam et metus pharetra, bibendum massa nec, fermentum odio. Cras et vehicula orci. Curabitur aliquet ullamcorper suscipit. Aliquam erat volutpat. Cras convallis libero mi, sit amet scelerisque elit suscipit id.', 'Quisque semper nunc vitae erat pellentesque, ac placerat arcu consectetur. In venenatis elit ac ultrices convallis. Duis est nisi, tincidunt ac urna sed, cursus blandit lectus. In ullamcorper sit amet ligula ut eleifend. Proin dictum tempor ligula, ac feugiat metus. Sed finibus tortor eu scelerisque scelerisque.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.you are going a passage of Lorem Ipsum, you need be sure there isn\'t anything embarrassingthe middle of. All the Lorem Ipsum generators the Internet tend predefined chunks necessary, making this the true generator the Internet. It uses a dictionary Contrary popular belief, Lorem Ipsum simply random. It has roots a piece of classical Latin literature BC, making it years old. Richard McClintock, a Latin professor Hampden-Sydney College Virginia, looked up one of the more obscure Latin words, consectetur, a Lorem Ipsum passage, going through the cites of the word classical literature, discovered the undoubtable source. Lorem Ipsum comes sections of (The Extremes of Good Evil) Cicero, written BC. This book a treatise the theory of ethics, very popular during the Renaissance. The of Lorem Ipsum', 'blog_3.jpg', 'blogs'),
(24, 'Et veniam quod rem', 'Et doloribus similiq', '2024-09-25', 'Dolorem omnis molest', 'Voluptatibus enim ve', 'Dolor laudantium vo', 'blog_2.jpg', 'blogs');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT 1,
  `color` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`) VALUES
(1, 'Drone'),
(8, 'eraasoft'),
(3, 'Flyer'),
(2, 'Mevrik');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `comment_text` text NOT NULL,
  `blog_id` int(11) NOT NULL,
  `created_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `comment_text`, `blog_id`, `created_at`) VALUES
(4, 'omar hahem', 'omarhashem321@gmail.com', 'Comment ', 4, '2024-09-20'),
(5, 'omar hahem', 'omarhashem321@gmail.com', 'Comment ', 4, '2024-09-20'),
(15, 'omar hahem', 'omarhashem321@gmail.com', 'hello eraasoft', 2, '2024-09-22'),
(16, 'omar hahem', 'omarhashem321@gmail.com', 'hello eraasoft', 3, '2024-09-22'),
(17, 'omar hahem', 'omarhashem321@gmail.com', 'hello eraasoft', 4, '2024-09-22'),
(18, 'omar hahem', 'omarhashem321@gmail.com', 'hello eraasoft', 5, '2024-09-22'),
(19, 'omar hahem', 'omarhashem321@gmail.com', 'helloooooo', 6, '2024-09-22');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `name`, `email`, `message`, `user_id`, `created_at`) VALUES
(6, 'omar hashem', 'omarhashem321@gmail.com', 'helllo eraaaaasoft', 22, '2024-09-22 09:14:02');

-- --------------------------------------------------------

--
-- Table structure for table `description`
--

CREATE TABLE `description` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `description`
--

INSERT INTO `description` (`id`, `description`, `created_at`) VALUES
(4, 'John draw real poor on call my from. May she mrs furnished discourse extremely. Ask doubt noisy shade guest Lose away off why half led have near bed. At engage simple father of period others exceptAsk doubt noisy shade guest Lose away off why half led have near bed. At engage  simple father of period', '2024-09-24 15:14:51');

-- --------------------------------------------------------

--
-- Table structure for table `features_product`
--

CREATE TABLE `features_product` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `features` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `features_product`
--

INSERT INTO `features_product` (`id`, `title`, `description`, `image`, `price`, `features`) VALUES
(1, 'Long Lasting', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.you are going a passage of Lorem Ipsum, you need be sure there isn\'t anything embarrassing hidden in the middle of text.', 'feature_product_1.png', 70.00, 'It is a long established fact that,Many desktop publishing,Various versions have evolved over the years,sometimes by accident,There are many variations of passages,If you are going to use a,Alteration in some form, by injected'),
(2, 'Impressive Distance', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.you are going a passage of Lorem Ipsum, you need be sure there isn\'t anything embarrassing hidden in the middle of text.', 'feature_product_1.png', 90.00, 'It is a long established fact that,Many desktop publishing,Various versions have evolved over the years,sometimes by accident,There are many variations of passages,If you are going to use a,Alteration in some form, by injected');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `feedback_text` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `image`, `feedback_text`, `user_id`, `user_title`) VALUES
(1, 'team_1.jpg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45', 5, 'CEO of SunPark'),
(2, 'team_2.jpg', 'College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites', 6, 'Manager of AZ'),
(3, 'team_3.jpg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even', 7, 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `payment_method` enum('credit_card','paypal','bank_transfer','cod') NOT NULL,
  `address` varchar(255) NOT NULL,
  `address_op` varchar(255) DEFAULT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `country` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `status` enum('pending','processing','shipped','completed') NOT NULL DEFAULT 'pending',
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `order_notes` text DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `tracking_number` char(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `total_amount`, `payment_method`, `address`, `address_op`, `first_name`, `last_name`, `company_name`, `country`, `city`, `state`, `status`, `phone`, `email`, `order_notes`, `order_date`, `tracking_number`) VALUES
(42, 22, 56.00, 'credit_card', 'Street address', '', 'omar', 'hashem', '', 'cairo', 'City', 'State', 'completed', '01068296014', 'ohashem321@gmail.com', '', '2024-09-25 13:56:20', '863018');

--
-- Triggers `orders`
--
DELIMITER $$
CREATE TRIGGER `before_insert_orders` BEFORE INSERT ON `orders` FOR EACH ROW BEGIN
    DECLARE unique_number CHAR(6);
    
    -- Generate a random 6-digit number
    SET unique_number = LPAD(FLOOR(RAND() * 1000000), 6, '0');
    
    -- Ensure the tracking_number is unique
    WHILE (SELECT COUNT(*) FROM orders WHERE tracking_number = unique_number) > 0 DO
        SET unique_number = LPAD(FLOOR(RAND() * 1000000), 6, '0');
    END WHILE;
    
    -- Set the tracking_number to the new unique number
    SET NEW.tracking_number = unique_number;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `color_product` varchar(50) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `order_id`, `product_id`, `quantity`, `color_product`, `price`) VALUES
(68, 42, 1, 2, ' green', 20.00),
(69, 42, 2, 1, 'red', 100.00);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price_after_discount` decimal(10,2) DEFAULT NULL,
  `price_before_discount` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `major` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `delivery` varchar(255) DEFAULT NULL,
  `coupon` varchar(255) DEFAULT NULL,
  `coupon_value` decimal(10,2) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `stock` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `title`, `price_after_discount`, `price_before_discount`, `image`, `major`, `category_id`, `delivery`, `coupon`, `coupon_value`, `color`, `description`, `stock`) VALUES
(1, 'Meyoji Robast Drone', 20.00, 80.00, 'tranding-1.jpg', 'tranding products', 1, 'free', 'Drophut', 40.00, 'red, green, blue, white', 'Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit.\r\n          Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate,\r\n          sapien libero hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor,\r\n          lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi. Cras neque metus, consequat et blandit et, luctus a nunc.\r\n          Etiam gravida vehicula tellus, in imperdiet ligula euismod eget.', 1),
(2, 'Ut praesentium earum', 100.00, 120.00, 'tranding-2.jpg', 'tranding products', 1, 'free', 'Drone', 30.00, 'red, green', 'Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit.\r\n          Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate,\r\n          sapien libero hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor,\r\n          lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi. Cras neque metus, consequat et blandit et, luctus a nunc.\r\n          Etiam gravida vehicula tellus, in imperdiet ligula euismod eget.', 1),
(3, 'Consectetur adipisicing', 90.00, 130.00, 'tranding-3.jpg', 'tranding products', 3, 'free', 'Mevrik', 20.00, 'red, green, yellow', 'Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit.\r\n          Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate,\r\n          sapien libero hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor,\r\n          lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi. Cras neque metus, consequat et blandit et, luctus a nunc.\r\n          Etiam gravida vehicula tellus, in imperdiet ligula euismod eget.', 1),
(7, 'Meyoji Robast Drone', 150.00, 190.00, 'other_collections_1.jpg', 'other collections', 1, 'free', 'Drfle', 10.00, 'red, green,white', 'Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit.\r\n            Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate,\r\n            sapien libero hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor,\r\n            lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi. Cras neque metus, consequat et blandit et, luctus a nunc.\r\n            Etiam gravida vehicula tellus, in imperdiet ligula euismod eget.', 1),
(11, 'Ut praesentium earum', 0.00, 70.00, 'feature_product_1.jpg', '', 1, 'free', '', 0.00, 'brown, gray, red, green', 'Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit.\r\n          Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate,\r\n          sapien libero hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor,\r\n          lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi. Cras neque metus, consequat et blandit et, luctus a nunc.\r\n          Etiam gravida vehicula tellus, in imperdiet ligula euismod eget.', 1),
(12, 'Consectetur adipisicing', 120.00, 150.00, 'other_collections_3.jpg', 'other collections', 1, 'free', '', 0.00, 'green, blue', 'Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit.\r\n            Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate,\r\n            sapien libero hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor,\r\n            lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi. Cras neque metus, consequat et blandit et, luctus a nunc.\r\n            Etiam gravida vehicula tellus, in imperdiet ligula euismod eget.', 0),
(47, 'Nulla fugit aliquid', 367.00, 842.00, 'other_collections_2.jpg', '', 2, 'not free', 'dro', 56.00, 'red, blue', 'Ipsum sapiente tene', 1),
(48, 'Quo ut elit eius ap', 140.00, 942.00, 'other_collections_1.jpg', 'other collections', 1, 'free', 'fr', 49.00, 'green', 'Molestiae commodi ap', 1);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `you_review` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rating` int(11) DEFAULT 0,
  `product_id` int(11) DEFAULT NULL,
  `created_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `you_review`, `name`, `email`, `rating`, `product_id`, `created_at`) VALUES
(4, 'review', 'omar hahem', 'omarhashem321@gmail.com', 2, 7, '2024-09-20'),
(6, 'new review 2', 'omar hahem', 'omarhashem321@gmail.com', 2, 2, '2024-09-21'),
(15, 'hello eraasoft', 'omar hahem', 'omarhashem321@gmail.com', 5, 2, '2024-09-22'),
(16, 'hello eraasoft', 'omar hahem', 'omarhashem321@gmail.com', 5, 3, '2024-09-22'),
(17, 'hello erasoft', 'omar hahem', 'omarhashem321@gmail.com', 5, 7, '2024-09-22'),
(18, 'hello eraasoft', 'omar hahem', 'omarhashem321@gmail.com', 5, 12, '2024-09-22'),
(19, 'helooooo', 'omar hahem', 'omarhashem321@gmail.com', 3, 7, '2024-09-22'),
(22, 'review', 'omar hahem', 'omarhashem321@gmail.com', 3, 1, '2024-09-22'),
(23, 'review new ', 'omar ', 'ohashem321@gmail.com', 3, 1, '2024-09-24'),
(24, 'neww', 'omar ', 'ohashem321@gmail.com', 5, 1, '2024-09-24');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `major` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `icon`, `title`, `description`, `major`) VALUES
(1, 'shipping1.png', 'Free Shipping', 'Free shipping on all US order', 'home'),
(2, 'shipping2.png', 'Support 24/7', 'Contact us 24 hours a day', 'home'),
(3, 'shipping3.png', '100% Money Back', 'You have 30 days to Return', 'home'),
(4, 'shipping4.png', 'Payment Secure', 'We ensure secure payment', 'home'),
(5, 'about_icon_1.png', 'Money Back Guarantee\r\n', 'Erat metus sodales eget dolor consectetuer, porta ut purus at et alias, nulla ornare velit amet', 'about'),
(6, 'about_icon_2.png', 'Creative Design\r\n', 'Erat metus sodales eget dolor consectetuer, porta ut purus at et alias, nulla ornare velit amet', 'about'),
(7, 'about_icon_3.png', 'High Quality\r\n', 'Erat metus sodales eget dolor consectetuer, porta ut purus at et alias, nulla ornare velit amet', 'about'),
(8, '', '', 'John draw real poor on call my from. May she mrs furnished discourse extremely. Ask doubt noisy shade guest Lose away off why half led have near bed. At engage simple father of period others exceptAsk doubt noisy shade guest Lose away off why half led have near bed. At engage simple father of period others except', 'footer');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `slider_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` varchar(255) DEFAULT NULL,
  `offer_text` text DEFAULT NULL,
  `offer_discount` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`slider_id`, `title`, `sub_title`, `offer_text`, `offer_discount`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Next level of Drone', 'Insane Quality for use', 'Special offer this week', '20% off', 'slider_1.png', '2024-09-16 04:22:39', '2024-09-16 04:26:25'),
(2, 'Best Camera Included', '100% Flexible', 'exclusive offer this week', '20% off', 'slider_2.png', '2024-09-16 04:22:39', '2024-09-16 04:26:34'),
(3, 'With some gifts', 'Special one for you', 'exclusive offer this week', '20% off', 'slider_3.png', '2024-09-16 04:22:39', '2024-09-16 04:26:41');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` int(11) NOT NULL,
  `link_url` varchar(255) DEFAULT NULL,
  `link_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `link_url`, `link_name`) VALUES
(6, 'http://facebook.com', 'facebook'),
(7, 'http://twitter.com', 'twitter'),
(8, 'http://instagram.com', 'instagram'),
(9, 'http://linkedin.com', 'linkedin'),
(10, 'http://rss.com', 'rss'),
(18, 'http://tiktok.com', 'tiktok'),
(19, 'http://youtube.com', 'youtube');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(11) DEFAULT NULL,
  `role` enum('Admin','User','Moderator','Employee') NOT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `phone_number`, `role`, `job_title`, `created_at`, `image`) VALUES
(5, 'John Carter', 'Test!Password1', 'john@example.com', '01068296014', 'Employee', 'John Carter', '2024-09-18 21:49:35', 'team_1.jpg'),
(6, 'Mary Marlive', 'Test!Password1', 'mary@example.com', '01066496424', 'Employee', 'Mary Marlive', '2024-09-18 21:51:25', 'team_2.jpg'),
(7, 'Michael Corn\r\n', 'Test!Password1', 'michael@example.com', '01068496425', 'Employee', 'Quality Controller\r\n', '2024-09-18 21:52:17', 'team_3.jpg'),
(8, 'James Troops', 'Test!Password1', 'james@example.com', '01078226011', 'Employee', 'Program assistant', '2024-09-18 21:53:15', 'team_4.jpg'),
(17, 'ahmedhashem', 'Test!Password1', 'ahmedhashem@gmail.com', '01000496424', 'Admin', NULL, '2024-09-20 08:24:16', NULL),
(22, 'omar hahem', 'Test!Password2', 'omarhashem321@gmail.com', '01068296014', 'User', NULL, '2024-09-22 08:24:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `title`, `price`, `image`, `created_at`) VALUES
(45, 22, 'Consectetur adipisicing', 120.00, 'other_collections_3.jpg', '2024-09-25 13:55:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `awesome_features`
--
ALTER TABLE `awesome_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_id` (`blog_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `description`
--
ALTER TABLE `description`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features_product`
--
ALTER TABLE `features_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `tracking_number` (`tracking_number`),
  ADD KEY `orders_ibfk_1` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `unique_email` (`email`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `awesome_features`
--
ALTER TABLE `awesome_features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `description`
--
ALTER TABLE `description`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `features_product`
--
ALTER TABLE `features_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `fk_contact_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
