<?php

namespace App\RegistrationForm\Repository;

interface UserRepositoryInterface
{
    /**
     * Saves user.
     */
    public function save(array $fields): bool;
}
