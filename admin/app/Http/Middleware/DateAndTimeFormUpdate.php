<?php

namespace App\Http\Middleware;

use App\Http\Helpers\Middleware\Middleware;
use Closure;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;


class DateAndTimeFormUpdate
{
  use Middleware;
  /**
   * Handle an incoming request.
   *
   * @param \Illuminate\Http\Request $request
   * @param \Closure $next
   *
   * @return mixed
   */
  public function handle($request, Closure $next)
  {
    $this->updateDateInput($request);
    return $next($request);
  }

  /**
   * Call if success save, delete unnecessary, not paste in BD
   *
   * @param Request $request
   */
  private function updateDateInput(Request $request)
  {
    $date_inputs = $this->getInput($request, request('elements_date_list', false));
    $date_inputs_format = $this->formatDateInput($date_inputs);
    $this->changeDateInput($request, $date_inputs_format);
  }


  private function formatDateInput(array $date_inputs): array
  {
    foreach ($date_inputs as $key => &$item) {
      if($item) {
        $item = (new DateTime($item))->format('Y-m-d');
      }
    }
    return $date_inputs;
  }

  private function changeDateInput(Request $request, array $date_inputs_format): void
  {
    foreach ($date_inputs_format as $name => $value) {
      $request->merge([$name => $value]);
    }
  }
}
