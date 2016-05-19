/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     19/05/2016 15:24:32                          */
/*==============================================================*/


drop index INDEX_1 on CATEGORIAS_TRAMITES;

drop table if exists CATEGORIAS_TRAMITES;

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

drop index INDEX_1 on CLASIFICACIONES_TRAMITES;

drop table if exists CLASIFICACIONES_TRAMITES;

drop index INDEX_1 on DEPENDENCIAS;

drop index INDEX_2 on DEPENDENCIAS;

drop table if exists DEPENDENCIAS;

drop index INDEX_1 on DOCUMENTACION_TRANSPARENCIA;

drop table if exists DOCUMENTACION_TRANSPARENCIA;

drop index INDEX_1 on EL_REATON;

drop table if exists EL_REATON;

drop index INDEX_1 on EVENTOS;

drop table if exists EVENTOS;

drop index INDEX_1 on NOTICIAS;

drop table if exists NOTICIAS;

drop index INDEX_1 on TIPOS_DEPENDENCIA;

drop table if exists TIPOS_DEPENDENCIA;

drop index INDEX_1 on TIPOS_TRAMITES;

drop index INDEX_2 on TIPOS_TRAMITES;

drop table if exists TIPOS_TRAMITES;

drop index INDEX_1 on TRAMITES;

drop index INDEX_2 on TRAMITES;

drop index INDEX_3 on TRAMITES;

drop index INDEX_4 on TRAMITES;

drop index INDEX_5 on TRAMITES;

drop table if exists TRAMITES;

/*==============================================================*/
/* Table: CATEGORIAS_TRAMITES                                   */
/*==============================================================*/
create table CATEGORIAS_TRAMITES
(
   CVE_CATEGORIA_TRAMITE int not null,
   NOMBRE               varchar(50),
   ACTIVO               bit,
   primary key (CVE_CATEGORIA_TRAMITE)
);

/*==============================================================*/
/* Index: INDEX_1                                               */
/*==============================================================*/
create index INDEX_1 on CATEGORIAS_TRAMITES
(
   CVE_CATEGORIA_TRAMITE
);

