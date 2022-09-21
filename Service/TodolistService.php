<?php

namespace Service
{

    use Entity\Todolist;
    use Repository\TodolistRepository;

    interface TodolistService
    {
        function showTodolist():void;

        function addTodolist(string $todo):void;

        function removeTodolist(int $number):void;
    }

    class TodolistServiceImpl
    {
        private TodolistRepository $todolistRepository;

        public function __construct(TodolistRepository $todolistRepository)
        {
            $this->todolistRepository = $todolistRepository;
        }

        function showTodolist():void
        {
            echo "TODOLIST".PHP_EOL;
            foreach($this->todolistRepository->findAll() as $number => $value)
            {
                echo "$number. ". $value->getTodo().PHP_EOL;
            }
        }

        function addTodolist(string $todo):void
        {
            $todolist = new Todolist($todo);
            $this->todolistRepository->save($todolist);
            echo "SUSKSES MENAMBAH TODOLIST" . PHP_EOL;
        }

        function removeTodolist(int $number):void
        {
            if ($this->todolistRepository->remove($number)){
                echo "SUKSES MENGHAPUS TODOLIST" . PHP_EOL;
            } else {
                echo "GAGAL MENGHAPUS TODOLIST" . PHP_EOL;
            }
        }
    }
}