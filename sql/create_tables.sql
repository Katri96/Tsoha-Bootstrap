-- Lisää CREATE TABLE lauseet tähän tiedostoon
CREATE TABLE Raaka-aine(
    id SERIAL PRIMARY KEY,
    name varchar(20) NOT NULL
);
CREATE TABLE Resepti(
    id SERIAL PRIMARY KEY,
    name varchar(30) NOT NULL,
    type varchar(30) NOT NULL,
    price INTEGER NOT NULL,
    aine_id INTEGER REFERENCES Raaka-aine(id),
    ohje varchar(200) NOT NULL,
);

CREATE TABLE Arviointi (
    Resepti_id INTEGER REFERENCES Resepti(id),
    number INTEGER NOT NULL
);
CREATE TABLE Kauttaja(
    id SERIAL PRIMARY KEY,
    name varchar(50) NOT NULL,
    password varchar(50) NOT NULL
);
DROP TABLE IF EXISTS Raaka-aine CASCADE; -- Muista IF EXISTS ja CASCADE parametrit!
DROP TABLE IF EXISTS Resepti CASCADE;
DROP TABLE IF EXISTS Reseptilista CASCADE; -- Muista IF EXISTS ja CASCADE parametrit!
DROP TABLE IF EXISTS Arviointi CASCADE;
DROP TABLE IF EXISTS Kayttaja CASCADE;