/*==============================================================*/
/* Table: CAT_APARTADOS                                         */
/*==============================================================*/
create table CAT_APARTADOS
(
   CVE_ARTICULO         int not null,
   CVE_FRACCION         int not null,
   CVE_INCISO           int not null,
   CVE_APARTADO         int not null,
   DESCRIPCION          varchar(50),
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
   CVE_FRACCION         int not null,
   CVE_INCISO           int not null,
   CVE_APARTADO         int not null,
   CVE_CLASIFICACION_APARTADO int not null,
   DESCRIPCION          varchar(50),
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
/* Table: CLASIFICACIONES_TRAMITES                              */
/*==============================================================*/
create table CLASIFICACIONES_TRAMITES
(
   CVE_CLASIFICACION_TRAMITE int not null,
   NOMBRE               varchar(50) binary,
   ACTIVO               bit,
   primary key (CVE_CLASIFICACION_TRAMITE)
);

/*==============================================================*/
/* Index: INDEX_1                                               */
/*==============================================================*/
create index INDEX_1 on CLASIFICACIONES_TRAMITES
(
   CVE_CLASIFICACION_TRAMITE
);

/*==============================================================*/
/* Table: DEPENDENCIAS                                          */
/*==============================================================*/
create table DEPENDENCIAS
(
   CVE_DEPENDENCIA      int not null,
   CVE_TIPO_DEPENDENCIA int,
   NOMBRE               varchar(50),
   TITULAR              varchar(50),
   ACTIVO               bit,
   primary key (CVE_DEPENDENCIA)
);

/*==============================================================*/
/* Index: INDEX_2                                               */
/*==============================================================*/
create index INDEX_2 on DEPENDENCIAS
(
   CVE_TIPO_DEPENDENCIA
);

/*==============================================================*/
/* Index: INDEX_1                                               */
/*==============================================================*/
create index INDEX_1 on DEPENDENCIAS
(
   CVE_DEPENDENCIA
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
   CVE_REATA            int,
   DESCRIPCION          varchar(100),
   EXPEDIENTE           varchar(50),
   FOLIO                varchar(50),
   RESPUESTA            varchar(100),
   ANEXO                varchar(100),
   PDF                  varchar(180),
   INFOMEX              bit,
   SOLICITUD            bit,
   FECHA_ACTUALIZACION_DOCUMENTO date,
   FECHA_GRABO          datetime,
   FECHA_MODIFICO       datetime,
   CVE_MODIFICO         int,
   ACTIVO               bit,
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
   NOMBRE_COMPLETO      varchar(100),
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
   NOMBRE               varchar(150),
   FOTO1                varchar(30),
   FOTO2                varchar(30),
   FOTO3                varchar(30),
   FOTO4                varchar(30),
   DATA_LS1             varchar(250),
   DATA_LS2             varchar(250) binary,
   DATA_LS3             varchar(250) binary,
   LINK                 varchar(100),
   PDF                  varchar(50),
   FECHA_GRABO          datetime,
   FECHA_MODIFICO       datetime,
   CVE_MODIFICO         int,
   ACTIVO               bit,
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
   TITULO               varchar(150),
   NOTICIA_CORTA        varchar(200),
   NOTICIA              varchar(5000),
   FOTO_PORTADA         varchar(40),
   FOTO1                varchar(40),
   FOTO2                varchar(40),
   FOTO3                varchar(40),
   FECHA_GRABO          datetime,
   FECHA_MODIFICO       datetime,
   CVE_MODIFICO         int,
   ACTIVO               bit,
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

/*==============================================================*/
/* Table: TIPOS_DEPENDENCIA                                     */
/*==============================================================*/
create table TIPOS_DEPENDENCIA
(
   CVE_TIPO_DEPENDENCIA int not null,
   NOMBRE               varchar(50),
   ACTIVO               bit,
   primary key (CVE_TIPO_DEPENDENCIA)
);

/*==============================================================*/
/* Index: INDEX_1                                               */
/*==============================================================*/
create index INDEX_1 on TIPOS_DEPENDENCIA
(
   CVE_TIPO_DEPENDENCIA
);

/*==============================================================*/
/* Table: TIPOS_TRAMITES                                        */
/*==============================================================*/
create table TIPOS_TRAMITES
(
   CVE_TIPO_TRAMITE     int not null,
   CVE_CLASIFICACION_TRAMITE int,
   NOMBRE               varchar(50),
   IMG                  varchar(50),
   ACTIVO               bit,
   primary key (CVE_TIPO_TRAMITE)
);

/*==============================================================*/
/* Index: INDEX_2                                               */
/*==============================================================*/
create index INDEX_2 on TIPOS_TRAMITES
(
   CVE_CLASIFICACION_TRAMITE
);

/*==============================================================*/
/* Index: INDEX_1                                               */
/*==============================================================*/
create index INDEX_1 on TIPOS_TRAMITES
(
   CVE_TIPO_TRAMITE
);

/*==============================================================*/
/* Table: TRAMITES                                              */
/*==============================================================*/
create table TRAMITES
(
   CVE_TRAMITE          int not null,
   CVE_TIPO_TRAMITE     int,
   CVE_CATEGORIA_TRAMITE int,
   CVE_DEPENDENCIA      int,
   NOMBRE               varchar(50),
   PDF                  varchar(50) binary,
   ACTIVO               bit,
   primary key (CVE_TRAMITE)
);

/*==============================================================*/
/* Index: INDEX_5                                               */
/*==============================================================*/
create index INDEX_5 on TRAMITES
(
   NOMBRE
);

/*==============================================================*/
/* Index: INDEX_4                                               */
/*==============================================================*/
create index INDEX_4 on TRAMITES
(
   CVE_DEPENDENCIA
);

/*==============================================================*/
/* Index: INDEX_3                                               */
/*==============================================================*/
create index INDEX_3 on TRAMITES
(
   CVE_CATEGORIA_TRAMITE
);

/*==============================================================*/
/* Index: INDEX_2                                               */
/*==============================================================*/
create index INDEX_2 on TRAMITES
(
   CVE_TIPO_TRAMITE
);

/*==============================================================*/
/* Index: INDEX_1                                               */
/*==============================================================*/
create index INDEX_1 on TRAMITES
(
   CVE_TRAMITE
);

alter table CAT_APARTADOS add constraint FK_REFERENCE_6 foreign key (CVE_ARTICULO, CVE_FRACCION, CVE_INCISO)
      references CAT_INCISOS (CVE_ARTICULO, CVE_FRACCION, CVE_INCISO) on delete restrict on update restrict;

alter table CAT_FRACCIONES add constraint FK_REFERENCE_4 foreign key (CVE_ARTICULO)
      references CAT_ARTICULOS (CVE_ARTICULO) on delete restrict on update restrict;

alter table CAT_INCISOS add constraint FK_REFERENCE_5 foreign key (CVE_ARTICULO, CVE_FRACCION)
      references CAT_FRACCIONES (CVE_ARTICULO, CVE_FRACCION) on delete restrict on update restrict;

alter table CAT_TRANSPARENCIA add constraint FK_REFERENCE_7 foreign key (CVE_ARTICULO, CVE_FRACCION, CVE_INCISO, CVE_APARTADO)
      references CAT_APARTADOS (CVE_ARTICULO, CVE_FRACCION, CVE_INCISO, CVE_APARTADO) on delete restrict on update restrict;

alter table DEPENDENCIAS add constraint FK_REFERENCE_14 foreign key (CVE_TIPO_DEPENDENCIA)
      references TIPOS_DEPENDENCIA (CVE_TIPO_DEPENDENCIA) on delete restrict on update restrict;

alter table DOCUMENTACION_TRANSPARENCIA add constraint FK_REFERENCE_3 foreign key (CVE_ARTICULO, CVE_FRACCION, CVE_INCISO, CVE_APARTADO, CVE_CLASIFICACION_APARTADO)
      references CAT_TRANSPARENCIA (CVE_ARTICULO, CVE_FRACCION, CVE_INCISO, CVE_APARTADO, CVE_CLASIFICACION_APARTADO) on delete restrict on update restrict;

alter table DOCUMENTACION_TRANSPARENCIA add constraint FK_REFERENCE_8 foreign key (CVE_REATA)
      references EL_REATON (CVE_REATA) on delete restrict on update restrict;

alter table EVENTOS add constraint FK_REFERENCE_2 foreign key (CVE_REATA)
      references EL_REATON (CVE_REATA) on delete restrict on update restrict;

alter table NOTICIAS add constraint FK_REFERENCE_1 foreign key (CVE_REATA)
      references EL_REATON (CVE_REATA) on delete restrict on update restrict;

alter table TIPOS_TRAMITES add constraint FK_REFERENCE_13 foreign key (CVE_CLASIFICACION_TRAMITE)
      references CLASIFICACIONES_TRAMITES (CVE_CLASIFICACION_TRAMITE) on delete restrict on update restrict;

alter table TRAMITES add constraint FK_REFERENCE_10 foreign key (CVE_TIPO_TRAMITE)
      references TIPOS_TRAMITES (CVE_TIPO_TRAMITE) on delete restrict on update restrict;

alter table TRAMITES add constraint FK_REFERENCE_11 foreign key (CVE_CATEGORIA_TRAMITE)
      references CATEGORIAS_TRAMITES (CVE_CATEGORIA_TRAMITE) on delete restrict on update restrict;

alter table TRAMITES add constraint FK_REFERENCE_12 foreign key (CVE_DEPENDENCIA)
      references DEPENDENCIAS (CVE_DEPENDENCIA) on delete restrict on update restrict;

