# AMIBOT

proyecto de arq sistemas

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

Base de datos: `amibot`

CREATE TABLE `usuario` (
`id_usuario` int(100) NOT NULL,
`nombre_usuario` varchar(20) NOT NULL,
`contraseña_usuario` varchar(20) NOT NULL,
`estado_usuario` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `contraseña_usuario`, `estado_usuario`) VALUES
(1, 'Matias', '1234', 1),
(2, 'Nicolas Micieli', '4321', 0);

ALTER TABLE `usuario`
ADD PRIMARY KEY (`id_usuario`);

ALTER TABLE `usuario`
MODIFY `id_usuario` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;
