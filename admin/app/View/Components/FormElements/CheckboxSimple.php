<?php

namespace App\View\Components\FormElements;


use App\View\Components\FormElements\Helpers\ComponentBasisField;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;



class CheckboxSimple extends ComponentBasisField
{
  private $class_checkbox;
  private $value;

  /**
   * Create a new component instance.
   *
   * @param Request $request
   * @param string $name
   * @param string $type
   * @param string $label
   * @param string $class_label
   * @param string $class_input
   * @param bool $required
   * @param string $value
   * @param MessageBag $errors
   */
  public function __construct(Request $request, string $name = 'name',  string $label = 'field', string $classLabel = '', string $classCheckbox = '',  bool $required = false, ?string $value = '', $errors = null)
  {
    parent::__construct($request, $label, $name, $classLabel, $required, $errors);
    $this->class_checkbox = $classCheckbox;
    $this->value = $value;
  }


  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    $class_checkbox = $this->class_checkbox;
    $value = $this->value;
    return $this->view('components.form_elements.checkbox_simple', compact('class_checkbox', 'value'));
  }
}