
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


INSERT INTO `admin` (`id`, `username`, `password`, `email`, `tanggal`) VALUES
(1, 'Admin', '$2y$10$FfhPYubR4sOXAFSd3NzyQ.C77L4.qIsCa/YlYZCn.2eK8rfWr6oiq', 'admin@email.com', '2021-09-19 14:39:53');



CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `page_name` varchar(255) DEFAULT NULL,
  `konten` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `diskripsi` text NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

