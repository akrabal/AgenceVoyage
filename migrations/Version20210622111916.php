<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210622111916 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (id_client INT AUTO_INCREMENT NOT NULL, nom_client VARCHAR(255) NOT NULL, prenom_client VARCHAR(255) NOT NULL, adresse_mail_client VARCHAR(255) NOT NULL, numero_client VARCHAR(255) NOT NULL, adresse_physique_client VARCHAR(255) NOT NULL, PRIMARY KEY(id_client)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compagnie (id_compagnie INT AUTO_INCREMENT NOT NULL, nom_compagnie VARCHAR(255) NOT NULL, coordonnes_compagnie VARCHAR(255) NOT NULL, PRIMARY KEY(id_compagnie)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gare (id_gare INT AUTO_INCREMENT NOT NULL, localisation_gare VARCHAR(255) NOT NULL, PRIMARY KEY(id_gare)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id_reservation INT AUTO_INCREMENT NOT NULL, date_reservation DATETIME NOT NULL, statut_reservation VARCHAR(255) NOT NULL, PRIMARY KEY(id_reservation)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ville (id_ville INT AUTO_INCREMENT NOT NULL, nom_ville VARCHAR(255) NOT NULL, PRIMARY KEY(id_ville)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE voyage (id_voyage INT AUTO_INCREMENT NOT NULL, heure_depart DATETIME NOT NULL, heure_arrive DATETIME NOT NULL, statut_voyage VARCHAR(255) NOT NULL, PRIMARY KEY(id_voyage)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE compagnie');
        $this->addSql('DROP TABLE gare');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE ville');
        $this->addSql('DROP TABLE voyage');
    }
}
