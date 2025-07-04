create database ict108;
use ict108;
create table ouvrage (
    titre_ouvrage varchar(255) not null,
    auteur_ouvrage varchar(255) not null,
    editeur_ouvrage varchar(255) not null,
    ISBN varchar(10) not null primary key,
    annee_publication date not null,
    description_ouvrage text,
    couverture_ouvrage varchar(255) not null
);
