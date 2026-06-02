CREATE TABLE films (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    duree INT,
    auteur VARCHAR(255) NOT NULL,
    date_sortie DATE NOT NULL,
    budget INT
);

INSERT INTO films (titre, duree, auteur, date_sortie, budget) VALUES
('Inception', 148, 'Christopher Nolan', '2010-06-21', 160),
('Interstellar', 169, 'Christopher Nolan', '2014-11-05', 165),
('Parasite', 132, 'Bong Joon-ho', '2019-06-05', 11),
('The Matrix', 136, 'The Wachowskis', '1999-06-23', 63),
('The Godfather', 175, 'Francis Ford Coppola', '1972-10-18', 6),
('Pulp Fiction', 154, 'Quentin Tarantino', '1994-10-26', 8),
('The Dark Knight', 152, 'Christopher Nolan', '2008-08-13', 180),
('Titanic', 194, 'James Cameron', '1998-01-07', 200),
('Avatar', 162, 'James Cameron', '2009-12-16', 237),
('Spirited Away', 125, 'Hayao Miyazaki', '2002-04-10', 19),
('La La Land', 128, 'Damien Chazelle', '2017-01-25', 30),
('The Shawshank Redemption', 142, 'Frank Darabont', '1995-03-01', 25),
('Gladiator', 155, 'Ridley Scott', '2000-11-13', 110),
('The Grand Budapest Hotel', 99, 'Wes Anderson', '2014-02-26', 25);