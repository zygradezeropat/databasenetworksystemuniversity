-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2024 at 04:49 AM
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
-- Database: `studentmanagement`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `addStudent` (IN `fname` VARCHAR(50), IN `lname` VARCHAR(50), IN `mname` VARCHAR(50), IN `programs` INT(3), IN `yearDd` INT(3), IN `sexs` VARCHAR(6), IN `barangays` VARCHAR(50), IN `citys` VARCHAR(50), IN `provinces` VARCHAR(50), IN `emails` VARCHAR(50), IN `dateAdd` DATE, IN `addStat` VARCHAR(5))   INSERT INTO `students`(`first_name`, `last_name`, `m_name`, `program_id`, `year_level`, `sex`, `barangay`, `municipality_city`, `province`, `email_add`, `date_enrolled`, `admission_stat`) VALUES (fname, lname, mname, programs,yearDd, sexs, barangays, citys, provinces, emails, dateAdd, addStat)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EditStudent` (IN `id` INT, IN `first_name` VARCHAR(255), IN `m_name` VARCHAR(255), IN `last_name` VARCHAR(255), IN `program_id` INT(2), IN `year_level` INT(2), IN `sex` VARCHAR(6), IN `barangay` VARCHAR(255), IN `municipality_city` VARCHAR(255), IN `province` VARCHAR(255), IN `email_add` VARCHAR(255), IN `date_enrolled` DATE, IN `admission_stat` VARCHAR(10))   BEGIN
    UPDATE students 
    SET 
        first_name = first_name,
        m_name = m_name,
        last_name = last_name,
        program_id = program_id,
        year_level = year_level,
        sex = sex,
        barangay = barangay,
        municipality_city = municipality_city,
        province = province,
        email_add = email_add,
        date_enrolled = date_enrolled,
        admission_stat = admission_stat
    WHERE 
        id = student_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `recoverStudent` (IN `studentID` INT)   BEGIN
  DECLARE first_name VARCHAR(50);
  DECLARE last_name VARCHAR(50);
  DECLARE m_name VARCHAR(50);
  DECLARE program_id INT(11);
  DECLARE year_level INT(1);
  DECLARE sex VARCHAR(6);
  DECLARE barangay VARCHAR(25);
  DECLARE municipality_city VARCHAR(25);
  DECLARE province VARCHAR(25);
  DECLARE email_add VARCHAR(50);
  DECLARE date_enrolled DATE;
  DECLARE admission_stat VARCHAR(50);

 
  SELECT 
    first_name, 
    last_name, 
    m_name, 
    program_id, 
    year_level, 
    sex, 
    barangay, 
    municipality_city, 
    province, 
    email_add, 
    date_enrolled, 
    admission_stat
  INTO 
    first_name, 
    last_name, 
    m_name, 
    program_id, 
    year_level, 
    sex, 
    barangay, 
    municipality_city, 
    province, 
    email_add, 
    date_enrolled, 
    admission_stat
  FROM 
    student_delete
  WHERE 
    student_id = studentID;

 
  INSERT INTO students (
    student_id, 
    first_name, 
    last_name, 
    m_name, 
    program_id, 
    year_level, 
    sex, 
    barangay, 
    municipality_city, 
    province, 
    email_add, 
    date_enrolled, 
    admission_stat
  ) 
  VALUES (
    studentID, 
    first_name, 
    last_name, 
    m_name, 
    program_id, 
    year_level, 
    sex, 
    barangay, 
    municipality_city, 
    province, 
    email_add, 
    date_enrolled, 
    admission_stat
  );

  -- Optionally, delete the record from the student_delete table after recovery
  DELETE FROM student_delete WHERE student_id = studentID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `studentDelete` (IN `ids` INT)   DELETE FROM students WHERE student_id = ids$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `all_student`
-- (See below for the actual view)
--
CREATE TABLE `all_student` (
`student_id` int(11)
,`Name` varchar(152)
,`program_description` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `institutes`
--

CREATE TABLE `institutes` (
  `institute_id` int(11) NOT NULL,
  `institute_name` varchar(100) DEFAULT NULL,
  `totalStudents` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `institutes`
--

INSERT INTO `institutes` (`institute_id`, `institute_name`, `totalStudents`) VALUES
(1, 'Institute of Computing', 3),
(2, 'Institute of Leadership Entrepreneurship, and Good Governance', 3),
(3, 'Institute of Applied and Aquatic Sciences', 46),
(4, 'Institute of Teacher Education', 1);

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `program_id` int(11) NOT NULL,
  `program_name` varchar(10) NOT NULL,
  `program_description` varchar(100) NOT NULL,
  `institute_id` int(11) DEFAULT NULL,
  `totalStudents` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`program_id`, `program_name`, `program_description`, `institute_id`, `totalStudents`) VALUES
(1, 'BSFAS', 'Bachelor of Science in Fisheries and Aquatic Sciences', 3, 2),
(2, 'BSMB', 'Bachelor of Science in Marine Biology', 3, 43),
(3, 'BSFT', 'Bachelor of Science in Food Technology', 3, 0),
(4, 'BSAF', 'Bachelor of Science in Agroforestry', 3, 1),
(5, 'BSIT', 'Bachelor of Science in Information Technology', 1, 3),
(6, 'BSIS', 'Bachelor of Science in Information Systems', 1, 0),
(7, 'BPA', 'Bachelor of Science in Public Administration', 2, 2),
(8, 'BSDRM', 'Bachelor of Science in Disaster Resilience and Management', 2, 1),
(9, 'BSE', 'Bachelor of Science in Entrepreneurship', 2, 0),
(10, 'BSSW', 'Bachelor of Science in Social Work', 2, 0),
(11, 'BSTM', 'Bachelor of Science in Tourism Management', 2, 0),
(12, 'BACOMM', 'Bachelor of Arts in Communication', 4, 1),
(13, 'BSEDENG', 'Bachelor of Secondary Education Major in English', 4, 0),
(14, 'BSEDMATH', 'Bachelor of Secondary Education Major in Mathematics', 4, 0),
(15, 'BTLED', 'Bachelor of Technology and Livelihood Education', 4, 0),
(16, 'BSEDSCI', 'Bachelor of Secondary Education Major in Science', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `m_name` varchar(50) DEFAULT NULL,
  `program_id` int(11) DEFAULT NULL,
  `year_level` int(1) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `barangay` varchar(25) NOT NULL,
  `municipality_city` varchar(25) NOT NULL,
  `province` varchar(25) NOT NULL,
  `email_add` varchar(50) NOT NULL,
  `date_enrolled` date NOT NULL,
  `admission_stat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `first_name`, `last_name`, `m_name`, `program_id`, `year_level`, `sex`, `barangay`, `municipality_city`, `province`, `email_add`, `date_enrolled`, `admission_stat`) VALUES
