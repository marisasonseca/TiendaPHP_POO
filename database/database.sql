CREATE DATABASE tienda_master;
use tienda_master;

CREATE TABLE usuarios
(
    id              int(50) auto_increment not null,
    name            varchar(100) not null,
    lastName        varchar(100) null,
    email           varchar(100) not null,
    password        varchar(100) not null,
    type            varchar(50)  null,
    image           varchar(255) null,
    CONSTRAINT pk_usuarios PRIMARY KEY(id),
    CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDb;

INSERT INTO usuarios VALUES (NULL, 'Admin', 'Admin', 'admin@admin.com', 'password', 'admin', null);

CREATE TABLE categorias
(
    id              int(50) auto_increment not null,
    name            varchar(100) not null,
    CONSTRAINT pk_categorias PRIMARY KEY(id)
)ENGINE= InnoDb;

INSERT INTO categorias VALUES (null, 'Manga corta');
INSERT INTO categorias VALUES (null, 'Tirantes');
INSERT INTO categorias VALUES (null, 'Manga larga');
INSERT INTO categorias VALUES (null, 'Sudaderas');


CREATE TABLE productos
(
    id              int(50) auto_increment not null,
    id_categoria    int(50) not null,
    name            varchar(100) not null,
    description     TEXT null,
    price           float(100, 2) not null,
    stock           int(50)  null,
    ofert           varchar(2) null,
    date            date not null,
    image           varchar(255) null,
    CONSTRAINT pk_productos PRIMARY KEY(id),
    CONSTRAINT fk_producto_categoria FOREIGN KEY(id_categoria) REFERENCES categorias(id)
)ENGINE=InnoDb;

CREATE TABLE pedidos
(
    id              int(50) auto_increment not null,
    id_usuario      int(50) not null,
    province        varchar(255) not null,
    location        varchar(255) not null,
    address         varchar(255) not null,
    cost            float(200, 2) not null,
    state           varchar(20) not null,
    date            date null,
    hour            time null,
    CONSTRAINT pk_pedidos PRIMARY KEY(id),
    CONSTRAINT fk_pedido_usuario FOREIGN KEY(id_usuario) REFERENCES usuarios(id)
)ENGINE=InnoDb;

CREATE TABLE lineas_pedidos
(   
    id              int(50) auto_increment not null,
    id_pedido       int(50) not null,
    id_producto     int(50) not null,
    CONSTRAINT pk_lineas_pedidos PRIMARY KEY(id),
    CONSTRAINT fk_lineas_pedido FOREIGN KEY(id_pedido) REFERENCES pedidos(id),
    CONSTRAINT fk_lineas_producto FOREIGN KEY(id_producto) REFERENCES productos(id)
)ENGINE=InnoDb;