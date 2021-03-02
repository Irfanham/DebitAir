<?php

namespace App\Transformers;

use App\TanamInput;
use League\Fractal\TransformerAbstract;

class TanamInputTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(TanamInput $tanam)
    {
        return [
            'id' => $tanam->id,
            'tanam_id' => $tanam->tanam_id,
            'tanam_period' => $tanam->tanam_period,
            'tanam_period_time' => $tanam->tanam_period_time,
            'value' => $tanam->value,
            'created_at' => $tanam->created_at,
            'updated_at' => $tanam->updated_at,
        ];
    }
}
