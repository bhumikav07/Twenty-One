-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2021 at 08:25 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `twenty-one`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `order_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `item_id` int(11) NOT NULL,
  `item_brand` varchar(200) NOT NULL,
  `item_cat` varchar(200) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` double(10,2) NOT NULL,
  `item_desc` varchar(100) NOT NULL,
  `item_spec` varchar(100) NOT NULL,
  `item_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`item_id`, `item_brand`, `item_cat`, `item_name`, `item_price`, `item_desc`, `item_spec`, `item_image`) VALUES
(1, 'Campus Sutra', 'MEN', 'Men Black solid Windcheater Bomber', 1999.00, 'Black solid jacket, has a hooded, 2 pockets, zip closure, long sleeves, straight hem, and polyester ', 'Sleeve Length\r\nLong Sleeves\r\nType\r\nBomber\r\nCollar\r\nHooded\r\nPrint or Pattern Type\r\nSolid\r\nFeatures\r\nW', './assets/Products/1.webp'),
(2, 'Varanga', 'WOMEN', 'Women Grey & Gold-Toned Yoke Design A-Line Kurta', 579.00, 'Grey and gold-toned yoke design A-line kurta, has a round neck, three-quarter sleeves, flared hem', 'Sleeve Length\r\nThree-Quarter Sleeves\r\nShape\r\nA-Line\r\nNeck\r\nRound Neck\r\nPrint or Pattern Type\r\nGeomet', './assets/Products/2.webp'),
(3, 'Ishin', 'WOMEN', 'Women Pink & White Printed Kurta with Palazzos', 987.00, 'Pink and white A-line calf length kurta, has a round neck, three-quarter sleeves, flared hem\r\nPink a', 'Sleeve Length\r\nThree-Quarter Sleeves\r\nTop Shape\r\nA-Line\r\nTop Type\r\nKurta\r\nBottom Type\r\nPalazzos\r\nTop', './assets/Products/3.webp'),
(4, 'Libas', 'WOMEN', 'Women Navy Blue & Sea Green Printed Kurta ', 899.00, 'Navy blue and sea green printedstraight calf length kurta, has a round neck, three-quarter sleeves, ', 'Sleeve Length\r\nThree-Quarter Sleeves\r\nTop Shape\r\nStraight\r\nTop Type\r\nKurta\r\nBottom Type\r\nPalazzos\r\nT', './assets/Products/4.webp'),
(5, 'House of Pataudi', 'MEN', 'Men Pink Chikankari Embroidered Straight Kurta', 1679.00, 'Pink chikankari embroidered straight kurta, has a mandarin collar, long sleeves, straight hem, side ', 'Sleeve Length\r\nLong Sleeves\r\nShape\r\nStraight\r\nNeck\r\nMandarin Collar\r\nPrint or Pattern Type\r\nFloral\r\n', './assets/Products/5.webp'),
(6, 'KISAH', 'MEN', 'Men Purple & White Woven Design Sherwani', 4799.00, 'Purple woven design sherwani, has a mandarin collar, a button placket, long sleeves, straight hem, m', 'Fabric\r\nSilk', './assets/Products/6.webp'),
(7, 'Hangup', 'MEN', 'Men Beige Printed Nehru Jacket', 1159.00, 'Beige printed Nehru jacket, has a mandarin collar, a full button placket, sleeveless, three pockets', 'Fabric\r\nCotton Blend\r\nNumber of Pockets\r\n3\r\nPattern\r\nPrinted\r\nWash Care\r\nHand Wash\r\nWeave Type\r\nWove', './assets/Products/7.webp'),
(8, 'MANGO', 'WOMEN', 'Women Blue Washed Denim Jacket', 2333.00, 'Blue solid denim jacket, has a spread collar, 4 pockets, button closures, long sleeves, and straight', 'Sleeve Length\r\nLong Sleeves\r\nType\r\nDenim Jacket\r\nCollar\r\nSpread Collar\r\nPrint or Pattern Type\r\nWashe', './assets/Products/8.webp'),
(9, 'Dilinger', 'MEN', 'Men Navy Blue Round Neck T-shirt', 399.00, 'Navy Blue and green colourblocked T-shirt, has a round neck, short sleeves', 'Fabric\r\nCotton\r\nFit\r\nRegular Fit\r\nLength\r\nRegular\r\nMain Trend\r\nColourblocked\r\nMultipack Set\r\nSingle\r', './assets/Products/9.webp'),
(10, 'HRX by Hrithik Roshan', 'MEN', 'Men Teal Blue Printed Round Neck T-shirt', 450.00, 'This season set a sporty fashion trend with the HRX Men\'s Athleisure T-shirt.This striped casual T-s', 'Fabric\r\nCotton\r\nFit\r\nRegular Fit\r\nLength\r\nRegular\r\nMain Trend\r\nGeometric Print\r\nMultipack Set\r\nSingl', './assets/Products/10.webp'),
(11, 'HRX by Hrithik Roshan', 'MEN', 'Men Yellow Printed Round Neck T-Shirt', 460.00, 'Keep this hip this season with the HRX Men\'s Athleisure T-shirt. This versatile T-shirt can be style', 'Fabric\r\nCotton\r\nFit\r\nRegular Fit\r\nLength\r\nRegular\r\nMain Trend\r\nTypography or Slogan Prints\r\nMultipac', './assets/Products/11.webp'),
(12, 'Red Tape\r\n', 'MEN', 'Men White Regular Fit Solid Formal Shirt', 560.00, 'White solid formal shirt, has a spread collar, long sleeves, button placket, straight hem, and 1 pat', 'Sleeve Length\r\nLong Sleeves\r\nCollar\r\nSpread Collar\r\nFit\r\nRegular Fit\r\nPrint or Pattern Type\r\nSolid\r\n', './assets/Products/12.webp'),
(13, 'Red Tape\r\n', 'MEN', 'Men Green Regular Fit Solid Formal Shirt', 580.00, 'Green solid formal shirt, has a spread collar, long sleeves, button placket, straight hem, and 1 pat', 'Sleeve Length\r\nLong Sleeves\r\nCollar\r\nSpread Collar\r\nFit\r\nRegular Fit\r\nPrint or Pattern Type\r\nSolid\r\n', './assets/Products/13.webp'),
(14, 'Roadster', 'MEN', 'Men Orange Solid Pullover Sweater', 600.00, 'Orange solid pullover sweater, has a round neck, long raglan contrast sleeves, and ribbed hem', 'Fabric\r\nCotton\r\nPattern\r\nSolid\r\nSleeve Length\r\nLong Sleeves\r\nNeck\r\nRound Neck\r\nOccasion\r\nCasual\r\nTyp', './assets/Products/14.webp'),
(15, 'Roadster', 'MEN', 'Men Navy Blue & Grey Pullover Sweater', 1100.00, 'Navy blue and grey colourblocked pullover sweater, has a hood, long sleeves, ribbed hem', 'Fabric\r\nCotton\r\nPattern\r\nColourblocked\r\nSleeve Length\r\nLong Sleeves\r\nNeck\r\nHood\r\nOccasion\r\nCasual\r\nT', './assets/Products/15.webp'),
(16, 'Hangup', 'MEN', 'Men Black Solid Suit', 2520.00, 'Black solid blazer, has a mandarin collar, full button closures, long sleeves, three pockets, double', 'Pattern\r\nSolid\r\nFabric\r\nPolyviscose\r\nCollar\r\nMandarin Collar\r\nOccasion\r\nFormal\r\nFit\r\nRegular Fit\r\nSl', './assets/Products/16.webp'),
(17, 'Louis Philippe', 'MEN', 'Men Navy Blue Solid Slim-Fit Single-Breasted Suit', 11049.00, 'Navy blue striped waistcoat, has a V-neck, a full button placket, sleeveless, two pockets\r\nNavy blue', 'Pattern\r\nSolid\r\nFabric\r\nPolyviscose\r\nCollar\r\nPeaked Lapel\r\nOccasion\r\nFormal\r\nFit\r\nSlim Fit\r\nSleeve L', './assets/Products/17.webp'),
(18, 'Mr Bowerbird', 'MEN', 'Men Rust Red Tailored Fit Striped Pullover', 1249.00, 'Rust red striped pullover , has a round neck with button closure, long sleeves, and ribbed hem', 'Fabric\r\nCotton\r\nPattern\r\nStriped\r\nSleeve Length\r\nLong Sleeves\r\nNeck\r\nRound Neck\r\nOccasion\r\nCasual\r\nC', './assets/Products/18.jpg'),
(19, 'Mr Bowerbird', 'MEN', 'Men Beige Self Design Pullover Sweater', 3999.00, 'Beige self-design pullover sweater, has a round neck, long sleeves, and ribbed hem', 'Fabric\r\nAcrylic\r\nPattern\r\nSelf Design\r\nSleeve Length\r\nLong Sleeves\r\nNeck\r\nRound Neck\r\nOccasion\r\nCasu', './assets/Products/19.jpg'),
(20, 'Indo Era', 'WOMEN', 'Women Yellow & White Printed Kurta ', 1119.00, 'Yellow and white printed straight calf length kurta, has a round neck, three-quarter sleeves, side s', 'Sleeve Length\r\nThree-Quarter Sleeves\r\nTop Shape\r\nStraight\r\nTop Type\r\nKurta\r\nBottom Type\r\nSalwar\r\nDup', './assets/Products/20.webp'),
(21, 'Ishin', 'WOMEN', 'Women Red & Orange Bandhani Print Kurta', 2249.00, 'Red, orange and pink bandhani printed anarkali kurta with gotta patti detailing, has a round neck, t', 'Sleeve Length\r\nThree-Quarter Sleeves\r\nShape\r\nAnarkali\r\nNeck\r\nRound Neck\r\nPrint or Pattern Type\r\nBand', './assets/Products/21.webp'),
(22, 'Street 9', 'WOMEN', 'Women Black Regular Fit Solid Cargos', 560.00, 'White solid mid-rise cargos, button closure, 4 pockets, cuffed hems', 'Waist Rise\r\nMid-Rise\r\nLength\r\nRegular\r\nFit\r\nRegular Fit\r\nPrint or Pattern Type\r\nSolid\r\nClosure\r\nButt', './assets/Products/22.webp'),
(23, 'Athena', 'WOMEN', 'Dramatic Entrance Lantern Sleeve Wrap Dress in Plum', 979.00, 'Designed with chic off shoulder surplice neck, self-tie bowknot at waist and statement lantern sleev', 'Shape\r\nWrap\r\nNeck\r\nOff-Shoulder\r\nLength\r\nKnee Length\r\nPrint or Pattern Type\r\nSolid\r\nSleeve Length\r\nL', './assets/Products/23.webp'),
(24, 'Sassafras', 'WOMEN', 'Women Black Solid Styled Back Maxi Dress', 1029.00, 'Black solid styled back knitted maxi dress, has a round neck, short sleeves, straight hem, slit on t', 'Shape\r\nMaxi\r\nNeck\r\nRound Neck\r\nLength\r\nMaxi\r\nPrint or Pattern Type\r\nSolid\r\nSleeve Length\r\nShort Slee', './assets/Products/24.webp'),
(25, 'Sassafras', 'WOMEN', 'Women Charcoal Black Regular Fit Solid Cargos', 720.00, 'Charcoal black solid mid-rise cargos, button closure with mock fly, and 3 pockets, cuffed hem\r\nComes', 'Waist Rise\r\nMid-Rise\r\nLength\r\nRegular\r\nFit\r\nRegular Fit\r\nPrint or Pattern Type\r\nSolid\r\nClosure\r\nButt', './assets/Products/25.webp'),
(26, 'U & F', 'WOMEN', 'Maroon & Olive Green Floral Print Maxi Shirt Dress', 696.00, 'Maroon and olive green printed woven maxi dress, has a shirt collar, short sleeves, button closure a', 'Shape\r\nMaxi\r\nNeck\r\nShirt Collar\r\nLength\r\nMaxi\r\nPrint or Pattern Type\r\nFloral\r\nSleeve Length\r\nShort S', './assets/Products/26.webp'),
(27, 'Popnetic', 'WOMEN', 'Women Maroon Striped Maxi Dress', 679.00, 'Maroon, navy blue and beige striped woven maxi dress, has a mandarin collar, three-quarter sleeves, ', 'Shape\r\nMaxi\r\nNeck\r\nMandarin Collar\r\nLength\r\nMaxi\r\nPrint or Pattern Type\r\nStriped\r\nSleeve Length\r\nThr', './assets/Products/27.webp'),
(28, 'Tokyo Talkies', 'WOMEN', 'Black Floral Print Flared Maxi Dress with a Belt', 899.00, 'Black printed woven maxi dress, has a round neck, long sleeves, concealed zip closure, attached lini', 'Shape\r\nMaxi\r\nNeck\r\nRound Neck\r\nLength\r\nMaxi\r\nPrint or Pattern Type\r\nFloral\r\nSleeve Length\r\nLong Slee', './assets/Products/28.webp'),
(29, 'U & F', 'WOMEN', 'Women Blue & Pink Printed Maxi Dress', 594.00, 'Blue and pink printed woven maxi dress with tie-up detail, has a round neck, short sleeves, and flar', 'Shape\r\nMaxi\r\nNeck\r\nRound Neck\r\nLength\r\nMaxi\r\nPrint or Pattern Type\r\nFloral\r\nSleeve Length\r\nShort Sle', './assets/Products/29.webp'),
(30, 'Campus Sutra', 'MEN', 'Men Off-White Solid Tailored Jacket', 863.00, 'Off-white solid tailored jacket, has a hooded, 2 pockets, button closure, long sleeves, straight hem', 'Sleeve Length\r\nLong Sleeves\r\nType\r\nTailored Jacket\r\nCollar\r\nHooded\r\nPrint or Pattern Type\r\nSolid\r\nLe', './assets/Products/30.webp');


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`) VALUES
(11, 'Bhavya', '$2y$10$R'),
(13, 'Tanvi', '$2y$10$l'),
(15, 'Tommy', '$2y$10$8'),
(17, 'lolly', '$2y$10$dK/UMIyHo0FYKU6aMIV56eIBtDUY4tFZXRWWsKFd5b6lzFYWDz2Ca');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`cart_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
