-- Table structure for table user
CREATE TABLE USER(
  username VARCHAR(10) NOT NULL, 
  password VARCHAR(10) NOT NULL, 
  fullName VARCHAR(20) NOT NULL, 
  totalPoint INTEGER NOT NULL DEFAULT 0, 
  type varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (username)
) ;


-- Table structure for table material
CREATE TABLE MATERIAL(
  materialID VARCHAR(10), 
  materialName VARCHAR(10) NOT NULL, 
  description VARCHAR(20) NOT NULL, 
  pointPerKg INTEGER NOT NULL,   
  PRIMARY KEY (materialID)
) ;

INSERT INTO material (materialID, materialName, description, pointPerKg) VALUES
('m1', 'Plastic', 'Bottle, cup, plate', 50),
('m10', 'battery', 'any type', 30),
('m2', 'Paper', 'magazine, newspaper', 20),
('m3', 'wood', 'branch, trunk', 30),
('m4', 'metal', 'iron, silver', 40),
('m5', 'rubber', 'tire', 60),
('m6', 'food packa', 'any of food packagin', 20),
('m7', 'fabric', 'old clothes', 30),
('m8', 'Electronic', 'tv, radio, ac', 80),
('m9', 'can', 'canned drink', 20);

-- Table structure for table collector
CREATE TABLE COLLECTOR(
  username VARCHAR(10) NOT NULL,   
  address VARCHAR(30) NOT NULL,
  materialID VARCHAR(10),
  PRIMARY KEY (username),
  FOREIGN KEY (username) REFERENCES USER (username),
  FOREIGN KEY (materialID) REFERENCES MATERIAL(materialID)
) ;


CREATE TABLE RECYCLER	(
  username VARCHAR(10) NOT NULL,   
  ecoLevel VARCHAR(10) ,
  PRIMARY KEY (username),
  FOREIGN KEY (username) REFERENCES USER(username)
) ;

-- Table structure for table `submission`

CREATE TABLE SUBMISSION(
  submissionID VARCHAR(10), 
  proposedDate DATE NOT NULL, 
  actualDate DATE, 
  weightInKg INTEGER NOT NULL,
  pointsAwarded INTEGER,
  status VARCHAR(10),
  materialID VARCHAR(10),
  CollectorUname VARCHAR(10), 
  RecyclerUname VARCHAR(10),
  PRIMARY KEY (submissionID),
  FOREIGN KEY (CollectorUname) REFERENCES COLLECTOR(username),
  FOREIGN KEY (RecyclerUname) REFERENCES RECYCLER(username),
  FOREIGN KEY (materialID) REFERENCES MATERIAL(materialID)
) ;	
