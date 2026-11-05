DROP TABLE IF EXISTS autores;
CREATE TABLE autores (
    id            INT UNSIGNED NOT NULL AUTO_INCREMENT,
    nome          VARCHAR(150) NOT NULL,
    nacionalidade VARCHAR(80)  NULL,
    sexo          ENUM('M','F','O') NULL,
    biografia     TEXT NULL,
    foto          VARCHAR(100) NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;