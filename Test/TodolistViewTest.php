<?php

require_once __DIR__ . "/../Entity/Todolist.php";
require_once __DIR__ . "/../Repository/TodolistRepository.php";
require_once __DIR__ . "/../Service/TodoListService.php";
require_once __DIR__ . "/../View/TodolistView.php";
require_once __DIR__ . "/../Helper/InputHelper.php";

use Entity\Todolist;
use Repository\TodolistRepositoryImpl;
use Service\TodolistServiceImpl;
use View\TodolistView;

function testViewShowTodolist():void
{
    $todolistRepository = new TodolistRepositoryImpl();
    $todolistService = new TodolistServiceImpl($todolistRepository);
    $todolistView = new TodolistView($todolistService);

    $todolistService->addTodolist("Belajar php dasar");
    $todolistService->addTodolist("Belajar php oop");
    $todolistService->addTodolist("Belajar php database");

    $todolistView->showTodolist();
}

function testViewAddTodolist():void
{
    $todolistRepository = new TodolistRepositoryImpl();
    $todolistService = new TodolistServiceImpl($todolistRepository);
    $todolistView = new TodolistView($todolistService);

    $todolistService->addTodolist("Belajar php dasar");
    $todolistService->addTodolist("Belajar php oop");
    $todolistService->addTodolist("Belajar php database");

    $todolistService->showTodolist();
    $todolistView->addTodolist();
    $todolistService->showTodolist();
    $todolistView->addTodolist();
    $todolistService->showTodolist();
}

function testViewRemoveTodolist():void
{
    $todolistRepository = new TodolistRepositoryImpl();
    $todolistService = new TodolistServiceImpl($todolistRepository);
    $todolistView = new TodolistView($todolistService);

    $todolistService->addTodolist("Belajar php dasar");
    $todolistService->addTodolist("Belajar php oop");
    $todolistService->addTodolist("Belajar php database");

    $todolistService->showTodolist();
    $todolistView->removeTodolist();
    $todolistService->showTodolist();
    $todolistView->removeTodolist();
    $todolistService->showTodolist();
}

testViewRemoveTodolist();