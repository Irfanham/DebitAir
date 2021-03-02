<?php

namespace App\Transformers;

use App\DebitLocation;
use League\Fractal\TransformerAbstract;

class DebitLocationTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(DebitLocation $debit)
    {
        return [
            'id' => $debit->id,
            'user_id' => $debit->user_id,
            'name' => $debit->name,
            'created_at' => $debit->created_at,
            'updated_at' => $debit->updated_at,
        ];
    }
}
