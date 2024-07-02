CREATE DATABASE biblioteca;

USE biblioteca;

CREATE TABLE autores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    fecha_nacimiento DATE NOT NULL
);

CREATE TABLE libros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(200) NOT NULL,
    fecha_publicacion DATE NOT NULL,
    autor_id INT,
    precio DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (autor_id) REFERENCES autores(id)
);

-- Inserta datos iniciales
INSERT INTO autores (nombre, apellido, fecha_nacimiento) VALUES ('Gabriel', 'García Márquez', '1927-03-06');
INSERT INTO libros (titulo, fecha_publicacion, autor_id, precio) VALUES ('Cien Años de Soledad', '1967-05-30', 1, 19.99);

select*from autores;
select*from libros;