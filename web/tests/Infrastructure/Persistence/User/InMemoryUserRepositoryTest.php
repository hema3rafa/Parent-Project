<?php
declare(strict_types=1);

namespace Tests\Infrastructure\Persistence\User;

use App\Domain\User\User;
use App\Domain\User\UserNotFoundException;
use App\Infrastructure\Persistence\User\InMemoryUserRepository;
use Tests\TestCase;

class InMemoryUserRepositoryTest extends TestCase
{
    public function testFindAll()
    {
        $users = [
            1 => new User('1', 'hema3rafa@gmail.com', 'EGP', 'authorised', 100.0, '2018-12-22', 'DataProviderY'),
            2 => new User('2', 'hema3rafa2@gmail.com', 'EGP', 'authorised', 100.0, '2018-12-22', 'DataProviderY'),
            3 => new User('3', 'hema3rafa3@gmail.com', 'EGP', 'authorised', 100.0, '2018-12-22', 'DataProviderY'),
            4 => new User('4', 'hema3rafa4@gmail.com', 'EGP', 'authorised', 100.0, '2018-12-22', 'DataProviderY'),
            5 => new User('5', 'hema3rafa5@gmail.com', 'EGP', 'authorised', 100.0, '2018-12-22', 'DataProviderY'),
        ];

        $userRepository = new InMemoryUserRepository($users);

        $this->assertEquals(array_values($users), $userRepository->findAll(array()));
    }


    public function testFindByCurrency()
    {
        $users = [
            1 => new User('1', 'hema3rafa@gmail.com', 'AED', 'authorised', 100.0, '2018-12-22', 'DataProviderY'),
            2 => new User('2', 'hema3rafa2@gmail.com', 'EGP', 'authorised', 100.0, '2018-12-22', 'DataProviderY'),
            3 => new User('3', 'hema3rafa3@gmail.com', 'USD', 'authorised', 100.0, '2018-12-22', 'DataProviderY'),
            4 => new User('4', 'hema3rafa4@gmail.com', 'EGP', 'authorised', 100.0, '2018-12-22', 'DataProviderY'),
            5 => new User('5', 'hema3rafa5@gmail.com', 'EGP', 'authorised', 100.0, '2018-12-22', 'DataProviderY'),
        ];

        $userRepository = new InMemoryUserRepository($users);

        $this->assertEquals(3, count($userRepository->findAll(array('currency'=>"EGP"))));
    }


    public function testFindByMaxMinBalance()
    {
        $users = [
            1 => new User('1', 'hema3rafa@gmail.com', 'AED', 'authorised', 100.0, '2018-12-22', 'DataProviderY'),
            2 => new User('2', 'hema3rafa2@gmail.com', 'EGP', 'authorised', 200.0, '2018-12-22', 'DataProviderY'),
            3 => new User('3', 'hema3rafa3@gmail.com', 'USD', 'authorised', 400.0, '2018-12-22', 'DataProviderY'),
            4 => new User('4', 'hema3rafa4@gmail.com', 'EGP', 'authorised', 500.0, '2018-12-22', 'DataProviderY'),
            5 => new User('5', 'hema3rafa5@gmail.com', 'EGP', 'authorised', 600.0, '2018-12-22', 'DataProviderY'),
        ];

        $userRepository = new InMemoryUserRepository($users);

        $this->assertEquals(2, count($userRepository->findAll(array('balanceMin'=>"200",'balanceMax'=>"400"))));
    }

    public function testFindByStatusCode()
    {
        $users = [
            1 => new User('1', 'hema3rafa@gmail.com', 'AED', 'authorised', 100.0, '2018-12-22', 'DataProviderY'),
            2 => new User('2', 'hema3rafa2@gmail.com', 'EGP', 'authorised', 200.0, '2018-12-22', 'DataProviderY'),
            3 => new User('3', 'hema3rafa3@gmail.com', 'USD', 'decline', 400.0, '2018-12-22', 'DataProviderY'),
            4 => new User('4', 'hema3rafa4@gmail.com', 'EGP', 'authorised', 500.0, '2018-12-22', 'DataProviderY'),
            5 => new User('5', 'hema3rafa5@gmail.com', 'EGP', 'authorised', 600.0, '2018-12-22', 'DataProviderY'),
        ];

        $userRepository = new InMemoryUserRepository($users);

        $this->assertEquals(1, count($userRepository->findAll(array('statusCode'=>"decline"))));
    }


    public function testFindByMultipleItemSearch()
    {
        $users = [
            1 => new User('1', 'hema3rafa@gmail.com', 'AED', 'authorised', 100.0, '2018-12-22', 'DataProviderY'),
            2 => new User('2', 'hema3rafa2@gmail.com', 'EGP', 'authorised', 200.0, '2018-12-22', 'DataProviderY'),
            3 => new User('3', 'hema3rafa3@gmail.com', 'USD', 'decline', 400.0, '2018-12-22', 'DataProviderY'),
            4 => new User('4', 'hema3rafa4@gmail.com', 'EGP', 'authorised', 500.0, '2018-12-22', 'DataProviderY'),
            5 => new User('5', 'hema3rafa5@gmail.com', 'EGP', 'authorised', 600.0, '2018-12-22', 'DataProviderY'),
        ];

        $userRepository = new InMemoryUserRepository($users);

        $this->assertEquals(1, count($userRepository->findAll(array('statusCode'=>"decline",'balanceMin'=>"200",'balanceMax'=>"400",'currency'=>"USD"))));
    }



}
