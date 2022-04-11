-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2021 at 03:58 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bu_medical_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(35) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `phone`, `status`, `created_at`) VALUES
(1, 'Md. Ruhul Amin', 'tomdruhulamin@gmail.com', '123', '01676942642', 1, '2021-05-23 14:06:45');

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `id` int(11) NOT NULL,
  `job_post_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(256) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `edu_background` varchar(256) NOT NULL,
  `resume` varchar(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`id`, `job_post_id`, `name`, `email`, `phone`, `edu_background`, `resume`, `created_at`) VALUES
(2, 6, 'sh shojol', 'shojol240@gmail.com', '012685842', 'bsc', 'new.doc', '2021-06-25 17:22:53'),
(3, 5, 'parbej rahman', 'parvej@gmail.com', '123456', 'MSC', 'resume.pdf', '2021-06-25 17:24:53'),
(4, 7, 'sultan rahman', 'tomdruhulamin@gmail.com', '12346789', 'MSC', 'myresume.docx', '2021-06-25 17:25:21');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_of_meet` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `massage` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `doctor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `name`, `email`, `date_of_meet`, `phone`, `massage`, `created_at`, `doctor_id`) VALUES
(1, 'korim', 'ka@yahoo.com', '2021/06/07 11:50', '01236654', 'need doctor', '2021-06-24 05:55:49', 6),
(2, 'shah alom', 'sha@gmail.com', '2021/05/20 11:59', '013526365487', 'Emergency', '2021-06-24 05:59:20', 8),
(3, 'Nurul Islam', 'nurul@yahoo.com', '2021/07/02 12:49', '01682653454', 'make it quickly', '2021-06-24 06:49:49', 7),
(4, 'Tamin Iqbal', 'tamin@gmail.com', '2021/06/24 22:00', '0165847985', 'need Emergency', '2021-06-24 07:31:28', 0),
(5, 'Falguni ahmed', 'fal@gmail.com', '2021/06/25 13:32', '016859426545', 'doctor', '2021-06-24 07:33:05', 0),
(6, 'Oni rahman', 'fal@gmail.com', '2021/07/01 13:34', '012364785522', 'Emergency', '2021-06-24 07:34:48', 5),
(7, 'sheikh jamal', 'jamal@yahoo.com', '2021/07/07 15:00', '0132598415555', 'urgent', '2021-07-06 11:19:21', 6),
(8, 'MD sumon', 'sumon@gamil.com', '2021/07/10 14:00', '1234567899', 'need doctor', '2021-07-10 05:47:36', 0),
(9, 'Md polas', 'polas@yahool.com', '2021/07/10 19:00', '1234567899', '', '2021-07-10 05:48:10', 0),
(10, 'sobuj mia', 'mia@gmail.com', '2021/08/28 22:00', '016854218542', 'ok', '2021-08-28 12:29:23', 0),
(11, 'mushmat', 'mus@kyahoo.com', '2021/08/28 18:34', '016854218542', 'ol', '2021-08-28 12:34:30', 5);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `dept_name` varchar(256) NOT NULL,
  `image` varchar(128) NOT NULL,
  `dept_detail` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `dept_name`, `image`, `dept_detail`, `created_at`, `status`) VALUES
(3, 'Lab Test Department', '1.jpg', 'The lab at B medicinal pathology.and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '2021-06-07 07:59:53', 1),
(4, 'Dental Department', '2.jpg', 'The Dental Clinic program tremendously affects patients\' ere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handlives,&quot; said Dr. Mathew.', '2021-06-07 08:03:57', 1),
(5, 'Primary Health', '4.jpg', 'Primary healthcare services are provided by general practitioners and nurses in BU Medical.The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2021-06-07 08:05:03', 1),
(6, 'Pediatrics Department', '3.jpg', 'From that moment your child is born, your goal is to keep them healthy and safeContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undou', '2021-06-07 08:05:35', 1),
(7, 'Neurology Department', '5.jpg', 'The BU Medical Department of Neurology is one of the biggest on the planet.&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;', '2021-06-24 09:54:36', 1),
(8, 'Gynecology Department', '7.jpg', 'Welcome to the Department of Obstetrics and Gynecology at bu MedicalSed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure repr', '2021-06-24 09:55:18', 1),
(9, 'Cardiology Department', '8.jpg', 'Cardiology is the branch of medicine that studies and deals with heart problems.&quot;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?&quot;', '2021-06-24 09:55:49', 1),
(10, 'Orthopedic Department', '6.jpg', 'Orthopedic administrations, go for the treatment of the musculoskeletal framework.&quot;At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.&quot;', '2021-06-24 09:56:13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `designation` varchar(256) NOT NULL,
  `image` varchar(128) NOT NULL,
  `profession` varchar(256) NOT NULL,
  `edu_background` varchar(256) NOT NULL,
  `experience` varchar(256) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(128) NOT NULL,
  `detail` text NOT NULL,
  `stauts` tinyint(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `dept_id`, `name`, `designation`, `image`, `profession`, `edu_background`, `experience`, `address`, `phone`, `email`, `detail`, `stauts`, `created_at`) VALUES
(1, 3, 'sholel', 'null', '4.jpg', 'sdfasdf', 'MSC', '5', 'asdfasdf', '123', 'sagor@gmail.com', 'sdfasdfasdf rggdfg', 1, '2021-06-01 20:45:46'),
(3, 4, 'Dr hossain', 'null', '16.jpg', 'dddddddddddddddd', 'BSC', 'dsfsdfs', 'dsfsdf', 'dsfsdf', 'dfsdf', 'dsfdsf', 1, '2021-06-01 20:55:41'),
(5, 6, 'Dr. Sharmin Jahan.', 'medicine doctor', '18.jpg', 'Heart and Vascular Specialist.', 'MBBS', '4 Year Working experience in BU Medical Center.', '15/1, Iqbal Road, Mohmmadpur dhaka-1207,Bangladesh.', '+61 3 8376 6284', 'sharmin@hotmail.com .', 'sharmin has spent more than eight years in healthcare marketing and web content writing. Having worked on both the agency', 1, '2021-06-02 11:00:25'),
(6, 3, 'Dr Ruman', 'medicine doctor', '35.jpg', 'Heart and Vascular Specialist.', 'MBBS', '4 Year Working experience in BU Medical Center.', 'sfsdf', '+61 3 8376 6284', 'genty@gmail.com', 'sdfsdf', 1, '2021-06-02 11:47:53'),
(7, 5, 'Dr Sharmin', 'Senior Doctor', '1.jpg', 'Doctor', 'MBBS', '4 Year Working experience in BU Medical Center.', 'Dhanmondi dhaka', '0126851585545', 'hasan@gmail.com', 'I am dr hasan.I completed My MBBS from dhaka medical.', 1, '2021-06-07 20:00:15'),
(8, 4, 'Dr Hasan', 'medicine doctor', '3.jpg', 'Heart and Vascular Specialist.', 'MBBS', '4 Year Working experience in BU Medical Center.', 'dhaka', '0102542685452', 'abc@gmail.com', 'null', 1, '2021-06-07 20:18:28');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `title` varchar(256) NOT NULL,
  `image` varchar(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `category`, `title`, `image`, `created_at`) VALUES
(1, '1', 'side picture', '1.jpg', '2021-06-02 07:41:23'),
(3, '2', 'side picture', '13.jpg', '2021-06-09 04:39:18'),
(4, '1', 'picture', '5.jpg', '2021-06-09 04:40:51'),
(5, '3', 'Unit Types', '4.jpg', '2021-06-22 15:02:37'),
(6, '4', 'test', 'flckr3.jpg', '2021-06-25 11:15:21'),
(7, '5', 'test', 'flckr6.jpg', '2021-06-25 11:25:50'),
(8, '5', 'test', 'flckr4.jpg', '2021-06-25 11:26:07'),
(9, '4', 'care', '12.jpg', '2021-06-25 11:26:23'),
(10, '4', 'care', '8.jpg', '2021-06-25 11:26:35'),
(11, '3', 'sergery', '3.jpg', '2021-06-25 11:26:52'),
(12, '3', 'sergery', '6.jpg', '2021-06-25 11:27:06'),
(13, '2', 'dental', '10.jpg', '2021-06-25 11:27:21'),
(14, '2', 'dental', '9.jpg', '2021-06-25 11:27:32'),
(15, '1', 'emergency', 'flckr2.jpg', '2021-06-25 11:27:50');

-- --------------------------------------------------------

--
-- Table structure for table `job_post`
--

CREATE TABLE `job_post` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `detail` text NOT NULL,
  `open_post` varchar(128) NOT NULL,
  `job_nature` varchar(128) NOT NULL,
  `educational_background` varchar(128) NOT NULL,
  `experience` varchar(128) NOT NULL,
  `job_location` varchar(256) NOT NULL,
  `salary_range` varchar(128) NOT NULL,
  `application_deadline` varchar(128) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `job_post`
--

INSERT INTO `job_post` (`id`, `title`, `detail`, `open_post`, `job_nature`, `educational_background`, `experience`, `job_location`, `salary_range`, `application_deadline`, `status`, `created_at`) VALUES
(4, 'Consultant', 'Null', 'null', 'General Surgery', 'MBBS with postgraduate degree such as FCPS/MS/FRCS', 'At Least 05 Year', 'Dhaka, Bangladesh', '25000 BDT', '20.06.21', 1, '2021-06-09 13:53:38'),
(5, 'Associate consultant', '', '', 'Internal Medicine', 'ICU//MICU,MBBS with postgraduate degree such as FCPS/MS/FRCS', 'At Least 05 Year', 'Dhaka, Bangladesh', '25000 BDT', '20.06.21', 1, '2021-06-09 13:56:47'),
(6, 'Sr.Registrar', '', '', 'Internal medicine', 'cardiology,MBBS with Postgraduate degree such as FCPS/MS/FRCS', 'At Least 3 Year', 'Dhaka, Bangladesh', '25000 BDT', '20.06.21', 1, '2021-06-09 13:58:11'),
(7, 'Medical Techonogist', '', '', 'Nephrology', 'BSC in Medical Technology\r\ncardiology,MBBS with Postgraduate', 'At Least 02 Year', 'Dhaka, Bangladesh', '20000 BDT', '20.06.21', 1, '2021-06-09 13:59:25'),
(8, 'Chief Pharmacist', '', '', 'Internal Medicine', 'Naster in pharmacy\r\ncardiology,MBBS with Postgraduate', 'At Least 10 Year', 'Dhaka, Bangladesh', '30000 BDT', '20.06.21', 1, '2021-06-09 14:00:27'),
(9, 'Sr.Medical Officer', '', '', 'Nephrology', ',ICU,MBBS registrable by BMDC.\r\ncardiology,MBBS with Postgraduate', 'At Least 05 Year', 'Dhaka, Bangladesh', '25000 BDT', '20.06.21', 1, '2021-06-09 14:01:27');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(256) NOT NULL,
  `phone` varchar(128) NOT NULL,
  `subject` varchar(256) NOT NULL,
  `feedback` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `name`, `email`, `phone`, `subject`, `feedback`, `created_at`) VALUES
(1, 'shojol', 'shojol@gmail.com', '0168262354', 'message', 'some  Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '2021-06-02 10:46:52'),
(2, 'kamrul', 'kamrul@yahoo.com', '123456', 'review', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', '2021-06-09 06:19:09'),
(3, 'md rubel', '123@gmail.com', '01689544', 'null', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney', '2021-06-25 10:50:32');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `detail` text NOT NULL,
  `date_of_post` varchar(25) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `title`, `detail`, `date_of_post`, `status`, `created_at`) VALUES
(1, 'Bangladesh send India to bat', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,', '12.03.21', 1, '2021-06-02 07:32:55'),
(2, 'Nayeem bags two in succession after Mushy\'s double ton', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,', '12.03.21', 1, '2021-06-02 11:50:08'),
(3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 'vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipis', '24.06.21', 1, '2021-06-24 14:24:47'),
(4, 'ut libero venenatis faucibus. Nullam quis ante.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vit', '20.06.21', 1, '2021-06-24 14:25:14'),
(5, 'Govt scraps 10 coal power projects', 'The prime minister has approved a proposal to scrap 10 coal-fired power plants that were okayed earlier.\r\n\r\nThe power and energy ministry proposed scrapping the projects as the construction work made no progress in years, State Minister Nasrul Hamid told The Daily Star.\r\nFor all latest news, follow The Daily Star\'s Google News channel.\r\n\r\nThe coal-fired power plant in Payra is generating electricity while construction work in Rampal and Matarbari are making progress, the state minister said.\r\n\r\n&quot;Our current plan is to generate between 10,000MW and 12,000MW of electricity from coal by 2030,&quot; the state minister said.\r\n\r\nThe 10 discarded projects are among the 18 planned coal-fired plants that were approved after 2008.\r\n\r\n&quot;Now we are planning to use liquefied natural gas [LNG] and petroleum to generate power. But the government has yet to make a plan on how an LNG-fired power plant can be set up,&quot; he said.\r\n\r\nThe scrapped projects are: a 522MW plant in Munshiganj, a 282MW plant in Dhaka, 282MW in Chattogram, 1,320MW in Moheskhali, 1,320MW in Ashuganj, 1,200MW in Gaibandha, 1,200MW in Matarbari phase-2, a 700MW Singapore-Bangladesh joint-venture, a 1,200MW CPGCL- Sumitomo Corporation joint-venture, and a 1,320MW Bangladesh-Malaysia joint-venture.\r\n\r\nThe government may scrap one or two other power plant projects if the construction does not make desired progress, said an official of the ministry.\r\n\r\nOne unit of the 1,320MW power plant in Payra is generating electricity. It is a Bangladesh-China joint venture. Physical work is making progress for the 1,320MW plant in Rampal, 1,224MW in Chattogram, 307MW in Barguna, and 1,200MW in Matarbari and 1,200MW in Cox\'s Bazar.\r\n\r\nPayra has been contributing 600MW to the national grid every day for the last few months, the state minister said.\r\n\r\nBefore Payra, an 525MW plant in Barapukuria, Dinajpur, was the country\'s only coal-fired plant. The Matarbari plant is set to start producing electricity in 2023.\r\n\r\nBangladesh Poribesh Andolon welcomed the scrapping of the 10 coal-fired power plant projects, saying that it is a big step towards achieving the goal of sustainable development.\r\n\r\n&quot;We demand that the government make a road map to scrap all coal-fired power plants in phases,&quot; said the statement signed by Sultana Kamal and Sharif Jamil, president and secretary of Bapa.\r\n\r\nThe statement said the LNG also has a negative impact on the environment and urged the government to move towards renewable energy.\r\n\r\nHowever, Nasrul said the coal-fired power plants are being constructed using &quot;ultra-super critical technology. These power plants will have a less impact on the environment than a brick kiln.&quot;\r\n\r\nHe said there is a power plant in the city of Yokohama in Japan.\r\n\r\n&quot;Are people dying there?&quot; the minister asked.', '26.06.21', 1, '2021-06-26 06:20:21'),
(6, 'Dhaka Bypass Expressway Project: Moves ahead finally', 'Upgradation of Dhaka Bypass Road into a four-lane access-control expressway under the first-ever Public Private Partnership project of Roads and Highways Department (RHD) is finally making progress.\r\n\r\nBut the project cost is going to rise significantly as it took five years to pick the private partner, acquire land, and manage fund.\r\nFor all latest news, follow The Daily Star\'s Google News channel.\r\n\r\nThe original deadline of the project was June 2020 and the cost for &quot;Support to Joydebpur-Debogram-Bhulta-Madanpur road (Dhaka Bypass) PPP Project&quot; was Tk 236.50 crore.\r\n\r\nThe RHD has now sought an extension to the project completion deadline up to June 2024 and increase the support project cost to Tk 674.74 crore, a rise by 185.30 percent from the initial estimated cost.\r\n\r\nThe revision proposal is likely to be placed before the meeting of the Executive Committee of the National Economic Council (Ecnec) today, sources said.\r\n\r\nThe project cost will rise to Tk 3,262 crore, up from the primary estimation of Tk 3,039 crore, due to expansion of the project.\r\n\r\nHowever, the private partner has already managed funds and started the physical work. The RHD has also been able to acquire 73 percent land for the project.\r\n\r\n&quot;The major challenge for the project was to manage funds by the private partner, which is now over. We hope the physical work will be completed by December 2023,&quot; ABM Sertajur Rahman, deputy director of the project, told The Daily Star yesterday.\r\nFIRST PPP PROJECT OF RHD\r\n\r\nThe government wanted to expand the two-lane Joydevpur-Debogram-Bhulta-Madanpur road, widely known as Dhaka Bypass Road, into a four-lane highway for better communication between Chattogram port and the country\'s north-western regions.\r\n\r\nThe 48km road connects the Joydevpur-Tangail National Highway, Dhaka-Chattogram National Highway, Dhaka-Sylhet National Highway, Dhaka-Mymensingh National Highway along with some regional highways and district roads.\r\n\r\nOnce the project is completed, buses, trucks and other vehicles will be able to easily travel from northern and western parts of the country to eastern and southern parts without entering Dhaka city.\r\n\r\nIn September 2012, Cabinet Committee on Economic Affairs gave approval in principle to the project to be implemented under PPP.\r\n\r\nThe Ecnec in March 2016 had approved the support project for land acquisition, resettlement and shifting of utility lines for the expansion works.\r\n\r\nThe RHD on December 6, 2018 signed a contract with a China-Bangladesh consortium to upgrade the road to a four-lane access-controlled expressway.\r\n\r\nThe companies are: Sichuan Road and Bridge (Group) Corporation Ltd of China (60 percent), and Shamim Enterprise (Pvt) Ltd (30 percent) and UDC Corporation Ltd (10 percent) of Bangladesh.\r\nWHY THE DELAY, COST ESCALATION?\r\n\r\nAs per the deal, the road authority will provide land, carry out resettlement and shift utility lines while the private partner will finance, build, operate and maintain the road for a concession period of 25 years.\r\n\r\nThe partner will collect toll from vehicles following a fixed rate.\r\n\r\nAt the time of signing of the agreement, the estimated cost of the physical project was Tk 3,039 crore. Of the amount, the government was supposed to provide Tk 224 crore as viability gap financing.\r\n\r\nThe work for expansion of the highway, with service lanes on both sides, was supposed to be begin within nine months of signing of the deal and the road was expected to be opened to traffic by 2022, officials said previously.\r\n\r\nBut the private partner could not manage funds until April this year and the RHD could not complete land acquisition, causing the delay in project implementation.\r\n\r\nRoad Transport and Bridges Minister Obaidul Quader had laid the foundation stone of the project in December 2019, but it did not see any progress mainly due to Covid-19 pandemic, said officials.\r\n\r\nAsked why the support project cost is going to increase, Sertajur said when the project was approved in 2016, they had to pay the affected people two times the actual price of their land.\r\n\r\nBut a new land acquisition law came into force in 2017 and now the government has to pay the affected people three times the actual price of their land and two-times the actual price of the existing structures on the land, the deputy director of the project said. &quot;So, the government has to bear the additional costs.&quot;\r\n\r\nThe RHD has to acquire 13 acres more land for the project due to some modifications of the road design, leading to escalation of the cost.\r\n\r\nOn April 23 this year, the private partner, formally known as Dhaka Bypass Expressway Development Company Ltd, singed a financing agreement with China Development Bank (CDB) and Bangladesh Infrastructure Finance Fund Ltd (BIFFL). As per the deal, CDB will provide Tk 1,614 crore and BIFFL Tk 1,075 crore, source said.\r\n\r\nEarlier, Asian Development Bank agreed to provide a credit of $100 million to BIFFL for granting the loan to the private partner.\r\n\r\nHowever, the private partner started the physical work of the project in October last year with its own fund. The company is expecting to start getting bank loan from August, the sources added.', '27.06.21', 1, '2021-06-26 06:21:06'),
(7, 'World’s most expensive mango Miyazaki in Bangladesh', 'I have been roaming around the villages of Bangladesh since the early 80s to cover news of prospects, fortune and miseries of farmers and the farming sector, which you have seen on Bangladesh Television\'s Mati O Manush (Soil &amp; People) programme. Moreover, I went to different countries of the world to show the brilliant advancements in the agriculture sector that the farmers have made. Since the beginning of Hridoye Mati O Manush (Soil &amp; People in Heart) on Channel i, I concentrated to look at the farmers and the farming sector with a more in-depth vision, with perspectives like climate change, modern farming technologies, crop diversity, and policymaking in my thinking process.\r\n\r\nIt has been possible to ensure the food security of the growing population of Bangladesh with the help of agricultural scientists, researchers, farmers, extension workers, above all with the government patronage and active role of mass media for at least a decade. In this case, the development of high yielding rice varieties has played a big role. Along with the huge spread of fish farming, the tide of poultry rearing among the youth made a remarkable stride. Agricultural diversity has increased at an optimistic speed. Cultivation of various foreign vegetables and fruits has also increased. Various fruits have been cultivated all over the country for years: malta, lemon, orange, strawberry, avocado, apple plum, dragon fruit, fig etc. I have had the great opportunity to see the agriculture that has changed during the past 50 years, since Bangladesh\'s independence.\r\nFor all latest news, follow The Daily Star\'s Google News channel.\r\n\r\nDear readers, back in 2006, I went to Japan. While filming at an agricultural market called Ameiko village in Tokyo, a mango seller called me. When I approached him, I saw red mangoes, that was probably the first time I saw the great red mango, Miyazaki. A few years back, 75 varieties of mangoes were displayed at the National Fruit Exhibition in Dhaka. The name of the mango varieties had a royal symbol at the fair. Khirbhog, Mohanbhog, Rajbhog, Ranibhog, Ranipachanda, Sindura, Subarnarekha, Jagatmohini, Khirmon, Dudhsar, Begumbahar, Pujaribhog, Rajalakshmi, Dudhkumari, Badshah-pachhand, Begumpachhand, Rajapachhand, Bonkhasa, Kohitur - more than a hundred kingly and queenly names of mangoes, which dates back to the ancient times of King Akbar the Great.Greater Rajshahi is the capital of mango in our country. I remember getting acquainted with many eminent scientists while preparing a news report on fruit cultivation in Bangladesh during the 80s. Dr Amjad was one of them. At that time, I asked him, why sweet mango only grows in Rajshahi? Why mango cultivation is not possible in the whole country? He pointed out the limitations of soil and climate in mango cultivation around the country. But researchers gradually overcame that limitation. We now know that mango is now grown across the nation. Amrapali saplings first came to our country in 1990. The size of the tree is small. But the yield is high. 1,500 Amrapali saplings can be planted in 1 hectare of land at a distance of five hands. Sixteen metric tons of Amrapali can be yielded from a hectare.\r\n\r\nNew varieties, new names are constantly being added to the mango kingdom. Researchers have added Bari-4, Bari-11 and other mango varieties. More than that, different varieties of mangoes brought from abroad have been added. In particular, the local nurseries have introduced different varieties of mangoes from Thailand, Vietnam, Singapore, China, Japan, Malaysia, etc. One such mango is Miyazaki from Japan. Miyazaki is grown in Japan\'s Miyazaki region in the south; thus it is called Miyazaki. The Japanese name for this mango is \'Taiyo No Tamago\', which means \'Egg of the Sun\'. It\'s very sweet and the world\'s most expensive mango. Miyazaki Mango caught the attention on the internet in 2016 when a pair of mangoes\' auction price was 500,000 Japanese Yen (USD 4547) in Fukuoka, Japan. Miyazaki is widely grown in greenhouses. I found this mango tree on one of the roofs of Dhaka but it couldn\'t give any fruit. I doubted whether this mango would grow in our country. But overcoming all uncertainty, Omar Faruque Bhuiyan, an RMG entrepreneur from Dhaka\'s Zafrabad area, has miraculously grown the most expensive mango at his rooftop garden. A few days back, I went to his rooftop to see this. I would like to also mention that Miyazaki is being cultivated in different regions of the country and it\'s praiseworthy.\r\n\r\nOmar Faruque is doing a fabulous job in producing Miyazaki. His family members, as well as friends, are cooperating with him in this endeavour. His roof was full of lush red Miyazaki mangoes. I was so amazed to see this. I felt like I entered a red orchard full of red mangoes. Omar Faruque is a very choosy man who picks on planting very carefully. Back in 2010, through one of his friends, he brought the Miyazaki scion and later on did the grafting to finally get the production on his rooftop. I liked the spirit in him and certainly rooftop farming is going to such a place beyond our thoughts and these wonderful people have put themselves into farming with all their heart and passion. Omar Faruque plans for an extension of this variety if he\'s supported by the government in leasing lands at the hill tracts region. A young entrepreneur named Mong Setu Chowdhury and Hlashimong Chowdhury in Khagrachhari has also started cultivating Miyazaki. I have heard they have also grown quite a plenty this year. The prominent businessman of Chapainawabganj Akbar Hossain is also doing Miyazaki variety alongside other fifteen different mango varieties.\r\n\r\nDr Mehedi Masud, project director of &quot;Year-Round Fruit Production for Nutrition Improvement&quot; says Bangladesh\'s climate and the weather are perfect for Miyazaki production. Government horticulture centres are trying to produce saplings of this variety. Many private nurseries have moderately been successful in producing the saplings of Miyazaki. Moreover, if we want to grab the international market we need attractive and quality product along with Good Agricultural Practices (GAP) certificate. If we can combine this, Miyazaki can be added to the export market of Bangladesh. Some of our entrepreneurs invest in different agricultural goods without giving a good thought and analysis; I tell them not to do this, rather they should study before and then go for it and many have followed the right path. Farmers should focus on profit on loss and they should gain the right knowledge on how to farm a particular agricultural product. If we can properly understand how to grow Miyazaki in our country and with the government assistance in capturing the international market, I see a great future of this mango to be exported around the world from Bangladesh.', '27.06.21', 1, '2021-06-26 06:21:50');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `detail` text NOT NULL,
  `image` varchar(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `title`, `detail`, `image`, `created_at`, `status`) VALUES
(5, 'Cancer Clinic', 'We trust that growth influences each individual in an unexpected way, and that each individual can profit by an interesting, individualized care arrange.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,', 'pexels-photo-1595387.jpeg', '2021-06-02 10:52:35', 1),
(6, '24/7 Service', 'Day in and day out Nursing and Medial Services gives custom-made care to individuals in their cabin who are attempting to oversee all alone.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,', '11.jpg', '2021-06-07 08:14:33', 1),
(7, 'dental support', 'We trust that growth influences each individual in an unexpected way, and that each individual can profit by an interesting, individualized care arrange.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,', '10.jpg', '2021-06-07 08:15:01', 1),
(8, 'Blood Test', 'Most blood tests just take a couple of minutes to finish and are done at your nearby healing facility by a specialist, medical attendant, thanks.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,', '2.jpg', '2021-06-07 08:15:31', 1),
(9, 'Medical counselling', 'Our Medical Social Workers take care of patients and families who encounter challenges in adapting to mental, social and emerging from ailment.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,', '9.jpg', '2021-06-07 08:16:00', 1),
(10, 'Qualified Doctors', 'Subsequent to giving conclusions, a specialist treats patients who are experiencing sicknesses and wounds. A specialist is likewise called a doctor.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,', '6.jpg', '2021-06-24 11:01:26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `web_name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `address` varchar(2000) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`web_name`, `logo`, `address`, `country`, `city`, `email`, `mobile`) VALUES
('BU Medical', 'header-logo.png', 'Iqbal Road mohammadpur', 'bangladesh', 'dhaka', 'bumedical@gmail.com', 1755555555);

