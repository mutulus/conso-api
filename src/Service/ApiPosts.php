<?php

namespace App\Service;


use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiPosts
{
    private HttpClientInterface $client;

    /**
     * @param HttpClientInterface $client
     */
    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function recupererPosts(): array
    {
        // Appel au modèle afin de récupérer les données
        // ICI: Appel au endpoint localhost:8000/api/posts
        $reponseApi = $this->client->request(
            'GET',
            'http://172.16.209.1:8000/api/posts'
        );
        return $reponseApi->toArray();
    }

}