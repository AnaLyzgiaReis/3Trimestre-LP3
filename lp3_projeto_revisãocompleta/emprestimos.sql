ALTER TABLE usuarios MODIFY id INT UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE livros   MODIFY id INT UNSIGNED NOT NULL AUTO_INCREMENT;

DROP TABLE IF EXISTS emprestimos;
CREATE TABLE emprestimos (
    id              INT UNSIGNED NOT NULL AUTO_INCREMENT,
    id_livro        INT UNSIGNED NOT NULL,
    id_usuario      INT UNSIGNED NOT NULL,
    data_emprestimo DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    data_devolucao  DATE NULL,
    status          ENUM('emprestado','devolvido','atrasado') NOT NULL DEFAULT 'emprestado',
    PRIMARY KEY (id),
    KEY idx_emp_livro (id_livro),
    KEY idx_emp_usuario (id_usuario),
    CONSTRAINT fk_emp_livro   FOREIGN KEY (id_livro)   REFERENCES livros(id)   ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT fk_emp_usuario FOREIGN KEY (id_usuario) REFERENCES usuarios(id) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;