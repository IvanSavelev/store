<?php

namespace App\View\Components\FormElements\Helpers;

use Illuminate\Support\MessageBag;
use Illuminate\View\Component;
use Symfony\Component\HttpFoundation\Request;

abstract class ComponentBasisField extends Component
{
  protected $request;
  protected $label;
  protected $name;
  protected $required;
  protected $class_label;
  protected $errors;

  /**
   * Create a new component instance.
   *
   * @param Request $request
   * @param string $label
   * @param string $name
   * @param string $class_label
   * @param bool $required
   * @param MessageBag $errors
   */
  public function __construct(Request $request, string $label, string $name, string $class_label, bool $required, $errors)
  {
    $this->request = $request;
    $this->label = $label;
    $this->name = $name;
    $this->class_label = $class_label;
    $this->required = $required;
    $this->errors = $errors;
  }

  public function view($view = null, $data = []) {
    $request = $this->request;
    $label = $this->label;
    $name = $this->name;
    $class_label = $this->class_label;
    $required = $this->required;
    $errors = $this->errors?:new MessageBag();
    if($required) {
      $class_label .= 'required';
    }
    //this is html include
    $sub_element = view($view, compact('request', 'label', 'name', 'class_label', 'errors') + $data)->render();

    return view('components.form_elements.helpers.basis_field', compact('label', 'name', 'class_label', 'errors', 'sub_element', 'required'));
  }
}
