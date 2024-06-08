<?php

namespace Service {

    use Entity\TodoList;
    use Repository\TodoListRepository;

    interface TodoListService {
        function showTodoList(): void;

        function addTodoList(string $todo): void;

        function deleteTodoList(int $number): void;
    }

    class TodoListServiceImp implements TodoListService {

        private TodoListRepository $todoListRepository;

        public function __construct(TodoListRepository $todoListRepository)
        {
            $this->todoListRepository = $todoListRepository;
        }

        function showTodoList(): void
        {
            echo "Todolist" . PHP_EOL;

            foreach ($this->todoListRepository->findAll() as $number => $value) {
                echo $value->getId() . ". ". $value->getTodo() . PHP_EOL;
            }
        }

        function addTodoList(string $todo): void
        {
            $todolist = new TodoList($todo);
            $this->todoListRepository->save($todolist);
            echo "Success adding Todo" . PHP_EOL;
        }

        function deleteTodoList(int $number): void
        {
            if ($this->todoListRepository->delete($number)) {
                echo "Success deleting Todo List" . PHP_EOL;
            } else {
                echo "Failed deleting Todo List" . PHP_EOL;
            }
        }
    }
}