<?php

namespace App\Command;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[AsCommand(
    name: 'app:create-admin',
    description: 'Creates a new admin user',
)]
class CreateAdminCommand extends Command
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private UserPasswordHasherInterface $passwordHasher
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        
        $user = new User();
        $user->setEmail('admin@example.com');
        $user->setNom('Admin');
        $user->setPrenom('System');
        $user->setAge(30);
        $user->setPassword($this->passwordHasher->hashPassword($user, 'admin123'));
        $user->setRoles(['ROLE_ADMIN']);
        
        $this->entityManager->persist($user);
        $this->entityManager->flush();
        
        $io->success('Admin user created successfully!');
        
        return Command::SUCCESS;
    }
}