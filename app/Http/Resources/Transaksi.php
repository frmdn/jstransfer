<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Transaksi extends Resource
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
            'customer_id' => $this->customer_id,
            'nama_customer' => $this->customer->nama_customer,
            'metode_id' => $this->metode_id,
            'nama_metode' => $this->metode->nama_metode,
            'nominal' => $this->nominal,
            'tarif_transfer' => $this->tarif_transfer,
            'biaya_admin' => $this->biaya_admin,
            'saldo_awal' => $this->saldo_awal,
            'saldo_akhir' => $this->saldo_akhir,
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
