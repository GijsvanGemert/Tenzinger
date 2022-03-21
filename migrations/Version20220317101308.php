<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220317101308 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE compensatie (id INT AUTO_INCREMENT NOT NULL, vervoersmiddel VARCHAR(255) NOT NULL, aantal_km INT NOT NULL, compensatie NUMERIC(4, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reisgegevens (id INT AUTO_INCREMENT NOT NULL, werknemer_id_id INT NOT NULL, afstand INT NOT NULL, vervoersmiddel VARCHAR(255) NOT NULL, datum DATE NOT NULL, heen TINYINT(1) NOT NULL, INDEX IDX_342AECFFE9A9E90 (werknemer_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reisgegevens ADD CONSTRAINT FK_342AECFFE9A9E90 FOREIGN KEY (werknemer_id_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reisgegevens DROP FOREIGN KEY FK_342AECFFE9A9E90');
        $this->addSql('DROP TABLE compensatie');
        $this->addSql('DROP TABLE reisgegevens');
        $this->addSql('DROP TABLE user');
    }
}
