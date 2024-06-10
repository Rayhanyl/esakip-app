<?php

namespace App\View\Components\Admin\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ButtonCreate extends Component
{
    /**
     * Create a new component instance.
     */

    public $route;
    public $variant;
    public $icon;

    public function __construct($route = '', $variant = 'success', $icon = 'plus')
    {
        $this->route = $route;
        $this->variant = $variant;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.form.button-create');
    }
}
