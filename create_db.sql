CREATE DATABASE IF NOT EXISTS `inventario` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `inventario`;

CREATE TABLE IF NOT EXISTS `productos` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nombre` VARCHAR(255) NOT NULL,
  `precio` DECIMAL(10,2) NOT NULL DEFAULT 0.00,
  `cantidad` INT NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `productos` (`nombre`, `precio`, `cantidad`) VALUES
("Lapicero", 0.50, 100),
("Cuaderno", 1.75, 50),
("Boligrafo", 0.80, 200)
ON DUPLICATE KEY UPDATE nombre=VALUES(nombre);

