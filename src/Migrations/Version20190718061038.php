<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190718061038 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE `match` (id INT AUTO_INCREMENT NOT NULL, active TINYINT(1) NOT NULL, source VARCHAR(100) NOT NULL, sport VARCHAR(100) NOT NULL, type VARCHAR(100) NOT NULL, start_datetime DATETIME NOT NULL, end_datetime DATETIME DEFAULT NULL, commentary_url VARCHAR(255) DEFAULT NULL, statistics_url VARCHAR(255) DEFAULT NULL, league VARCHAR(255) DEFAULT NULL, season INT NOT NULL, headline VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE league (id INT AUTO_INCREMENT NOT NULL, sport_id INT NOT NULL, type VARCHAR(100) DEFAULT NULL, name VARCHAR(100) NOT NULL, sportal VARCHAR(100) DEFAULT NULL, opta VARCHAR(100) DEFAULT NULL, gsm VARCHAR(100) DEFAULT NULL, spox VARCHAR(100) DEFAULT NULL, shortcut VARCHAR(100) DEFAULT NULL, INDEX IDX_3EB4C318AC78BCF8 (sport_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sport (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, advertisment VARCHAR(50) DEFAULT NULL, internal VARCHAR(50) NOT NULL, sportal VARCHAR(50) DEFAULT NULL, opta VARCHAR(50) DEFAULT NULL, gsm VARCHAR(50) DEFAULT NULL, spox VARCHAR(50) DEFAULT NULL, thumbnail VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE team (id INT AUTO_INCREMENT NOT NULL, league_id INT NOT NULL, name VARCHAR(100) NOT NULL, sportal VARCHAR(100) DEFAULT NULL, opta VARCHAR(100) DEFAULT NULL, gsm VARCHAR(100) DEFAULT NULL, thumbnail VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_C4E0A61F58AFC4DE (league_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE match_status (id INT AUTO_INCREMENT NOT NULL, sport_id INT NOT NULL, sportal VARCHAR(50) NOT NULL, opta VARCHAR(50) NOT NULL, gsm VARCHAR(50) NOT NULL, code INT NOT NULL, name VARCHAR(100) NOT NULL, status VARCHAR(100) NOT NULL, headline VARCHAR(100) NOT NULL, INDEX IDX_DA6F9C1DAC78BCF8 (sport_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE match_soccer (id INT AUTO_INCREMENT NOT NULL, parent_id INT NOT NULL, hero_id INT NOT NULL, villain_id INT NOT NULL, halftime_result VARCHAR(50) DEFAULT NULL, result VARCHAR(50) DEFAULT NULL, UNIQUE INDEX UNIQ_43FA6537727ACA70 (parent_id), INDEX IDX_43FA653745B0BCD (hero_id), INDEX IDX_43FA6537363C6CE2 (villain_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE league ADD CONSTRAINT FK_3EB4C318AC78BCF8 FOREIGN KEY (sport_id) REFERENCES sport (id)');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61F58AFC4DE FOREIGN KEY (league_id) REFERENCES league (id)');
        $this->addSql('ALTER TABLE match_status ADD CONSTRAINT FK_DA6F9C1DAC78BCF8 FOREIGN KEY (sport_id) REFERENCES sport (id)');
        $this->addSql('ALTER TABLE match_soccer ADD CONSTRAINT FK_43FA6537727ACA70 FOREIGN KEY (parent_id) REFERENCES `match` (id)');
        $this->addSql('ALTER TABLE match_soccer ADD CONSTRAINT FK_43FA653745B0BCD FOREIGN KEY (hero_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE match_soccer ADD CONSTRAINT FK_43FA6537363C6CE2 FOREIGN KEY (villain_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE backend CHANGE uri uri VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE statistic CHANGE _date _date DATE NOT NULL');
        $this->addSql('ALTER TABLE home CHANGE homeId homeId VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE backend_sessions CHANGE id id VARCHAR(128) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE match_soccer DROP FOREIGN KEY FK_43FA6537727ACA70');
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY FK_C4E0A61F58AFC4DE');
        $this->addSql('ALTER TABLE league DROP FOREIGN KEY FK_3EB4C318AC78BCF8');
        $this->addSql('ALTER TABLE match_status DROP FOREIGN KEY FK_DA6F9C1DAC78BCF8');
        $this->addSql('ALTER TABLE match_soccer DROP FOREIGN KEY FK_43FA653745B0BCD');
        $this->addSql('ALTER TABLE match_soccer DROP FOREIGN KEY FK_43FA6537363C6CE2');
        $this->addSql('DROP TABLE `match`');
        $this->addSql('DROP TABLE league');
        $this->addSql('DROP TABLE sport');
        $this->addSql('DROP TABLE team');
        $this->addSql('DROP TABLE match_status');
        $this->addSql('DROP TABLE match_soccer');
        $this->addSql('ALTER TABLE backend CHANGE uri uri VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE backend_sessions CHANGE id id VARCHAR(128) CHARACTER SET utf8 NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE home CHANGE homeId homeId VARCHAR(50) CHARACTER SET utf8 NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE statistic CHANGE _date _date DATE NOT NULL');
    }
}
