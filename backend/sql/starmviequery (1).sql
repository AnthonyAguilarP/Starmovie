use starmovie;

create table usuarios (
username varchar(17) not null,
Pnombre varchar(15) not null,
Snombre varchar(15),
PApellido varchar(15),
SApellido varchar(15),
fnacimiento date not null,
pssword varchar(20) not null,
gmail varchar(30) not null,
FP longblob,
primary key(username)
);

create table CatgPeli (
NombreCatg varchar(15) not null,
DescPeli varchar(50) not null,
primary key(NombreCatg)
);

create table ClasifEdades (
NombreClasi varchar(5) not null,
DescClasi varchar(50) not null,
primary key(NombreClasi)
);

create table Actores (
IdActor int not null,
PNombre varchar (15),
SNombre varchar (15),
PApellido varchar(15),
SApellido varchar(15),
FNacimiento date,
Pseudonimo varchar(15),
primary key (IdActor)

);

create table Premio (
Nombre varchar (35) not null,
Descrip varchar (50) not null,
primary key(Nombre)
);

create table Premiacion (
Premio varchar(35) not null,
Id_Actor int not null,
Fecha datetime,
primary key(Premio),
 foreign key (Premio) references Premio (Nombre),
 foreign key (Id_Actor) references Actores (IdActor)
);

create table Votos (
user_name varchar(17) not null,
Id_Pelicula int not null,
points double not null,
primary key(points),
foreign key (user_name) references usuarios (username),
foreign key (Id_Pelicula) references Peliculas (IdPelicula)
);

create table Peliculas (
IdPelicula int not null,
NamePeli varchar (50)  not null,
DescPeli varchar (70) not null,
catg_Peli varchar (15) not null,
clasi_EDad varchar (5) not null,
name_Prod varchar (25) not null,
puntuacion double not null,
primary key (IdPelicula),
foreign key (catg_peli) references CatgPeli (NombreCatg),
foreign key (clasi_EDad) references ClasifEdades (NombreClasi),
foreign key (name_Prod) references Productora (NameProd)
);

create table Reparto (
IdReparto int not null,
Id_Actor int not null,
Id_Pelicula int not null,
primary key (IdReparto),
foreign key (Id_Actor) references Actores (IdActor),
foreign key (Id_Pelicula) references Peliculas (IdPelicula)
);

create table Productora (
NameProd varchar(25) not null,
DescProd varchar (70) not null,
CEO int  not null,
Company int not null,
Distribu int  not null,
primary key (NameProd),
foreign key (CEO) references CEO (idCEO),
foreign key (Company) references Company (IdCompany),
foreign key (Distribu) references Distribui (IdDistribui)
);

create table CEO (
idCEO int not null,
Fname varchar(15) not null,
Aname varchar (15),
Edad int,
primary key (idCEO)
);

create table Company( 
IdCompany int not null,
Companyname varchar(25) not null,
Fundation date not null,
Paissede varchar(15) not null,
CEO int not null,
website longblob not null,
descrip varchar(50),
primary key (IdCompany),
foreign key (CEO) references CEO (idCEO)
);

create table Distribui( 
IdDistribui int not null,
Distriname varchar(25) not null,
Fundation date not null,
Paissede varchar(15) not null,
CEO int not null,
website longblob not null,
descrip varchar(50),
primary key (IdDistribui),
foreign key (CEO) references CEO (idCEO)
);





