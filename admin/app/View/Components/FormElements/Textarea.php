<?php

namespace App\View\Components\FormElements;


use App\View\Components\FormElements\Helpers\ComponentBasisField;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;



class Textarea extends ComponentBasisField
{

  private $class_textarea;
  private $value;

  /**
   * Create a new component instance.
   *
   * @param Request $request
   * @param string $name
   * @param string $type
   * @param string $label
   * @param string $classLabel
   * @param string $classTextarea
   * @param string $pathImage
   * @param bool $required
   * @param string $value
   * @param MessageBag $errors
   */
  public function __construct(Request $request, string $name = 'name',  string $label = 'field', string $classLabel = '', string $classTextarea = '',  bool $required = false, ?string $value = '', $errors = null)
  {
    parent::__construct($request, $label, $name, $classLabel, $required, $errors);

    $this->class_textarea = $classTextarea;
    $this->value = $value;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {

    $class_textarea = $this->class_textarea;
    $value = $this->value;
    return $this->view('components.form_elements.textarea', compact('class_textarea', 'value'));
  }
}
