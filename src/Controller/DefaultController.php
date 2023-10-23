<?php

namespace App\Controller;

use App\GreetingGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/hello/{name}', methods: ['GET'])]
    public function index(string $name, GreetingGenerator $generator): Response
    {
        $greeting = $generator->getRandomGreeting();
        
        return new Response("$greeting, $name.");
    }

    #[Route('api/hello/{name}', methods: ['GET'])]
    public function apiHello(string $name): JsonResponse
    {
        return $this->json([
            'name' => $name,
            'symfony' => 'rocks'
        ]);
    }
}