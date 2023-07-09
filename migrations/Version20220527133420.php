<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220527133420 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ref_pokemon_type DROP FOREIGN KEY FK_5483EF99564D586');
        $this->addSql('ALTER TABLE ref_pokemon_type DROP FOREIGN KEY FK_5483EF999C6D843C');
        $this->addSql('CREATE TABLE dresseur (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL UNIQUE, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, coins INT NOT NULL, type INT NOT NULL, PRIMARY KEY(id)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');
        $this->addSql('DROP TABLE dresseurs');
        $this->addSql('DROP TABLE migration_versions');
        $this->addSql('DROP TABLE posede_pok');
        $this->addSql('DROP TABLE ref_elementary_type');
        $this->addSql('DROP TABLE ref_pokemon_type');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE dresseurs (id_dresseurs INT AUTO_INCREMENT NOT NULL, user_name CHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, password CHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, mail CHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, coins INT DEFAULT 500, Genre INT DEFAULT 0 NOT NULL, PRIMARY KEY(id_dresseurs)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('CREATE TABLE migration_versions (version VARCHAR(14) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, executed_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(version)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE posede_pok (id INT NOT NULL, id_dresseurs INT NOT NULL, INDEX FK_posede_pok2 (id_dresseurs), PRIMARY KEY(id, id_dresseurs)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('CREATE TABLE ref_elementary_type (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE ref_pokemon_type (id INT AUTO_INCREMENT NOT NULL, type_1 INT DEFAULT NULL, type_2 INT DEFAULT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, evolution TINYINT(1) NOT NULL, starter TINYINT(1) NOT NULL, type_courbe_niveau CHAR(1) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_5483EF99564D586 (type_2), INDEX IDX_5483EF999C6D843C (type_1), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE ref_pokemon_type ADD CONSTRAINT FK_5483EF99564D586 FOREIGN KEY (type_2) REFERENCES ref_elementary_type (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE ref_pokemon_type ADD CONSTRAINT FK_5483EF999C6D843C FOREIGN KEY (type_1) REFERENCES ref_elementary_type (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('DROP TABLE dresseur');
    }
}
