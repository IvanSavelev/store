<?php

namespace App\View\Components\Helpers;

use Illuminate\View\Component;

class ImageShow extends Component
{
    public $path;

  /**
   * Create a new component instance.
   *
   * @param string|null $path
   */
    public function __construct(?string $path)
    {
        $this->path = $path;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.helpers.image-show');
    }
}
