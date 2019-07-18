<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190718085159 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE backend CHANGE uri uri VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE statistic CHANGE _date _date DATE NOT NULL');
        $this->addSql('ALTER TABLE home CHANGE homeId homeId VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE backend_sessions CHANGE id id VARCHAR(128) NOT NULL');
        $this->addSql('ALTER TABLE team DROP INDEX UNIQ_C4E0A61F58AFC4DE, ADD INDEX IDX_C4E0A61F58AFC4DE (league_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE backend CHANGE uri uri VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE backend_sessions CHANGE id id VARCHAR(128) CHARACTER SET utf8 NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE home CHANGE homeId homeId VARCHAR(50) CHARACTER SET utf8 NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE statistic CHANGE _date _date DATE NOT NULL');
        $this->addSql('ALTER TABLE team DROP INDEX IDX_C4E0A61F58AFC4DE, ADD UNIQUE INDEX UNIQ_C4E0A61F58AFC4DE (league_id)');
    }
}
