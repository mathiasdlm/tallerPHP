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
        'enAlquiler' => 'TINYINT(1) NOT NULL',
        'enVenta' => 'TINYINT(1) NOT NULL',
        'precioAlquiler' => 'FLOAT NULL',
        'precioVenta' => 'FLOAT NULL',
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


 
 
$this->createIndex('idx_UNIQUE_username_0821_00','admin','username',1);
$this->createIndex('idx_UNIQUE_email_0821_01','admin','email',1);
$this->createIndex('idx_UNIQUE_username_0822_02','admin','username',1);
$this->createIndex('idx_UNIQUE_email_0822_03','admin','email',1);
$this->createIndex('idx_UNIQUE_password_reset_token_0822_04','admin','password_reset_token',1);
$this->createIndex('idx_UNIQUE_password_reset_token_0822_05','admin','password_reset_token',1);

$this->createIndex('idx_idUser_1356_09','favoritos','idUser',0);
$this->createIndex('idx_idCliente_1448_10','horarioAtencion','idCliente',0);
$this->createIndex('idx_idInmueble_1449_11','horarioAtencion','idInmueble',0);
$this->createIndex('idx_idTipo_1559_12','inmueble','idTipo',0);
$this->createIndex('idx_idCliente_156_13','inmueble','idCliente',0);
$this->createIndex('idx_UNIQUE_username_1721_14','user','username',1);
$this->createIndex('idx_UNIQUE_email_1721_15','user','email',1);
$this->createIndex('idx_UNIQUE_username_1721_16','user','username',1);
$this->createIndex('idx_UNIQUE_email_1721_17','user','email',1);
$this->createIndex('idx_UNIQUE_username_1722_18','user','username',1);
$this->createIndex('idx_UNIQUE_email_1722_19','user','email',1);
$this->createIndex('idx_UNIQUE_password_reset_token_1722_20','user','password_reset_token',1);
$this->createIndex('idx_UNIQUE_password_reset_token_1722_21','user','password_reset_token',1);
$this->createIndex('idx_UNIQUE_password_reset_token_1722_22','user','password_reset_token',1);
 

$this->addForeignKey('fk_inmueble_134_04','{{%favoritos}}', 'idInmueble', '{{%inmueble}}', 'id', 'CASCADE', 'NO ACTION' );
$this->addForeignKey('fk_user_134_05','{{%favoritos}}', 'idUser', '{{%user}}', 'id', 'CASCADE', 'NO ACTION' );
$this->addForeignKey('fk_cliente_1432_06','{{%horarioAtencion}}', 'idCliente', '{{%cliente}}', 'id', 'CASCADE', 'NO ACTION' );
$this->addForeignKey('fk_cliente_1544_07','{{%inmueble}}', 'idCliente', '{{%cliente}}', 'id', 'CASCADE', 'NO ACTION' );
$this->addForeignKey('fk_tipoInmueble_1544_08','{{%inmueble}}', 'idTipo', '{{%tipoInmueble}}', 'id', 'CASCADE', 'NO ACTION' );
$this->execute('SET foreign_key_checks = 1;');
 
$this->execute('SET foreign_key_checks = 0');
$this->insert('{{%admin}}',['id'=>'1','username'=>'admin','auth_key'=>'F61vLeVz8vbW_9p4BFyueOVkt9u3iEz6','password_hash'=>'$2y$13$LadTuWj0m/cOgc0SDTiFse3up77MTAuO7dkIpVdUX2rJYauUoHn4i','email'=>'mathiasdlm@gmail.com','status'=>'10','created_at'=>'1478990368','updated_at'=>'1478990368','rol'=>'10']);
$this->insert('{{%admin}}',['id'=>'2','username'=>'gestion','auth_key'=>'F61vLeVz8vbW_9p4BFyueOVkt9u3iEz6','password_hash'=>'$2y$13$LadTuWj0m/cOgc0SDTiFse3up77MTAuO7dkIpVdUX2rJYauUoHn4i','email'=>'gestion@gmail.com','status'=>'10','created_at'=>'1478990368','updated_at'=>'1478990368','rol'=>'20']);
$this->insert('{{%cliente}}',['id'=>'1','nombre'=>'Mathias','telefono'=>'24101864','email'=>'mathi@mathi.com']);
$this->insert('{{%horarioAtencion}}',['id'=>'1','horaDesde'=>'10:00:00','horaHasta'=>'24:00:00','idCliente'=>'1','idInmueble'=>'1']);
$this->insert('{{%inmueble}}',['id'=>'1','nombre'=>'La casa de Mathi','lat'=>'-34.8958','lon'=>'-56.1551','cantDormitorios'=>'3','cantBanos'=>'2','metrosTotales'=>'234','metrosEdificados'=>'233','cochera'=>'0','patio'=>'1','enAlquiler'=>'0','enVenta'=>'0','precioAlquiler'=>'0','precioVenta'=>'0','idTipo'=>'1','idCliente'=>'1','imagen1'=>'','imagen2'=>'','imagen3'=>'']);
$this->insert('{{%inmueble}}',['id'=>'2','nombre'=>'Plaza del entrevero','lat'=>'-34.9056','lon'=>'-56.1942','cantDormitorios'=>'2','cantBanos'=>'3','metrosTotales'=>'234','metrosEdificados'=>'422','cochera'=>'1','patio'=>'0','enAlquiler'=>'0','enVenta'=>'0','precioAlquiler'=>'0','precioVenta'=>'0','idTipo'=>'1','idCliente'=>'1','imagen1'=>'','imagen2'=>'','imagen3'=>'']);
$this->insert('{{%inmueble}}',['id'=>'3','nombre'=>'La oficina','lat'=>'-34.9099','lon'=>'-56.1514','cantDormitorios'=>'4','cantBanos'=>'3','metrosTotales'=>'2344','metrosEdificados'=>'2344','cochera'=>'1','patio'=>'1','enAlquiler'=>'1','enVenta'=>'1','precioAlquiler'=>'23444','precioVenta'=>'23445','idTipo'=>'1','idCliente'=>'1','imagen1'=>'','imagen2'=>'','imagen3'=>'']);
$this->insert('{{%inmueble}}',['id'=>'4','nombre'=>'Riveira House','lat'=>'-34.9099','lon'=>'-56.1514','cantDormitorios'=>'4','cantBanos'=>'3','metrosTotales'=>'2344','metrosEdificados'=>'2344','cochera'=>'1','patio'=>'1','enAlquiler'=>'1','enVenta'=>'1','precioAlquiler'=>'23444','precioVenta'=>'23445','idTipo'=>'1','idCliente'=>'1','imagen1'=>'','imagen2'=>'','imagen3'=>'']);
$this->insert('{{%inmueble}}',['id'=>'5','nombre'=>'Las Gaviotas','lat'=>'-34.9099','lon'=>'-56.1514','cantDormitorios'=>'2','cantBanos'=>'1','metrosTotales'=>'2344','metrosEdificados'=>'2344','cochera'=>'1','patio'=>'1','enAlquiler'=>'1','enVenta'=>'1','precioAlquiler'=>'23444','precioVenta'=>'23445','idTipo'=>'3','idCliente'=>'1','imagen1'=>'','imagen2'=>'','imagen3'=>'']);
$this->insert('{{%tipoInmueble}}',['id'=>'1','Nombre'=>'Apartamento']);
$this->insert('{{%tipoInmueble}}',['id'=>'2','Nombre'=>'Casa']);
$this->insert('{{%tipoInmueble}}',['id'=>'3','Nombre'=>'Mono-Ambiente']);
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
