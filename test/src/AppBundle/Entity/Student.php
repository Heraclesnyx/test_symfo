<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Student
 *
 * @ORM\Table(name="student")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\StudentRepository")
 */
class Student
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @Assert\NotBlank
     * @Assert\Regex("/[a-zA-Z]/")
     *
     * @ORM\Column(name="FirstName", type="string", length=25)
     */
    private $firstName;

    /**
     * @var string
     *
     * @Assert\NotBlank
     * @Assert\Regex("/[a-zA-Z]/")
     *
     * @ORM\Column(name="LastName", type="string", length=25)
     */
    private $lastName;

    /**
     * @var int
     *
     * @Assert\NotBlank
     * @Assert\Length(min=10, max=10)
     * @Assert\Regex("/[0-9]/")
     *
     * @ORM\Column(name="NumEtud", type="integer", length=10)
     */
    private $numEtud;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Student
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return Student
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set numEtud
     *
     * @param integer $numEtud
     *
     * @return Student
     */
    public function setNumEtud($numEtud)
    {
        $this->numEtud = $numEtud;

        return $this;
    }

    /**
     * Get numEtud
     *
     * @return int
     */
    public function getNumEtud()
    {
        return $this->numEtud;
    }
}

