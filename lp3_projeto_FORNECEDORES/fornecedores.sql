DROP TABLE IF EXISTS fornecedores;
CREATE TABLE fornecedores (
    id             INT UNSIGNED NOT NULL AUTO_INCREMENT,
    razao_social   VARCHAR(150) NOT NULL,
    cnpj           VARCHAR(18)  NOT NULL,
    email          VARCHAR(100) NULL,
    telefone       VARCHAR(20)  NULL,
    endereco       VARCHAR(255) NULL,
    cidade         VARCHAR(100) NULL,
    uf             CHAR(2)      NULL,
    valor_contrato DECIMAL(15,2) NULL,
    data_cadastro  DATE         NULL,
    observacoes    TEXT         NULL,
    PRIMARY KEY (id),
    UNIQUE KEY uk_fornecedores_cnpj (cnpj)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;