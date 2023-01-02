<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Coupon;

class AdminCouponsComponent extends Component
{
    public $name;
    public $code;
    public $type = '';
    public $value;
    public $min_order_value;
    public $max_discount;
    public $start_date;
    public $end_date;
    public $max_use;
    public $active = '';

    // funcion que verifica si la fecha de inicio es menor a la fecha de fin y devuelve un mensaje de error que diga que la fecha de inicio inicio debe ser menor a la fecha de fin
    public function updatedEndDate($value)
    {
        if($this->start_date){
            if ($value < $this->start_date) {
                session()->flash('error_message', 'La fecha fin debe ser menor a la fecha inicio');
                $this->end_date = '';
            }
        }else{
            session()->flash('error_message', 'La fecha de inicio no puede ser vacia');
        }
    }


    public function mount()
    {
        $this->active = 0;
    }

    public function storeCoupon()
    {
        $this->validate([
            'name' => 'required',
            'code' => 'required|unique:coupons',
            'type' => 'required',
            'value' => 'required',
            'min_order_value' => 'required|numeric',
            'active' => 'required',
        ]);

        $coupon = new Coupon();
        $coupon->name = $this->name;
        $coupon->code = $this->code;
        $coupon->type = $this->type;
        $coupon->value = $this->value;
        $coupon->min_order_value = $this->min_order_value;
        $coupon->max_discount = $this->max_discount;
        $coupon->start_date = $this->start_date;
        $coupon->end_date = $this->end_date;
        $coupon->max_use = $this->max_use;
        $coupon->active = $this->active;
        $coupon->save();

        session()->flash('message', 'Cupón creado con éxito');
    }    

    public function render()
    {
        $coupons = Coupon::all();
        return view('livewire.admin.admin-coupons-component', compact('coupons'));
    }
}
