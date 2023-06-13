<?php

namespace App\Http\Livewire;

use App\Models\Salary;
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
