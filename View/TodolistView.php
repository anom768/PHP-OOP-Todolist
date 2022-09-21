<?php

namespace View
{

    use Service\TodolistService;
    use Input\InputHelper;
    use Service\TodolistServiceImpl;

    class TodolistView
    {
        private TodolistServiceImpl $todolistService;

        public function __construct(TodolistServiceImpl $todolistService)
        {
            $this->todolistService = $todolistService;
        }

        function showTodolist():void
        {
            while (true) {
                $this->todolistService->showTodolist();
                echo "MENU" . PHP_EOL;
                echo "1. Tambah Todo" . PHP_EOL;
                echo "2. Hapus Todo" . PHP_EOL;
                echo "q. Keluar" . PHP_EOL;

                $pilih = InputHelper::input("Pilih");

                if ($pilih == "1") {
                    $this->addTodolist();
                } elseif ($pilih == "2") {
                    $this->removeTodolist();
                } elseif ($pilih == "q") {
                    break;
                } else {
                    echo "Pilihan salah!!!" . PHP_EOL;
                }
            }
            echo "Sampai Jumpa Lagi" . PHP_EOL;
        }

        function addTodolist():void
        {
            echo "MENAMBAH TODO" . PHP_EOL;
            $todo = InputHelper::input("Masukkan Todo. (Q untuk batal)");
            if ($todo == "q") {
                echo "Batal menambahkan todo.";
            } else {
                $this->todolistService->addTodoList($todo);
            }
        }

        function removeTodolist():void
        {
            echo "MENGHAPUS TODO". PHP_EOL;
            $pilihan = InputHelper::input("Pilih nomor. (q) batal");
            if ($pilihan == "q") {
                echo "Batal menghapus todo.". PHP_EOL;
            } else {
                $this->todolistService->removeTodoList($pilihan);
            }
        }
    }
}