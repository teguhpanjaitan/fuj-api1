<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200225150348 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE issues_packs (id INT AUTO_INCREMENT NOT NULL, the_group_id INT NOT NULL, u_creator_id INT NOT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_C92B5574B7DD4C24 (the_group_id), INDEX IDX_C92B5574AED27FB9 (u_creator_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE issues (id INT AUTO_INCREMENT NOT NULL, issues_pack_id INT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_DA7D7F83DE3C0876 (issues_pack_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE issues_packs ADD CONSTRAINT FK_C92B5574B7DD4C24 FOREIGN KEY (the_group_id) REFERENCES groups (id)');
        $this->addSql('ALTER TABLE issues_packs ADD CONSTRAINT FK_C92B5574AED27FB9 FOREIGN KEY (u_creator_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE issues ADD CONSTRAINT FK_DA7D7F83DE3C0876 FOREIGN KEY (issues_pack_id) REFERENCES issues_packs (id)');
        $this->addSql('ALTER TABLE group_user_aliases ADD CONSTRAINT FK_EB59EF0AA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE group_user_aliases ADD CONSTRAINT FK_EB59EF0AB7DD4C24 FOREIGN KEY (the_group_id) REFERENCES groups (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE issues DROP FOREIGN KEY FK_DA7D7F83DE3C0876');
        $this->addSql('DROP TABLE issues_packs');
        $this->addSql('DROP TABLE issues');
        $this->addSql('ALTER TABLE group_user_aliases DROP FOREIGN KEY FK_EB59EF0AA76ED395');
        $this->addSql('ALTER TABLE group_user_aliases DROP FOREIGN KEY FK_EB59EF0AB7DD4C24');
    }
}
