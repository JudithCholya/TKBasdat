CREATE TABLE TIMELINE(
   idTimeline INTEGER  NOT NULL PRIMARY KEY 
  ,Nama_event VARCHAR(100) NOT NULL
  ,Tanggal    DATE  NOT NULL
  ,Tahun      INT NOT NULL
  ,Semester   INT NOT NULL
  ,FOREIGN KEY (Tahun,Semester) REFERENCES TERM(Tahun,Semester)
);


