<?php

use yii\db\Migration;

class m170313_074432_updatee extends Migration {

        public function up() {
                $this->execute("ALTER TABLE `admin_posts` ADD `company` INT NULL DEFAULT '0';");
                $this->execute("ALTER TABLE `admin_posts` ADD `policy` INT NULL DEFAULT '0';");
        }

        public function down() {
                echo "m170313_074432_updatee cannot be reverted.\n";

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
