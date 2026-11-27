DROP TABLE IF EXISTS funcionarios;
CREATE TABLE funcionarios (
    id            INT AUTO_INCREMENT PRIMARY KEY,
    nome          VARCHAR(100) NOT NULL,
    cargo         VARCHAR(60)  NULL,
    salario       DECIMAL(10,2) NULL,
    data_admissao DATE         NULL,
    observacoes   TEXT         NULL,
    ativo         BOOLEAN      DEFAULT TRUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;