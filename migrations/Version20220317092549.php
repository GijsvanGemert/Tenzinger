<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220317092549 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE compensatie (id INT AUTO_INCREMENT NOT NULL, vervoersmiddel VARCHAR(255) NOT NULL, aantal_kilometer INT NOT NULL, compensatie NUMERIC(4, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reisgegevens ADD werknemer_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE reisgegevens ADD CONSTRAINT FK_342AECFFE9A9E90 FOREIGN KEY (werknemer_id_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_342AECFFE9A9E90 ON reisgegevens (werknemer_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE compensatie');
        $this->addSql('ALTER TABLE reisgegevens DROP FOREIGN KEY FK_342AECFFE9A9E90');
        $this->addSql('DROP INDEX IDX_342AECFFE9A9E90 ON reisgegevens');
        $this->addSql('ALTER TABLE reisgegevens DROP werknemer_id_id');
    }
}
