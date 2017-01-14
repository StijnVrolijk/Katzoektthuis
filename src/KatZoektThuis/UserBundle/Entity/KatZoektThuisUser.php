<?php

namespace KatZoektThuis\UserBundle\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use SumoCoders\FrameworkMultiUserBundle\DataTransferObject\Interfaces\UserDataTransferObject;
use SumoCoders\FrameworkMultiUserBundle\Security\PasswordResetToken;
use SumoCoders\FrameworkMultiUserBundle\Entity\User;

/**
 * @ORM\Table()
 * @ORM\Entity()
 */
class KatZoektThuisUser extends User
{
    /**
     * @var string
     *
     * @ORM\Column(
     *     type = "string",
     *     nullable = true
     * )
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(
     *     type = "string",
     *     nullable = true
     * )
     */
    private $phoneNumber;

    /**
     * @var User
     *
     * @ORM\ManyToOne(
     *     targetEntity = "KatZoektThuisUser",
     *     inversedBy = "buddyOf"
     * )
     */
    private $buddy;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(
     *     targetEntity = "KatZoektThuisUser",
     *     mappedBy = "buddy"
     * )
     */
    private $buddyOf;

    /**
     * @param string $username
     * @param string $plainPassword
     * @param string $displayName
     * @param string $email
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
        $id = null,
        PasswordResetToken $token = null,
        $address = null,
        $phoneNumber = null,
        KatZoektThuisUser $buddy = null
    ) {
        parent::__construct($username, $plainPassword, $displayName, $email, $id, $token);

        $this->address = $address;
        $this->phoneNumber = $phoneNumber;
        $this->buddy = $buddy;
    }

    public function getRoles()
    {
        return [ 'ROLE_USER' ];
    }

    public function change(UserDataTransferObject $data)
    {
        parent::change($data);

        $this->address = $data->adress;
        $this->phoneNumber = $data->phoneNumber;
        $this->buddy = $data->buddy;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @return User
     */
    public function getBuddy()
    {
        return $this->buddy;
    }

    /**
     * @return Collection
     */
    public function getBuddyOf()
    {
        return $this->buddyOf;
    }
}
