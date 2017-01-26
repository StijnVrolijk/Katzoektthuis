<?php

namespace KatZoektThuis\UserBundle\Repository;

use KatZoektThuis\UserBundle\Entity\Veterinary;
use SumoCoders\FrameworkMultiUserBundle\User\UserRepository;

final class VeterinaryRepository extends UserRepository
{
    public function supportsClass($class)
    {
        return Veterinary::class === $class;
    }
}
