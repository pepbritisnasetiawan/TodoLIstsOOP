<?php

namespace Repository {

    use Entity\TodoList;
    use PDO;

    interface TodoListRepository {
        function save(TodoList $todoList): void;

        function delete(int $number): bool;

        function findAll(): array;
    }

    class TodoListRepositoryImp implements TodoListRepository {

        public array $todoList = array();

        // connection to db
        private PDO $connection;

        public function __construct(PDO $connection)
        {
            $this->connection = $connection;
        }

        function save(TodoList $todoList): void
        {
            // $number = sizeof($this->todoList) + 1;
            // $this->todoList[$number] =  $todoList;

            $sql = "INSERT INTO todolist(todo) VALUES (?)";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$todoList->getTodo()]);
        }

        function delete(int $number): bool
        {
            /* if ($number > sizeof($this->todoList)) {
                return false;
            }

            for ($i = $number; $i < sizeof($this->todoList); $i++){
                $this->todoList[$i] = $this->todoList[$i + 1];
            }

            unset($this->todoList[sizeof($this->todoList)]);

            return true; */

            $sql = "SELECT id FROM todolist WHERE id = ?";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$number]);

            if ($statement->fetch()) {
                $sql = "DELETE FROM todolist WHERE id = ?";
                $statement = $this->connection->prepare($sql);
                $statement->execute([$number]);
                return true;
            } else {
                return false;
            }
        }

        function findAll(): array
        {
            // return $this->todoList;
            $sql = "SELECT id, todo FROM todolist";
            $this->connection->prepare($sql);
            $statement = $this->connection->prepare($sql);
            $statement->execute();

            $result = [];

            foreach ($statement as $row) {
                $todolist = new TodoList();
                $todolist->setId($row["id"]);
                $todolist->setTodo($row["todo"]);

                $result[] = $todolist;
            }

            return $result;
        }
    }
}