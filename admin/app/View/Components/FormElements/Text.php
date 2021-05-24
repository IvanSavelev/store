<?php

namespace App\View\Components\FormElements;


use App\View\Components\FormElements\Helpers\ComponentBasisField;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;



class Text extends ComponentBasisField
{
  private $type;
  private $class_input;
  private $value;

  /**
   * Create a new component instance.
   *
   * @param Request $request
   * @param string $name
   * @param string $type
   * @param string $label
   * @param string $classLabel
   * @param string $classInput
   * @param bool $required
   * @param string $value
   * @param MessageBag $errors
   */
  public function __construct(Request $request, string $name = 'name', string $type = 'text', string $label = 'field', string $classLabel = '', string $classInput = '', bool $required = false, ?string $value = '', $errors = null)
  {
    parent::__construct($request, $label, $name, $classLabel, $required, $errors);
    $this->type = $type;
    $this->class_input = $classInput;
    $this->value = $value;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    $type = $this->type;
    $class_input = $this->class_input;
    $value = $this->value;
    return $this->view('components.form_elements.text', compact('type', 'class_input', 'value'));
  }
}
