create table matierepremiere(
    id INT NOT NULL AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    seuil double,
    unite char(3),
    PRIMARY KEY(id)
);
insert into matierepremiere (nom,seuil,unite) values
('lait',1000,'ml'),
('sucre',1000,'g'),
('parfum',1000,'ml'),
('conservateur',1000,'ml'),
('colorant',1000,'ml'),
('fruit',1000,'g');

create table stock(
    id INT NOT NULL AUTO_INCREMENT,
    idMatiere int not null,
    entree double default 0,
    sortie double default 0,
    dateMouvement datetime default now(),
    PRIMARY KEY(id),
    foreign key (idMatiere) references matierepremiere(id)
);
insert into stock (idMatiere,entree) values 
(1,2000),(2,900),(3,2000),(4,2000),(5,2000),(6,1000);

create view listeStock as
select m.nom,m.unite,m.seuil,sum(entree)-sum(sortie) restant
from stock s
join matierepremiere m on s.idMatiere=m.id 
group by m.nom,m.unite,m.seuil

create view courses as 
select nom, seuil-restant as reste, unite
from listeStock
where restant<seuil or restant=seuil

create table produitFini(
    id INT PRIMARY key NOT NULL AUTO_INCREMENT,
    nom VARCHAR(20)
);
insert into produitFini (nom) values('yaourt à la banane');

create table formule(
    id INT PRIMARY key NOT NULL AUTO_INCREMENT,
    idProduit int,
    idMatiere int,
    pourcentage double,
    foreign key (idMatiere) references matierepremiere(id),
    foreign key (idProduit) references produitFini(id)
);
insert into formule (idProduit,idMatiere,pourcentage) values
(1,1,80),
(1,6,10),
(1,2,10);

create table fabrication(
    id INT PRIMARY key NOT NULL AUTO_INCREMENT,
    idProduit int,
    quantite double,
    dateFabrication datetime  default now()
);

create table stockProduitFini(
    id INT NOT NULL AUTO_INCREMENT,
    idProduit int not null,
    entree double default 0,
    sortie double default 0,
    dateMouvement datetime default now(),
    PRIMARY KEY(id),
    foreign key (idProduit) references matierepremiere(id)
);
insert into stockProduitFini (idProduit,entree) values 
(1,10);

create view listeStockProduitFini as
select p.nom,sum(entree)-sum(sortie) restant
from stockProduitFini s
join produitFini p on s.idProduit=p.id 
group by p.nom
