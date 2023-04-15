<?php

namespace App\View\Components\Frontend;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class blogs extends Component
{
    public $articles;
    public function __construct($data)
    {
        $this->articles = $data;
    }


    public function render(): View|Closure|string
    {
        return view('components.frontend.blogs');
    }
}
