-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2023 at 11:48 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tribalfoodphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adm_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `code` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `rs_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_id`, `username`, `password`, `email`, `code`, `date`, `rs_id`) VALUES
(1, 'admin', 'admin', 'cb.admin@amrita.edu', '', '2023-06-03 13:51:23', 143),
(6, 'MainCanteen', 'maincanteen', 'maincanteen@cb.amrita.edu', '', '2023-09-05 19:44:53', 6);

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

CREATE TABLE `dishes` (
  `d_id` int(222) NOT NULL,
  `rs_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `slogan` varchar(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img` varchar(222) NOT NULL,
  `fc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`d_id`, `rs_id`, `title`, `slogan`, `price`, `img`, `fc_id`) VALUES
(39, 19, 'Rice (Milled)', 'Paddy Cleaning - Essential removal of undesired foreign matter, paddy cleaning is given utmost importance to ensure proper functioning of the Rice Milling machinery. Rough rice is passed through a series of sieves and ', 0.00, '64c22a7ab83c2.jpeg', 13),
(40, 19, 'Puffed Rice', 'Puffed rice, also known as \"murmura\" in some regions, is a popular and lightweight cereal grain that has been processed to create airy, crisp rice kernels. The process of puffing rice involves heating the grains under high', 0.00, '64c22ea23713d.jpeg', 13),
(41, 19, 'Soya Bean ', ' Soybean, scientifically known as Glycine max, is a leguminous plant native to East Asia. It is one of the most important and versatile crops globally, primarily cultivated for its nutritious seeds. Soybeans are rich in pr', 0.00, '64c22f075a811.jpeg', 14),
(42, 19, 'Lentil', 'Lentils are small, lens-shaped legumes that belong to the pulse family. They have been a staple food in various cuisines for thousands of years, with their origins traced back to the Middle East and Central Asia. Lentils a', 0.00, '64c22f8c0a979.jpeg', 14),
(43, 19, 'Radish Leaves', 'Radish leaves, also known as radish greens, refer to the edible leafy tops of the radish plant (Raphanus sativus). These greens are often attached to the radish root when sold fresh. While radish roots are commonly consume', 0.00, '64c23019ef877.jpeg', 15),
(44, 19, 'Cabbage Leaves', 'Cabbage leaves refer to the broad, green or purple outer leaves of the cabbage plant (Brassica oleracea). Cabbage is a cruciferous vegetable that is widely cultivated and consumed around the world. The leaves of the cabbag', 0.00, '64c2305b0052b.jpeg', 15),
(45, 19, 'Black Gram', 'Black gram, scientifically known as Vigna mungo, is a highly nutritious legume widely cultivated and consumed in various parts of the world. It is also known by different names, including black lentil, urad dal, and mungo ', 0.00, '64c230ac78944.jpeg', 14),
(67, 17, 'Peacock Painting', 'A tribal peacock painting is a vibrant and culturally inspired artwork that features a peacock rendered in a tribal or indigenous artistic style. Characterized by bold lines, geometric patterns, and rich colors, the painti', 0.00, '65571752ecdca.png', 37),
(68, 17, 'Girafee Painting', 'A tribal giraffe painting is a captivating artwork that showcases the graceful and tall giraffe depicted in a tribal or indigenous artistic style. Marked by distinctive patterns, bold lines, and earthy tones, the painting ', 0.00, '655717f59e482.png', 37),
(69, 17, 'All Animals Painting', ' An \"All Animals Painting\" is a diverse and lively artwork that features a collection of various animals depicted in a unified composition. This type of painting typically captures the essence of different species through ', 0.00, '6557189c4c7ee.png', 37),
(70, 17, 'House Painting', 'House paintings can serve as a personal keepsake, a decorative element, or a means of appreciating the unique character of different homes and their surroundings.', 0.00, '65571a8c197d6.png', 38),
(71, 17, 'History Representation', 'A History Representation Tribal Painting is a compelling artwork that narrates the cultural and historical narrative of a tribe through visual storytelling. This form of tribal art encapsulates the traditions, rituals, and', 0.00, '65571ba344f79.png', 38),
(72, 17, 'Village Life ', ' A Village Life painting is a picturesque portrayal of rural existence, capturing the simplicity and charm of village living. With scenes depicting daily activities, rustic landscapes, and community interactions, these art', 0.00, '65571c45639fa.png', 38),
(73, 17, 'Ganesh Palm Leaf', 'A Ganesh Patachitra painting is a traditional Indian art form featuring Lord Ganesha, the revered elephant-headed deity, depicted in vibrant colors and intricate patterns. ', 0.00, '65571cb8de26b.png', 39),
(75, 18, 'Bear Cup', 'A Bear Cup Bamboo painting is a delightful artwork that combines the whimsy of a bear-shaped cup with the natural allure of bamboo. This composition typically features a cup shaped like a bear, set against a backdrop of ba', 0.00, '655722cec2202.png', 43),
(76, 14, 'Oven Basket', ' An Oven Basket Bamboo painting is a visually intriguing artwork that combines the utilitarian aspect of an oven basket with the organic beauty of bamboo. This composition likely showcases a bamboo basket used for baking o', 0.00, '655724b871321.png', 40),
(77, 14, 'Planter Basket', 'A Planter Basket Bamboo painting is a delightful artwork that blends the practicality of a planter basket with the natural beauty of bamboo. This composition typically features a bamboo basket designed for holding plants o', 0.00, '6557252192f3d.png', 40),
(78, 14, 'Tea Pot', 'A Tea Pot Bamboo painting is an enchanting artwork that seamlessly combines the elegance of a teapot with the natural grace of bamboo. This composition often features a tea pot crafted from bamboo, adorned with intricate d', 0.00, '6557256359568.png', 41),
(79, 14, 'Winnowing Basket', ' A Winnowing Basket Bamboo painting is a captivating artwork that merges the utilitarian essence of a winnowing basket with the organic charm of bamboo. This composition typically showcases the bamboo basket used for winno', 0.00, '655725af75941.png', 40),
(80, 18, 'Pressure Cooker', 'A Pressure Cooker Pottery painting is a unique and visually interesting artwork that combines the modern utility of a pressure cooker with the timeless appeal of pottery. This composition likely features a pressure cooker ', 0.00, '655726cd4ada9.png', 42),
(81, 18, 'Stone Mug Round', ' A Stone Mug Round Pottery painting is a charming artwork that merges the rustic allure of a stone mug with the timeless craft of pottery. This composition likely features a round pottery mug with a stone-like texture, sho', 0.00, '6557271155b5e.png', 43),
(82, 16, 'Kantha Work', 'A Kantha Work Saree is a captivating traditional Indian garment known for its exquisite embroidery. Originating from West Bengal, India, Kantha embroidery involves intricate stitching in vibrant thread colors, creating ela', 0.00, '6557275964db4.png', 32),
(83, 16, 'Kota Doria', 'A Kota Doria Saree is a traditional Indian textile originating from Kota, Rajasthan. Known for its distinctive lightweight and transparent weave, the saree is crafted from a blend of cotton and silk threads. The unique squ', 0.00, '65572792a259f.png', 32),
(84, 16, 'Blazers', ' Blazers are versatile and tailored jackets that add a touch of sophistication to a variety of outfits. Typically made of wool, cotton, or other quality fabrics, blazers are structured with lapels, buttons, and pockets, of', 0.00, '655728587a18d.png', 33),
(85, 16, 'Bed Linen', 'Bed linen refers to the textile items used for bedding, including sheets, pillowcases, duvet covers, and bed skirts. These pieces are typically made from materials like cotton, linen, or other fabrics known for their comfo', 0.00, '655728a7985c5.png', 34),
(86, 15, 'Personalised Cups', 'Personalized cups are customized drinkware items that add a personal touch to your beverage experience. These cups can be adorned with unique designs, names, photos, or messages, making them distinctive and meaningful. ', 0.00, '655729796f4f7.png', 45),
(87, 10, 'Thorn Bull ', 'A Thorn Bull Metal Tribal artwork is a striking piece that combines the strength and symbolism of a bull with the raw and intricate nature of tribal metalwork. This type of art typically features a stylized representation ', 0.00, '65572de150bbc.png', 31),
(88, 10, 'Deer Card Holder', ' A Deer Card Holder is a functional and aesthetically pleasing accessory designed to hold business cards, credit cards, or other small items. Typically made from materials like metal or resin, these holders feature a deer-', 0.00, '65572ebb1d8f6.png', 31),
(89, 10, 'Blue oxidised Chain', 'A Blue Oxidized Chain is a stylish accessory crafted from metal, typically copper or brass, that undergoes a chemical process to achieve an oxidized or patina finish. The blue oxidized color adds a distinctive and vintage-', 0.00, '65572feed133a.png', 29),
(90, 10, 'Gold and Red Neckpiece', 'A Gold and Red Neckpiece Chain is an elegant and eye-catching accessory that combines the timeless richness of gold with the vibrant allure of red. Typically crafted from materials like gold-plated metal or alloys, this ne', 0.00, '65572f9378ab6.png', 29),
(91, 13, 'Ethnic Tibetin Blue', 'An Ethnic Tibetan Blue Chain is a distinctive and culturally inspired accessory that draws from Tibetan aesthetics. Typically crafted with elements like beads, stones, or intricate metalwork, this chain features a prominen', 0.00, '65573057e1104.png', 35),
(92, 13, 'Face Chain', 'A Face Chain Tribal accessory is a bold and distinctive piece of jewelry that draws inspiration from tribal aesthetics. Typically crafted with metal elements, the face chain consists of intricate links, loops, and decorati', 0.00, '655730b54043c.png', 35),
(93, 25, 'Pesticide', 'Pesticides are substances that are meant to control pests. This includes herbicide, insecticide, nematicide, molluscicide, piscicide, avicide, rodenticide, bactericide, insect repellent, animal repellent, microbicide, fung', 0.00, '65579ad18c032.jpeg', 52);

-- --------------------------------------------------------

--
-- Table structure for table `food_category`
--

CREATE TABLE `food_category` (
  `fc_id` int(11) NOT NULL,
  `fc_name` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `rs_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food_category`
--

INSERT INTO `food_category` (`fc_id`, `fc_name`, `rs_id`) VALUES
(13, 'Cereal Grains', 19),
(14, 'Pulses and Legumes', 19),
(15, 'Green Leafy Vegetables', 19),
(29, 'Silver Oxidised', 10),
(30, 'Pots', 10),
(31, 'Artifacts', 10),
(32, 'Women', 16),
(33, 'Men', 16),
(34, 'BedSheets & Cushions', 16),
(35, 'Chains', 13),
(36, 'Bags', 13),
(37, 'Gond', 17),
(38, 'Saura', 17),
(39, 'Pattachitra', 17),
(40, 'Baskets', 14),
(41, 'Table Ware', 14),
(42, 'Cooking', 18),
(43, 'Cups', 18),
(44, 'Paintings', 15),
(45, 'Hand Made Personalised Cups', 15),
(46, 'Special Products', 15),
(47, 'Tea, Coffe & Beverages', 19),
(48, 'Honey', 19),
(49, 'Nuts', 19),
(50, 'Biscuits', 19),
(51, 'Soap, oil & shampoo', 19),
(52, 'Pests', 25);

-- --------------------------------------------------------

--
-- Table structure for table `remark`
--

CREATE TABLE `remark` (
  `id` int(11) NOT NULL,
  `date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `status` varchar(255) NOT NULL,
  `remark` mediumtext NOT NULL,
  `remarkDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `remark`
--

INSERT INTO `remark` (`id`, `date`, `status`, `remark`, `remarkDate`) VALUES
(75, '2023-11-12 10:09:27', 'packing', '', '2023-11-08 20:37:05'),
(80, '2023-11-08 20:54:47', 'closed', '', '2023-11-08 21:04:21'),
(81, '2023-11-12 05:54:38', 'closed', 'doneeeeeeee', '2023-11-12 05:56:27'),
(84, '2023-11-17 18:10:42', 'closed', 'delivered', '2023-11-12 09:26:29'),
(85, '2023-11-07 17:09:56', 'rejected', '', '2023-11-12 10:10:30'),
(86, '2023-11-17 10:53:16', 'packed', '', '2023-11-17 10:54:20'),
(87, '2023-11-17 10:53:16', 'closed', '', '2023-11-17 10:54:37');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `rs_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `address` text NOT NULL,
  `image` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`rs_id`, `title`, `address`, `image`, `created_date`) VALUES
