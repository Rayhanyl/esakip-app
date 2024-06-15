<?php

namespace App\View\Components\Admin\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Select extends Component
{
    /**
     * Create a new component instance.
     */
    public $col;
    public $id;
    public $label;
    public $name;
    public $lists;
    public $readonly;
    public $value;

    public function __construct($col = 'col-12 col-lg-6', $id = '', $label = '', $name = '', $lists = [], $value = '', $readonly = false)
    {
        $this->col = $col;
        $this->label = $label;
        $this->name = $name;
        $this->lists = $lists;
        $this->value = $value;
        $this->id = $id;
        $this->readonly = $readonly;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.form.select');
    }
}
