<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220601204105 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE hunting (id INT AUTO_INCREMENT NOT NULL, pokemon_id INT NOT NULL, world_id INT NOT NULL, INDEX IDX_D32BFD142FE71C3E (pokemon_id), INDEX IDX_D32BFD148925311C (world_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hunting_world (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE hunting ADD CONSTRAINT FK_D32BFD142FE71C3E FOREIGN KEY (pokemon_id) REFERENCES pokemon_type (id)');
        $this->addSql('ALTER TABLE hunting ADD CONSTRAINT FK_D32BFD148925311C FOREIGN KEY (world_id) REFERENCES hunting_world (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hunting DROP FOREIGN KEY FK_D32BFD148925311C');
        $this->addSql('DROP TABLE hunting');
        $this->addSql('DROP TABLE hunting_world');
    }
}