(47, 'Joey Mae', 'Inguillo', 'Serrano', 7, 2, 'Female', 'New Visayas', 'Panabo City', 'Davao Del Norte', 'inguillo.joeymae@gmail.com', '2022-06-21', 'Old'),
(48, 'Patrick Alasteir', 'Patana', 'Cagang', 5, 2, 'Male', 'New Cortez', 'New Corella', 'Davao Del Norte', 'patana.patrickalasteir@gmail.com', '2022-06-21', 'Old'),
(49, 'Kenneath Kim ', 'Gomez', 'Dayaganon', 5, 2, 'Male', 'Poblacion', 'New Corella', 'Davao Del Norte', 'gomez.kenneathkim@gmail.com', '2022-06-21', 'Old'),
(50, 'Clarissa', 'Sotto', 'Mondigo', 5, 2, '0', 'Digong', 'Dujali', 'Davao Del Norte', 'sotto.clarissa@gmail.com', '2022-06-21', 'Old'),
(51, 'Trix Adrian', 'Marron', 'Agni', 1, 0, '5', 'Poblacion', 'Asuncion', 'Davao del Norte', 'patana.patrickdave@gmail.com', '2022-06-25', 'New'),
(54, 'Jasper', 'Comeling', 'Gono', 2, 1, 'Male', 'New Visayas', 'Panabo City', 'Davao Del Norte', 'inguillo.joeymae@gmail.com', '2022-06-21', 'Old'),
(56, 'Joey Mae', 'Inguillo', 'Serrano', 2, 2, '0', 'New Visayas', 'Panabo City', 'Davao Del Norte', 'inguillo.joeymae@gmail.com', '2022-06-21', 'Old'),
(57, 'Joey Mae', 'Inguillo', 'Serrano', 2, 2, '0', 'New Visayas', 'Panabo City', 'Davao Del Norte', 'inguillo.joeymae@gmail.com', '2022-06-21', 'Old'),
(58, 'Joey Mae', 'Inguillo', 'Serrano', 2, 2, '0', 'New Visayas', 'Panabo City', 'Davao Del Norte', 'inguillo.joeymae@gmail.com', '2022-06-21', 'Old'),
(59, 'Joey Mae', 'Inguillo', 'Serrano', 2, 2, '0', 'New Visayas', 'Panabo City', 'Davao Del Norte', 'inguillo.joeymae@gmail.com', '2022-06-21', 'Old'),
(60, 'Joey Mae', 'Inguillo', 'Serrano', 2, 2, '0', 'New Visayas', 'Panabo City', 'Davao Del Norte', 'inguillo.joeymae@gmail.com', '2022-06-21', 'Old'),
(61, 'Joey Mae', 'Inguillo', 'Serrano', 2, 2, '0', 'New Visayas', 'Panabo City', 'Davao Del Norte', 'inguillo.joeymae@gmail.com', '2022-06-21', 'Old'),
(62, 'Joey Mae', 'Inguillo', 'Serrano', 2, 2, '0', 'New Visayas', 'Panabo City', 'Davao Del Norte', 'inguillo.joeymae@gmail.com', '2022-06-21', 'Old'),
(63, 'Joey Mae', 'Inguillo', 'Serrano', 2, 2, '0', 'New Visayas', 'Panabo City', 'Davao Del Norte', 'inguillo.joeymae@gmail.com', '2022-06-21', 'Old'),
(64, 'Joey Mae', 'Inguillo', 'Serrano', 2, 2, '0', 'New Visayas', 'Panabo City', 'Davao Del Norte', 'inguillo.joeymae@gmail.com', '2022-06-21', 'Old'),
(65, 'Joey Mae', 'Inguillo', 'Serrano', 2, 2, '0', 'New Visayas', 'Panabo City', 'Davao Del Norte', 'inguillo.joeymae@gmail.com', '2022-06-21', 'Old'),
(66, 'Joey Mae', 'Inguillo', 'Serrano', 2, 2, '0', 'New Visayas', 'Panabo City', 'Davao Del Norte', 'inguillo.joeymae@gmail.com', '2022-06-21', 'Old'),
(67, 'Joey Mae', 'Inguillo', 'Serrano', 2, 2, '0', 'New Visayas', 'Panabo City', 'Davao Del Norte', 'inguillo.joeymae@gmail.com', '2022-06-21', 'Old'),
(68, 'Joey Mae', 'Inguillo', 'Serrano', 2, 2, '0', 'New Visayas', 'Panabo City', 'Davao Del Norte', 'inguillo.joeymae@gmail.com', '2022-06-21', 'Old'),
(69, 'Joey Mae', 'Inguillo', 'Serrano', 2, 2, '0', 'New Visayas', 'Panabo City', 'Davao Del Norte', 'inguillo.joeymae@gmail.com', '2022-06-21', 'Old'),
(70, 'Joey Mae', 'Inguillo', 'Serrano', 2, 2, '0', 'New Visayas', 'Panabo City', 'Davao Del Norte', 'inguillo.joeymae@gmail.com', '2022-06-21', 'Old'),
(71, 'Joey Mae', 'Inguillo', 'Serrano', 2, 2, '0', 'New Visayas', 'Panabo City', 'Davao Del Norte', 'inguillo.joeymae@gmail.com', '2022-06-21', 'Old'),
(72, 'Joey Mae', 'Inguillo', 'Serrano', 2, 2, '0', 'New Visayas', 'Panabo City', 'Davao Del Norte', 'inguillo.joeymae@gmail.com', '2022-06-21', 'Old'),
(73, 'Joey Mae', 'Inguillo', 'Serrano', 2, 2, '0', 'New Visayas', 'Panabo City', 'Davao Del Norte', 'inguillo.joeymae@gmail.com', '2022-06-21', 'Old'),
(74, 'Joey Mae', 'Inguillo', 'Serrano', 2, 2, '0', 'New Visayas', 'Panabo City', 'Davao Del Norte', 'inguillo.joeymae@gmail.com', '2022-06-21', 'Old'),
(75, 'Joey Mae', 'Inguillo', 'Serrano', 2, 2, '0', 'New Visayas', 'Panabo City', 'Davao Del Norte', 'inguillo.joeymae@gmail.com', '2022-06-21', 'Old'),
(76, 'Joey Mae', 'Inguillo', 'Serrano', 2, 2, '0', 'New Visayas', 'Panabo City', 'Davao Del Norte', 'inguillo.joeymae@gmail.com', '2022-06-21', 'Old'),
(77, 'Joey Mae', 'Inguillo', 'Serrano', 2, 2, '0', 'New Visayas', 'Panabo City', 'Davao Del Norte', 'inguillo.joeymae@gmail.com', '2022-06-21', 'Old'),
(78, 'Joey Mae', 'Inguillo', 'Serrano', 2, 2, '0', 'New Visayas', 'Panabo City', 'Davao Del Norte', 'inguillo.joeymae@gmail.com', '2022-06-21', 'Old'),
(79, 'Joey Mae', 'Inguillo', 'Serrano', 2, 2, '0', 'New Visayas', 'Panabo City', 'Davao Del Norte', 'inguillo.joeymae@gmail.com', '2022-06-21', 'Old'),
(80, 'Joey Mae', 'Inguillo', 'Serrano', 2, 2, '0', 'New Visayas', 'Panabo City', 'Davao Del Norte', 'inguillo.joeymae@gmail.com', '2022-06-21', 'Old'),
(81, 'Joey Mae', 'Inguillo', 'Serrano', 2, 2, '0', 'New Visayas', 'Panabo City', 'Davao Del Norte', 'inguillo.joeymae@gmail.com', '2022-06-21', 'Old'),
(82, 'Joey Mae', 'Inguillo', 'Serrano', 2, 2, '0', 'New Visayas', 'Panabo City', 'Davao Del Norte', 'inguillo.joeymae@gmail.com', '2022-06-21', 'Old'),
(83, 'Joey Mae', 'Inguillo', 'Serrano', 2, 2, '0', 'New Visayas', 'Panabo City', 'Davao Del Norte', 'inguillo.joeymae@gmail.com', '2022-06-21', 'Old'),
(84, 'Joey Mae', 'Inguillo', 'Serrano', 2, 2, '0', 'New Visayas', 'Panabo City', 'Davao Del Norte', 'inguillo.joeymae@gmail.com', '2022-06-21', 'Old'),
(85, 'Joey Mae', 'Inguillo', 'Serrano', 2, 2, '0', 'New Visayas', 'Panabo City', 'Davao Del Norte', 'inguillo.joeymae@gmail.com', '2022-06-21', 'Old'),
(86, 'Joey Mae', 'Inguillo', 'Serrano', 2, 2, '0', 'New Visayas', 'Panabo City', 'Davao Del Norte', 'inguillo.joeymae@gmail.com', '2022-06-21', 'Old'),
(87, 'Joey Mae', 'Inguillo', 'Serrano', 2, 2, '0', 'New Visayas', 'Panabo City', 'Davao Del Norte', 'inguillo.joeymae@gmail.com', '2022-06-21', 'Old'),
(88, 'Joey Mae', 'Inguillo', 'Serrano', 2, 2, '0', 'New Visayas', 'Panabo City', 'Davao Del Norte', 'inguillo.joeymae@gmail.com', '2022-06-21', 'Old'),
(89, 'Joey Mae', 'Inguillo', 'Serrano', 2, 2, '0', 'New Visayas', 'Panabo City', 'Davao Del Norte', 'inguillo.joeymae@gmail.com', '2022-06-21', 'Old'),
(90, 'Joey Mae', 'Inguillo', 'Serrano', 2, 2, '0', 'New Visayas', 'Panabo City', 'Davao Del Norte', 'inguillo.joeymae@gmail.com', '2022-06-21', 'Old'),
(91, 'Joey Mae', 'Inguillo', 'Serrano', 2, 2, '0', 'New Visayas', 'Panabo City', 'Davao Del Norte', 'inguillo.joeymae@gmail.com', '2022-06-21', 'Old'),
(92, 'Joey Mae', 'Inguillo', 'Serrano', 2, 2, '0', 'New Visayas', 'Panabo City', 'Davao Del Norte', 'inguillo.joeymae@gmail.com', '2022-06-21', 'Old'),
(93, 'Joey Mae', 'Inguillo', 'Serrano', 2, 2, '0', 'New Visayas', 'Panabo City', 'Davao Del Norte', 'inguillo.joeymae@gmail.com', '2022-06-21', 'Old'),
(94, 'Joey Mae', 'Inguillo', 'Serrano', 2, 2, '0', 'New Visayas', 'Panabo City', 'Davao Del Norte', 'inguillo.joeymae@gmail.com', '2022-06-21', 'Old'),
(95, 'Joey Mae', 'Inguillo', 'Serrano', 2, 2, '0', 'New Visayas', 'Panabo City', 'Davao Del Norte', 'inguillo.joeymae@gmail.com', '2022-06-21', 'Old'),
(96, 'Joey Mae', 'Inguillo', 'Serrano', 2, 2, '0', 'New Visayas', 'Panabo City', 'Davao Del Norte', 'inguillo.joeymae@gmail.com', '2022-06-21', 'Old'),
(97, 'Joey Mae', 'Inguillo', 'Serrano', 2, 2, '0', 'New Visayas', 'Panabo City', 'Davao Del Norte', 'inguillo.joeymae@gmail.com', '2022-06-21', 'Old'),
(98, 'Ash', 'Malikas', 'Soylon', 4, 4, 'Female', 'New Visayas', 'Panabo City', 'Davao del Norte', 'gyuahsh@outlook.com', '2021-03-17', 'Old'),
(99, 'Rose', 'Paulican', 'Jabagat', 12, 3, 'Female', 'Alejal', 'Panabo City', 'Davao del Norte', 'yuyuyuyu@outlook.com', '2022-03-07', 'Old'),
(100, 'Lex', 'Jumaw', 'Hulog', 1, 1, 'Male', 'Poblacion', 'Panabo City', 'Davao del Norte', 'watatatata@outlook.com', '2023-02-01', 'Old'),
(101, 'Joel', 'Pasoc', 'Putian', 8, 2, 'Female', 'New Cortez', 'Panabo City', 'Davao del Norte', 'yuannn@outlook.com', '2022-06-22', 'Old'),
(102, 'May', 'June', 'July', 7, 1, 'Female', 'Salvacion', 'Panabo City', 'Davao del Norte', 'yuaaaahhh@outlook.com', '2023-05-06', 'New');

