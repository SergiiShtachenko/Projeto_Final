Create Table tipo(
	nrTipo SERIAL PRIMARY KEY,
	nomeTipo  VARCHAR NOT NULL,
	inativo BOOLEAN NOT NULL DEFAULT FALSE
);
--drop table tipo

Create Table tabelaPrecos(
	nrPrice SERIAL PRIMARY KEY,
	nomePrice VARCHAR NOT NULL,
	inativo BOOLEAN NOT NULL DEFAULT FALSE
);
--drop table tabelaPrecos

Create Table condPagamento(
	nrCond SERIAL PRIMARY KEY,
	nomeCond VARCHAR NOT NULL,
	descontoComercial DECIMAL DEFAULT 0.0 CHECK (descontoComercial >= 0.0 AND descontoComercial < 100.0),
	diasAtrasoMax INTEGER DEFAULT 0 CHECK (diasAtrasoMax >= 0),
	descontoFin DECIMAL DEFAULT 0.0 CHECK (descontoFin >= 0.0 AND descontoFin < 100.0),
	diasAtrasoDescFin INTEGER DEFAULT 0 CHECK (diasAtrasoDescFin >= 0 AND diasAtrasoDescFin <= diasAtrasoMax),
	inativo BOOLEAN NOT NULL DEFAULT FALSE	
);
--drop table condPagamento

Create Table produto(
	reference VARCHAR PRIMARY KEY,
	NomeProd VARCHAR NOT NULL,
	colecao VARCHAR,
	descricao VARCHAR,
	tamanhoMin INTEGER CHECK (tamanhoMin >= 0),
	tamanhoMax INTEGER CHECK (tamanhoMax > tamanhoMin),
	carateristicas VARCHAR,
	fotoLink VARCHAR,
	fichaLink VARCHAR,
	decalraçãoLink VARCHAR,
	videoLink VARCHAR,
	inativo BOOLEAN NOT NULL DEFAULT FALSE
);
--drop table produto

Create Table utilizador(
	IdUser VARCHAR PRIMARY KEY,
	email VARCHAR NOT NULL UNIQUE,
	palavraPasse VARCHAR NOT NULL,
	nomeuUser VARCHAR,
	carga VARCHAR,
	telefon VARCHAR,
	permissao INTEGER NOT NULL REFERENCES tipo(nrTipo),
	inativo BOOLEAN NOT NULL DEFAULT FALSE
);
--drop table utilizador

Create Table empresa(
	IdEmpr VARCHAR PRIMARY KEY,
	nrCliente VARCHAR NOT NULL UNIQUE,
	NomeEmpr VARCHAR NOT NULL,
	NIF VARCHAR NOT NULL UNIQUE,
	país VARCHAR,
	codPostal VARCHAR,
	cidade VARCHAR,
	rua VARCHAR,
	IBAN VARCHAR,
	SWIFT VARCHAR,
	comercial VARCHAR REFERENCES utilizador(IdUser),
	tabelaPreços INTEGER NOT NULL REFERENCES tabelaPrecos(nrPrice) DEFAULT 1,
	personalPrice INTEGER REFERENCES tabelaPrecos(nrPrice),
	condPagamento INTEGER NOT NULL REFERENCES condPagamento(nrCond) DEFAULT 1,
	inativo BOOLEAN NOT NULL DEFAULT FALSE
);
--drop table empresa

--Acrescentrar relação pertence (utilizador, empresa) N:1 t/p - utilizador associado a uma empresa
alter table utilizador
Add column pretence VARCHAR NOT NULL REFERENCES empresa(IdEmpr)


Create Table moradaEntrega(
	nrMrdEnt SERIAL PRIMARY KEY,
	país VARCHAR,
	codPostal VARCHAR,
	cidade VARCHAR,
	rua VARCHAR,
	cliente VARCHAR NOT NULL REFERENCES empresa(IdEmpr),
	inativo BOOLEAN NOT NULL DEFAULT FALSE
);
--drop table moradaEntrega

Create Table encomenda(
	IdEnc VARCHAR PRIMARY KEY,
	dataEncomenda TIMESTAMP NOT NULL,
	dataEntrega TIMESTAMP,
	nrEncomedaDoCliente VARCHAR NOT NULL,
	nrEncomendaInterna VARCHAR,
	responçavel VARCHAR NOT NULL REFERENCES utilizador(IdUser),
	empresa VARCHAR NOT NULL REFERENCES empresa(IdEmpr),
	moradaEntrega INTEGER NOT NULL REFERENCES moradaEntrega(nrMrdEnt),
	inativo BOOLEAN NOT NULL DEFAULT FALSE
);
--drop table encomenda

--RELACIONAMENTOS MUITOS PARA MUITOS
Create Table produtoPreço(
	reference VARCHAR REFERENCES produto(reference),
	tabelaPreços INTEGER REFERENCES tabelaPrecos(nrPrice),
	preço DECIMAL NOT NULL DEFAULT 0.0 CHECK (preço >= 0),	
	inativo BOOLEAN NOT NULL DEFAULT FALSE,
	PRIMARY KEY(reference, tabelaPreços)
);
--drop table produtoPreço

Create table encomendaProduto(
	encomenda VARCHAR REFERENCES encomenda(IdEnc),
	reference VARCHAR REFERENCES produto(reference),
	tamanho INTEGER,
	qtd INTEGER,
	preço DECIMAL NOT NULL DEFAULT 0.0 CHECK (preço >= 0),
	nomeProd VARCHAR,
	descrição VARCHAR,
	inativo BOOLEAN NOT NULL DEFAULT FALSE,
	PRIMARY KEY(encomenda, reference, tamanho)
);
--drop table encomendaProduto

Create Table telefonEmpresa(
	empresa VARCHAR REFERENCES empresa(IdEmpr),
	telefon VARCHAR,
	tipo VARCHAR,
	PRIMARY KEY(empresa, telefon),
	principal BOOLEAN NOT NULL DEFAULT TRUE,
	inativo BOOLEAN NOT NULL DEFAULT FALSE
);
--drop table telefonEmpresa