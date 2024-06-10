<?php

namespace App\View\Components\Admin\SasaranBupati;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Indikator extends Component
{
    /**
     * Create a new component instance.
     */
    public $indikator;
    public $iter;

    public function __construct($indikator = [], $iter = 0)
    {
        $this->indikator = $indikator;
        $this->iter = $iter;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.sasaran-bupati.indikator');
    }
}
