/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     23/01/2016 07:19:52 a. m.                    */
/*==============================================================*/


drop table if exists CLASIFICACION;

drop index INDEX_1 on EL_REATON;

drop table if exists EL_REATON;

drop table if exists EVENTOS;

drop table if exists NOTICIAS;

drop table if exists VOLUMENES;

/*==============================================================*/
/* Table: CLASIFICACION                                         */
/*==============================================================*/
create table CLASIFICACION
(
   CVE_CLASIFICACION    int not null,
   DESCRIPCION          varchar(200),
   ACTIVO               bit,
   primary key (CVE_CLASIFICACION)
);

/*==============================================================*/
/* Table: EL_REATON                                             */
/*==============================================================*/
create table EL_REATON
(
   CVE_REATA            int not null,
   HABILITADO           varchar(50),
   FRESITA              varchar(50),
   primary key (CVE_REATA)
);

/*==============================================================*/
/* Index: INDEX_1                                               */
/*==============================================================*/
create index INDEX_1 on EL_REATON
(
   CVE_REATA
);

/*==============================================================*/
/* Table: EVENTOS                                               */
/*==============================================================*/
create table EVENTOS
(
   CVE_EVENTO           int not null,
   CVE_REATA            int,
   NOMBRE               varchar(20),
   FOTO_PRINCIPAL       varchar(30),
   FOTO1                varchar(30),
   FOTO2                varchar(30),
   FOTO3                varchar(30),
   FOTO4                varchar(30),
   DESCRIPCION          varchar(5000),
   FECHA_INICIO         datetime,
   FECHA_FIN            datetime,
   FECHA_GRABO          datetime,
   FECHA_TERMINO        datetime,
   CVE_PERSONA_MODIFICO int,
   primary key (CVE_EVENTO)
);

/*==============================================================*/
/* Table: NOTICIAS                                              */
/*==============================================================*/
create table NOTICIAS
(
   CVE_NOTICIA          int not null,
   CVE_REATA            int,
   TITULO               varchar(30),
   NOTICIA_CORTA        varchar(200),
   NOTICIA              varchar(5000),
   FECHA_INICIO         datetime,
   FECHA_FIN            datetime,
   FOTO_PORTADA         varchar(40),
   FOTO1                varchar(40),
   FOTO2                varchar(40),
   FOTO3                varchar(40),
   FECHA_GRABO          datetime,
   FECHA_MODIFICO       datetime,
   CVE_MODIFICO         int,
   primary key (CVE_NOTICIA)
);

/*==============================================================*/
/* Table: VOLUMENES                                             */
/*==============================================================*/
create table VOLUMENES
(
   CVE_VOLUMEN          int not null,
   CVE_CLASIFICACION    int not null,
   CVE_REATA            int,
   TITULO               varchar(200),
   DESCRIPCION          varchar(200),
   ARCHIVO              varchar(50),
   ACTIVO               bit,
   primary key (CVE_VOLUMEN, CVE_CLASIFICACION)
);

alter table EVENTOS add constraint FK_REFERENCE_2 foreign key (CVE_REATA)
      references EL_REATON (CVE_REATA) on delete restrict on update restrict;

alter table NOTICIAS add constraint FK_REFERENCE_1 foreign key (CVE_REATA)
      references EL_REATON (CVE_REATA) on delete restrict on update restrict;

alter table VOLUMENES add constraint FK_REFERENCE_3 foreign key (CVE_REATA)
      references EL_REATON (CVE_REATA) on delete restrict on update restrict;

alter table VOLUMENES add constraint FK_REFERENCE_4 foreign key (CVE_CLASIFICACION)
      references CLASIFICACION (CVE_CLASIFICACION) on delete restrict on update restrict;

