/* Delete the tables if they already exist */
drop table if exists Borrower;
drop table if exists Lender;
drop table if exists Intermediary;
drop table if exists LoanRequest;
drop table if exists Loan;
drop table if exists Repayment;
drop table if exists Deadline;
drop table if exists Commitment;
drop table if exists Trust;


/* Create the schema for our tables */
create table Borrower(BId int NOT NULL, Name text, Town text, StreetName text, StreetNumber int, PostalCode int, 
	PRIMARY KEY (BId)) ENGINE=INNODB;

create table Lender(LId int NOT NULL, Name text, Town text, StreetName text, StreetNumber int, PostalCode int, 
	PRIMARY KEY (LId)) ENGINE=INNODB;

create table Intermediary(MId int NOT NULL, Name text, Town text, StreetName text, StreetNumber int, PostalCode int, 
	PRIMARY KEY (MId)) ENGINE=INNODB;

create table LoanRequest(BId int NOT NULL, DateOfRequest date NOT NULL, Deadline date, Amount int, PaybackPeriod int, Description text, 
Percentage float,
  PRIMARY KEY(BId,DateOfRequest),
  FOREIGN KEY (BId) REFERENCES Borrower(BId) ON DELETE CASCADE) ENGINE=INNODB;


CREATE INDEX date_index on LoanRequest (DateOfRequest) USING BTREE;

create table Loan(Id int NOT NULL,  DateOfApproval date, MId int, BId int, DateOfRequest date NOT NULL, 
PRIMARY KEY (Id), 
 FOREIGN KEY (MId) REFERENCES Intermediary(MId),
 FOREIGN KEY (BId) REFERENCES Borrower(BId),
 FOREIGN KEY (DateOfRequest) REFERENCES LoanRequest(DateOfRequest)
) ENGINE=INNODB; 


create table Repayment(Id int NOT NULL, DateOfPayment date, Amount int,
  PRIMARY KEY (Id, DateOfPayment),
  FOREIGN KEY (Id) REFERENCES Loan(Id)
 ) ENGINE=INNODB;

create table Deadline(Id int NOT NULL, DateOfAgreement date, Deadline date,
  PRIMARY KEY (Id, DateOfAgreement),
  FOREIGN KEY (Id) REFERENCES Loan(Id) ON DELETE CASCADE
) ENGINE=INNODB;

create table Commitment(LId int, BId int, DateOfRequest date, Amount int,
  PRIMARY KEY (LId,BId, DateOfRequest),
  FOREIGN KEY (LId) REFERENCES Lender(LId) ON DELETE CASCADE,
  FOREIGN KEY (BId) REFERENCES Borrower(BId) ON DELETE CASCADE,
  FOREIGN KEY (DateOfRequest) REFERENCES LoanRequest(DateOfRequest)
) ENGINE=INNODB;
create table Trust(BId int, LId int, Percentage float,
  PRIMARY KEY (LId,BId),
  FOREIGN KEY (LId) REFERENCES Lender(LId) ON DELETE CASCADE,
  FOREIGN KEY (BId) REFERENCES Borrower(BId) ON DELETE CASCADE) ENGINE=INNODB;




