<?php

namespace spec\Cocoders\Bundle\ApplicationBundle\Controller;

use Doctrine\ORM\EntityManager;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Validator\ValidatorInterface;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\GenericEvent;
use FOS\RestBundle\View\View;
use FOS\RestBundle\View\ViewHandlerInterface;
use FOS\UserBundle\Model\UserManagerInterface;

class ReportControllerSpec extends ObjectBehavior
{
    public function let(
        ContainerInterface $container,
        ViewHandlerInterface $viewHandler,
        RegistryInterface $doctrine,
        EntityManager $em,
        Request $request,
        ValidatorInterface $validator,
        SecurityContextInterface $security,
        TokenInterface $token,
        User $currentUser,
        UserManagerInterface $userManager,
        ParameterBag $requestBag,
        EventDispatcherInterface $eventDispatcher
    )
    {
        $container->get('event_dispatcher')->willReturn($eventDispatcher);
        $container->get('fos_rest.view_handler')->willReturn($viewHandler);
        $container->get('request')->willReturn($request);
        $container->has('doctrine')->willReturn(true);
        $container->get('doctrine')->willReturn($doctrine);
        $container->get('validator')->willReturn($validator);
        $container->has('security.context')->willReturn(true);
        $container->get('security.context')->willReturn($security);
        $container->get('fos_user.user_manager')->willReturn($userManager);
    }
}