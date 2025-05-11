<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class alert2 extends Component
{
    public $class;
    /**
     * Create a new component instance.
     */
    public function __construct($type = 'info')
    {
        $styles = 'p-4 rounded border';
        switch ($type) {
            case 'success':
                $class = 'bg-green-100 text-green-800 border-green-400';
                break;
            case 'error':
            case 'danger':
                $class = 'bg-red-100 text-red-800 border-red-400';
                break;
            case 'warning':
                $class = 'bg-yellow-100 text-yellow-800 border-yellow-400';
                break;
            case 'info':
            default:
                $class = 'bg-blue-100 text-blue-800 border-blue-400';
                break;
        } 
            $this->class = $styles . ' ' . $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert2');
    }
}
