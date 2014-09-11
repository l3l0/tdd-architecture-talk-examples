<?php

namespace spec\Cocoders\Customer;

use Cocoders\Customer\Entity\Factory\UserFactory;
use Cocoders\Customer\Entity\Repository\UserRepository;
use Cocoders\Customer\Entity\User;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RegisterCustomerSpec extends ObjectBehavior
{
    function let(
        UserRepository $userRepository,
        UserFactory $userFactory
    )
    {
        $this->beConstructedWith($userRepository, $userFactory);
    }

    function it_does_not_allow_to_register_same_username_twice(
        User $existingUser,
        UserRepository $userRepository
    )
    {
        $userRepository->findUserByEmail('contact@cocoders.com')->willReturn($existingUser);

        $this
            ->shouldThrow('Cocoders\Customer\Exception\CustomerExists')
            ->duringRegister('contact@cocoders.com', 'PlaiNPassWord')
        ;
    }
}
