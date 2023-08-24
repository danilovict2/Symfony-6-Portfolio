<?php

namespace App\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent()]
final class PortfolioItem
{
    public array $categories;
    public string $github;
    public string $image;
    public string $title;
}
