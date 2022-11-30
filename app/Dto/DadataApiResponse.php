<?php

namespace App\Dto;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapInputName(SnakeCaseMapper::class)]
class DadataApiResponse extends \Spatie\LaravelData\Data
{
public function __construct(
    public string $source,
    public string $region,
    public string $regionWithType,
    public string $federalDistrict,
    public ?string $city,
){}
}

