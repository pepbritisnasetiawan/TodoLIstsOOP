<?php

require_once "Entity/TodoList.php";
require_once "Repository/TodoListRepository.php";
require_once "Service/TodoListService.php";

use Entity\TodoList;
use Repository\TodoListRepositoryImp;
use Service\TodoListServiceImp;

function testShowTodoList() {

    $todoListRepository = new TodoListRepositoryImp();

    $todoListRepository->todoList[1] = new TodoList("Belajar PHP");
    $todoListRepository->todoList[2] = new TodoList("Belajar PHP");
    $todoListRepository->todoList[3] = new TodoList("Belajar PHP");
    $todoListRepository->todoList[4] = new TodoList("Belajar PHP");
    $todoListService = new TodoListServiceImp($todoListRepository);

    $todoListService->showTodoList();
}

function testAddTodoList(): void
{
    $todoListRepository = new TodoListRepositoryImp();

    $todoListService = new TodoListServiceImp($todoListRepository);
    $todoListService->addTodoList("Belajar PHP");
    $todoListService->addTodoList("Belajar PHP");
    $todoListService->addTodoList("Belajar PHP");
    $todoListService->addTodoList("Belajar PHP");

    $todoListService->showTodoList();
}

function testDeleteTodoList(): void
{
    $todoListRepository = new TodoListRepositoryImp();

    $todoListService = new TodoListServiceImp($todoListRepository);
    $todoListService->addTodoList("Belajar OOP");
    $todoListService->addTodoList("Belajar PHP");
    $todoListService->addTodoList("Belajar PHP");
    $todoListService->addTodoList("Belajar PHP");

    $todoListService->showTodoList();

    $todoListService->deleteTodoList(1);
    $todoListService->showTodoList();
    
    $todoListService->deleteTodoList(2);
    $todoListService->showTodoList();

    $todoListService->deleteTodoList(2);
    $todoListService->showTodoList();
    
    $todoListService->deleteTodoList(1);
    $todoListService->showTodoList();
}


testDeleteTodoList();