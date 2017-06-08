insert into admins (login, senha) values ('admin', md5('admin'));

insert into estados (nome) values ('MG');

insert into cidades (nome, estado_id) values ('Belo Horizonte', 1);

insert into franqueados (nome, email, senha) values ('franq', 'franq@email.com', md5('franq'));

insert into gerentes (nome, email, senha) values ('gerente', 'gerente@email.com', md5('gerente'));

insert into restaurantes (nome, cnpj, valor_min, gerente_id, franqueado_id) values ('restaurante', '5413262', '10', 1, 1);

insert into atendentes (nome, email, senha, restaurante_id) values ('atendente', 'atendente@email.com', md5('atendente'), 1);

insert into clientes (nome, email, senha) values ('cliente', 'cliente@email.com', md5('cliente'));

insert into enderecos (rua, numero, bairro, cep, cidade_id) values ('rua franq', 1, 'bairro franq', '00000001', 1);

insert into enderecos (rua, numero, bairro, cep, cidade_id) values ('rua restaurante', 10, 'bairro restaurante', '00000002', 1);

insert into enderecos (rua, numero, bairro, cep, cidade_id) values ('rua cliente', 100, 'bairro cliente', '00000003', 1);

insert into franqueado_enderecos values (2,1);

insert into restaurante_enderecos values (1,2);

insert into cliente_enderecos values (1,3);

insert into produtos (nome, tipo, descricao, preco, foto, qtd_max_complemento, restaurante_id) values ('produto', 1, '<p>ratuaipnuis afhduasiofh uasio&nbsp;</p>', '10.5', NULL, '2', 1);

insert into pedidos (total, status, data, cliente_id, endereco_id, restaurante_id) VALUES (31.5, 0, sysdate(), 1, 4, 1);

INSERT INTO pedido_produtos (pedido_id, produto_id, qtd) VALUES (2, 1, 3);


select * from pedidos;