<?php


namespace App\Http\Helpers\Model;


use Exception;
use Illuminate\Support\Facades\DB;


class Model
{
  public static function getNextAutoIncrement(string $name_table): int
  {
    try {
      DB::statement('ANALYZE TABLE  ' . $name_table);
      $results = DB::select('SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE (TABLE_NAME = :name_table);', ['name_table' => $name_table]);
      $auto_increment = ($results[0])->AUTO_INCREMENT;
    } catch (Exception $e) {
      trigger_error("Error get next auto increment " . $e->getMessage(), E_USER_ERROR);
      return false;
    }
    return $auto_increment;
  }

}