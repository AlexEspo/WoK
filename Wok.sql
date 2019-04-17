CREATE DATABASE WoK;
CREATE TABLE Customers (
    Username    varchar(24)    NOT NULL,
    Name        varchar(24)    NOT NULL,
    Email       varchar(320)   NOT NULL,
    Address     varchar(50)    NOT NULL,
    BirthDate   DATE           NOT NULL,
    Password    varchar(40)    NOT NULL,
    Primary Key(Username)


);

CREATE TABLE EMPLOYEE(
    Name    varchar(24) NOT NULL,
    Hourly_Pay  double  NOT NULL,
    SSN     char(9)     NOT NULL,
    Address varchar(50) NOT NULL,
    BirthDate   Date    NOT NULL,
    StartDate   Date    NOT NULL,
    SupervisorID    char(9)  NOT NULL,
    UserType char(1) NOT NULL,
    Primary Key(SSN),
    Foreign Key(SupervisorID) REFERENCES EMPLOYEE(SSN)
    );
    
CREATE TABLE Sneaker_Type(
    Price   double      NOT NULL,
    Color   varchar(10)     NOT NULL,
    SneakerName   varchar(30)   NOT NULL,
    SSN     char(9)     NOT NULL,
    Primary Key(SneakerName),
    Foreign Key(SSN) REFERENCES EMPLOYEE(SSN)

);

CREATE TABLE Receipts(
    CustomerName    varchar(24)     NOT NULL,
    Address     varchar(50)         NOT NULL,
    TotalPrice  double              NOT NULL,
    SneakerName varchar(30)         NOT NULL,
    NumberOfSneakersBought  int     NOT NULL,
    DateofPurchase  Date            NOT NULL,
    ReceiptID       int             NOT NULL,
    Primary Key(ReceiptID)
);

CREATE TABLE EmployeeSchedule(
    SSN     char(9)     NOT NULL,
    dateOfBeginnningWeek date       NOT NULL,
    numDaysWork     char(7),
    
    Foreign Key(SSN) REFERENCES EMPLOYEE(SSN)
);
CREATE TABLE viewCustomerReceipts(
    SneakerName     varchar(50)          NOT NULL,
    Username        varchar(24)     NOT NULL,
    CustomerName    varchar(24)     NOT NULL,
    TotalPrice      double          NOT NULL,
    NumberOfSneakersBought  int     NOT NULL,
    Address         varchar(50)     NOT NULL,
    Date            date            NOT NULL,
    ReceiptID       int             NOT NULL,
    Foreign Key(ReceiptID) REFERENCES Receipts(ReceiptID),
    Foreign Key(Username) REFERENCES Customers(Username)
);

// Joins SELECT Receipts.SneakerName, Receipts.CustomerName, Receipts.TotalPrice, Receipts.NumberOfSneakersBought, Receipts.Address, Receipts.DateofPurchase FROM viewCustomerReceipts INNER JOIN Receipts ON Receipts.ReceiptID = viewCustomerReceipts.ReceiptID;