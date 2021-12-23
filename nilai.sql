CREATE TABLE `nilai` (
    `id` int(11) NOT NULL,
    `nisn` varchar(15) NOT NULL,
    `nama` varchar(50) NOT NULL,
    `kelas` varchar(25) NOT NULL,
    `agama` int(3) NOT NULL,
    `ipa` int(3) NOT NULL,
    `ips` int(3) NOT NULL,
    `matematika` int(3) NOT NULL,
    `bahasaIndonesia` int(3) NOT NULL,
    `bahasaInggris` int(3) NOT NULL,
    `penjas` int(3) NOT NULL,
);

INSERT INTO `nilai` (`id`, `nisn`, `nama`, `kelas`, `agama`, `ipa`, `ips`, `matematika`, `bahasaIndonesia`, `bahasaInggris`, `penjas`) VALUES
(1, '0005678113', 'Muhammad Faderik', 'XII MIA 2', 88, 90, 89, 80, 85, 80, 80),
(2, '0005678115', 'Dyandra Paramitha', 'XII MIA 3', 90, 70, 80, 87, 85, 83, 80),
(3, '0005678117', 'Nur Hidayati', 'XII MIA 7', 90, 85, 90, 84, 88, 80, 90);

ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nisn` (`nisn`);