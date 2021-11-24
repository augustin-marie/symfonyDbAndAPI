<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211124090209 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE chambre (id INT AUTO_INCREMENT NOT NULL, id_service_id INT NOT NULL, numero_chambre INT NOT NULL, nb_de_lit INT NOT NULL, disponible TINYINT(1) NOT NULL, INDEX IDX_C509E4FF48D62931 (id_service_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employer (id INT AUTO_INCREMENT NOT NULL, id_service_id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, fonction VARCHAR(255) NOT NULL, num_secu_social VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_DE4CF066E7927C74 (email), INDEX IDX_DE4CF06648D62931 (id_service_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lit (id INT AUTO_INCREMENT NOT NULL, numero_chambre_id INT DEFAULT NULL, disponible TINYINT(1) NOT NULL, INDEX IDX_5DDB8E9DFBEAE2F7 (numero_chambre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE patient (id INT AUTO_INCREMENT NOT NULL, num_secu_social VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, mutuelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sejour (id INT AUTO_INCREMENT NOT NULL, id_service_id INT NOT NULL, id_lit_id INT NOT NULL, num_patient_id INT NOT NULL, date_entree DATETIME NOT NULL, date_sortie DATETIME DEFAULT NULL, motif VARCHAR(255) NOT NULL, INDEX IDX_96F5202848D62931 (id_service_id), INDEX IDX_96F520281BCE5BA (id_lit_id), UNIQUE INDEX UNIQ_96F52028E49ED2F2 (num_patient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, nom_service VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE chambre ADD CONSTRAINT FK_C509E4FF48D62931 FOREIGN KEY (id_service_id) REFERENCES service (id)');
        $this->addSql('ALTER TABLE employer ADD CONSTRAINT FK_DE4CF06648D62931 FOREIGN KEY (id_service_id) REFERENCES service (id)');
        $this->addSql('ALTER TABLE lit ADD CONSTRAINT FK_5DDB8E9DFBEAE2F7 FOREIGN KEY (numero_chambre_id) REFERENCES chambre (id)');
        $this->addSql('ALTER TABLE sejour ADD CONSTRAINT FK_96F5202848D62931 FOREIGN KEY (id_service_id) REFERENCES service (id)');
        $this->addSql('ALTER TABLE sejour ADD CONSTRAINT FK_96F520281BCE5BA FOREIGN KEY (id_lit_id) REFERENCES lit (id)');
        $this->addSql('ALTER TABLE sejour ADD CONSTRAINT FK_96F52028E49ED2F2 FOREIGN KEY (num_patient_id) REFERENCES patient (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lit DROP FOREIGN KEY FK_5DDB8E9DFBEAE2F7');
        $this->addSql('ALTER TABLE sejour DROP FOREIGN KEY FK_96F520281BCE5BA');
        $this->addSql('ALTER TABLE sejour DROP FOREIGN KEY FK_96F52028E49ED2F2');
        $this->addSql('ALTER TABLE chambre DROP FOREIGN KEY FK_C509E4FF48D62931');
        $this->addSql('ALTER TABLE employer DROP FOREIGN KEY FK_DE4CF06648D62931');
        $this->addSql('ALTER TABLE sejour DROP FOREIGN KEY FK_96F5202848D62931');
        $this->addSql('DROP TABLE chambre');
        $this->addSql('DROP TABLE employer');
        $this->addSql('DROP TABLE lit');
        $this->addSql('DROP TABLE patient');
        $this->addSql('DROP TABLE sejour');
        $this->addSql('DROP TABLE service');
    }
}
