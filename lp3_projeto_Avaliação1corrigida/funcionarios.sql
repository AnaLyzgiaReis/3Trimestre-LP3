-- 2. FUNCIONARIOS
DROP TABLE IF EXISTS `funcionarios`;
CREATE TABLE funcionarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cargo VARCHAR(60),
    salario DECIMAL(10,2),
    data_admissao DATE,
    observacoes TEXT,
    ativo BOOLEAN DEFAULT TRUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;