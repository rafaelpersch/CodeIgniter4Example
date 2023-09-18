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
-- INSERT INTO unidades_federativas (sigla, nome, codigo_ibge) VALUES ('AC', 'Acre', '12');
-- INSERT INTO unidades_federativas (sigla, nome, codigo_ibge) VALUES ('AL', 'Alagoas', '27');
-- INSERT INTO unidades_federativas (sigla, nome, codigo_ibge) VALUES ('AP', 'Amapá', '16');
-- INSERT INTO unidades_federativas (sigla, nome, codigo_ibge) VALUES ('AM', 'Amazonas', '13');
-- INSERT INTO unidades_federativas (sigla, nome, codigo_ibge) VALUES ('BA', 'Bahia', '29');
-- INSERT INTO unidades_federativas (sigla, nome, codigo_ibge) VALUES ('CE', 'Ceará', '23');
-- INSERT INTO unidades_federativas (sigla, nome, codigo_ibge) VALUES ('ES', 'Espírito Santo', '32');
-- INSERT INTO unidades_federativas (sigla, nome, codigo_ibge) VALUES ('GO', 'Goiás', '52');
-- INSERT INTO unidades_federativas (sigla, nome, codigo_ibge) VALUES ('MA', 'Maranhão', '21');
-- INSERT INTO unidades_federativas (sigla, nome, codigo_ibge) VALUES ('MT', 'Mato Grosso', '51');
-- INSERT INTO unidades_federativas (sigla, nome, codigo_ibge) VALUES ('MS', 'Mato Grosso do Sul', '50');
-- INSERT INTO unidades_federativas (sigla, nome, codigo_ibge) VALUES ('MG', 'Minas Gerais', '31');
-- INSERT INTO unidades_federativas (sigla, nome, codigo_ibge) VALUES ('PA', 'Pará', '15');
-- INSERT INTO unidades_federativas (sigla, nome, codigo_ibge) VALUES ('PB', 'Paraíba', '25');
-- INSERT INTO unidades_federativas (sigla, nome, codigo_ibge) VALUES ('PR', 'Paraná', '41');
-- INSERT INTO unidades_federativas (sigla, nome, codigo_ibge) VALUES ('PE', 'Pernambuco', '26');
-- INSERT INTO unidades_federativas (sigla, nome, codigo_ibge) VALUES ('PI', 'Piauí', '22');
-- INSERT INTO unidades_federativas (sigla, nome, codigo_ibge) VALUES ('RJ', 'Rio de Janeiro', '33');
-- INSERT INTO unidades_federativas (sigla, nome, codigo_ibge) VALUES ('RN', 'Rio Grande do Norte', '24');
-- INSERT INTO unidades_federativas (sigla, nome, codigo_ibge) VALUES ('RS', 'Rio Grande do Sul', '43');
-- INSERT INTO unidades_federativas (sigla, nome, codigo_ibge) VALUES ('RO', 'Rondônia', '11');
-- INSERT INTO unidades_federativas (sigla, nome, codigo_ibge) VALUES ('RR', 'Roraima', '14');
-- INSERT INTO unidades_federativas (sigla, nome, codigo_ibge) VALUES ('SC', 'Santa Catarina', '42');
-- INSERT INTO unidades_federativas (sigla, nome, codigo_ibge) VALUES ('SP', 'São Paulo', '35');
-- INSERT INTO unidades_federativas (sigla, nome, codigo_ibge) VALUES ('SE', 'Sergipe', '28');
-- INSERT INTO unidades_federativas (sigla, nome, codigo_ibge) VALUES ('TO', 'Tocantins', '17');
-- INSERT INTO unidades_federativas (sigla, nome, codigo_ibge) VALUES ('DF', 'Distrito Federal', '53');
-- INSERT INTO unidades_federativas (sigla, nome, codigo_ibge) VALUES ('EX', 'Exterior', '');


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
