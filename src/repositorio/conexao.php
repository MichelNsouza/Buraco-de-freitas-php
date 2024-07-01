<?php
class Conexao {
  private static $dsn = "mysql:host=mysql.freehostia.com;dbname=micsou5_micsou5";
  private static $username = "micsou5_micsou5";
  private static $password = "548098";
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
