<?php

namespace App\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent()]
final class Portfolio
{
    public array $tabs = [];
    public array $items = [];

    public function __construct()
    {
        $this->items = [
            [
                'category' => ['Symfony', 'Bootstrap'],
                'title' => 'Blog with Symfony and Bootstrap',
                'image' => 'blog.png',
                'github' => 'https://github.com/danilovict2/Symfony-6-Blog'
            ],
            [
                'category' => ['Symfony', 'Bootstrap', 'Vue3'],
                'title' => 'Realtime chat app with Symfony, Bootstrap and Vue 3',
                'image' => 'chat.png',
                'github' => 'https://github.com/danilovict2/Symfony-6-Realtime-Chat'
            ],
            [
                'category' => ['Symfony', 'Tailwind.css', 'Vue3'],
                'title' => 'E-commerce website with Symfony, Tailwindcss and Vue 3',
                'image' => 'e-commerce.png',
                'github' => 'https://github.com/danilovict2/Symfony-6-E-Commerce'
            ],
            [
                'category' => ['Symfony', 'Tailwind.css', 'Vue3'],
                'title' => 'Realtor clone with Symfony, Tailwindcss and Vue 3',
                'image' => 'realtor.png',
                'github' => 'https://github.com/danilovict2/Symfony-6-Realtor-Clone'
            ],
            [
                'category' => ['Symfony', 'Tailwind.css'],
                'title' => 'This portfolio webstite with Symfony and Tailwindcss',
                'image' => 'portfolio.png',
                'github' => 'https://github.com/danilovict2/Symfony-6-Portfolio'
            ],
            [
                'category' => ['Symfony', 'Tailwind.css', 'Vue3'],
                'title' => 'Survey app with Symfony, Tailwindcss and Vue 3',
                'image' => 'survey.png',
                'github' => 'https://github.com/danilovict2/Symfony-6-Survey-App'
            ],
            
        ];

        $this->tabs = array_unique(array_merge(...array_values(array_map(fn($item) => $item['category'], $this->items))));
    }
}
