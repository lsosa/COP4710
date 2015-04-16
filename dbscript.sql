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
	rso			INT(5),
	univ_id		INT(6),
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
	location		VARCHAR (100),
	univ_id			INT(6),
	priv			INT(1),
	rso				INT(5),
	contact_phone	INT(10),
	contact_email	VARCHAR (50)
);

#create the Comments table	
CREATE TABLE comments (
	comment_id		INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	event_id		INT(6),
	user_id			INT(6),
	text			VARCHAR(140)
);

#create the Ratings table	
CREATE TABLE ratings (
	rating_id		INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	event_id		INT(6),
	comment_id		INT(5),
	rating			INT(1),
	user_id			INT(6)
);

#create the RSO table
CREATE TABLE rso(
	rso_id			INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	email			VARCHAR(20),
	admin			INT(11)
);
	


INSERT INTO users (username, password, priv, firstname, lastname, email, reg_date, univ_id, rso) VALUES ("superAdmin", "dc76e9f0c0006e8f919e0c515c66dbba3982f785", 1, "super", "admin", "example@ucf.edu", NOW(), 1, 0);
INSERT INTO users (username, password, priv, firstname, lastname, email, reg_date, univ_id, rso) VALUES ("admin", "dc76e9f0c0006e8f919e0c515c66dbba3982f785", 2, "admin", " ", "example@knights.ucf.edu", NOW(), 1, 1);
INSERT INTO users (username, password, priv, firstname, lastname, email, reg_date, univ_id, rso) VALUES ("user", "5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8", 3, "user", "name", "example@knights.ucf.edu", NOW(), 1, 0);
INSERT INTO users (username, password, priv, firstname, lastname, email, reg_date, univ_id, rso) VALUES ("brockstoops", "5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8", 3, "Brock", "Stoops", "brockstoops@knights.ucf.edu", NOW(), 1, 1);
INSERT INTO users (username, password, priv, firstname, lastname, email, reg_date, univ_id, rso) VALUES ("michaelschnell", "5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8", 3, "michael", "schnell", "mschell@knights.ucf.edu", NOW(), 1, 1);
INSERT INTO universities (name, location, description, num_students, pictures) VALUES("UCF", "Orlando", "University of Central Florida", 56000, null);
INSERT INTO universities (name, location, description, num_students, pictures) VALUES("UCB", "Berkeley", "University of California - Berkeley", 15000, null);
INSERT INTO universities (name, location, description, num_students, pictures) VALUES("USF", "Tampa", "University of South Florida", 30000, null);
INSERT INTO events (name, category, description, event_time, event_date, location, univ_id, priv, rso, contact_phone, contact_email) VALUES ("COP4710", "class", "Database Management Systems", "14:00:00", "2015-04-15", "4000 Central Florida Blvd, Orlando, FL 32816", 1, 0, 0, "4071234567", "andres.vargas@knights.ucf.edu");
INSERT INTO events (name, category, description, event_time, event_date, location, univ_id, priv, rso, contact_phone, contact_email) VALUES ("COP4710 Presentation", "class", "Database Management Systems", "14:30:00", "2015-04-16", "4000 Central Florida Blvd, Orlando, FL 32816", 1, 1, 0, "4071234567", "andres.vargas@knights.ucf.edu"); 
INSERT INTO events (name, category, description, event_time, event_date, location, univ_id, priv, rso, contact_phone, contact_email) VALUES ("COP4516", "class", "Team Dynamics", "09:00:00", "2015-04-17", "4000 Central Florida Blvd, Orlando, FL 32816", 1, 0, 0, "4071234567", "programmer@knights.ucf.edu");
INSERT INTO events (name, category, description, event_time, event_date, location, univ_id, priv, rso, contact_phone, contact_email) VALUES ("CS61B", "class", "Data Structures", "12:30:00", "2015-04-16", "University of California Berkeley", 2, 0, 0, "4071234567", "andres.vargas@calmail.berkeley.edu"); 
INSERT INTO events (name, category, description, event_time, event_date, location, univ_id, priv, rso, contact_phone, contact_email) VALUES ("CS70", "class", "Discrete Math and Probability", "12:30:00", "2015-04-16", "University of California Berkeley", 2, 1, 0, "4071234567", "andres.vargas@calmail.berkeley.edu"); 
INSERT INTO events (name, category, description, event_time, event_date, location, univ_id, priv, rso, contact_phone, contact_email) VALUES ("MAC 2312", "class", "Calculus 2", "15:30:00", "2015-04-17", "University of South Florida", 3, 0, 0, "4071234567", "andres.vargas@bulls.usf.edu");
INSERT INTO events (name, category, description, event_time, event_date, location, univ_id, priv, rso, contact_phone, contact_email) VALUES ("COP4710 Meeting", "class", "Database Management System Group Meeting", "17:30:00", "2015-04-17", "University of Central Florida", 1, 2, 1, "4071234567", "brockstoops@knights.ucf.edu");
INSERT INTO rso (email, admin) VALUES ("knights.ucf.edu", 1);
INSERT INTO comments (event_id, text) VALUES (2, "this presentation is awesome");
INSERT INTO comments (event_id, text) VALUES (2, "this presentation is okay");
INSERT INTO comments (event_id, text) VALUES (2, "this presentation is bad");
INSERT INTO ratings (event_id, rating, comment_id) VALUES (2, 5, 1);
INSERT INTO ratings (event_id, rating, comment_id) VALUES (2, 4, 2);
INSERT INTO ratings (event_id, rating, comment_id) VALUES (2, 2,3);


# Returns events at users university
#need to input the user id
#returns both public and private events
#SELECT e.* FROM events e, universities u, users s WHERE s.univ_id = u.univ_id AND u.location = e.location AND s.user_id = (?)

# Selects all public events from a specific university
#need to input the location of a university
#SELECT e.* FROM events e, universities u WHERE e.location = u.location AND e.priv = 0 AND u.location = (?)

# Selects all public events from a university
#need to input the id of a university
#SELECT e.* FROM events e, universities u WHERE e.location = u.location AND e.priv = 0 AND u.univ_id = (?)

#events in a users RSO
#need to input the user id to return the events
#SELECT e.* FROM events e, users s WHERE s.RSO = e.RSO AND s.user_id = (?)

#public event below
#returns all the public events regardless of location
#SELECT * FROM events WHERE priv = 0

#Returns the private events at a users university
#need to input the user id
#SELECT e.* FROM events e, universities u, users s WHERE s.univ_id = u.univ_id AND u.location = e.location AND e.priv = 1 AND s.user_id = (?)

#Selects all the comments for the event 
#need to input the event id to get the comments
#SELECT c.text FROM comments c, events e WHERE e.event_id = c.event_id AND e.event_id = (?)

#Selects all the ratings from an event
#need to input the event id to get the ratings.
#SELECT r.rating FROM ratings r, events e WHERE e.event_id = r.rating AND e.event_id = (?)

#Selects both comment and rating on an event
#need to input the event id
SELECT c.text, r.rating FROM comments c, ratings r, events e WHERE e.event_id = c.event_id AND r.comment_id = c.comment_id AND e.event_id = 2

#Should return all the available events for a user to see.
#combines multiple queries
#need to input user id
#SELECT DISTINCT e.* FROM events e, users u WHERE u.user_id = (?) AND ((e.priv = 0) OR (e.priv = 1 AND u.univ_id = e.univ_id) OR (e.priv = 2 AND u.rso = e.rso))
