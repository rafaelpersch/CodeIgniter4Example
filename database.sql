CREATE TABLE usuarios (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL --MD5 checksum 
);


CREATE TABLE paises (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    codigo_ibge VARCHAR(255) NOT NULL
);
-- INSERT INTO paises (nome, codigo_ibge) VALUES ('BRASIL', '1058');


CREATE TABLE unidades_federativas (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    sigla VARCHAR(2) NOT NULL,
    codigo_ibge VARCHAR(255) NOT NULL
);
-- INSERT INTO unidades_federativas (sigla, nome) VALUES ('AC', 'Acre');
-- INSERT INTO unidades_federativas (sigla, nome) VALUES ('AL', 'Alagoas');
-- INSERT INTO unidades_federativas (sigla, nome) VALUES ('AP', 'Amapá');
-- INSERT INTO unidades_federativas (sigla, nome) VALUES ('AM', 'Amazonas');
-- INSERT INTO unidades_federativas (sigla, nome) VALUES ('BA', 'Bahia');
-- INSERT INTO unidades_federativas (sigla, nome) VALUES ('CE', 'Ceará');
-- INSERT INTO unidades_federativas (sigla, nome) VALUES ('ES', 'Espírito Santo');
-- INSERT INTO unidades_federativas (sigla, nome) VALUES ('GO', 'Goiás');
-- INSERT INTO unidades_federativas (sigla, nome) VALUES ('MA', 'Maranhão');
-- INSERT INTO unidades_federativas (sigla, nome) VALUES ('MT', 'Mato Grosso');
-- INSERT INTO unidades_federativas (sigla, nome) VALUES ('MS', 'Mato Grosso do Sul');
-- INSERT INTO unidades_federativas (sigla, nome) VALUES ('MG', 'Minas Gerais');
-- INSERT INTO unidades_federativas (sigla, nome) VALUES ('PA', 'Pará');
-- INSERT INTO unidades_federativas (sigla, nome) VALUES ('PB', 'Paraíba');
-- INSERT INTO unidades_federativas (sigla, nome) VALUES ('PR', 'Paraná');
-- INSERT INTO unidades_federativas (sigla, nome) VALUES ('PE', 'Pernambuco');
-- INSERT INTO unidades_federativas (sigla, nome) VALUES ('PI', 'Piauí');
-- INSERT INTO unidades_federativas (sigla, nome) VALUES ('RJ', 'Rio de Janeiro');
-- INSERT INTO unidades_federativas (sigla, nome) VALUES ('RN', 'Rio Grande do Norte');
-- INSERT INTO unidades_federativas (sigla, nome) VALUES ('RS', 'Rio Grande do Sul');
-- INSERT INTO unidades_federativas (sigla, nome) VALUES ('RO', 'Rondônia');
-- INSERT INTO unidades_federativas (sigla, nome) VALUES ('RR', 'Roraima');
-- INSERT INTO unidades_federativas (sigla, nome) VALUES ('SC', 'Santa Catarina');
-- INSERT INTO unidades_federativas (sigla, nome) VALUES ('SP', 'São Paulo');
-- INSERT INTO unidades_federativas (sigla, nome) VALUES ('SE', 'Sergipe');
-- INSERT INTO unidades_federativas (sigla, nome) VALUES ('TO', 'Tocantins');
-- INSERT INTO unidades_federativas (sigla, nome) VALUES ('DF', 'Distrito Federal');
-- INSERT INTO unidades_federativas (sigla, nome) VALUES ('EX', 'Exterior');


CREATE TABLE cidades (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    codigo_ibge VARCHAR(7) NOT NULL,
    unidade_federativa_id int,
    pais_id int NOT NULL,
    FOREIGN KEY (unidade_federativa_id) REFERENCES unidades_federativas(id),
    FOREIGN KEY (pais_id) REFERENCES paises(id)
);


CREATE TABLE enderecos (
    id SERIAL PRIMARY KEY,
    rua VARCHAR(255) NOT NULL,
    numero VARCHAR(255) NOT NULL,
    complemento VARCHAR(255) NOT NULL,
    cep VARCHAR(8) NOT NULL,
    cidade_id int NOT NULL,
    FOREIGN KEY (cidade_id) REFERENCES cidades(id)
);


CREATE TABLE pessoas (
    id SERIAL PRIMARY KEY,
    tipo_pessoa int NOT NULL, --ENUM
    nome VARCHAR(255) NOT NULL,
    nome_fantasia VARCHAR(255) NOT NULL,
    email VARCHAR(255),
    telefone VARCHAR(20),
    endereco_id INT,
    observacoes TEXT,
    FOREIGN KEY (endereco_id) REFERENCES enderecos(id)
);


CREATE TABLE contas_pagar_receber (
    id SERIAL PRIMARY KEY,
    numero int NOT NULL,
    parcela int NOT NULL,
    tipo_conta int NOT NULL, --ENUM 1=receber, 2=pagar
    descricao VARCHAR(255) NOT NULL,
    valor DECIMAL(10, 2) NOT NULL,
    data_vencimento DATE NOT NULL,
    data_pagamento DATE,
    pessoa_id int NOT NULL,
    status int NOT NULL,
    FOREIGN KEY (pessoa_id) REFERENCES pessoas(id)
);


CREATE TABLE contas_pagar_receber_baixas (
    id SERIAL PRIMARY KEY,
    conta_id int NOT NULL,
    valor DECIMAL(10, 2) NOT NULL,
    data_pagamento DATE NOT NULL,
    FOREIGN KEY (conta_id) REFERENCES contas_pagar_receber(id)
);
