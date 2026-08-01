<?php

class Conexao
{
    private static $host = "localhost";
    private static $dbname = "biblioteca";
    private static $usuario = "root";
    private static $senha = "";

    public static function conectar()
    {
        try {
            $pdo = new PDO(
                "mysql:host=" . self::$host . ";dbname=" . self::$dbname . ";charset=utf8",
                self::$usuario,
                self::$senha
            );

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $pdo;

        } catch (PDOException $e) {
            die("Erro na conexão com o banco: " . $e->getMessage());
        }
    }
}