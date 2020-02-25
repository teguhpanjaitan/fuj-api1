<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200225104129 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, bio LONGTEXT DEFAULT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE groups ADD u_creator_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE groups ADD CONSTRAINT FK_F06D39706CB4D6C0 FOREIGN KEY (u_creator_id_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_F06D39706CB4D6C0 ON groups (u_creator_id_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE groups DROP FOREIGN KEY FK_F06D39706CB4D6C0');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP INDEX IDX_F06D39706CB4D6C0 ON groups');
        $this->addSql('ALTER TABLE groups DROP u_creator_id_id');
    }
}
