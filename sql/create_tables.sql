CREATE TABLE Aine(
  id SERIAL PRIMARY KEY,
  resepti_id INTEGER REFERENCES Resepti(id),
  name varchar(50) NOT NULL
);

CREATE TABLE Kayttaja(
  id SERIAL PRIMARY KEY, -- SERIAL tyyppinen pääavain pitää huolen, että tauluun lisätyllä rivillä on aina uniikki pääavain. Kätevää!
  name varchar(50) NOT NULL, -- Muista erottaa sarakkeiden määrittelyt pilkulla!
  password varchar(50) NOT NULL,
  lempiresepti varchar(50)
);

CREATE TABLE Resepti(
  id SERIAL PRIMARY KEY,
  aine_id INTEGER REFERENCES Aine(id), -- Viiteavain Player-tauluun
  name varchar(50) NOT NULL,
  tyyppi varchar(40) NOT NULL,
  hinta INTEGER NOT NULL,
  description varchar(400),
  added DATE
);

CREATE TABLE Arviointi(
id SERIAL PRIMARY KEY,
resepti_id INTEGER REFERENCES Resepti(id),
kayttaja_id INTEGER REFERENCES Kayttaja(id),
arvio INTEGER NOT NULL,
description varchar(400)
);


