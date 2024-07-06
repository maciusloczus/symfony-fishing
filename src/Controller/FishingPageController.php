<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FishingPageController extends AbstractController
{
    // ... istniejące metody kontrolera

    #[Route('/wedkarstwo', name: 'fishing')]
    public function fishingPage(): Response
    {
        return $this->render('blog/fishing.html.twig');
    }
}
