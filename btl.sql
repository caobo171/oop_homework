create table if not exists Household(
	id int primary key auto_increment,
	householder_name varchar(255),
	householder_id int,
	house_no varchar(128),
	house_street varchar(255),
	house_ward varchar(255),
	house_city varchar(255),

	since datetime,
	last_update datetime
);

create table if not exists People(
	id int primary key auto_increment,
	name varchar(255),
	nickname varchar(255),
	birth_day datetime,
	native_place text,
	sex int,
	ethnic varchar(128),
	id_card_no varchar(128),
	job varchar(255),
	job_place text,
	household_id int,
	householder_relationship varchar(255),
	status varchar(255),

	since datetime,
	last_update datetime,

	foreign key (household_id) REFERENCES Household(id)
);

create table if not exists ActionLogs(
	id int primary key auto_increment,
	action_type varchar(255),
	name varchar(255),
	people_id int,
	household_id int,
	description text,

	since datetime,
	last_update datetime,

	foreign key (people_id) REFERENCES People(id),
	foreign key (household_id) REFERENCES Household(id)
);

CREATE TABLE ReceiptTypes (
	id int primary key auto_increment,
	type_name varchar(255),
	description text,

	since datetime,
	last_update datetime
);


create table if not exists Receipts (
	id int primary key auto_increment,
	household_id int,
    householder_name varchar(255),
	type_id int,
	amount int,
	receive_date datetime,
	description text,

	since datetime,
	last_update datetime,

	foreign key (type_id) REFERENCES ReceiptTypes(id),
	foreign key (household_id) REFERENCES Household(id)
);