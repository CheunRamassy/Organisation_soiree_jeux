<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250117061224 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE jeu_de_carte');
        $this->addSql('DROP TABLE jeu_de_duel');
        $this->addSql('DROP TABLE jeu_de_plateau');
        $this->addSql('ALTER TABLE jeux ADD type VARCHAR(255) NOT NULL, ADD nb_carte INT DEFAULT NULL, ADD nb_plateau INT DEFAULT NULL, ADD nb_pion INT DEFAULT NULL, ADD nb_dee INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE jeu_de_carte (id INT AUTO_INCREMENT NOT NULL, nb_carte INT NOT NULL, nom_du_jeu VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE jeu_de_duel (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE jeu_de_plateau (id INT AUTO_INCREMENT NOT NULL, nb_plateau INT NOT NULL, nb_pion INT NOT NULL, nb_dee INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE jeux DROP type, DROP nb_carte, DROP nb_plateau, DROP nb_pion, DROP nb_dee');
    }
}
