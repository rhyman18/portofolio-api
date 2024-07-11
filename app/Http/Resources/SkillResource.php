<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SkillResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'type' => $this->type,
            'name' => $this->name,
            'icon' => $this->icon,
            'cert_link' => $this->cert_link,
            'cert_desc' => $this->cert_desc,
            'cert_img' => $this->cert_img,
        ];
    }
}
