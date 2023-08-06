-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2023 at 09:19 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dblearn`
--

-- --------------------------------------------------------

--
-- Table structure for table `booktransactions`
--

CREATE TABLE `booktransactions` (
  `transId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `transDate` datetime NOT NULL,
  `studname` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `time` varchar(50) NOT NULL,
  `subject` text NOT NULL,
  `Coach` varchar(200) NOT NULL,
  `course` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `code` varchar(10) NOT NULL,
  `state` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booktransactions`
--

INSERT INTO `booktransactions` (`transId`, `userId`, `transDate`, `studname`, `date`, `time`, `subject`, `Coach`, `course`, `email`, `code`, `state`) VALUES
(14, 23, '2023-04-28 23:44:51', 'Aya', '2023-04-20', '16:48', 'Fundamentals of CSS language', '', 'CSS', 'ayaismail@gmail.com', '26874253', 0),
(15, 23, '2023-04-28 23:46:23', 'Aya', '2023-04-13', '14:50', 'Fundamentals of html language', '', 'HTML', 'ayaismailalharbi@gmail.com', '29720344', 0),
(16, 23, '2023-04-29 00:46:08', 'aya', '2023-04-04', '05:50', 'Fundamentals of CSS language', '', 'CSS', 'ayaismailalharbi@gmail.com', '67815907', 0),
(17, 26, '2023-05-01 09:43:08', 'aya', '2023-05-17', '01:46', 'Fundamentals of PHP language', '', 'PHP', 'ayaismailalharbi@gmail.com', '19760640', 0),
(18, 23, '2023-05-02 09:13:57', 'Aya', '2023-05-25', '14:17', 'Fundamentals of html language', '', 'HTML', 'ayaismailalharbi@gmail.com', '2138817028', 0),
(19, 23, '2023-05-04 11:30:33', 'Aya', '2023-05-17', '04:34', 'Fundamentals of CSS language', '', 'CSS', 'ayaismailalharbi@gmail.com', '2602072264', 0),
(20, 23, '2023-05-04 11:54:36', 'aya', '2023-05-18', '15:57', 'Fundamentals of JQUERY language', '', 'JQUERY', 'ayaismailalharbi@gmail.com', '2794507092', 0),
(21, 23, '2023-05-04 13:32:34', 'aya', '2023-06-04', '15:33', 'Fundamentals of CSS language', '', 'CSS', 'ayaismailalharbi@gmail.com', '1839877521', 0),
(22, 23, '2023-05-04 13:33:14', 'aya', '2023-04-04', '15:33', 'Fundamentals of CSS language', '', 'CSS', 'ayaismailalharbi@gmail.com', '1711651604', 0),
(23, 23, '2023-05-05 21:10:17', 'aya', '2023-05-24', '14:14', 'Fundamentals of html language', '', 'HTML', 'ayaismailalharbi@gmail.com', '2410643535', 0);

-- --------------------------------------------------------

--
-- Table structure for table `chating`
--

CREATE TABLE `chating` (
  `msgid` int(5) NOT NULL,
  `resiveId` int(4) NOT NULL,
  `senderId` int(4) NOT NULL,
  `msg` text NOT NULL,
  `vdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `issee` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chating`
--

INSERT INTO `chating` (`msgid`, `resiveId`, `senderId`, `msg`, `vdate`, `issee`) VALUES
(34, 24, 23, 'hi export', '2023-04-28 22:05:27', 1),
(35, 24, 23, 'how are you?', '2023-04-28 22:06:04', 1),
(36, 23, 24, 'i am fine', '2023-04-28 22:06:23', 1),
(37, 24, 23, 'yes doctor', '2023-04-28 22:06:35', 1),
(38, 24, 25, 'hii', '2023-04-28 22:45:23', 1),
(39, 24, 23, 'hii', '2023-05-01 06:50:41', 1),
(40, 24, 23, 'hello', '2023-05-01 06:59:09', 1),
(41, 23, 24, 'ght', '2023-05-01 07:10:56', 1),
(42, 26, 24, 'hii', '2023-05-01 07:13:56', 0),
(43, 23, 24, 'hii', '2023-05-01 07:14:35', 1),
(44, 23, 24, 'hii', '2023-05-01 07:15:01', 1),
(45, 24, 23, 'hii', '2023-05-01 07:15:38', 1),
(46, 25, 24, 'hii', '2023-05-01 07:21:05', 0),
(48, 24, 23, 'hii', '2023-05-02 05:22:15', 1),
(49, 24, 23, 'aya', '2023-05-02 05:48:54', 1),
(50, 23, 24, 'wellcome', '2023-05-02 06:03:02', 1),
(51, 24, 23, 'hii', '2023-05-02 06:04:23', 1),
(52, 24, 23, 'hii', '2023-05-02 06:07:16', 1),
(53, 24, 23, 'hello', '2023-05-02 06:09:02', 1),
(54, 24, 23, 'hii dr', '2023-05-02 06:10:06', 1),
(55, 23, 24, 'wellcome', '2023-05-02 06:13:39', 1),
(56, 24, 27, 'hii', '2023-05-02 09:09:59', 1),
(57, 24, 27, 'hii', '2023-05-02 09:15:27', 1),
(58, 29, 23, 'hii', '2023-05-02 16:51:51', 1),
(59, 23, 29, 'wellcome', '2023-05-02 16:54:04', 1),
(60, 24, 23, 'hello', '2023-05-02 17:10:06', 1),
(61, 23, 24, 'wellcome', '2023-05-02 17:11:14', 1),
(62, 24, 23, 'hii', '2023-05-03 20:41:07', 1),
(63, 23, 24, 'wellcome', '2023-05-03 20:41:29', 1),
(64, 24, 23, 'hi raneem', '2023-05-04 09:59:11', 1),
(65, 23, 24, 'yes aya', '2023-05-04 09:59:35', 1),
(66, 24, 23, 'i want to leern css', '2023-05-04 10:00:06', 1),
(67, 23, 24, 'okay sure', '2023-05-04 10:00:15', 1),
(68, 24, 23, 'hii raneem', '2023-05-05 19:08:43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `rowid` int(4) NOT NULL,
  `courcesId` int(2) NOT NULL,
  `lessId` int(2) NOT NULL,
  `UserId` int(3) NOT NULL,
  `comment` text NOT NULL,
  `datecomment` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `state` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`rowid`, `courcesId`, `lessId`, `UserId`, `comment`, `datecomment`, `state`) VALUES
(7, 2, 1, 23, 'good', '2023-04-28 21:47:59', 1),
(8, 4, 1, 23, 'nice', '2023-04-28 21:56:33', 1),
(9, 3, 1, 23, 'useful', '2023-04-28 21:56:48', 1),
(10, 1, 1, 23, 'very useful', '2023-04-28 21:57:03', 1),
(13, 1, 1, 23, 'hii', '2023-05-04 09:01:52', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cources`
--

