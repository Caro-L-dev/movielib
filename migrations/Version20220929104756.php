<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20220929104756 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create MoviePerson table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE movie_person (id INT AUTO_INCREMENT NOT NULL, role LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:json)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE movie CHANGE released_date released_date DATE DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE movie_person');
        $this->addSql('ALTER TABLE movie CHANGE released_date released_date DATETIME NOT NULL');
    }
}
