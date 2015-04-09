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
	reg_date	TIMESTAMP
	PRIMARY KEY (user_id),
	UNIQUE KEY 	username (username)
); 

	
#create the Universities table
CREATE TABLE Universities (
	univ_id			INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	univ_name		VARCHAR (30),
	location		VARCHAR (30), 
	description		VARCHAR (50),
	num_students	INT(10),
	pictures		LONGBLOB
);

#create the Events table
CREATE TABLE Events (
	event_id		INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	name			VARCHAR (30),
	category		VARCHAR (30),
	description		VARCHAR (50),
	time			TIMESTAMP,
	date			DATE,
	location		VARCHAR (30),
	contact_phone	INT(10),
	contact_email	VARCHAR (50),
);

#create the Comments table	
CREATE TABLE Comments (
	comment_id		INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	event id		INT(6) FOREIGN KEY
);

#create the Ratings table	
CREATE TABLE Ratings (
	rating_id		INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,	
	event_id		INT(6) FOREIGN KEY
);
	