CREATE TABLE `cources` (
  `id` int(2) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `icon` varchar(200) NOT NULL,
  `state` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cources`
--

INSERT INTO `cources` (`id`, `name`, `description`, `icon`, `state`) VALUES
(1, 'HTML', '(HyperText Markup Language) is the code that is used to structure a web page and its content. For example, content could be structured within a set of paragraphs, a list of bulleted points, or using images and data tables. As the title suggests, this article will give you a basic understanding of HTML and its functions.', 'icon-html5 icon-medium', 1),
(2, 'CSS', '(Cascading Style Sheets) is a stylesheet language used to describe the presentation of a document written in HTML or XML (including XML dialects such as SVG, MathML or XHTML). CSS describes how elements should be rendered on screen, on paper, in speech, or on other media.', 'icon-css3 icon-medium', 1),
(3, 'JQUERY', 'jQuery is a lightweight, \"write less, do more\", JavaScript library. The purpose of jQuery is to make it much easier to use JavaScript on your website. jQuery takes a lot of common tasks that require many lines of JavaScript code to accomplish, and wraps them into methods that you can call with a single line of code.', 'icon-code icon-medium icon-rounded', 1),
(4, 'PHP', 'PHP (recursive acronym for PHP: Hypertext Preprocessor) is a widely-used open source general-purpose scripting language that is especially suited for web development and can be embedded into HTML.', 'icon-code-fork icon-medium', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `rowid` int(4) NOT NULL,
  `courcesId` int(2) NOT NULL,
  `id` int(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `urlvideo` text NOT NULL,
  `Titlevedio` text NOT NULL,
  `state` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`rowid`, `courcesId`, `id`, `name`, `title`, `description`, `urlvideo`, `Titlevedio`, `state`) VALUES
(1, 1, 1, 'Lesson 1', 'Lesson 1', 'This video describes HTML tags, elements, and attributes. \r\nThe new HTML5 doctype declaration is shown as well as the method for specifying the character encoding for the document.  \r\nThe basic structure of an HTML document is also shown.\r\nThis video introduces the html, head, meta, title, body, and p tags.', 'https://www.youtube.com/embed/9gTw2EDkaDQ?list=PLzmyR17f55-J7oZew4QxQ7cfw7d3__ZZs', 'HTML5 Tutorial For Beginners - part 1 of 6 - Getting Started', 1),
(2, 1, 2, 'Lesson 2', 'Lesson 2', 'This video describes how to use text.\r\n  The p tag is demonstrated and the heading tags are introduced.\r\n  The br tag is also shown. This video also touches on the importance of CSS.\r\n  A quick demonstration of CSS is shown to center some text and to change its color\r\n  In older versions of HTML, text could be centered by using the align attribute.\r\n  However, this attribute is deprecated and is not valid HTML5.\r\n  While the align attribute may still work in your browser, it is not compliant with HTML5 standards.\r\n  Therefore, learning CSS can be very beneficial when working with HTML5 code.', 'https://www.youtube.com/embed/YcApt9RgiT0?list=PLzmyR17f55-J7oZew4QxQ7cfw7d3__ZZs', 'HTML5 Tutorial For Beginners - part 2 of 6 - Text', 1),
(3, 1, 3, 'Lesson 3', 'Lesson 3', 'This video demonstrates how to use images and hyperlinks.\r\n    The difference between relative and absolute addressing is covered.\r\n    This video shows the height and width attributes used with the img tag.\r\n  In older versions of HTML, the height and width attributes could be specified in pixels or as a percentage.\r\n    However, it is not valid HTML5 to specify these values as a percentage.\r\n    If a percentage value is desired then CSS can be used.', 'https://www.youtube.com/embed/CGSdK7FI9MY?list=PLzmyR17f55-J7oZew4QxQ7cfw7d3__ZZs', 'HTML5 Tutorial For Beginners - part 3 of 6 - Text', 1),
(4, 1, 4, 'Lesson 4', 'Lesson 4', 'This video introduces 2 elements that are new to HTML5, the audio and video elements.\r\n While older browsers don\'t support these new elements, the popular newer browsers do.', 'https://www.youtube.com/embed/4I1WgJz_lmA?list=PLzmyR17f55-J7oZew4QxQ7cfw7d3__ZZs', 'HTML5 Tutorial For Beginners - part 4 of 6 - Text', 1),
(5, 1, 5, 'Lesson 5', 'Lesson 5', 'This video will introduce 7 elements that are new to HTML5. \r\nThese elements will be used to build a sample web page.\r\nThe new elements covered in this video are: article, aside, footer, header, main, nav, and section.', 'https://www.youtube.com/embed/dDn9uw7N9Xg?list=PLzmyR17f55-J7oZew4QxQ7cfw7d3__ZZs', 'HTML5 Tutorial For Beginners - part 5 of 6 - Text', 1),
(6, 2, 1, 'Lesson 1', 'Lesson 1', 'this video we go start with the body.', 'https://www.youtube.com/embed/zO4DFCjgdx0?list=PLr6-GrHUlVf9ZleRsd5oTcrziNglndsXW', 'CSS Layout Tutorial - 01 - Introduction', 1),
(7, 2, 2, 'Lesson 2', 'Lesson 2', 'this video we go start with the body.', 'https://www.youtube.com/embed/u_fTLMswhZw?list=PLr6-GrHUlVf9ZleRsd5oTcrziNglndsXW', 'CSS Layout Tutorial - 02 - Styling the body', 1),
(8, 2, 3, 'Lesson 3', 'Lesson 3', 'This video we will add the header and navigation bar.', 'https://www.youtube.com/embed/cqTNHMipvhM?list=PLr6-GrHUlVf9ZleRsd5oTcrziNglndsXW', 'CSS Layout Tutorial - 03 - Adding header and navigation section', 1),
(9, 2, 4, 'Lesson 4', 'Lesson 4', 'this video we will add the main section.', 'https://www.youtube.com/embed/gG2_M3JGEf0?list=PLr6-GrHUlVf9ZleRsd5oTcrziNglndsXW', 'CSS Layout Tutorial - 04 - Adding the main content section', 1),
(10, 2, 5, 'Lesson 5', 'Lesson 5', 'this video we will add the sidebar.', 'https://www.youtube.com/embed/qmqD4aTv18Q?list=PLr6-GrHUlVf9ZleRsd5oTcrziNglndsXW', 'CSS Layout Tutorial - 05 - Adding the sidebar', 1),
(11, 3, 1, 'Lesson 1', 'Lesson 1', 'This video describes How to Get Started With | jQuery Tutorial | Learn jQuery | jQuery Tutorial For Beginners.', 'https://www.youtube.com/embed/BaIgTKj1iCQ?list=PL0eyrZgxdwhy7byLHsVkuhtRV_IpoJU7n', '1: How to Get Started With | jQuery Tutorial | Learn jQuery | jQuery Tutorial For Beginners', 1),
(12, 3, 2, 'Lesson 2', 'Lesson 2', 'This video describes How to add jQuery to your website | Learn jQuery | jQuery tutorial.', 'https://www.youtube.com/embed/EwUOsRlDTLQ?list=PL0eyrZgxdwhy7byLHsVkuhtRV_IpoJU7n', '2: How to add jQuery to your website | Learn jQuery | jQuery tutorial', 1),
(13, 3, 3, 'Lesson 3', 'Lesson 3', 'This video jQuery syntax and differences from JavaScript - Learn jQuery front-end\r\n  programming. In this lesson we will learn about the syntax of jQuery,\r\n  and talk about the differences between jQuery and JavaScript.', 'https://www.youtube.com/embed/9TwYaSnb2GI?list=PL0eyrZgxdwhy7byLHsVkuhtRV_IpoJU7n', '3: jQuery syntax and differences from JavaScript - Learn jQuery front-end programming', 1),
(14, 3, 4, 'Lesson 4', 'Lesson 4', 'This video How to use events in jQuery - Learn jQuery front-end programming.\r\n  In this lesson we will learn about the various events we have in jQuery, what they do,\r\n  and how to use them.', 'https://www.youtube.com/embed/9bCrSoSNp_w?list=PL0eyrZgxdwhy7byLHsVkuhtRV_IpoJU7n', '4: How to use events in jQuery - Learn jQuery front-end programming', 1),
(15, 3, 5, 'Lesson 5', 'Lesson 5', 'This video How to make elements disappear in jQuery - Learn jQuery front-end\r\n  programming. In this lesson we will learn how to make HTML elements appear and disappear\r\n  inside our websites. We will do this using the jQuery effects called show, hide, and fade.', 'https://www.youtube.com/embed/6HWaZIfUZVg?list=PL0eyrZgxdwhy7byLHsVkuhtRV_IpoJU7n', '5: How to make elements appear and disappear in jQuery - Learn jQuery front-end programming', 1),
(16, 4, 1, 'Lesson 1', 'Lesson 1', 'Introduction to PHP Programming | PHP Tutorial | PHP For Beginners | Learn PHP\r\n  Programming. Introduction to PHP programming, is the first episode in this PHP tutorial for beginners series.\r\n  This is a complete PHP tutorial for absolute beginners, teaches PHP to people who are new at it.', 'https://www.youtube.com/embed/qVU3V0A05k8?list=PL0eyrZgxdwhwBToawjm9faF1ixePexft-', 'Introduction to PHP Programming', 1),
(17, 4, 2, 'Lesson 2', 'Lesson 2', 'Installing A Local Server for PHP | PHP Tutorial | Learn PHP Programming | PHP for Beginners. I\r\n  n this PHP tutorial you will learn how to install a local server on your computer.', 'https://www.youtube.com/embed/mXdpCRgR-xE?list=PL0eyrZgxdwhwBToawjm9faF1ixePexft-', '2: Installing A Local Server for PHP | PHP Tutorial | Learn PHP Programming | PHP for Beginners', 1),
(18, 4, 3, 'Lesson 3', 'Lesson 3', 'This video Output In Browser Using PHP | PHP Tutorial | Learn PHP Programming |\r\n  PHP for Beginners. In this PHP tutorial you will learn how to output in the browser using php,\r\n  and you will write your first PHP code.', 'https://www.youtube.com/embed/zlCwveRcyKQ?list=PL0eyrZgxdwhwBToawjm9faF1ixePexft-', '3: Output In Browser Using PHP | PHP Tutorial | Learn PHP Programming | PHP for Beginners', 1),
(19, 4, 4, 'Lesson 4', 'Lesson 4', 'this video How to Create PHP Variables | PHP Tutorial | Learn PHP Programming | PHP for Beginners.\r\n  In this PHP tutorial you will learn about variables which are used to save data in PHP.', 'https://www.youtube.com/embed/CoorcqbkpI0?list=PL0eyrZgxdwhwBToawjm9faF1ixePexft-', '4: How to Create PHP Variables | PHP Tutorial | Learn PHP Programming | PHP for Beginners', 1),
(20, 4, 5, 'Lesson 5', 'Lesson 5', 'How to Write Comments in PHP | PHP Tutorial | Learn PHP Programming |\r\n  PHP for Beginners. In this PHP tutorial you will learn how to comment in PHP.\r\n  Commenting is mainly used when we want to label certain parts of our code so we know which code does what.\r\n  Commenting can also be used to test certain code without having to delete it, or if code is\r\n  planned to be used later.', 'https://www.youtube.com/embed/CoorcqbkpI0?list=PL0eyrZgxdwhwBToawjm9faF1ixePexft-', '5: How to Create PHP Variables | PHP Tutorial | Learn PHP Programming | PHP for Beginners', 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(6) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `message`) VALUES
(19, 'Aya', 'ayaismailalharbi@gmail.com', 'info', 'info'),
(20, 'Aya', 'Ayaismail@gmail.com', 'info', 'ifds'),
(21, 'Aya', 'Ayaismail@gmail.com', 'html ', 'hii'),
(22, 'Aya', 'ayaismailalharbi@gmail.com', 'info', 'hii');

-- --------------------------------------------------------

--
-- Table structure for table `quizs`
--

CREATE TABLE `quizs` (
  `rowid` int(3) NOT NULL,
  `courcesId` int(2) NOT NULL,
  `lessId` int(3) NOT NULL,
  `id` int(3) NOT NULL,
  `name` varchar(100) NOT NULL,
  `question` text NOT NULL,
  `state` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quizs`
--

INSERT INTO `quizs` (`rowid`, `courcesId`, `lessId`, `id`, `name`, `question`, `state`) VALUES
(1, 1, 1, 1, 'Quiz 1', 'Q: What do you understand by HTML?', 1),
(2, 1, 1, 2, 'Quiz 2', 'Q:What does HTML stand for?', 1),
(3, 1, 1, 3, 'Quiz 3', 'Q: Who is making the Web standards?', 1),
(4, 1, 1, 4, 'Quiz 4', 'Q:How many heading tags are there in HTML5?', 1),
(5, 1, 1, 5, 'Quiz 5', 'Q:Text/Html is called the __________ of the page?', 1),
(6, 2, 1, 1, 'Quiz 1', 'Q: What does CSS stand for?', 1),
(7, 2, 1, 2, 'Quiz 2', 'Q: Where in an HTML document is the correct place to refer to an external style sheet?', 1),
(8, 2, 1, 3, 'Quiz 3', 'Q: Which property is used to change the background color?', 1),
(9, 2, 1, 4, 'Quiz 4', 'Q: Which CSS property is used to change the text color of an element?', 1),
(10, 2, 1, 5, 'Quiz 5', 'Q: Which property is used to change the left margin of an element?', 1),
(11, 3, 1, 1, 'Quiz 1', 'Q: Which sign does jQuery use as a shortcut for jQuery?', 1),
(12, 3, 1, 2, 'Quiz 2', 'Q: Which jQuery method is used to hide selected elements?', 1),
(13, 3, 1, 3, 'Quiz 3', 'Q: Which jQuery method is used to perform an asynchronous HTTP request??', 1),
(14, 3, 1, 4, 'Quiz 4', 'Q: Which statement is true?', 1),
(15, 3, 1, 5, 'Quiz 5', 'Q: What scripting language is jQuery written in?', 1),
(16, 4, 1, 1, 'Quiz 1', 'Q:What does PHP stand for?', 1),
(17, 4, 1, 2, 'Quiz 2', 'Q:How do you create a cookie in PHP?', 1),
(18, 4, 1, 3, 'Quiz 3', 'Q:How do you write \"Hello World\" in PHP?', 1),
(19, 4, 1, 4, 'Quiz 4', 'Q:All variables in PHP start with which symbol?', 1),
(20, 4, 1, 5, 'Quiz 5', 'Q:What is the correct way to create a function in PHP?', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quizs_details`
--

CREATE TABLE `quizs_details` (
  `rowid` int(3) NOT NULL,
  `courcesId` int(2) NOT NULL,
  `lessId` int(3) NOT NULL,
  `qid` int(3) NOT NULL,
  `id` int(3) NOT NULL,
  `answer` text NOT NULL,
  `value` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quizs_details`
--

INSERT INTO `quizs_details` (`rowid`, `courcesId`, `lessId`, `qid`, `id`, `answer`, `value`) VALUES
(1, 1, 1, 1, 1, 'HTML describes the structure of a webpage', 'Correct answer'),
(2, 1, 1, 1, 2, 'HTML is the standard markup language mainly used to create web pages', 'Wrong answer'),
(3, 1, 1, 1, 3, 'HTML consists of a set of elements that helps the browser how to view the content', 'Wrong answer'),
(4, 1, 1, 2, 1, 'Hyperlinks and text markup language', 'Wrong answer'),
(5, 1, 1, 2, 2, 'Home tool markup language', 'Wrong answer'),
(6, 1, 1, 2, 3, 'Hyper text markup language', 'Correct answer'),
(7, 1, 1, 3, 1, 'Google', 'Wrong answer'),
(8, 1, 1, 3, 2, 'The world wide web consortium', 'Correct answer'),
(9, 1, 1, 3, 3, 'Microsoft', 'Wrong answer'),
(10, 1, 1, 4, 1, '2', 'Wrong answer'),
(11, 1, 1, 4, 2, '5', 'Wrong answer'),
(12, 1, 1, 4, 3, '6', 'Correct answer'),
(13, 1, 1, 5, 1, 'Content type', 'Wrong answer'),
(14, 1, 1, 5, 2, 'Content type/MIME type', 'Correct answer'),
(15, 1, 1, 5, 3, 'MIME type', 'Wrong answer'),
(16, 2, 1, 1, 1, 'Creative Style Sheets', 'Wrong answer'),
(17, 2, 1, 1, 2, 'Cascading Style Sheets', 'Correct answer'),
(18, 2, 1, 1, 3, 'Computer Style Sheets', 'Wrong answer'),
(19, 2, 1, 2, 1, 'In the <body> section', 'Wrong answer'),
(20, 2, 1, 2, 2, 'At the end of the document', 'Wrong answer'),
(21, 2, 1, 2, 3, 'In the <head> section', 'Correct answer'),
(22, 2, 1, 3, 1, 'background-color ', 'Correct answer'),
(23, 2, 1, 3, 2, 'color', 'Wrong answer'),
(24, 2, 1, 3, 3, 'bgcolor', 'Wrong answer'),
(25, 2, 1, 4, 1, 'fgcolor', 'Wrong answer'),
(26, 2, 1, 4, 2, 'color', 'Correct answer'),
(27, 2, 1, 4, 3, 'text-color', 'Wrong answer'),
(28, 2, 1, 5, 1, 'margin-left', 'Correct answer'),
(29, 2, 1, 5, 2, 'padding-left', 'Wrong answer'),
(30, 2, 1, 5, 3, 'indent', 'Wrong answer'),
(31, 3, 1, 1, 1, 'the ? Sign', 'Wrong answer'),
(32, 3, 1, 1, 2, 'the $ sign', 'Correct answer'),
(33, 3, 1, 1, 3, 'the % sign', 'Wrong answer'),
(34, 3, 1, 2, 1, 'hidden()', 'Wrong answer'),
(35, 3, 1, 2, 2, 'hide() ', 'Correct answer'),
(36, 3, 1, 2, 3, 'display(none)', 'Wrong answer'),
(37, 3, 1, 3, 1, 'jQuery.ajaxSetup()', 'Wrong answer'),
(38, 3, 1, 3, 2, 'jQuery.ajaxAsync()', 'Wrong answer'),
(39, 3, 1, 3, 3, 'jQuery.ajax()', 'Correct answer'),
(40, 3, 1, 4, 1, 'To use jQuery, you do not have to do anything. Most browsers (Internet Explorer, Chrome, Firefox and Opera) have the jQuery library built in the browser', 'Wrong answer'),
(41, 3, 1, 4, 2, 'To use jQuery, you can refer to a hosted jQuery library at Google', 'Correct answer'),
(42, 3, 1, 4, 3, 'To use jQuery, you must buy the jQuery library at www.jquery.com', 'Wrong answer'),
(43, 3, 1, 5, 1, 'JavaScript', 'Correct answer'),
(44, 3, 1, 5, 2, 'C++', 'Wrong answer'),
(45, 3, 1, 5, 3, 'C#', 'Wrong answer'),
(46, 4, 1, 1, 1, 'Private Home Page', 'Wrong answer'),
(47, 4, 1, 1, 2, 'PHP: Hypertext Preprocessor', 'Correct answer'),
(48, 4, 1, 1, 3, 'Personal Hypertext Processor', 'Wrong answer'),
(49, 4, 1, 2, 1, 'setcookie() ', 'Correct answer'),
(50, 4, 1, 2, 2, 'createcookie ', 'Wrong answer'),
(51, 4, 1, 2, 3, 'makecookie()', 'Wrong answer'),
(52, 4, 1, 3, 1, 'echo \"Hello World\"; ', 'Wrong answer'),
(53, 4, 1, 3, 2, '\"Hello World\"; ', 'Correct answer'),
(54, 4, 1, 3, 3, 'Document.Write(\"Hello World\");', 'Wrong answer'),
(55, 4, 1, 4, 1, '!', 'Wrong answer'),
(56, 4, 1, 4, 2, '&', 'Wrong answer'),
(57, 4, 1, 4, 3, '$', 'Correct answer'),
(58, 4, 1, 5, 1, 'function myFunction()', 'Correct answer'),
(59, 4, 1, 5, 2, 'create myFunction()', 'Wrong answer'),
(60, 4, 1, 5, 3, 'new_function myFunction()', 'Wrong answer');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserId` int(11) NOT NULL,
  `AccountType` int(11) NOT NULL,
  `IsAdmin` int(11) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `FName` varchar(255) NOT NULL,
  `LName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `PassWord` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `IsActive` int(2) NOT NULL,
  `RegisterDate` datetime NOT NULL,
  `LoginDate` datetime NOT NULL,
  `LogoutDate` datetime NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `AccountType`, `IsAdmin`, `UserName`, `FName`, `LName`, `Email`, `Phone`, `PassWord`, `Address`, `IsActive`, `RegisterDate`, `LoginDate`, `LogoutDate`, `img`) VALUES
(23, 2, 0, 'aya', '', '', 'ayaismail@gmail.com', '', '1', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'img/users/1682718246.jpg'),
(24, 1, 0, 'raneem', '', '', 'ranem@gmail.com', '', '2', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'img/users/1682718726.jpg'),
(25, 2, 0, 'mashael', '', '', 'mashael@gmail.com', '', '3', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'img/users/1682721789.jpg'),
(26, 2, 0, 'ayaa', '', '', 'ayaismailalharbi@gmail.com', '', '11', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'img/users/1682733480.jpg'),
(27, 2, 0, 'reem', '', '', 'reem@gmail.com', '', '4', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'img/users/1683018587.jpg'),
(29, 1, 0, 'razan', '', '', 'razan@gmail.com', '', '5', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'img/users/1683046256.jpg'),
(30, 2, 0, 'ayaaa', '', '', 'ayaaa@gmail.com', '', '4', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'img/users/1683314029.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `workshop`
--

CREATE TABLE `workshop` (
  `id` int(4) NOT NULL,
  `description` text NOT NULL,
  `period` int(2) NOT NULL,
  `img` varchar(200) NOT NULL,
  `state` int(1) NOT NULL,
  `coursid` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `workshop`
--

INSERT INTO `workshop` (`id`, `description`, `period`, `img`, `state`, `coursid`) VALUES
(1, 'Fundamentals of html language', 2, 'img/workshop/html1.jpg', 1, 1),
(2, 'Fundamentals of CSS language', 3, 'img/workshop/css.png', 1, 2),
(3, 'Fundamentals of PHP language', 2, 'img/workshop/php.jpg', 1, 4),
(4, 'Fundamentals of JQUERY language', 2, 'img/workshop/jquery.jpg', 1, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booktransactions`
--
ALTER TABLE `booktransactions`
  ADD PRIMARY KEY (`transId`);

--
-- Indexes for table `chating`
--
ALTER TABLE `chating`
  ADD PRIMARY KEY (`msgid`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`rowid`);

--
-- Indexes for table `cources`
--
ALTER TABLE `cources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`rowid`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizs`
--
ALTER TABLE `quizs`
  ADD PRIMARY KEY (`rowid`);

--
-- Indexes for table `quizs_details`
--
ALTER TABLE `quizs_details`
  ADD PRIMARY KEY (`rowid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`),
  ADD UNIQUE KEY `UserName` (`Email`);

--
-- Indexes for table `workshop`
--
ALTER TABLE `workshop`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booktransactions`
--
ALTER TABLE `booktransactions`
  MODIFY `transId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `chating`
--
ALTER TABLE `chating`
  MODIFY `msgid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `rowid` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cources`
--
ALTER TABLE `cources`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `rowid` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `quizs`
--
ALTER TABLE `quizs`
  MODIFY `rowid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `quizs_details`
--
ALTER TABLE `quizs_details`
  MODIFY `rowid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `workshop`
--
ALTER TABLE `workshop`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
