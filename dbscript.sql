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
CREATE TABLE phpro_users (
	phpro_user_id int(11) NOT NULL auto_increment,
	phpro_username varchar(20) NOT NULL,
	phpro_password char(40) NOT NULL,
	PRIMARY KEY (phpro_user_id),
	UNIQUE KEY phpro_username (phpro_username)
); 
