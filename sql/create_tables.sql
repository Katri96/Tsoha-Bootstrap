CREATE TABLE Aine(
  id SERIAL PRIMARY KEY,
  name varchar(50) NOT NULL
);

CREATE TABLE Kayttaja(
  id SERIAL PRIMARY KEY, -- SERIAL tyyppinen pääavain pitää huolen, että tauluun lisätyllä rivillä on aina uniikki pääavain. Kätevää!
  name varchar(50) NOT NULL, -- Muista erottaa sarakkeiden määrittelyt pilkulla!
  password varchar(50) NOT NULL
);

CREATE TABLE Resepti(
  id SERIAL PRIMARY KEY,
  aine_id INTEGER REFERENCES Aine(id), -- Viiteavain Player-tauluun
  name varchar(50) NOT NULL,
  description varchar(400),
  added DATE
);

CREATE TABLE Arviointi(
id SERIAL PRIMARY KEY,
Resepti_id INTEGER REFERENCES Resepti(id),
number INTEGER NOT NULL
);
