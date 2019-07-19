<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190718101127 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE commentary (id INT AUTO_INCREMENT NOT NULL, match_id INT NOT NULL, minute VARCHAR(50) NOT NULL, status VARCHAR(50) DEFAULT NULL, comment LONGTEXT NOT NULL, sort_id DOUBLE PRECISION NOT NULL, INDEX IDX_1CAC12CA2ABEACD6 (match_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commentary ADD CONSTRAINT FK_1CAC12CA2ABEACD6 FOREIGN KEY (match_id) REFERENCES `match` (id)');
        $this->addSql('ALTER TABLE backend CHANGE uri uri VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE statistic CHANGE _date _date DATE NOT NULL');
        $this->addSql('ALTER TABLE home CHANGE homeId homeId VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE backend_sessions CHANGE id id VARCHAR(128) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE commentary');
        $this->addSql('ALTER TABLE backend CHANGE uri uri VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE backend_sessions CHANGE id id VARCHAR(128) CHARACTER SET utf8 NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE home CHANGE homeId homeId VARCHAR(50) CHARACTER SET utf8 NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE statistic CHANGE _date _date DATE NOT NULL');
    }
}
