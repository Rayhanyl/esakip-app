<?php

namespace App\View\Components\Layout;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ListSidebarItem extends Component
{
    /**
     * Create a new component instance.
     */
    public string $route;

    public function __construct($route = '')
    {
        $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout.list-sidebar-item');
    }
}
