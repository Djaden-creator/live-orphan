NB: a tout lire!!! et ne modifier aucune lettre etc... copier les comme ils sont !!!

1.utilisation en mode local 
Nb: tout sur ce site est basé sur la base de donné vous trouverai au debut que le site est vide.
voici les clés pour se connecter a la base de donnée local :
$dsn = 'mysql:host=localhost;dbname=orphelinat';
$username = 'root';
$password = getenv('');
---------------------------------------------------------------------------------------------
2. ce que vous devez faire pour bien utiliser ce site:

-la creation de la base de donné orphelinat:

CREATE DATABASE if not exist orphelinat

une fois la database créé vous pouvez crée des tables ou des classes 

USE orphelinat //cette commande me permet d'utiliser la base de donné orphelinat

la creation de table users:

CREATE TABLE users(
idUser int(11) AUTO_INCREMENT,
name varchar(50),
email varchar(255),
dbd date,
sex varchar(20),
portable varchar(50),
adresse varchar(255),
objectif varchar(50),
password varchar(255),
enregistre datetime,
niveau_du_compte varchar(50),
username varchar(50),
role varchar(20),
PRIMARY KEY(idUser)
);
l'utilisateur va creer son compte et il aura le role de "utilisateur" si il le fait seul 
mais si l'administrateur creer un compte pour une personne celui ci pourra obtenir un role selon l'administrateur 
soit un simple utilisteur,un moderateur,receptioniste ou un admin.
NB: une fois enregistrer et donc connectez vous.
 
1. modifier le mot de passe etc... 
.-----------------------------------------------------------------------------------------

// la creation de la table children:les enfants sont postés par l'admin et les employés. 
ce sont les enfants que les utilisateurs doivent adopter

CREATE TABLE children(
idChild int(11) AUTO_INCREMENT,
name varchar(50),
date date,
sex varchar(20),
pays varchar(50),
photos varchar(255),
entre datetime,
PRIMARY KEY(idChild)   
)
---------------------------------------------------------------------------------------
//la creation de la table adoption dans le quel les demandes des utilisateurs seront stokés:

CREATE TABLE adoption(
idAdoption int(11) AUTO_INCREMENT,
idchild int(11),
iduser int(11),
name varchar(50),
email varchar(50),
number varchar(20),
message text,
create_at datetime,
status varchar(20),
reference varchar(20),
decision varchar(20),
PRIMARY KEY(idAdoption)
)

// nous pouvons enregistrer les nouvelles demandes  dans la base de donnéé:

-------------------------------------------------------------------------------------
// ici nous allons creer la table des services offert par liveorphan

CREATE TABLE services(
idService int(11) AUTO_INCREMENT,
type varchar(255),
description text,
creer datetime
PRIMARY KEY(idService)
)

---------------------------------------------------------------------------------
//pour creer le tableau de teams:ces sont les employées 
ils seront crées par les administrateur et enregistré dans la base de données. 

CREATE TABLE teams(
idTeam int(11) AUTO_INCREMENT,
name varchar(50),
email varchar(50),
dob date,
portable varchar(50),
adresse text,
poste varchar(50),
photo varchar(255),
entrance datetime,
PRIMARY KEY(idTeam)
)

----------------------------------------------------------------------------------------------------
//nous allons cree une table dans la quelle un client pourra contacter diretement l'admin et les receptioniste en lui envoyant 
un message direct : ce genre de message sera vu et repondu par les receptionistes soit en contactant le visiteur 
par son numero de telephone ou par son mail mais il se fera a 70% sur l'application messagerie liveorphan.

CREATE TABLE message(
idmessage int(11) AUTO_INCREMENT,
idUser int(11),
name varchar(100),
email varchar(100),
reference_number varchar(20),
description text,
create_at datetime,
status varchar(20),
PRIMARY KEY(idmessage)
)

le site utilise un systeme de messagerie direct et l'admin s'en occupera  
-----------------------------------------------------------------------------------------
cette table sauvegarde la reponse sur les messages des utilisateurs par les receptionistes

CREATE TABLE messageback(
id int(11) AUTO_INCREMENT,,
idmessage int(11), 
message text,
createdAt datetime,
idUser int(11),
user_check varchar(11),
PRIMARY KEY(id)
)
 ---------------------------------------------------------------------------------------
//cette table sauvegarde les temoignages des utilisateur sur la plateforme liveorphan

CREATE TABLE reviews(
idreview int(11) AUTO_INCREMENT,
name  varchar(50), 
email varchar(50),
note int(10),
description text,
create_at datetime,
status varchar(15),
PRIMARY KEY(idreview)
)



