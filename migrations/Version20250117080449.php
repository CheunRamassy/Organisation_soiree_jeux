<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250117080449 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE evenement ADD choix_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_B26681ED9144651 FOREIGN KEY (choix_id) REFERENCES jeux (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B26681ED9144651 ON evenement (choix_id)');
        $this->addSql('ALTER TABLE utilisateur ADD organisateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3D936B2FA FOREIGN KEY (organisateur_id) REFERENCES evenement (id)');
        $this->addSql('CREATE INDEX IDX_1D1C63B3D936B2FA ON utilisateur (organisateur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY FK_B26681ED9144651');
        $this->addSql('DROP INDEX UNIQ_B26681ED9144651 ON evenement');
        $this->addSql('ALTER TABLE evenement DROP choix_id');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3D936B2FA');
        $this->addSql('DROP INDEX IDX_1D1C63B3D936B2FA ON utilisateur');
        $this->addSql('ALTER TABLE utilisateur DROP organisateur_id');
    }
}
