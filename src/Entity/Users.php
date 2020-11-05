<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Users
 *
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="App\Repository\UsersRepository")
 */
class Users
{
    /**
     * @var int
     *
     * @ORM\Column(name="u_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $uId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="u_name", type="string", length=255, nullable=true)
     */
    private $uName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="u_pp", type="string", length=255, nullable=true)
     */
    private $uPp;

    /**
     * @var string|null
     *
     * @ORM\Column(name="u_desc", type="text", length=65535, nullable=true)
     */
    private $uDesc;

    /**
     * @var string
     *
     * @ORM\Column(name="u_mail", type="string", length=320, nullable=false)
     */
    private $uMail;

    /**
     * @var string
     *
     * @ORM\Column(name="u_pass", type="string", length=32, nullable=false, options={"fixed"=true})
     */
    private $uPass;

    public function getUId(): ?int
    {
        return $this->uId;
    }

    public function getUName(): ?string
    {
        return $this->uName;
    }

    public function setUName(?string $uName): self
    {
        $this->uName = $uName;

        return $this;
    }

    public function getUPp(): ?string
    {
        return $this->uPp;
    }

    public function setUPp(?string $uPp): self
    {
        $this->uPp = $uPp;

        return $this;
    }

    public function getUDesc(): ?string
    {
        return $this->uDesc;
    }

    public function setUDesc(?string $uDesc): self
    {
        $this->uDesc = $uDesc;

        return $this;
    }

    public function getUMail(): ?string
    {
        return $this->uMail;
    }

    public function setUMail(string $uMail): self
    {
        $this->uMail = $uMail;

        return $this;
    }

    public function getUPass(): ?string
    {
        return $this->uPass;
    }

    public function setUPass(string $uPass): self
    {
        $this->uPass = $uPass;

        return $this;
    }


}
