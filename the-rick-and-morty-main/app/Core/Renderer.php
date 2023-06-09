<?php

namespace App\Core;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Renderer
{
    protected string $template;
    protected Environment $twig;

    public function __construct()
    {
        $loader = new FilesystemLoader('../app/Views');
        $this->twig = new Environment($loader);
    }

    public function renderPage(string $template, array $content, int $pages): string
    {
        return $this->twig->render(
            $template,
            ['cards' => $content, 'pages' => $pages]);
    }

    public function renderSinglePage(string $template, array $content, array $additionalInfo): string
    {
        return $this->twig->render(
            $template,
            ['cards' => $content, 'additionalInfo' => $additionalInfo]);
    }

    public function viewSearch(string $template): void
    {
        $this->twig->load($template)->display();
    }

    public function error(string $template): void
    {
        $this->twig->load($template)->display();
    }
}