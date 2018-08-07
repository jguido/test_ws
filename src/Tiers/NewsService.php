<?php

namespace App\Tiers;


use GuzzleHttp\Client;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;

class NewsService
{
    /**
     * @var Client
     */
    private $httpClient;

    /**
     * NewsService constructor.
     * @param Client $httpClient
     */
    public function __construct(Client $httpClient)
    {
        if (!in_array('base_uri', $httpClient->getConfig())) {
            throw new InvalidArgumentException(sprintf("base_uri is mandatory when passing the http client"));
        }
        $this->httpClient = $httpClient;
    }

    public function getTopTenFeature(string $feature): array
    {
        return json_decode(
            $this->httpClient->get("/features/top?feature=${feature}")->getBody()->getContents(),
            true
        );
    }

    /**
     * @param string $payload
     * @return array
     *
     * todo resolve payload to a list of validated Article
     */
    private function decodePayloadToArticle(string $payload): array
    {

    }
}