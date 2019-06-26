--Criar Base de dados com o nome = 'dbo_onlinePlatformAMF'
--Metodo de codificar a palavra passe a utilizar é md5()

CREATE EXTENSION IF NOT EXISTS "uuid-ossp";

Create Table produto(
	guid VARCHAR PRIMARY KEY DEFAULT uuid_generate_v4(),
	reference VARCHAR NOT NULL UNIQUE,
	nome VARCHAR NOT NULL UNIQUE,
	descricao VARCHAR NOT NULL,	
	foto VARCHAR,
	price NUMERIC(5,2) NOT NULL DEFAULT 0,
	ativo BOOLEAN NOT NULL DEFAULT TRUE,
	regdate TIMESTAMP DEFAULT NOW()
);
--drop table produto

Create Table cliente(
	guid VARCHAR PRIMARY KEY DEFAULT uuid_generate_v4(),
	nrcliente SERIAL,
	nome VARCHAR NOT NULL,
	nif VARCHAR NOT NULL UNIQUE,
	morada VARCHAR,
	telefon VARCHAR,
	ativo BOOLEAN NOT NULL DEFAULT TRUE,
	regdate TIMESTAMP DEFAULT NOW()
);
--drop table empresa

Create Table utilizador(
	guid VARCHAR PRIMARY KEY DEFAULT uuid_generate_v4(),
	email VARCHAR NOT NULL UNIQUE,
	palavrapasse VARCHAR NOT NULL,
	nome VARCHAR,
	telefon VARCHAR,
	cliente VARCHAR NOT NULL REFERENCES cliente(guid), 
	permissao INTEGER NOT NULL DEFAULT 0,
	ativo BOOLEAN NOT NULL DEFAULT TRUE,
	regdate TIMESTAMP DEFAULT NOW()
);
--drop table utilizador

Create Table encomenda(
	guid VARCHAR PRIMARY KEY DEFAULT uuid_generate_v4(),
	dataencomenda TIMESTAMP DEFAULT NOW(),
	dataentrega TIMESTAMP NOT NULL,
	nrencomenda VARCHAR NOT NULL,
	responcavel VARCHAR NOT NULL REFERENCES utilizador(guid),
	cliente VARCHAR NOT NULL REFERENCES cliente(guid),
	ativo BOOLEAN NOT NULL DEFAULT TRUE,
	regdate TIMESTAMP DEFAULT NOW()
);
--drop table encomenda

--RELACIONAMENTO MUITOS PARA MUITOS

Create table enc_prod(
	encomenda VARCHAR REFERENCES encomenda(guid),
	produto VARCHAR REFERENCES produto(guid),
	tamanho INTEGER,
	qtd INTEGER NOT NULL,
	price DECIMAL NOT NULL DEFAULT 0.0 CHECK (price >= 0),
	ativo BOOLEAN NOT NULL DEFAULT TRUE,
	regdate TIMESTAMP DEFAULT (NOW()),
	PRIMARY KEY(encomenda, produto, tamanho)
);

Create table carrinha(
	guid VARCHAR PRIMARY KEY DEFAULT uuid_generate_v4(),
	username VARCHAR NOT NULL REFERENCES utilizador(guid),
	produto VARCHAR REFERENCES produto(guid),
	tamanho INTEGER,
	qtd INTEGER NOT NULL,
	price DECIMAL NOT NULL DEFAULT 0.0 CHECK (price >= 0),
	ativo BOOLEAN NOT NULL DEFAULT TRUE,
	regdate TIMESTAMP DEFAULT (NOW())
);
--drop table carrinha