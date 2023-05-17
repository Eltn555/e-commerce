<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImportSale extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id', 'id')->withTrashed();
    }

    public function products() {
        return $this->hasMany(ImportSaleProduct::class, 'sale_id', 'id');
    }

    public function concept() {
        $data = [
          'client'=> 1,
          'amount'=> 3124
        ];

        $sales = Sale::where('client_id',$data['client'])->where('debt', '!=', 0)->get();
        $amount = $data['amount'];
        foreach($sales as $sale) {
            if($amount > $sale->amount) {
                $amount = $amount - $sale->debt;
                $sale->update([
                    'debt' => 0,
                    'paid' => $sale->paid + $sale->debt
                ]);
            }else{
                $sale->update([
                   'debt' => $sale->debt - $amount,
                    'paid' => $sale->paid + $amount
                ]);
                break;
            }
        }

    }
}
