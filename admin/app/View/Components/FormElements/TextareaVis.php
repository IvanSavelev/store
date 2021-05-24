<?php

namespace App\View\Components\FormElements;


use App\View\Components\FormElements\Helpers\ComponentBasisField;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;



class TextareaVis extends ComponentBasisField
{

  private $class_textarea;
  private $value;
  private $path_image;

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
  public function __construct(Request $request, string $name = 'name',  string $label = 'field', string $classLabel = '', string $classTextarea = '', string $pathImage = '', bool $required = false, ?string $value = '', $errors = null)
  {
    parent::__construct($request, $label, $name, $classLabel, $required, $errors);

    $this->class_textarea = $classTextarea;
    $this->value = $value;
    $this->path_image = $pathImage;
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
    $path_image = $this->path_image;
    return $this->view('components.form_elements.textarea_vis', compact('class_textarea', 'value', 'path_image'));
  }
}