--
-- Triggers `students`
--
DELIMITER $$
CREATE TRIGGER `after_student_deleted` AFTER DELETE ON `students` FOR EACH ROW BEGIN
  
    UPDATE program
    SET totalStudents = totalStudents - 1
    WHERE OLD.program_id = program_id;

   
    UPDATE institutes
    SET totalStudents = totalStudents - 1
    WHERE institute_id = (SELECT institute_id FROM program WHERE program_id = OLD.program_id);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_student_insert` AFTER INSERT ON `students` FOR EACH ROW BEGIN

    UPDATE program
    SET totalStudents = totalStudents + 1
    WHERE program_id = NEW.program_id;


    UPDATE institutes
    SET totalStudents = totalStudents + 1
    WHERE institute_id = (SELECT institute_id FROM program WHERE program_id = NEW.program_id);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_update_program` AFTER UPDATE ON `students` FOR EACH ROW IF OLD.program_id != NEW.program_id THEN
   
        UPDATE program
        SET totalStudents = totalStudents - 1 WHERE 			program_id = OLD.program_id;

        UPDATE program
        SET totalStudents = program.totalStudents + 1 WHERE program_id = NEW.program_id;
       
 END IF
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_update_program_insti` AFTER UPDATE ON `students` FOR EACH ROW BEGIN
    DECLARE old_institute_id INT;
    DECLARE new_institute_id INT;
    
  
    SELECT institute_id INTO old_institute_id
    FROM program
    WHERE program_id = OLD.program_id;
    
  
    SELECT institute_id INTO new_institute_id
    FROM program
    WHERE program_id = NEW.program_id;
    
   
    IF OLD.program_id <> NEW.program_id THEN
     
        UPDATE institutes
        SET totalStudents = totalStudents - 1
        WHERE institute_id = old_institute_id;

       
        UPDATE institutes
        SET totalStudents = totalStudents + 1
        WHERE institute_id = new_institute_id;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_delete_student` BEFORE DELETE ON `students` FOR EACH ROW INSERT INTO student_delete (student_id, first_name, last_name, m_name, program_id, year_level, sex, barangay, municipality_city, province, email_add, date_enrolled, admission_stat) VALUES (OLD.student_id, OLD.first_name, OLD.last_name, OLD.m_name, OLD.program_id, OLD.year_level, OLD.sex, OLD.barangay, OLD.municipality_city, OLD.province, OLD.email_add, OLD.date_enrolled, OLD.admission_stat)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `students_per_year`
