<?php
require 'db.php';

/**
 * Добавление пользлвателя в БД
 * @param mixed $name
 * @param mixed $email
 * @return bool|string
 */
function addUser($name, $email) {
    global $pdo;
    $sql = "INSERT INTO users (name, email) VALUES (:name, :email)";
    $stmt = $pdo->prepare($sql);
    try {
        $stmt->execute(['name' => $name, 'email' => $email]);
        return $pdo->lastInsertId();
    } catch (PDOException $e) {
        return false;
    }
}

/**
 * Получение пользователя из БД
 * @return array
 */
function getUsers() {
    global $pdo;
    $sql = "SELECT * FROM users ORDER BY created_at DESC";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Обновление информации о пользователе
 * @param mixed $id
 * @param mixed $name
 * @param mixed $email
 * @return bool
 */
function updateUser($id, $name, $email) {
    global $pdo;
    $sql = "UPDATE users SET name = :name, email = :email WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    try {
        $stmt->execute(['id' => $id, 'name' => $name, 'email' => $email]);
        return true;
    } catch (PDOException $e) {
        return false;
    }
}

/**
 * Удаление пользователя по ID
 * @param mixed $id
 * @return bool
 */
function deleteUser($id) {
    global $pdo;
    $sql = "DELETE FROM users WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute(['id' => $id]);
}

/**
 * Добавление пользователя в группу по его ID
 * @param mixed $userId
 * @param mixed $groupId
 * @return bool
 */
function addUserToGroup($userId, $groupId) {
    global $pdo;
    $sql = "INSERT INTO user_groups (user_id, group_id) VALUES (:user_id, :group_id)";
    $stmt = $pdo->prepare($sql);
    try {
        $stmt->execute(['user_id' => $userId, 'group_id' => $groupId]);
        return true;
    } catch (PDOException $e) {
        return false;
    }
}