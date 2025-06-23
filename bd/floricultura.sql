DROP DATABASE IF EXISTS floricultura;
CREATE DATABASE floricultura;

USE floricultura;

CREATE TABLE usuario (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    sobrenome VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    senha VARCHAR(32) NOT NULL
);

CREATE TABLE flor (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    valor DECIMAL(10, 2) NOT NULL,
    descricao TEXT NOT NULL,
    imagem MEDIUMBLOB NOT NULL
);

CREATE TABLE carrinho (
    usuario_id BIGINT NOT NULL,
    flor_id BIGINT NOT NULL,
    quantidade INT NOT NULL DEFAULT 1,
    PRIMARY KEY (usuario_id, flor_id),
    FOREIGN KEY (usuario_id) REFERENCES usuario(id),
    FOREIGN KEY (flor_id) REFERENCES flor(id)
);