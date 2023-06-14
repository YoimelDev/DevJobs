<?php

namespace App\Http\Livewire;

use App\Models\Salary;
use App\Models\Vacant;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class EditVacant extends Component
{
    public $vacant_id;
    public $title;
    public $category;
    public $salary;
    public $company;
    public $last_day;
    public $job_description;
    public $image;
    public $newImage;

    use WithFileUploads;

    protected $rules = [
        'title' => 'required|string',
        'category' => 'required',
        'salary' => 'required',
        'company' => 'required',
        'last_day' => 'required',
        'job_description' => 'required',
        'newImage' => 'nullable|image|max:1024',
    ];

    public function mount(Vacant $vacant)
    {
        // foreach ($vacant->getAttributes() as $key => $value) {
        //     if (property_exists($this, $key)) {
        //         $this->$key = $value;
        //     }
        // }
        // $this->salary = $vacant->salary_id;
        // $this->category = $vacant->category_id;

        $this->vacant_id = $vacant->id;
        $this->title = $vacant->title;
        $this->category = $vacant->category_id;
        $this->salary = $vacant->salary_id;
        $this->company = $vacant->company;
        $this->last_day = $vacant->last_day->format('Y-m-d');
        $this->job_description = $vacant->job_description;
        $this->image = $vacant->image;
    }

    public function editVacant()
    {
        $this->validate();

        $vacant = Vacant::find($this->vacant_id);

        if ($this->newImage) {
            // Borrar imagen del store
            if ($vacant->image) {
                Storage::delete('public/vacants/' . $vacant->image);
            }

            $image = $this->newImage->store('public/vacants');
            $imageName = explode('/', $image)[2];
        }

        $vacant->update([
            'title' => $this->title,
            'category_id' => $this->category,
            'salary_id' => $this->salary,
            'company' => $this->company,
            'last_day' => $this->last_day,
            'job_description' => $this->job_description,
            'image' => $imageName ?? $this->image,
        ]);

        session()->flash('message', 'Vacante actualizada con éxito.');

        return redirect()->route('vacants.index');
    }

    public function render()
    {
        $salaries = Salary::all();
        $categories = Category::all();

        return view('livewire.edit-vacant', [
            'salaries' => $salaries,
            'categories' => $categories,
        ]);
    }
}
