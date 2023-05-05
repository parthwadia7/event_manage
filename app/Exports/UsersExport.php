<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Order;

class UsersExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return  Order::Join('users','order_masters.user_id', '=', 'users.id')
                       ->select('users.first_name','users.last_name','order_masters.payment_date','order_masters.payment_method','order_masters.total_price')
                     ->where('order_masters.payment_status','success')
                    ->orderBy('order_masters.id', 'DESC')
                    ->get();
    }

     public function headings(): array
    {
        return [
            'User First name',
            'User Last name',
            'Payment Date',
            'Payment Method',
            'Total'
        ];
    }
}
