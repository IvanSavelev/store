<?php

namespace App\View\Components\FormElements;

use Illuminate\View\Component;

class HeaderSimple extends Component
{
  private $text;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct(string $text)
  {
    $this->text = $text;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    $text = $this->text;
    return view('components.form_elements.header_simple', compact('text'));
  }
}
