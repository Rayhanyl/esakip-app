<?php

namespace App\View\Components\Admin\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ButtonEdit extends Component
{
    /**
     * Create a new component instance.
     */
    public $id;
    public $route;
    public $title;
    public function __construct($id = null, $route = null, $title= 'Edit')
    {
        $this->id = $id;
        $this->route = $route;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.form.button-edit');
    }
}
