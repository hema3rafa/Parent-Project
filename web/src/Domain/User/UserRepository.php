<?php
declare(strict_types=1);

namespace App\Domain\User;

interface UserRepository
{
    /**
     * @param array $searchOptions
     * @return User[]
     */
    public function findAll(array $searchOptions): array;

}
