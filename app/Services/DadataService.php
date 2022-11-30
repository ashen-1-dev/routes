<?php

namespace App\Services;

use App\Dto\DadataApiResponse;
use GuzzleHttp\Client;
use Spatie\LaravelData\DataCollection;

class DadataService
{
    private readonly Client $client;

    public function __construct()
    {
        $this->client = new Client($this->baseClientConfig());
    }


    /** @return DataCollection<DadataApiResponse>|null */
    public function getStandardAddresses(string|array $addresses): DataCollection|null
    {
        $query = is_array($addresses) ? $addresses : [$addresses];
        try {
            $result = $this->client->post(
                'api/v1/clean/address',
                ['body' => json_encode($query)])
                ->getBody()
                ->getContents();
        } catch (\Throwable) {
            return null;
        }
        return DadataApiResponse::collection(json_decode($result));
    }

    private function baseClientConfig(): array
    {
        return [
            'base_uri' => 'https://cleaner.dadata.ru',
            'headers' => [
                'Content-Type' => 'application/json',
                'accept' => 'application/json',
                'Authorization' => 'Token ' . env('DADATA_API_KEY'),
                'X-Secret' => env('DADATA_SECRET_KEY')
            ]
        ];
    }
}
