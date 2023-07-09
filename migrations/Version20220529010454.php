<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220529010454 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE elementary_type (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pokemon_type (id INT AUTO_INCREMENT NOT NULL, type1_id INT NOT NULL, type2_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, evolution TINYINT(1) NOT NULL, starter TINYINT(1) NOT NULL, INDEX IDX_B077296ABFAFA3E1 (type1_id), INDEX IDX_B077296AAD1A0C0F (type2_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pokemon_type ADD CONSTRAINT FK_B077296ABFAFA3E1 FOREIGN KEY (type1_id) REFERENCES elementary_type (id)');
        $this->addSql('ALTER TABLE pokemon_type ADD CONSTRAINT FK_B077296AAD1A0C0F FOREIGN KEY (type2_id) REFERENCES elementary_type (id)');
        $this->addSql('ALTER TABLE dresseur RENAME INDEX email TO UNIQ_77EA2FC6E7927C74');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pokemon_type DROP FOREIGN KEY FK_B077296ABFAFA3E1');
        $this->addSql('ALTER TABLE pokemon_type DROP FOREIGN KEY FK_B077296AAD1A0C0F');
        $this->addSql('DROP TABLE elementary_type');
        $this->addSql('DROP TABLE pokemon_type');
        $this->addSql('ALTER TABLE dresseur RENAME INDEX uniq_77ea2fc6e7927c74 TO email');
    }
}
