<?php

use yii\db\Migration;

class m170310_105741_company extends Migration {

        public function up() {
                $tableOptions = null;
                if ($this->db->driverName === 'mysql') {
                        // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
                        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
                }

                $this->createTable('{{%company_details}}', [
                    'id' => $this->primaryKey(),
                    'company_name' => $this->string(100)->Null(),
                    'company_logo' => $this->string(100)->Null(),
                    'contact_person' => $this->string(100)->Null(),
                    'position' => $this->string(100)->Null(),
                    'phone' => $this->integer()->Null(),
                    'email' => $this->string(100)->Null(),
                    'website_link' => $this->string(100)->Null(),
                    'agency_details' => $this->text(),
                    'remarks' => $this->text(),
                    'user_name' => $this->string(100)->Null(),
                    'password' => $this->string(100)->Null(),
                    'status' => $this->smallInteger()->notNull()->defaultValue(1),
                    'CB' => $this->integer()->notNull(),
                    'UB' => $this->integer()->notNull(),
                    'DOC' => $this->date(),
                    'DOU' => $this->timestamp(),
                        ], $tableOptions);
                $this->alterColumn('{{%company_details}}', 'id', $this->integer() . ' NOT NULL AUTO_INCREMENT');

                $this->createTable('{{%company_contacts}}', [
                    'id' => $this->primaryKey(),
                    'company_id' => $this->integer()->notNull(),
                    'name' => $this->string(100),
                    'email' => $this->string(100),
                    'telephone' => $this->integer()->Null(),
                    'position' => $this->string(100),
                    'status' => $this->smallInteger()->notNull()->defaultValue(1),
                    'CB' => $this->integer()->notNull(),
                    'UB' => $this->integer()->notNull(),
                    'DOC' => $this->date(),
                    'DOU' => $this->timestamp(),
                        ], $tableOptions);
                $this->alterColumn('{{%company_contacts}}', 'id', $this->integer() . ' NOT NULL AUTO_INCREMENT');

                $this->createIndex('company-id', 'company_contacts', 'company_id', $unique = false);
                $this->addForeignKey("company-details", "company_contacts", "company_id", "company_details", "id", "RESTRICT", "RESTRICT");
        }

        public function down() {
                echo "m170310_105741_company cannot be reverted.\n";

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
