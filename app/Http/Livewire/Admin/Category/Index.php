<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name, $slug, $category_id;
    
    public function rules()
    {
        return [
            'name' => 'required|string',
            'slug' => 'required|string',
        ];
    }

    public function resetInput()
    {
        $this->name = NULL;
        $this->slug = NULL;
        $this->category_id = NULL;
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function openModal()
    {
        $this->resetInput();
    }

    public function storeCategory()
    {
        $validatedData = $this->validate();
        Category::create([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
        ]);
        session()->flash('message', 'Category Added Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function editCategory(int $category_id)
    {
        $this->category_id = $category_id;
        $category = Category::findOrFail($category_id);
        $this->name = $category->name;
        $this->slug = $category->slug;
    }

    public function updateCategory()
    {
        $validatedData = $this->validate();
        Category::findOrFail($this->category_id)->update([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
        ]);
        session()->flash('message', 'Category Updated Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function deleteCategory($category_id)
    {
        $this->category_id = $category_id;
    }

    public function destroyCategory()
    {
        $category = Category::findOrFail($this->category_id);
        $category->delete();
        session()->flash('message', 'Category Deleted Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function render()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(3);
        return view('livewire.admin.category.index', ['categories' => $categories])->extends('layouts.admin')->section('content');
    }
}
