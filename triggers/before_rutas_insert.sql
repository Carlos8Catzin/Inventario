DELIMITER \\
CREATE TRIGGER `before_rutas_insert`
   BEFORE INSERT
   ON `rutas`
   FOR EACH ROW
BEGIN
   INSERT INTO accessruta(IdRol, IdRuta) VALUES (2, (SELECT idrutas FROM rutas ORDER BY idrutas DESC LIMIT 1));
END \\
DELIMITER ;