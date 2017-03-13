<?php

use yii\db\Migration;

class m170313_094753_customer_details extends Migration {

        public function up() {
                $tableOptions = null;
                if ($this->db->driverName === 'mysql') {
                        // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
                        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
                }

                $this->createTable('{{%customer}}', [
                    'id' => $this->primaryKey(),
                    'first_name' => $this->string(100)->Null(),
                    'last_name' => $this->string(100)->Null(),
                    'dob' => $this->date(),
                    'gender' => $this->integer()->Null(),
                    'marital_status' => $this->integer()->Null(),
                    'occupation' => $this->string(100)->Null(),
                    'annual_income' => $this->float()->Null(),
                    'address' => $this->text(),
                    'contact_number' => $this->string(100)->Null(),
                    'email' => $this->string(100)->Null(),
                    'existing_sick_benifits' => $this->integer()->Null(),
                    'home_owner' => $this->integer()->Null(),
                    'spouse_name' => $this->string(100)->Null(),
                    'spouse_dob' => $this->date(),
                    'spouse_occupation' => $this->string(100)->Null(),
                    'no_of_children' => $this->integer()->Null(),
                    'status' => $this->smallInteger()->notNull()->defaultValue(1),
                    'CB' => $this->integer()->notNull(),
                    'UB' => $this->integer()->notNull(),
                    'DOC' => $this->date(),
                    'DOU' => $this->timestamp(),
                        ], $tableOptions);
                $this->alterColumn('{{%customer}}', 'id', $this->integer() . ' NOT NULL AUTO_INCREMENT');

                $this->createTable('{{%children}}', [
                    'id' => $this->primaryKey(),
                    'customer_id' => $this->integer()->notNull(),
                    'name' => $this->string(100),
                    'gender' => $this->integer()->Null(),
                    'dob' => $this->date(),
                    'status' => $this->smallInteger()->notNull()->defaultValue(1),
                    'CB' => $this->integer()->notNull(),
                    'UB' => $this->integer()->notNull(),
                    'DOC' => $this->date(),
                    'DOU' => $this->timestamp(),
                        ], $tableOptions);
                $this->alterColumn('{{%children}}', 'id', $this->integer() . ' NOT NULL AUTO_INCREMENT');

                $this->createIndex('customer-id', 'children', 'customer_id', $unique = false);
                $this->addForeignKey("customer-details", "children", "customer_id", "customer", "id", "RESTRICT", "RESTRICT");
        }

        public function down() {
                echo "m170313_094753_customer_details cannot be reverted.\n";

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
