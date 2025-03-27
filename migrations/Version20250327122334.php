<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250327122334 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE enseigne_categorie (enseigne_id INT NOT NULL, categorie_id INT NOT NULL, INDEX IDX_877C03BD6C2A0A71 (enseigne_id), INDEX IDX_877C03BDBCF5E72D (categorie_id), PRIMARY KEY(enseigne_id, categorie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE enseigne_categorie ADD CONSTRAINT FK_877C03BD6C2A0A71 FOREIGN KEY (enseigne_id) REFERENCES enseigne (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE enseigne_categorie ADD CONSTRAINT FK_877C03BDBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE enseigne_categorie DROP FOREIGN KEY FK_877C03BD6C2A0A71
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE enseigne_categorie DROP FOREIGN KEY FK_877C03BDBCF5E72D
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE enseigne_categorie
        SQL);
    }
}
