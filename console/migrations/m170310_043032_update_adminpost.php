<?php

use yii\db\Migration;

class m170310_043032_update_adminpost extends Migration {

        public function up() {
                $this->execute("ALTER TABLE `admin_posts` ADD `admin` INT NULL DEFAULT '0';");
                $this->execute("ALTER TABLE `admin_posts` ADD `masters` INT NULL DEFAULT '0';");
        }

        public function down() {
                echo "m170310_043032_update_adminpost cannot be reverted.\n";

                return false;
        }

        /*
          // Use safeUp/safeDown to run migration code within a transaction
          public function safeUp()
          {
          }

          public function safeDown()
          {
          }
         */
}
