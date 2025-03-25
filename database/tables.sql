SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `admintb` (
  `id` INT(11) AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(50)  NULL,
  `password` varchar(30)  NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `appointmenttb` (
  `pid` int(11)  NULL,
  `ID` int(11)   AUTO_INCREMENT PRIMARY KEY,
  `fname` varchar(20)  NULL,
  `lname` varchar(20)  NULL,
  `gender` varchar(10)  NULL,
  `email` varchar(30)  NULL,
  `contact` varchar(10)  NULL,
  `doctor` varchar(30)  NULL,
  `docFees` int(5)  NULL,
  `appdate` date  NULL,
  `apptime` time  NULL,
  `userStatus` int(5)  NULL,
  `doctorStatus` int(5)  NULL,
  `appointment_status` int(5) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `contact` (
    `id` INT(11) AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(30)  NULL,
  `email` text  NULL,
  `contact` varchar(10)  NULL,
  `message` varchar(200)  NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `doctb` (
  `id` INT(11) AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(50)  NULL,
  `password` varchar(50)  NULL,
  `email` varchar(50)  NULL,
  `spec` varchar(50)  NULL,
  `docFees` int(10)  NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `patreg` (
  `pid` INT(11) AUTO_INCREMENT PRIMARY KEY,
  `fname` VARCHAR(20) NULL,
  `lname` VARCHAR(20) NULL,
  `gender` VARCHAR(10) NULL,
  `email` VARCHAR(30) NULL,
  `contact` VARCHAR(10) NULL,
  `password` VARCHAR(30) NULL,
  `cpassword` VARCHAR(30) NULL,
  `marital_status` VARCHAR(30) NULL,
  `address` VARCHAR(255) NULL,
  `dob` DATE NULL,
  `referred_by` VARCHAR(30) NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `prestb` (
  `id` INT(11) AUTO_INCREMENT PRIMARY KEY,
  `doctor` VARCHAR(50) NULL,
  `pid` INT(11) NULL,
  `fname` VARCHAR(50) NULL,
  `lname` VARCHAR(50) NULL,
  `appdate` DATE NULL,
  `apptime` TIME NULL,
  `disease` VARCHAR(250) NULL,
  `allergy` VARCHAR(250) NULL,
  `prescription` VARCHAR(1000) NULL
) ENGINE=INNODB DEFAULT CHARSET=latin1;

ALTER TABLE `appointmenttb`
  ADD PRIMARY KEY (`ID`);

  ALTER TABLE `patreg`
  ADD PRIMARY KEY (`pid`);


ALTER TABLE `appointmenttb`
  MODIFY `ID` int(11)  NULL AUTO_INCREMENT, AUTO_INCREMENT=14;


ALTER TABLE `patreg`
  MODIFY `pid` int(11)  NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;


CREATE TABLE marital_status (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50)  NULL,
    created DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


CREATE TABLE expenses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    DATE DATE NOT NULL,
    eb_bill DECIMAL(10,2)  NULL,
    physio_expenses DECIMAL(10,2)  NULL,
    salary DECIMAL(10,2)  NULL,
    tv DECIMAL(10,2)  NULL,
    tea DECIMAL(10,2)  NULL,
    phone_bill DECIMAL(10,2)  NULL,
    food DECIMAL(10,2)  NULL,
    biscuit DECIMAL(10,2)  NULL,
    cool_drinks DECIMAL(10,2)  NULL,
    service DECIMAL(10,2)  NULL,
    WORK DECIMAL(10,2)  NULL,
    milk DECIMAL(10,2)  NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

