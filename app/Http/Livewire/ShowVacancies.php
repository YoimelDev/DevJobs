<?php

namespace App\Http\Livewire;

use App\Models\Vacant;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class ShowVacancies extends Component
{
    protected $listeners = ['deleteVacant'];

    public function deleteVacant($id)
    {
        $vacant = Vacant::find($id);

        if ($vacant->image) {
            Storage::delete('public/vacants/' . $vacant->image);
        }

        // if( $vacante->candidatos->count() ) {
        //     foreach( $vacante->candidatos as $candidato ) {
        //         if( $candidato->cv ) {
        //             Storage::delete('public/cv/' . $candidato->cv);
        //         }
        //     }
        // }

        $vacant->delete();

        return redirect(request()->header('Referer'));
    }

    public function render()
    {
        $vacancies = Vacant::where('user_id', auth()->user()->id)->paginate(2);        

        return view('livewire.show-vacancies', [
            'vacancies' => $vacancies
        ]);
    }
}
