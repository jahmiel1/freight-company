<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Converter extends Component
{
    public $kg, $pound;

    public function render()
    {
        return view('livewire.converter');
    }
}
