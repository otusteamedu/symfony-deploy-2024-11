<?php

namespace App\Controller\Web\GetFeed\v1\Output;

use OpenApi\Attributes as OA;

class TweetDTO
{
    public function __construct(
        public int $id,
        public string $author,
        public string $text,
        #[OA\Property(format: '\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}', example: '2024-11-08 21:00:00')]
        public string $createdAt,
    ) {
    }
}
