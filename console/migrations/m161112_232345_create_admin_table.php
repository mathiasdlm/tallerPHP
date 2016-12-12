<?php
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
if (!in_array('auth_assignment', $tables))  { 
if ($dbType == "mysql") {
    $this->createTable('{{%auth_assignment}}', [
        'item_name' => 'VARCHAR(64) NOT NULL',
        'user_id' => 'VARCHAR(64) NOT NULL',
        'created_at' => 'INT(11) NULL',
        3 => 'PRIMARY KEY (`item_name`, `user_id`)',
    ], $tableOptions_mysql);
}
}
 
/* MYSQL */
if (!in_array('auth_item', $tables))  { 
if ($dbType == "mysql") {
    $this->createTable('{{%auth_item}}', [
        'name' => 'VARCHAR(64) NOT NULL',
        0 => 'PRIMARY KEY (`name`)',
        'type' => 'INT(11) NOT NULL',
        'description' => 'TEXT NULL',
        'rule_name' => 'VARCHAR(64) NULL',
        'data' => 'TEXT NULL',
        'created_at' => 'INT(11) NULL',
        'updated_at' => 'INT(11) NULL',
    ], $tableOptions_mysql);
}
}
 
/* MYSQL */
if (!in_array('auth_item_child', $tables))  { 
if ($dbType == "mysql") {
    $this->createTable('{{%auth_item_child}}', [
        'parent' => 'VARCHAR(64) NOT NULL',
        'child' => 'VARCHAR(64) NOT NULL',
        2 => 'PRIMARY KEY (`parent`, `child`)',
    ], $tableOptions_mysql);
}
}
 
