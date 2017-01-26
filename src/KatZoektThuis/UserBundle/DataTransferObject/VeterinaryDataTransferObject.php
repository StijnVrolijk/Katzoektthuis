<?php

namespace KatZoektThuis\UserBundle\DataTransferObject;

use KatZoektThuis\UserBundle\Entity\Veterinary;
use SumoCoders\FrameworkMultiUserBundle\User\Interfaces\User;

class VeterinaryDataTransferObject extends KatZoektThuisUserDataTransferObject
{
    /** @var string */
    public $openingHours;

    /** @var string */
    public $remarks;

    /**
     * @param User $user
     *
     * @return self
     */
    public static function fromUser(User $user)
    {
        $userDataTransferObject = parent::fromUser($user);

        $userDataTransferObject->openingHours = $user->getOpeningHours();
        $userDataTransferObject->remarks = $user->getRemarks();

        return $userDataTransferObject;
    }

    /**
     * @return Veterinary
     */
    public function getEntity()
    {
        if ($this->user) {
            $this->user->change($this);

            return $this->user;
        }

        return new Veterinary(
            $this->email,
            $this->plainPassword,
            $this->displayName,
            $this->email,
            $this->openingHours,
            $this->remarks,
            $this->address,
            $this->phoneNumber,
            $this->buddy,
            $this->id
        );
    }
}
