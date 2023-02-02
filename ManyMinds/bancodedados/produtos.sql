SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `produto` varchar(255) NOT NULL,
  `colaborador` varchar(255) NOT NULL,
  `valido` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `produtos` (`id`, `produto`, `colaborador`, `valido`) VALUES
(1, 'Mouse', 'Francisco', 0),
(2, 'Teclado', 'Franklin', 0),
(3, 'Webcam', 'Fernando', 1),
(4, 'Monitor', 'Fernanda', 0),
(5, 'Gabinete', 'Francine', 1)

ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;
