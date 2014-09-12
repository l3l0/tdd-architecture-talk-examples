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

    function it_create_and_save_user(
        User $user,
        UserRepository $userRepository,
        UserFactory $userFactory
    )
    {
        $userRepository->findUserByEmail('contact@cocoders.com')->willReturn(null);
        $userFactory->create('contact@cocoders.com', 'PlaiNPassWord')->willReturn($user);
        $userRepository->save($user)->shouldBeCalled();

        $this->register('contact@cocoders.com', 'PlaiNPassWord');
    }
}
