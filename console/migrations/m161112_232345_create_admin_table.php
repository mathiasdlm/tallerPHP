e<?php
use yii\db\Migration;

/**
 * Handles the creation of table `admin`.
 */
class m161112_232345_create_admin_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {

        
 $tables = Yii::$app->db->schema->getTableNames();
$dbType = $this->db->driverName;
$tableOptions_mysql = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
$tableOptions_mssql = "";
$tableOptions_pgsql = "";
$tableOptions_sqlite = "";
/* MYSQL */
if (!in_array('admin', $tables))  { 
if ($dbType == "mysql") {
    $this->createTable('{{%admin}}', [
        'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
        0 => 'PRIMARY KEY (`id`)',
        'username' => 'VARCHAR(255) NOT NULL',
        'auth_key' => 'VARCHAR(32) NOT NULL',
        'password_hash' => 'VARCHAR(255) NOT NULL',
        'password_reset_token' => 'VARCHAR(255) NULL',
        'email' => 'VARCHAR(255) NOT NULL',
        'status' => 'SMALLINT(6) NOT NULL DEFAULT \'10\'',
        'created_at' => 'INT(11) NOT NULL',
        'updated_at' => 'INT(11) NOT NULL',
        'rol' => 'INT(11) NOT NULL',
    ], $tableOptions_mysql);
}
}
 
/* MYSQL */
if (!in_array('cliente', $tables))  { 
if ($dbType == "mysql") {
    $this->createTable('{{%cliente}}', [
        'id' => 'INT(5) NOT NULL AUTO_INCREMENT',
        0 => 'PRIMARY KEY (`id`)',
        'nombre' => 'VARCHAR(50) NOT NULL',
        'prioridad' => 'INT(2) NOT NULL',
        'telefono' => 'VARCHAR(20) NOT NULL',
        'email' => 'VARCHAR(20) NOT NULL',
    ], $tableOptions_mysql);
}
}
 
/* MYSQL */
if (!in_array('favoritos', $tables))  { 
if ($dbType == "mysql") {
    $this->createTable('{{%favoritos}}', [
        'idInmueble' => 'INT(11) NOT NULL',
        'idUser' => 'INT(11) NOT NULL',
        2 => 'PRIMARY KEY (`idInmueble`, `idUser`)',
    ], $tableOptions_mysql);
}
}
 
/* MYSQL */
if (!in_array('horarioAtencion', $tables))  { 
if ($dbType == "mysql") {
    $this->createTable('{{%horarioAtencion}}', [
        'id' => 'INT(10) NOT NULL AUTO_INCREMENT',
        0 => 'PRIMARY KEY (`id`)',
        'horaDesde' => 'TIME NOT NULL',
        'horaHasta' => 'TIME NOT NULL',
        'idCliente' => 'INT(5) NOT NULL',
        'idInmueble' => 'INT(11) NOT NULL',
    ], $tableOptions_mysql);
}
}
 
/* MYSQL */
if (!in_array('inmueble', $tables))  { 
if ($dbType == "mysql") {
    $this->createTable('{{%inmueble}}', [
        'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
        0 => 'PRIMARY KEY (`id`)',
        'nombre' => 'VARCHAR(30) NOT NULL',
        'lat' => 'FLOAT NOT NULL',
        'lon' => 'FLOAT NOT NULL',
        'cantDormitorios' => 'INT(2) NOT NULL',
        'cantBanos' => 'INT(2) NOT NULL',
        'metrosTotales' => 'INT(5) NOT NULL',
        'metrosEdificados' => 'INT(5) NOT NULL',
        'cochera' => 'TINYINT(1) NULL',
        'patio' => 'TINYINT(1) NULL',
        'idTipo' => 'INT(3) NOT NULL',
        'idCliente' => 'INT(5) NOT NULL',
        'imagen1' => 'VARCHAR(255) NULL',
        'imagen2' => 'VARCHAR(255) NULL',
        'imagen3' => 'VARCHAR(255) NULL',
    ], $tableOptions_mysql);
}
}
 
/* MYSQL */
if (!in_array('tipoInmueble', $tables))  { 
if ($dbType == "mysql") {
    $this->createTable('{{%tipoInmueble}}', [
        'id' => 'INT(3) NOT NULL AUTO_INCREMENT',
        0 => 'PRIMARY KEY (`id`)',
        'Nombre' => 'VARCHAR(30) NOT NULL',
    ], $tableOptions_mysql);
}
}
 
/* MYSQL */
if (!in_array('user', $tables))  { 
if ($dbType == "mysql") {
    $this->createTable('{{%user}}', [
        'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
        0 => 'PRIMARY KEY (`id`)',
        'username' => 'VARCHAR(255) NOT NULL',
        'auth_key' => 'VARCHAR(32) NOT NULL',
        'password_hash' => 'VARCHAR(255) NOT NULL',
        'password_reset_token' => 'VARCHAR(255) NULL',
        'email' => 'VARCHAR(255) NOT NULL',
        'status' => 'SMALLINT(6) NOT NULL DEFAULT \'10\'',
        'created_at' => 'INT(11) NOT NULL',
        'updated_at' => 'INT(11) NOT NULL',
        
    ], $tableOptions_mysql);
}
}


 
 
$this->createIndex('idx_UNIQUE_username_9508_00','admin','username',1);
$this->createIndex('idx_UNIQUE_email_9508_01','admin','email',1);
$this->createIndex('idx_UNIQUE_username_9508_02','admin','username',1);
$this->createIndex('idx_UNIQUE_email_9508_03','admin','email',1);
$this->createIndex('idx_UNIQUE_password_reset_token_9509_04','admin','password_reset_token',1);
$this->createIndex('idx_UNIQUE_password_reset_token_9509_05','admin','password_reset_token',1);
$this->createIndex('idx_idUser_9653_06','favoritos','idUser',0);
$this->createIndex('idx_idCliente_9722_07','horarioAtencion','idCliente',0);
$this->createIndex('idx_idInmueble_9723_08','horarioAtencion','idInmueble',0);
$this->createIndex('idx_idTipo_9824_09','inmueble','idTipo',0);
$this->createIndex('idx_idCliente_9824_10','inmueble','idCliente',0);
$this->createIndex('idx_UNIQUE_username_9982_11','user','username',1);
$this->createIndex('idx_UNIQUE_email_9982_12','user','email',1);
$this->createIndex('idx_UNIQUE_username_9982_13','user','username',1);
$this->createIndex('idx_UNIQUE_email_9983_14','user','email',1);
$this->createIndex('idx_UNIQUE_password_reset_token_9983_15','user','password_reset_token',1);
$this->createIndex('idx_UNIQUE_password_reset_token_9983_16','user','password_reset_token',1);
 
$this->execute('SET foreign_key_checks = 0');
$this->addForeignKey('fk_inmueble_9637_00','{{%favoritos}}', 'idInmueble', '{{%inmueble}}', 'id', 'CASCADE', 'NO ACTION' );
$this->addForeignKey('fk_user_9638_01','{{%favoritos}}', 'idUser', '{{%user}}', 'id', 'CASCADE', 'NO ACTION' );
$this->addForeignKey('fk_cliente_9706_02','{{%horarioAtencion}}', 'idCliente', '{{%cliente}}', 'id', 'CASCADE', 'NO ACTION' );
$this->addForeignKey('fk_cliente_9808_03','{{%inmueble}}', 'idCliente', '{{%cliente}}', 'id', 'CASCADE', 'NO ACTION' );
$this->addForeignKey('fk_tipoInmueble_9808_04','{{%inmueble}}', 'idTipo', '{{%tipoInmueble}}', 'id', 'CASCADE', 'NO ACTION' );
$this->execute('SET foreign_key_checks = 1;');


        
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
       
 $this->execute('SET foreign_key_checks = 0');
$this->execute('DROP TABLE IF EXISTS `admin`');
$this->execute('SET foreign_key_checks = 1;');
$this->execute('SET foreign_key_checks = 0');
$this->execute('DROP TABLE IF EXISTS `cliente`');
$this->execute('SET foreign_key_checks = 1;');
$this->execute('SET foreign_key_checks = 0');
$this->execute('DROP TABLE IF EXISTS `favoritos`');
$this->execute('SET foreign_key_checks = 1;');
$this->execute('SET foreign_key_checks = 0');
$this->execute('DROP TABLE IF EXISTS `horarioAtencion`');
$this->execute('SET foreign_key_checks = 1;');
$this->execute('SET foreign_key_checks = 0');
$this->execute('DROP TABLE IF EXISTS `inmueble`');
$this->execute('SET foreign_key_checks = 1;');
$this->execute('SET foreign_key_checks = 0');
$this->execute('DROP TABLE IF EXISTS `tipoInmueble`');
$this->execute('SET foreign_key_checks = 1;');
$this->execute('SET foreign_key_checks = 0');
$this->execute('DROP TABLE IF EXISTS `user`');
$this->execute('SET foreign_key_checks = 1;');


    }
}
