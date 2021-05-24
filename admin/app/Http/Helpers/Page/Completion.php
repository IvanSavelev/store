<?php


namespace App\Http\Helpers\Page;


use Illuminate\Http\Request;

trait Completion
{
  /**
   * Return for add object
   * @param Request $request
   * @param $name_object - route name object
   * @param string $name_object_rus - for message
   *
   * @return \Illuminate\Http\RedirectResponse
   */
  private function returnAddGood(Request $request, $name_object, $name_object_rus = 'Объект')
  {
    if ($request->redirect === 'redirect_here') {
      return redirect()->route($name_object . '.edit', (int)$request->id_object)->with('info', $name_object_rus .' успешно добавлен!');
    }
    if ($request->redirect === 'redirect_up') {
      return redirect()->route($name_object . '.index')->with('info', $name_object_rus .' успешно добавлен!');
    }
  }


  /**
   * Return for update object
   * @param Request $request
   * @param $name_object - route name object
   * @param string $name_object_rus - for message
   *
   * @return \Illuminate\Http\RedirectResponse
   */
  private function returnUpdateGood(Request $request, $name_object, $name_object_rus = 'Объект')
  {
    if ($request->redirect === 'redirect_here') {
      return redirect()->back()->with('info', $name_object_rus . ' успешно изменён!');
    }
    if ($request->redirect === 'redirect_up') {
      return redirect()->route($name_object . '.index')->with('info', $name_object_rus . ' успешно изменён!');
    }
  }

}