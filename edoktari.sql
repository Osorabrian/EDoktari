-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2022 at 08:04 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edoktari`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--
-- Creation: Apr 06, 2022 at 01:45 PM
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `admin`:
--

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--
-- Creation: Apr 26, 2022 at 10:27 AM
--

CREATE TABLE `appointment` (
  `appointment_id` int(255) NOT NULL,
  `patientname` varchar(255) NOT NULL,
  `patientemail` varchar(30) NOT NULL,
  `doctorname` varchar(255) NOT NULL,
  `doctoremail` varchar(255) NOT NULL,
  `startdate` datetime NOT NULL,
  `enddate` datetime NOT NULL,
  `description` tinytext NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `appointment`:
--

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `patientname`, `patientemail`, `doctorname`, `doctoremail`, `startdate`, `enddate`, `description`, `status`) VALUES
(13, 'emma nyabonyi', 'emma@gmail.com', 'john nyamaiko', 'johnondati@gmail.com', '2022-04-17 08:30:00', '2022-04-17 09:30:00', 'yujty htr tg', 'Approved'),
(14, 'omondi brian', 'omondi@gmail.com', 'Mercy Chepngetich', 'mercychep@hotmail.com', '2022-04-25 09:14:00', '2022-04-25 10:14:00', 'cough, diarrohea, chestpain', 'Approved'),
(15, 'brian isaboke', 'isaboke@gmail.com', 'Sarah Gesare', 'gesare@gmail.com', '2022-04-26 14:08:00', '2022-04-26 14:13:00', 'cough, chest pain', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--
-- Creation: Mar 11, 2022 at 01:45 PM
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `img_dir` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `blog`:
--

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `content`, `img_dir`) VALUES
(2, 'TELEMEDICINE', 'Telemedicine offers healthcare using digital devices such as computers and smartphones. In most cases, telemedicine uses video conferencing. However, some providers choose to offer care via email or phone messaging.\r\n\r\nMany people use telemedicine with their usual healthcare provider. Others access virtual care using a dedicated telemedicine app.\r\n\r\nDoctors and patients can use telemedicine to:\r\n\r\nassess whether or not the patient needs treatment in person\r\nprovide certain kinds of medical care, such as mental health treatment and assessments for minor infections\r\nwrite or renew prescriptions\r\noffer certain types of therapy, such as speech and physical therapy\r\nTelemedicine is useful in situations where the patient must practice physical distancing or is unable to attend a healthcare facility in person.', 'landing page.jpg'),
(4, 'TUBERCLOSIS', 'Tuberculosis (TB) is a disease caused by a type of bacteria called Mycobacterium tuberculosis. It most commonly affects the lungs, although it can affect other parts of the body. Medications are available to treat TB and must be taken as prescribed by your provider. Depending on the medication(s) prescribed, the duration can be from four months to nine months or more.\r\n\r\nWorldwide, TB remains a leading cause of death. In the United States, TB is on the decline. In 2020, more than 7000 new TB cases were reported in the United States, with cases reported from every state. This is the lowest number of national cases since TB became a reportable disease in the 1950s.\r\n\r\nTB can be fatal if not recognized and treated. It also can spread from person to person to infect others. However, TB is treatable and preventable. Identifying and treating those who are infected but who have not yet become ill with active TB can prevent the disease and thus eliminate the spread of TB in the community.\r\n\r\n', 'tuberclosis2.png'),
(5, 'MENTAL ILLNESS', 'Mental illness also called mental health disorders, refers to a wide range of mental health conditions â€” disorders that affect your mood, thinking, and behavior. Examples of mental illness include depression, anxiety disorders, schizophrenia, eating disorders, and addictive behaviors.\r\n\r\nMany people have mental health concerns from time to time. But a mental health concern becomes a mental illness when ongoing signs and symptoms cause frequent stress and affect your ability to function.\r\n\r\nExamples of signs and symptoms include:\r\n\r\nFeeling sad or down\r\nConfused thinking or reduced ability to concentrate\r\nExcessive fears or worries, or extreme feelings of guilt\r\nExtreme mood changes of highs and lows\r\nWithdrawal from friends and activities', 'mental_health.jpg'),
(6, 'COVID 19', 'Coronavirus disease (COVID-19) is an infectious disease caused by the SARS-CoV-2 virus.\r\nMost people who fall sick with COVID-19 will experience mild to moderate symptoms and recover without special treatment. However, some will become seriously ill and require medical attention.\r\nHOW IT SPREADS\r\nThe virus can spread from an infected personâ€™s mouth or nose in small liquid particles when they cough, sneeze, speak, sing or breathe. These particles range from larger respiratory droplets to smaller aerosols.\r\nYou can be infected by breathing in the virus if you are near someone who has COVID-19, or by touching a contaminated surface and then your eyes, nose or mouth. The virus spreads more easily indoors and in crowded settings.', 'covid 19.jpg'),
(7, 'WORKOUT AND HEALTH', 'We have all heard it many times before - regular exercise is good for you, and it can help you lose weight.  You can start slowly, and find ways to fit more physical activity into your life. To get the most benefit, you should try to get the recommended amount of exercise for your age. If you can do it, the payoff is that you will feel better, help prevent or control many diseases, and likely even live longer.\r\n\r\nWhat are the health benefits of exercise?\r\nHelp you control your weight. \r\nReduce your risk of heart diseases.\r\nHelp your body manage blood sugar and insulin levels.\r\n', 'workout.webp'),
(8, 'SMOKING AND TOBACCO USE', 'Smoking leads to disease and disability and harms nearly every organ of the body.\r\nMore than 16 million Americans are living with a disease caused by smoking. For every person who dies because of smoking, at least 30 people live with a serious smoking-related illness. Smoking causes cancer, heart disease, stroke, lung diseases, diabetes, and chronic obstructive pulmonary disease (COPD), which includes emphysema and chronic bronchitis. Smoking also increases risk for tuberculosis, certain eye diseases, and problems of the immune system, including rheumatoid arthritis.', 'smoking.jpg'),
(9, 'HEART DISEASE AND STROKE', 'Heart disease and stroke are cardiovascular (heart and blood vessel) diseases (CVDs).\r\n\r\nHeart disease includes several types of heart conditions. The most common type in the United States is coronary heart disease (also known as coronary artery disease), which is a narrowing of the blood vessels that carry blood to the heart.2,3 This can cause:\r\n\r\na) Chest pain\r\nb) Heart attack (when blood flow to the heart becomes blocked and a section of the heart muscle is damaged or dies)2,4\r\nc) Heart failure (when the heart cannot pump enough blood and oxygen to support other organs)2,5\r\nd) Arrhythmia (when the heart beats too fast, too slow, or irregularly)', 'heart disease.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosisrecord`
--
-- Creation: Apr 12, 2022 at 10:11 AM
--

