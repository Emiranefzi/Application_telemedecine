<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220703212329 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE specialiste (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_55C86B15E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE demande ADD CONSTRAINT FK_2694D7A5FF45EEFC FOREIGN KEY (generaliste_id) REFERENCES generaliste (id)');
        $this->addSql('CREATE INDEX IDX_2694D7A5FF45EEFC ON demande (generaliste_id)');
        $this->addSql('ALTER TABLE reponse ADD specialiste_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reponse ADD CONSTRAINT FK_5FB6DEC76F1A5C10 FOREIGN KEY (specialiste_id) REFERENCES specialiste (id)');
        $this->addSql('CREATE INDEX IDX_5FB6DEC76F1A5C10 ON reponse (specialiste_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reponse DROP FOREIGN KEY FK_5FB6DEC76F1A5C10');
        $this->addSql('DROP TABLE specialiste');
        $this->addSql('ALTER TABLE demande DROP FOREIGN KEY FK_2694D7A5FF45EEFC');
        $this->addSql('DROP INDEX IDX_2694D7A5FF45EEFC ON demande');
        $this->addSql('DROP INDEX IDX_5FB6DEC76F1A5C10 ON reponse');
        $this->addSql('ALTER TABLE reponse DROP specialiste_id');
    }
}
