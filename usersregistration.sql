
--
-- Database: `usersregistration`
--

-- --------------------------------------------------------

--
-- Table structure for table `usersinfo`
--

CREATE TABLE IF NOT EXISTS `usersinfo` (
`user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pc3` int(3) NOT NULL,
  `pc4` int(4) NOT NULL,
  `district` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` varchar(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usersinfo`
--

INSERT INTO `usersinfo` (`user_id`, `username`, `firstName`, `lastName`, `address`, `pc3`, `pc4`, `district`, `birthdate`, `gender`) VALUES
(1, 'First', 'theFirstName', 'theSecondName', 'the official address', 232, 4545, 'TheDistrict', '2015-05-05', 'm'),
(2, 'teste', 'teste', 'teste', 'testeAddress', 222, 2222, 'testeDsitrict', '0000-00-00', 'f')
;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usersinfo`
--
ALTER TABLE `usersinfo`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usersinfo`
--
ALTER TABLE `usersinfo`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
