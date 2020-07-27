
drop table if exists tbl.tbl_log_session;
CREATE TABLE IF NOT EXISTS tbl.tbl_log_session
(
	logSessionID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    userID int NOT NULL,
	UNIQUE (logSessionID)
);

drop table if exists tbl.tbl_log;
CREATE TABLE IF NOT EXISTS tbl.tbl_log
(
	logID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    logSessionID int NOT NULL,
    userID int NOT NULL,
    debugLevel varchar(20) NOT NULL,
    msg tinytext,    
	UNIQUE (logID)
);

drop table if exists tbl.tbl_user;
CREATE TABLE IF NOT EXISTS tbl.tbl_user
(
	userID INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
	userName VARCHAR( 20 ) NOT NULL ,
	userPass VARCHAR( 255 ) NOT NULL ,
	email VARCHAR( 255 ) NOT NULL ,
    employeeID int NULL,
    securityLevel varchar(50) NOT NULL default 'user',
	lastLogin DATETIME NOT NULL default NOW(),
	UNIQUE (email)
);

drop table if exists tbl.tbl_biz;
CREATE TABLE IF NOT EXISTS tbl.tbl_biz
(
	bizID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    bizName varchar(100) NOT NULL,
    bizDesc text NOT NULL,
    bizUrl varchar(300) NOT NULL,
    isActiveRecord int not null,
    insertedDateTime datetime not null,
    insertedByUserID int not null,
    deletedDateTime datetime,
    deletedByUserID int not null default 0,
	UNIQUE (bizID)
);
