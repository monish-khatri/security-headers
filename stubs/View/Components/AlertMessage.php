<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AlertMessage extends Component
{
    /**
     * The alert type.
     *
     * @var string
     */
    public $type;

    /**
     * The alert message.
     *
     * @var string
     */
    public $message;

    /**
     * Create the component instance.
     *
     * @param  string  $type
     * @param  string  $message
     * @return void
     */
    public function __construct($type, $message)
    {
        $this->type = $type;
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return <<<'blade'
            <div {{ $attributes->merge(['class' => 'alert alert-'.$type]) }}>
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        blade;
    }
}
