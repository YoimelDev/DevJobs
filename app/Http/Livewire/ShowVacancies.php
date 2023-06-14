<?php

namespace App\Http\Livewire;

use App\Models\Vacant;
use Livewire\Component;

class ShowVacancies extends Component
{
    public function render()
    {
        $vacancies = Vacant::where('user_id', auth()->user()->id)->paginate(10);
        

        return view('livewire.show-vacancies', [
            'vacancies' => $vacancies
        ]);
    }
}
