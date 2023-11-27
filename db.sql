--- CREATE DATABASE nome_data_base --
CREATE DATABASE youcontact
--- CREATE TABLE Nom_table ---
-- users --
CREATE TABLE users(
	ID_U INT(11) PRIMARY KEY AUTO_INCREMENT,
    Nom_U VARCHAR(255),
    Prenom VARCHAR(255),
    Email_U VARCHAR(255),
    D_Inscription DATE ;
    password_U VARCHAR(255);
);
-- contact --
CREATE TABLE contacts(
	ID_C INT(11) PRIMARY KEY AUTO_INCREMENT,
    Nom_C VARCHAR(255),
    Telephone VARCHAR(255),
    Email_C VARCHAR(255),
    D_Cree DATE ;
    Addresss VARCHAR(255);
    ID_US INT(11);
    FOREIGN KEY (ID_US) REFERENCES users(ID_U) 
);
