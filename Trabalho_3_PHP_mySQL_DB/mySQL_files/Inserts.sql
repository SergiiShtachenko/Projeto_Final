INSERT INTO produto(reference, nome, descricao, foto, price) VALUES('8A12.24', 'Mike', 'Sapato Mike S3 SRC Nobuck Prto', '8A1224.jpg', 32.50);
INSERT INTO produto(reference, nome, descricao, foto, price) VALUES('8A30.10', 'Chack', 'Sapato Chack S3 SRC Floper Prto', '8A3010.jpg', 32.50);

INSERT INTO cliente(nome, nif, morada, telefon) VALUES('AMF', '000000000', 'Nossa empresa', 'nosso telefon');
INSERT INTO cliente(nome, nif, morada, telefon) VALUES('CLiente 1', '500600700', 'Rua da Nada 22, Porto', '222333444');
INSERT INTO cliente(nome, nif, morada, telefon) VALUES('CLiente 2', '505700800', 'Rua da Tudo 11, Gaia', '253444555');

INSERT INTO utilizador(email, palavrapasse, nome, telefon, cliente, permissao) 
				VALUES('admin', md5('admin'), 'admin', 'n/a', (SELECT guid FROM cliente WHERE nome = 'AMF'), 1);
INSERT INTO utilizador(email, palavrapasse, nome, telefon, cliente, permissao)
				VALUES('user', md5('user'), 'admin', 'n/a', (SELECT guid FROM cliente WHERE nome = 'CLiente 1'), 0);




