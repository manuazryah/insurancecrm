<?php

use yii\db\Migration;

class m170313_044510_policy_details extends Migration {

        public function up() {
                $tableOptions = null;
                if ($this->db->driverName === 'mysql') {
                        // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
                        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
                }
                $this->createTable('{{%product}}', [
                    'id' => $this->primaryKey(),
                    'product_name' => $this->string(100)->notNull(),
                    'status' => $this->smallInteger()->notNull()->defaultValue(1),
                    'CB' => $this->integer()->notNull(),
                    'UB' => $this->integer()->notNull(),
                    'DOC' => $this->date(),
                    'DOU' => $this->timestamp(),
                        ], $tableOptions);
                $this->alterColumn('{{%product}}', 'id', $this->integer() . ' NOT NULL AUTO_INCREMENT');

                $this->createTable('{{%policy_type}}', [
                    'id' => $this->primaryKey(),
                    'policy_name' => $this->string(100)->notNull(),
                    'status' => $this->smallInteger()->notNull()->defaultValue(1),
                    'CB' => $this->integer()->notNull(),
                    'UB' => $this->integer()->notNull(),
                    'DOC' => $this->date(),
                    'DOU' => $this->timestamp(),
                        ], $tableOptions);
                $this->alterColumn('{{%policy_type}}', 'id', $this->integer() . ' NOT NULL AUTO_INCREMENT');

                $this->createTable('{{%cover}}', [
                    'id' => $this->primaryKey(),
                    'cover' => $this->string(100)->notNull(),
                    'status' => $this->smallInteger()->notNull()->defaultValue(1),
                    'CB' => $this->integer()->notNull(),
                    'UB' => $this->integer()->notNull(),
                    'DOC' => $this->date(),
                    'DOU' => $this->timestamp(),
                        ], $tableOptions);
                $this->alterColumn('{{%cover}}', 'id', $this->integer() . ' NOT NULL AUTO_INCREMENT');

                $this->createTable('{{%application_status}}', [
                    'id' => $this->primaryKey(),
                    'application_status' => $this->string(100)->notNull(),
                    'status' => $this->smallInteger()->notNull()->defaultValue(1),
                    'CB' => $this->integer()->notNull(),
                    'UB' => $this->integer()->notNull(),
                    'DOC' => $this->date(),
                    'DOU' => $this->timestamp(),
                        ], $tableOptions);
                $this->alterColumn('{{%application_status}}', 'id', $this->integer() . ' NOT NULL AUTO_INCREMENT');

                $this->createTable('{{%policy_details}}', [
                    'id' => $this->primaryKey(),
                    'company' => $this->integer()->notNull(),
                    'product' => $this->integer()->notNull(),
                    'policy_type' => $this->integer()->notNull(),
                    'cover' => $this->integer()->notNull(),
                    'policy_number' => $this->string(100),
                    'sum_assured' => $this->float()->Null(),
                    'policy_term' => $this->string(100),
                    'cover_start_date' => $this->date(),
                    'cover_end_date' => $this->date(),
                    'application_status' => $this->integer()->notNull(),
                    'underwriting_outcome' => $this->integer()->Null(),
                    'policy_status' => $this->integer()->Null(),
                    'reason' => $this->text(),
                    'review_date' => $this->date(),
                    'renewal_date' => $this->date(),
                    'commision' => $this->float()->Null(),
                    'status' => $this->smallInteger()->notNull()->defaultValue(1),
                    'CB' => $this->integer()->notNull(),
                    'UB' => $this->integer()->notNull(),
                    'DOC' => $this->date(),
                    'DOU' => $this->timestamp(),
                        ], $tableOptions);
                $this->alterColumn('{{%policy_details}}', 'id', $this->integer() . ' NOT NULL AUTO_INCREMENT');

                $this->createIndex('company-id', 'policy_details', 'company', false);
                $this->createIndex('product-id', 'policy_details', 'product', false);
                $this->createIndex('policy-type', 'policy_details', 'policy_type', false);
                $this->createIndex('cover-id', 'policy_details', 'cover', false);
                $this->createIndex('application-status-id', 'policy_details', 'application_status', false);
                $this->addForeignKey("company-id", "policy_details", "company", "company_details", "id", "RESTRICT", "RESTRICT");
                $this->addForeignKey("product-id", "policy_details", "product", "product", "id", "RESTRICT", "RESTRICT");
                $this->addForeignKey("policy-type", "policy_details", "policy_type", "policy_type", "id", "RESTRICT", "RESTRICT");
                $this->addForeignKey("cover-id", "policy_details", "cover", "cover", "id", "RESTRICT", "RESTRICT");
                $this->addForeignKey("application-status", "policy_details", "application_status", "application_status", "id", "RESTRICT", "RESTRICT");
        }

        public function down() {
                echo "m170313_044510_policy_details cannot be reverted.\n";

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
