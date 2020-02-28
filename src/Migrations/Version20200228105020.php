<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200228105020 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE issues ADD issue_pack_id INT NOT NULL');
        $this->addSql('ALTER TABLE issues ADD CONSTRAINT FK_DA7D7F83BCE1F7F6 FOREIGN KEY (issue_pack_id) REFERENCES issues_packs (id)');
        $this->addSql('CREATE INDEX IDX_DA7D7F83BCE1F7F6 ON issues (issue_pack_id)');
        $this->addSql('ALTER TABLE users ADD is_active TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE issues DROP FOREIGN KEY FK_DA7D7F83BCE1F7F6');
        $this->addSql('DROP INDEX IDX_DA7D7F83BCE1F7F6 ON issues');
        $this->addSql('ALTER TABLE issues DROP issue_pack_id');
        $this->addSql('ALTER TABLE users DROP is_active');
    }
}
