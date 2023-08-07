<?php

namespace App\Common;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use \Illuminate\Support\Str;

class BaseJsonResource extends JsonResource
{
    /**
     * @var string[]
     */
    public $with = [
        'status' => 'success',
    ];

    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'data' => $this->resource === null ? null : [
                Str::singular($this->guessResourceKey()) => $this->resourceToArray($request),
            ],
        ];
    }

    /**
     * @return string
     */
    protected function guessResourceKey(): string
    {
        return $this->resource->guessResourceKey();
    }

    /**
     * @param Request $request
     * @return array
     */
    protected function resourceToArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
