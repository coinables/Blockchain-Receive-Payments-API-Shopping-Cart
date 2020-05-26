-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 24, 2020 at 11:30 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderid` varchar(50) NOT NULL,
  `time` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `address2` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(30) NOT NULL,
  `zip` varchar(15) NOT NULL,
  `country` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cost` decimal(7,4) NOT NULL,
  `recd` int(11) NOT NULL,
  `payto` varchar(100) NOT NULL,
  `items` varchar(300) NOT NULL,
  `paid` int(1) NOT NULL,
  `complete` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderid`, `time`, `name`, `address`, `address2`, `city`, `state`, `zip`, `country`, `email`, `cost`, `recd`, `payto`, `items`, `paid`, `complete`) VALUES
('123', 12345, 'Satoshi N', '1 Bit Way', 'Suite 256', 'Anytown', 'CA', '92121', 'United States', 'satoshi@vistomail.com', '0.1500', 15200000, '1J9ikqFuwrzPbczsDkquA9uVYeq6dEehsj', '1000 1001', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `image` varchar(300) NOT NULL,
  `in_stock` int(1) NOT NULL DEFAULT 1,
  `description` mediumtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `in_stock`, `description`) VALUES
(1000, 'Bitcoin Window Decal', '4.00', 'http://i.stack.imgur.com/m9uaE.png', 1, 'GREAT GIFT! Bitcoin Accepted Here Sticker For Inside Window is for indoor use, non water proof, for merchants. This sticker applies inside on glass or any other transparent surface. Printed on self-adhesive vinyl with easy peel-and-stick back using high quality inks with protective PVC coating. Available in Opaque (white). No minimum order.'),
(1001, 'Physical Bitcoins', '20.00', 'https://www.casascius.com/silvercoin.jpg', 1, 'Bag of 100<br> <b>How they work:</b><br> The \"private key\" is on a card embedded inside the coin and is protected by a tamper-evident hologram.  The hologram leaves behind a honeycomb pattern if it is peeled. If the hologram is intact, the bitcoin is good. If you have purchased a 2-factor item, the private key is encrypted and will need to be decrypted using your original preselected passphrase before you can redeem the funds.\r\n\r\nThe 8-character code you see on the outside of the coin is the first eight characters of the Bitcoin address assigned specifically to that coin.  You can verify the coin\'s balance on Block Explorer.  There is a mathematical relationship between the Bitcoin address and the private key inside the coin. The digital bitcoin is actually located on the public \"block chain\" stored on the internet, but it is completely inaccessible to anyone unless the private key from the coin is loaded into a Bitcoin wallet.\r\n\r\nTo recover the digital bitcoins, there are several ways to convert the embedded code back into a digital bitcoin so it can be spent over the internet.  Most importantly, none of the methods relies on me or any other central issuer, due to Bitcoin\'s completely decentralized design.  The embedded private key code is everything a Bitcoin client needs to find and claim the digital Bitcoins from the peer-to-peer network. For example, you can enter (or \"import\") your coin\'s private key code directly into Bitcoin clients such as Armory, Blockchain.info, or directly into Mt. Gox as a deposit method.  (Casascius coins use the \"minikey\" private key format, and the main Bitcoin.org client does not yet support redeeming minikeys.)\r\n\r\nOf course, since the face value of the coins depends on the integrity of the embedded key code, you should only accept Casascius Bitcoins bearing an undamaged Casascius hologram from others.\r\n\r\nE-mail is casascius at mc2cs.com.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
