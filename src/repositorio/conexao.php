<?php
class Conexao {
  private static $dsn = "pgsql:host=dpg-cnnfcngl6cac73fg33j0-a.oregon-postgres.render.com;dbname=michelsouza";
  private static $username = "michelsouza_user";
  private static $password = "AlGPO6NMfK8dT9mfZfiZFTFVc3NE5tRX";
    private static $pdo;

    public static function getConnection() {
        if (!isset(self::$pdo)) {
            try {
                self::$pdo = new PDO(self::$dsn, self::$username, self::$password);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erro ao conectar ao banco de dados: " . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}

?>
