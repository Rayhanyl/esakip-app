<?php

namespace App\View\Components\Admin\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ButtonSubmit extends Component
{
    /**
     * Create a new component instance.
     */
    public $label;
    public $variant;
    public $col;
    public function __construct($label = 'submit', $variant = 'primary', $col = 'col-12 col-lg-6')
    {
        $this->label = $label;
        $this->variant = $variant;
        $this->col = $col;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.form.button-submit');
    }
}
