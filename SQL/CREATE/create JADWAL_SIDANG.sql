CREATE TABLE JADWAL_SIDANG(
   idjadwal INTEGER  NOT NULL
  ,idmks  INTEGER  NOT NULL
  ,tanggal DATE  NOT NULL
  ,jammulai TIME  NOT NULL
  ,jamselesai TIME  NOT NULL
  ,idruangan INT  NOT NULL
PRIMARY KEY (idjadwal,idmks)
);