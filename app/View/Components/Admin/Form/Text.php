<?php

namespace App\View\Components\Admin\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Text extends Component
{
    /**
     * Create a new component instance.
     */

    public $col;
    public $label;
    public $type;
    public $name;
    public $decimal;
    public $classinput;
    public $placeholder;
    public $readonly;
    public $currency;

    public function __construct($col = '12', $label = '', $type = 'text', $name = '', $classinput = '', $placeholder = '', $readonly = false, $decimal = false, $currency = false)
    {
        $this->col = $col;
        $this->label = $label;
        $this->type = $type;
        $this->name = $name;
        $this->decimal = $decimal;
        $this->classinput = $classinput;
        $this->placeholder = $placeholder;
        $this->readonly = $readonly;
        $this->currency = $currency;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.form.text');
    }
}
