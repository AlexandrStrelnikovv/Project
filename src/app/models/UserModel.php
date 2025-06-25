<?php

namespace App\models;
use League\Container\Container;
use RedBeanPHP\R;
class UserModel extends Model
{
    private $model;
    private string $modelName;
    public function __construct(public Container $container)
    {

    }
    public function init()
    {
        $this->container->get('DataBase')->initDB();
        $model = $this->getModelName();
        $this->modelName = $model;
        $this->model = R::dispense($model);
        return $this;

    }

    public function all() : array
    {
        $tasks = R::findAll($this->modelName);
        return R::beansToArray($tasks);

    }

    public function find(string $id) : array
    {
        $task = R::findOne($this->modelName, $id);
        return $task->export();
    }

    public function update(string $id, array $taskData) : bool
    {
        $task = R::findOne($this->modelName, $id);
        foreach ($taskData as $key => $value) {
            $task->$key = $value;
        }
        return R::store($task);
    }

    public function add(array $taskData) :int
    {

        $task = $this->model;
        foreach ($taskData  as $field => $value) {
            $task->$field = $value;
        }
        return R::store($task);
    }

    public function getModelName() :string
    {
        $reflection = new \ReflectionClass($this);
        $model = $reflection->getShortName() . 's';
        return strtolower($model);
    }
}
