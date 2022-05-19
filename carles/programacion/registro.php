<?php
  if(isset($_COOKIE['contador']))
  { 
    
    setcookie('contador', $_COOKIE['contador'] + 1, time() + 365 * 24 * 60 * 60); 
    $mensaje = 'Número de visitas: ' . $_COOKIE['contador']; 
  } 
  else 
  { 
    setcookie('contador', 1, time() + 365 * 24 * 60 * 60); 
    $mensaje = 'Bienvenido a cronos '; 
  }
  //https://www.comocreartuweb.com/consultas/showthread.php/52690-TUTORIAL-Crear-sistema-de-novedades-noticias-del-tipo-pagina-php-id 
  // esto es por si quereis ver cosas que se pueden aplicar en aplicacion web
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
<title>Prueba de cookie</title> 
</head> 
<body> 
<p> 
<?php echo $mensaje; ?> 
</p> 
</body> 
</html> 