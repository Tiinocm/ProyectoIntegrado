use cronos;
#1
select * from noticias where publicada=1;
#2
select *  from noticias where publicada=0;
#3
select count(id_noticia) from noticias WHERE usuario = "";
#4
select *  from noticias where usuario = "";
#5
select * from noticias  where id_comunidad=1;
#6
select * from comunidad;
#7
select * from noticias where publicada=1 and titulo like '%%';
#8
select * from comunidad  where nombre like '%%';
select * from usuario;
select * from comunidad where usuario = "";
select usuario.* from  usuario inner join comunidad where id_comunidad = "";
#insert into  noticias(id_noticias ,id_comunidad,usuario,fecha,votos,imagen_portada,publicada,titulo,posiciones);
#delete from noticias where id_noticias=valor
#insert into comunidad(id_comunidad,fecha_creacion,usuario)
#insert into usuario(usuario,moderador,fecha_creacion,email,contraseña)
update noticias   set megusta=megusta+1 where id_noticias=0;
select  *from noticias  inner join comunidad where 'usuario';
