<?php

namespace App\Transformers;

use App\TanamInput;
use League\Fractal\TransformerAbstract;

class TanamInputPeriodTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(TanamInput $tanam)
    {
        return [
            'tanam_period_time' => $tanam->tanam_period_time,
        ];
    }
}
