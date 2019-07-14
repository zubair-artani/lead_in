-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2019 at 06:37 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lead_in`
--

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE `admission` (
  `a_student_id` int(11) NOT NULL,
  `a_student_currentdate` date NOT NULL,
  `a_student_faculty` int(11) NOT NULL,
  `a_student_adm_fees` int(11) NOT NULL,
  `a_student_monthly_fees` int(11) NOT NULL,
  `a_student_department` int(11) NOT NULL,
  `a_student_class` int(11) NOT NULL,
  `a_student_feestatus` varchar(100) NOT NULL,
  `a_student_duedate` date DEFAULT NULL,
  `a_student_registration_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `trash_status` varchar(40) NOT NULL DEFAULT 'restored'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admission`
--

INSERT INTO `admission` (`a_student_id`, `a_student_currentdate`, `a_student_faculty`, `a_student_adm_fees`, `a_student_monthly_fees`, `a_student_department`, `a_student_class`, `a_student_feestatus`, `a_student_duedate`, `a_student_registration_id`, `user_id`, `trash_status`) VALUES
(1, '2019-06-25', 1, 234234, 234234, 6, 10, '0', '2019-07-24', 3, 1, 'deleted'),
(3, '2019-06-26', 1, 5000, 3000, 6, 8, '1', '2019-06-25', 4, 1, 'restored'),
(4, '2019-07-01', 1, 4000, 3000, 5, 8, '1', '2019-07-01', 7, 1, 'restored'),
(10, '2019-07-14', 1, 400, 3000, 7, 10, '1', '2019-07-14', 5, 1, 'restored');

-- --------------------------------------------------------

--
-- Table structure for table `batchdays`
--

CREATE TABLE `batchdays` (
  `batchdays_id` int(11) NOT NULL,
  `batch_days` varchar(100) NOT NULL,
  `batchdays_status` varchar(50) NOT NULL DEFAULT 'restored'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batchdays`
--

INSERT INTO `batchdays` (`batchdays_id`, `batch_days`, `batchdays_status`) VALUES
(2, 'Tts', 'restored'),
(3, 'Mon To Fri', 'restored'),
(4, 'MWF2', 'restored');

-- --------------------------------------------------------

--
-- Table structure for table `batch_code`
--

CREATE TABLE `batch_code` (
  `batch_id` int(11) NOT NULL,
  `batch_code` varchar(255) NOT NULL,
  `batch_days` varchar(255) NOT NULL,
  `class` int(11) NOT NULL,
  `department` int(11) NOT NULL,
  `teacher` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `batch_status` varchar(255) NOT NULL DEFAULT 'Open',
  `batch_status_2` varchar(255) NOT NULL DEFAULT 'restored'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch_code`
--

INSERT INTO `batch_code` (`batch_id`, `batch_code`, `batch_days`, `class`, `department`, `teacher`, `start_date`, `end_date`, `start_time`, `end_time`, `batch_status`, `batch_status_2`) VALUES
(5, '3i0932ked', '3', 9, 5, 7, '2019-05-15', '2019-06-27', '15:00:00', '21:00:00', 'Open', 'restored'),
(6, '98ujr42oew', '2', 8, 3, 7, '2019-06-15', '2019-06-29', '15:00:00', '21:00:00', 'Open', 'deleted'),
(7, 'wi1oje1', '2', 10, 5, 8, '2019-05-30', '2019-06-29', '15:00:00', '21:00:00', 'Open', 'restored'),
(8, 'jf23ojio', '2', 8, 3, 7, '2019-05-09', '2019-06-20', '15:00:00', '21:00:00', 'Open', 'restored'),
(9, '324ioewj', '2', 8, 5, 1, '2019-06-05', '2019-06-30', '00:15:00', '21:00:00', 'Open', 'restored');

-- --------------------------------------------------------

--
-- Table structure for table `capital`
--

CREATE TABLE `capital` (
  `capital_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `capital_amount` int(11) NOT NULL,
  `remarks` text NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'restored'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `capital`
--

INSERT INTO `capital` (`capital_id`, `date`, `capital_amount`, `remarks`, `status`) VALUES
(1, '2019-06-28', 500000, 'Cash', 'restored'),
(2, '2019-05-20', 200, 'ew', 'deleted'),
(3, '2019-06-02', 30000, 'purchased furniture', 'deleted');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `class_status` varchar(255) NOT NULL DEFAULT 'restored'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_name`, `class_status`) VALUES
(8, 'Chemistry', 'restored'),
(10, 'Urdu', 'restored');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `department_status` varchar(50) NOT NULL DEFAULT 'restored'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`, `department_status`) VALUES
(1, 'IT', 'deleted'),
(2, 'Medicals', 'deleted'),
(5, 'Information Technology', 'restored'),
(6, 'woww', 'restored'),
(7, 'Academic', 'restored');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `education_id` int(11) NOT NULL,
  `education_name` varchar(200) NOT NULL,
  `education_status` varchar(50) NOT NULL DEFAULT 'restored'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`education_id`, `education_name`, `education_status`) VALUES
