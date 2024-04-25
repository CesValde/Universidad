        CREATE DATABASE bdingresante ; 

        CREATE TABLE actividad (
            aidentificacion bigint AUTO_INCREMENT,
            adescripcioncorta varchar(150),
            adescripcionlarga varchar(150), 
            PRIMARY KEY(aidentificacion)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

        CREATE TABLE modulo (
            midentificacion bigint AUTO_INCREMENT,
            descripcion varchar(255),
            tope_inscripciones int,
            costo int,
            horario_inicio time,
            horario_cierre time,
            fecha_inicio date,
            fecha_fin date,
            es_en_linea varchar(100), 
            link_reunion varchar(255),
            bonificacion int,
            aidentificacion bigint,
            PRIMARY KEY(midentificacion),
            FOREIGN KEY(aidentificacion) REFERENCES actividad (aidentificacion)  ON UPDATE CASCADE ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

        CREATE TABLE ingresante (
            dni varchar(20),
            correo_electronico varchar(255),
            legajo int,
            nombre varchar(255),
            apellido varchar(255),
            PRIMARY KEY(dni)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

        CREATE TABLE inscripcion (
            iidentificacion int AUTO_INCREMENT,
            fecha_realizacion date,
            costo_final int,  
            midentificacion bigint ,
            dni varchar(20), 
            PRIMARY KEY(iidentificacion),
            FOREIGN KEY(midentificacion) REFERENCES modulo (midentificacion)  ON UPDATE CASCADE ON DELETE CASCADE,
            FOREIGN KEY(dni) REFERENCES ingresante (dni)  ON UPDATE CASCADE ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
        