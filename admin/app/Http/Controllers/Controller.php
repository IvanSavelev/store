<?php

namespace App\Http\Controllers;


use App\Http\Helpers\Page\Page;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



    /**
   * Эта прослойка нужна, чтобы помнить что можно параметры страницы задавать, и смотреть за ошибками
   *
   * @param string $view
   * @param Page $page_settings
   * @param array $data
   * @param array $mergeData
   *
   * @return Factory|\Illuminate\View\View
   * @throws Exception
   */
	public function viewPage(string $view, Page $page_settings, array $data = [], array $mergeData = [])
	{
		if(isset($data['page_settings'])) {
			//Нельзя передовать данные с таким именем, дальше будут ошибки, если пропустим это
      //page_settings - тут хранятся настройки страницы
			throw new Exception('page_settings - you cannot pass a variable with this name!');
		}
		$data['page_settings'] = $page_settings;
		return view($view, $data, $mergeData);
	}
}
