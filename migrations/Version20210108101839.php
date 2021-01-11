<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210108101839 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL, room_id INT DEFAULT NULL, type_id INT DEFAULT NULL, staff_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, public INT NOT NULL, begin_at DATETIME NOT NULL, end_at DATETIME NOT NULL, text LONGTEXT NOT NULL, slug VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_3BAE0AA754177093 (room_id), INDEX IDX_3BAE0AA7C54C8C93 (type_id), INDEX IDX_3BAE0AA7D4D57CD (staff_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event_requirement (event_id INT NOT NULL, requirement_id INT NOT NULL, INDEX IDX_70B686D071F7E88B (event_id), INDEX IDX_70B686D07B576F77 (requirement_id), PRIMARY KEY(event_id, requirement_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE requirement (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE room (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(150) NOT NULL, capacity INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE staff (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, alias VARCHAR(100) NOT NULL, mail VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA754177093 FOREIGN KEY (room_id) REFERENCES room (id)');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA7C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA7D4D57CD FOREIGN KEY (staff_id) REFERENCES staff (id)');
        $this->addSql('ALTER TABLE event_requirement ADD CONSTRAINT FK_70B686D071F7E88B FOREIGN KEY (event_id) REFERENCES event (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE event_requirement ADD CONSTRAINT FK_70B686D07B576F77 FOREIGN KEY (requirement_id) REFERENCES requirement (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE event_requirement DROP FOREIGN KEY FK_70B686D071F7E88B');
        $this->addSql('ALTER TABLE event_requirement DROP FOREIGN KEY FK_70B686D07B576F77');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA754177093');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA7D4D57CD');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA7C54C8C93');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE event_requirement');
        $this->addSql('DROP TABLE requirement');
        $this->addSql('DROP TABLE room');
        $this->addSql('DROP TABLE staff');
        $this->addSql('DROP TABLE type');
    }
}
