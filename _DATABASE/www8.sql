-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 09, 2014 at 06:30 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `www8`
--
CREATE DATABASE IF NOT EXISTS `www8` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `www8`;

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

DROP TABLE IF EXISTS `blog_categories`;
CREATE TABLE IF NOT EXISTS `blog_categories` (
  `blog_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_category_name` varchar(20) NOT NULL,
  PRIMARY KEY (`blog_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`blog_category_id`, `blog_category_name`) VALUES
(1, 'None'),
(2, 'Design'),
(3, 'Media Arts'),
(4, 'Interactive System');

-- --------------------------------------------------------

--
-- Table structure for table `blog_content`
--

DROP TABLE IF EXISTS `blog_content`;
CREATE TABLE IF NOT EXISTS `blog_content` (
  `blog_content_id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_category_id` int(11) NOT NULL,
  `blog_user_id` int(11) NOT NULL,
  `blog_content_title` varchar(50) NOT NULL,
  `blog_content_text` text NOT NULL,
  `blog_content_tags` varchar(50) NOT NULL,
  `blog_content_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `blog_publish` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`blog_content_id`),
  KEY `blog_user_id` (`blog_user_id`),
  KEY `blog_category_id` (`blog_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=73 ;

--
-- Dumping data for table `blog_content`
--

INSERT INTO `blog_content` (`blog_content_id`, `blog_category_id`, `blog_user_id`, `blog_content_title`, `blog_content_text`, `blog_content_tags`, `blog_content_date`, `blog_publish`) VALUES
(8, 4, 1, 'Hello World', 'Hi! <br />This is my first blog post.', '', '2014-02-14 02:51:54', 1),
(9, 1, 2, 'Feb 13', 'I have been working on my IAT352 assignment the whole day.', '', '2014-02-17 06:30:26', 1),
(10, 2, 1, 'IAT100', 'Made a poster today !', '', '2014-02-15 21:05:08', 1),
(12, 4, 3, 'IAT410', 'It is a challenging class.', '', '2014-02-14 06:12:47', 1),
(13, 4, 1, 'IAT352 Update', 'I''ll keep updating this blog', '', '2014-02-14 20:59:40', 1),
(14, 4, 7, 'IAT352', 'This is a new post', '', '2014-02-15 18:53:46', 1),
(15, 3, 22, 'Turpis sit', 'Turpis sit amet urna dignissim, et egestas metus rutrum. Proin fringilla felis ac odio sodales, hendrerit pretium erat sagittis. Vestibulum sit amet nunc vehicula, dictum metus ut, commodo ipsum. Fusce imperdiet lorem ut ante consectetur auctor. Suspendisse tempor nibh eu felis sagittis iaculis. Praesent gravida vel metus vitae elementum. In pharetra justo vel enim elementum, vel ornare elit congue. Donec non nulla mi. Pellentesque vehicula quis ipsum non congue. Phasellus euismod elit vitae justo hendrerit eleifend. Donec mattis diam ac nunc commodo, eu dapibus velit pulvinar.', '#Loremipsum#', '2014-02-17 07:47:23', 1),
(16, 4, 22, 'HI', 'I''M "MASON"', '', '2014-02-17 05:16:48', 1),
(17, 4, 22, 'Aliquam', 'Nam bibendum dui ut tellus malesuada, eget tempor libero faucibus. Morbi posuere nunc congue, ultricies enim vel, vestibulum leo. Proin scelerisque vehicula elit, et tempor nulla condimentum eget. \r\n\r\nAliquam erat volutpat. Vestibulum a felis purus. Vivamus hendrerit a nibh in vestibulum. Donec et velit tincidunt, varius leo vel, fermentum magna. Vestibulum pretium neque libero, ut gravida enim malesuada ac.\r\n', '#loremipsum#', '2014-02-17 07:47:23', 1),
(18, 2, 22, 'Duis', 'Fusce volutpat quam vulputate neque gravida, feugiat pretium elit congue. Nam tempor sapien non egestas imperdiet. Nullam in suscipit urna. Vivamus cursus vehicula fermentum. \r\n\r\nDuis fermentum pretium libero, eu posuere leo fermentum ut. Maecenas tincidunt mollis aliquet. Quisque varius nulla quam, ut ullamcorper lectus vestibulum eu. Fusce pharetra eu sapien sed iaculis. Cras quis lorem porttitor, bibendum neque rhoncus, interdum turpis. \r\n\r\nEtiam tincidunt mattis velit id posuere. Nam laoreet arcu vel augue laoreet, vitae pretium orci elementum. In hac habitasse platea dictumst. Morbi porttitor aliquam purus vel ornare.', '#LOREM#IPSUM#', '2014-02-17 07:47:23', 1),
(19, 2, 22, 'Praesent vitae tellus..', 'Praesent vitae tellus vel ante lacinia vehicula porttitor eget mi. Fusce varius volutpat neque in scelerisque. Sed non massa eros. Integer orci dui, vulputate non tortor sit amet, accumsan interdum mauris. Curabitur varius at erat quis molestie. Donec vitae convallis nibh. Pellentesque mi mi, pretium eu aliquam id, porttitor sit amet augue.\r\n', '#Loremipsum#', '2014-02-17 07:47:23', 1),
(20, 4, 22, 'Eget', 'Nam sed feugiat ante. Proin vitae nisi nec ante congue facilisis eget eget velit. ', '#Loremipsum#', '2014-02-17 07:47:23', 1),
(21, 4, 22, 'Sed Leo Odio', 'Cras aliquam rutrum nunc non eleifend. Suspendisse semper sodales tortor in consectetur. Cras sit amet lectus elementum, auctor diam nec, consectetur quam. Phasellus viverra porttitor justo, vitae blandit orci dapibus vitae. Maecenas eu nisi eu nulla facilisis vestibulum sodales eget augue. Donec tempus risus in sollicitudin rhoncus. Nam malesuada massa sit amet enim luctus, ac dignissim felis accumsan. \r\n\r\nSed leo odio, rutrum ac varius a, imperdiet et augue. Aliquam consequat ipsum a ante scelerisque, a molestie mauris malesuada. Nam eget egestas ante. Fusce nec libero in lectus laoreet convallis. Maecenas sed vulputate dui. Quisque iaculis iaculis aliquam. Vivamus quis ipsum tempor, cursus sapien vitae, congue diam. Integer tincidunt turpis et dolor scelerisque ultrices.\r\n', '#Loremipsum#', '2014-02-17 07:47:23', 1),
(22, 3, 22, 'Sapien', 'Nulla justo nunc, aliquet non blandit posuere, congue nec arcu. Fusce consequat ante erat, nec accumsan neque eleifend non. Mauris tempus urna quis magna aliquam aliquet. Integer feugiat, arcu in tincidunt volutpat, neque tortor feugiat enim, ut mattis nibh libero eget sapien.', '#Loremipsum#', '2014-02-16 08:00:00', 1),
(24, 4, 1, 'Asst2 Update', 'Trying to implement tags as a bonus feature.', '#sfu#siat#iat352#', '2014-02-17 07:33:29', 1),
(25, 4, 1, 'Asst2 Update', 'Seems like hashtags are working.', '#iat#iat352#assignment2#', '2014-02-17 07:33:29', 1),
(26, 1, 1, 'Tag Test', 'Testing the tags', '#sfu#iat#test#', '2014-02-17 07:33:29', 1),
(27, 4, 2, 'Individual Assessment – Week 1', 'In the past week, we brainstormed and went over many game ideas, and we decided to develop a 2D, side-scroller stealth-action game called Indignation. The game cyberpunk themed. One core concept is the “criminal’s dilemma” that during the stealth gameplay the player is given freedom to make various decisions in order to build a unique ending. For example, the player can choose to betray his/her NPC partner to survive, or take the penalty. We also discussed and assigned different roles to each member. I will be the game designer and programmer in this project.', '#sfu#siat#iat410#individualAssessment#', '2014-02-17 08:16:52', 1),
(28, 4, 2, 'Individual Assessment – Week 2', 'We had a brainstorming session this week for our story plot. I also installed Unity on my laptop in order to get more familiar about the application as I have no Unity experience at all.', '#sfu#siat#iat410#individualAssessment#', '2014-02-17 08:17:16', 1),
(29, 1, 2, 'Individual Assessment – Week 3', 'This week, we met up, discussed about the game mechanic details, and decided on the game flow together. We also completed the game design document this week. Every one of us was assigned a section based on our skill sets and knowledge. I created the flowboard for this week.', '#sfu#siat#iat410#individualAssessment#', '2014-02-17 08:17:31', 1),
(30, 4, 2, 'Individual Assessment – Week 4', 'We had a short meeting this week to discuss about what we need to work on for the prototype. I watched a few Unity 2D side-scrolling game tutorial videos in order to get a better idea about building a game in Unity. I also looked into GUI in unity a bit as it will be usually implementing a main menu in our game.', '#sfu#siat#iat410#individualAssessment#', '2014-02-17 08:18:04', 1),
(31, 4, 2, 'Individual Assessment – Week 5', 'Gary and I have been working on the playable digital prototype this week. Since both of us are new to Unity, we spent many hours learning and figuring out some basics structures and functions, such as ray casting, collision detection, game physics, etc. We implemented our first prototype with the following mechanics: Player’s movement (Left, Right, Jump), Hiding, and the Enemy’s movement and detections. We successfully implemented various levels of detections for the enemies (Sight and hearing) using ray-casting and the hit-box method I learnt from IAT265. We also created two kinds of enemies for now (Patrol and Guard) while patrol walks around and guard stands still and chases the player only when he is alerted. We also implemented two kinds of Platform (Still and moving) that we can use in our prototype.', '#sfu#siat#iat410#individualAssessment#', '2014-02-17 08:18:21', 1),
(32, 1, 3, 'CMPT275 assignment', 'Curabitur bibendum scelerisque sem, sit amet lobortis ligula interdum vitae. Pellentesque ultrices lacinia diam. Sed dignissim vel ante vel imperdiet. Sed tempor ultricies nulla, nec convallis lectus fringilla vel. Nunc vitae tortor ut tellus tempor euismod. Ut ultricies elit ut enim convallis pharetra id a justo. Donec semper tortor in turpis aliquam, blandit lobortis nisi commodo. Vestibulum augue lectus, hendrerit vitae dui a, lacinia varius diam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;', '#sfu#cmpt#', '2014-02-17 08:20:33', 1),
(33, 1, 3, 'CMPT150', 'Curabitur at ornare lacus, eu condimentum velit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.', '#sfu#cmpt#', '2014-02-17 08:20:57', 1),
(34, 4, 7, 'A1: Basic Website with PHP', 'This is the first assignment in the context of the project as defined in the Assignments Overview. You may still be thinking about the details of your project (if you want to do an alternate project), but you should have the proposal for your project approved by the the due time of this first assignment. Hence, you should be able to complete this first assignment within the context of your project. <br /><br />This is what you are asked to do: <br /><br />Design web site front end for members of your website including information design, navigation, HTML and CSS design for pages and forms.<br />Provide a form for setting up a member account, write PHP code that will generate and process the form, and store information in the file.<br />Provide two browsing interfaces. First that will list all registered members ordered by name, the second that will show members grouped by the high school they attended (or an alternative grouping mechanism for members in your project).<br />A page that displays detail information for a selected member.<br />The rest of the webpages on your website will be placeholders. <br />Marking rubric: <br /><br />web site design (40%),<br />clarity and design of PHP code, including comments (30%),<br />scope of implemented functionality (30%)<br />How to submit:<br /><br />Your project files have to be located in the folder named as you SFU computing account within the XAMPP''s htdocs folder, i.e. htdocs/[sfu-acount-name]/. For example, my would be htdocs/mhatala/. As a result, the local URL for your website will be http://localhost/[sfu-acount-name]/index.php. <br /><br />To submit your assignment, you need to zip the whole folder, including the folder named . This way, when we unzip your submission in our htdocs, we will see ]your folder name (and other students folder names).', '#sfu#iat#iat352#', '2014-02-17 08:22:46', 1),
(35, 4, 7, 'A2: Database-powered Website with Users Management', 'Assignment 2: Database-powered Website with Users Management<br />(4 weeks – includes reading break)<br />15% towards final mark + 5% bonus for optional features<br /><br />design a database to store the information supporting the functionality of the website. <br />IMPORTANT: Your database name MUST BE [your-sfu-account-name], the mysql user named [your-sfu-account-name] that can access the database from the localhost  must be setup with the password equal to [your-sfu-account-name]. Failure to use this setting in your PHP code will not allow your code to run on our test server resulting in failed assignment.  <br />modify developed code to store information in the database<br />add pages to enable members to post blog messages<br />add pages providing a full visitor browsing support<br />enable visitors to register (includes proper DB design) <br />optionally enable them to select members they want to follow and provide a personalized home page with information on followed members<br />From the end user perspective, what is expected is a fully functioning website with working navigation, pages for users to create their accounts and edit/modify information in their accounts, post blog messages, for visitors to browse members, view posted blogs via different modes (e.g. by user, by timeline, by high school). ', '#sfu#iat#iat352#', '2014-02-17 08:23:16', 1),
(36, 4, 7, 'Alternate project proposal', 'If you wish to pursue your own project, submit a proposal here. It should outline the overal puprose of the website and functionality for "members" and "visitors" at similar level of detail it was done for the example project in the  Assignments Overview. Submit as text (preferred) or PDF.', '#sfu#iat#iat352#', '2014-02-17 08:23:54', 1),
(37, 2, 10, 'Drop O'' Clock', 'Our Water Clock has no moving parts. Time is measured by the volume of liquid that flows from one container to the other. Time unit is controlled by the small opening in between each half of the body by allowing gravity to move the liquid from one body chamber to another. Time does not need to be adjusted (timer only keeps track of an 8 hour period); user would ‘reset’ the timer by empting out the water from the bottom chamber and pouring it in the top chamber', '#sfu#iat336#', '2014-02-17 08:29:02', 1),
(38, 2, 10, 'IAT334', 'Most digital products today lack humanity and seem to be concerned around technological solutions due to the need of developers and marketing teams to meet their own goals due to the nature of their jobs.<br />These digital products assume that people are technology literate, they require the user to have some knowledge about them and most are built without understanding the user’s goals because for example, programmers need to choose between producing a code that meets users goals but difficult and time consuming and a code that is fast and easy. They typically will choose a faster code because they need to meet deadlines.<br />In the school of Interactive Arts and Technology, we learn to focus more on human needs and build designs that provide technological solutions to human-based problems. The reading seems to agree with the schools’ point of view about design but users, even ones who are not very familiar with technological systems are also capable of learning and use their brain to figure out something new. I felt the author was treating technology as being bery difficult.<br />Would you focus on the user’s goals or the company’s goals if you have to design a digital product within a very short time, and would you try to make a balance between them?<br />Do you think developers must have some knowledge about humanity goals or that is not their job?<br />', '#sfu#iat334#', '2014-02-17 08:29:56', 1),
(39, 2, 10, 'Machine', 'Any Machine has a way to accomplish its purpose and this is called system model, or implementation model because it describes the details of the way a program is implemented in a code.<br />People do not need to know all the details on how a machine works because they can use their imagination and experience while interacting with a machine. This is called mental model, or conceptual model. This mental model is supported by a represented model, which is a way the designer chooses to represent a program''s functioning to the user.', '#sfu#machine#', '2014-02-17 08:30:36', 1),
(40, 3, 6, 'Fight Club', 'You are not your job. You are not how much you have in the bank. You are not the contents of your wallet. You are not your khakis. You are not a beautiful and unique snowflake. What happens first is you can''t sleep. What happens then is there''s a gun in your mouth. And what happens next is you meet Tyler Durden. Let me tell you about Tyler. He had a plan. In Tyler we trusted. Tyler says the things you own, end up owning you. It''s only after you''ve lost everything that you''re free to do anything. Fight Club represents that kind of freedom. First rule of Fight Club: You do not talk about Fight Club. Second rule of Fight Club: You do not talk about Fight Club. Tyler says self-improvement is masturbation. Tyler says self-destruction might be the answer.', '#movie#flightClub#', '2014-02-17 08:31:54', 1),
(41, 3, 6, 'American Psycho', 'American Psycho is a 2000 American cult crime drama film directed by Mary Harron based on Bret Easton Ellis''s novel of the same name.', '#movie#AmericanPsycho#', '2014-02-17 08:32:35', 1),
(42, 3, 6, 'Black Mirror Review', 'After watching the first episode, I was shocked about the negative reviews it received. I''m going to be honest, it wasn''t what I expected but that doesn''t make it bad. It was very dark, and very shocking; Had me completely on the edge of my seat throughout. You will have to watch it with an open mind as it is somewhat distasteful and well... extremely far-fetched (Which is pretty absurd for a satire, but I digress.) I did thoroughly enjoy it however, it hit all the right notes.<br /><br />After watching the second episode, I was left in shock about the jarring contrast from the first episode. It''s so different than the prior, it''s set in an alternate reality and is just.. unusual. Still dark, still intriguing, but didn''t quite capture my imagination the way the first one did.<br /><br />The third and final instalment was probably my favourite of the 3. It was again, completely unrelated from the previous 2, but it had a really interesting concept and narrative, and was executed phenomenally. <br /><br />All in all, the series as a whole is very interesting, if somewhat inconsistent.', '#drama#', '2014-02-17 08:34:24', 1),
(43, 3, 23, 'Back to the Future', 'With the help of a wacky scientist, a young teen travels back to 1955 in a Delorean turned time-machine. Once there, he meets his parents, still teenagers, but his presence throws things out-of-whack and he must ensure they fall in love and get married or else he''ll never come to exist.', '#movie#', '2014-02-17 08:36:55', 1),
(44, 1, 23, 'Quam et', 'Nulla hendrerit vitae quam et tristique. Cras tempus ipsum orci, in consequat risus ultricies vel. Fusce sodales volutpat scelerisque. Ut sem dolor, semper eu risus quis, mattis condimentum risus. Proin eu congue libero. Pellentesque velit purus, euismod vitae purus et, tristique elementum dui. Nam sodales sit amet neque nec feugiat.', '#random#text#', '2014-02-17 08:38:31', 1),
(45, 1, 23, 'Diul Ei', 'Vestibulum pretium neque libero, ut ngo diu lei lo mo chau hai gravida enim malesuada ac?', '#random#text#Loremipsum#', '2014-02-17 08:40:01', 1),
(46, 4, 2, 'This project', 'Cool ', '#sfu#iat352#', '2014-02-17 19:48:10', 1),
(47, 2, 26, '[IAT334] Optizkan', 'To target the increasing trend of online shopping, our idea focuses on optimizing the users ability to shop on the go through the use of digital lenses and mobile phones. It will no longer be necessary for users to station themselves at home, but scan items that interests them while on the streets through the lenses to retrieves product information. It also allows users to try on scanned products virtually. Products can be purchased on the spot without security concerns as personal information is obtained through optical scans. Our concept will make shopping experiences flexible, convenient and secured. <br /><br />http://www.youtube.com/watch?v=lgLDa9k4so0', '#sfu#iat#334#', '2014-03-08 19:26:24', 1),
(48, 2, 26, '[IAT334] Optizkan', 'To target the increasing trend of online shopping, our idea focuses on optimizing the users ability to shop on the go through the use of digital lenses and mobile phones. It will no longer be necessary for users to station themselves at home, but scan items that interests them while on the streets through the lenses to retrieves product information. It also allows users to try on scanned products virtually. Products can be purchased on the spot without security concerns as personal information is obtained through optical scans. Our concept will make shopping experiences flexible, convenient and secured. <br /><br />http://www.youtube.com/watch?v=lgLDa9k4so0', '#sfu#iat#334#', '2014-03-08 19:28:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `highSchools`
--

DROP TABLE IF EXISTS `highSchools`;
CREATE TABLE IF NOT EXISTS `highSchools` (
  `highSchool_id` int(11) NOT NULL AUTO_INCREMENT,
  `highSchool_name` varchar(40) NOT NULL,
  PRIMARY KEY (`highSchool_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `highSchools`
--

INSERT INTO `highSchools` (`highSchool_id`, `highSchool_name`) VALUES
(1, 'Others'),
(2, 'David Thompson Secondary School'),
(3, 'King George Secondary School'),
(4, 'Point Grey Secondary School'),
(5, 'Sir Winston Churchill Secondary School'),
(6, 'Windsor Secondary School'),
(7, 'Killarney Secondary School');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_username` varchar(20) NOT NULL,
  `user_firstName` varchar(40) NOT NULL,
  `user_lastName` varchar(40) NOT NULL,
  `user_password` char(60) NOT NULL,
  `user_email` varchar(254) NOT NULL,
  `user_phoneNumber` varchar(10) NOT NULL,
  `user_highSchool_id` int(11) DEFAULT NULL,
  `user_highSchoolGradYear` varchar(4) NOT NULL,
  `user_description` text NOT NULL,
  `user_photo` varchar(40) NOT NULL,
  `user_twitter` varchar(20) NOT NULL,
  `user_flickr` varchar(20) NOT NULL,
  `user_memberType` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_username` (`user_username`),
  UNIQUE KEY `user_email` (`user_email`),
  KEY `user_highSchool` (`user_highSchool_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_username`, `user_firstName`, `user_lastName`, `user_password`, `user_email`, `user_phoneNumber`, `user_highSchool_id`, `user_highSchoolGradYear`, `user_description`, `user_photo`, `user_twitter`, `user_flickr`, `user_memberType`) VALUES
(1, 'www8', 'Will', 'Wong', '$2y$10$xhiVCM/GDdrrGV5kzoZX/eaROKi.fGwAloAl5vWf0vqCzDb74hmp6', ' www8@sfu.ca', '7788553954', 7, '2009', 'Hi! I''m a fourth year SIAT student. I''m currently taking IAT352, IAT410, CMPT 150, and CMPT 275.', '', '', 'willwong77', 1),
(2, 'gwa13', 'Gary', 'Wong', '$2y$10$RLupRQQNfg7tDIB1X6lXduZ3mtDkzDWzZMD7sVLcThvKai/qvir6q', ' gwa13@sfu.ca', '7785947834', 7, '2000', 'Hi I am Gary Wong', '', '', 'willwong77', 1),
(3, 'jeremyf', 'Jeremy', 'Fung', '$2y$10$4Id0juPp5/3JZQcPnjep5OJz86eBG5RgbE17j.q1SUfeJnooZa5Uy', 'jeremyf@sfu.ca', '7789903017', 4, '2010', 'My name is Jeremy Fung. 3rd year SIAT student.', '', '', '', 1),
(4, 'dbeckham', 'David', 'Beckham', '$2y$10$Eo3co5PWCfQ4DqBwdpQR3eWLgVlvlXKQA.Mew92tlg3bU.aOTbp.a', 'db@beckham.com', '', 1, '', '', '', '', '', 0),
(5, 'fiya', 'Fiya', 'Hellstadius', '$2y$10$8xgAjLeuFJZG4lO3B50LJelX21iF.KYU5DLiG9bB.GySwAjy2dvAe', 'fiya@facebook.com', '6049890342', 4, '2003', 'Hi!', '', '', '', 1),
(6, 'wowo', 'Wowo', 'Sriwattana', '$2y$10$omfrxKI.dQTCfv6fPKpzk.4JfrqF5eRHQft8aojNDzPYL6b0msucS', 'wowo@facebook.com', '6048848902', 5, '2008', 'This is Wowo.', '', '', '', 1),
(7, 'marek', 'Marek', 'Hatala', '$2y$10$ACMV6Kz8dFDTARTXTnuHyuBsW286PW0Onw4493zGDm1cvaS8HU.UO', 'marek@sfu.ca', '6048902318', 4, '1990', '', '', '', '', 1),
(8, 'ncheung', 'Nicholas', 'Cheung', '$2y$10$s0iWozlZpI919jvM9LRXrO3Hyt0yUg58r.Osm8XJuO4ejtFKrf9vG', 'nick@facebook.com', '', 1, '1980', '', '', '', '', 0),
(9, 'Barclay Eustorgio', 'Barclay', 'Eustorgio', '$2y$10$P9rCQpOpVz2A6hW9.4MW7e.MSwrTgHgXniYc5kks3ehgQC61oq5Mm', 'me@BarclayEustorgio.com', '6049898190', 5, '2003', 'Hi!', '', '', '', 0),
(10, 'tarek', 'Tarek', 'Nevio', '$2y$10$JGlV9s/LDVnFZFj30NQzoe0A0av4WQHvJ9c0uV95DQlwzqFpcJvte', ' tarek@gmail.com', '', 7, '1995', 'Tarek currently in his last semester studying in SFU''s School of Interactive Arts and Technology towards a BSc. of Informatics. As a part-time web developer and a full-time motiongraphic design enthusiast, he is constantly seeking chanllenge in new media design and looking for collaborating with people with inspirational ideas. He used to work as the photo editor and multimedia editor in SFU''s student newspaper, The Peak.', '', '', '', 1),
(11, 'jason', 'Jason', 'Liang', '$2y$10$xZBUJxYG4tgJ.FE7hF.u..bEsdHYkp9xdeBErduTIcrxU684yqfNq', 'jason@hotmail.com', '', 1, '1980', '', '', '', '', 0),
(21, 'TeddyUmar', 'Teddy', 'Umar', '$2y$10$4TqmDmYwGiKhI3Dj6rA3Re7WRPqE.6zjiGCoxXUQtHKwjnvHhL4ku', '2@2.COM', '7784329874', 3, '2007', '', '', '', '', 0),
(22, 'masonlee', 'Mason', 'Lee', '$2y$10$b6THAM31fkk4eqCqlHA9DezFRG83uWvOmtfzuQofh4TuyCtRvJSeW', ' mason@sfu.ca', '6049098324', 7, '2008', 'Morbi nec ante eu elit posuere consequat. Morbi cursus convallis purus quis iaculis. Ut sagittis, nunc a vehicula semper, nunc est aliquam nisl, sed blandit lacus dolor at turpis. Nam libero augue, pharetra eget aliquet non, adipiscing sed mi. Duis pellentesque nibh neque, vel sodales justo aliquam non.', '', '', '', 1),
(23, 'jam', 'Jamison', 'Jerrard', '$2y$10$xhiVCM/GDdrrGV5kzoZX/eaROKi.fGwAloAl5vWf0vqCzDb74hmp6', ' w@sw.ca', '6049994288', 6, '2010', '', '', '', '', 1),
(24, 'simon', 'Simon', 'Cheung', '$2y$10$ohkWRsFn8tioUZJ09bAvoOuZEVbs55NfaayrtbTLHAAtdFYuNzqrS', 'simon@yahoo.com', '', 1, '1980', '', '', '', '', 0),
(25, 'testtest', 'test', 'test', '$2y$10$amhon0ugtrtwRcGwjsti9epS55/eI3IRBnEot2LnAOIW2pwSKlSBO', 'test@test.com', '1239494949', 2, '1988', 'test', '', 'test', 'test', 0),
(26, 'frankie', 'Frankie', 'Ng', '$2y$10$v/0MygsdKHDQ5/2yYuWcvedSUcx2YhWZxjg3rNfRIanmAiINKpyAi', 'frankie@sfu.ca', '7789949393', 7, '2009', '', '', 'frankiexng', 'xfranki', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_followings`
--

DROP TABLE IF EXISTS `user_followings`;
CREATE TABLE IF NOT EXISTS `user_followings` (
  `follower_id` int(11) NOT NULL,
  `following_id` int(11) NOT NULL,
  KEY `follower_id` (`follower_id`),
  KEY `following_id` (`following_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_followings`
--

INSERT INTO `user_followings` (`follower_id`, `following_id`) VALUES
(7, 1),
(7, 2),
(22, 2),
(22, 7),
(22, 6),
(22, 5),
(23, 2),
(23, 22),
(1, 2),
(1, 7),
(1, 22);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_content`
--
ALTER TABLE `blog_content`
  ADD CONSTRAINT `blog_content_ibfk_1` FOREIGN KEY (`blog_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blog_content_ibfk_2` FOREIGN KEY (`blog_category_id`) REFERENCES `blog_categories` (`blog_category_id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `blog_content_ibfk_4` FOREIGN KEY (`user_highSchool_id`) REFERENCES `highSchools` (`highSchool_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_followings`
--
ALTER TABLE `user_followings`
  ADD CONSTRAINT `user_followings_ibfk_1` FOREIGN KEY (`follower_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_followings_ibfk_2` FOREIGN KEY (`following_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
