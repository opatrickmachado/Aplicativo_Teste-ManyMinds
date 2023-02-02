SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `usuarios` (
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `usuarios` (`usuario`, `senha`) VALUES
('admin', '@dm!n#99'),
('opatrickmachado', '$ol&t@');

ALTER TABLE `usuarios`
  ADD UNIQUE KEY `usuario` (`usuario`);
COMMIT;