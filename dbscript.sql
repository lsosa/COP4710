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
	user_id int(11) NOT NULL auto_increment,
	username varchar(20) NOT NULL,
	password char(40) NOT NULL,
	priv int(1) NOT NULL,
	PRIMARY KEY (user_id),
	UNIQUE KEY username (username)
); 
