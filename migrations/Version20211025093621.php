<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211025093621 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recette (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, tempprepa VARCHAR(100) NOT NULL, tempscuisson VARCHAR(100) DEFAULT NULL, imagerecette VARCHAR(255) NOT NULL, ingredients LONGTEXT NOT NULL, explications LONGTEXT NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recette_category (recette_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_B658F93989312FE9 (recette_id), INDEX IDX_B658F93912469DE2 (category_id), PRIMARY KEY(recette_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE recette_category ADD CONSTRAINT FK_B658F93989312FE9 FOREIGN KEY (recette_id) REFERENCES recette (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recette_category ADD CONSTRAINT FK_B658F93912469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recette_category DROP FOREIGN KEY FK_B658F93912469DE2');
        $this->addSql('ALTER TABLE recette_category DROP FOREIGN KEY FK_B658F93989312FE9');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE recette');
        $this->addSql('DROP TABLE recette_category');
    }
}
