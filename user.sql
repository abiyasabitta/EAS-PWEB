CREATE TABLE `user` (
    `id` int(11) NOT NULL,
    `nama` varchar(64) NOT NULL,
    `email` varchar(32) NOT NULL,
    `psswd` varchar(255) NOT NULL,
    `status` varchar(10) NOT NULL
    PRIMARY KEY (`id`)
);

INSERT INTO `user` (`id`, `nama`, `email`, `psswd`, `status`) VALUES
(1, 'abit', 'abit@abit.com', 'abit', 'Student'),
(2, 'admin', 'admin@admin.com', 'admin', 'Admin'),
(3, 'dias', 'dias@dias.com', 'dias', 'Teacher'),
(4, 'aulia', 'aulia@aulia.com', 'aulia', 'Student'),
(5, 'thalib', 'thalib@thalib.com', 'thalib', 'Student');