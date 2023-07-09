<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220529011736 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pokemon_collection (id INT AUTO_INCREMENT NOT NULL, dresseur_id INT NOT NULL, pokemon_id INT NOT NULL, experience INT NOT NULL, prix INT NOT NULL, action VARCHAR(255) NOT NULL, time_starting_action TIME NOT NULL, INDEX IDX_2E710925A1A01CBE (dresseur_id), INDEX IDX_2E7109252FE71C3E (pokemon_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pokemon_collection ADD CONSTRAINT FK_2E710925A1A01CBE FOREIGN KEY (dresseur_id) REFERENCES dresseur (id)');
        $this->addSql('ALTER TABLE pokemon_collection ADD CONSTRAINT FK_2E7109252FE71C3E FOREIGN KEY (pokemon_id) REFERENCES pokemon_type (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE pokemon_collection');
    }
}
