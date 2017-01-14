<?php

namespace KatZoektThuis\MapBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use SumoCoders\FrameworkMultiUserBundle\Entity\User;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Router;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class MapController
{
    /** @var TokenStorageInterface */
    private $tokenStorage;

    /** @var Router */
    private $router;

    /**
     * @param TokenStorageInterface $tokenStorage
     * @param Router $router
     */
    public function __construct(
        TokenStorageInterface $tokenStorage,
        Router $router
    ) {
        $this->tokenStorage = $tokenStorage;
        $this->router = $router;
    }

    /**
     * @Template()
     *
     * @return array
     */
    public function indexAction()
    {
        // @TODO redirect if not an admin
        if (!$this->tokenStorage->getToken()->getUser() instanceof User) {
            return new RedirectResponse(
                // @TODO find a homepage
                $this->router->generate('')
            );
        }

        return [];
    }
}
