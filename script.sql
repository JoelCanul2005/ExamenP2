-- Crear La Base de datos
CREATE DATABASE Biblioteca;

USE Biblioteca;

-- tabla Autores
CREATE TABLE Autores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    apellido VARCHAR(255) NOT NULL,
    fecha_nacimiento DATE
);

-- tabla Libros
CREATE TABLE Libros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    fecha_publicacion DATE,
    autor_id INT,
    precio DECIMAL(10, 2),
    FOREIGN KEY (autor_id) REFERENCES Autores(id)
);

-- Modificar la llave foranea para que cuando elimine un autor se elimine el libro 
ALTER TABLE libros
ADD CONSTRAINT libros_ibfk_1 FOREIGN KEY (autor_id) REFERENCES autores(id) ON DELETE CASCADE;

-- Hacer que no se repita el nombre del libro
ALTER TABLE libros
ADD CONSTRAINT libros_titulo_unique UNIQUE (titulo);


-- Insertar datos en la tabla Autores
INSERT INTO Autores (nombre, apellido, fecha_nacimiento) VALUES
('Carlos', 'Perez', '1980-02-15'),
('Ana', 'Gomez', '1975-08-23'),
('Luis', 'Martinez', '1990-11-12'),
('Maria', 'Lopez', '1985-05-30');

-- Insertar datos en la tabla Libros
INSERT INTO Libros (titulo, fecha_publicacion, autor_id, precio) VALUES
('El Misterio del Bosque', '2010-03-10', 1, 25.50),
('Viaje a la Luna', '2005-07-19', 2, 18.75),
('El Enigma del Tiempo', '2018-11-01', 3, 22.30),
('La Sombra del Pasado', '2012-09-15', 4, 19.99);


-- Proceso para insertar Autor
DELIMITER //

CREATE PROCEDURE InsertarAutor(
    IN p_nombre VARCHAR(255),
    IN p_apellido VARCHAR(255),
    IN p_fecha_nacimiento DATE
)
BEGIN
    INSERT INTO Autores (nombre, apellido, fecha_nacimiento)
    VALUES (p_nombre, p_apellido, p_fecha_nacimiento);
END //

DELIMITER ;



DROP PROCEDURE IF EXISTS buscar_libros;


-- Proceso Para Buscar por Titulo o Nombre de Autor
DELIMITER //
CREATE PROCEDURE buscar_libros(IN searchQuery VARCHAR(255))
BEGIN
    SELECT 
        Libros.titulo, 
        Autores.nombre AS autor_nombre, 
        Autores.apellido AS autor_apellido
    FROM 
        Libros
    JOIN 
        Autores ON Libros.autor_id = Autores.id
    WHERE 
        Libros.titulo LIKE CONCAT('%', searchQuery, '%') 
        OR Autores.nombre LIKE CONCAT('%', searchQuery, '%') 
        OR Autores.apellido LIKE CONCAT('%', searchQuery, '%');
END //
DELIMITER ;


CALL buscar_libros('holaprueba3');






