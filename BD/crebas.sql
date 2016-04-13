/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     13/04/2016 16:03:53                          */
/*==============================================================*/


drop index INDEX_1 on CAT_APARTADOS;

drop table if exists CAT_APARTADOS;

drop index INDEX_1 on CAT_ARTICULOS;

drop table if exists CAT_ARTICULOS;

drop index INDEX_1 on CAT_FRACCIONES;

drop table if exists CAT_FRACCIONES;

drop index INDEX_1 on CAT_INCISOS;

drop table if exists CAT_INCISOS;

drop index INDEX_1 on CAT_TRANSPARENCIA;

drop table if exists CAT_TRANSPARENCIA;

drop index INDEX_1 on DOCUMENTACION_TRANSPARENCIA;

drop table if exists DOCUMENTACION_TRANSPARENCIA;

drop index INDEX_1 on EL_REATON;

drop table if exists EL_REATON;

drop index INDEX_1 on EVENTOS;

drop table if exists EVENTOS;

drop index INDEX_1 on NOTICIAS;

drop table if exists NOTICIAS;

/*==============================================================*/
/* Table: CAT_APARTADOS                                         */
/*==============================================================*/
create table CAT_APARTADOS
(
   CVE_ARTICULO         int not null,
   CVE_FRACCION         int not null,
   CVE_INCISO           int not null,
   CVE_APARTADO         int not null,
   DESCRIPCION          varchar(200),
   ACTIVO               bit,
   primary key (CVE_ARTICULO, CVE_FRACCION, CVE_INCISO, CVE_APARTADO)
);

/*==============================================================*/
/* Index: INDEX_1                                               */
/*==============================================================*/
create index INDEX_1 on CAT_APARTADOS
(
   CVE_ARTICULO,
   CVE_FRACCION,
   CVE_INCISO,
   CVE_APARTADO
);

/*==============================================================*/
/* Table: CAT_ARTICULOS                                         */
/*==============================================================*/
create table CAT_ARTICULOS
(
   CVE_ARTICULO         int not null,
   DESCRIPCION          varchar(11),
   ACTIVO               bit,
   primary key (CVE_ARTICULO)
);

/*==============================================================*/
/* Index: INDEX_1                                               */
/*==============================================================*/
create index INDEX_1 on CAT_ARTICULOS
(
   CVE_ARTICULO
);

/*==============================================================*/
/* Table: CAT_FRACCIONES                                        */
/*==============================================================*/
create table CAT_FRACCIONES
(
   CVE_ARTICULO         int not null,
   CVE_FRACCION         int not null,
   DESCRIPCION          varchar(10),
   ACTIVO               bit,
   primary key (CVE_ARTICULO, CVE_FRACCION)
);

/*==============================================================*/
/* Index: INDEX_1                                               */
/*==============================================================*/
create index INDEX_1 on CAT_FRACCIONES
(
   CVE_ARTICULO,
   CVE_FRACCION
);

/*==============================================================*/
/* Table: CAT_INCISOS                                           */
/*==============================================================*/
create table CAT_INCISOS
(
   CVE_ARTICULO         int not null,
   CVE_FRACCION         int not null,
   CVE_INCISO           int not null,
   DESCRIPCION          varchar(500),
   ACTIVO               bit,
   primary key (CVE_ARTICULO, CVE_FRACCION, CVE_INCISO)
);

/*==============================================================*/
/* Index: INDEX_1                                               */
/*==============================================================*/
create index INDEX_1 on CAT_INCISOS
(
   CVE_ARTICULO,
   CVE_FRACCION,
   CVE_INCISO
);

/*==============================================================*/
/* Table: CAT_TRANSPARENCIA                                     */
/*==============================================================*/
create table CAT_TRANSPARENCIA
(
   CVE_ARTICULO         int not null,
   DESCRIPCION_ARTICULO varchar(100),
   CVE_FRACCION         int not null,
   DESCRIPCION_FRACCION varchar(100),
   CVE_INCISO           int not null,
   DESCRIPCION_INCISO   varchar(100),
   CVE_APARTADO         int not null,
   DESCRIPCION_APARTADO varchar(200),
   CVE_CLASIFICACION_APARTADO int not null,
   DESCRIPCION_CLASIFICACION_APARTADO varchar(50),
   primary key (CVE_ARTICULO, CVE_FRACCION, CVE_INCISO, CVE_APARTADO, CVE_CLASIFICACION_APARTADO)
);

