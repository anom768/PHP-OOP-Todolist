<?php

require_once __DIR__ . "/../Entity/Todolist.php";
require_once __DIR__ . "/../Repository/TodolistRepository.php";
require_once __DIR__ . "/../Service/TodoListService.php";

use Entity\Todolist;
use Repository\TodolistRepositoryImpl;
use Service\TodolistServiceImpl;

function testShowTodolist():void
{
    $todolistRepository = new TodolistRepositoryImpl();
    $todolistRepository->todolist[1] = new Todolist("Belajar php dasar");
    $todolistRepository->todolist[2] = new Todolist("Belajar php oop");
    $todolistRepository->todolist[3] = new Todolist("Belajar php database");
    $todolistService = new TodolistServiceImpl($todolistRepository);

    $todolistService->showTodolist();
}

function testAddTodolist():void
{
    $todolistRepository = new TodolistRepositoryImpl();
    $todolistService = new TodolistServiceImpl($todolistRepository);
    $todolistService->addTodolist("Belajar php dasar");
    $todolistService->addTodolist("Belajar php oop");
    $todolistService->addTodolist("Belajar php database");
    

    $todolistService->showTodolist();
}

function testRemoveTodolist():void
{
    $todolistRepository = new TodolistRepositoryImpl();
    $todolistService = new TodolistServiceImpl($todolistRepository);
    $todolistService->addTodolist("Belajar php dasar");
    $todolistService->addTodolist("Belajar php oop");
    $todolistService->addTodolist("Belajar php database");
    

    $todolistService->showTodolist();
    $todolistService->removeTodolist(1);
    $todolistService->showTodolist();

    $todolistService->removeTodolist(4);
    $todolistService->showTodolist();

    $todolistService->removeTodolist(2);
    $todolistService->showTodolist();

    $todolistService->removeTodolist(1);
    $todolistService->showTodolist();

}

testRemoveTodolist();