<?php
require_once('./src/autoload.php');
require_once('./config.php');

use App\Database\MySql;

Config::load_config();

class Migrate
{
    public static function migrate()
    {
        $db = MySql::get_instance()->connection;

        $familia_reset = str_replace(
            '\r\n',
            '',
            "
        DROP TABLE IF EXISTS familia;
        "
        );
        $tipo_reset = str_replace(
            '\r\n',
            '',
            "
        DROP TABLE IF EXISTS tipo;
        "
        );
        $componente_reset = str_replace(
            '\r\n',
            '',
            "
        DROP TABLE IF EXISTS componente;
        "
        );

        $familia = str_replace(
            '\r\n',
            '',
            '
        CREATE TABLE IF NOT EXISTS familia (
            id_familia  INT             AUTO_INCREMENT,
            nombre      VARCHAR(100)    NOT NULL,
            descripcion TEXT            NOT NULL,
            PRIMARY KEY(id_familia)
        );'
        );

        $tipo = str_replace('\r\n', '', '
        CREATE TABLE IF NOT EXISTS tipo (
            id_tipo     INT             AUTO_INCREMENT,
            nombre      VARCHAR(100)    NOT NULL,
            descripciom TEXT            NOT NULL,
            PRIMARY KEY(id_tipo)
        );
        ');

        $componente = str_replace('\r\n', '', '
        CREATE TABLE IF NOT EXISTS componente (
            id_componente           INT         AUTO_INCREMENT,
            codigo_componente       VARCHAR(20) NOT NULL,
            imagen_componente       LONGBLOB    NOT NULL,
            descripcion_componente  TEXT        NOT NULL,
            id_familia              INT         NOT NULL,
            id_tipo                 INT         NOT NULL,
            PRIMARY KEY (id_componente),
            FOREIGN KEY(id_familia) REFERENCES familia(id_familia) ON DELETE CASCADE,
            FOREIGN KEY(id_tipo) REFERENCES tipo(id_tipo) ON DELETE CASCADE
        );');

        echo mysqli_query($db, "SET foreign_key_checks = 0;");
        echo mysqli_query($db, $familia_reset);
        echo mysqli_query($db, $tipo_reset);
        echo mysqli_query($db, $componente_reset);
        echo mysqli_query($db, "SET foreign_key_checks = 1;");
        echo mysqli_query($db, $familia);
        echo mysqli_query($db, $tipo);
        echo mysqli_query($db, $componente);
    }
}

Migrate::migrate();
