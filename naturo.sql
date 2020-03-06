#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: DOCUMENTS
#------------------------------------------------------------

CREATE TABLE DOCUMENTS(
        id_doc      Int  Auto_increment  NOT NULL ,
        name        Varchar (100) NOT NULL COMMENT "nom du document"  ,
        extension   Varchar (5) NOT NULL COMMENT "jpg, doc, url video, pdf..."  ,
        description Varchar (255) COMMENT "description du document" 
	,CONSTRAINT DOCUMENTS_PK PRIMARY KEY (id_doc)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: roles
#------------------------------------------------------------

CREATE TABLE roles(
        id_role   Int  Auto_increment  NOT NULL ,
        role_name Varchar (25) NOT NULL COMMENT "utilisateur ou administrateur" 
	,CONSTRAINT roles_PK PRIMARY KEY (id_role)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: users
#------------------------------------------------------------

CREATE TABLE users(
        id_user   Int  Auto_increment  NOT NULL ,
        psw       Varchar (25) NOT NULL ,
        lastname  Varchar (50) NOT NULL ,
        firstname Varchar (50) NOT NULL ,
        address   Varchar (100) NOT NULL ,
        zipcode   Int NOT NULL ,
        city      Varchar (50) NOT NULL ,
        email     Varchar (100) ,
        phone     Int NOT NULL ,
        role      Varchar (10) COMMENT "code pour l'administrateur ou vide pour les utilisateurs"  ,
        id_role   Int NOT NULL
	,CONSTRAINT users_PK PRIMARY KEY (id_user)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: rendezvous
#------------------------------------------------------------

CREATE TABLE rendezvous(
        id_rdv        Int  Auto_increment  NOT NULL ,
        daterdv       Datetime NOT NULL ,
        id_user       Int NOT NULL ,
        id_speciality Int NOT NULL
	,CONSTRAINT rendezvous_PK PRIMARY KEY (id_rdv)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: specialities
#------------------------------------------------------------

CREATE TABLE specialities(
        id_speciality Int  Auto_increment  NOT NULL ,
        speciality    Varchar (5) NOT NULL ,
        id            Int NOT NULL
	,CONSTRAINT specialities_PK PRIMARY KEY (id_speciality)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: time_slots
#------------------------------------------------------------

CREATE TABLE time_slots(
        id                        Int  Auto_increment  NOT NULL ,
        appointment_time          Time NOT NULL COMMENT "durée : 1/2h, 1h, 1h30"  ,
        without_appointment_start Date NOT NULL COMMENT "jour sans rdv début"  ,
        without_appointment_end   Date NOT NULL COMMENT "jour sans rdv fin"  ,
        id_speciality             Int NOT NULL
	,CONSTRAINT time_slots_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: correspond
#------------------------------------------------------------

CREATE TABLE correspond(
        id_doc        Int NOT NULL ,
        id_speciality Int NOT NULL
	,CONSTRAINT correspond_PK PRIMARY KEY (id_doc,id_speciality)
)ENGINE=InnoDB;




ALTER TABLE users
	ADD CONSTRAINT users_roles0_FK
	FOREIGN KEY (id_role)
	REFERENCES roles(id_role);

ALTER TABLE rendezvous
	ADD CONSTRAINT rendezvous_users0_FK
	FOREIGN KEY (id_user)
	REFERENCES users(id_user);

ALTER TABLE rendezvous
	ADD CONSTRAINT rendezvous_specialities1_FK
	FOREIGN KEY (id_speciality)
	REFERENCES specialities(id_speciality);

ALTER TABLE specialities
	ADD CONSTRAINT specialities_time_slots0_FK
	FOREIGN KEY (id)
	REFERENCES time_slots(id);

ALTER TABLE specialities 
	ADD CONSTRAINT specialities_time_slots0_AK 
	UNIQUE (id);

ALTER TABLE time_slots
	ADD CONSTRAINT time_slots_specialities0_FK
	FOREIGN KEY (id_speciality)
	REFERENCES specialities(id_speciality);

ALTER TABLE time_slots 
	ADD CONSTRAINT time_slots_specialities0_AK 
	UNIQUE (id_speciality);

ALTER TABLE correspond
	ADD CONSTRAINT correspond_DOCUMENTS0_FK
	FOREIGN KEY (id_doc)
	REFERENCES DOCUMENTS(id_doc);

ALTER TABLE correspond
	ADD CONSTRAINT correspond_specialities1_FK
	FOREIGN KEY (id_speciality)
	REFERENCES specialities(id_speciality);