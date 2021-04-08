CREATE TABLE Resources (
	ResourceID int NOT NULL PRIMARY KEY,
);

CREATE TABLE Tunings (
	ResourceID int NOT NULL PRIMARY KEY FOREIGN KEY REFERENCES Resources(ResourceID),
	Name varchar(20) NOT NULL,
	Source varbinary(max) NOT NULL,
	isActive tinyint NOT NULL,
);

CREATE TABLE Scales (
	ResourceID int NOT NULL PRIMARY KEY FOREIGN KEY REFERENCES Resources(ResourceID),
	Name varchar(20) NOT NULL,
	Source varbinary(max) NOT NULL,
	isActive tinyint NOT NULL,
);

CREATE TABLE Intervals (
	ResourceID int NOT NULL PRIMARY KEY FOREIGN KEY REFERENCES Resources(ResourceID),
	Name varchar(20) NOT NULL,
	Source varbinary(max) NOT NULL,
	isActive tinyint NOT NULL,
);

CREATE TABLE [Chord Shapes] (
	ResourceID int NOT NULL PRIMARY KEY FOREIGN KEY REFERENCES Resources(ResourceID),
	Name varchar(20) NOT NULL,
	Source varbinary(max) NOT NULL,
	isActive tinyint NOT NULL
);

CREATE TABLE [User Accounts] (
	UserID int NOT NULL PRIMARY KEY,
	Username varchar(50) NOT NULL,
	Password varchar(30) NOT NULL,
	Email varchar(50) NOT NULL,
);

CREATE TABLE [User Resources] (
	UserID int NOT NULL PRIMARY KEY FOREIGN KEY REFERENCES [User Accounts](UserID),
	ResourceID int NOT NULL FOREIGN KEY REFERENCES Resources(ResourceID),
);