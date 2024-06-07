<?php

require_once "Entity/TodoList.php";
require_once "Helper/InputHelper.php";
require_once "Repository/TodoListRepository.php";
require_once "Service/TodoListService.php";
require_once "View/TodoListView.php";

use Repository\TodoListRepositoryImp;
use Service\TodoListServiceImp;
use View\TodoListView;

echo "Todolist Application" . PHP_EOL;

$todoListRepository = new TodoListRepositoryImp();
$todolistService = new TodoListServiceImp($todoListRepository);
$todolisView = new TodoListView($todolistService);

$todolisView->showTodoList();