<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'url' => $this->url,
            'img' => $this->img,
            'img_hover' => $this->img_hover,
            'tags' => $this->tags,
            'desc' => $this->desc,
            'repo' => $this->repo,
            'updated_at' => $this->updated_at->diffForHumans(),
        ];
    }
}
