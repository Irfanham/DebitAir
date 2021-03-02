<?php

namespace App\Transformers;

use App\Tanam;
use League\Fractal\TransformerAbstract;

class TanamTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
     public function transform(Tanam $tanam)
     {
         return [
             'id' => $tanam->id,
             'name' => $tanam->name,
             'parent' => $tanam->parent,
             'created_at' => $tanam->created_at,
             'updated_at' => $tanam->updated_at,
         ];
     }
}
