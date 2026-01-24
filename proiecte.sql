CREATE DATABASE IF NOT EXISTS rio_db;
USE rio_db;

CREATE TABLE IF NOT EXISTS proiecte_primarie (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nume VARCHAR(255),
    descriere TEXT,
    buget VARCHAR(100),
    imagine VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS inscrieri_granturi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nume_aplicant VARCHAR(255),
    email VARCHAR(100),
    proiect_vizat VARCHAR(100),
    descriere_propunere TEXT
);

TRUNCATE TABLE proiecte_primarie;
INSERT INTO proiecte_primarie (nume, descriere, buget, imagine) VALUES 
('Porto Maravilha', 'Revitalizarea zonei portuare din Rio.', '8 miliarde R$', 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e4/Porto_Maravilha_em_novembro_de_2015.jpg/800px-Porto_Maravilha_em_novembro_de_2015.jpg'),
('Museu do Amanha', 'Muzeul viitorului, simbol al sustenabilitatii.', '215 milioane R$', 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e3/Museu_do_Amanh%C3%A3_Rio_de_Janeiro.jpg/800px-Museu_do_Amanh%C3%A3_Rio_de_Janeiro.jpg'),
('Parque Madureira', 'Spatiu verde modern in zona de nord.', '100 milioane R$', 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/06/Parque_Madureira_-_Arena_Carioca.jpg/800px-Parque_Madureira_-_Arena_Carioca.jpg'),
('Rio Carnaval', 'Finantare pentru scolile de samba.', '65 milioane R$', 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Samb%C3%B3dromo_do_Rio_de_Janeiro.jpg/800px-Samb%C3%B3dromo_do_Rio_de_Janeiro.jpg'),
('VLT Carioca', 'Sistem de tramvai modern si ecologic.', '1.2 miliarde R$', 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/10/VLT_Carioca_-_Parada_dos_Museus.jpg/800px-VLT_Carioca_-_Parada_dos_Museus.jpg');