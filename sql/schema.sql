CREATE DATABASE IF NOT EXISTS studio_amanda CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE studio_amanda;

CREATE TABLE IF NOT EXISTS clientes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(120) NOT NULL,
  telefone VARCHAR(20),
  email VARCHAR(120),
  observacoes TEXT,
  criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS servicos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(120) NOT NULL,
  duracao_min INT NOT NULL,
  valor_padrao DECIMAL(10,2) NOT NULL,
  criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS pagamentos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  cliente_id INT NOT NULL,
  servico_id INT NOT NULL,
  valor DECIMAL(10,2) NOT NULL,
  forma_pagamento ENUM('dinheiro','pix','cartao_credito','cartao_debito') NOT NULL,
  status ENUM('pendente','pago','cancelado') DEFAULT 'pendente',
  data_pagamento DATE,
  observacoes TEXT,
  criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (cliente_id) REFERENCES clientes(id),
  FOREIGN KEY (servico_id) REFERENCES servicos(id)
);
