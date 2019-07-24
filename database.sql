
--table used to store information for user accounts
CREATE TABLE `User_Account` (
  `User_ID` int AUTO_INCREMENT,
  `First_Name` varchar(25),
  `Last_Name` varchar(25),
  `User_Name` varchar(25) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `Phone_Number` varchar(12),
  `Email` varchar(25) NOT NULL,
  `FB_Account` varchar(25),
  PRIMARY KEY (`User_ID`),
  UNIQUE (`User_Name`),
  UNIQUE (`Password`),
  UNIQUE (`Email`)
);

--Settings_and_Locations uses the foreign key Device_ID 
--and unique constraints on Latitude and Longitude.
  CREATE TABLE `Settings_and_Locations` (
  `User_ID` int,
  `Device_ID` varchar(25) NOT NULL,
  `Device_Time_int` int,
  `Power_Saver` int,
  `Interval_Increase` int,
  `Item_Description` varchar(25),
  `Latitude` DOUBLE( 9, 6 ) NOT NULL,
  `Longitude` DOUBLE( 9, 6 ) NOT NULL,
  `Update_time` int,
  `API_Key` varchar(255),
  FOREIGN KEY (`User_ID`) REFERENCES User_Account(`User_ID`),
  FOREIGN KEY (`Device_ID`) REFERENCES Device_Simulation(`Device_ID`),
  UNIQUE (`Latitude`),
  UNIQUE (`Longitude`),
  UNIQUE (`API_Key`)
);

 -- NEW TABLE FOR RETRIEVING SIMULATED COORDINATES

 CREATE TABLE `Device_Simulation` (
  `Device_ID` varchar(25) NOT NULL,
  `Latitude` DOUBLE( 9, 6 ) NOT NULL,
  `Longitude` DOUBLE( 9, 6 ) NOT NULL,
  PRIMARY KEY (`Device_ID`),
  UNIQUE (`Latitude`),
  UNIQUE (`Longitude`)
  );



-- code to insert the location directly into the database BELOW
-- change Device_ID and Latitude and Longitude when inserting other code.
UPDATE Settings_and_Locations 
SET Latitude = 'latitude coordinance here' , Longitude = 'longitude coordinance here'
WHERE Device_ID = 'device ID number' ;



--CODE BELOW WAS USED FOR INSERTING DATA INTO THE Device_Simulation TABLE!!!

--ACCOUNTS CREATED IN Device_Simulation table below.
--first account created
INSERT INTO Device_Simulation (Device_ID, Latitude, Longitude)
VALUES ('rx043', 34.017327, -118.505251);--coordinates on Santa Monica beach

--second account created
INSERT INTO Device_Simulation (Device_ID, Latitude, Longitude)
VALUES ('pk234', 27.960180, -82.435457);--coordinates near the Colombia restoraunt in Tampa, FL

--third account created
INSERT INTO Device_Simulation (Device_ID, Latitude, Longitude)
VALUES ('cz379', 24.546535, -81.797492);--coordinates near southernmost point in Key West, FL

--fourth account created
INSERT INTO Device_Simulation (Device_ID, Latitude, Longitude)
VALUES ('zx409', 40.783814, -73.964598);--coordinates in the middle of central park New York, NY

--fifth account created
INSERT INTO Device_Simulation (Device_ID, Latitude, Longitude)
VALUES ('fn547', 32.754586, -117.197418);--coordinates in Old Town Plaza San Diego, CA

--sixth account created
INSERT INTO Device_Simulation (Device_ID, Latitude, Longitude)
VALUES ('3znx5', 37.810722, -122.476614);--coordinates near Fort Point San Francisco, CA

--seventh account created
INSERT INTO Device_Simulation (Device_ID, Latitude, Longitude)
VALUES ('54fr2', 39.452117, -123.809604);--coordinates near Sea Glass Beach Fort Bragg, CA

--eighth account created
INSERT INTO Device_Simulation (Device_ID, Latitude, Longitude)
VALUES ('nx369', 36.096443, -112.098058);--coordinates on river trail at the Grand Canyon, AZ