/*==============================================================*/
/* Index: INDEX_1                                               */
/*==============================================================*/
create index INDEX_1 on CAT_TRANSPARENCIA
(
   CVE_ARTICULO,
   CVE_FRACCION,
   CVE_INCISO,
   CVE_APARTADO,
   CVE_CLASIFICACION_APARTADO
);

/*==============================================================*/
/* Table: DOCUMENTACION_TRANSPARENCIA                           */
/*==============================================================*/
create table DOCUMENTACION_TRANSPARENCIA
(
   CVE_ARTICULO         int not null,
   CVE_FRACCION         int not null,
   CVE_INCISO           int not null,
   CVE_APARTADO         int not null,
   CVE_CLASIFICACION_APARTADO int not null,
   ANIO                 int not null,
   TRIMESTRE            int not null,
   CVE_EXPEDIENTE       int not null,
   DESCRIPCION          varchar(500),
   EXPEDIENTE           varchar(50),
   FOLIO                varchar(50),
   RESPUESTA            varchar(100),
   ANEXO                varchar(100),
   PDF                  varchar(150),
   primary key (CVE_EXPEDIENTE)
);

/*==============================================================*/
/* Index: INDEX_1                                               */
/*==============================================================*/
create index INDEX_1 on DOCUMENTACION_TRANSPARENCIA
(
   CVE_ARTICULO,
   CVE_FRACCION,
   CVE_INCISO,
   CVE_APARTADO,
   CVE_CLASIFICACION_APARTADO,
   ANIO,
   TRIMESTRE
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
/* Index: INDEX_1                                               */
/*==============================================================*/
create index INDEX_1 on EVENTOS
(
   CVE_EVENTO
);

/*==============================================================*/
/* Table: NOTICIAS                                              */
/*==============================================================*/
create table NOTICIAS
(
   CVE_NOTICIA          int not null,
   CVE_REATA            int,
   TIPO_EVENTO          int not null comment '1,-Boletin
            2.-Comunicado
            3.-Aviso',
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
   primary key (CVE_NOTICIA, TIPO_EVENTO)
);

/*==============================================================*/
/* Index: INDEX_1                                               */
/*==============================================================*/
create index INDEX_1 on NOTICIAS
(
   CVE_NOTICIA,
   TIPO_EVENTO
);

alter table CAT_APARTADOS add constraint FK_REFERENCE_6 foreign key (CVE_ARTICULO, CVE_FRACCION, CVE_INCISO)
      references CAT_INCISOS (CVE_ARTICULO, CVE_FRACCION, CVE_INCISO) on delete restrict on update restrict;

alter table CAT_FRACCIONES add constraint FK_REFERENCE_4 foreign key (CVE_ARTICULO)
      references CAT_ARTICULOS (CVE_ARTICULO) on delete restrict on update restrict;

alter table CAT_INCISOS add constraint FK_REFERENCE_5 foreign key (CVE_ARTICULO, CVE_FRACCION)
      references CAT_FRACCIONES (CVE_ARTICULO, CVE_FRACCION) on delete restrict on update restrict;

alter table CAT_TRANSPARENCIA add constraint FK_REFERENCE_7 foreign key (CVE_ARTICULO, CVE_FRACCION, CVE_INCISO, CVE_APARTADO)
      references CAT_APARTADOS (CVE_ARTICULO, CVE_FRACCION, CVE_INCISO, CVE_APARTADO) on delete restrict on update restrict;

alter table DOCUMENTACION_TRANSPARENCIA add constraint FK_REFERENCE_3 foreign key (CVE_ARTICULO, CVE_FRACCION, CVE_INCISO, CVE_APARTADO, CVE_CLASIFICACION_APARTADO)
      references CAT_TRANSPARENCIA (CVE_ARTICULO, CVE_FRACCION, CVE_INCISO, CVE_APARTADO, CVE_CLASIFICACION_APARTADO) on delete restrict on update restrict;

alter table EVENTOS add constraint FK_REFERENCE_2 foreign key (CVE_REATA)
      references EL_REATON (CVE_REATA) on delete restrict on update restrict;

alter table NOTICIAS add constraint FK_REFERENCE_1 foreign key (CVE_REATA)
      references EL_REATON (CVE_REATA) on delete restrict on update restrict;

