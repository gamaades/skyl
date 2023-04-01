

CREATE TABLE `books`.`autores` ( `idAutor` INT NOT NULL AUTO_INCREMENT , `Autor` VARCHAR(100) NOT NULL , PRIMARY KEY (`idAutor`)) ENGINE = InnoDB;
INSERT INTO `autores` (`idAutor`, `Autor`) VALUES (NULL, 'Marcela Paz');

CREATE TABLE `books`.`categorias` ( `idCategoria` INT NOT NULL AUTO_INCREMENT , `categoria` VARCHAR(250) NOT NULL , PRIMARY KEY (`idCategoria`)) ENGINE = InnoDB;
INSERT INTO `categorias` (`idCategoria`, `categoria`) VALUES (NULL, 'La novela de aventuras');

CREATE TABLE `books`.`editoriales` ( `idEditorial` INT NOT NULL AUTO_INCREMENT , `editorial` VARCHAR(250) NOT NULL , PRIMARY KEY (`idEditorial`)) ENGINE = InnoDB;
INSERT INTO `editoriales` (`idEditorial`, `editorial`) VALUES (NULL, 'Rapa Nui');

CREATE TABLE `books`.`libros` ( `idLibro` INT NOT NULL AUTO_INCREMENT , `titulo` VARCHAR(250) NOT NULL , `fechaLanzamiento` DATE NOT NULL , `idAutor` INT NOT NULL , `idCategoria` INT NOT NULL , `idEditorial` INT NOT NULL , `idioma` VARCHAR(100) NOT NULL , `descripcion` VARCHAR(1000) NOT NULL , `favorito` BOOLEAN NULL DEFAULT NULL , `meGusta` BOOLEAN NULL DEFAULT NULL , PRIMARY KEY (`idLibro`), FOREIGN KEY (idAutor) REFERENCES autores(`idAutor`), FOREIGN KEY (idCategoria) REFERENCES categorias(`idCategoria`), FOREIGN KEY (idEditorial) REFERENCES editoriales(`idEditorial`)) ENGINE = InnoDB;
INSERT INTO `libros` (`idLibro`, `titulo`, `fechaLanzamiento`, `idAutor`, `idCategoria`, `idEditorial`, `idioma`, `descripcion`, `favorito`, `meGusta`) VALUES (NULL, 'Papelucho', '2013-01-09', '1', '1', '1', 'Español', 'Bueno', '1', '1');