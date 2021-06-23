<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210623095518 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE gare ADD Ville INT DEFAULT NULL');
        $this->addSql('ALTER TABLE gare ADD CONSTRAINT FK_EE713F128202F6C7 FOREIGN KEY (Ville) REFERENCES ville (id_Ville)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EE713F128202F6C7 ON gare (Ville)');
        
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE gare DROP FOREIGN KEY FK_EE713F128202F6C7');
        $this->addSql('DROP INDEX UNIQ_EE713F128202F6C7 ON gare');
        $this->addSql('ALTER TABLE gare DROP Ville');
           }
}
