CREATE TABLE `nilai` (
    `id` int(11) NOT NULL,
    `nisn` varchar(15) NOT NULL,
    `nama` varchar(50) NOT NULL,
    `kelas` varchar(25) NOT NULL,
    `pweb` int(3) NOT NULL,
    `grafkom` int(3) NOT NULL,
    `jarkom` int(3) NOT NULL,
    `kb` int(3) NOT NULL,
    `ppl` int(3) NOT NULL
);

INSERT INTO `nilai` (`id`, `nisn`, `nama`, `kelas`, `pweb`, `grafkom`, `jarkom`, `kb`, `ppl`) VALUES
(1, '0005678113', 'Muhammad Faderik', 'XII MIA 2', 88, 90, 89, 80, 85),
(2, '0005678115', 'Dyandra Paramitha', 'XII MIA 3', 90, 70, 80, 87, 85),
(3, '0005678117', 'Nur Hidayati', 'XII MIA 7', 90, 85, 90, 84, 88);

ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nisn` (`nisn`);