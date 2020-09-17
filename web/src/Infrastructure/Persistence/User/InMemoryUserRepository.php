<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\User;

use App\Domain\User\User;
use App\Domain\User\UserNotFoundException;
use App\Domain\User\UserRepository;
use App\Infrastructure\processors\UserSearchProcessor;
use App\Infrastructure\ProvidersMapper\ProviderX;
use App\Infrastructure\ProvidersMapper\ProviderY;

class InMemoryUserRepository implements UserRepository
{
    /**
     * @var User[]
     */
    private array $users;

    /**
     * InMemoryUserRepository constructor.
     *
     * @param array|null $users
     */
    public function __construct(array $users = null)
    {
        // creat object for new provider
        $providerX = new ProviderX();
        $providerY = new ProviderY();
        $this->users = $users ?? $providerX->execute() + $providerY->execute();
    }

    /**
     * {@inheritdoc}
     * @throws UserNotFoundException
     */
    public function findAll(array $searchItems): array
    {

        $userSearchProcessor = new UserSearchProcessor();
        $results = $userSearchProcessor->execute($this->users, $searchItems);

        if (count($results) == 0) {
            throw new UserNotFoundException();
        }

        return array_values(array_intersect_key($this->users, $results));

    }


}
