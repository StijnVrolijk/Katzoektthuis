<?php

namespace KatZoektThuis\MapBundle\Controller;

use KatZoektThuis\UserBundle\Repository\KatZoektThuisUserRepository;
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

    /** @var KatZoektThuisUserRepository */
    private $userRepository;

    /**
     * @param TokenStorageInterface $tokenStorage
     * @param Router $router
     * @param KatZoektThuisUserRepository $userRepository
     */
    public function __construct(
        TokenStorageInterface $tokenStorage,
        Router $router,
        KatZoektThuisUserRepository $userRepository
    ) {
        $this->tokenStorage = $tokenStorage;
        $this->router = $router;
        $this->userRepository = $userRepository;
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

        return [
            'users' => $this->userRepository->findAll(),
        ];
    }
}
