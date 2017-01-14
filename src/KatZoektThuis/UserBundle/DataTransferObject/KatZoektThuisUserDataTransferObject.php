<?php

namespace KatZoektThuis\UserBundle\DataTransferObject;

use KatZoektThuis\UserBundle\Entity\KatZoektThuisUser;
use SumoCoders\FrameworkMultiUserBundle\DataTransferObject\UserDataTransferObject;
use SumoCoders\FrameworkMultiUserBundle\User\Interfaces\User;

class KatZoektThuisUserDataTransferObject extends UserDataTransferObject
{
    /** @var string */
    public $address;

    /** @var string */
    public $phoneNumber;

    /** @var KatZoektThuisUser */
    public $buddy;

    /**
     * @param User $user
     *
     * @return self
     */
    public static function fromUser(User $user)
    {
        $userDataTransferObject = parent::fromUser($user);

        $userDataTransferObject->address = $user->getAddress();
        $userDataTransferObject->phoneNumber = $user->getPhoneNumber();
        $userDataTransferObject->buddy = $user->getBuddy();

        return $userDataTransferObject;
    }

    /**
     * @return KatZoektThuisUser
     */
    public function getEntity()
    {
        if ($this->user) {
            $this->user->change($this);

            return $this->user;
        }

        return new KatZoektThuisUser(
            $this->email,
            $this->plainPassword,
            $this->displayName,
            $this->email,
            $this->address,
            $this->phoneNumber,
            $this->buddy,
            $this->id
        );
    }
}
