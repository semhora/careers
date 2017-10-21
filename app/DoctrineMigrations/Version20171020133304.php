<?php

namespace App\DoctrineMigrations;

use App\Entities\User;
use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171020133304 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $em = initializeDoctrine();

        $user = new User();
        $user->setName('Raul')
            ->setEmail('raul.3k@gmail.com')
            ->setPassword('101010'); // The password will be encrypted

        $em->persist($user);
        $em->flush();
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $em = initializeDoctrine();

        $user = $em->getRepository(User::class)->findOneBy([
            'name' => 'Raul',
            'email' => 'raul.3k@gmail.com',
        ]);
        $em->remove($user);
        $em->flush();
    }
}
