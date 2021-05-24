<?php


namespace App\Http\Helpers\Page;


use App\Http\Helpers\Image\Image;

/**
 * Class Page
 * Класс описывает поведение страницы
 *
 * @package App\Http\Helpers\Page
 */
class Page
{


  private $container_size_real = false; //Used if you want the content on the page to be larger than the screen width (scroll is shown when doing this)
  private $type = 'normal'; //Page type-determines the type of admin page, which details to show
  private $object_type = 'no_type';
  private $id_object = null;
  private $object_path_image = null;


  /**
   * Тип страницы - определяет вид страницы админки, какие показывать детали
   * @return string
   */
  public function getType(): string
  {
    return $this->type;
  }

  /**
   * Тип страницы - определяет вид страницы админки, какие показывать детали
   * @param string $type
   */
  public function setType(string $type): void
  {
    $this->type = $type;
  }

  /**
   * Используется если нужно чтобы контент на странице был больше чем экран по ширине (скролл показывается при этом)
   * @return bool
   */
  public function getContainerSizeReal(): bool
  {
    return $this->container_size_real;
  }

  /**
   * Используется если нужно чтобы контент на странице был больше чем экран по ширине (скролл показывается при этом)
   * @param bool $container_size_real
   */
  public function setContainerSizeReal(bool $container_size_real): void
  {
    $this->container_size_real = $container_size_real;
  }

  /**
   * Set data
   * @param $object - this controller
   * @param $id - id item
   */
  function __construct($object, $id = null)
  {
    $all_name_class = explode('\\', get_class($object));
    $this->object_type = strtolower(str_replace(['FormController', 'ListController', 'Controller'], [''], end($all_name_class)));
    $this->id_object = $id ?: '';
  }


  /**
   * @return string
   */
  public function getObjectType(): string
  {
    return $this->object_type;
  }

  /**
   * @return string
   */
  public function getObjectId(): string
  {
    return $this->id_object;
  }


  /**
   * @return string
   */
  public function getObjectPathImage(): string
  {
    if (!$this->object_path_image) {
      return $this->getObjectPathImageDefault();
    }
    return $this->object_path_image;
  }


  private function getObjectPathImageDefault(): string
  {
    return Image::PATH_IMAGE_DIRECTORY . '/' . $this->object_type . ($this->id_object ? '/' . $this->id_object : '');
  }

  /**
   * @param string $object_path_image
   */
  public function setObjectPathImage(string $object_path_image): void
  {
    $this->object_path_image = $object_path_image;
  }


}