<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220420094044 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie_vaccin (id INT AUTO_INCREMENT NOT NULL, nom_vaccin VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rendez_vous (id INT AUTO_INCREMENT NOT NULL, id_employer_id INT NOT NULL, id_patient_id INT NOT NULL, num_lot_id INT NOT NULL, date_rdv DATE NOT NULL, annule DATE NOT NULL, INDEX IDX_65E8AA0A59DF538D (id_employer_id), INDEX IDX_65E8AA0ACE0312AE (id_patient_id), INDEX IDX_65E8AA0A11EAF24F (num_lot_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vaccin (id INT AUTO_INCREMENT NOT NULL, id_cat_id INT NOT NULL, num_lot INT NOT NULL, date_peremtion DATE NOT NULL, taille_lot INT NOT NULL, restant INT NOT NULL, INDEX IDX_B5DCA0A7C09A1CAE (id_cat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE rendez_vous ADD CONSTRAINT FK_65E8AA0A59DF538D FOREIGN KEY (id_employer_id) REFERENCES employer (id)');
        $this->addSql('ALTER TABLE rendez_vous ADD CONSTRAINT FK_65E8AA0ACE0312AE FOREIGN KEY (id_patient_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE rendez_vous ADD CONSTRAINT FK_65E8AA0A11EAF24F FOREIGN KEY (num_lot_id) REFERENCES vaccin (id)');
        $this->addSql('ALTER TABLE vaccin ADD CONSTRAINT FK_B5DCA0A7C09A1CAE FOREIGN KEY (id_cat_id) REFERENCES categorie_vaccin (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vaccin DROP FOREIGN KEY FK_B5DCA0A7C09A1CAE');
        $this->addSql('ALTER TABLE rendez_vous DROP FOREIGN KEY FK_65E8AA0A11EAF24F');
        $this->addSql('DROP TABLE categorie_vaccin');
        $this->addSql('DROP TABLE rendez_vous');
        $this->addSql('DROP TABLE vaccin');
    }
}
