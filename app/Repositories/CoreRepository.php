<?php


namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CoreRepository
 *
 * @package App\Repositories
 *
 * Работа с сущностью
 * Может выдавать наборы данных
 * не может изменять создавать сущности
 */
abstract class CoreRepository
{
    /**
     * @var Model
     */
    protected $model;

    public function __construct()
    {
        $this->model=app($this->getModelClass()); // создаем новый класс модели
    }
    abstract protected function getModelClass();

    protected function startConditions() // при новом запросе клонируе пустую модель и уже с ней работаем
    {
        return clone $this->model;
    }

}
