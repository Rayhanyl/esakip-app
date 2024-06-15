<?php

namespace App\View\Components\Admin\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Upload extends Component
{
    /**
     * Create a new component instance.
     */
    public $col;
    public $label;
    public $accept;
    public function __construct($col = 'col-12 col-lg-6', $label = '', $accept = '.doc, .docx, .pdf, .txt')
    {
        $this->col = $col;
        $this->label = $label;
        $this->accept = $accept;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.form.upload');
    }
}
