<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210930065942 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE movie (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, description VARCHAR(255) DEFAULT NULL, release_date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE style (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE style_movie (style_id INT NOT NULL, movie_id INT NOT NULL, INDEX IDX_D78BBC94BACD6074 (style_id), INDEX IDX_D78BBC948F93B6FC (movie_id), PRIMARY KEY(style_id, movie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE style_movie ADD CONSTRAINT FK_D78BBC94BACD6074 FOREIGN KEY (style_id) REFERENCES style (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE style_movie ADD CONSTRAINT FK_D78BBC948F93B6FC FOREIGN KEY (movie_id) REFERENCES movie (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE style_movie DROP FOREIGN KEY FK_D78BBC948F93B6FC');
        $this->addSql('ALTER TABLE style_movie DROP FOREIGN KEY FK_D78BBC94BACD6074');
        $this->addSql('DROP TABLE movie');
        $this->addSql('DROP TABLE style');
        $this->addSql('DROP TABLE style_movie');
        $this->addSql('DROP TABLE user');
    }
}
