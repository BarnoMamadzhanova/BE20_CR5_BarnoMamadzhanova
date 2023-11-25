-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2023 at 03:50 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `be20_cr5_animal_adoption_barnomamadzhanova`
--
CREATE DATABASE IF NOT EXISTS `be20_cr5_animal_adoption_barnomamadzhanova` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `be20_cr5_animal_adoption_barnomamadzhanova`;

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `animal_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `age` int(4) NOT NULL,
  `vaccinated` tinyint(1) NOT NULL,
  `breed` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`animal_id`, `name`, `location`, `photo`, `description`, `size`, `age`, `vaccinated`, `breed`, `status`) VALUES
(1, 'Fido', 'Nussdorfer str. 6', 'https://cdn.pixabay.com/photo/2019/04/17/20/18/golden-retriever-4135265_1280.jpg', 'Fido is a loyal and loving Labrador Retriever. He enjoys long walks and playing fetch in the park. Fido is medium-sized and is 5 years old. He´s fully vaccinated and looking for a forever home.', 'Medium', 5, 1, 'Labrador Retriever', 'Available'),
(2, 'Whiskers', 'Wagramer str. 94', 'https://cdn.pixabay.com/photo/2016/03/03/20/28/cat-1234955_1280.jpg', 'Whiskers is an affectionate Siamese cat. He loves cuddling and playing with toys. Whiskers is small in size and is 9 years old. He´s been booked and will be taken home next week.', 'Small', 9, 1, 'Siamese', 'Adopted'),
(3, 'Spike', 'Kärntner str. 49', 'https://cdn.pixabay.com/photo/2016/04/02/09/19/bearded-dragon-1302397_1280.jpg', 'Spike is a playful Bearded Dragon. He enjoys basking in the sun and exploring his enclosure. Spike is small-sized and is 4 years old. He´s looking for a reptile enthusiast to provide him with care and attention.', 'Small', 4, 1, 'Bearded Dragon', 'Available'),
(4, 'Maximus', 'Albert-Schweitzer-Gasse 12', 'https://cdn.pixabay.com/photo/2021/08/04/08/32/parrot-6521334_1280.jpg', 'Maximus is a majestic African Grey Parrot. He loves mimicking sounds and interacting with people. Maximus is medium-sized and is 15 years old. He´s vaccinated and looking for a home where he can thrive and entertain.', 'Medium', 15, 1, 'African Grey Parrot', 'Available'),
(5, 'Rosie', 'Pilgrambrücke 4', 'https://cdn.pixabay.com/photo/2016/11/03/19/46/dog-1796040_1280.jpg', 'Rosie is a friendly and gentle Boxer. She enjoys playing with toys and going for walks. Rosie is large-sized and is 7 years old. She´s fully vaccinated and looking for a loving family to spend her golden years.', 'Large', 7, 1, 'Boxer', 'Available'),
(6, 'Mittens', 'Julius-Tandler-Platz 13', 'https://cdn.pixabay.com/photo/2016/10/09/15/39/cat-1726023_1280.jpg', 'Mittens is a sweet and calm Ragdoll cat. She loves lounging around and receiving gentle pets. Mittens is medium-sized and is 10 years old. She´s not vaccinated and looking for a quiet and cozy home.', 'Medium', 10, 0, 'Ragdoll', 'Available'),
(7, 'Turtle', 'Thaliastrasse 21', 'https://cdn.pixabay.com/photo/2017/05/07/12/49/turtle-2292314_1280.jpg', 'Turtle is a curious and slow-moving Red-Eared Slider. He enjoys swimming and sunbathing on his basking spot. Turtle is small-sized and is 12 years old. He´s looking for an experienced reptile keeper.', 'Small', 12, 0, 'Red-Eared Slider', 'Available'),
(8, 'Buddy', 'Rotenturmstrasse 29', 'https://cdn.pixabay.com/photo/2023/02/20/23/05/animal-7803244_1280.jpg', 'Buddy is an energetic and playful Border Collie. He loves learning new tricks and going on adventures. Buddy is medium-sized and is 3 years old. He´s vaccinated and ready to join an active family.', 'Medium', 3, 1, 'Border Collie', 'Available'),
(9, 'Samantha', 'Johannesgasse 1', 'https://cdn.pixabay.com/photo/2019/04/12/15/12/cat-4122353_1280.jpg', 'Samantha is a graceful and affectionate Russian Blue cat. She enjoys lounging by the window and observing her surroundings. Samantha is medium-sized and is 8 years old. She was recently adopted.', 'Medium', 8, 1, 'Russian Blue', 'Adopted'),
(10, 'Charlie', 'Heiligenstädter str. 68', 'https://cdn.pixabay.com/photo/2014/05/30/12/44/snake-358245_1280.jpg', 'Charlie is a wise and friendly Ball Python. He enjoys exploring and curling up in cozy hides. Charlie is small-sized and is 9 years old. He´s looking for a reptile enthusiast to provide him with a comfortable habitat.', 'Small', 6, 0, 'Ball Python', 'Available'),
(11, 'Smokey', 'Taborstrasse 72', 'https://cdn.pixabay.com/photo/2018/04/23/12/27/animal-3344086_1280.jpg', 'Smokey is a laid-back and affectionate Maine Coon cat. He loves lounging on soft beds and receiving chin scratches. Smokey is large-sized and is 11 years old. He´s vaccinated and has found a loving forever home.', 'Large', 11, 1, 'Maine Coon', 'Adopted'),
(12, 'Gizmo', 'Europlatz 2', 'https://cdn.pixabay.com/photo/2016/01/04/09/28/huron-1120505_1280.jpg', 'Gizmo is an adventurous and curious Ferret. He loves exploring new spaces and playing with toys. Gizmo is small-sized and is 5 years old. He´s vaccinated and has been happily adopted by a ferret-loving family.', 'Small', 5, 1, 'Ferret', 'Adopted'),
(13, 'Lucky', 'Währinger str. 52', 'assets/6561e96dd3de5.jpg', 'Super cute and lovely', 'Small', 7, 1, 'dog', 'Available'),
(14, 'Sara', 'Währinger str. 70', 'assets/6561e96dd3de5.jpg', 'Super cute and lovely', 'Small', 5, 1, 'cat', 'Available'),
(24, 'Sasha', 'Währinger str. 70', 'assets/6561e87b8c740.jpg', 'A short descriotion', 'Small', 7, 1, 'bird', 'Available'),
(26, 'AAA', 'Währinger str. 52', 'assets/default.png', 'A short descriotion', 'Medium', 54, 1, 'ww', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `pet_adoption`
--

CREATE TABLE `pet_adoption` (
  `id` int(11) NOT NULL,
  `adoption_date` date NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `fk_animal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(4) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `phone_number`, `photo`, `address`, `password`, `status`) VALUES