CREATE TABLE `diagnosisrecord` (
  `ID` int(11) NOT NULL,
  `patientemail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sym` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `disease` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `diagnosisrecord`:
--

--
-- Dumping data for table `diagnosisrecord`
--

INSERT INTO `diagnosisrecord` (`ID`, `patientemail`, `sym`, `disease`, `type`, `date`) VALUES
(5, 'emma@gmail.com', 'cough,shortness of breath,chest pain', 'Pneumonia', 'Infectious disease doctor', '2022-03-31 09:39:00'),
(6, 'emma@gmail.com', 'cough,shortness of breath,chest pain', 'Pneumonia', 'Infectious disease doctor', '2022-03-31 09:39:00'),
(33, 'emma@gmail.com', 'cough,fatigue,painful swallowing', 'Diphtheria', 'Infectious disease doctor', '2022-04-11 12:20:00'),
(34, 'emma@gmail.com', 'cough,fatigue,painful swallowing', 'Diphtheria', 'Infectious disease doctor', '2022-04-11 12:20:00'),
(35, 'emma@gmail.com', 'cough,difficulty breathing,chest pain', 'Diphtheria', 'Infectious disease doctor', '2022-04-11 13:13:00');

-- --------------------------------------------------------

--
-- Table structure for table `disease`
--
-- Creation: Mar 31, 2022 at 10:38 AM
--

CREATE TABLE `disease` (
  `Did` varchar(15) NOT NULL,
  `disease` varchar(100) NOT NULL,
  `symptom` varchar(200) NOT NULL,
  `type` varchar(100) NOT NULL,
  `flag` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `disease`:
--

--
-- Dumping data for table `disease`
--

INSERT INTO `disease` (`Did`, `disease`, `symptom`, `type`, `flag`) VALUES
('10001', 'Coronary Artery Disease', 'shortness of breath,palpitations,faster heartbeat,weakness,nausea,sweating', 'cardiologist', 0),
('10002', 'Heart Attack', 'discomfort,pressure,heaviness,chest pain,discomfort,fullness,indigestion,sweating,nausea,extreme weakness,irregular heartbeat', 'cardiologist', 0),
('10003', 'Arrhythmias', 'palpitations,chest pounding,dizziness,shortness of breath,fainting', 'cardiologist', 0),
('10004', 'Heart Valve Disease', 'shortness of breath,weakness,dizziness,palpitations,irregular heartbeat', 'cardiologist', 0),
('10005', 'Pericarditis', 'sharp chest pain,low grade fever,increased heart rate', 'cardiologist', 0),
('10006', 'Osteoporosis', 'rounded upper back,height loss', 'orthopedic', 0),
('10007', 'Osteomyelitis', 'fever,rednedd over infected area,swelling,stiffness', 'orthopedic', 0),
('10008', 'Hypercalcemia', 'excessive thirst,excessive urination,nausea,abdominal pain,decreased appetite,constipation,weakness', 'orthopedic', 0),
('10009', 'Rickets', 'skeletal deformities,muscle cramps,bone fractures,impaired growth,tender bones,increased tooth cavities', 'orthopedic', 0),
('10010', 'Pagetâ€™s Disease', 'bone pain,joint stiffness,bone fractures,hearing loss,skeletal deformities', 'orthopedic', 0),
('10011', 'AIDS', 'fever,large tender lymph nodes,throat inflammation,headache,rashes', 'Infectious disease doctor', 0),
('10012', 'Amoebiasis', 'diarreah,severe dysentery', 'Infectious disease doctor', 0),
('10013', 'Pneumonia', 'fever,rigors,cough,runny nose,chest pain,shortness of breath', 'Infectious disease doctor', 0),
('10014', 'Diphtheria', 'chills,fatigue,bluish skin,coloration,sore throat,hoarseness,cough,headache,difficulty swallowing,painful swallowing,difficulty breathing', 'Infectious disease doctor', 0),
('10015', 'Dengue', 'fever,headache,joint pains,measel like rashes', 'Infectious disease doctor', 0),
('10016', 'fgb fgg', 'bn,bn,bn,bn,bn', 'Neurologist', 0);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--
-- Creation: Mar 31, 2022 at 10:21 AM
--

CREATE TABLE `doctors` (
  `doctor_id` int(11) NOT NULL,
  `profileimage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `phonenumber` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `uniquenumber` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `dateofbirth` date DEFAULT NULL,
  `officeaddress` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `experience` int(2) DEFAULT NULL,
  `bio` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `repeatpassword` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `doctors`:
--

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doctor_id`, `profileimage`, `firstname`, `lastname`, `phonenumber`, `email`, `uniquenumber`, `dateofbirth`, `officeaddress`, `gender`, `type`, `experience`, `bio`, `country`, `city`, `password`, `repeatpassword`) VALUES
(1, 'john.jpg', 'john', 'nyamaiko', '1234567890', 'johnondati@gmail.com', '23432ed', '2022-03-16', 'p.o box 2203', 'male', 'paedetrician', 23, 'fevdjghn fghjgh dfgh ghgfn fhgvb bv ', 'Kenya', 'Nairobi', '527bd5b5d689e2c32ae974c6229ff785', '527bd5b5d689e2c32ae974c6229ff785'),
(4, 'mahlon.jpeg', 'Mahlon', 'Denton', '3504567890', 'mahlon@gmail.com', '1qa2s4rrt', '1986-08-15', 'kampala towe', 'male', 'paedetrician', 14, 'i love children', 'Uganda', 'Kampala', '91f6dd6cfd33db4d9351031b5c167d92', '91f6dd6cfd33db4d9351031b5c167d92'),
(5, 'gideon.jpg', 'Gideon', 'Magoma', '0722233323', 'gideon@gmail.com', 'v34fd23sff', '2022-04-01', 'Section 58', 'male', 'gaenecologist', 12, 'I love my job.', 'Kenya', 'NAKURU', '23a4cd930ed8678c306672742d896c1b', '23a4cd930ed8678c306672742d896c1b'),
(6, 'jane.jpg', 'jane', 'Kamau', '0712348945', 'janekamau@gmail.com', 'n45dfd980', '2022-04-06', 'Beach office', 'female', 'gaenecologist', 10, 'i have alot of experience', 'Seychelles', 'Mahe', 'f7ffd5e6e5759ed211430e8153a226f3', 'f7ffd5e6e5759ed211430e8153a226f3'),
(7, 'brian.jpg', 'Brian', 'Oduor', '3458906344', 'oduorbrian@gmail.com', 'f45yuh458', '1990-08-08', 'level 5', 'male', 'infectious disease doctor', 5, 'i do my job with passion', 'Kenya', 'Kisumu', '6f4deca387d5f109601114183f52a28a', '6f4deca387d5f109601114183f52a28a'),
(8, 'catherine.jpg', 'Catherine', 'Kemunto', '8657904534', 'cathkem@gmail.com', 'j23bfs45gf', '1984-07-02', 'Nyerere Towe', 'female', 'infectious disease doctor', 19, 'i will treat you like never before.', 'Tanzania', 'Dodoma', 'f7e036bb36e5d5e5b1e0fecfff4ca44d', 'f7e036bb36e5d5e5b1e0fecfff4ca44d'),
(9, 'mercy.webp', 'Mercy', 'Chepngetich', '2633547687', 'mercychep@hotmail.com', 'g45hy45sj6', '1983-05-25', 'juba level 5', 'female', 'orthopedic', 15, 'i am so passionate', 'South Sudan', 'Juba', '5d833e4355ee247186f5f6db3c7249e3', '5d833e4355ee247186f5f6db3c7249e3'),
(10, 'francis.webp', 'Wafula', 'Francis', '0745639823', 'wafula@yahoo.com', 'o457ghw34e', '1989-02-22', 'P.O BOX 2203', 'male', 'orthopedic', 20, ' I promise to do a great job.', 'Congo', 'Kinshasa', '8f75edd8c5407e051b0792f804edc1e8', '8f75edd8c5407e051b0792f804edc1e8'),
(11, 'nancy.webp', 'Nancy', 'Amina', '1341235676', 'amina@yahoo.com', 'c4d3gr34f', '1986-10-14', 'Old town ', 'female', 'cardiologist', 12, 'Quality service.', 'Kenya', 'Mombasa', 'bd82dd2a8b944f131d0a53bc1b473029', 'bd82dd2a8b944f131d0a53bc1b473029'),
(12, 'abdul.webp', 'Abdul', 'Muhammed', '2453658760', 'muhammed@gmail.com', 'b456df32s', '1980-08-06', 'P.O BOX 345-', 'male', 'cardiologist', 20, 'I love my job.', 'Somalia', 'Mogadishu', 'b8f567c6e9827b8a14f5bfeefd70db58', 'b8f567c6e9827b8a14f5bfeefd70db58'),
(13, 'steve.webp', 'Steve', 'Kiprotich', '3457829289', 'kiprotich@gmail.com', 'n34jih43j', '1972-09-04', 'harcourt bui', 'male', 'orthopedic', 13, 'i have got experience', 'South Afica', 'Port Alfred', 'e79772de9ad826897ab1813d34c63b81', 'e79772de9ad826897ab1813d34c63b81'),
(14, 'sarah.jpg', 'Sarah', 'Gesare', '0719457843', 'gesare@gmail.com', 'g34hh43j', '1989-07-25', 'Ouru Plaza', 'female', 'cardiologist', 8, 'I promise to deliver', 'Kenya', 'Kisii', '5d85a2804c87b652cfd463d86cdf359a', '5d85a2804c87b652cfd463d86cdf359a');

-- --------------------------------------------------------

--
-- Table structure for table `keyword`
--
-- Creation: Mar 30, 2022 at 04:25 PM
--

CREATE TABLE `keyword` (
  `word` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `keyword`:
--

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--
-- Creation: Mar 15, 2022 at 05:57 AM
--

CREATE TABLE `patients` (
  `profileimage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id` int(30) NOT NULL,
  `firstname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `phonenumber` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `dateofbirth` date DEFAULT NULL,
  `address` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `height` int(4) DEFAULT NULL,
  `weight` int(4) DEFAULT NULL,
  `gender` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `passwords` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `repeatpassword` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `patients`:
--

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`profileimage`, `id`, `firstname`, `lastname`, `email`, `phonenumber`, `dateofbirth`, `address`, `height`, `weight`, `gender`, `passwords`, `repeatpassword`) VALUES
('week 4.png', 5, 'emma', 'nyabonyi', 'emma@gmail.com', '01234567890', '2022-04-29', 'kisii town', 124, 56, 'female', '00a809937eddc44521da9521269e75c6', '00a809937eddc44521da9521269e75c6'),
('', 17, 'brian', 'isaboke', 'isaboke@gmail.com', '1234567890', NULL, NULL, NULL, NULL, NULL, 'cbd44f8b5b48a51f7dab98abcdf45d4e', 'cbd44f8b5b48a51f7dab98abcdf45d4e');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--
-- Creation: Mar 27, 2022 at 10:16 AM
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `patientname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `patientemail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `card_holder` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `card_num` bigint(20) NOT NULL,
  `card_cvc` int(5) NOT NULL,
  `card_exp_month` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `card_exp_year` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(10) NOT NULL,
  `currency` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'usd',
  `paid_amount` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `paid_amount_currency` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `payment`:
--

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `patientname`, `patientemail`, `card_holder`, `card_num`, `card_cvc`, `card_exp_month`, `card_exp_year`, `price`, `currency`, `paid_amount`, `paid_amount_currency`, `created`) VALUES
(5, 'emma', 'emma@gmail.com', 'isaac nyamaiko', 1233445567678, 23456, '12', '2034', 10, 'usd', '10', 'usd', '2022-04-05 15:06:06'),
(8, 'omondi', 'omondi@gmail.com', 'felix oduor', 123456789, 345, '04', '27', 10, 'usd', '10', 'usd', '2022-04-24 19:14:13'),
(9, 'brian', 'isaboke@gmail.com', 'brian osora isaboke', 1234567890, 345, '04', '27', 10, 'usd', '10', 'usd', '2022-04-26 13:07:53');

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--
-- Creation: Mar 30, 2022 at 04:26 PM
--

CREATE TABLE `temp` (
  `disease` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `temp`:
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnosisrecord`
--
ALTER TABLE `diagnosisrecord`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `disease`
--
ALTER TABLE `disease`
  ADD PRIMARY KEY (`Did`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `diagnosisrecord`
--
ALTER TABLE `diagnosisrecord`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