(10, 'Metal Craft', 'Metal Craft is the art of shaping metal into beautiful and durable designs. Metal crafts can be decorative, like wall hangings, sculptures, and vases, or utilitarian, like utensils.', '64c22372039c5.jpeg', '2023-11-18 13:54:51'),
(13, 'Tribal Jewellery', 'Tribal Jewellery is a type of jewellery that is made by indigenous peoples. It is often made from natural materials such as shells, bones, feathers, and stones. ', '64c224e01206e.jpeg', '2023-11-18 13:56:45'),
(14, 'Cane & Bamboo', 'Cane and bamboo are both eco-friendly materials that are used to make a variety of products. Cane is solid and is used for furniture, construction, and other applications where a solid piece is needed. Bamboo is hollow and flexible, and can be split into thin strips for weaving.', '64c22519410d3.jpeg', '2023-11-18 13:57:28'),
(15, 'Gift & Novelties', 'Gifts and Novelties are items that are often given as presents or used for decorative purposes. They can range from small trinkets like keychains, magnets, and bookmarks to more substantial items like mugs, picture frames, and figurines.', '64c225f29230e.jpeg', '2023-11-18 13:58:57'),
(16, 'Tribal Textile', 'Tribal Textiles are textiles that are made using traditional techniques and worn as clothing. They are a global commodity for India. Tribal textiles are made using a variety of techniques, including: Hand block printing, Chanderi, Bandhani, Tie-dye, Batik.\n', '64c2265c53552.jpeg', '2023-11-18 14:10:34'),
(17, 'Tribal Painting', 'Tribal Painting is a type of body art that is typically created using natural materials such as clay, charcoal, and ochre. It is often used to represent a person\'s identity, status, or beliefs.', '64c226c48267f.jpeg', '2023-11-18 14:10:39'),
(18, 'Terracotta & Stone Pottery', 'Terracotta and Stone Pottery are traditional forms of pottery made from natural materials such as clay and stone.', '64c2271bc6a57.jpeg', '2023-11-18 14:13:18'),
(19, 'Organic & Natural Food Products', 'Organic and Natural Food Products refer to food items that are produced or grown without the use of synthetic chemicals, pesticides, or genetically modified organisms (GMOs). ', '64c22a46d75a0.jpeg', '2023-11-18 14:13:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `f_name` varchar(222) NOT NULL,
  `l_name` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `status` int(222) NOT NULL DEFAULT 1,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Gender` varchar(222) NOT NULL,
  `Date of Birth` date DEFAULT NULL,
  `Blood Group` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `username`, `f_name`, `l_name`, `email`, `phone`, `password`, `status`, `date`, `Gender`, `Date of Birth`, `Blood Group`) VALUES
(8, 'CB.EN.U4CSE20621', 'Harsha', 'Vardhan', 'tadikonda.harshavardhan24@gmail.com', '9652938412', 'a9b59d7179830e6eecae0ba954503370', 1, '2023-07-27 14:55:12', 'Male', '2003-01-24', 'A+'),
(9, 'CB.EN.U4CSE20611', 'Yash', 'chowta', 'yashoosworld@gmail.com', '9502790992', '25f9e794323b453885f5181f1b624d0b', 1, '2023-10-19 12:24:39', 'Male', '2003-01-01', 'O+'),
(39, 'CB.EN.U4CSE20603', 'Deepthi Reddy', 'Alety', 'deepthireddy03@gmail.com', '7894561233', 'fcea920f7412b5da7be0cf42b8c93759', 1, '2023-05-22 19:06:47', 'Female', '2003-07-07', 'B+'),
(40, 'CB.EN.U4CSE20654', 'Priyatha Reddy', 'S L', 'priya@gmail.com', '9573732697', '0b1c8bc395a9588a79cd3c191c22a6b4', 1, '2023-05-22 19:07:12', 'Female', '2002-12-31', 'A+'),
(41, 'CB.EN.U4CSE20639', 'Karthik', 'Mukkanti', 'karthik@gmail.com', '9874563217', '02adcec2263d2127269fcd769c33f029', 1, '2023-05-22 19:07:15', 'Male', '2003-04-08', 'O+'),
(42, 'CB.EN.U4MEE20144', 'Sreedhar', ' Balaji G ', 'sreedhar@gmail.com', '7412589632', '64e1b13a22d3ae8ebf72ec3e2a0eb213', 1, '2023-05-22 19:07:18', 'Male', '2003-06-28', 'A+'),
(43, 'CB.EN.U4CSE20271', 'Ashish   ', 'Yenepuri ', 'ashish@gmail.com', '8965471235', '7b69ad8a8999d4ca7c42b8a729fb0ffd', 1, '2023-05-22 19:07:21', 'Male', '2003-10-03', 'B+'),
(44, 'CB.EN.U4ECE20213', 'Dharun', 'Kumar S', 'dharun@gmail.com', '7894561236', '4ccd8a3d5219d3145fe00f00bc843aec', 1, '2023-05-22 19:07:24', 'Male', '2003-08-26', 'O+'),
(45, 'CB.EN.U4ELC20017', 'Saketh', 'Desini', 'saketh@gmail.com', '8523697412', '47097357fa18466c03efe81b056677d0', 1, '2023-05-22 19:07:29', 'Male', '2003-03-10', 'A+'),
(46, 'CB.EN.U4CSE20143', 'Mahesh Sai', 'Mullapudi', 'mahesh@gmail.com', '7891236548', '49bb197bec17b7d20b2df6b1f3c3434a', 1, '2023-05-22 19:07:31', 'Male', '2003-02-01', 'O+'),
(49, 'yash664', 'yash', 'asvi', 'yash@gmail.com', '9502790992', 'e10adc3949ba59abbe56e057f20f883e', 1, '2023-09-06 09:32:22', '', NULL, ''),
(50, 'hash664', 'harsh', 'vardham', 'snj@gmail.com', '7894561230', 'e10adc3949ba59abbe56e057f20f883e', 1, '2023-09-06 09:53:47', '', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `users_orders`
--

CREATE TABLE `users_orders` (
  `o_id` int(222) NOT NULL,
  `u_id` int(222) NOT NULL,
  `title` varchar(222) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `quantity` int(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(222) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'packing',
  `date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_orders`
--

INSERT INTO `users_orders` (`o_id`, `u_id`, `title`, `quantity`, `price`, `status`, `date`) VALUES
(5, 8, 'Radish Leaves', 1, 60.00, 'closed', '2023-10-26 13:06:23'),
(6, 8, 'Radish Leaves', 1, 60.00, 'closed', '2023-10-26 13:05:46'),
(16, 9, 'Black Gram', 1, 50.00, 'closed', '2023-10-26 13:04:09'),
(17, 9, 'Puffed Rice', 1, 50.00, 'packed', '2023-10-26 13:09:59'),
(18, 9, 'Rice (Milled)', 2, 20.00, 'closed', '2023-11-17 18:08:52'),
(19, 9, 'Black Gram', 1, 50.00, 'closed', '2023-10-26 13:04:48'),
(20, 9, 'Puffed Rice', 1, 50.00, 'closed', '2023-10-19 12:13:48'),
(21, 9, 'Rice (Milled)', 1, 20.00, 'closed', '2023-11-17 18:08:47'),
(22, 9, 'Radish Leaves', 1, 60.00, 'closed', '2023-10-26 13:08:12'),
(23, 9, 'Cabbage Leaves', 1, 300.00, 'closed', '2023-11-17 18:08:43'),
(25, 49, 'Puffed Rice', 1, 50.00, 'rejected', '2023-11-07 17:09:56'),
(26, 49, 'Puffed Rice', 1, 50.00, 'packing', '2023-11-07 18:05:12'),
(27, 49, 'Black Gram', 1, 50.00, 'packing', '2023-11-07 18:21:36'),
(28, 49, 'Radish Leaves', 1, 60.00, 'packing', '2023-11-08 20:31:48'),
(29, 49, 'Soya Bean ', 1, 20.00, 'packing', '2023-11-17 18:08:35'),
(31, 49, 'Lentil', 1, 60.00, 'closed', '2023-11-17 18:08:31'),
(32, 49, 'Soya Bean ', 1, 20.00, 'closed', '2023-11-17 18:08:28'),
(33, 49, 'Lentil', 1, 60.00, 'closed', '2023-11-17 18:08:04'),
(34, 49, 'Soya Bean ', 1, 20.00, 'closed', '2023-11-17 18:07:55'),
(35, 8, 'Cabbage Leaves', 1, 300.00, 'closed', '2023-11-17 18:07:51'),
(36, 8, 'Lentil', 2, 60.00, 'closed', '2023-11-17 18:08:00'),
(37, 8, 'Rice (Milled)', 3, 20.00, 'closed', '2023-11-17 18:08:21'),
(38, 8, 'Puffed Rice', 4, 50.00, 'closed', '2023-11-12 05:54:38'),
(39, 8, 'Ethnic Tibetin Blue', 1, 2999.00, 'closed', '2023-11-17 10:53:16'),
(40, 8, 'Puffed Rice', 1, 300.00, 'packing', '2023-11-18 19:16:43'),
(41, 8, 'Puffed Rice', 1, 300.00, 'packing', '2023-11-18 19:18:25'),
(42, 8, 'Rice (Milled)', 1, 300.00, 'packing', '2023-11-18 19:18:25'),
(43, 8, 'Puffed Rice', 1, 300.00, 'packing', '2023-11-18 19:46:19'),
(44, 8, 'Lentil', 1, 300.00, 'packing', '2023-11-19 18:53:20'),
(45, 8, 'Black Gram', 1, 300.00, 'packing', '2023-11-19 18:53:20'),
(46, 8, 'Radish Leaves', 1, 300.00, 'packing', '2023-11-19 18:53:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `food_category`
--
ALTER TABLE `food_category`
  ADD PRIMARY KEY (`fc_id`);

--
-- Indexes for table `remark`
--
ALTER TABLE `remark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`rs_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `users_orders`
--
ALTER TABLE `users_orders`
  ADD PRIMARY KEY (`o_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dishes`
--
ALTER TABLE `dishes`
  MODIFY `d_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `food_category`
--
ALTER TABLE `food_category`
  MODIFY `fc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `remark`
--
ALTER TABLE `remark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `rs_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users_orders`
--
ALTER TABLE `users_orders`
  MODIFY `o_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
