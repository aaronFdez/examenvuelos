------------------------------
-- Archivo de base de datos --
------------------------------

drop table if exists usuarios cascade;

create table usuarios
(
        id                bigserial         constraint pk_usuarios primary key
    ,   nombre       varchar(30)    not null constraint uq_usuario_unico unique
    ,   password    char(32)         not null
);

insert into usuarios (nombre, password)
    values ('pepe',  md5('pepe'));

drop table if exists aeropuertos cascade;

create table aeropuertos
(
        id                bigserial         constraint pk_aeropuertos primary key
    ,   id_aero       char(3)           not null constraint uq_aeropuertos_unico unique
    ,   den_aero    varchar(32)    not null
);


drop table if exists companias cascade;

create table companias
(
        id                  bigserial         constraint pk_companias primary key
    ,   den_comp    varchar(32)          not null
);


drop table if exists vuelos cascade;

create table vuelos
(
        id                bigserial       constraint pk_vuelos primary key
    ,   id_vuelo     char(6)         constraint uq_vuelo_unico unique
    ,   orig_id       bigint            not null constraint fk_vuelos_aeropuerto_origen
                                                references aeropuertos (id)
                                                on delete no action on update cascade
    ,   dest_id       bigint            not null constraint fk_vuelos_aeropuerto_destino
                                                references aeropuertos (id)
                                                on delete no action on update cascade
    ,   comp_id    bigint            not null constraint fk_vuelos_compania
                                                references companias (id)
                                                on delete no action on update cascade
    ,   salida         timestamp     not null
    ,   llegada       timestamp     not null
    ,   plazas         numeric(3)   not null
    ,   precio        numeric(6,2) not null
);

drop table if exists reservas cascade;

create table reservas
(
        id                 bigserial        constraint pk_reservas primary key
    ,   usuario_id   bigint             not null constraint fk_reservas_usuario
                                                  references usuarios (id)
                                                  on delete no action on update cascade
    ,   vuelo_id      bigint             not null constraint fk_reservas_vuelo
                                                  references vuelos (id)
                                                  on delete no action on update cascade
    ,   fecha_hora   timestamp    not null default current_timestamp
    ,   asiento          numeric(3)   not null
);
