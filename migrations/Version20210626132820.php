<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210626132820 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (idClient INT AUTO_INCREMENT NOT NULL, nom_client VARCHAR(255) NOT NULL, prenom_client VARCHAR(255) NOT NULL, adresse_mail_client VARCHAR(255) NOT NULL, numero_client VARCHAR(255) NOT NULL, adresse_physique_client VARCHAR(255) NOT NULL, PRIMARY KEY(idClient)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compagnie (idCompagnie INT AUTO_INCREMENT NOT NULL, nom_compagnie VARCHAR(255) NOT NULL, coordonnes_compagnie VARCHAR(255) NOT NULL, PRIMARY KEY(idCompagnie)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gare (idGare INT AUTO_INCREMENT NOT NULL, localisation_gare VARCHAR(255) NOT NULL, Ville INT DEFAULT NULL, UNIQUE INDEX UNIQ_EE713F128202F6C7 (Ville), PRIMARY KEY(idGare)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (idReservation INT AUTO_INCREMENT NOT NULL, date_reservation DATETIME NOT NULL, statut_reservation VARCHAR(255) NOT NULL, Client INT DEFAULT NULL, Voyage INT DEFAULT NULL, INDEX IDX_42C84955C0E80163 (Client), INDEX IDX_42C8495538318C63 (Voyage), PRIMARY KEY(idReservation)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ville (idVille INT AUTO_INCREMENT NOT NULL, nom_ville VARCHAR(255) NOT NULL, PRIMARY KEY(idVille)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE voyage (idVoyage INT AUTO_INCREMENT NOT NULL, heure_depart DATETIME NOT NULL, heure_arrive DATETIME NOT NULL, statut_voyage VARCHAR(255) NOT NULL, Compagnie INT DEFAULT NULL, GareDepart INT DEFAULT NULL, GareArriver INT DEFAULT NULL, INDEX IDX_3F9D895520938BCB (Compagnie), UNIQUE INDEX UNIQ_3F9D89554E5F0B7A (GareDepart), UNIQUE INDEX UNIQ_3F9D89557BD8D573 (GareArriver), PRIMARY KEY(idVoyage)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE gare ADD CONSTRAINT FK_EE713F128202F6C7 FOREIGN KEY (Ville) REFERENCES ville (idVille)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955C0E80163 FOREIGN KEY (Client) REFERENCES client (idClient)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495538318C63 FOREIGN KEY (Voyage) REFERENCES voyage (idVoyage)');
        $this->addSql('ALTER TABLE voyage ADD CONSTRAINT FK_3F9D895520938BCB FOREIGN KEY (Compagnie) REFERENCES compagnie (idCompagnie)');
        $this->addSql('ALTER TABLE voyage ADD CONSTRAINT FK_3F9D89554E5F0B7A FOREIGN KEY (GareDepart) REFERENCES gare (idGare)');
        $this->addSql('ALTER TABLE voyage ADD CONSTRAINT FK_3F9D89557BD8D573 FOREIGN KEY (GareArriver) REFERENCES gare (idGare)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955C0E80163');
        $this->addSql('ALTER TABLE voyage DROP FOREIGN KEY FK_3F9D895520938BCB');
        $this->addSql('ALTER TABLE voyage DROP FOREIGN KEY FK_3F9D89554E5F0B7A');
        $this->addSql('ALTER TABLE voyage DROP FOREIGN KEY FK_3F9D89557BD8D573');
        $this->addSql('ALTER TABLE gare DROP FOREIGN KEY FK_EE713F128202F6C7');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495538318C63');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE compagnie');
        $this->addSql('DROP TABLE gare');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE ville');
        $this->addSql('DROP TABLE voyage');
    }
}
