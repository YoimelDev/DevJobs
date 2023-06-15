<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Candidate;
use App\Models\Vacant;
use Livewire\WithFileUploads;

class ApplyVacant extends Component
{
    use WithFileUploads;

    public $cv;
    public $vacant;

    protected $rules = [
        'cv' => 'required|mimes:pdf',
    ];

    public function mount(Vacant $vacant)
    {
       $this->vacant = $vacant;
    }

    public function apply()
    {
        $this->validate();

        $cv = $this->cv->store('public/cv');
        $cvName = explode('/', $cv)[2];

        $this->vacant->candidates()->create([
            'user_id' => auth()->user()->id,
            'cv' => $cvName,
        ]);

        session()->flash('apply', 'ok');
        
        return redirect()->route('vacants.show', $this->vacant);
    }

    public function render()
    {
        return view('livewire.apply-vacant');
    }
}
