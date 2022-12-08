-- SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
-- START TRANSACTION;
-- SET time_zone = "+00:00";

-- /*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
-- /*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
-- /*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
-- /*!40101 SET NAMES utf8mb4 */;

-- * Database: Web_Ass
CREATE DATABASE Web_Ass;

USE Web_Ass;

-- * User
CREATE TABLE User
(
    ID          int(11)        NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Name        varchar(255)   NOT NULL,
    Username    varchar(255)   NOT NULL,
    Password    varchar(255)   NOT NULL,
    Level       int(1)         NOT NULL DEFAULT 1
);

-- Insert
INSERT INTO User (Name, Username, Password, Level) VALUES ('admin', 'admin', 'Admin123', 1);

-- * Category
CREATE TABLE Category
(
    ID   int(11)      NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Name varchar(255) NOT NULL UNIQUE
);

-- Insert
INSERT INTO Category (Name) VALUES ('Animal');
INSERT INTO Category (Name) VALUES ('Food');

-- * Test
CREATE TABLE Test
(
    ID       int(11)      NOT NULL PRIMARY KEY AUTO_INCREMENT,
    T_Name   varchar(255) NOT NULL,
    Level    int(1)       NOT NULL, -- 1 -> 6   (Beginner, Elementary, Intermediate,
                                    --          Upper Intermediate, Advanced, Proficient
    Num_Ques int(3)       NOT NULL DEFAULT 0
);

-- * Test_Cate
CREATE TABLE Test_Cate
(
    C_ID    int(11) NOT NULL,
    T_ID    int(11) NOT NULL,
    PRIMARY KEY (C_ID, T_ID),
    FOREIGN KEY (C_ID) REFERENCES Category(ID),     -- Test_Cate -> Category
    FOREIGN KEY (T_ID) REFERENCES Test(ID)          -- Test_Cate -> Test
);

-- * Question
CREATE TABLE Question
(
    ID          int(11)      NOT NULL PRIMARY KEY AUTO_INCREMENT,
    T_ID        int(11)      NOT NULL,
    Content     varchar(255) NOT NULL,
    Option_A    varchar(255) NOT NULL,
    Option_B    varchar(255) NOT NULL,
    Option_C    varchar(255),
    Option_D    varchar(255),
    Answer      varchar(1)   NOT NULL,
    FOREIGN KEY (T_ID) REFERENCES Test(ID)
);

-- * User_Test
CREATE TABLE User_Test
(
    U_ID    int(11)         NOT NULL,
    T_ID    int(11)         NOT NULL,
    Score   double(4,2)     NOT NULL,
    Date    datetime        NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (U_ID) REFERENCES User(ID),
    FOREIGN KEY (T_ID) REFERENCES Test(ID)
);

-- COMMIT;
--
-- /*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
-- /*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
-- /*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;