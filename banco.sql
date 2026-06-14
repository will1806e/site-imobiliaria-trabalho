CREATE DATABASE IF NOT EXISTS imobiliaria
  DEFAULT CHARACTER SET utf8mb4
  DEFAULT COLLATE utf8mb4_unicode_ci;

USE imobiliaria;

CREATE TABLE IF NOT EXISTS imoveis (
  id INT AUTO_INCREMENT PRIMARY KEY,
  titulo VARCHAR(150) NOT NULL,
  descricao TEXT NOT NULL,
  tipo_imovel VARCHAR(60) NOT NULL,
  finalidade ENUM('Venda', 'Aluguel') NOT NULL,
  valor DECIMAL(12,2) NOT NULL,
  cidade VARCHAR(100) NOT NULL,
  bairro VARCHAR(100) NOT NULL,
  imagem VARCHAR(255) NOT NULL,
  criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS imovel_imagens (
  id INT AUTO_INCREMENT PRIMARY KEY,
  imovel_id INT NOT NULL,
  imagem VARCHAR(255) NOT NULL,
  criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_imovel_imagens_imovel
    FOREIGN KEY (imovel_id) REFERENCES imoveis(id)
    ON DELETE CASCADE
);

INSERT INTO imoveis (titulo, descricao, tipo_imovel, finalidade, valor, cidade, bairro, imagem)
SELECT 'Casa com 3 quartos', 'Casa ampla com area gourmet, garagem e excelente localizacao.', 'Casa', 'Venda', 450000.00, 'Barreiras', 'Centro', '../imagens/interior-of-living-room.png'
WHERE NOT EXISTS (SELECT 1 FROM imoveis);
