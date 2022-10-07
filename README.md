banco de dados republicas
CREATE DATABASE republicas;


create table login(
 id_usuario INT NOT NULL PRIMARY KEY AUTO_INCREMENT
 login varchar(50) NOT NULL,
 senha varchar(50) NOT NULL,
 nome varchar(50)


);




create table info_m
(
	id_matricula INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	matricula int not null,
	apartamento int not null,
	bloco int not null,
	numero_de_pessoas int not null,
	sexo varchar(50),
	f_id_usuario int not null,
	FOREIGN KEY(f_id_usuario) references login(id_usuario)
);


create table images
(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	imagens varchar(255) not null,
	nomes varchar(240) not null,
	id_usuarioD int not null,
	id_imagem int not null,
	FOREIGN KEY(id_isuarioD) references login(id_usuario)
	FOREIGN KEY(id_imagem) references info_m(id_matricula)
);

