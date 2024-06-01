<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ListSidebar extends Component
{
    /**
     * Create a new component instance.
     */
    public string $icon;
    public string $route;

    public function __construct($route = '', $icon = 'grid-fill')
    {
        $this->route = $route;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.list-sidebar');
    }
}
