<?php

namespace KatZoektThuis\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use SumoCoders\FrameworkMultiUserBundle\DataTransferObject\Interfaces\UserDataTransferObject;
use SumoCoders\FrameworkMultiUserBundle\Security\PasswordResetToken;

/**
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="KatZoektThuis\UserBundle\Repository\VeterinaryRepository")
 */
class Veterinary extends KatZoektThuisUser
{
    /**
     * @var string
     *
     * @ORM\Column(
     *     type = "string"
     * )
     */
    private $openingHours;

    /**
     * @var string
     *
     * @ORM\Column(
     *     type = "string"
     * )
     */
    private $remarks;

    /**
     * @param string $username
     * @param string $plainPassword
     * @param string $displayName
     * @param string $email
     * @param string $openingHours
     * @param string $remarks
     * @param int|null $id
     * @param PasswordResetToken|null $token
     * @param string|null $address
     * @param string|null $phoneNumber
     * @param KatZoektThuisUser|null $buddy
     */
    public function __construct(
        $username,
        $plainPassword,
        $displayName,
        $email,
        $openingHours,
        $remarks,
        $address = null,
        $phoneNumber = null,
        KatZoektThuisUser $buddy = null,
        $id = null,
        PasswordResetToken $token = null
    ) {
        parent::__construct(
            $username,
            $plainPassword,
            $displayName,
            $email,
            $address,
            $phoneNumber,
            $buddy,
            $id,
            $token
        );

        $this->openingHours = $openingHours;
        $this->remarks = $remarks;
    }

    public function change(UserDataTransferObject $data)
    {
        parent::change($data);

        $this->openingHours = $data->openingHours;
        $this->remarks = $data->remarks;
    }

    /**
     * @return string
     */
    public function getOpeningHours()
    {
        return $this->openingHours;
    }

    /**
     * @return string
     */
    public function getRemarks()
    {
        return $this->remarks;
    }
}
