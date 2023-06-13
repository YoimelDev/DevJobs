<?php

namespace App\Http\Livewire;

use App\Models\Salary;
use Livewire\Component;

class CreateVacant extends Component
{
    public function render()
    {

        $salaries = Salary::all();

        return view('livewire.create-vacant', [
            'salaries' => $salaries
        ]);
    }
}
