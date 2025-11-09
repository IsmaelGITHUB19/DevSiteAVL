-- Criação do banco de dados
CREATE DATABASE IF NOT EXISTS sitedb;
USE sitedb;

-- Tabela CLIENTE
CREATE TABLE IF NOT EXISTS CLIENTE(
    ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    NOME VARCHAR(50) NOT NULL,
    CPF CHAR(11) NOT NULL,
    EMAIL VARCHAR(50)
);

-- Tabela FUNCIONARIO
CREATE TABLE IF NOT EXISTS FUNCIONARIO (
    ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    NOME VARCHAR(50) NOT NULL,
    CPF CHAR(11) NOT NULL,
    EMAIL VARCHAR(50),
    CARGO VARCHAR(30) NOT NULL,
    ENDERECO VARCHAR(100) NOT NULL
);

-- Tabela USUARIO
CREATE TABLE IF NOT EXISTS USUARIO(
     ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
     SENHA VARCHAR(255),
     FUNCIONARIO_ID INT,
     FOREIGN KEY (FUNCIONARIO_ID) REFERENCES FUNCIONARIO(ID) ON DELETE CASCADE
);

-- Tabela PRODUTO
CREATE TABLE IF NOT EXISTS PRODUTO (
    CODIGO INT NOT NULL PRIMARY KEY,
    DESCRICAO VARCHAR(50) NOT NULL,
    VALOR DECIMAL(10,2) NOT NULL
);

-- Tabela VENDA
CREATE TABLE IF NOT EXISTS VENDA (
    ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    PAGAMENTO VARCHAR(20) NOT NULL, 
    PRODUTO_CODIGO INT,
    CLIENTE_ID INT, 
    FOREIGN KEY (PRODUTO_CODIGO) REFERENCES PRODUTO(CODIGO) ON DELETE CASCADE,
    FOREIGN KEY (CLIENTE_ID) REFERENCES CLIENTE(ID) ON DELETE CASCADE
);

-- Tabela AVALIACAO
CREATE TABLE IF NOT EXISTS AVALIACAO(
    ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    NOTA INT NOT NULL,
    OPN VARCHAR(100) NOT NULL,
    NOME_CLIENTE VARCHAR(50),
    ID_CLIENTE INT NOT NULL,
    FOREIGN KEY (ID_CLIENTE) REFERENCES CLIENTE(ID) ON DELETE CASCADE
);
/*

-- Inserts de produtos
INSERT INTO PRODUTO(CODIGO, DESCRICAO, VALOR)
VALUES
('47221','Política - Aristóteles', 50.99),
('320340','Apologia a Sócrates - Platão', 30.99),
('332394','Retórica - Aristóteles', 20.50),
('26524','Sobre a brevidade da vida - Sêneca', 43.89),
('78865','O Príncipe - Maquiavel', 33.54),
('04303','Metafísica - Aristóteles', 45.32);

-- Inserts de clientes
INSERT INTO CLIENTE (nome, cpf, email)
VALUES
('Maria Fernanda Oliveira', '12345678900', 'maria.oliveira@email.com'),
('João Pedro Silva', '98765432100', 'joao.silva@email.com'),
('Ana Beatriz Souza', '45678912311', 'ana.souza@email.com'),
('Carlos Eduardo Lima', '32165498722', 'carlos.lima@email.com'),
('Fernanda Alves Rocha', '15975348633', 'fernanda.rocha@email.com'),
('Lucas Henrique Martins', '75395185244', 'lucas.martins@email.com'),
('Juliana Castro Pereira', '25836914755', 'juliana.pereira@email.com'),
('Rafael Nogueira Santos', '36925814766', 'rafael.santos@email.com'),
('Camila Ribeiro Costa', '74185296377', 'camila.costa@email.com'),
('Bruno Almeida Torres', '85274196388', 'bruno.torres@email.com');

-- Inserts de funcionários e usuários
INSERT INTO FUNCIONARIO (NOME, CPF, EMAIL, CARGO, ENDERECO) VALUES
('Felipe Marcelo', '07575490981', 'MarceloProfessor@hotmail.com', 'Desenvolvedor', 'Rua da UTFPR'),
('Ana Beatriz Souza', '21458930762', 'ana.souza@gmail.com', 'Analista de Sistemas', 'Rua das Acácias, 120'),
('João Pedro Lima', '35974128650', 'joao.lima@outlook.com', 'Técnico de Informática', 'Av. Brasil, 405'),
('Camila Ribeiro Costa', '48795231608', 'camila.costa@gmail.com', 'Designer UX/UI', 'Rua Curitiba, 89'),
('Rafael Nogueira Santos', '52687419307', 'rafael.santos@empresa.com', 'Gerente de Projetos', 'Rua das Flores, 512'),
('Mariana Alves Rocha', '69321547890', 'mariana.rocha@hotmail.com', 'Desenvolvedora Front-End', 'Rua Paraná, 220'),
('Carlos Eduardo Martins', '84561970325', 'carlos.martins@gmail.com', 'Administrador de Redes', 'Rua dos Ipês, 75'),
('Juliana Castro Pereira', '97842615304', 'juliana.pereira@outlook.com', 'Analista de Banco de Dados', 'Rua Dom Pedro II, 318'),
('Lucas Henrique Torres', '13254789066', 'lucas.torres@gmail.com', 'Desenvolvedor Back-End', 'Rua São Paulo, 104'),
('Fernanda Oliveira Lima', '25487963107', 'fernanda.lima@hotmail.com', 'Suporte Técnico', 'Av. Toledo, 302');

INSERT INTO USUARIO (SENHA, FUNCIONARIO_ID)
VALUES
(MD5('2025'), 1),
(MD5('2025'), 2),
(MD5('2025'), 3),
(MD5('2025'), 4),
(MD5('2025'), 5),
(MD5('2025'), 6),
(MD5('2025'), 7),
(MD5('2025'), 8),
(MD5('2025'), 9),
(MD5('2025'), 10);

-- Inserts de vendas
INSERT INTO VENDA (PAGAMENTO, PRODUTO_CODIGO, CLIENTE_ID)
VALUES
('Pix',47221, 3),
('Cartão - Crédito',332394,4),
('Pix',26524, 5),
('Boleto', 26524,6),
('Cartão - Crédito', 78865,7),
('Pix',78865, 8);

-- Inserts de avaliações 
INSERT INTO AVALIACAO (NOTA, OPN, NOME_CLIENTE, ID_CLIENTE)
VALUES
(5, 'Produto excelente, superou minhas expectativas!', 'Maria Fernanda Oliveira', 1),
(4, 'Bom produto, entrega rápida.', 'João Pedro Silva', 2),
(3, 'Produto ok, mas poderia ser melhor.', 'Ana Beatriz Souza', 3);


*/ 
