//�f�[�^�x�[�X�쐬
CREATE DATABASE salesmanagement DEFAULT CHARACTER SET utf8;

//�e�[�u���쐬
CREATE TABLE goods(
  GoodsID VARCHAR(4) NOT NULL,
  GoodsName VARCHAR(20) NOT NULL,
  Price INT NOT NULL,
  PRIMARY KEY(GoodsID)
);

//�e�[�u���쐬
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

//�f�[�^�}��
INSERT INTO goods VALUES('1000','�V���v���ȏ����S��',100);
INSERT INTO goods VALUES('1001','�J���t���m�[�g',150);
INSERT INTO goods VALUES('1002','���炫��{�[���y��',120);
INSERT INTO goods VALUES('1003','�V�g�̃�����',200);
INSERT INTO goods VALUES('1004','�`���R�̖�����X�P�[��',1080);
INSERT INTO goods VALUES('1005','�Z���T�[�t�N���b�v',650);
INSERT INTO goods VALUES('1006','�����������ȃm�[�g',1500);
INSERT INTO goods VALUES('1007','�~�X�g�t�{�[���y��',230);

INSERT INTO customer VALUES('0001','�󏤎�','0268-26-999','ao@aaaa.jp');
INSERT INTO customer VALUES('0002','�Ђ܂�菤��','06-6547-8963','info@himawari.como.jp');
INSERT INTO customer VALUES('0003','�܂��Ɏ�','0268-36-3214','makon@plala.pr');
INSERT INTO customer VALUES('0004','�ێq����','0268-26-9999','tatsudai2000@gmail.com');

INSERT INTO salesinfo VALUES(null,'2015-09-24','0004','1000',40)