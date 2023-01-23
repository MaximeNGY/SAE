DROP table if exists Produits;
DROP table if exists Promo;
DROP table if exists Utilisateur;
DROP table if exists Ventes;


CREATE table Produits(
    idProduit SERIAL,
    nomP Varchar(50),
    Quantite integer,
    prix float,
    image varchar(255),
    primary key (idProduit)
);

CREATE table Utilisateur(
        idU int,
        prenom Varchar(50),
        nom Varchar(50),
        mdp varchar(255),
        RoleP Varchar(50),
        PRIMARY KEY (idU)
);

CREATE table Ventes(
    numCommande SERIAL,
    DateV date,
    idU integer references Utilisateur(idU),
    prix float,
    qte int,
    primary key (numCommande)
);

CREATE table Promo(
    idU int,
    pointF integer,
    foreign key (idU) references Utilisateur(idU)
);

INSERT INTO Utilisateur values (
    12102642,
    "Amadou",
    "Dia",
    "$2y$10$XkvJ5T.e3IjKz4AT.KSyHOtTLDOmyoVuQvjLassst8ApoBWYaCbyy",
    "Client"
);
INSERT INTO Utilisateur values (
    2,
    "Mamadou",
    "Dia",
    "$2y$10$XkvJ5T.e3IjKz4AT.KSyHOtTLDOmyoVuQvjLassst8ApoBWYaCbyy",
    "Admin"
);
INSERT INTO Promo values (
      12102642,
      0
);
INSERT INTO Utilisateur values (
    3,
    "Ahmed",
    "Dia",
    "$2y$10$XkvJ5T.e3IjKz4AT.KSyHOtTLDOmyoVuQvjLassst8ApoBWYaCbyy",
    "Membre"
);
INSERT INTO Produits values(
    DEFAULT,
    "Kinder Bueno",
    30,
    0.80,
    "Content/image/kinder.jpg"
);
INSERT INTO Produits values(
    DEFAULT,
    "Caprisun",
    30,
    0.50,
    "Content/image/Caprisun.jpg"
);
INSERT INTO Produits values(
    DEFAULT,
    "coca",
    30,
    0.80,
    "Content/image/coca.jpg"
);

INSERT INTO Produits values(
    DEFAULT,
    "Cristaline",
    30,
    0.50,
    "Content/image/Caprisun.jpg"
);

INSERT INTO Produits values(
    DEFAULT,
    "Fanta 33cl",
    30,
    0.80,
    "Content/image/Caprisun.jpg"
);
INSERT INTO Produits values(
    DEFAULT,
    "Kit Kat",
    30,
    0.70,
    "Content/image/kitkat.jpg"
);




