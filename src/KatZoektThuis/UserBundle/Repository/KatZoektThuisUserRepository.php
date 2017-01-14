<?php

namespace KatZoektThuis\UserBundle\Repository;

use KatZoektThuis\UserBundle\Entity\KatZoektThuisUser;
use SumoCoders\FrameworkMultiUserBundle\User\UserRepository;

final class KatZoektThuisUserRepository extends UserRepository
{
    public function supportsClass($class)
    {
        return KatZoektThuisUser::class === $class;
    }
}
