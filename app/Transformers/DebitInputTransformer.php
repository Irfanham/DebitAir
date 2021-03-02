<?php

namespace App\Transformers;

use App\DebitInput;
use League\Fractal\TransformerAbstract;

class DebitInputTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(DebitInput $debit)
    {
        return [
            'id' => $debit->id,
            'debit_location_id' => $debit->debit_location_id,
            'debit' => $debit->debit,
            'created_at' => $debit->created_at,
            'updated_at' => $debit->updated_at,
        ];
    }
}
