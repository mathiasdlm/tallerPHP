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
        if (!in_array('horarioAtencion', $tables))  { 
        if ($dbType == "mysql") {
            $this->createTable('{{%horarioAtencion}}', [
                'id' => 'INT(10) NOT NULL AUTO_INCREMENT',
                0 => 'PRIMARY KEY (`id`)',
                'horaDesde' => 'TIME NOT NULL',
                'horaHasta' => 'TIME NOT NULL',
                'idCliente' => 'INT(5) NOT NULL',
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
                'coordenadas' => 'POINT NOT NULL',
                'cantDormitorios' => 'INT(2) NOT NULL',
                'cantBanos' => 'INT(2) NOT NULL',
                'metrosTotales' => 'INT(5) NOT NULL',
                'metrosEdificados' => 'INT(5) NOT NULL',
                'cochera' => 'TINYINT(1) NOT NULL',
                'patio' => 'TINYINT(1) NOT NULL',
                'idTipo' => 'INT(3) NOT NULL',
            ], $tableOptions_mysql);
        }
        }
         
        /* MYSQL */
        if (!in_array('inmuebleCliente', $tables))  { 
        if ($dbType == "mysql") {
            $this->createTable('{{%inmuebleCliente}}', [
                'idCliente' => 'INT(5) NOT NULL',
                'idInmueble' => 'INT(11) NOT NULL',
                2 => 'PRIMARY KEY (`idCliente`, `idInmueble`)',
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
         
         
        $this->createIndex('idx_UNIQUE_username_1852_00','admin','username',1);
        $this->createIndex('idx_UNIQUE_email_1852_01','admin','email',1);
        $this->createIndex('idx_UNIQUE_username_1852_02','admin','username',1);
        $this->createIndex('idx_UNIQUE_email_1852_03','admin','email',1);
        $this->createIndex('idx_UNIQUE_password_reset_token_1852_04','admin','password_reset_token',1);
        $this->createIndex('idx_UNIQUE_password_reset_token_1853_05','admin','password_reset_token',1);
        $this->createIndex('idx_idCliente_2005_06','horarioAtencion','idCliente',0);
        $this->createIndex('idx_idTipo_2088_07','inmueble','idTipo',0);
        $this->createIndex('idx_idInmueble_2164_08','inmuebleCliente','idInmueble',0);
        $this->createIndex('idx_UNIQUE_username_2363_09','user','username',1);
        $this->createIndex('idx_UNIQUE_email_2364_10','user','email',1);
        $this->createIndex('idx_UNIQUE_username_2364_11','user','username',1);
        $this->createIndex('idx_UNIQUE_email_2364_12','user','email',1);
        $this->createIndex('idx_UNIQUE_password_reset_token_2364_13','user','password_reset_token',1);
        $this->createIndex('idx_UNIQUE_password_reset_token_2364_14','user','password_reset_token',1);
         
        $this->execute('SET foreign_key_checks = 0');
        $this->addForeignKey('fk_cliente_1986_00','{{%horarioAtencion}}', 'idCliente', '{{%cliente}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_tipoInmueble_2074_01','{{%inmueble}}', 'id', '{{%tipoInmueble}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_cliente_2148_02','{{%inmuebleCliente}}', 'idCliente', '{{%cliente}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->addForeignKey('fk_inmueble_2149_03','{{%inmuebleCliente}}', 'idInmueble', '{{%inmueble}}', 'id', 'CASCADE', 'NO ACTION' );
        $this->execute('SET foreign_key_checks = 1;');
         
        $this->execute('SET foreign_key_checks = 0');
        $this->insert('{{%admin}}',['id'=>'1','username'=>'admin','auth_key'=>'F61vLeVz8vbW_9p4BFyueOVkt9u3iEz6','password_hash'=>'$2y$13$LadTuWj0m/cOgc0SDTiFse3up77MTAuO7dkIpVdUX2rJYauUoHn4i','password_reset_token'=>'','email'=>'mathiasdlm@gmail.com','status'=>'10','created_at'=>'1478990368','updated_at'=>'1478990368']);
        $this->insert('{{%cliente}}',['id'=>'1','nombre'=>'Mathías','prioridad'=>'1','telefono'=>'24101864','email'=>'mathiasdlm@gmail.com']);
        $this->insert('{{%tipoInmueble}}',['id'=>'1','Nombre'=>'Casa']);
        $this->insert('{{%tipoInmueble}}',['id'=>'2','Nombre'=>'Apartamento']);
        $this->insert('{{%user}}',['id'=>'2','username'=>'admin','auth_key'=>'F61vLeVz8vbW_9p4BFyueOVkt9u3iEz6','password_hash'=>'$2y$13$LadTuWj0m/cOgc0SDTiFse3up77MTAuO7dkIpVdUX2rJYauUoHn4i','password_reset_token'=>'','email'=>'admin@gmail.com','status'=>'10','created_at'=>'1480101891','updated_at'=>'1480101891']);
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
        $this->execute('DROP TABLE IF EXISTS `horarioAtencion`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `inmueble`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `inmuebleCliente`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `tipoInmueble`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `user`');
        $this->execute('SET foreign_key_checks = 1;');

    }
}