(1, 'BComI', 'restored'),
(2, 'df', 'restored');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `expense_id` int(11) NOT NULL,
  `expense_name` varchar(100) NOT NULL,
  `expense_status` varchar(50) NOT NULL DEFAULT 'restored'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`expense_id`, `expense_name`, `expense_status`) VALUES
(2, 'biscuit', 'restored'),
(3, 'Lunch', 'restored'),
(4, 'Dinner', 'restored'),
(5, 'Transportation', 'deleted'),
(6, 'electrition', 'restored');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` int(11) NOT NULL,
  `faculty_name` varchar(200) NOT NULL,
  `faculty_signature` text NOT NULL,
  `faculty_status` varchar(50) NOT NULL DEFAULT 'restored',
  `faculty_salary_status` varchar(50) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `faculty_name`, `faculty_signature`, `faculty_status`, `faculty_salary_status`) VALUES
(1, 'Aliyan', 'http://[::1]/lead_in/uploads/faculty_signature/Koala1.jpg', 'restored', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `gate_pass`
--

CREATE TABLE `gate_pass` (
  `gate_pass_id` int(11) NOT NULL,
  `admission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inquiry_col`
--

CREATE TABLE `inquiry_col` (
  `col_id` int(11) NOT NULL,
  `inquiry_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inquiry_col`
--

INSERT INTO `inquiry_col` (`col_id`, `inquiry_id`, `date`, `time`, `remarks`) VALUES
(2, 2, '2019-07-11', '17:02:00', 'done\r\n'),
(3, 2, '2019-07-11', '17:19:00', 'calling'),
(4, 3, '2019-07-11', '17:23:00', 'wait for 2 days'),
(5, 2, '2019-07-11', '17:34:00', 'checking');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry_form`
--

