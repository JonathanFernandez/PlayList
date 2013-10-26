select m.nombre, mp.cod_playlist, p.code
											 from musica m 
											 inner join musicaplaylist mp on
												mp.cod_musica = m.code 
											 inner join playlist p on
												mp.cod_playlist = p.code
											 where p.code = 1;

select m.nombre, mp.cod_playlist, p.code
from musica m 
inner join musicaplaylist mp on
	mp.cod_musica = m.code 
inner join playlist p on
	mp.cod_playlist = p.code

select * from playlist

/*insert into musicaplaylist(cod_musica, cod_playlist)
select m.code,8
 
from musica m
insert into playlist(nombre,categoria, cod_privacidad, cod_usuario, fechaCreacion,fechaModificacion,cantidadReproducciones)
values('test2','aburridos',2,2,now(),now(),4);

insert into playlist(nombre,categoria, cod_privacidad, cod_usuario, fechaCreacion,fechaModificacion,cantidadReproducciones)
values('testcompartida1','aburridos',3,2,now(),now(),4),('testcompartida2','aburridos',3,2,now(),now(),4)
,('testcompartida13','aburridos',3,2,now(),now(),4),('testcompartida14','aburridos',3,2,now(),now(),4);

insert into musica(nombre, cod_genero,artista, path, album) values('fdsaf','18','dsafasdfas','../files/72cd70_chachacha - donato y estefano - y bailo183.mp3','adsfa');

select * from musica;

update usuario set pass = '81dc9bdb52d04dc20036dbd8313ed055';
 select * from usuario;
select * from musica;
select * from playList;

truncate genero;
insert into genero(genero)
values ('rock'),('pop'),('punk'),('salsa'),('bachata'),('merengue'),('reggeton'),('hip-hop'),('electronico')
,('heavy metal'),('rumba'),('reggae'),('blues'),('jazz'),('disco'),('tango'),('cumbia'),('otros');


select * from privacidad;

insert into privacidad(privacidad)
values('publica'),('privada'),('compartida')

insert into usuario(nombre, apellido,email, pass, alias, cod_tipoUsuario,fua)
values('jonathan','fernandez','jonathanerik.fernandez@gmail.com','1234','jonaAdmin',1,now()),
	('jonathan','fernandez','jonathan_28_05@hotmail.com','1234','jona',2,now());	
select * from  usuario


truncate tipousuario

insert into tipousuario(tipoUsuario)
values('administrador'),('normal')
*/
