use proy_cronos;
DELIMITER $$
CREATE TRIGGER quotationInImg_BI BEFORE INSERT ON noticias
FOR EACH ROW
BEGIN
	set new.imagen_portada = CONCAT('"', new.imagen_portada, '"');
END;$$