/* MYSQL */
if (!in_array('auth_rule', $tables))  { 
if ($dbType == "mysql") {
    $this->createTable('{{%auth_rule}}', [
        'name' => 'VARCHAR(64) NOT NULL',
        0 => 'PRIMARY KEY (`name`)',
        'data' => 'TEXT NULL',
        'created_at' => 'INT(11) NULL',
        'updated_at' => 'INT(11) NULL',
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
 
 
$this->createIndex('idx_UNIQUE_username_5268_00','admin','username',1);
$this->createIndex('idx_UNIQUE_email_5268_01','admin','email',1);
$this->createIndex('idx_UNIQUE_username_5268_02','admin','username',1);
$this->createIndex('idx_UNIQUE_email_5268_03','admin','email',1);
$this->createIndex('idx_UNIQUE_password_reset_token_5269_04','admin','password_reset_token',1);
$this->createIndex('idx_UNIQUE_password_reset_token_5269_05','admin','password_reset_token',1);
$this->createIndex('idx_rule_name_5457_06','auth_item','rule_name',0);
$this->createIndex('idx_type_5457_07','auth_item','type',0);
$this->createIndex('idx_child_5541_08','auth_item_child','child',0);
$this->createIndex('idx_idUser_5787_09','favoritos','idUser',0);
$this->createIndex('idx_idCliente_5872_10','horarioAtencion','idCliente',0);
$this->createIndex('idx_idInmueble_5873_11','horarioAtencion','idInmueble',0);
$this->createIndex('idx_idTipo_5981_12','inmueble','idTipo',0);
$this->createIndex('idx_idCliente_5981_13','inmueble','idCliente',0);
$this->createIndex('idx_UNIQUE_username_6153_14','user','username',1);
$this->createIndex('idx_UNIQUE_email_6154_15','user','email',1);
$this->createIndex('idx_UNIQUE_username_6154_16','user','username',1);
$this->createIndex('idx_UNIQUE_email_6154_17','user','email',1);
$this->createIndex('idx_UNIQUE_username_6154_18','user','username',1);
$this->createIndex('idx_UNIQUE_email_6155_19','user','email',1);
$this->createIndex('idx_UNIQUE_password_reset_token_6155_20','user','password_reset_token',1);
$this->createIndex('idx_UNIQUE_password_reset_token_6155_21','user','password_reset_token',1);
$this->createIndex('idx_UNIQUE_password_reset_token_6155_22','user','password_reset_token',1);
 
$this->execute('SET foreign_key_checks = 0');
$this->addForeignKey('fk_auth_item_5352_00','{{%auth_assignment}}', 'item_name', '{{%auth_item}}', 'name', 'CASCADE', 'NO ACTION' );
$this->addForeignKey('fk_auth_rule_5442_01','{{%auth_item}}', 'rule_name', '{{%auth_rule}}', 'name', 'CASCADE', 'NO ACTION' );
$this->addForeignKey('fk_auth_item_5526_02','{{%auth_item_child}}', 'parent', '{{%auth_item}}', 'name', 'CASCADE', 'NO ACTION' );
$this->addForeignKey('fk_auth_item_5527_03','{{%auth_item_child}}', 'child', '{{%auth_item}}', 'name', 'CASCADE', 'NO ACTION' );
$this->addForeignKey('fk_inmueble_5773_04','{{%favoritos}}', 'idInmueble', '{{%inmueble}}', 'id', 'CASCADE', 'NO ACTION' );
$this->addForeignKey('fk_user_5773_05','{{%favoritos}}', 'idUser', '{{%user}}', 'id', 'CASCADE', 'NO ACTION' );
$this->addForeignKey('fk_cliente_5858_06','{{%horarioAtencion}}', 'idCliente', '{{%cliente}}', 'id', 'CASCADE', 'NO ACTION' );
$this->addForeignKey('fk_cliente_5959_07','{{%inmueble}}', 'idCliente', '{{%cliente}}', 'id', 'CASCADE', 'NO ACTION' );
$this->addForeignKey('fk_tipoInmueble_596_08','{{%inmueble}}', 'idTipo', '{{%tipoInmueble}}', 'id', 'CASCADE', 'NO ACTION' );
$this->execute('SET foreign_key_checks = 1;');
 
$this->execute('SET foreign_key_checks = 0');
$this->insert('{{%admin}}',['id'=>'1','username'=>'admin','auth_key'=>'F61vLeVz8vbW_9p4BFyueOVkt9u3iEz6','password_hash'=>'$2y$13$LadTuWj0m/cOgc0SDTiFse3up77MTAuO7dkIpVdUX2rJYauUoHn4i','password_reset_token'=>'','email'=>'mathiasdlm@gmail.com','status'=>'10','created_at'=>'1478990368','updated_at'=>'1478990368','rol'=>'10']);
$this->insert('{{%admin}}',['id'=>'2','username'=>'gestion','auth_key'=>'F61vLeVz8vbW_9p4BFyueOVkt9u3iEz6','password_hash'=>'$2y$13$LadTuWj0m/cOgc0SDTiFse3up77MTAuO7dkIpVdUX2rJYauUoHn4i','password_reset_token'=>'','email'=>'gestion@gmail.com','status'=>'10','created_at'=>'1478990368','updated_at'=>'1478990368','rol'=>'20']);
$this->insert('{{%auth_assignment}}',['item_name'=>'admin-create','user_id'=>'1','created_at'=>'']);
$this->insert('{{%auth_item}}',['name'=>'admin','type'=>'1','description'=>'create update and delete','rule_name'=>'','data'=>'','created_at'=>'','updated_at'=>'']);
$this->insert('{{%auth_item}}',['name'=>'admin-create','type'=>'1','description'=>'create delete and update all','rule_name'=>'','data'=>'','created_at'=>'','updated_at'=>'']);
$this->insert('{{%auth_item_child}}',['parent'=>'admin','child'=>'admin-create']);
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
$this->execute('DROP TABLE IF EXISTS `auth_assignment`');
$this->execute('SET foreign_key_checks = 1;');
$this->execute('SET foreign_key_checks = 0');
$this->execute('DROP TABLE IF EXISTS `auth_item`');
$this->execute('SET foreign_key_checks = 1;');
$this->execute('SET foreign_key_checks = 0');
$this->execute('DROP TABLE IF EXISTS `auth_item_child`');
$this->execute('SET foreign_key_checks = 1;');
$this->execute('SET foreign_key_checks = 0');
$this->execute('DROP TABLE IF EXISTS `auth_rule`');
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