(1, 'John', 'Johanson', 'john_doe@mail.com', '+43 670 680 256', 'https://cdn.pixabay.com/photo/2016/11/21/12/42/beard-1845166_1280.jpg', 'Handelskai 92', '789987ADM', 'user'),
(2, 'Jane', 'Smith', 'jane_sanders@mail.com', '+43 624 560 257', 'https://cdn.pixabay.com/photo/2023/10/12/12/55/woman-8310751_1280.jpg', 'Pilgrambrücke 12', 'Jane1230U', 'user'),
(3, 'Alice', 'Johnson', 'alice_johnson@mail.com', '+43 240 850 157', 'https://cdn.pixabay.com/photo/2019/02/11/20/20/woman-3990680_1280.jpg', 'Hauptbahnhof 3', 'Alice1230U', 'user'),
(4, 'Bob', 'Brown', 'bob_brown@mail.com', '+43 650 782 459', 'https://cdn.pixabay.com/photo/2020/02/07/19/02/portrait-4828091_1280.jpg', 'Handelskai 130', 'BobB1230U', 'user'),
(5, 'Emily', 'Davidson', 'emily_davis@mail.com', '+43 623 145 856', 'https://cdn.pixabay.com/photo/2016/11/29/13/14/attractive-1869761_1280.jpg', 'Hadikgasse 62', 'Emily12301u', 'user'),
(6, 'Name', 'Last', 'address@mail.com', '095841222548', 'assets/default.png', 'Floridsdorf 54', '058e63a13b2556cf2a6e68f8502aeb96e9563d833aca001272b0484e12b4ff75', 'user'),
(7, 'Admin', 'Last', 'admin@mail.com', '+43 859 255 123', 'assets/default.png', 'Prater 12', '3af9f4832a5a6103b1aa31c971b000cd1c6f57f3688e663cdc7e76b87854f7ca', 'user'),
(8, 'User', 'Test', 'user@mail.com', '1258411231656', 'assets/default.png', 'Wien 52', '150c0607760bbec146a626aa0b226f465d07f70f2cc2b058ef36779c8da6027a', 'user'),
(9, 'bobur', 'mmmm', 'b@b.com', '545454', 'assets/6561e3d89269b.jpg', 'Kaka str 1234', '0fcf07f8b4797e9c58e2ca294dc0182119ed2e3bf5611d7192b1e49ac944501d', 'user'),
(10, 'gaga', 'lady', 'lady@gaga.com', '213123', 'assets/avatar.png', 'sadasd', '2435b98bbb9bba289ad2cf0baa7303d38aefa3c112b5ccd64f599e781c7ee92b', 'adm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`animal_id`);

--
-- Indexes for table `pet_adoption`
--
ALTER TABLE `pet_adoption`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`fk_user_id`),
  ADD KEY `fk_animal_id` (`fk_animal_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `animal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pet_adoption`
--
ALTER TABLE `pet_adoption`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pet_adoption`
--
ALTER TABLE `pet_adoption`
  ADD CONSTRAINT `pet_adoption_ibfk_1` FOREIGN KEY (`fk_user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `pet_adoption_ibfk_2` FOREIGN KEY (`fk_animal_id`) REFERENCES `animals` (`animal_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
