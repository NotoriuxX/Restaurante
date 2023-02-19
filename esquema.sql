
use Restaurant;

create table tipousuario(
    id_tipo int not null AUTO_INCREMENT,
    nom_tipo varchar(20) not null,
    primary key (id_tipo)
);
create table usuarios(
    id_usu int not null AUTO_INCREMENT,	
    nom_usu varchar(20) not null,
    email_usu varchar(50) not null,
    direc_usu varchar (100) not null,
    pass_usu varchar (150) not null,
    id_tipo int not null,
    primary key (id_usu),
    foreign key (id_tipo) references tipousuario (id_tipo)

);
create table categoria (
    id_cate int not null AUTO_INCREMENT,
    nom_cate varchar(20) not null,
    primary key (id_cate)
);

create table productos(
    id_pro int not null AUTO_INCREMENT,
    nom_pro varchar(30) not null,
    stock_pro int not null,
    prec_pro int not null,
    img_pro varchar(40) not null,
    id_cate int not null,
    descripcion VARCHAR(1024) NOT NULL,
    primary key (id_pro),
    foreign key (id_cate) references categoria (id_cate)
);

CREATE TABLE IF NOT EXISTS carrito_usuarios(
    id_sesion VARCHAR(255) NOT NULL,
    id_producto BIGINT UNSIGNED NOT NULL,
    FOREIGN KEY (id_producto) REFERENCES productos(id)
    ON UPDATE CASCADE ON DELETE CASCADE
);


create table carrito(
    id_carri int not null AUTO_INCREMENT,
    id_usu int not null,
    id_pro int not null,
    primary key(id_carri),
    foreign key (id_usu) references usuarios(id_usu),
    foreign key (id_pro ) references productos(id_pro)
);

create table Pago(
    id_Pago int not null AUTO_INCREMENT, 
    ClaveTransaccion VARCHAR(255) not null, 
    PaypalDatos text not null, 
    fecha datetime not null, 
    correo varchar(500) not null, 
    direccion varchar(100) not null, 
    celular varchar(100) not null, 
    total decimal(60.2) not null, 
    status varchar(200) not null, 
    primary key (id_Pago) );

create table encargos (
    id_pedido int not null AUTO_INCREMENT,
    id_sesion varchar(50) not null ,
    nombre varchar(50) not null ,
    correo varchar(50) not null ,
    direccion varchar(100) not null ,
    celular int not null,
    formapago varchar(50) not null ,
    nom_producto varchar(50) not null ,
    canti_producto int not null,
    precio int not null,
    primary key (id_pedido)
);



Insert into tipousuario values(1,'Admin');
Insert into tipousuario values(2,'Cliente');

Insert into usuarios values (1,'Luis Perez','luis.perez16@farmaplus.cl','los espino 160','Goku123',1);
Insert into usuarios values (2,'Alex Correa','alex.correa17@farmaplus.cl','calle','Rene123',2);

Insert into categoria values (1,'Postres');
Insert into categoria values (2,'Ensalada');
Insert into categoria values (3,'Almuerzos');

    INSERT INTO productos values (null,"Crepas Italana", 10,19000,"IMG/Crepas.jpg", 4, "chepas a la italiana con rico chocolate belga y clatanos africanos");
    INSERT INTO productos values (null,"mariscos", 10,12300,"IMG/nosequees.jpg", 4, "chepas a la italiana con rico chocolate belga y clatanos africanos");
    INSERT INTO productos values (null,"Caracoles a la espinaca", 10,15900,"IMG/Caracoles.jpg", 4, "caracoles salteados Reseta Italiana");
    INSERT INTO productos values (null,"costillar de cerdo", 10,22000,"IMG/exquisita-comida-fina.jpg", 4, "costilla de cerdo con salsa BBQ con papas fretas y huevos");
    INSERT INTO productos values (null,"Yogurt Griego Con Semillas y Fresas", 10,3900,"IMG/Postre_franbueza.png", 1, "Postre de yogurt con mermeladas y avanas con fresas seleccionadas");
    INSERT INTO productos values (null,"Garvanzos con nueces", 10,9900,"IMG/garbanzos.png", 4, "Equicita sopa de garvanzos con nueces elavorada especialmenta para todos los que tengas un paladar fino");



Insert into carrito values (1,'2','2');

Insert into pedidos values (1,'1',21000);