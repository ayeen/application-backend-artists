<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181118154140 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE song (id INT AUTO_INCREMENT NOT NULL, customer_token VARCHAR(6) DEFAULT NULL, title VARCHAR(255) NOT NULL, length INT NOT NULL, INDEX IDX_33EDEEA19102D400 (customer_token), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE album (token VARCHAR(6) NOT NULL, album_token VARCHAR(6) DEFAULT NULL, title VARCHAR(255) NOT NULL, cover VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_39986E43298FEB1D (album_token), PRIMARY KEY(token)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE artist (token VARCHAR(6) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(token)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE song ADD CONSTRAINT FK_33EDEEA19102D400 FOREIGN KEY (customer_token) REFERENCES album (token)');
        $this->addSql('ALTER TABLE album ADD CONSTRAINT FK_39986E43298FEB1D FOREIGN KEY (album_token) REFERENCES artist (token)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE song DROP FOREIGN KEY FK_33EDEEA19102D400');
        $this->addSql('ALTER TABLE album DROP FOREIGN KEY FK_39986E43298FEB1D');
        $this->addSql('DROP TABLE song');
        $this->addSql('DROP TABLE album');
        $this->addSql('DROP TABLE artist');
    }
}