-- (See below for the actual view)
--
CREATE TABLE `students_per_year` (
`enrollment_year` int(4)
,`total_students` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `student_delete`
--

CREATE TABLE `student_delete` (
  `student_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `m_name` varchar(50) DEFAULT NULL,
  `program_id` int(11) DEFAULT NULL,
  `year_level` int(1) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `barangay` varchar(25) NOT NULL,
  `municipality_city` varchar(25) NOT NULL,
  `province` varchar(25) NOT NULL,
  `email_add` varchar(50) NOT NULL,
  `date_enrolled` date NOT NULL,
  `admission_stat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_delete`
--

INSERT INTO `student_delete` (`student_id`, `first_name`, `last_name`, `m_name`, `program_id`, `year_level`, `sex`, `barangay`, `municipality_city`, `province`, `email_add`, `date_enrolled`, `admission_stat`) VALUES
(34, 'Kyla Marie', 'Dano', 'Sumalingog', 10, 1, 'Female', 'Binasbas', 'Laak', 'Davao de Oro', 'dano.kylamarie@gmail.com', '2023-05-29', 'New'),
(40, 'Rizza Mae', 'Jubahib', 'Barnaja', 7, 1, 'Female', 'Mambing', 'New Corella', 'Davao del Norte', 'jubahib.rizzamae@gmail.com', '2023-06-26', 'New'),
(53, 'Joey Mae', 'Inguillo', 'Serrano', 2, 2, '0', 'New Visayas', 'Panabo City', 'Davao Del Norte', 'inguillo.joeymae@gmail.com', '2022-06-21', 'Old'),
(55, 'Joey Mae', 'Inguillo', 'Serrano', 2, 2, '0', 'New Visayas', 'Panabo City', 'Davao Del Norte', 'inguillo.joeymae@gmail.com', '2022-06-21', 'Old');

-- --------------------------------------------------------

--
-- Stand-in structure for view `student_enrolled_percentage`
-- (See below for the actual view)
--
CREATE TABLE `student_enrolled_percentage` (
`2020to2021` decimal(27,2)
,`2021to2022` decimal(27,2)
,`2022to2023` decimal(27,2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `sy_enrolled`
-- (See below for the actual view)
--
CREATE TABLE `sy_enrolled` (
`2020` bigint(21)
,`2021` bigint(21)
,`2022` bigint(21)
,`2023` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `top_enrolled_program_per_institute`
-- (See below for the actual view)
--
CREATE TABLE `top_enrolled_program_per_institute` (
`ID` int(11)
,`Institute` varchar(100)
,`Program` varchar(100)
,`Current_Enrolled` int(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `total_school_students`
-- (See below for the actual view)
--
CREATE TABLE `total_school_students` (
`TotalStudent` decimal(65,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `total_students_peryear_level`
-- (See below for the actual view)
--
CREATE TABLE `total_students_peryear_level` (
`year_level` int(1)
,`total_students` bigint(21)
);

-- --------------------------------------------------------

--
-- Structure for view `all_student`
--
DROP TABLE IF EXISTS `all_student`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `all_student`  AS SELECT `students`.`student_id` AS `student_id`, concat(`students`.`first_name`,' ',`students`.`m_name`,' ',`students`.`last_name`) AS `Name`, `program`.`program_description` AS `program_description` FROM (`students` join `program` on(`students`.`program_id` = `program`.`program_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `students_per_year`
--
DROP TABLE IF EXISTS `students_per_year`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `students_per_year`  AS SELECT year(`students`.`date_enrolled`) AS `enrollment_year`, count(0) AS `total_students` FROM `students` WHERE year(`students`.`date_enrolled`) between 2020 and 2023 GROUP BY year(`students`.`date_enrolled`) ;

-- --------------------------------------------------------

--
-- Structure for view `student_enrolled_percentage`
--
DROP TABLE IF EXISTS `student_enrolled_percentage`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `student_enrolled_percentage`  AS SELECT CASE WHEN `students_2020`.`count_2020` = 0 THEN 100.00 ELSE round((`students_2020`.`count_2020` - `students_2021`.`count_2021`) / `students_2020`.`count_2020` * 100.0,2) END AS `2020to2021`, CASE WHEN `students_2021`.`count_2021` = 0 THEN 100.00 ELSE round((`students_2021`.`count_2021` - `students_2022`.`count_2022`) / `students_2021`.`count_2021` * 100.0,2) END AS `2021to2022`, CASE WHEN `students_2022`.`count_2022` = 0 THEN 100.00 ELSE round((`students_2022`.`count_2022` - `students_2023`.`count_2023`) / `students_2022`.`count_2022` * 100.0,2) END AS `2022to2023` FROM ((((select count(0) AS `count_2020` from `students` where year(`students`.`date_enrolled`) = 2020) `students_2020` join (select count(0) AS `count_2021` from `students` where year(`students`.`date_enrolled`) = 2021) `students_2021`) join (select count(0) AS `count_2022` from `students` where year(`students`.`date_enrolled`) = 2022) `students_2022`) join (select count(0) AS `count_2023` from `students` where year(`students`.`date_enrolled`) = 2023) `students_2023`) ;

-- --------------------------------------------------------

--
-- Structure for view `sy_enrolled`
--
DROP TABLE IF EXISTS `sy_enrolled`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sy_enrolled`  AS SELECT (select count(0) from `students` where year(`students`.`date_enrolled`) = 2020) AS `2020`, (select count(0) from `students` where year(`students`.`date_enrolled`) = 2021) AS `2021`, (select count(0) from `students` where year(`students`.`date_enrolled`) = 2022) AS `2022`, (select count(0) from `students` where year(`students`.`date_enrolled`) = 2023) AS `2023` ;

-- --------------------------------------------------------

--
-- Structure for view `top_enrolled_program_per_institute`
--
DROP TABLE IF EXISTS `top_enrolled_program_per_institute`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `top_enrolled_program_per_institute`  AS SELECT `i`.`institute_id` AS `ID`, `i`.`institute_name` AS `Institute`, `p`.`program_description` AS `Program`, `p`.`totalStudents` AS `Current_Enrolled` FROM (((`institutes` `i` join `program` `p` on(`i`.`institute_id` = `p`.`institute_id`)) join (select `p`.`institute_id` AS `institute_id`,max(`enrollment_counts`.`enrolled_count`) AS `max_enrolled_count` from (`program` `p` join (select `students`.`program_id` AS `program_id`,count(distinct `students`.`student_id`) AS `enrolled_count` from `students` group by `students`.`program_id`) `enrollment_counts` on(`p`.`program_id` = `enrollment_counts`.`program_id`)) group by `p`.`institute_id`) `max_enrollment_per_institute` on(`i`.`institute_id` = `max_enrollment_per_institute`.`institute_id`)) join (select `students`.`program_id` AS `program_id`,count(distinct `students`.`student_id`) AS `enrolled_count` from `students` group by `students`.`program_id`) `enrollment_counts` on(`p`.`program_id` = `enrollment_counts`.`program_id`)) WHERE `enrollment_counts`.`enrolled_count` = `max_enrollment_per_institute`.`max_enrolled_count` ;

-- --------------------------------------------------------

--
-- Structure for view `total_school_students`
--
DROP TABLE IF EXISTS `total_school_students`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `total_school_students`  AS SELECT sum(`institutes`.`totalStudents`) AS `TotalStudent` FROM `institutes` ;

-- --------------------------------------------------------

--
-- Structure for view `total_students_peryear_level`
--
DROP TABLE IF EXISTS `total_students_peryear_level`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `total_students_peryear_level`  AS SELECT `students`.`year_level` AS `year_level`, count(0) AS `total_students` FROM `students` GROUP BY `students`.`year_level` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `institutes`
--
ALTER TABLE `institutes`
  ADD PRIMARY KEY (`institute_id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`program_id`),
  ADD KEY `institute_id` (`institute_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `program_id` (`program_id`);

--
-- Indexes for table `student_delete`
--
ALTER TABLE `student_delete`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `program_id` (`program_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `institutes`
--
ALTER TABLE `institutes`
  MODIFY `institute_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `program_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `student_delete`
--
ALTER TABLE `student_delete`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `program`
--
ALTER TABLE `program`
  ADD CONSTRAINT `program_ibfk_1` FOREIGN KEY (`institute_id`) REFERENCES `institutes` (`institute_id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`program_id`) REFERENCES `program` (`program_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
