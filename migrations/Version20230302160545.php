<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230302160545 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(
            "CREATE TABLE IF NOT EXISTS person (
                id           int(10) unsigned NOT NULL AUTO_INCREMENT,
                mail         varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '',
                first_name   varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
                last_name    varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
                middle_name  varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
                birthday     date NOT NULL DEFAULT '0000-00-00',
                nif          int(10) unsigned,
                created_date datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
                updated_date datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
                deleted_date datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
                deleted      int(2) unsigned NOT NULL DEFAULT '0',
            PRIMARY KEY (id),
            UNIQUE uk_mail (mail)  
          ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1");

    }

    public function down(Schema $schema): void
    {
        $this->addSql("DROP TABLE person");
    }
}
