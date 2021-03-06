<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            // 'authors'=>$this->authers->toArray(),
            'details' => $this-> details,
            'imgPath' => $this-> imgPath,
            'pdfUrl' => $this-> pdfUrl,
            'rate' => $this-> rate,
            'pagesCount' => $this-> pagesCount,
            'state'  => $this-> state,
<<<<<<< HEAD
           
=======
            'authors'=>$this->authers->toArray(),
            'categories'=>$this->categories->toArray()
>>>>>>> 65a2b16 (new update)
            // 'created_at' => $this->created_at->format('d/m/Y'),
            // 'updated_at' => $this->updated_at->format('d/m/Y'),
        ];
    }
}
