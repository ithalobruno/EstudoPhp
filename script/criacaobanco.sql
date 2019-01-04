
  create table if not exists grupo(
        sqgrupo int auto_increment,
        grupo varchar(100),
        ativo int,
        administrador int,
        constraint pk_grupo primary key(sqgrupo)
      );

insert into grupo
(grupo, ativo, administrador)
values ('Administrador','1','1')
create table if not exists usuario
  (
    squsuario int auto_increment,
    usuario varchar(30),
    nmusuario  varchar(30),
    email varchar(30),
    senha varchar(32),
    sqgrupo int,
    ativo int,
    constraint fk_usuario_grupo foreign key(sqgrupo) references grupo(sqgrupo),
    constraint pk_usuario primary key(squsuario));

    INSERT INTO usuario
    (usuario, nmusuario, email, senha, sqgrupo, ativo)
    VALUES ('admin', 'Administrador do Sistema',
      'admin@admin.com.br', MD5('admin'),  1, 1);

    

      create table if not exists menu(
        sqmenu int auto_increment,
        ordem int,
        nome varchar(200),
        link varchar(500),
        nivelmenu int,
        temsubmenu int,
        submenu int,
        constraint pk_menu primary key(sqmenu)
      );


create table if not exists cliente(
sqcliente int auto_increment,
nome varchar(300),
tppessoa varchar(1),
cpf varchar(30),
datanascimento datetime,
sexo varchar(1),
email varchar(100),
celular varchar(15),
telefone varchar(15),
cep varchar(20),
endereco varchar(300),
numero varchar(10),
complemento varchar(100),
bairro varchar(300),
cidade varchar(300),
estado varchar(300),
pais varchar(300),
squsuarioalteracao int not null,
dataalteracao datetime,
constraint pk_cliente primary key(sqcliente),
constraint fk_cliente_usuario foreign key(squsuarioalteracao) references usuario(squsuario)
);

create table if not exists fornecedor(
sqfornecedor int auto_increment,
razaosocial varchar(300),
tppessoa varchar(1),
cpfcnpj varchar(30),
email varchar(100),
celular varchar(15),
telefone varchar(15),
cep varchar(20),
endereco varchar(300),
numero varchar(10),
complemento varchar(100),
bairro varchar(300),
cidade varchar(300),
estado varchar(300),
pais varchar(300),
squsuarioalteracao int not null,
dataalteracao datetime,
constraint pk_fornecedor primary key(sqfornecedor),
constraint fk_fornecedor_usuario foreign key(squsuarioalteracao) references usuario(squsuario)
);



insert into menu (nome, link, ordem, nivelmenu, temsubmenu, submenu,class) values ('Sistema', '#', 1, '1', '1','0','fa fa-cog');
select @menuprincipal := (select sqmenu from menu where nome = 'Sistema');

insert into menu (nome, link, ordem, nivelmenu, temsubmenu, submenu,class) values ('Menu', '?link=Cadmenu', 2, '2', '0',@menuprincipal,'fa fa-caret-square-o-down');
insert into menu (nome, link, ordem, nivelmenu, temsubmenu, submenu,class) values ('Grupo', '?link=Cadgrupo', 3, '2', '0',@menuprincipal,'fa fa-group');
insert into menu (nome, link, ordem, nivelmenu, temsubmenu, submenu,class) values ('Usuário', '?link=Cadusuario', 4, '2', '0',@menuprincipal,'fa fa-user');
insert into menu (nome, link, ordem, nivelmenu, temsubmenu, submenu,class) values ('Permissão', '?link=Cadpermissao', 5, '2', '0',@menuprincipal,'fa fa-gears');


insert into menu (nome, link, ordem, nivelmenu, temsubmenu, submenu,class) values ('Cadastros', '#', 1, '1', '1','0','fa fa-plus');


      create table if not exists permissao(
        sqpermissao int auto_increment,
        sqgrupo int not null,
        sqmenu int,
        ativo int,
        constraint pk_permissao primary key(sqpermissao),
        constraint fk_permissao_grupo foreign key(sqgrupo) references grupo(sqgrupo),
        constraint fk_permissao_menu foreign key(sqmenu) references menu(sqmenu));


        create view vwlistaMenusgrupos as
          (
            select menu.sqmenu, menu.nome, menu.link, grupo.sqgrupo, menu.class
            from menu, grupo
          );

          create view vwpermissao as
            (
              select m.sqmenu, m.sqgrupo, m.nome menu, m.link , ifnull(p.ativo,0) ativo
              from permissao p
              right join vwlistaMenusgrupos m
              on (m.sqmenu = p.sqmenu
                and m.sqgrupo = p.sqgrupo)
              );

              create view vwcarregamenu as
                (
                  select menu.sqmenu, menu.nome, menu.link, menu.temsubmenu, menu.nivelmenu, menu.submenu,
                  permissao.sqgrupo, menu.class
                  from menu, permissao
                  where menu.sqmenu = permissao.sqmenu
                  and permissao.ativo = 1
                  order by ordem, nivelmenu, submenu
                );
