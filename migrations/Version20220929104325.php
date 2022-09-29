<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20220929104325 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Change type of releasedDate field';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE movie CHANGE released_date released_date DATE DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE movie CHANGE released_date released_date DATETIME NOT NULL');
    }
}