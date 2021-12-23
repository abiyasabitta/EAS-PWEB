CREATE TABLE `jadwal` (
    `id` int(11) NOT NULL,
    `id_siswa` int(11) NOT NULL,
    `jam` TIME NOT NULL,
    `jam_selesai` TIME NOT NULL,
    `hari` varchar(10) NOT NULL,
    `dosen` varchar(50) NOT NULL,
    `kelas` varchar(50) NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`id_siswa`) REFERENCES user(`id`)
);

INSERT INTO `jadwal` (`id`, `id_siswa`, `jam`, `jam_selesai`, `hari`, `dosen`, `kelas`) VALUES
(1, 1, TIME("10:00:00"), TIME("12:00:00"), 'SENIN', 'Pak Ajax', 'Pemrograman Web'),
(2, 1, TIME("13:00:00"), TIME("15:00:00"), 'SENIN', 'Bu Threejs', 'Grafika'),
(3, 1, TIME("10:00:00"), TIME("12:00:00"), 'SELASA', 'Pak Apache', 'Jaringan'),
(4, 1, TIME("16:00:00"), TIME("18:00:00"), 'RABU', 'Bu Tree', 'Kecerdasan Buatan'),
(5, 1, TIME("10:00:00"), TIME("12:00:00"), 'KAMIS', 'Pak Kohesi', 'Software'),
(6, 4, TIME("10:00:00"), TIME("12:00:00"), 'SENIN', 'Pak Ajax', 'Pemrograman Web')


