DROP TABLE IF EXISTS editoras;
CREATE TABLE editoras (
    id       INT UNSIGNED NOT NULL AUTO_INCREMENT,
    nome     VARCHAR(120) NOT NULL,
    cidade   VARCHAR(100) NULL,
    site     VARCHAR(150) NULL,
    PRIMARY KEY (id),
    UNIQUE KEY uk_editoras_nome (nome)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;