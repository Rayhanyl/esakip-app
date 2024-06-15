<?php

namespace App\View\Components\Admin\Layout;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HeaderTitle extends Component
{
    /**
     * Create a new component instance.
     */
    public $title;
    public function __construct($title = '')
    {
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.layout.header-title');
    }
}
