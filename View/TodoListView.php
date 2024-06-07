<?php

namespace View {

    use Helper\InputHelper;
    use Service\TodoListService;

    class TodoListView {

        private TodoListService $todolistService;

        public function __construct(TodoListService $todoListService)
        {
            $this->todolistService = $todoListService;
        }

        function showTodoList(): void
        {
            while (true) {
                $this->todolistService->showTodoList();

                echo "Menu" . PHP_EOL;
                echo "1. Add Todo" . PHP_EOL;
                echo "2. Delete Todo" . PHP_EOL;
                echo "x. Exit" . PHP_EOL;

                $choice = InputHelper::input("Choose");

                if ($choice == "1") {
                    $this->addTodoList();
                } else if ($choice == "2") {
                    $this->deleteTodoList();
                } else if ($choice == "x") {
                    break;
                } else {
                    echo "Invalalid Choice!" . PHP_EOL;
                }
            }

            echo "See You!" . PHP_EOL;
        }

        function addTodoList(): void
        {
            echo "Adding Todo" . PHP_EOL;

            $todo = InputHelper::input("Todo (x for cancel)");

            if ($todo == "x") {
                echo "Cancel Adding Todo" . PHP_EOL;
            } else {
                $this->todolistService->addTodoList($todo);
            }
        }

        function deleteTodoList(): void
        {
            echo "Deleting Todo" . PHP_EOL;

            $choice = InputHelper::input("Number (x for canceling)");

            if ($choice == "x") {
                echo "Cancel Deleting Todo" . PHP_EOL;
            } else {
                $this->todolistService->deleteTodoList($choice);
            }
        }
    }
}