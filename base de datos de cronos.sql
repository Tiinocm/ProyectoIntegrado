drop database if exists cronos;
create  database cronos;
use cronos;
create table noticias(
id_noticia int primary key,
id_comunidad int not null,
usuario char (20),
fecha  char (12),
votos int,
imagen_portada char(100),
publicidad bool,
titulo char(25),
posiciones char(15)
);
create table parrafos(
id_noticia int,
posicion char(15),
texto char(50),
CONSTRAINT parrafos PRIMARY KEY(id_noticia,posicion)
);
create table multimedia(
id_noticia int,
posicion char(15),
ruta char(50),
CONSTRAINT parrafos PRIMARY KEY(id_noticia,posicion)
);
create table Usuario(
usuario char(20) primary key,
moderador bool,
fecha_creacion char(30),
email char(30),
contraseña char (15)
);
create table comunidad(
id_comunidad int primary key,
fecha_creacion char (20),
usuario char(20),
CONSTRAINT Fk_user FOREIGN KEY (usuario)
    REFERENCES Usuario(usuario)
);
insert into  noticias(id_noticia ,id_comunidad,usuario,fecha,votos,imagen_portada,publicidad,titulo,posiciones)
	value(1,1,'zarzu','9/05/2022',2,'imagen/portada',1,'hola',1),
		(2,2,'tino','10/05/2022',4,'imagen/noticia',1,'quetal',10),
        (3,3,'alejandro','11/05/2022',5,'imagen/informacion',0,'futbol',11),
        (4,5,'candela','13/05/2022',3,'imagen/informacion',1,'tennis',20),
        (6,7,'paula','14/05/2022',7,'imagen/contrapotada',0,'basquet',30);
        
insert into parrafos(id_noticia ,posicion,texto)
	value(1,2,'hola que tal'),
		(3,3,'hola a todos hoy tenemos a jaume '),
		(4,5,'incendio en la torre de ucrania'),
		(8,9,'atentado en catarroja'),
		(10,20,'atentado en albal');
        
 insert into Usuario(usuario,moderador,fecha_creacion,email,contraseña )
	value('zarzu1',1,'09/05/2022','czc@gmail.com','12345zcg'),
		('tino2',0,'24/03/2022','tino@gmail.com','124fffsfdf'),
		('alejendro3',1,'24/02/2022','alejandro@gmail.com','1234dfg'),
		('candela4',1,'12/02/2021','zarzu@gmail.com','1233fg4w'),
		('paula5',0,'11/01/2023','candela@gmail','132dsadasf');
        
	 insert into multimedia(id_noticia ,posicion,ruta)
	value(1,2,'imagenes/noticia'),
		(3,3,'video/tennis'),
		(4,5,'imagenes/basquet'),
		(8,9,'imagenes/futbol'),
		(10,20,'video/pilota');
        
	       
	 insert into  Usuario(usuario,moderador,fecha_creacion,contraseña)
	value('zarzu7',1,'09/05/2022','12345zcg'),
		('tino8',0,'24/03/2022','124fffsfdf'),
		('alejendro9',1,'24/02/2022','1234dfg'),
		('candela10',1,'12/02/2021','1233fg4w'),
		('paula11',0,'11/01/2023','132dsadasf');
       
        insert into comunidad(id_comunidad,fecha_creacion)
	value(1,'09/05/2022'),
		(2,'24/03/2022'),
		(4,'24/02/2022'),
		(6,'12/02/2021'),
		(7,'11/01/2023');
        
	
  
	

		 