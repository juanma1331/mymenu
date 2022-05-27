<?php

namespace App\Http\Livewire;

use Cknow\Money\Money;
use Illuminate\Support\Str;
use Livewire\Component;

class PriceInput extends Component
{
    public $price;

    public function getFormattedPriceProperty()
    {
        if ($this->price) {
            $stringPrice = strval($this->price);

            if (!Str::startsWith($stringPrice, '0')) {
                return Money::EUR(ltrim($stringPrice, '0'));
            } else {
                return 'No leading zeros';
            }

        }
    }

    public function render()
    {
        return view('livewire.price-input');
    }
}
