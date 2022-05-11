use cronos;
select publicada  from noticias where publicada=1;
select publicada  from noticias where publicada=0;
select count(distinct id_noticia ) from noticias;
select id_noticias  from noticias;
select * from noticias  where id_comunidad=1;
select * from comunidad;
select * from noticias where publicada=1 and titulo like '%%';
select * from noticias  where id_comunidad=1 and titulo like '%%';
select * from usuario;
select * from comunidad where usuario;
select * from  usuario inner join comunidad where id_comunidad;
#insert into  noticias(id_noticias ,id_comunidad,usuario,fecha,votos,imagen_portada,publicada,titulo,posiciones);
#delete from noticias where id_noticias=valor
#insert into comunidad(id_comunidad,fecha_creacion,usuario)
#insert into usuario(usuario,moderador,fecha_creacion,email,contraseña)
update noticias   set megusta=megusta+1 where id_noticias=0;
select  *from noticias  inner join comunidad where 'usuario';
