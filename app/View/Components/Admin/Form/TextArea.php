<?php

namespace App\View\Components\Admin\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TextArea extends Component
{
    /**
     * Create a new component instance.
     */
    public $col;
    public $label;
    public $name;
    public $placeholder;
    public $readonly;
    public $required;
    public $value;

    public function __construct($col = 'col-12 col-lg-6', $label = '', $value = '', $name = '', $placeholder = '', $readonly = false, $required = false)
    {
        $this->col = $col;
        $this->label = $label;
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->readonly = $readonly;
        $this->value = $value;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.form.text-area');
    }
}
