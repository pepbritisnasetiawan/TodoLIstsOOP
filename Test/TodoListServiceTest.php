<?php

require_once "Entity/TodoList.php";
require_once "Repository/TodoListRepository.php";
require_once "Service/TodoListService.php";
require_once "Config/Database.php";

use Config\Database;
use Entity\TodoList;
use Repository\TodoListRepositoryImp;
use Service\TodoListServiceImp;

function testShowTodoList() {

    $connection = Database::getConnection();
    $todoListRepository = new TodoListRepositoryImp($connection);
    $todoListService = new TodoListServiceImp($todoListRepository);
    $todoListService->addTodoList("Belajar PHP");
    $todoListService->addTodoList("Belajar PHP OOP");
    $todoListService->addTodoList("Belajar PHP Web");

    $todoListService->showTodoList();
}

function testAddTodoList(): void
{
    $connection = Database::getConnection();

    $todoListRepository = new TodoListRepositoryImp($connection);

    $todoListService = new TodoListServiceImp($todoListRepository);
    $todoListService->addTodoList("Belajar PHP");
    $todoListService->addTodoList("Belajar PHP");
    $todoListService->addTodoList("Belajar PHP");
    $todoListService->addTodoList("Belajar PHP");

    // $todoListService->showTodoList();
}

function testDeleteTodoList(): void
{

    $connection = Database::getConnection();

    $todoListRepository = new TodoListRepositoryImp($connection);

    $todoListService = new TodoListServiceImp($todoListRepository);

    echo $todoListService->deleteTodoList(6) . PHP_EOL;
    echo $todoListService->deleteTodoList(5) . PHP_EOL;
    echo $todoListService->deleteTodoList(4) . PHP_EOL;
    echo $todoListService->deleteTodoList(3) . PHP_EOL;
    echo $todoListService->deleteTodoList(2) . PHP_EOL;
    echo $todoListService->deleteTodoList(1) . PHP_EOL;
}


testShowTodoList();