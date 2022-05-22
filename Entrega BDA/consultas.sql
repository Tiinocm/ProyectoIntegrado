#trigger (sirve para que el css detecte la imagen)

DELIMITER $$
CREATE TRIGGER `quotationInImg_BI` BEFORE INSERT ON `noticias` FOR EACH ROW BEGIN
	set new.imagen_portada = CONCAT('"', new.imagen_portada, '"');
END
$$
DELIMITER ;

#consultas usadas desde PHP

SELECT noticias.id_noticia, comunidad.nombre, noticias.usuario, noticias.fecha, noticias.votos, noticias.imagen_portada, noticias.publicidad, noticias.titulo, noticias.plantilla from noticias
inner join comunidad on noticias.id_comunidad = comunidad.id_comunidad
where publicidad = 1 ORDER BY votos DESC;

SELECT plantilla from noticias WHERE id_noticia = $id; #$id equivale al id de la noticia que se quiera encontrar cada vez que se ejecuta la sentencia


# Las siguientes dos sentencia se usan en el mismo momento pero cambia la plantilla que se utiliza en función de la noticia
SELECT fecha, 
(SELECT comunidad.nombre from comunidad where comunidad.id_comunidad = noticias.id_comunidad) AS nombre_comunidad,
usuario, votos, imagen_portada, titulo, plantilla, plantilla0.titulo1, plantilla0.parrafo1, plantilla0.img1, plantilla0.titulo2, plantilla0.parrafo2, plantilla0.img2
FROM `noticias`
INNER JOIN plantilla0 on noticias.id_noticia = plantilla0.id_noticia
WHERE noticias.id_noticia = $id; #$id equivale al id de la noticia que se quiera encontrar cada vez que se ejecuta la sentencia

SELECT fecha, 
(SELECT comunidad.nombre from comunidad where comunidad.id_comunidad = noticias.id_comunidad) AS nombre_comunidad,
usuario, votos, imagen_portada, titulo, plantilla, plantilla1.titulo1, plantilla1.parrafo1, plantilla1.img1, plantilla1.parrafo2, plantilla1.img2
FROM `noticias`
INNER JOIN plantilla1 on noticias.id_noticia = plantilla1.id_noticia
WHERE noticias.id_noticia = $id; #$id equivale al id de la noticia que se quiera encontrar cada vez que se ejecuta la sentencia

# fin de las 2 sentencias que se usan en el mismo momento

SELECT imagen_portada FROM noticias where id_noticia = $id; #$id equivale al id de la noticia que se quiera encontrar cada vez que se ejecuta la sentencia

INSERT INTO `noticias`(`id_noticia`, `id_comunidad`, `usuario`, `fecha`, `votos`, `imagen_portada`, `publicidad`, `titulo`, `plantilla`)
 VALUES ($maxId,$comunidad,'$user','$date',0,'$location',0,'$titulo','$plantilla'); #valores recogidos de un formulario que cada usuario rellena
# en caso de que en la anterior consulta $plantilla sea 0 se ejecuta la siguiente, y en caso de que sea 1 la otra.
 INSERT INTO `plantilla0`(`id_noticia`, `titulo1`, `parrafo1`, `img1`, `titulo2`, `parrafo2`, `img2`) 
 VALUES ($maxId,'$titulo1','$parrafo1','$location1','$titulo2','$parrafo2','$location2'); #valores recogidos de un formulario que cada usuario rellena

INSERT INTO `plantilla1`(`id_noticia`, `titulo1`, `parrafo1`, `img1`, `parrafo2`, `img2`) 
VALUES ($maxId,'$titulo3','$parrafo3','$location3','$parrafo4','$location4'); #valores recogidos de un formulario que cada usuario rellena


SELECT id_noticia FROM noticias WHERE id_noticia = (SELECT max(id_noticia) FROM noticias);

SELECT id_comunidad, nombre from comunidad;

SELECT votos from noticias WHERE id_noticia = $id; #$id equivale al id de la noticia que se quiera encontrar cada vez que se ejecuta la sentencia

# la siguiente consulta usa el valor obtenido en la anterior, por PHP le suma uno y le hace un update del nuevo valor
UPDATE `noticias` SET `votos`= $cantVotos WHERE noticias.id_noticia = $id; #$id equivale al id de la noticia que se quiera encontrar cada vez que se ejecuta la sentencia

# publica la noticia (a esta sentencia solo se accede si eres moderador)
UPDATE `noticias` SET `publicidad` = '1' WHERE `noticias`.`id_noticia` = $id; #$id equivale al id de la noticia que se quiera encontrar cada vez que se ejecuta la sentencia

SELECT * FROM usuario WHERE userName = '$userName'; #$userName equivale al valor con el que el usuario trata de iniciar sesión

#registrar al usuario con datos del formulario de registro
INSERT INTO usuario(userName, moderador, fecha_creacion, email, password) VALUES ('$name',0,'$fecha','$email','$password');
