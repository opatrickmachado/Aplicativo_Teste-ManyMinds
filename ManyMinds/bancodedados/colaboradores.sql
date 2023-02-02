SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `colaboradores` (
  `id` int(11) NOT NULL,
  `nomeColaborador` varchar(255) NOT NULL,
  `fornecedor` tinyint(1) NOT NULL,
  `valido` tinyint(1) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `celular` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `colaboradores` (`id`, `nomeColaborador`, `fornecedor`, `valido`, `email`, `cidade`, `estado`, `celular`) VALUES
(1, 'Patrick', 1, 1, 'opatrickmachado@gmail.com', 'Santa Isabel', 'São Paulo', '11973248818'),
(2, 'Angelica', 1, 1, 'minhanoiva@gmail.com', 'Jacareí', 'São Paulo', '12900000000'),
(3, 'Simara', 1, 1, 'minhamae@gmail.com', 'Ferraz', 'São Paulo', '11900000000'),
(4, 'Claudio', 1, 0, 'meupai@gmail.com', 'Santa Isabel', 'São Paulo', '11900000000');
(5, 'Vanda', 0, 0, 'minhavo@gmail.com', 'Santa Isabel', 'São Paulo', '11900000000');

ALTER TABLE `colaboradores`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `colaboradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

