<?php

require_once "Entity/TodoList.php";
require_once "Repository/TodoListRepository.php";
require_once "Service/TodoListService.php";
require_once "View/TodoListView.php";
require_once "Helper/InputHelper.php";

use Repository\TodoListRepositoryImp;
use Service\TodoListServiceImp;
use View\TodoListView;

function testViewShowTodoList(): void
{
    $todoListRepository = new TodoListRepositoryImp();
    $todolistService = new TodoListServiceImp($todoListRepository);
    $todolistView = new TodoListView($todolistService);

    $todolistService->addTodoList("Belajar OOP");
    $todolistService->addTodoList("Belajar PHP");
    $todolistService->addTodoList("Belajar PHP Database");
    $todolistService->addTodoList("Belajar PJP WEB");

    $todolistView->showTodoList();
}

function testViewAddTodoList(): void
{
    $todoListRepository = new TodoListRepositoryImp();
    $todolistService = new TodoListServiceImp($todoListRepository);
    $todolistView = new TodoListView($todolistService);

    $todolistService->addTodoList("Belajar OOP");
    $todolistService->addTodoList("Belajar PHP");
    $todolistService->addTodoList("Belajar PHP Database");
    $todolistService->addTodoList("Belajar PJP WEB");

    $todolistService->showTodoList();

    $todolistView->addTodoList();

    $todolistService->showTodoList();
}

function testViewDeleteTodoList(): void
{
    $todoListRepository = new TodoListRepositoryImp();
    $todolistService = new TodoListServiceImp($todoListRepository);
    $todolistView = new TodoListView($todolistService);

    $todolistService->addTodoList("Belajar OOP");
    $todolistService->addTodoList("Belajar PHP");
    $todolistService->addTodoList("Belajar PHP Database");
    $todolistService->addTodoList("Belajar PJP WEB");

    $todolistService->showTodoList();

    $todolistView->deleteTodoList();

    $todolistService->showTodoList();
    
    $todolistView->deleteTodoList();

    $todolistService->showTodoList();
}

testViewDeleteTodoList();