<?php
require 'functions.php';

// Добавление пользователей
$userId1 = addUser('Макс 1', 'max1234@mail.ru');
$userId2 = addUser('Макс 2', 'max123456789@mail.ru');

if ($userId1 && $userId2) {
    echo "Пользователи добавлены успешно";
} else {
    echo "Ошибка при добавлении пользователей";
}

// Вывод списка пользователей
$users = getUsers();
echo "Users:\n";
foreach ($users as $user) {
    echo "ID: {$user['id']}, Name: {$user['name']}, Email: {$user['email']}, Created At: {$user['created_at']}\n";
}

// Обновление данных пользователя
if (updateUser($userId1, 'Макс 1234', 'max12344321@mail.ru')) {
    echo "Пользователь обновлен успешно";
} else {
    echo "Ошибка при обновлении пользователя";
}

// Удаление пользователя
if (deleteUser($userId2)) {
    echo "Пользователь удален успешно";
} else {
    echo "Ошибка при удалении пользователя";
}

// Добавление пользователя в группу
if (addUserToGroup($userId1, 1)) {
    echo "Пользователь успешно добавлен в группу 1";
} else {
    echo "Ошибка добавления пользователя в группу";
}