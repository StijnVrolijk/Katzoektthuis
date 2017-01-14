<?php

namespace SumoCodersFramework\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170114134750 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE KatZoektThuisUser (id INT NOT NULL, buddy_id INT DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, phoneNumber VARCHAR(255) DEFAULT NULL, INDEX IDX_D5BF247F395CE8D6 (buddy_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE KatZoektThuisUser ADD CONSTRAINT FK_D5BF247F395CE8D6 FOREIGN KEY (buddy_id) REFERENCES KatZoektThuisUser (id)');
        $this->addSql('ALTER TABLE KatZoektThuisUser ADD CONSTRAINT FK_D5BF247FBF396750 FOREIGN KEY (id) REFERENCES User (id) ON DELETE CASCADE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE KatZoektThuisUser DROP FOREIGN KEY FK_D5BF247F395CE8D6');
        $this->addSql('DROP TABLE KatZoektThuisUser');
    }
}
