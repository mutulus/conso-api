<?php

namespace App\Service;

use http\Message\Body;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiLogin
{
    private HttpClientInterface $client;

    /**
     * @param HttpClientInterface $client
     */
    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }
    public function SeLog(string $username,string $password):array
    {
        // Appel au modèle afin de récupérer les données

        $reponseApi = $this->client->request(
            'POST',
            'http://172.16.209.1:8000/api/login_check',
            ['headers'=>[
                'Accept'=>'application/json',
                'Content-Type'=>'application/json'
                ],'body'=>json_encode([
                    'username'=>$username,
                "password"=>$password
            ])
        ]

        );
        return $reponseApi->toArray();
    }

}