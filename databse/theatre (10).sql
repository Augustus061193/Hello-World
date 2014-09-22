-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 25, 2013 at 06:12 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `theatre`
--

-- --------------------------------------------------------

--
-- Table structure for table `cms_about`
--

CREATE TABLE IF NOT EXISTS `cms_about` (
  `id` int(120) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `status` int(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cms_about`
--

INSERT INTO `cms_about` (`id`, `title`, `image`, `description`, `status`) VALUES
(1, 'About us', 'logo-83f97f48135891931310587291.png', 'The multiple backgrounds applied to this section are moved in a similar way to the first section -- every time the user scrolls down the page by a pixel, the positions of the backgrounds are changed.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nibh erat, sagittis sit amet congue at, aliquam eu libero. Integer molestie, turpis vel ultrices facilisis, nisi mauris sollicitudin mauris, volutpat elementum enim urna eget odio. Donec egestas aliquet facilisis. Nunc eu nunc eget neque ornare fringilla. Nam vel sodales lectus. Nulla in pellentesque eros. Donec ultricies, enim vitae varius cursus, risus mauris iaculis neque, euismod sollicitudin metus erat vitae sapien. Sed pulvinar.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cms_auth`
--

CREATE TABLE IF NOT EXISTS `cms_auth` (
  `auth_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(120) COLLATE utf8_bin NOT NULL,
  `password` varchar(120) COLLATE utf8_bin NOT NULL,
  `pass_key` varchar(20) COLLATE utf8_bin NOT NULL,
  `email` varchar(120) COLLATE utf8_bin NOT NULL,
  `name` varchar(120) COLLATE utf8_bin NOT NULL,
  `date_create` datetime NOT NULL,
  `privacypolicy` text COLLATE utf8_bin NOT NULL,
  `logo` varchar(500) COLLATE utf8_bin NOT NULL DEFAULT 'ortus-logo2.png',
  PRIMARY KEY (`auth_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cms_auth`
--

INSERT INTO `cms_auth` (`auth_id`, `username`, `password`, `pass_key`, `email`, `name`, `date_create`, `privacypolicy`, `logo`) VALUES
(1, 'adminx', 'xLmnpdKpiXo=', '5564788', 'littoxxx7@gmail.com', 'admin', '2012-06-13 22:27:45', 'Vismaya Cinemax Discover more about the art of making theatre by exploring our backstage videos and short films about the writers, directors, creatives and actors that work at the Vismaya Cinemax Theatre.', 'logo-a5122944133960666510791568.png');

-- --------------------------------------------------------

--
-- Table structure for table `cms_contact`
--

CREATE TABLE IF NOT EXISTS `cms_contact` (
  `id` int(120) NOT NULL AUTO_INCREMENT,
  `email` varchar(500) NOT NULL,
  `landline` bigint(120) NOT NULL,
  `mobile` bigint(120) NOT NULL,
  `address` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cms_contact`
--

INSERT INTO `cms_contact` (`id`, `email`, `landline`, `mobile`, `address`) VALUES
(1, 'admin@vismaya.com', 473789065, 9087654321, 'lagpath nagar\r\nthodupuzha\r\nEdukki\r\nkerala');

-- --------------------------------------------------------

--
-- Table structure for table `cms_movie`
--

CREATE TABLE IF NOT EXISTS `cms_movie` (
  `movie_id` int(120) NOT NULL AUTO_INCREMENT,
  `movie_name` varchar(500) NOT NULL,
  `release_date` date NOT NULL,
  `end_date` date NOT NULL,
  `movie_status` int(120) NOT NULL,
  `actors` text NOT NULL,
  `description` text NOT NULL,
  `trailer` text NOT NULL,
  `proj_status` int(120) NOT NULL,
  `spl` int(120) NOT NULL,
  `poster` varchar(500) NOT NULL,
  `status` int(120) NOT NULL,
  PRIMARY KEY (`movie_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `cms_movie`
--

INSERT INTO `cms_movie` (`movie_id`, `movie_name`, `release_date`, `end_date`, `movie_status`, `actors`, `description`, `trailer`, `proj_status`, `spl`, `poster`, `status`) VALUES
(5, 'passion of christ', '2013-01-24', '1970-01-01', 1, 'JOSS WHEDON, STARS: ROBERT DOWNEY JR, CHRIS EVANS AND SCARLETT JOHANSSON.', '<p>The award-winning developer Crytek is back with Crysis 3, the first blockbuster shooter of 2013! Return to the fight as Prophet, the Nanosuit soldier on a quest to rediscover his humanity and exact brutal revenge. Adapt on the fly with the stealth and armor abilities of your unique Nanosuit as you battle through the seven wonders of New York&rsquo;s Liberty Dome. Unleash the firepower of your all-new, high-tech bow and alien weaponry to hunt both human and alien enemies. And uncover the truth behind the death of your squad while reestablishing the power of human will in a rich story full of exciting twists and turns. Crysis 3 is the ultimate sandbox shooter, realized in the stunning visuals only Crytek and the latest version of CryENGINE can deliver. Assess, Adapt, and Attack.</p>', '<iframe width="100%" height="100" src="http://www.youtube.com/embed/u8hTNH07V1M" frameborder="0" allowfullscreen></iframe>', 0, 0, 'banner-2be8328f135902123210256138.jpg', 1),
(6, 'Raja', '2013-01-10', '1970-01-01', 1, 'JOSS WHEDON, STARS: ROBERT DOWNEY JR, CHRIS EVANS AND SCARLETT JOHANSSON.', '<p>The award-winning developer Crytek is back with Crysis 3, the first blockbuster shooter of 2013! Return to the fight as Prophet, the Nanosuit soldier on a quest to rediscover his humanity and exact brutal revenge. Adapt on the fly with the stealth and armor abilities of your unique Nanosuit as you battle through the seven wonders of New York&rsquo;s Liberty Dome. Unleash the firepower of your all-new, high-tech bow and alien weaponry to hunt both human and alien enemies. And uncover the truth behind the death of your squad while reestablishing the power of human will in a rich story full of exciting twists and turns. Crysis 3 is the ultimate sandbox shooter, realized in the stunning visuals only Crytek and the latest version of CryENGINE can deliver. Assess, Adapt, and Attack.</p>', '<iframe width="100%" height="100" src="http://www.youtube.com/embed/u8hTNH07V1M" frameborder="0" allowfullscreen></iframe>', 0, 0, 'banner-dde16b86135902126610953252.jpg', 1),
(9, 'Expandables', '2013-02-14', '1970-01-01', 0, 'JOSS WHEDON, STARS: ROBERT DOWNEY JR, CHRIS EVANS AND SCARLETT JOHANSSON.', '<p>The award-winning developer Crytek is back with Crysis 3, the first blockbuster shooter of 2013! Return to the fight as Prophet, the Nanosuit soldier on a quest to rediscover his humanity and exact brutal revenge. Adapt on the fly with the stealth and armor abilities of your unique Nanosuit as you battle through the seven wonders of New York&rsquo;s Liberty Dome. Unleash the firepower of your all-new, high-tech bow and alien weaponry to hunt both human and alien enemies. And uncover the truth behind the death of your squad while reestablishing the power of human will in a rich story full of exciting twists and turns. Crysis 3 is the ultimate sandbox shooter, realized in the stunning visuals only Crytek and the latest version of CryENGINE can deliver. Assess, Adapt, and Attack.</p>', '<iframe width="100%" height="100" src="http://www.youtube.com/embed/u8hTNH07V1M" frameborder="0" allowfullscreen></iframe>', 0, 1, 'banner-f6e0664413585003311025948.jpg', 1),
(10, 'Rajamanikyam', '2013-03-07', '2013-03-14', 0, 'JOSS WHEDON, STARS: ROBERT DOWNEY JR, CHRIS EVANS AND SCARLETT JOHANSSON.', '<p>The award-winning developer Crytek is back with Crysis 3, the first blockbuster shooter of 2013! Return to the fight as Prophet, the Nanosuit soldier on a quest to rediscover his humanity and exact brutal revenge. Adapt on the fly with the stealth and armor abilities of your unique Nanosuit as you battle through the seven wonders of New York&rsquo;s Liberty Dome. Unleash the firepower of your all-new, high-tech bow and alien weaponry to hunt both human and alien enemies. And uncover the truth behind the death of your squad while reestablishing the power of human will in a rich story full of exciting twists and turns. Crysis 3 is the ultimate sandbox shooter, realized in the stunning visuals only Crytek and the latest version of CryENGINE can deliver. Assess, Adapt, and Attack.</p>', '<iframe width="100%" height="100" src="http://www.youtube.com/embed/u8hTNH07V1M" frameborder="0" allowfullscreen></iframe>', 0, 0, 'banner-517da335135892399310994251.jpg', 1),
(11, 'Mr.Bean', '2013-02-20', '2013-02-27', 0, 'JOSS WHEDON, STARS: ROBERT DOWNEY JR, CHRIS EVANS AND SCARLETT JOHANSSON.', '<p>The award-winning developer Crytek is back with Crysis 3, the first blockbuster shooter of 2013! Return to the fight as Prophet, the Nanosuit soldier on a quest to rediscover his humanity and exact brutal revenge. Adapt on the fly with the stealth and armor abilities of your unique Nanosuit as you battle through the seven wonders of New York&rsquo;s Liberty Dome. Unleash the firepower of your all-new, high-tech bow and alien weaponry to hunt both human and alien enemies. And uncover the truth behind the death of your squad while reestablishing the power of human will in a rich story full of exciting twists and turns. Crysis 3 is the ultimate sandbox shooter, realized in the stunning visuals only Crytek and the latest version of CryENGINE can deliver. Assess, Adapt, and Attack.</p>', '<iframe width="100%" height="100" src="http://www.youtube.com/embed/u8hTNH07V1M" frameborder="0" allowfullscreen></iframe>', 0, 0, 'banner-6562a2c4135902147610396264.jpg', 1),
(12, 'Pirates of carribean', '2013-03-05', '2013-03-12', 0, 'JOSS WHEDON, STARS: ROBERT DOWNEY JR, CHRIS EVANS AND SCARLETT JOHANSSON.', '<p>The award-winning developer Crytek is back with Crysis 3, the first blockbuster shooter of 2013! Return to the fight as Prophet, the Nanosuit soldier on a quest to rediscover his humanity and exact brutal revenge. Adapt on the fly with the stealth and armor abilities of your unique Nanosuit as you battle through the seven wonders of New York&rsquo;s Liberty Dome. Unleash the firepower of your all-new, high-tech bow and alien weaponry to hunt both human and alien enemies. And uncover the truth behind the death of your squad while reestablishing the power of human will in a rich story full of exciting twists and turns. Crysis 3 is the ultimate sandbox shooter, realized in the stunning visuals only Crytek and the latest version of CryENGINE can deliver. Assess, Adapt, and Attack.</p>', '<iframe width="100%" height="100" src="http://www.youtube.com/embed/u8hTNH07V1M" frameborder="0" allowfullscreen></iframe>', 0, 0, 'banner-ec0bfd00135902177410445650.jpg', 1),
(13, 'Khiladi 256', '2013-03-07', '2013-03-14', 0, 'JOSS WHEDON, STARS: ROBERT DOWNEY JR, CHRIS EVANS AND SCARLETT JOHANSSON', '<p>The award-winning developer Crytek is back with Crysis 3, the first blockbuster shooter of 2013! Return to the fight as Prophet, the Nanosuit soldier on a quest to rediscover his humanity and exact brutal revenge. Adapt on the fly with the stealth and armor abilities of your unique Nanosuit as you battle through the seven wonders of New York&rsquo;s Liberty Dome. Unleash the firepower of your all-new, high-tech bow and alien weaponry to hunt both human and alien enemies. And uncover the truth behind the death of your squad while reestablishing the power of human will in a rich story full of exciting twists and turns. Crysis 3 is the ultimate sandbox shooter, realized in the stunning visuals only Crytek and the latest version of CryENGINE can deliver. Assess, Adapt, and Attack.</p>', '<iframe width="100%" height="100" src="http://www.youtube.com/embed/u8hTNH07V1M" frameborder="0" allowfullscreen></iframe>', 0, 0, 'banner-d064bf1a135902245110091691.jpg', 1),
(14, 'Don3', '2013-04-01', '2013-04-08', 0, 'JOSS WHEDON, STARS: ROBERT DOWNEY JR, CHRIS EVANS AND SCARLETT JOHANSSON', '<p>The award-winning developer Crytek is back with Crysis 3, the first blockbuster shooter of 2013! Return to the fight as Prophet, the Nanosuit soldier on a quest to rediscover his humanity and exact brutal revenge. Adapt on the fly with the stealth and armor abilities of your unique Nanosuit as you battle through the seven wonders of New York&rsquo;s Liberty Dome. Unleash the firepower of your all-new, high-tech bow and alien weaponry to hunt both human and alien enemies. And uncover the truth behind the death of your squad while reestablishing the power of human will in a rich story full of exciting twists and turns. Crysis 3 is the ultimate sandbox shooter, realized in the stunning visuals only Crytek and the latest version of CryENGINE can deliver. Assess, Adapt, and Attack.</p>', '<iframe width="100%" height="100" src="http://www.youtube.com/embed/u8hTNH07V1M" frameborder="0" allowfullscreen></iframe>', 0, 1, 'banner-ee188463135902252410537364.jpg', 1),
(15, 'DHOOM-3', '2013-05-15', '2013-05-22', 0, 'JOSS WHEDON, STARS: ROBERT DOWNEY JR, CHRIS EVANS AND SCARLETT JOHANSSON', '<p>The award-winning developer Crytek is back with Crysis 3, the first blockbuster shooter of 2013! Return to the fight as Prophet, the Nanosuit soldier on a quest to rediscover his humanity and exact brutal revenge. Adapt on the fly with the stealth and armor abilities of your unique Nanosuit as you battle through the seven wonders of New York&rsquo;s Liberty Dome. Unleash the firepower of your all-new, high-tech bow and alien weaponry to hunt both human and alien enemies. And uncover the truth behind the death of your squad while reestablishing the power of human will in a rich story full of exciting twists and turns. Crysis 3 is the ultimate sandbox shooter, realized in the stunning visuals only Crytek and the latest version of CryENGINE can deliver. Assess, Adapt, and Attack.</p>', '<iframe width="100%" height="100" src="http://www.youtube.com/embed/u8hTNH07V1M" frameborder="0" allowfullscreen></iframe>', 0, 0, 'banner-2fd5d41e135902260111036233.jpg', 1),
(16, 'Dabangg 3', '2013-07-11', '2013-07-18', 0, 'JOSS WHEDON, STARS: ROBERT DOWNEY JR, CHRIS EVANS AND SCARLETT JOHANSSON', '<p>The award-winning developer Crytek is back with Crysis 3, the first blockbuster shooter of 2013! Return to the fight as Prophet, the Nanosuit soldier on a quest to rediscover his humanity and exact brutal revenge. Adapt on the fly with the stealth and armor abilities of your unique Nanosuit as you battle through the seven wonders of New York&rsquo;s Liberty Dome. Unleash the firepower of your all-new, high-tech bow and alien weaponry to hunt both human and alien enemies. And uncover the truth behind the death of your squad while reestablishing the power of human will in a rich story full of exciting twists and turns. Crysis 3 is the ultimate sandbox shooter, realized in the stunning visuals only Crytek and the latest version of CryENGINE can deliver. Assess, Adapt, and Attack.</p>', '<iframe width="100%" height="100" src="http://www.youtube.com/embed/u8hTNH07V1M" frameborder="0" allowfullscreen></iframe>', 0, 0, 'banner-466accba135902271410423127.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cms_movieimage`
--

CREATE TABLE IF NOT EXISTS `cms_movieimage` (
  `image_id` int(120) NOT NULL AUTO_INCREMENT,
  `movie_id` int(120) NOT NULL,
  `image_name` varchar(500) NOT NULL,
  `image_loc` varchar(500) NOT NULL,
  `date_added` date NOT NULL,
  `status` int(120) NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `cms_movieimage`
--

INSERT INTO `cms_movieimage` (`image_id`, `movie_id`, `image_name`, `image_loc`, `date_added`, `status`) VALUES
(8, 9, 'Imagename', 'theatre-67b878df135850823110179445.jpg', '2013-01-18', 1),
(10, 9, 'Imagename', 'theatre-cf77e1f8135850823211103714.jpg', '2013-01-18', 1),
(17, 9, 'Imagename', 'theatre-97c99dd2135850958610461930.jpg', '2013-01-18', 1),
(18, 9, 'Imagename', 'theatre-cfa3a0bc135850958610308854.jpg', '2013-01-18', 1),
(19, 5, 'Imagename', 'theatre-98b41827135850975510661814.jpg', '2013-01-18', 1),
(20, 5, 'Imagename', 'theatre-e0e2b58d135850975510567655.jpg', '2013-01-18', 1),
(21, 5, 'Imagename', 'theatre-42a85a01135850975511059482.jpg', '2013-01-18', 1),
(22, 5, 'Imagename', 'theatre-1d01bd2e135850975610318818.jpg', '2013-01-18', 1),
(23, 6, 'jeeva', 'theatre-e0688d13135850981710156062.jpg', '2013-01-18', 1),
(24, 6, 'Imagename', 'theatre-cc598895135850981710345301.jpg', '2013-01-18', 1),
(25, 6, 'Imagename', 'theatre-828752f7135850981710518826.jpg', '2013-01-18', 1),
(26, 16, 'Imagename', 'theatre-4fc6610413590877531062682.jpg', '2013-01-25', 1),
(27, 16, 'Imagename', 'theatre-43c65662135908775410461425.jpg', '2013-01-25', 1),
(28, 15, 'Imagename', 'theatre-cec6f62c135908778910111265.jpg', '2013-01-25', 1),
(29, 15, 'Imagename', 'theatre-ac4395ad13590877891045177.jpg', '2013-01-25', 1),
(30, 14, 'Imagename', 'theatre-1109f873135908783110369622.jpg', '2013-01-25', 1),
(31, 14, 'Imagename', 'theatre-15bb03d4135908783211059951.jpg', '2013-01-25', 1),
(32, 13, 'Imagename', 'theatre-1f74a54f135908786610872317.jpg', '2013-01-25', 1),
(33, 13, 'Imagename', 'theatre-8977ecbb135908786710849040.jpg', '2013-01-25', 1),
(34, 12, 'Imagename', 'theatre-15231a7c135908789410441568.jpg', '2013-01-25', 1),
(35, 12, 'Imagename', 'theatre-9565f1cd135908789410732377.jpg', '2013-01-25', 1),
(36, 11, 'Imagename', 'theatre-31c23973135908792410809671.jpg', '2013-01-25', 1),
(37, 11, 'Imagename', 'theatre-19485224135908792410137782.jpg', '2013-01-25', 1),
(38, 10, 'Imagename', 'theatre-a11f9e53135908795510063791.jpg', '2013-01-25', 1),
(39, 10, 'Imagename', 'theatre-6b8b8e3b135908795510324159.jpg', '2013-01-25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cms_movieshows`
--

CREATE TABLE IF NOT EXISTS `cms_movieshows` (
  `show_id` int(120) NOT NULL AUTO_INCREMENT,
  `movie_id` int(120) NOT NULL,
  `theatre_id` int(120) NOT NULL,
  `ms_status` int(120) NOT NULL,
  `mat_status` int(120) NOT NULL,
  `evg_status` int(120) NOT NULL,
  `sec_status` int(120) NOT NULL,
  `extrashow1_status` int(120) NOT NULL,
  `extrashow2_status` int(120) NOT NULL,
  `ms_2d_rate` int(120) NOT NULL,
  `ms_3d_rate` int(120) NOT NULL,
  `mat_2d_rate` int(120) NOT NULL,
  `mat_3d_rate` int(120) NOT NULL,
  `evg_2d_rate` int(120) NOT NULL,
  `evg_3d_rate` int(120) NOT NULL,
  `sec_2d_rate` int(120) NOT NULL,
  `sec_3d_rate` int(120) NOT NULL,
  `extrashow1_2d_rate` int(120) NOT NULL,
  `extrashow1_3d_rate` int(120) NOT NULL,
  `extrashow2_2d_rate` int(120) NOT NULL,
  `extrashow2_3d_rate` int(120) NOT NULL,
  `mainstatus` int(120) NOT NULL,
  PRIMARY KEY (`show_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `cms_movieshows`
--

INSERT INTO `cms_movieshows` (`show_id`, `movie_id`, `theatre_id`, `ms_status`, `mat_status`, `evg_status`, `sec_status`, `extrashow1_status`, `extrashow2_status`, `ms_2d_rate`, `ms_3d_rate`, `mat_2d_rate`, `mat_3d_rate`, `evg_2d_rate`, `evg_3d_rate`, `sec_2d_rate`, `sec_3d_rate`, `extrashow1_2d_rate`, `extrashow1_3d_rate`, `extrashow2_2d_rate`, `extrashow2_3d_rate`, `mainstatus`) VALUES
(13, 5, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(14, 5, 2, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(15, 5, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(16, 6, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(17, 6, 2, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(18, 6, 3, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(22, 8, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(23, 8, 2, 1, 1, 0, 0, 0, 0, 50, 75, 50, 75, 50, 75, 0, 0, 0, 0, 0, 0, 1),
(24, 8, 3, 0, 0, 1, 1, 0, 0, 50, 75, 50, 75, 50, 75, 0, 0, 0, 0, 0, 0, 1),
(25, 9, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(26, 9, 2, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(27, 9, 3, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(28, 10, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(29, 10, 2, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(30, 10, 3, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(31, 11, 1, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(32, 11, 2, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(33, 11, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(34, 12, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(35, 12, 2, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(36, 12, 3, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(37, 13, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(38, 13, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(39, 13, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(40, 14, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(41, 14, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(42, 14, 3, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(43, 15, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(44, 15, 2, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(45, 15, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(46, 16, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(47, 16, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(48, 16, 3, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cms_news`
--

CREATE TABLE IF NOT EXISTS `cms_news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `featured` tinyint(4) NOT NULL DEFAULT '0',
  `archived` tinyint(4) NOT NULL DEFAULT '0',
  `published` tinyint(4) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL,
  `title` varchar(160) NOT NULL,
  `content` text NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cms_news`
--

INSERT INTO `cms_news` (`news_id`, `featured`, `archived`, `published`, `order`, `title`, `content`, `date_update`) VALUES
(1, 0, 0, 1, 1, 'Welcome to Hotel Grandseason', '<p><span>We take great pride in offering you the most up-to-date rates as well as status on room availability, while maintaining the highest security..................</span></p>', '2012-12-11 10:18:23'),
(2, 0, 0, 1, 2, 'Grand Seasons new website designed', '<p><span>Grand Seasons hall is ideal for your next conference, banquet, training seminar, strategy session, business meeting or any other social events.</span></p>', '2012-12-11 10:20:08');

-- --------------------------------------------------------

--
-- Table structure for table `cms_pages`
--

CREATE TABLE IF NOT EXISTS `cms_pages` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `order` int(11) NOT NULL,
  `level` tinyint(4) NOT NULL,
  `parent` int(11) NOT NULL,
  `position` varchar(20) COLLATE utf8_bin NOT NULL,
  `published` tinyint(4) NOT NULL,
  `default` tinyint(4) NOT NULL DEFAULT '0',
  `featured` tinyint(4) NOT NULL DEFAULT '0',
  `title` varchar(300) COLLATE utf8_bin NOT NULL,
  `page_title` varchar(250) COLLATE utf8_bin NOT NULL,
  `content` text COLLATE utf8_bin NOT NULL,
  `banner` varchar(200) COLLATE utf8_bin NOT NULL,
  `date_update` date NOT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- Dumping data for table `cms_pages`
--

INSERT INTO `cms_pages` (`page_id`, `order`, `level`, `parent`, `position`, `published`, `default`, `featured`, `title`, `page_title`, `content`, `banner`, `date_update`) VALUES
(1, 1, 1, 0, '--', 1, 0, 0, 'Home', 'Home', '<p><strong> Le Mirage showbiz, is an upcoming business trend in the ever fascinating entertainment world. We, at Le Mirage showbiz, turn on or color up your expressions whether it&rsquo;s an event management sessions, or advertising niche. Ours is a mix young spirit &amp; hard gained experience through years,blended in such a way that translates your emotions into visual reality.<br /> <br /> For us, <em>innovations, professionalism, reliability</em> are the modes that execute your events which stand par excellence. We do strongly believe in clientrelationship that makes long lasting and mutually beneficial one. Hence, we are highly obliged to offering services that transcend your imagination at any height, with no borders.ddddddddddddd</strong></p>', 'banner-7c2c48a3134449217010708064.png', '2012-08-12'),
(2, 2, 1, 0, '--', 1, 0, 0, 'About us', 'About us', '<p>Le Mirage showbiz, is an upcoming business trend in the ever fascinating entertainment world. We, at Le Mirage showbiz, turn on or color up your expressions whether it&rsquo;s an event management sessions, or advertising niche. Ours is a mix young spirit &amp; hard gained experience through years, blended in such a way that translates your emotions into visual reality.<br /> <br /> For us, <em>innovations, professionalism, reliability</em> are the modes that execute your events which stand par excellence. We do strongly believe in client relationship that makes long lasting and mutually beneficial one. Hence, we are highly obliged to offering services that transcend your imagination at any height, with no borders.</p>', 'banner-1819fb90134449220710479368.png', '2012-08-09'),
(3, 3, 1, 0, '--', 1, 0, 0, 'Services', 'Services', '<p><strong> Le Mirage showbiz, is an upcoming business trend in the ever fascinating entertainment world. We, at Le Mirage showbiz, turn on or color up your expressions whether it&rsquo;s an event management sessions, or advertising niche. Ours is a mix young spirit &amp; hard gained experience through years,<strong> </strong>blended in such a way that translates your emotions into visual reality.<br /> <br /> For us, <em>innovations, professionalism, reliability</em> are the modes that execute your events which stand par excellence. We do strongly believe in client<strong> </strong>relationship that makes long lasting and mutually beneficial one. Hence, we are highly obliged to offering services that transcend your imagination at any height, with no borders.</strong></p>', '', '2012-08-09'),
(4, 4, 1, 0, '--', 1, 0, 0, 'Contact us', 'Contact us', '<p><span>Lemirage Events &amp; Promotions</span><br /> 10/37/106, Third Floor<br /> Adam Bazzar Complex, Rice Bazzar East<br /> Thrissur - 1<br /> Ph : 0487 3100 800<br /> Mob : +91 9400321592</p>', '', '2012-08-09'),
(5, 5, 1, 0, '--', 1, 0, 0, 'Our Mission', 'Our Mission', '<ul id=\\"our_mi\\">\r\n<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>\r\n<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>\r\n<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>\r\n<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>\r\n</ul>', '', '2012-08-09'),
(6, 1, 2, 2, '--', 1, 0, 0, 'tdy', 'tryt', '<p>tyrtutyui</p>', '', '2012-08-16');

-- --------------------------------------------------------

--
-- Table structure for table `cms_settings`
--

CREATE TABLE IF NOT EXISTS `cms_settings` (
  `id` int(120) NOT NULL AUTO_INCREMENT,
  `movie_count` int(120) NOT NULL,
  `comment_show` int(120) NOT NULL,
  `sitename` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `keywords` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cms_settings`
--

INSERT INTO `cms_settings` (`id`, `movie_count`, `comment_show`, `sitename`, `description`, `keywords`) VALUES
(1, 6, 1, 'vismayamax.com', 'group of theatres in thodupuzha,3dprojection,2dprojection..etc.', 'group of theatres in thodupuzha,3dprojection,2dprojection..etc....');

-- --------------------------------------------------------

--
-- Table structure for table `cms_theatre`
--

CREATE TABLE IF NOT EXISTS `cms_theatre` (
  `theatre_id` int(120) NOT NULL AUTO_INCREMENT,
  `theatre_name` varchar(500) NOT NULL,
  `routemap` text NOT NULL,
  `no_seats` int(120) NOT NULL,
  `ms_time` varchar(500) NOT NULL,
  `matinee_time` varchar(500) NOT NULL,
  `evg_time` varchar(500) NOT NULL,
  `second_time` varchar(500) NOT NULL,
  `ms_2d_rate` int(120) NOT NULL DEFAULT '50',
  `mat_2d_rate` int(120) NOT NULL DEFAULT '50',
  `evg_2d_rate` int(120) NOT NULL DEFAULT '50',
  `sec_2d_rate` int(120) NOT NULL DEFAULT '50',
  `ms_3d_rate` int(120) NOT NULL DEFAULT '75',
  `mat_3d_rate` int(120) NOT NULL DEFAULT '75',
  `evg_3d_rate` int(120) NOT NULL DEFAULT '75',
  `sec_3d_rate` int(120) NOT NULL DEFAULT '75',
  `extra_details` text NOT NULL,
  `extrashow1_time` varchar(500) NOT NULL,
  `extrashow2_time` varchar(500) NOT NULL,
  `extrashow1_2d_rate` int(120) NOT NULL,
  `extrashow2_2d_rate` int(120) NOT NULL,
  `extrashow1_3d_rate` int(120) NOT NULL,
  `extrashow2_3d_rate` int(120) NOT NULL,
  `image_loc` varchar(500) NOT NULL,
  `status` int(120) NOT NULL,
  `ms_status` int(120) NOT NULL DEFAULT '1',
  `mat_status` int(120) NOT NULL DEFAULT '1',
  `evg_status` int(120) NOT NULL DEFAULT '1',
  `sec_status` int(120) NOT NULL DEFAULT '1',
  `extrashow1_status` int(120) NOT NULL DEFAULT '0',
  `extrashow2_status` int(120) NOT NULL DEFAULT '0',
  PRIMARY KEY (`theatre_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `cms_theatre`
--

INSERT INTO `cms_theatre` (`theatre_id`, `theatre_name`, `routemap`, `no_seats`, `ms_time`, `matinee_time`, `evg_time`, `second_time`, `ms_2d_rate`, `mat_2d_rate`, `evg_2d_rate`, `sec_2d_rate`, `ms_3d_rate`, `mat_3d_rate`, `evg_3d_rate`, `sec_3d_rate`, `extra_details`, `extrashow1_time`, `extrashow2_time`, `extrashow1_2d_rate`, `extrashow2_2d_rate`, `extrashow1_3d_rate`, `extrashow2_3d_rate`, `image_loc`, `status`, `ms_status`, `mat_status`, `evg_status`, `sec_status`, `extrashow1_status`, `extrashow2_status`) VALUES
(1, 'Laya', '<iframe width="100%" height="450px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&source=s_q&hl=en&geocode=&q=Laya+Theatre,+Thodupuzha,+Kerala&aq=0&oq=thodupuzha+laya&sll=10.54063,76.128318&sspn=5.614297,10.447998&ie=UTF8&hq=Laya+Theatre,&hnear=Thodupuzha,+Idukki,+Kerala&t=m&z=15&iwloc=A&output=embed"></iframe>', 500, '11.00 AM', '2.30 PM', '6.00 PM', '9.30 PM', 55, 60, 65, 65, 55, 75, 75, 75, 'Lorem Ipsum is simply dummy textLorem Ipsum is simply dummy textLorem Ipsum is simply dummy textLorem Ipsum is simply dummy textLorem Ipsum is simply dummy text', '0.00', '0.00', 0, 0, 0, 0, 'banner-aceacd5d135790038610337790.jpg', 1, 1, 1, 1, 1, 0, 0),
(2, 'Vismaya', '<iframe width="100%" height="450px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&source=s_q&hl=en&geocode=&q=Laya+Theatre,+Thodupuzha,+Kerala&aq=0&oq=thodupuzha+laya&sll=10.54063,76.128318&sspn=5.614297,10.447998&ie=UTF8&hq=Laya+Theatre,&hnear=Thodupuzha,+Idukki,+Kerala&t=m&z=15&iwloc=A&output=embed"></iframe>', 600, '11.00 AM', '2.30 PM', '6.00 PM', '9.30 PM', 50, 50, 50, 50, 50, 75, 75, 75, 'Lorem Ipsum is simply dummy textLorem Ipsum is simply dummy textLorem Ipsum is simply dummy textLorem Ipsum is simply dummy textLorem Ipsum is simply dummy textLorem Ipsum is simply dummy text', '0.00', '0.00', 0, 0, 0, 0, 'banner-645098b0135790039611024789.png', 1, 1, 1, 1, 1, 0, 0),
(3, 'Aiswarya', '<iframe width="100%" height="450px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&source=s_q&hl=en&geocode=&q=Laya+Theatre,+Thodupuzha,+Kerala&aq=0&oq=thodupuzha+laya&sll=10.54063,76.128318&sspn=5.614297,10.447998&ie=UTF8&hq=Laya+Theatre,&hnear=Thodupuzha,+Idukki,+Kerala&t=m&z=15&iwloc=A&output=embed"></iframe>', 700, '11.00 AM', '2.30 PM', '6.00 PM', '9.30 PM', 50, 50, 50, 50, 50, 75, 75, 75, 'Lorem Ipsum is simply dummy textLorem Ipsum is simply dummy textLorem Ipsum is simply dummy textLorem Ipsum is simply dummy textLorem Ipsum is simply dummy text', '0.00', '0.00', 0, 0, 0, 0, 'banner-7bfa3268135788275010614747.jpg', 1, 1, 1, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cms_theatreimage`
--

CREATE TABLE IF NOT EXISTS `cms_theatreimage` (
  `image_id` int(120) NOT NULL AUTO_INCREMENT,
  `theatre_id` int(120) NOT NULL,
  `image_name` varchar(500) NOT NULL,
  `image_loc` varchar(500) NOT NULL,
  `date_added` date NOT NULL,
  `status` int(120) NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `cms_theatreimage`
--

INSERT INTO `cms_theatreimage` (`image_id`, `theatre_id`, `image_name`, `image_loc`, `date_added`, `status`) VALUES
(6, 1, 'raj', 'theatre-2b8eba3c135780783410265871.jpg', '2013-01-10', 1),
(7, 1, 'preee', 'theatre-f69e505b135780783411013170.jpg', '2013-01-10', 1),
(8, 1, 'litto', 'theatre-d28d296b135780783410788308.jpg', '2013-01-10', 1),
(11, 2, 'Imagename', 'theatre-c4fa7aec135780830510515682.jpg', '2013-01-10', 1),
(12, 2, 'Imagename', 'theatre-2e92962c135780830510094206.jpg', '2013-01-10', 1),
(13, 2, 'Imagename', 'theatre-b28d7c6b135780830511105920.jpg', '2013-01-10', 1),
(14, 2, 'Imagename', 'theatre-7137debd135780830510992019.jpg', '2013-01-10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cms_trailer`
--

CREATE TABLE IF NOT EXISTS `cms_trailer` (
  `id` int(120) NOT NULL AUTO_INCREMENT,
  `movie_id` int(120) NOT NULL,
  `name` varchar(500) NOT NULL,
  `url` text NOT NULL,
  `status` int(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `cms_trailer`
--

INSERT INTO `cms_trailer` (`id`, `movie_id`, `name`, `url`, `status`) VALUES
(1, 5, 'trailer-1', '<iframe width="100%" height="100" src="http://www.youtube.com/embed/u8hTNH07V1M" frameborder="0" allowfullscreen></iframe>', 1),
(3, 5, 'jagan', '<iframe width="100%" height="100" src="http://www.youtube.com/embed/u8hTNH07V1M" frameborder="0" allowfullscreen></iframe>', 1),
(4, 6, 'trailer-1', '<iframe width="100%" height="100" src="http://www.youtube.com/embed/u8hTNH07V1M" frameborder="0" allowfullscreen></iframe>', 1),
(5, 6, 'Trailer name', '<iframe width="100%" height="100" src="http://www.youtube.com/embed/u8hTNH07V1M" frameborder="0" allowfullscreen></iframe>', 1),
(6, 9, 'Trailer name', '<iframe width="100%" height="100" src="http://www.youtube.com/embed/u8hTNH07V1M" frameborder="0" allowfullscreen></iframe>', 1),
(7, 9, 'Trailer name', '<iframe width="100%" height="100" src="http://www.youtube.com/embed/u8hTNH07V1M" frameborder="0" allowfullscreen></iframe>', 1),
(8, 7, 'Trailer name', '<iframe width="100%" height="100" src="http://www.youtube.com/embed/u8hTNH07V1M" frameborder="0" allowfullscreen></iframe>', 1),
(9, 7, 'Trailer name', '<iframe width="100%" height="100" src="http://www.youtube.com/embed/u8hTNH07V1M" frameborder="0" allowfullscreen></iframe>', 1),
(10, 16, 'dabangg', '<iframe width="100%" height="100" src="http://www.youtube.com/embed/u8hTNH07V1M" frameborder="0" allowfullscreen></iframe>', 1),
(11, 16, 'dabangg2', '<iframe width="100%" height="100" src="http://www.youtube.com/embed/u8hTNH07V1M" frameborder="0" allowfullscreen></iframe>', 1),
(12, 15, 'Trailer name', '<iframe width="100%" height="100" src="http://www.youtube.com/embed/u8hTNH07V1M" frameborder="0" allowfullscreen></iframe>', 1),
(13, 15, 'Trailer name', '<iframe width="100%" height="100" src="http://www.youtube.com/embed/u8hTNH07V1M" frameborder="0" allowfullscreen></iframe>', 1),
(14, 14, 'Trailer name', '<iframe width="100%" height="100" src="http://www.youtube.com/embed/u8hTNH07V1M" frameborder="0" allowfullscreen></iframe>', 1),
(15, 14, 'Trailer name', '<iframe width="100%" height="100" src="http://www.youtube.com/embed/u8hTNH07V1M" frameborder="0" allowfullscreen></iframe>', 1),
(16, 13, 'Trailer name', '<iframe width="100%" height="100" src="http://www.youtube.com/embed/u8hTNH07V1M" frameborder="0" allowfullscreen></iframe>', 1),
(17, 13, 'Trailer name', '<iframe width="100%" height="100" src="http://www.youtube.com/embed/u8hTNH07V1M" frameborder="0" allowfullscreen></iframe>', 1),
(18, 12, 'Trailer name', '<iframe width="100%" height="100" src="http://www.youtube.com/embed/u8hTNH07V1M" frameborder="0" allowfullscreen></iframe>', 1),
(19, 12, 'Trailer name', '<iframe width="100%" height="100" src="http://www.youtube.com/embed/u8hTNH07V1M" frameborder="0" allowfullscreen></iframe>', 1),
(20, 11, 'Trailer name', '<iframe width="100%" height="100" src="http://www.youtube.com/embed/u8hTNH07V1M" frameborder="0" allowfullscreen></iframe>', 1),
(21, 11, 'Trailer name', '<iframe width="100%" height="100" src="http://www.youtube.com/embed/u8hTNH07V1M" frameborder="0" allowfullscreen></iframe>', 1),
(22, 10, 'Trailer name', '<iframe width="100%" height="100" src="http://www.youtube.com/embed/u8hTNH07V1M" frameborder="0" allowfullscreen></iframe>', 1),
(23, 10, 'Trailer name', '<iframe width="100%" height="100" src="http://www.youtube.com/embed/u8hTNH07V1M" frameborder="0" allowfullscreen></iframe>', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
