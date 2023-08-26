<?php

namespace App\Twig\Components;

use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent()]
final class Contact
{
    public function __construct(
        #[Autowire('%env(email)%')] public string $email
    ) {
    }
}
