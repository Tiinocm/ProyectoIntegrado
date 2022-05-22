CREATE TABLE `comunidad` (
  `id_comunidad` int(11) NOT NULL,
  `fecha_creacion` char(20) DEFAULT NULL,
  `usuario` char(20) DEFAULT NULL,
  `nombre` char(20) DEFAULT NULL
);
CREATE TABLE `noticias` (
  `id_noticia` int(11) NOT NULL,
  `id_comunidad` int(11) NOT NULL,
  `usuario` char(20) DEFAULT NULL,
  `fecha` char(12) DEFAULT NULL,
  `votos` int(11) DEFAULT NULL,
  `imagen_portada` char(100) DEFAULT NULL,
  `publicidad` tinyint(1) DEFAULT NULL,
  `titulo` text DEFAULT NULL,
  `plantilla` tinyint(1) DEFAULT NULL
);

CREATE TABLE `plantilla0` (
  `id_noticia` int(11) NOT NULL,
  `titulo1` text DEFAULT NULL,
  `parrafo1` mediumtext DEFAULT NULL,
  `img1` char(20) DEFAULT NULL,
  `titulo2` text DEFAULT NULL,
  `parrafo2` mediumtext DEFAULT NULL,
  `img2` char(20) DEFAULT NULL
);

CREATE TABLE `plantilla1` (
  `id_noticia` int(11) NOT NULL,
  `titulo1` text DEFAULT NULL,
  `parrafo1` mediumtext DEFAULT NULL,
  `img1` char(20) DEFAULT NULL,
  `parrafo2` mediumtext DEFAULT NULL,
  `img2` char(20) DEFAULT NULL
);

CREATE TABLE `usuario` (
  `userName` char(20) NOT NULL,
  `moderador` tinyint(1) DEFAULT NULL,
  `fecha_creacion` char(30) DEFAULT NULL,
  `email` char(30) DEFAULT NULL,
  `password` char(100) DEFAULT NULL
);

ALTER TABLE `comunidad`
  ADD PRIMARY KEY (`id_comunidad`),
  ADD KEY `Fk_user` (`usuario`);


ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id_noticia`);


ALTER TABLE `plantilla0`
  ADD PRIMARY KEY (`id_noticia`);


ALTER TABLE `plantilla1`
  ADD PRIMARY KEY (`id_noticia`);


ALTER TABLE `usuario`
  ADD PRIMARY KEY (`userName`);

ALTER TABLE `comunidad`
  ADD CONSTRAINT `Fk_user` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`userName`);
COMMIT;
