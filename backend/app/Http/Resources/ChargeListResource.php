<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class ChargeListResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $data = parent::toArray($request);
        $data["created_at"] = Carbon::parse($data["created_at"])->format('d/m/Y');
        unset($data["updated_at"]);
        return $data;
    }
}
