CREATE TABLE DOSEN_PEMBIMBING(
   idmks  INTEGER  NOT NULL REFERENCES MATA_KULIAH_SPESIAL(IDMKS) ON DELETE RESTRICT ON UPDATE RESTRICT
  ,nipdosenpembimbing VARCHAR(20) NOT NULL REFERENCES DOSEN(NIP) ON DELETE RESTRICT ON UPDATE RESTRICT
,PRIMARY KEY (idmks,nipdosenpembimbing)
);