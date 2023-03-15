<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230315165350 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX uk_mail ON person');
        $this->addSql('ALTER TABLE person DROP mail, DROP middle_name, DROP birthday, DROP created_date, DROP updated_date, DROP deleted_date, DROP deleted, CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE first_name first_name VARCHAR(255) NOT NULL, CHANGE last_name last_name VARCHAR(255) DEFAULT NULL, CHANGE nif nif INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE person ADD mail VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT \'\' COLLATE `utf8mb4_unicode_ci`, ADD middle_name VARCHAR(250) CHARACTER SET utf8mb4 DEFAULT \'\' NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD birthday DATE DEFAULT \'0000-00-00\' NOT NULL, ADD created_date DATETIME DEFAULT \'0000-00-00 00:00:00\' NOT NULL, ADD updated_date DATETIME DEFAULT \'0000-00-00 00:00:00\' NOT NULL, ADD deleted_date DATETIME DEFAULT \'0000-00-00 00:00:00\' NOT NULL, ADD deleted INT UNSIGNED DEFAULT 0 NOT NULL, CHANGE id id INT UNSIGNED AUTO_INCREMENT NOT NULL, CHANGE first_name first_name VARCHAR(250) CHARACTER SET utf8mb4 DEFAULT \'\' NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE last_name last_name VARCHAR(250) CHARACTER SET utf8mb4 DEFAULT \'\' NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nif nif INT UNSIGNED DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX uk_mail ON person (mail)');
    }
}
