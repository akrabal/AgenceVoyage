<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210623093532 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs  
        $this->addSql('ALTER TABLE voyage ADD GareDepart INT DEFAULT NULL, ADD GareArriver INT DEFAULT NULL');
        $this->addSql('ALTER TABLE voyage ADD CONSTRAINT FK_3F9D89554E5F0B7A FOREIGN KEY (GareDepart) REFERENCES gare (id_Gare)');
        $this->addSql('ALTER TABLE voyage ADD CONSTRAINT FK_3F9D89557BD8D573 FOREIGN KEY (GareArriver) REFERENCES gare (id_Gare)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3F9D89554E5F0B7A ON voyage (GareDepart)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3F9D89557BD8D573 ON voyage (GareArriver)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE voyage DROP FOREIGN KEY FK_3F9D89554E5F0B7A');
        $this->addSql('ALTER TABLE voyage DROP FOREIGN KEY FK_3F9D89557BD8D573');
        $this->addSql('DROP INDEX UNIQ_3F9D89554E5F0B7A ON voyage');
        $this->addSql('DROP INDEX UNIQ_3F9D89557BD8D573 ON voyage');
        $this->addSql('ALTER TABLE voyage DROP GareDepart, DROP GareArriver');
        
    }
}
