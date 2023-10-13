-- Creación de la tabla "votante"
CREATE TABLE votante (
    rut VARCHAR(20) PRIMARY KEY,
    nombreApellido VARCHAR(50),
    alias VARCHAR(50),
    email VARCHAR(50),
    candidato VARCHAR(50),
    checkboxSelecionados VARCHAR(50),
    region_id INT,
    comuna_id INT,
);

-- Creación de la tabla "region"
CREATE TABLE region (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL
);

-- Creación de la tabla "comuna"
CREATE TABLE comuna (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    region_id INT,
    FOREIGN KEY (region_id) REFERENCES region(id)
);

-- Población de la tabla "region"
INSERT INTO region (nombre) VALUES
    ('Región de Arica y Parinacota'),
    ('Región de Tarapacá'),
    ('Región de Antofagasta'),
    ('Región de Atacama'),
    ('Región de Coquimbo'),
    ('Región de Valparaíso'),
    ('Región Metropolitana de Santiago'),
    ('Región del Libertador General Bernardo O''Higgins'),
    ('Región del Maule'),
    ('Región de Ñuble'),
    ('Región del Biobío'),
    ('Región de La Araucanía'),
    ('Región de Los Ríos'),
    ('Región de Los Lagos'),
    ('Región de Aysén del General Carlos Ibáñez del Campo'),
    ('Región de Magallanes y de la Antártica Chilena');

-- Población de la tabla "comuna" relacionando con regiones
INSERT INTO comuna (nombre, region_id) VALUES
    ('Arica', 1),
    ('Iquique', 2),
    ('Antofagasta', 3),
    ('Copiapó', 4),
    ('La Serena', 5),
    ('Valparaíso', 6),
    ('Santiago', 7),
    ('Rancagua', 8),
    ('Talca', 9),
    ('Chillán', 10),
    ('Concepción', 11),
    ('Temuco', 12),
    ('Valdivia', 13),
    ('Puerto Montt', 14),
    ('Coyhaique', 15),
    ('Punta Arenas', 16);


-- Población de la tabla "votante"
INSERT INTO votante (nombreApellido, alias, rut, email, candidato, checkboxSelecionados, region_id, comuna_id) 
VALUES 
('Juan Pérez', 'JPerez', '12345678-9', 'juan.perez@example.com', 'Candidato A', 'tv, redes sociales', 7, 7),
('María Rodríguez', 'MRod', '98765432-1', 'maria.rodriguez@example.com', 'Candidato B', 'web, amigo', 3, 4),
('Pedro Sánchez', 'PSan', '55555555-5', 'pedro.sanchez@example.com', 'Candidato C', 'tv, amigo', 12, 11);

