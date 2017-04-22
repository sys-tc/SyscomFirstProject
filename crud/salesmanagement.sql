//データベース作成
CREATE DATABASE salesmanagement DEFAULT CHARACTER SET utf8;

//テーブル作成
CREATE TABLE goods(
  GoodsID VARCHAR(4) NOT NULL,
  GoodsName VARCHAR(20) NOT NULL,
  Price INT NOT NULL,
  PRIMARY KEY(GoodsID)
);

//テーブル作成
CREATE TABLE goods(
  GoodsID VARCHAR(4) NOT NULL,
  GoodsName VARCHAR(20) NOT NULL,
  Price INT NOT NULL,
  PRIMARY KEY(GoodsID)
);

CREATE TABLE customer(
  CustomerID VARCHAR(4) NOT NULL,
  CustomerName VARCHAR(30) NOT NULL,
  TEL VARCHAR(12),
  Email VARCHAR(50),
  PRIMARY KEY(CustomerID)
);

CREATE TABLE salesinfo(
  id INT AUTO_INCREMENT NOT NULL,
  SalesDate DATE NOT NULL,
  CustomerID VARCHAR(4) NOT NULL,
  GoodsID VARCHAR(4) NOT NULL,
  Quantity INT NOT NULL,
  PRIMARY KEY(id)
);

//データ挿入
INSERT INTO goods VALUES('1000','シンプルな消しゴム',100);
INSERT INTO goods VALUES('1001','カラフルノート',150);
INSERT INTO goods VALUES('1002','きらきらボールペン',120);
INSERT INTO goods VALUES('1003','天使のメモ帳',200);
INSERT INTO goods VALUES('1004','チョコの味するスケール',1080);
INSERT INTO goods VALUES('1005','センサー付クリップ',650);
INSERT INTO goods VALUES('1006','おせっかいなノート',1500);
INSERT INTO goods VALUES('1007','ミスト付ボールペン',230);

INSERT INTO customer VALUES('0001','青空商事','0268-26-999','ao@aaaa.jp');
INSERT INTO customer VALUES('0002','ひまわり商事','06-6547-8963','info@himawari.como.jp');
INSERT INTO customer VALUES('0003','まこに酒造','0268-36-3214','makon@plala.pr');
INSERT INTO customer VALUES('0004','丸子文具','0268-26-9999','tatsudai2000@gmail.com');

INSERT INTO salesinfo VALUES(null,'2015-09-24','0004','1000',40)