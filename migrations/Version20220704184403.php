<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220704184403 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE demande DROP FOREIGN KEY FK_2694D7A5FF45EEFC');
        $this->addSql('ALTER TABLE demande ADD CONSTRAINT FK_2694D7A5FF45EEFCFF45EEFC FOREIGN KEY (generaliste_id) REFERENCES generaliste (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE demande DROP FOREIGN KEY FK_2694D7A5FF45EEFCFF45EEFC');
        $this->addSql('ALTER TABLE demande ADD CONSTRAINT FK_2694D7A5FF45EEFC FOREIGN KEY (generaliste_id) REFERENCES generaliste (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
    }
}
