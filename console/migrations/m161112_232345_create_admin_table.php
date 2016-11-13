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
         
         
        $this->createIndex('idx_UNIQUE_username_8203_00','admin','username',1);
        $this->createIndex('idx_UNIQUE_email_8204_01','admin','email',1);
        $this->createIndex('idx_UNIQUE_password_reset_token_8204_02','admin','password_reset_token',1);
        $this->createIndex('idx_UNIQUE_username_8612_03','user','username',1);
        $this->createIndex('idx_UNIQUE_email_8612_04','user','email',1);
        $this->createIndex('idx_UNIQUE_password_reset_token_8613_05','user','password_reset_token',1);
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
        $this->execute('DROP TABLE IF EXISTS `user`');
        $this->execute('SET foreign_key_checks = 1;');
    }
}
