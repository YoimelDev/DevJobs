<?php

namespace App\Http\Livewire;

use App\Models\Salary;
use App\Models\Vacant;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;

class CreateVacant extends Component
{
    public $title;
    public $category;
    public $salary;
    public $company;
    public $last_day;
    public $job_description;
    public $image;

    use WithFileUploads;

    protected $rules = [
        'title' => 'required|string',
        'category' => 'required',
        'salary' => 'required',
        'company' => 'required',
        'last_day' => 'required',
        'job_description' => 'required',
        'image' => 'required|image|max:1024',
    ];

    public function createVacant()
    {
        $this->validate();

        $image = $this->image->store('public/vacants');
        $imageName = explode('/', $image)[2];

        Vacant::create([
            'title' => $this->title,
            'category_id' => $this->category,
            'salary_id' => $this->salary,
            'company' => $this->company,
            'last_day' => $this->last_day,
            'job_description' => $this->job_description,
            'image' => $imageName,
            'user_id' => auth()->user()->id,
        ]);

        session()->flash('message', 'Vacante creada con éxito.');

        return redirect()->route('vacants.index');
    }

    public function render()
    {

        $salaries = Salary::all();
        $categories = Category::all();

        return view('livewire.create-vacant', [
            'salaries' => $salaries,
            'categories' => $categories,
        ]);
    }
}
