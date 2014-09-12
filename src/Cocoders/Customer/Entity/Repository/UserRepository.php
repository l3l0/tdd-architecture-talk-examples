<?php

namespace Cocoders\Customer\Entity\Repository;

use Cocoders\Customer\Entity\User;

interface UserRepository
{
    /**
     * @param string $email
     * @return User
     */
    public function findUserByEmail($email);

    /**
     * @param User $user
     * @return null
     */
    public function save(User $user);
}