CREATE TABLE `inquiry_form` (
  `inquiry_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `father_name` varchar(100) NOT NULL,
  `mobile_no` int(11) NOT NULL,
  `admission_fee` int(11) NOT NULL,
  `monthly_fee` int(11) NOT NULL,
  `source` int(11) NOT NULL,
  `class` int(11) NOT NULL,
  `inquiry_status` int(11) NOT NULL,
  `department` int(11) NOT NULL,
  `remarks` text NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'restored',
  `call_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inquiry_form`
--

INSERT INTO `inquiry_form` (`inquiry_id`, `date`, `student_name`, `father_name`, `mobile_no`, `admission_fee`, `monthly_fee`, `source`, `class`, `inquiry_status`, `department`, `remarks`, `status`, `call_date`) VALUES
(2, '2019-06-26', 'ghfjhgjhgjhk', 'Tariq', 987654321, 200, 400, 1, 8, 5, 5, 'checking', 'restored', '2019-06-26'),
(3, '2019-06-21', 'Zubair Artani', 'Tariq', 987654321, 200, 400, 2, 8, 3, 5, 'done\r\n', 'restored', '2019-06-26'),
(4, '2019-07-14', 'Tariq', 'Aziz', 9654321, 200, 4000, 1, 10, 4, 5, 'hhd', 'restored', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inquiry_status`
--

CREATE TABLE `inquiry_status` (
  `inquiry_id` int(11) NOT NULL,
  `inquiry_name` varchar(200) NOT NULL,
  `inquiry_color` varchar(200) NOT NULL,
  `inquiry_status` varchar(50) NOT NULL DEFAULT 'restored'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inquiry_status`
--

INSERT INTO `inquiry_status` (`inquiry_id`, `inquiry_name`, `inquiry_color`, `inquiry_status`) VALUES
(1, 'pending', '#c41a1a', 'deleted'),
(3, 'accept', '#bda5a5', 'restored'),
(4, 'done', '#855454', 'restored'),
(5, 'success', '#18e30e', 'restored'),
(6, 'new', '#03fabf', 'restored'),
(7, 'wow', '#ff0000', 'restored'),
(8, 'wow', '#382424', 'restored'),
(9, 'success', '#1e59e3', 'restored');

-- --------------------------------------------------------

--
-- Table structure for table `marketing_source`
--

CREATE TABLE `marketing_source` (
  `source_id` int(11) NOT NULL,
  `source_name` varchar(200) NOT NULL,
  `source_status` varchar(200) NOT NULL DEFAULT 'restored'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marketing_source`
--

INSERT INTO `marketing_source` (`source_id`, `source_name`, `source_status`) VALUES
(1, 'Facebook', 'restored'),
(2, 'Boards', 'restored');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `message_task` text NOT NULL,
  `message_status` varchar(100) NOT NULL DEFAULT 'Pending',
  `editor_id` int(11) NOT NULL,
  `message_time` time NOT NULL,
  `message_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `monthlytarget`
--

CREATE TABLE `monthlytarget` (
  `m_target_id` int(11) NOT NULL,
  `m_target` varchar(200) NOT NULL,
  `m_target_date` date NOT NULL,
  `m_status_complete` varchar(50) NOT NULL DEFAULT 'Not Completed',
  `m_remarks` text NOT NULL,
  `m_status` varchar(50) NOT NULL DEFAULT 'restored'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `monthlytarget`
--

INSERT INTO `monthlytarget` (`m_target_id`, `m_target`, `m_target_date`, `m_status_complete`, `m_remarks`, `m_status`) VALUES
(4, '70', '2019-06-25', 'Not Complete', 'make it done', 'restored'),
(5, '30', '2019-07-01', 'Not Complete', 'akldjklasf', 'restored');

-- --------------------------------------------------------

--
-- Table structure for table `monthly_expense`
--

CREATE TABLE `monthly_expense` (
  `m_expense_id` int(11) NOT NULL,
  `expense_date` date NOT NULL,
  `expense_amount` int(11) NOT NULL,
  `expense_type` varchar(200) NOT NULL,
  `expense_status` varchar(50) NOT NULL DEFAULT 'restored'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `monthly_expense`
--

INSERT INTO `monthly_expense` (`m_expense_id`, `expense_date`, `expense_amount`, `expense_type`, `expense_status`) VALUES
(3, '2019-06-26', 300, '2', 'restored'),
(4, '2019-06-28', 5000, '6', 'restored');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `r_student_id` int(11) NOT NULL,
  `r_student_name` varchar(25) NOT NULL,
  `r_student_fathername` varchar(25) NOT NULL,
  `r_student_mobileno` bigint(20) NOT NULL,
  `r_student_fatherno` bigint(20) NOT NULL,
  `r_student_emergencyno` bigint(20) NOT NULL,
  `r_student_whatsappno` bigint(20) NOT NULL,
  `r_student_dob` date NOT NULL,
  `r_student_gender` varchar(25) NOT NULL,
  `r_student_image` text NOT NULL,
  `r_student_maritalstat` varchar(20) NOT NULL,
  `r_student_cnic` bigint(20) NOT NULL,
  `r_student_nationality` varchar(25) NOT NULL,
  `r_student_religion` int(11) NOT NULL,
  `r_student_lastedu` int(11) NOT NULL,
  `r_student_currentedu` int(11) NOT NULL,
  `r_student_address` text NOT NULL,
  `r_student_currentdate` date NOT NULL,
  `r_status` varchar(50) NOT NULL DEFAULT 'restored'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`r_student_id`, `r_student_name`, `r_student_fathername`, `r_student_mobileno`, `r_student_fatherno`, `r_student_emergencyno`, `r_student_whatsappno`, `r_student_dob`, `r_student_gender`, `r_student_image`, `r_student_maritalstat`, `r_student_cnic`, `r_student_nationality`, `r_student_religion`, `r_student_lastedu`, `r_student_currentedu`, `r_student_address`, `r_student_currentdate`, `r_status`) VALUES
(2, 'lsjdklfj', 'lksdjfkl', 22344, 32424, 234234, 234234, '1999-07-05', 'Male', 'http://[::1]/lead_in/uploads/1561289598.png', 'Single', 23423423423, 'sdfsdfnkl', 0, 1, 1, 'sldfjklsdfj', '2019-06-23', 'deleted'),
(3, 'abdul qadir ', 'shoukat', 3072241844, 3032798848, 0, 3072241844, '1999-07-05', 'Male', 'http://[::1]/lead_in/uploads/Jellyfish3.jpg', 'Single', 423011111111111111, 'Pakistan', 1, 2, 1, 'Memon Plaza, B-21, Garden West, Karachi', '2019-06-23', 'deleted'),
(4, 'Junaid', 'Shoukat', 3072241883, 3032798848, 3331222222, 3456092034, '1996-10-17', 'Male', 'http://[::1]/lead_in/uploads/1561306351.png', 'Single', 2345678909876, 'Pakistani', 1, 2, 1, 'Memon Plaza, Garden West, Karachi', '2019-06-23', 'restored'),
(5, 'Mutaal', 'A. Naeem', 31081032848, 31081032848, 31081032848, 31081032848, '2019-06-12', 'Male', 'http://[::1]/lead_in/uploads/1561385608.png', 'Single', 23489130123489248, 'Pakistani', 1, 2, 1, 'Ranchorline Karachi', '2019-06-24', 'restored'),
(6, 'skl', '3234', 23423, 234, 234, 2435, '2019-06-10', 'Male', 'http://[::1]/lead_in/uploads/1561400689.png', 'Single', 0, 'sdklfj', 1, 1, 1, 'fksdl', '2019-06-24', 'restored'),
(7, 'Zubair', 'Tariq', 9876543211, 12345678900, 9876543211, 12345678901, '1999-12-21', 'Male', 'http://[::1]/lead_in/uploads/1561992179.png', 'Single', 98765432112345, 'Pakistani', 1, 2, 1, 'Halar', '2019-07-01', 'restored');

-- --------------------------------------------------------

--
-- Table structure for table `religion`
--

CREATE TABLE `religion` (
  `religion_id` int(11) NOT NULL,
  `religion_name` varchar(200) NOT NULL,
  `religion_status` varchar(200) NOT NULL DEFAULT 'restored'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `religion`
--

INSERT INTO `religion` (`religion_id`, `religion_name`, `religion_status`) VALUES
(1, 'Muslim', 'restored'),
(3, 'Hindu', 'restored');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `salary_id` int(11) NOT NULL,
  `salary_date` date NOT NULL,
  `salary_faculty` int(11) NOT NULL,
  `salary_amount` int(11) NOT NULL,
  `salary_total` int(11) NOT NULL,
  `salary_status` varchar(50) NOT NULL DEFAULT 'restored',
  `per_lecture` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`salary_id`, `salary_date`, `salary_faculty`, `salary_amount`, `salary_total`, `salary_status`, `per_lecture`) VALUES
(12, '2019-06-26', 1, 500, 1000, 'restored', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
  `sms_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `msg` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sms`
--

INSERT INTO `sms` (`sms_id`, `user_id`, `msg`, `date`, `time`, `status`) VALUES
(1, 22, 'trr', '2019-07-14', '09:37:00', 'pending'),
(2, 21, 'ahmed', '2019-07-14', '09:46:00', 'pending'),
(3, 23, 'hello ali', '2019-07-14', '09:46:00', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(244) NOT NULL,
  `student_batch_code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_name`, `student_batch_code`) VALUES
(1, 'Hasnain', 'sfswerf-dsfgsda'),
(2, 'Zubair', 'gasdfas3-234');

-- --------------------------------------------------------

--
-- Table structure for table `target_chase`
--

CREATE TABLE `target_chase` (
  `chase_id` int(11) NOT NULL,
  `admission_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `target_chase`
--

INSERT INTO `target_chase` (`chase_id`, `admission_id`, `user_id`, `date`, `time`) VALUES
(1, 4, 1, '2019-07-14', '02:42:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `user_picture` text NOT NULL,
  `position` varchar(255) DEFAULT NULL,
  `time_start` time DEFAULT NULL,
  `time_end` time DEFAULT NULL,
  `activity_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_role`, `user_picture`, `position`, `time_start`, `time_end`, `activity_status`) VALUES
(1, 'Abdul Qadir', 'aq@mail.com', 'admin123', 'admin', 'data:image/png;base64,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', 'CEO', '07:22:19', '12:43:08', 1),
(21, 'Ahmed', 'ah@mail.com', '123', 'editor', 'http://[::1]/lead_in/uploads/Lighthouse5.jpg', 'Senior Teacher', '16:00:00', '21:00:00', 0),
(22, 'haris', 'h@mail.com', '123', 'editor', 'http://[::1]/lead_in/uploads/Tulips2.jpg', 'Manager', '16:00:00', '21:00:00', 0),
(23, 'ali', 'aliyan@mail.com', '123', 'editor', 'http://[::1]/lead_in/uploads/Hydrangeas8.jpg', 'Developer', '04:00:00', '21:00:00', 0),
(24, 'ubaid', 'ubaid@mail.com', 'ubaid123', 'editor', 'http://[::1]/lead_in/uploads/Lighthouse6.jpg', 'Teacher', '14:00:00', '21:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admission`
--
ALTER TABLE `admission`
  ADD PRIMARY KEY (`a_student_id`);

--
-- Indexes for table `batchdays`
--
ALTER TABLE `batchdays`
  ADD PRIMARY KEY (`batchdays_id`);

--
-- Indexes for table `batch_code`
--
ALTER TABLE `batch_code`
  ADD PRIMARY KEY (`batch_id`);

--
-- Indexes for table `capital`
--
ALTER TABLE `capital`
  ADD PRIMARY KEY (`capital_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`education_id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `gate_pass`
--
ALTER TABLE `gate_pass`
  ADD PRIMARY KEY (`gate_pass_id`);

--
-- Indexes for table `inquiry_col`
--
ALTER TABLE `inquiry_col`
  ADD PRIMARY KEY (`col_id`);

--
-- Indexes for table `inquiry_form`
--
ALTER TABLE `inquiry_form`
  ADD PRIMARY KEY (`inquiry_id`);

--
-- Indexes for table `inquiry_status`
--
ALTER TABLE `inquiry_status`
  ADD PRIMARY KEY (`inquiry_id`);

--
-- Indexes for table `marketing_source`
--
ALTER TABLE `marketing_source`
  ADD PRIMARY KEY (`source_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `fk_editorid_in_message` (`editor_id`);

--
-- Indexes for table `monthlytarget`
--
ALTER TABLE `monthlytarget`
  ADD PRIMARY KEY (`m_target_id`);

--
-- Indexes for table `monthly_expense`
--
ALTER TABLE `monthly_expense`
  ADD PRIMARY KEY (`m_expense_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`r_student_id`);

--
-- Indexes for table `religion`
--
ALTER TABLE `religion`
  ADD PRIMARY KEY (`religion_id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`salary_id`);

--
-- Indexes for table `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`sms_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `target_chase`
--
ALTER TABLE `target_chase`
  ADD PRIMARY KEY (`chase_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admission`
--
ALTER TABLE `admission`
  MODIFY `a_student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `batchdays`
--
ALTER TABLE `batchdays`
  MODIFY `batchdays_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `batch_code`
--
ALTER TABLE `batch_code`
  MODIFY `batch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `capital`
--
ALTER TABLE `capital`
  MODIFY `capital_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `education_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `expense_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `faculty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `gate_pass`
--
ALTER TABLE `gate_pass`
  MODIFY `gate_pass_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inquiry_col`
--
ALTER TABLE `inquiry_col`
  MODIFY `col_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `inquiry_form`
--
ALTER TABLE `inquiry_form`
  MODIFY `inquiry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `inquiry_status`
--
ALTER TABLE `inquiry_status`
  MODIFY `inquiry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `marketing_source`
--
ALTER TABLE `marketing_source`
  MODIFY `source_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `monthlytarget`
--
ALTER TABLE `monthlytarget`
  MODIFY `m_target_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `monthly_expense`
--
ALTER TABLE `monthly_expense`
  MODIFY `m_expense_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `r_student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `religion`
--
ALTER TABLE `religion`
  MODIFY `religion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `salary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `sms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `target_chase`
--
ALTER TABLE `target_chase`
  MODIFY `chase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `fk_editorid_in_message` FOREIGN KEY (`editor_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
