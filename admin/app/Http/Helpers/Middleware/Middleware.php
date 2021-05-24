<?php


namespace App\Http\Helpers\Middleware;


use Illuminate\Http\Request;

trait Middleware
{

  /**
   * Take string name input, and return array name_input=>value_input
   * @param Request $request
   * @param $elements_list_string
   *
   * @return array
   */
  private function getInput(Request $request, string $elements_list_string): array
  {
    if (!$elements_list_string) {
      return [];
    }
    $elements_date_list = explode(',', $elements_list_string);
    $inputs = $request->all();
    $elements_date = [];
    foreach ($elements_date_list as $key => $item) {
      if (array_key_exists($item, $inputs)) {
        $elements_date[$item] = $inputs[$item];
      } else {
        $elements_date[$item] = null;
      }
    }
    return $elements_date;
  }
}