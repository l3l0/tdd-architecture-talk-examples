<?php

namespace Cocoders\Customer;

use Cocoders\Customer\Entity\Factory\UserFactory;
use Cocoders\Customer\Entity\Repository\UserRepository;
use Cocoders\Customer\Exception\CustomerExists;

class RegisterCustomer
{
    private $userRepository;
    private $userFactory;

    public function __construct(
        UserRepository $userRepository,
        UserFactory $userFactory
    )
    {
        $this->userRepository = $userRepository;
        $this->userFactory = $userFactory;
    }

    public function register($email, $password)
    {
        if ($this->userRepository->findUserByEmail($email)) {
            throw new CustomerExists();
        }
    }
}
