-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2022 at 12:58 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ofsmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 8979555558, 'admin@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2019-10-11 04:36:52');

-- --------------------------------------------------------

--
-- Table structure for table `tblbrand`
--

CREATE TABLE `tblbrand` (
  `ID` int(10) NOT NULL,
  `BrandName` varchar(120) DEFAULT NULL,
  `Logo` varchar(200) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbrand`
--

INSERT INTO `tblbrand` (`ID`, `BrandName`, `Logo`, `CreationDate`) VALUES
(1, 'Roadstar', '94cbfaab4e7a34562c24c49b36907de71585981394.png', '2019-10-11 11:57:53'),
(2, 'Tornado', 'b64810fde7027715e614449aff1d595f1570795149.png', '2019-10-11 11:59:09'),
(3, 'Kissan', '37e2b52f19da778fba43ab3c1897f8401570795197.png', '2019-10-11 11:59:57'),
(4, 'Oakley', 'f6aac84a83343a247532b533b0ef059f1570795253.png', '2019-10-11 12:00:53'),
(5, 'Manga', 'dc78d13a95344a4147b0b2657c851cda1570795311.png', '2019-10-11 12:01:51');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `ID` int(10) NOT NULL,
  `CategoryName` varchar(120) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`ID`, `CategoryName`, `CreationDate`) VALUES
(1, 'Sofas', '2019-10-12 05:23:29'),
(2, 'Tables', '2019-10-12 05:23:43'),
(3, 'Beds', '2019-10-12 05:24:00'),
(4, 'Seating', '2019-10-12 05:24:17'),
(5, 'Solids Woods', '2019-10-12 05:24:32');

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

CREATE TABLE `tblorder` (
  `ID` int(10) NOT NULL,
  `OrderNumber` varchar(200) DEFAULT NULL,
  `UserID` int(50) DEFAULT NULL,
  `FullName` varchar(200) DEFAULT NULL,
  `ContactNumber` bigint(10) DEFAULT NULL,
  `FlatNo` varchar(50) DEFAULT NULL,
  `StreetName` varchar(50) DEFAULT NULL,
  `Area` varchar(50) DEFAULT NULL,
  `Landmark` varchar(50) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `Zipcode` int(10) NOT NULL,
  `State` varchar(200) NOT NULL,
  `OrderDate` timestamp NULL DEFAULT current_timestamp(),
  `Status` varchar(50) DEFAULT NULL,
  `payType` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblorder`
--

INSERT INTO `tblorder` (`ID`, `OrderNumber`, `UserID`, `FullName`, `ContactNumber`, `FlatNo`, `StreetName`, `Area`, `Landmark`, `City`, `Zipcode`, `State`, `OrderDate`, `Status`, `payType`) VALUES
(9, '253971675', 4, 'Test2', 7897777797, 'F-789', 'Mayur Vihar Ph-1', 'Mayur Vihar', 'Near Shiv Mandir', 'New Delhi', 110096, 'New Delhi', '2020-04-08 06:11:14', 'Cancelled', 'Cash on Delivery'),
(10, '368116033', 4, 'Test2', 7987897798, 'F-789', 'Kanji', 'Mayur Vihar Ph-1', 'Near Relaince Fresh', 'Delhi', 110096, 'Delhi', '2020-04-08 06:27:11', 'Delivered', 'Cash on Delivery'),
(11, '543140442', 4, 'Anuj', 4253463434, 'BC 414', 'XYZ Strret', 'ABC', 'Cricket Stadium', 'New Delhi', 100001, 'New Delhi', '2020-05-07 08:46:25', NULL, 'Cash on Delivery'),
(12, '221850996', 5, 'Anuj kumar', 7545454545, '3423 XYZ', 'BAC Street', 'New Delhi', 'Crikcet stadium', 'New Delhi', 110001, 'New Delhi', '2020-05-07 08:54:25', 'Delivered', 'Cash on Delivery'),
(13, '320674547', 5, 'Anuj', 1236547890, '34534 XYZ', 'ABC Street', 'Noida', 'NA', 'Noida', 201301, 'UP', '2022-03-09 16:50:49', NULL, 'Cash on Delivery'),
(14, '849399829', 6, 'Joh Die', 4758963254, 'J 32423', 'HGshg', 'XYZ', 'ABC', 'Noida', 3201301, 'UP', '2022-03-27 09:53:18', 'Delivered', 'Cash on Delivery');

-- --------------------------------------------------------

--
-- Table structure for table `tblorderdetails`
--

CREATE TABLE `tblorderdetails` (
  `id` int(11) NOT NULL,
  `UserId` int(5) DEFAULT NULL,
  `OrderNumber` bigint(12) DEFAULT NULL,
  `ProductId` int(10) DEFAULT NULL,
  `ProductPrice` decimal(10,0) DEFAULT NULL,
  `ProductQty` int(10) DEFAULT NULL,
  `OrderDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblorderdetails`
--

INSERT INTO `tblorderdetails` (`id`, `UserId`, `OrderNumber`, `ProductId`, `ProductPrice`, `ProductQty`, `OrderDate`) VALUES
(4, 3, 989645529, 3, NULL, 1, '2020-03-30 14:51:31'),
(5, 3, 989645529, 22, NULL, 1, '2020-03-30 14:51:31'),
(6, 3, 989645529, 15, NULL, 1, '2020-03-30 14:51:31'),
(7, 3, 268223761, 5, NULL, 1, '2020-04-01 14:11:42'),
(8, 3, 268223761, 6, NULL, 1, '2020-04-01 14:11:42'),
(9, 3, 572683925, 19, NULL, 1, '2020-04-01 14:44:01'),
(10, 3, 603822506, 7, NULL, 1, '2020-04-01 14:51:25'),
(11, 3, 466336049, 4, NULL, 1, '2020-04-03 07:25:35'),
(12, 4, 253971675, 5, NULL, 1, '2020-04-08 06:11:14'),
(13, 4, 253971675, 16, NULL, 1, '2020-04-08 06:11:14'),
(14, 4, 368116033, 4, NULL, 1, '2020-04-08 06:27:12'),
(15, 4, 543140442, 3, NULL, 1, '2020-05-07 08:46:25'),
(16, 5, 221850996, 3, NULL, 1, '2020-05-07 08:54:26'),
(17, 5, 221850996, 22, NULL, 2, '2020-05-07 08:54:26'),
(18, 5, 320674547, 6, NULL, 1, '2022-03-09 16:50:50'),
(19, 6, 849399829, 19, NULL, 1, '2022-03-27 09:53:19'),
(20, 6, 849399829, 3, NULL, 1, '2022-03-27 09:53:19');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(120) DEFAULT NULL,
  `PageTitle` varchar(200) DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`) VALUES
(1, 'aboutus', 'About Us', '<div class=\"head\" style=\"color: rgb(33, 37, 41); font-family: \" exo=\"\" 2\",=\"\" sans-serif;=\"\" font-size:=\"\" 16px;\"=\"\"><h4 style=\"margin-bottom: 15px; line-height: 1.2; color: rgba(0, 0, 0, 0.66); font-size: 36px;\">About</h4></div><div class=\"content\" style=\"color: rgb(33, 37, 41); font-family: \" exo=\"\" 2\",=\"\" sans-serif;=\"\" font-size:=\"\" 16px;\"=\"\"><div class=\"row\" style=\"display: flex; flex-wrap: wrap;\"><div class=\"col-12 col-lg-12 col-md-12 col-sm-12\" style=\"width: 870px; -webkit-box-flex: 0; flex: 0 0 100%; max-width: 100%;\"><p style=\"margin-bottom: 1rem; line-height: 1.5; color: rgb(60, 60, 60);\">We are the pioneers in home retail in India. We started our journey in 2007 with our first store in Noida as a one-stop shop destination for home solutions. We offer a clearly defined home offering with a wide assortment in furniture, homeware, customised solutions in kitchen and wardrobes and home improvement. We strive to add value to our customers by providing personalised interior design consultation and services for homes and offices. We extended our presence online in 2016 with a specially curated assortment of product offering catering to the specific needs of the new-age online customers.</p><p style=\"margin-bottom: 1rem; line-height: 1.5; color: rgb(60, 60, 60);\">Today we have a strong presence with 49 stores across 28 cities. Our expansion plan is long-term and we plan to grow both online and new stores across in existing and new markets. We want to offer great quality home products and services to as many people as possible.</p></div></div></div>', NULL, NULL, NULL),
(2, 'contactus', 'Contact Us', 'D-204, Hole Town South West,Delhi-110096,India', 'test@test.com', 8529631236, '2019-10-16 10:32:47');

-- --------------------------------------------------------

--
-- Table structure for table `tblproducts`
--

CREATE TABLE `tblproducts` (
  `ID` int(10) NOT NULL,
  `ProductID` varchar(120) NOT NULL,
  `CatID` int(5) DEFAULT NULL,
  `SubCatid` int(5) DEFAULT NULL,
  `ProductTitle` varchar(120) DEFAULT NULL,
  `RegularPrice` varchar(120) DEFAULT NULL,
  `BrandName` varchar(120) DEFAULT NULL,
  `Quantity` int(10) DEFAULT NULL,
  `Availability` varchar(50) NOT NULL,
  `PDesc` mediumtext DEFAULT NULL,
  `SalePrice` varchar(120) DEFAULT NULL,
  `Image` varchar(120) NOT NULL,
  `Image1` varchar(120) NOT NULL,
  `Image2` varchar(120) NOT NULL,
  `Image3` varchar(120) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproducts`
--

INSERT INTO `tblproducts` (`ID`, `ProductID`, `CatID`, `SubCatid`, `ProductTitle`, `RegularPrice`, `BrandName`, `Quantity`, `Availability`, `PDesc`, `SalePrice`, `Image`, `Image1`, `Image2`, `Image3`, `CreationDate`) VALUES
(3, '605319160', 1, 2, 'Alba 3 Seater Sofa in Navy Blue Colour by Woodsworth', '42186', 'Tornado', 6, 'Instock', 'OVERVIEW\r\n\r\nWoodsworth is our premium homegrown label that’s part classic, part contemporary. A delectable amalgamation of the timeless and trendy, a precarious balance of function and flair. Woodsworth is a harmonious fit for all tastes, styles and spaces.\r\n\r\nModern Style Sofas usually come in fixed back with cushions attached to the frame. They mostly come with minimal details & compact proportions. These sofas can be with or without arms.\r\nDETAILS\r\n\r\nBrand: Woodsworth\r\n\r\nDimensions: H 33.7 x W 71.5 x D 31.5; Seating Height-17; Seating Depth : 22\r\n(all dimensions in inches)\r\n\r\nWeight: 50 KG\r\n\r\nPrimary Material: Fabric\r\n\r\nRoom Type: Living Room\r\n\r\nCollection: Alba\r\n\r\nHeight: 34.0 inches\r\n\r\nWidth: 72.0 inches\r\n\r\nDepth: 32.0 inches\r\n\r\nSeating Height: 17', '31426', 'e3168eaa92b6b2f8b1f94b77cc1cd9781585982487.jpg', 'e29602c48623aa8fec8530eb8c3253381571121368.jpg', '2e893e74252a8bcf69015a1519e71c031571121368.jpg', 'db59b22a2c12c5a6c037ddfbf15c3d051571121368.jpg', '2019-10-15 06:36:08'),
(4, '740805918', 1, 4, 'Amelia 3 Seater Sofa in Navy Blue Colour by CasaCraft', '41000', 'Tornado', 7, 'Instock', 'OVERVIEW\r\n\r\nCasacraft offers the best in comfort with élan. The collections are a series of modern trendy designs, simple yet striking and represent the ideals of minimalism. The designs are a perfect blend of functionality and exceptional aesthetics. Each piece is crafted with passion and follows international standards on quality and style.\r\n\r\nModern Style Sofas usually come in fixed back with cushions attached to the frame. They mostly come with minimal details & compact proportions. These sofas can be with or without arms.\r\n\r\nDimensions: H 34.5 x W 64 x D 31; Seating Height-18.5 (All Dimension in Inches)\r\n\r\nWeight: 32.5 KG\r\n\r\nPrimary Material: Fabric\r\n\r\nRoom Type: Living Room\r\n\r\nCollection: Amelia\r\n\r\nHeight: 35.0 inches\r\n\r\nWidth: 64.0 inches\r\n\r\nDepth: 31.0 inches\r\n\r\nSeating Height: 19', '36000', 'a5385c65ebe661368905be727f5f41bf1571122321.jpg', 'fd0f594b38967915621135a9102ecccc1571122321.jpg', '028e7f21936642561d9bfa6e705bdada1571122321.jpg', 'af11c8fd6b813600deeb6148255ccc5b1571122321.jpg', '2019-10-15 06:52:01'),
(5, '422977631', 2, 6, 'Coffee Table Walnut in Finish by F9 Furnichair', '17000', 'Kissan', 8, 'Instock', 'F9 Furniture, we take pride in offering you the finest quality furniture along with an extensive selection of customization furniture accessories that is not only certain to fit your unique taste and style, but will last for generations.\r\n\r\nCoffee Tables are low tables used in living room spaces placed in the centre of seating furniture. Used for drinks, flowers, and is a general table for placing items.\r\nDimensions: H 15.7 x W 29.5 x D 25.59, (all dimensions in inches)\r\n\r\nWeight: 21.5 KG\r\n\r\nPrimary Material: Steam Beech Wood\r\n\r\nRoom Type: Living Room\r\n\r\nHeight: 16.0 inches\r\n\r\nWidth: 30.0 inches\r\n\r\nDepth: 26.0 inches\r\n\r\nTop Material: Glass', '14000', '1e5c3acbeac8756676125e094019db551571123225.jpg', 'c3c423b8e13b7f33a0ad8cac8de599da1571123225.jpg', '2e2ec36fce6201606227cf3813e4a5c31571123225.jpg', '4d7774aa9fc83e59a4ba8d0f3ecd9d8e1571123225.jpg', '2019-10-15 07:07:05'),
(6, '406096822', 2, 7, 'Takeo Dressing Table with Stool in Walnut Finish by Mintwud', '15000', 'Oakley', 10, 'Instock', 'OVERVIEW\r\n\r\nMintwud is a classic amalgamation of form and function. Crafted for compact homes, the range is clean and convenient and has an understated design aesthetic that adapts to any space.\r\n\r\nADressing Unit is a piece of furniture that combines vanity storage and dressing mirror in one unit.\r\n\r\nDimensions: H 65.2 x W 35.4 x D 17.4; Stool : H 16.1 x W 14 x D 11.6\r\n(all dimensions in inches)\r\n\r\nWeight: 31 KG\r\n\r\nPrimary Material: Engineered Wood\r\n\r\nRoom Type: Bedroom\r\n\r\nHeight: 66.0 inches\r\n\r\nWidth: 36.0 inches\r\n\r\nDepth: 18.0 inches', '11000', 'd2bf1278616b104154a267f63afd1f921571123507.jpg', '62d452a2aa446f1f4411739f422e9f9f1571123507.jpg', '55e3ec3cd4ddc0d053fa6529c3eca42c1571123507.jpg', '0249b706077647b8d1c8f895e7bd362d1571123507.jpg', '2019-10-15 07:11:47'),
(7, '829527247', 2, 31, 'Florito Solid Wood Dresser in Honey Oak Finish by Woodsworth', '24000', 'Manga', 12, 'Instock', 'OVERVIEW\r\n\r\nWoodsworth is our premium homegrown label that’s part classic, part contemporary. A delectable amalgamation of the timeless and trendy, a precarious balance of function and flair. Woodsworth is a harmonious fit for all tastes, styles and spaces.\r\n\r\nA Dresser is a dressing table that has chest of drawers as the base and usually a mirror on the top.\r\nDimensions: Mirror : H 46 x W 16 x D 1.2; Table : H 22 x W 16 x D 13\r\n(all dimensions in inches)\r\n\r\nWeight: 22 KG\r\n\r\nColour: Honey Oak\r\n\r\nPrimary Material: Sheesham Wood\r\n\r\nRoom Type: Bedroom\r\n\r\nCollection: Florito\r\n\r\nHeight: 46.0 inches\r\n\r\nWidth: 16.0 inches\r\n\r\nDepth: 13.0 inches', '17000', 'f8e70f6b7256e187103d79c9a82037761571124510.jpg', 'a81c6e0e813c0c8c6d0bdb91d33975b21571124510.jpg', '41f28c0c003563b49ac1685b30fa6bdb1571124510.jpg', 'f8e70f6b7256e187103d79c9a82037761571124510.jpg', '2019-10-15 07:28:30'),
(8, '699602396', 2, 9, 'Slade Study Table by RoyalOak', '16000', 'Oakley', 5, 'Instock', 'OVERVIEW\r\n\r\nFurniture\'s is the leading organized distributor & retailer in India.ROYALOAK assures international standard of quality & excellence. With our decades of experience and expertise we are proud to bring you the biggest collection of furniture in the country - like sofas, living room furniture, Office Furniture, Bedroom Furniture, Utility Furniture, and Outdoor Furniture in unbeatable quality, ultimate comfort and admiration with honest pricing policy.\r\n\r\nIndustrial Style depicts a raw, unfinished, earthy and elemental look. As the name implies, it draws inspiration from warehouses and urban lofts – it’s a style which celebrates contrasts. It’s coming together of opposing materials to create a cohesive format. It’s a fusion of old with the new, the bold with muted colours, the shiny with distressed finish, the knotty with the even tones, the solids with the patterned fabrics, or the functional with the outlandish.\r\n\r\nWriting Tables are a piece of furniture with a surface for writing on, with drawers and compartments for storing writing material. Writing Tables take up less space than computer desks. If you are looking for just a single table, writing desks are good to go. They are also advisable if you only use your laptop to check your social media every once in a while. Computer desks are usually bulkier.\r\nDimensions: H 30 x W 47.5 x D 23.5\r\n\r\nWeight: 55 KG\r\n\r\nPrimary Material: Engineered Wood\r\n\r\nRoom Type: Office Furniture\r\n\r\nHeight: 30.0 inches\r\n\r\nWidth: 48.0 inches\r\n\r\nDepth: 24.0 inches', '7900', 'e4551b5f1611db2e23c3b2159edd11c91571124977.jpg', '62637fba9d936ff9a1903e260662c55b1571124977.jpg', '95377ccb2f85e6c8e629dd763e661bea1571124977.jpg', '80fcdd6ac20bd085c6629686be0699f91571124977.jpg', '2019-10-15 07:36:17'),
(9, '770450051', 1, 3, 'Alba LHS 2 Seater Sofa with Lounger in Ash Grey Colour by Woodsworth', '60000', 'Kissan', 16, 'Instock', 'OVERVIEW\r\n\r\nWoodsworth is our premium homegrown label that’s part classic, part contemporary. A delectable amalgamation of the timeless and trendy, a precarious balance of function and flair. Woodsworth is a harmonious fit for all tastes, styles and spaces.\r\n\r\nModern Style Sofas usually come in fixed back with cushions attached to the frame. They mostly come with minimal details & compact proportions. These sofas can be with or without arms.\r\n\r\nDimensions: Sofa : H 34 x W 45.5 x D 31.5; Lounger :H 34 x W 33.5 x D 64; Seating Height - 17\r\n(all dimensions in inches)\r\n\r\nWeight: 72 KG\r\n\r\nPrimary Material: Fabric\r\n\r\nRoom Type: Living Room\r\n\r\nCollection: Alba\r\n\r\nHeight: 34.0 inches\r\n\r\nWidth: 79.0 inches\r\n\r\nDepth: 32.0 inches\r\n\r\nSeating Height: 17', '47000', 'f8f2987d4cd4e7a718006563bf98e1211571125313.jpg', '928f4b7282999d31dfd867a93acdfc2d1571125313.jpg', '8f8c02493ea80bcb153a6593cbbfdc191571125313.jpg', 'ceffd1c7ebcc6bdf47ba28daa47922b81571125313.jpg', '2019-10-15 07:41:53'),
(10, '994546968', 1, 3, 'Three Seater Sofa with Lounger in Crimson Red Colour by Furnitech', '68000', 'Tornado', 6, 'Instock', 'OVERVIEW\r\n\r\nFURNITECH - Incorporated in 1997, FURNITECH SEATING SYSTEMS is grown to Indias largest upholstered company . A passion for design and quality , a strong undying spirit and a set of skilled hand and experience has made FURNITECH a prestigious brand in the country.\r\n\r\nModern Style Sofas usually come in fixed back with cushions attached to the frame. They mostly come with minimal details & compact proportions. These sofas can be with or without arms.\r\n\r\nDimensions: Three Seater : H 26 x W 64 x D 31; Lounger : H 26 x W 30 x D 55; Seating Height - 16\r\n(all dimensions in inches)\r\n\r\nDesign: Adelia\r\n\r\nWeight: 68 KG\r\n\r\nPrimary Material: Fabric\r\n\r\nRoom Type: Living Room\r\n\r\nHeight: 26.0 inches\r\n\r\nWidth: 94.0 inches\r\n\r\nDepth: 55.0 inches\r\n\r\nSeating Height: 16', '59000', 'efede5d219eb743a84090a2c6d57ac411571125637.jpg', '64559cb921daea2692c99066546aa7161571125637.jpg', '9eca746301f23e338d1a7f82eb9904691571125637.jpg', 'b504b874131dd923116a6259f5c93c2e1571125637.jpg', '2019-10-15 07:47:17'),
(11, '953524437', 1, 4, 'LHS Sofa with Motorized Recliner by Durian', '120000', 'Manga', 3, 'Instock', 'OVERVIEW\r\n\r\nDurian is the industries foremost brand, creating beautiful spaces for you within your homes and offices since 1985. With a successful start by importing our furniture we now have 9 factories that manufactures furniture such as Sofas, Beds, Tables, Dining sets and Office Desks & Chairs. We are humbled to have touched the lives of millions of people with our range of world class home and office furniture, innovative laminates, sturdy designer doors, exquisite veneers and top-grade plywood.', '98000', 'aa95fd13edd9ad6005bd0f6231a712551571136333.jpg', '957d4fff1a71d3315d36135a736584761571136333.jpg', '36a79095ca2f105ef7a1a5d79a55eb8e1571136333.jpg', 'c256148230f50a4511b13c34741d84561571136333.jpg', '2019-10-15 10:45:33'),
(12, '768121665', 1, 4, 'Sleek 3 Seater Recliner in Brown Colour', '102000', 'Roadstar', 6, 'Instock', 'OVERVIEW\r\n\r\nStar India specializes in offering the latest and in trend furniture designs at very affordable prices with great selection in modern furniture designs and display.\r\nDimensions: H 39 x W 70 x D 32;Seating Height-17 (all dimension in inches)\r\n\r\nColour: Brown\r\n\r\nPrimary Material: Half Leather\r\n\r\nRoom Type: Living Room\r\n\r\nHeight: 39.0 inches\r\n\r\nWidth: 70.0 inches\r\n\r\nDepth: 32.0 inches\r\n\r\nRecliner Mechanism: Manual', '80000', 'd6a1767a697446037cc201fed5a999b51571136714.jpg', '81e15317db7652ba1b7993635ad3b98e1571136714.jpg', '184c5786770e698f7e340cd54ce9363c1571136714.jpg', 'c8441043740a24a3d89449639deb45331571136714.jpg', '2019-10-15 10:51:54'),
(13, '684003221', 1, 5, '3 Seater Sofa in Grey colour', '59000', 'Tornado', 5, 'Instock', 'OVERVIEW\r\n\r\nHometown is one stop destination for all the latest and trendy furniture. All Hometown products are designed and developed with you in mind, and have gone through rigorous quality inspection and conform to the best quality standards in the industry.\r\n\r\nModern Style Sofas usually come in fixed back with cushions attached to the frame. They mostly come with minimal details & compact proportions. These sofas can be with or without arms.\r\n\r\nDimensions: H 34 x W 72 x D 35\r\n\r\nWeight: 13 KG\r\n\r\nPrimary Material: Pine Wood\r\n\r\nRoom Type: Living Room\r\n\r\nHeight: 22.0 inches\r\n\r\nWidth: 72.0 inches\r\n\r\nDepth: 35.0 inches\r\n\r\nSeating Height: 11', '16000', '964a9a1624fce976230bd409054ecbcc1571136971.jpg', 'fa0dbfdb1b3f6896a1f718be6c4177331571136971.jpg', '9a102de306f28b0e90ce64fc95fc563a1571136971.jpg', '5cbf21cecfb768d8c16bd511fe28432d1571136971.jpg', '2019-10-15 10:56:11'),
(14, '506105555', 3, 11, 'Segur Solid Wood Single Bed with Storage in Honey Oak Finish', '49000', 'Tornado', 8, 'Instock', 'OVERVIEW\r\n\r\nWoodsworth is our premium homegrown label thats part classic, part contemporary. A delectable amalgamation of the timeless and trendy, a precarious balance of function and flair. Woodsworth is a harmonious fit for all tastes, styles and spaces.\r\n\r\nModern is a distinct, defined style which originated in the early 1900s. It uses a combination of vinyl, steel, plastic, glass or wood having monochromatic colors and sleek silhouettes. Modern furniture lives at the intersection of clean lines and relaxed comfort accentuating form and function.\r\n\r\nDimensions: Bed: H 39 x W 38 x D 84; Seating Height - 15; Mattress Size -36 x 78(Not Included)\r\n(all dimensions in inches)\r\n\r\nWeight: 85.4 KG\r\n\r\nColour: Honey Oak\r\n\r\nPrimary Material: Sheesham Wood\r\n\r\nRoom Type: Bedroom\r\n\r\nCollection: Segur\r\n\r\nStorage: Drawer Storage\r\n\r\nHeight: 39.0 inches\r\n\r\nWidth: 38.0 inches\r\n\r\nDepth: 84.0 inches\r\n\r\nSeating Height: 15', '17000', '73792f727f1e4af5852f7ae084c6b8841571137453.jpg', 'ae05abb63bc948ce3ba36c960a16dda11571137453.jpg', '67fae6328758dd316afeaaf060d53bd91571137453.jpg', '2ff18d699eb38b50d3fc2c6ceea39ede1571137453.jpg', '2019-10-15 11:04:13'),
(15, '308870493', 3, 11, 'Bianca Solid Wood Single Bed in White Finish', '45000', 'Kissan', 9, 'Instock', 'OVERVIEW\r\n\r\nWoodsworth is our premium homegrown label that’s part classic, part contemporary. A delectable amalgamation of the timeless and trendy, a precarious balance of function and flair. Woodsworth is a harmonious fit for all tastes, styles and spaces.\r\n\r\nModern is a distinct, defined style which originated in the early 1900’s. It uses a combination of vinyl, steel, plastic, glass or wood having monochromatic colors and sleek silhouettes. Modern furniture lives at the intersection of clean lines and relaxed comfort accentuating form and function.\r\n\r\nDimensions: H 34 x W 39 x D 81; Seating Height-14; Mattress Not Included\r\n\r\nColour: White\r\n\r\nPrimary Material: Mango Wood\r\n\r\nRoom Type: Bedroom\r\n\r\nStorage: No Storage\r\n\r\nHeight: 34.0 inches\r\n\r\nWidth: 38.0 inches\r\n\r\nDepth: 82.0 inches\r\n\r\nSeating Height: 14', '14000', '2fbe5d243a1c61e1029123f1c00eb7281571137710.jpg', '619cd8cc2aac4533da411380251259221571137710.jpg', 'a5e1d82024f35f9ed264d4f7724094b61571137710.jpg', 'efdf9c54c497a8f64248d7125e528c0b1571137710.jpg', '2019-10-15 11:08:30'),
(16, '593920243', 3, 12, 'Bianca Solid Wood  Bed with Storage in White Finish', '74000', 'Kissan', 10, 'Instock', 'OVERVIEW\r\n\r\nWoodsworth is our premium homegrown label thats part classic, part contemporary. A delectable amalgamation of the timeless and trendy, a precarious balance of function and flair. Woodsworth is a harmonious fit for all tastes, styles and spaces.\r\n\r\nModern is a distinct, defined style which originated in the early 1900s. It uses a combination of vinyl, steel, plastic, glass or wood having monochromatic colors and sleek silhouettes. Modern furniture lives at the intersection of clean lines and relaxed comfort accentuating form and function.\r\n\r\nDimensions: H 34 x W 75 x D 81; Seating Height-14; Mattress Not Included\r\n\r\nWeight: 124 KG\r\n\r\nColour: White\r\n\r\nPrimary Material: Mango Wood\r\n\r\nRoom Type: Bedroom\r\n\r\nStorage: Drawer Storage\r\n\r\nHeight: 34.0 inches\r\n\r\nWidth: 74.0 inches\r\n\r\nDepth: 82.0 inches\r\n\r\nSeating Height: 14', '64000', '36a5f94ad5e3e33c79c94d629f4191ff1571138066.jpg', '36a5f94ad5e3e33c79c94d629f4191ff1571138066.jpg', 'f5713fbcf3e56d3548c6e983b392e03b1571138066.jpg', 'f5713fbcf3e56d3548c6e983b392e03b1571138066.jpg', '2019-10-15 11:14:26'),
(17, '254998557', 3, 13, 'Florito Solid Wood  Bed in Provincial Teak Finish', '62000', 'Oakley', 10, 'Instock', 'OVERVIEW\r\n\r\nWoodsworth is our premium homegrown label thats part classic, part contemporary. A delectable amalgamation of the timeless and trendy, a precarious balance of function and flair. Woodsworth is a harmonious fit for all tastes, styles and spaces.\r\n\r\nDimensions: H 37 x W 74 x D 81; Seating Height-12; Mattress Not Included\r\n\r\nWeight: 81 KG\r\n\r\nColour: Provincial Teak\r\n\r\nPrimary Material: Sheesham Wood\r\n\r\nRoom Type: Bedroom\r\n\r\nCollection: Florito\r\n\r\nStorage: No Storage\r\n\r\nHeight: 37.0 inches\r\n\r\nWidth: 74.0 inches\r\n\r\nDepth: 81.0 inches\r\n\r\nSeating Height: 12', '48000', '9cc53a360ca3f7c26e250091183f2bf11571138327.jpg', 'efdf9c54c497a8f64248d7125e528c0b1571138327.jpg', '67fae6328758dd316afeaaf060d53bd91571138327.jpg', '9cc53a360ca3f7c26e250091183f2bf11571138327.jpg', '2019-10-15 11:18:47'),
(18, '479059366', 3, 13, 'Tesseract Solid Wood Bed with Storage in Warm Walnut Finish', '110000', 'Manga', 10, 'Instock', 'OVERVIEW\r\n\r\nWoodsworth is our premium homegrown label that’s part classic, part contemporary. A delectable amalgamation of the timeless and trendy, a precarious balance of function and flair. Woodsworth is a harmonious fit for all tastes, styles and spaces.\r\n\r\nDimensions: H 35.4 x W 73.6 x D 79.9; Seating Height-15; Mattress Not Included\r\n\r\nWeight: 115.6 KG\r\n\r\nColour: Warm Walnut\r\n\r\nPrimary Material: Sheesham Wood\r\n\r\nRoom Type: Bedroom\r\n\r\nCollection: Tesseract\r\n\r\nStorage: Drawer Storage\r\n\r\nHeight: 36.0 inches\r\n\r\nWidth: 74.0 inches\r\n\r\nDepth: 80.0 inches\r\n\r\nSeating Height: 15\r\n\r\nRecommended Mattress Size: 78 L x 72 W Inch', '85000', 'bcb996d0379eeaa209efb6cfe8272da61571138565.jpg', 'e1ddccacc3cc69d0b891c6175c4519061571138565.jpg', 'cb24759368b210ab52d9d52ad0a20d2d1571138565.jpg', '5b0e1b549103b6472abec9c9fe71ea061571138565.jpg', '2019-10-15 11:22:45'),
(19, '726744391', 3, 14, 'King Size Sofa cum Bed with Box Storage & Mattress in Walnut & Wenge Finish', '47000', 'Oakley', 15, 'Instock', 'OVERVIEW\r\n\r\nFor Crystal Furnitech convenience is the most important aspect in home furniture. At Crystal Furnitech we couple this convenience of comfort with cost effectiveness in every design that we offer. We have everything you need to beautify your valued abode. With exceptional quality and unbeatable price, our collection of fine bedroom furniture will make your dreams come true.\r\n\r\nA Sofa cum Bed is a multi-functional piece of furniture, its a sofa or divan by day, flipped into a double bed at night. Available in different styles like the simple foldable or the pull out or convertible version.\r\nDimensions: Sofa : H 31 x W 77.6 x D 37.5; Seating Height-17; Bed : H 31 x W 77.6 x D 72; Seating Height-12.5\r\n(all dimensions in inches)\r\n\r\nWeight: 130 KG\r\n\r\nPrimary Material: Engineered Wood\r\n\r\nRoom Type: Bedroom\r\n\r\nStorage: With Storage\r\n\r\nHeight: 31.0 inches\r\n\r\nWidth: 78.0 inches\r\n\r\nDepth: 38.0 inches', '37000', '5eb33559e89cf66b9a077575f59453c31571138887.jpg', '30cd48ee35ad3824673c4234af0aa3a91571138887.jpg', '7507def000a1c2f8d1c540fd268c1de21571138887.jpg', 'fe107ec8559f1d048ea19d1be21689ae1571138887.jpg', '2019-10-15 11:28:07'),
(20, '592655979', 3, 15, 'McTaylor Bunk Bed (Single & Queen) in Walnut Finish', '93000', 'Manga', 10, 'Instock', 'OVERVIEW\r\n\r\nMollycoddle adds a fun element to the kids room with an adorable range of playful and lively collection of kids furniture. Each piece is carefully designed to suit the needs of your kids, with a palette of colours that appeal to all age groups. Along with great aesthetics, the collection follows world class safety norms for kids furniture.\r\n\r\nStandard bunk beds are two beds positioned one atop the other with or without trundle storage option. Ideally comes in a configuration of twin over twin size or twin over full size beds.\r\n\r\nDimensions: H 66.5 x W 65.7 x D 81.4; Mattress Size - Single Bed : 35 x 75; Queen Bed : 60 x 75 (Not Included)\r\n(all dimensions in inches)\r\n\r\nWeight: 80 KG\r\n\r\nPrimary Material: Rubber Wood\r\n\r\nRoom Type: Kids Room\r\n\r\nCollection: McTaylor\r\n\r\nStorage: No Storage\r\n\r\nHeight: 67.0 inches\r\n\r\nWidth: 66.0 inches\r\n\r\nDepth: 82.0 inches', '53000', '3f467869094023d372fd3c15843357081571139298.jpg', '038413ebb4cbcf4e0ab0c48e1abc130a1571139298.jpg', '7480f8d5f17bae99b2d7ada1c339bdd71571139298.jpg', '3f467869094023d372fd3c15843357081571139298.jpg', '2019-10-15 11:34:58'),
(21, '526296702', 3, 15, 'Dave Bunk Bed in White Finish', '40000', 'Oakley', 9, 'Instock', 'OVERVIEW\r\n\r\nCasacraft offers the best in comfort with lan. The collections are a series of modern trendy designs, simple yet striking and represent the ideals of minimalism. The designs are a perfect blend of functionality and exceptional aesthetics. Each piece is crafted with passion and follows international standards on quality and style.\r\n\r\nStandard bunk beds are two beds positioned one atop the other with or without trundle storage option. Ideally comes in a configuration of twin over twin size or twin over full size beds.\r\n\r\nDimensions: H 57 x W 38 x D 84; Seating Height-13.77; Mattress - Upper - 78 X 36, Lower - 78 x 36 (Not included) (All dimension in inches)\r\n\r\nWeight: 49 KG\r\n\r\nPrimary Material: Rubber Wood\r\n\r\nRoom Type: Kids Room\r\n\r\nStorage: No Storage\r\n\r\nHeight: 57.0 inches\r\n\r\nWidth: 38.0 inches\r\n\r\nDepth: 84.0 inches\r\n\r\nSeating Height: 14', '9000', '415b28fde36aa001decdbdff6214256e1571139588.jpg', '415b28fde36aa001decdbdff6214256e1571139588.jpg', '71ee3f2878b99294452b45c116f8a3fa1571139588.jpg', 'e40f29e07a43b78112641197f28e386f1571139588.jpg', '2019-10-15 11:39:48'),
(22, '396024196', 4, 18, 'Urban Ladder Genoa Wing Chair (Colour : Floral)', '20000', 'Manga', 10, 'Instock', 'Product Dimensions: Length (28.7 inches), Width (28.5 inches), Height (42.5 inches)\r\nPrimary Material: Fabric, Subtype: Fabric | Finish : Matte\r\nWing your way to comfort, The Genoa Wing Chair is the perfect spot for an afternoon snooze, or a date with a good book\r\nAssembly Required\r\nWarranty in Months: 12', '18000', 'ad8681ee99476e78547fa276adb619e51571201092.jpg', '4fd2fde5a44f1f1a70536e437228346e1571201092.jpg', 'dba2a876ef486a20ed9b599ec7c004621571201092.jpg', '05ccd4541dd04426bb6055faed9da7ce1571201092.jpg', '2019-10-16 04:44:52');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubcategory`
--

CREATE TABLE `tblsubcategory` (
  `ID` int(10) NOT NULL,
  `CatID` int(10) DEFAULT NULL,
  `SubcategoryName` varchar(120) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubcategory`
--

INSERT INTO `tblsubcategory` (`ID`, `CatID`, `SubcategoryName`, `CreationDate`) VALUES
(1, 1, 'Fabric Sofas', '2019-10-12 05:38:07'),
(2, 1, 'Leather Sofas', '2019-10-12 06:04:32'),
(3, 1, 'L-Shaped Sofas', '2019-10-12 06:05:07'),
(4, 1, 'Love Seats', '2019-10-12 06:05:24'),
(5, 1, 'Wooden Sofas', '2019-10-12 06:05:48'),
(6, 2, 'Coffee Tables', '2019-10-12 06:06:25'),
(7, 2, 'Dinning Tables', '2019-10-12 06:06:40'),
(8, 2, 'Study Table', '2019-10-12 06:07:00'),
(9, 2, 'Wooden Tables', '2019-10-12 06:07:14'),
(10, 2, 'Bar & Unit Stools', '2019-10-12 06:07:45'),
(11, 3, 'Single Beds', '2019-10-12 06:08:03'),
(12, 3, 'Double Beds', '2019-10-12 06:08:19'),
(13, 3, 'Poster Beds', '2019-10-12 06:08:51'),
(14, 3, 'Sofa Cum Beds', '2019-10-12 06:09:10'),
(15, 3, 'Bunk Beds', '2019-10-12 06:09:27'),
(16, 3, 'King Size Beds', '2019-10-12 06:09:48'),
(17, 3, 'Metal Beds', '2019-10-12 06:10:40'),
(18, 4, 'Wing Chair', '2019-10-12 06:22:14'),
(19, 4, 'Ascent Chair', '2019-10-12 06:22:34'),
(20, 4, 'Arm Chair', '2019-10-12 06:23:00'),
(21, 4, 'Metal Chair', '2019-10-12 06:23:13'),
(22, 4, 'Folding Chair', '2019-10-12 06:23:33'),
(23, 4, 'Bean Chair', '2019-10-12 06:23:56'),
(24, 2, 'Side Tables', '2019-10-12 06:25:51'),
(25, 5, 'T.V Units', '2019-10-12 06:26:11'),
(26, 5, 'Dressing Tables', '2019-10-12 06:26:36'),
(27, 5, 'wardrobes', '2019-10-12 06:26:58'),
(28, 5, 'Shoe Racks', '2019-10-12 06:27:19'),
(29, 5, 'Console Tables', '2019-10-12 06:27:39'),
(30, 2, 'Dressing Tables', '2019-10-12 11:43:59'),
(31, 2, 'Dressing Tables', '2019-10-12 11:44:50'),
(32, 1, 'Fabric Sofas', '2019-10-12 11:46:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbltracking`
--

CREATE TABLE `tbltracking` (
  `ID` int(10) NOT NULL,
  `OrderId` varchar(50) DEFAULT NULL,
  `Remark` varchar(200) DEFAULT NULL,
  `Status` varchar(200) DEFAULT NULL,
  `StatusDate` timestamp NULL DEFAULT current_timestamp(),
  `OrderCanclledByUser` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbltracking`
--

INSERT INTO `tbltracking` (`ID`, `OrderId`, `Remark`, `Status`, `StatusDate`, `OrderCanclledByUser`) VALUES
(1, '989645529', 'Your Order has been Confirmed', 'Confirmed', '2020-04-01 12:04:01', NULL),
(2, '989645529', 'Your Item is on the way', 'On The Way', '2020-04-01 12:31:32', NULL),
(3, '989645529', 'Item delivered', 'Delivered', '2020-04-01 12:32:10', NULL),
(4, '268223761', 'Your Order Has Been Confirmed', 'Confirmed', '2020-04-01 14:16:48', NULL),
(5, '268223761', 'On the way', 'On The Way', '2020-04-01 14:17:26', NULL),
(6, '253971675', 'cancel', 'Cancelled', '2020-04-08 06:34:34', 1),
(7, '368116033', 'Order Confirmed', 'Confirmed', '2020-04-08 07:24:46', NULL),
(8, '368116033', 'Out for delivery', 'On The Way', '2020-04-08 07:32:52', NULL),
(9, '368116033', 'Delivered', 'Delivered', '2020-04-08 07:33:25', NULL),
(10, '221850996', 'Order Confirmed', 'Confirmed', '2020-05-07 08:55:57', NULL),
(11, '221850996', 'Product is on the way.', 'On The Way', '2020-05-07 08:56:40', NULL),
(12, '221850996', 'Product delivered to the customer', 'Delivered', '2020-05-07 08:57:26', NULL),
(13, '849399829', 'Order is confimred', 'Confirmed', '2022-03-27 09:54:24', NULL),
(14, '849399829', 'Order is on the way', 'On The Way', '2022-03-27 09:54:59', NULL),
(15, '849399829', 'Order delivered to the user', 'Delivered', '2022-03-27 09:55:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(10) NOT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FullName`, `MobileNumber`, `Email`, `Password`, `RegDate`) VALUES
(1, 'Khusi', 8956234569, 'khusi@gmail.com', '202cb962ac59075b964b07152d234b70', '2019-10-16 14:22:03'),
(2, 'Rishi Singh', 5689234578, 'rishi@gmail.com', '202cb962ac59075b964b07152d234b70', '2019-10-16 14:37:49'),
(4, 'Test Sample', 8797977779, 'sample@gmail.com', '202cb962ac59075b964b07152d234b70', '2020-04-08 05:51:06'),
(5, 'Anuj  kumar', 1236547890, 'test@test.com', 'f925916e2754e5e03f75dd58a5733251', '2020-05-07 08:52:34'),
(6, 'John doe', 1425366352, 'john@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2022-03-27 09:52:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblbrand`
--
ALTER TABLE `tblbrand`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `BrandName` (`BrandName`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `OrderNumber` (`OrderNumber`);

--
-- Indexes for table `tblorderdetails`
--
ALTER TABLE `tblorderdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblproducts`
--
ALTER TABLE `tblproducts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CatID` (`CatID`);

--
-- Indexes for table `tbltracking`
--
ALTER TABLE `tbltracking`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblbrand`
--
ALTER TABLE `tblbrand`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblorder`
--
ALTER TABLE `tblorder`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblorderdetails`
--
ALTER TABLE `tblorderdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblproducts`
--
ALTER TABLE `tblproducts`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbltracking`
--
ALTER TABLE `tbltracking`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
