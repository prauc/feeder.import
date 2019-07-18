<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190718062719 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE `match` ADD matchstatus_id INT NOT NULL, ADD sourcematch_id VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE `match` ADD CONSTRAINT FK_7A5BC505984D9F4B FOREIGN KEY (matchstatus_id) REFERENCES match_status (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7A5BC505984D9F4B ON `match` (matchstatus_id)');
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
        $this->addSql('ALTER TABLE `match` DROP FOREIGN KEY FK_7A5BC505984D9F4B');
        $this->addSql('DROP INDEX UNIQ_7A5BC505984D9F4B ON `match`');
        $this->addSql('ALTER TABLE `match` DROP matchstatus_id, DROP sourcematch_id');
        $this->addSql('ALTER TABLE statistic CHANGE _date _date DATE NOT NULL');
    }
}
