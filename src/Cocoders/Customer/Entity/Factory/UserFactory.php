<?php

namespace Cocoders\Customer\Entity\Factory;

use Cocoders\Customer\Entity\User;

interface UserFactory
{
    /**
     * @param $username
     * @param $password
     * @return User
     */
    public function create($username, $password);
}
