<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210709102808 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955C0E80163');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP INDEX IDX_42C84955C0E80163 ON reservation');
        $this->addSql('ALTER TABLE reservation CHANGE client User INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849552DA17977 FOREIGN KEY (User) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_42C849552DA17977 ON reservation (User)');
        $this->addSql('ALTER TABLE user ADD nom_user VARCHAR(255) NOT NULL, ADD adresse_mail_user VARCHAR(255) NOT NULL, ADD numero_user VARCHAR(255) NOT NULL, ADD adresse_physique_user VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (idClient INT AUTO_INCREMENT NOT NULL, nom_client VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, prenom_client VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, adresse_mail_client VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, numero_client VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, adresse_physique_client VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(idClient)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849552DA17977');
        $this->addSql('DROP INDEX IDX_42C849552DA17977 ON reservation');
        $this->addSql('ALTER TABLE reservation CHANGE user Client INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955C0E80163 FOREIGN KEY (Client) REFERENCES client (idClient)');
        $this->addSql('CREATE INDEX IDX_42C84955C0E80163 ON reservation (Client)');
        $this->addSql('ALTER TABLE user DROP nom_user, DROP adresse_mail_user, DROP numero_user, DROP adresse_physique_user');
    }
}
