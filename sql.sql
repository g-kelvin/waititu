DROP TABLE request_servicep;
CREATE TABLE request_servicep (
  rsid INT PRIMARY KEY auto_increment,
  servicep_id INT,
  request_id INT,
  completed TINYINT(1) DEFAULT 0,
  created DATETIME DEFAULT CURRENT_TIMESTAMP,

  FOREIGN KEY (servicep_id) REFERENCES servicep(tid),
  FOREIGN KEY (request_id) REFERENCES request(tid)
);