CREATE DATABASE chaveamento;
USE chaveamento;

CREATE TABLE torneio(
    cd INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100)
);

CREATE TABLE esporte(
    cd INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100)
);

CREATE TABLE posicao(
    cd INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100),
    esporte INT,
    FOREIGN KEY (esporte) REFERENCES esporte (cd)
);

CREATE TABLE grupo(
    cd INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100),
    esporte INT,
    FOREIGN KEY (esporte) REFERENCES esporte (cd)
);

CREATE TABLE jogador(
    cd INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100),
    posicao INT,
    FOREIGN KEY (posicao) REFERENCES posicao (cd),
    grupo INT,
    FOREIGN KEY (grupo) REFERENCES grupo (cd)
);

