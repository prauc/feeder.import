<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190718062808 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE `match` ADD league_id INT NOT NULL, DROP league');
        $this->addSql('ALTER TABLE `match` ADD CONSTRAINT FK_7A5BC50558AFC4DE FOREIGN KEY (league_id) REFERENCES league (id)');
        $this->addSql('CREATE INDEX IDX_7A5BC50558AFC4DE ON `match` (league_id)');
        $this->addSql('ALTER TABLE backend CHANGE uri uri VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE statistic CHANGE _date _date DATE NOT NULL');
        $this->addSql('ALTER TABLE home CHANGE homeId homeId VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE backend_sessions CHANGE id id VARCHAR(128) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE backend CHANGE uri uri VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE backend_sessions CHANGE id id VARCHAR(128) CHARACTER SET utf8 NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE home CHANGE homeId homeId VARCHAR(50) CHARACTER SET utf8 NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE `match` DROP FOREIGN KEY FK_7A5BC50558AFC4DE');
        $this->addSql('DROP INDEX IDX_7A5BC50558AFC4DE ON `match`');
        $this->addSql('ALTER TABLE `match` ADD league VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE utf8mb4_unicode_ci, DROP league_id');
        $this->addSql('ALTER TABLE statistic CHANGE _date _date DATE NOT NULL');
    }
}
