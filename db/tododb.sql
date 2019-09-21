-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Sep 2019 pada 02.55
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tododb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_todo`
--

CREATE TABLE `t_todo` (
  `Todo_id` int(11) NOT NULL,
  `Todo_activity` text NOT NULL,
  `Todo_status` tinyint(1) NOT NULL,
  `Todo_archive_status` tinyint(4) NOT NULL,
  `Todo_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Todo_done_at` datetime DEFAULT NULL,
  `Todo_id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_todo`
--

INSERT INTO `t_todo` (`Todo_id`, `Todo_activity`, `Todo_status`, `Todo_archive_status`, `Todo_created_at`, `Todo_done_at`, `Todo_id_user`) VALUES
(7, 'Nonton ora', 0, 0, '2019-09-20 20:49:56', NULL, 2),
(8, 'Nonton Film', 1, 0, '2019-09-20 20:56:04', NULL, 1),
(9, 'sdfsadfsdf', 1, 1, '2019-09-20 21:11:01', '2019-09-21 04:16:10', 1),
(10, 'makan bakso', 0, 0, '2019-09-20 23:30:46', NULL, 2),
(11, 'minum teh', 1, 1, '2019-09-20 23:30:56', '2019-09-21 06:31:02', 2),
(12, 'Ngoding', 1, 1, '2019-09-21 00:16:40', '2019-09-21 07:18:54', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user`
--

CREATE TABLE `t_user` (
  `User_id` int(11) NOT NULL,
  `User_name` varchar(250) NOT NULL,
  `User_email` varchar(250) NOT NULL,
  `User_password` text NOT NULL,
  `User_nohp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_user`
--

INSERT INTO `t_user` (`User_id`, `User_name`, `User_email`, `User_password`, `User_nohp`) VALUES
(1, 'D', 'example@gmail.com', '6e3142f9b011110d915a4bf63819f4678ac74164b1c9f693c3df1bea2e1eb57bdb97a83c8002a2f2fcc7332003b29124367834312cba483556889b33ef188d69', '08996264549'),
(2, 'Muhammad Gilang Nur Khoiri', 'muhammad.gilang.n.k@gmail.com', '6e3142f9b011110d915a4bf63819f4678ac74164b1c9f693c3df1bea2e1eb57bdb97a83c8002a2f2fcc7332003b29124367834312cba483556889b33ef188d69', '08996264549'),
(3, 'Gilang', 'gilangkhoiri@yahoo.com', '6e3142f9b011110d915a4bf63819f4678ac74164b1c9f693c3df1bea2e1eb57bdb97a83c8002a2f2fcc7332003b29124367834312cba483556889b33ef188d69', '089938482');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `t_todo`
--
ALTER TABLE `t_todo`
  ADD PRIMARY KEY (`Todo_id`),
  ADD UNIQUE KEY `Todo_id` (`Todo_id`),
  ADD KEY `Todo_id_user` (`Todo_id_user`);

--
-- Indeks untuk tabel `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`User_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `t_todo`
--
ALTER TABLE `t_todo`
  MODIFY `Todo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `t_user`
--
ALTER TABLE `t_user`
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `t_todo`
--
ALTER TABLE `t_todo`
  ADD CONSTRAINT `t_todo_ibfk_1` FOREIGN KEY (`Todo_id_user`) REFERENCES `t_user` (`User_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