-- --------------------------------------------------------

--
-- Table structure for table `stuff`
--

CREATE TABLE `stuff` (
  `id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `image` varchar(256) NOT NULL,
  `profession` varchar(128) NOT NULL,
  `edu_background` varchar(256) NOT NULL,
  `joining_date` varchar(25) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(256) NOT NULL,
  `nid` varchar(25) NOT NULL,
  `stauts` tinyint(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stuff`
--

INSERT INTO `stuff` (`id`, `dept_id`, `name`, `designation`, `image`, `profession`, `edu_background`, `joining_date`, `address`, `phone`, `email`, `nid`, `stauts`, `created_at`) VALUES
(1, 4, 'sholel', 'clener', 'ashok.jpg', 'null', 'null', '21.02.21', 'null', '123', 'genty@gmail.com', '123456', 1, '2021-06-02 07:13:48'),
(2, 6, 'sobuj', 'Office assistent', '7981713f-b976-4aa0-8181-b2502ee48d5c.jpg', 'Heart and Vascular Specialist.', 'MBBS', '21.02.21', 'badda', '123', 'parvej@gmail.com', '123456', 1, '2021-06-02 11:49:37'),
(3, 5, 'Md Nur hossain', 'computer operator', '26.jpg', 'null123', 'HSC', '02.03.2020', 'farmget', '0126851585545', 'sagor@gmail.com', '123456', 1, '2021-06-07 21:06:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_post`
--
ALTER TABLE `job_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stuff`
--
ALTER TABLE `stuff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `job_post`
--
ALTER TABLE `job_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `stuff`
--
ALTER TABLE `stuff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
