<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210809082916 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE experiences (id INT AUTO_INCREMENT NOT NULL, id_cv_id INT NOT NULL, title VARCHAR(255) NOT NULL, company VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_82020E70216158D2 (id_cv_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skills (id INT AUTO_INCREMENT NOT NULL, id_cv_id INT NOT NULL, type VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, level VARCHAR(255) NOT NULL, INDEX IDX_D5311670216158D2 (id_cv_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE experiences ADD CONSTRAINT FK_82020E70216158D2 FOREIGN KEY (id_cv_id) REFERENCES cv (id)');
        $this->addSql('ALTER TABLE skills ADD CONSTRAINT FK_D5311670216158D2 FOREIGN KEY (id_cv_id) REFERENCES cv (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE experiences');
        $this->addSql('DROP TABLE skills');
    }
}
