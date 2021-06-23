<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210623082647 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation ADD Voyage INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955C0E80163 FOREIGN KEY (Client) REFERENCES client (id_Client)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495538318C63 FOREIGN KEY (Voyage) REFERENCES voyage (id_Voyage)');
        $this->addSql('CREATE INDEX IDX_42C84955C0E80163 ON reservation (Client)');
        $this->addSql('CREATE INDEX IDX_42C8495538318C63 ON reservation (Voyage)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955C0E80163');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495538318C63');
        $this->addSql('DROP INDEX IDX_42C84955C0E80163 ON reservation');
        $this->addSql('DROP INDEX IDX_42C8495538318C63 ON reservation');
        $this->addSql('ALTER TABLE reservation DROP Voyage');
    }
}
