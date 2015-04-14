# SQL commands to create and populate the MySQL database for
# COP 4710 - Spring 2015
#
# delete the database if it already exists
drop database if exists cop4710;

#create a new database named cop4710
create database cop4710;

#switch to the new database
use cop4710;

#create the users table
CREATE TABLE users (
	user_id 	INT(11) NOT NULL auto_increment,
	username 	varchar(20) NOT NULL,
	password 	char(40) NOT NULL,
	priv 		int(1) NOT NULL,
	firstname	VARCHAR(30) NOT NULL,
	lastname	VARCHAR(30) NOT NULL,
	email		VARCHAR(50),
	reg_date	TIMESTAMP,
	rso		INT(5),
	PRIMARY KEY (user_id),
	UNIQUE KEY 	username (username)
); 

	
#create the Universities table
CREATE TABLE universities (
	univ_id			INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	name			VARCHAR (30),
	location		VARCHAR (30), 
	description		VARCHAR (50),
	num_students	INT(10),
	pictures		LONGBLOB
);

#create the Events table
CREATE TABLE events (
	event_id		INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	name			VARCHAR (30),
	category		VARCHAR (30),
	description		VARCHAR (50),
	event_time		VARCHAR (50),
	event_date		VARCHAR (50), 
	location		VARCHAR (30),
	univ_id			INT(6),
	priv			INT(1),
	rso			INT(5),
	contact_phone	INT(10),
	contact_email	VARCHAR (50)
);

#create the Comments table	
CREATE TABLE comments (
	comment_id		INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	event_id		INT(6),
	text			VARCHAR(140)
);

#create the Ratings table	
CREATE TABLE ratings (
	rating_id		INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	event_id		INT(6)	
);

#create the RSO table
CREATE TABLE rso(
	rso_id			INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	email			VARCHAR(20),
	admin			INT(11)
);
	


INSERT INTO users (username, password, priv, firstname, lastname, email, reg_date) VALUES ("admin", "dc76e9f0c0006e8f919e0c515c66dbba3982f785", 1, "admin", "user", "example@ucf.edu", NOW());
INSERT INTO users (username, password, priv, firstname, lastname, email, reg_date) VALUES ("user", "5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8", 3, "user", "name", "example@knights.ucf.edu", NOW());
INSERT INTO universities (name, location, description, num_students, pictures) VALUES("UCF", "Orlando", "University of Central Florida", 56000, null);
INSERT INTO events (name, category, description, event_time, event_date, location, univ_id, rso, contact_phone, contact_email) VALUES ("COP4710", "class", "Database Management Systems", "14:00:00", "2015-04-16", "Orlando", 0, 0, "4071234567", "andres.vargas@knights.ucf.edu") 

# events at users university
#SELECT e.* FROM events e, universities u, users s WHERE s.univ_id = u.univ_id AND u.location = e.location
#SELECT e.* FROM events e, universities u WHERE e.location = u.location AND u.location = (?)
#events in a users RSO
#SELECT e.* FROM events e, users s WHERE s.RSO = e.RSO
#public event below
#SELECT e.* FROM events e, universities u, users s WHERE e.privacy = 0
#private event below
#SELECT e.* FROM events e, universities u, users s WHERE s.univ_id = u.univ_id AND u.location = e.location AND e.privacy = 1

