<?php

namespace App\RegistrationForm\Repository;

class UserRepository implements UserRepositoryInterface
{
    public function save(array $fields): bool
    {
        /**
         * It always saves :)
         */
        return true;
    }
}
