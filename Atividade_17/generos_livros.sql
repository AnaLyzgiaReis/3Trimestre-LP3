-- 1) Gêneros
DROP TABLE IF EXISTS livros;   -- apaga antes por causa da FK
DROP TABLE IF EXISTS generos;

CREATE TABLE generos (
    id        INT UNSIGNED NOT NULL AUTO_INCREMENT,
    nome      VARCHAR(100) NOT NULL,
    descricao VARCHAR(255) NULL,
    PRIMARY KEY (id),
    UNIQUE KEY uk_generos_nome (nome)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 2) Livros
CREATE TABLE livros (
    id               INT UNSIGNED NOT NULL AUTO_INCREMENT,
    titulo           VARCHAR(200) NOT NULL,
    autor            VARCHAR(150) NOT NULL,
    isbn             VARCHAR(20)  NULL,
    ano_publicacao   SMALLINT UNSIGNED NULL,
    sinopse          TEXT NULL,
    capa             VARCHAR(255) NULL,
    id_genero        INT UNSIGNED NULL,
    criado_em        TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    UNIQUE KEY uk_livros_isbn (isbn),
    KEY idx_livros_genero (id_genero),
    CONSTRAINT fk_livros_genero
        FOREIGN KEY (id_genero) REFERENCES generos (id)
        ON UPDATE CASCADE
        ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;