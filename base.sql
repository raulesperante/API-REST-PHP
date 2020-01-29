CREATE DATABASE db_almacenes;
USE db_almacenes;
CREATE TABLE productos(
ProductoId      int(255) primary key auto_increment not null,
Nombre          varchar(255) default 'Producto', 
Codigo          int(255) default 4,
Presentacion    varchar(100) default '1.5L',
Foto            varchar(255),
MarcaId         int(255) default 2,
FamiliaId       int(255) default 3,
Rating          int(255) default 5,
Estado          int(255) default 0,
AppMovil        int(255) default 0,
CreadorPor      varchar(255) default null
)ENGINE=InnoDb;
INSERT INTO productos (Foto) VALUES ('https://i.ibb.co/f180R8q/1.jpg');
INSERT INTO productos (Foto) VALUES ('https://i.ibb.co/YPxwn5T/2.jpg');
INSERT INTO productos (Foto) VALUES ('https://i.ibb.co/bWNKc08/3.jpg');
INSERT INTO productos (Foto) VALUES ('https://i.ibb.co/bvLSpTH/4.jpg');
INSERT INTO productos (Foto) VALUES ('https://i.ibb.co/80rqt35/5.jpg');
INSERT INTO productos (Foto) VALUES ('https://i.ibb.co/DQg0kB6/6.jpg');
INSERT INTO productos (Foto) VALUES ('https://i.ibb.co/KzTTXr1/7.jpg');
INSERT INTO productos (Foto) VALUES ('https://i.ibb.co/gvLP2Bd/8.jpg');
INSERT INTO productos (Foto) VALUES ('https://i.ibb.co/5cGtZ0g/9.jpg');
INSERT INTO productos (Foto) VALUES ('https://i.ibb.co/0GK5XXV/10.jpg');
INSERT INTO productos (Foto) VALUES ('https://i.ibb.co/WkqrN45/11.jpg');
INSERT INTO productos (Foto) VALUES ('https://i.ibb.co/4jhcZ3v/12.jpg');
INSERT INTO productos (Foto) VALUES ('https://i.ibb.co/0QBZ363/13.jpg');
INSERT INTO productos (Foto) VALUES ('https://i.ibb.co/dQjXdyr/14.jpg');