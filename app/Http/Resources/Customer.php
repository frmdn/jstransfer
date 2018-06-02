<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Customer extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'nama_customer' => $this->nama_customer,
            'bank_id' => $this->bank_id,
            'nama_bank' =>$this->bank->nama_bank,
            'norek' => $this->norek,
        ];
    }

    public function with($request)
    {
        return [
            'version' => '1.0.0',
            'author_url' => url('http://instagram.com/frmdn.work')
        ];
    }
}
