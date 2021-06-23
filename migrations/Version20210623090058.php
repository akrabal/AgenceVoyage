<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210623090058 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs

        $this->addSql('ALTER TABLE voyage ADD Compagnie INT DEFAULT NULL');
        $this->addSql('ALTER TABLE voyage ADD CONSTRAINT FK_3F9D895520938BCB FOREIGN KEY (Compagnie) REFERENCES compagnie (id_Compagnie)');
        $this->addSql('CREATE INDEX IDX_3F9D895520938BCB ON voyage (Compagnie)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
      
        $this->addSql('ALTER TABLE voyage DROP FOREIGN KEY FK_3F9D895520938BCB');
        $this->addSql('DROP INDEX IDX_3F9D895520938BCB ON voyage');
        $this->addSql('ALTER TABLE voyage DROP Compagnie');
    }
}
