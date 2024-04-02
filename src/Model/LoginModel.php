<?php

namespace App\Model;

use Symfony\Component\Validator\Constraints as Assert;

class LoginModel
{
    #[Assert\Email(
        message: "L'email n'est pas au bon format"
    )]
    private ?string $mail = null;
    private ?string $pass = null;

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(?string $mail): void
    {
        $this->mail = $mail;
    }

    public function getPass(): ?string
    {
        return $this->pass;
    }

    public function setPass(?string $pass): void
    {
        $this->pass = $pass;
    }


}