<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductStock extends Component
{

    /**
     * Create a new component instance.
     */
    public function __construct(public int $value)
    {
    }

    public function getText(){
        $text = $this->value . " unités";
        if($this->value <= 0){
            $text = "Hors stock";
        }
        return $text;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.product-stock',[
            'text' => $this->getText(),
        ]);
    }
}
