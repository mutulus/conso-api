<?php

namespace App\Controller;

use App\Service\ApiPosts;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ListerPostsController extends AbstractController
{
    private ApiPosts $apiPosts;

    /**
     * @param ApiPosts $apiPosts
     */
    public function __construct(ApiPosts $apiPosts)
    {
        $this->apiPosts = $apiPosts;
    }


    #[Route('/posts', name: 'app_lister_posts')]
    public function index(): Response
    {
        // Appel au modèle afin de récupérer les données
        $contenu = $this->apiPosts->recupererPosts();
        // Appel à la vue afin d'afficher les données

        return $this->render('lister_posts/index.html.twig', [
            'posts' => $contenu
        ]);
    }
}
