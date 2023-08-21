<?php

namespace App\View\Components;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;


class categoryDropdown extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.categoryDropdown', [
            'categories' => \App\Models\Category::all(),
            'currentCategory' => Category::firstWhere('slug', request('category'))
        ]);
    }
}
