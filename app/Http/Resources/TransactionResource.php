<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $title = '';
        if($this->type == 1){
            $title = 'From '.$this->source->name;
        }else{
            $title = 'To '.$this->source->name;
        }
        return [
            'trx_id' => $this->id,
            'amount' => number_format($this->amount,2),
            'type' => $this->type,
            'title' => $title,
            'date' =>  Carbon::parse($this->created_at)->format('Y-m-d H:i:s')
        ];
    }
}