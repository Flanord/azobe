<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201124110247 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ala_une (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, auteur VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE appel_projet (id INT AUTO_INCREMENT NOT NULL, secteur_id INT NOT NULL, user_id INT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, slug VARCHAR(255) NOT NULL, INDEX IDX_65B3E4289F7E4405 (secteur_id), INDEX IDX_65B3E428A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE candidature_appel_projet (id INT AUTO_INCREMENT NOT NULL, appel_projet_id INT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, email VARCHAR(255) NOT NULL, numero_tel VARCHAR(255) NOT NULL, fiche_projet VARCHAR(255) NOT NULL, fiche_budjet VARCHAR(255) NOT NULL, recepisse VARCHAR(255) NOT NULL, statut VARCHAR(255) NOT NULL, proce_verbal VARCHAR(255) NOT NULL, url_site VARCHAR(255) NOT NULL, INDEX IDX_3E4400E2386506D3 (appel_projet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE edito (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image_une (id INT AUTO_INCREMENT NOT NULL, ala_une_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_33377004463102BE (ala_une_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE images (id INT AUTO_INCREMENT NOT NULL, appel_projet_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_E01FBE6A386506D3 (appel_projet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reset_password_request (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, selector VARCHAR(20) NOT NULL, hashed_token VARCHAR(100) NOT NULL, requested_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', expires_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_7CE748AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE secteur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE appel_projet ADD CONSTRAINT FK_65B3E4289F7E4405 FOREIGN KEY (secteur_id) REFERENCES secteur (id)');
        $this->addSql('ALTER TABLE appel_projet ADD CONSTRAINT FK_65B3E428A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE candidature_appel_projet ADD CONSTRAINT FK_3E4400E2386506D3 FOREIGN KEY (appel_projet_id) REFERENCES appel_projet (id)');
        $this->addSql('ALTER TABLE image_une ADD CONSTRAINT FK_33377004463102BE FOREIGN KEY (ala_une_id) REFERENCES ala_une (id)');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6A386506D3 FOREIGN KEY (appel_projet_id) REFERENCES appel_projet (id)');
        $this->addSql('ALTER TABLE reset_password_request ADD CONSTRAINT FK_7CE748AA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE image_une DROP FOREIGN KEY FK_33377004463102BE');
        $this->addSql('ALTER TABLE candidature_appel_projet DROP FOREIGN KEY FK_3E4400E2386506D3');
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6A386506D3');
        $this->addSql('ALTER TABLE appel_projet DROP FOREIGN KEY FK_65B3E4289F7E4405');
        $this->addSql('ALTER TABLE appel_projet DROP FOREIGN KEY FK_65B3E428A76ED395');
        $this->addSql('ALTER TABLE reset_password_request DROP FOREIGN KEY FK_7CE748AA76ED395');
        $this->addSql('DROP TABLE ala_une');
        $this->addSql('DROP TABLE appel_projet');
        $this->addSql('DROP TABLE candidature_appel_projet');
        $this->addSql('DROP TABLE edito');
        $this->addSql('DROP TABLE image_une');
        $this->addSql('DROP TABLE images');
        $this->addSql('DROP TABLE reset_password_request');
        $this->addSql('DROP TABLE secteur');
        $this->addSql('DROP TABLE users');
    }
}
