<?php

namespace App\View\Components\FormElements;

use Illuminate\Support\MessageBag;
use Illuminate\View\Component;

class Button extends Component
{
  private $type;
  private $class;
  private $label;

  /**
   * Create a new component instance.
   *
   * @param string $type
   * @param string $class
   * @param string $label
   */
  public function __construct(string $type = 'button', string $class="", $label = 'field')
  {
    $this->type = $type;
    $this->class = $class;
    $this->label = $label;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    $type = $this->type;
    $class = $this->class;
    $label = $this->label;
    return view('components.form_elements.button', compact('type', 'class', 'label'));
  }
}