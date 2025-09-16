

CREATE DATABASE o_jalinheiro;

USE o_jalinheiro;

CREATE TABLE raza(
    nombre VARCHAR(200) PRIMARY KEY,
    descripcion VARCHAR(5000)
);

CREATE TABLE gallina(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(200) NOT NULL,
    fecha_nacimiento DATE,
    fecha_alta DATE NOT NULL,
    nombre_raza VARCHAR(200) NOT NULL,
    FOREIGN KEY(nombre_raza) REFERENCES raza(nombre)
);

CREATE TABLE baja(
    id_gallina INT PRIMARY KEY,
    fecha DATE NOT NULL,
    causa VARCHAR(50) NOT NULL,
    FOREIGN KEY(id_gallina) REFERENCES gallina(id)
);

CREATE TABLE produccion(
    id_gallina INT,
    fecha_recogida DATE,
    cantidad INT NOT NULL,
    PRIMARY KEY (id_gallina,fecha_recogida),
    FOREIGN KEY (id_gallina) REFERENCES gallina(id)
);

INSERT INTO raza(nombre,descripcion) VALUES('Gallina de Mos','La gallina de Mos fue la primera autoctona que se empezo a recuperar en galicia. Estando en peligro de extincion, en el año 1936 se llevo a cabo un programa de seleccion de la raza en la parroquia de San Julian de Mos del municipio de Castro de Rei(Lugo). De ahi el nombre de esta raza de gallina, "gallina de mos", en honor a la parroquia donde comenzo su recuperacion. Se caracteriza por su tamaño mediano y su color leonado con un matiz rojo-caoba claro.'),('Gallina de Villalba','Proviene de la comarca de A Mariña en la provincia de Lugo. Se distingue por su tamaño mediano, su plumaje marron con tonalidades doradas y su cresta de forma rosa.'),('Gallina Piñeira','Esta raza de galinas han sido bautizadas como "Piñeiras" por el color y forma de su plumaje, que se asemeja a las piñas de los pinares. Son la raza con un tamaño mas pequeño.'); 


INSERT INTO gallina(id,nombre,fecha_nacimiento,fecha_alta,nombre_raza) 
VALUES (1,'Pepa','2022-02-01',DATE_ADD('2022-02-01',INTERVAL 5 MONTH),'Gallina de Mos'),
(2,'Pistacho','2022-02-01',DATE_ADD('2022-02-01',INTERVAL 5 MONTH),'Gallina de Mos'),
(3,'Macarron','2020-06-01',DATE_ADD('2020-06-01',INTERVAL 5 MONTH),'Gallina de Mos'),
(4,'Zipi','2023-08-11',DATE_ADD('2023-08-11',INTERVAL 5 MONTH),'Gallina de Mos'),
(5,'Papanatas','2024-02-01',DATE_ADD('2024-02-01',INTERVAL 5 MONTH),'Gallina de Mos'),
(6,'Cacao','2024-09-22',DATE_ADD('2024-09-22',INTERVAL 5 MONTH),'Gallina de Villalba'),
(7,'M. Rajoy','2023-02-01',DATE_ADD('2023-02-01',INTERVAL 5 MONTH),'Gallina de Villalba'),
(8,'Commodo','2022-10-10',DATE_ADD('2022-10-10',INTERVAL 5 MONTH),'Gallina de Villalba'),
(9,'Maximo Decimo Meridio','2022-11-22',DATE_ADD('2022-11-22',INTERVAL 5 MONTH),'Gallina de Villalba'),
(10,'Turuleca','2023-02-01',DATE_ADD('2023-02-01',INTERVAL 5 MONTH),'Gallina de Villalba'),
(11,'Magricela','2024-02-01',DATE_ADD('2024-02-01',INTERVAL 5 MONTH),'Gallina de Villalba'),
(12,'Chiquito','2024-05-28',DATE_ADD('2024-05-28',INTERVAL 5 MONTH),'Gallina Piñeira'),
(13,'Piña','2024-02-01',DATE_ADD('2024-02-01',INTERVAL 5 MONTH),'Gallina Piñeira'),
(14,'Leo Messi','2023-06-24',DATE_ADD('2023-06-24',INTERVAL 5 MONTH),'Gallina Piñeira'),
(15,'Zape','2023-08-11',DATE_ADD('2023-08-11',INTERVAL 5 MONTH),'Gallina Piñeira');


INSERT INTO baja(id_gallina,fecha,causa) 
VALUES (8,'2025-08-01','Sacrificada'),
(9,'2025-08-01','Muerte natural');

INSERT INTO produccion(id_gallina,fecha_recogida,cantidad) 
VALUES (1,'2025-08-13',0),
(2,'2025-08-13',1),
(3,'2025-08-13',0),
(4,'2025-08-13',1),
(5,'2025-08-13',0),
(6,'2025-08-13',1),
(7,'2025-08-13',1),
(10,'2025-08-13',1),
(11,'2025-08-13',0),
(12,'2025-08-13',1),
(13,'2025-08-13',0),
(14,'2025-08-13',1),
(15,'2025-08-13',2),
(1,'2025-08-14',1),
(2,'2025-08-14',0),
(3,'2025-08-14',1),
(4,'2025-08-14',1),
(5,'2025-08-14',1),
(6,'2025-08-14',0),
(7,'2025-08-14',2),
(10,'2025-08-14',0),
(11,'2025-08-14',0),
(12,'2025-08-14',1),
(13,'2025-08-14',1),
(14,'2025-08-14',0),
(15,'2025-08-14',1);


-- Consulta TOP 5 produccion

SELECT g.id,g.nombre,AVG(cantidad) AS media_dia,SUM(cantidad) AS cantidad_total
FROM gallina g JOIN produccion p
ON g.id=p.id_gallina
GROUP BY g.id
ORDER BY media_dia DESC
LIMIT 5

-- Gallina de la semana

SELECT g.id, g.nombre, AVG(cantidad) AS media_dia, SUM(cantidad) AS cantidad_total
FROM gallina g JOIN produccion p
ON g.id=p.id_gallina
WHERE fecha_recogida >= CURRENT_DATE - INTERVAL 7 DAY
GROUP BY g.id
ORDER BY media_dia DESC
LIMIT 1

-- Media de produccion por raza
-- Por dia
SELECT r.nombre, ROUND(AVG(cantidad),2) AS media_dia, ROUND(AVG(cantidad)*30,2) AS media_mes
FROM gallina g JOIN produccion p
ON g.id=p.id_gallina
JOIN raza r
ON r.nombre=g.nombre_raza
GROUP BY r.nombre
ORDER BY media_dia DESC

-- Por mes
SELECT r.nombre,AVG(cantidad)*30 AS media_dia,SUM(cantidad) AS cantidad_total
FROM gallina g JOIN produccion p
ON g.id=p.id_gallina
JOIN raza r
ON r.nombre=g.nombre_raza
GROUP BY r.nombre
ORDER BY media_dia DESC

-- Produccion semanal detallada

SELECT fecha_recogida, SUM(cantidad) AS cantidad_diaria
FROM gallina g JOIN produccion p
ON g.id=p.id_gallina
WHERE fecha_recogida >= CURRENT_DATE - INTERVAL 7 DAY
GROUP BY fecha_recogida DESC

-- Top 3 dias de mayor produccion

SELECT fecha_recogida, SUM(cantidad) AS dia
FROM produccion
GROUP BY fecha_recogida
ORDER BY SUM(cantidad) DESC
LIMIT 3