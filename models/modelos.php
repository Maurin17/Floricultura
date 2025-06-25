<?php 
    require __DIR__ . '/../bd/conecta.php';

    function connect() {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        if (mysqli_connect_errno()) {
            die("Falha na conexão: " . mysqli_connect_error());
        }

        return $conn;
    }

    class Usuario {
        public static function exists($id = null, $email = null) {
            $conn = connect();
            $sql = "SELECT id, email FROM usuario WHERE";

            if ($id) {
                $sql .= " id = '$id'";
            } elseif ($email) {
                $sql .= " email = '$email'";
            } else {
                mysqli_close($conn);
                return false;
            }

            $request = mysqli_query($conn, $sql);
            if ($request->num_rows > 0) {
                mysqli_close($conn);
                return true;
            }
            
            mysqli_close($conn);
            return false;
        }

        public static function create($nome, $sobrenome, $email, $telefone, $senha) {
            if (Usuario::exists(null, $email)) {
                return;
            }

            if (empty($nome) || empty($sobrenome) || empty($email) || empty($telefone) || empty($senha)) {
                return;
            }

            $conn = connect();
            mysqli_query($conn, "INSERT INTO usuario (nome, sobrenome, email, telefone, senha) VALUES ('$nome', '$sobrenome', '$email', '$telefone', md5('$senha'))");
            
            mysqli_close($conn);
        }

        public static function get($id = null, $email = null, $senha = null) {
            $conn = connect();
            $sql = "SELECT id, nome, sobrenome, email, telefone FROM usuario WHERE";
            $user = array();

            if ($id) {
                $sql .= " id = '$id'";
            } elseif ($email && $senha) {
                $sql .= " email = '$email' AND senha = '$senha'";
            } else {
                mysqli_close($conn);
                return "";
            }

            $request = mysqli_query($conn, $sql);
            if ($request->num_rows > 0) {
                $user = $request->fetch_assoc();
            }
            
            mysqli_close($conn);
            return $user;
        }

        public static function get_all() {
            $conn = connect();
            $request = mysqli_query($conn, "SELECT * FROM usuario");
            $users = array();
            if ($request->num_rows > 0) {
                $users = $request->fetch_all(MYSQLI_ASSOC);
            }
            mysqli_close($conn);
            return $users;
        }

        public static function update($id, $nome, $sobrenome, $email, $telefone) {
            $conn = connect();
            
            if (Usuario::exists($id)) {
                mysqli_query($conn, "UPDATE usuario SET nome = '$nome', sobrenome = '$sobrenome', email = '$email', telefone = '$telefone' WHERE id = '$id'");
            }

            mysqli_close($conn);
        }

        public static function delete($id) {
            $conn = connect();
            mysqli_query($conn, "DELETE FROM usuario WHERE id='$id'");
            mysqli_close($conn);
        }
    }

    class Flor {
        public static function exists($id) {
            $conn = connect();

            $request = mysqli_query($conn, "SELECT id FROM flor WHERE id = '$id'");
            if ($request->num_rows > 0) {
                mysqli_close($conn);
                return true;
            }
            
            mysqli_close($conn);
            return false;
        }

        public static function create($nome, $valor, $descricao, $imagem) {
            $conn = connect();
            
            mysqli_query($conn, "INSERT INTO flor (nome, valor, descricao, imagem) VALUES ('$nome', '$valor', '$descricao', '$imagem'");

            mysqli_close($conn);
        }

        public static function get($id) {
            $conn = connect();
            $sql = "SELECT id, nome, valor, descricao, imagem FROM flor WHERE id='$id'";
            $flower = array();

            $request = mysqli_query($conn, $sql);
            if ($request->num_rows > 0) {
                $flower = $request->fetch_assoc();
            }
            
            mysqli_close($conn);
            return $flower;

        }

        public static function get_all() {
            $conn = connect();
            $request = mysqli_query($conn, "SELECT * FROM flor");
            $flowers = array();
            if ($request->num_rows > 0) {
                $flowers = $request->fetch_all(MYSQLI_ASSOC);
            }
            mysqli_close($conn);
            return $flowers;
        }

        public static function update($id, $nome, $valor, $descricao, $imagem) {
            $conn = connect();
            if (Flor::exists($id)) {
                mysqli_query($conn, "UPDATE flor SET nome = '$nome', valor = '$valor', descricao = '$descricao', imagem = '$imagem' WHERE id = '$id'");
            }

            mysqli_close($conn);
        }

        public static function delete($id) {
            $conn = connect();
            mysqli_query($conn, "DELETE FROM flor WHERE id='$id'");
            mysqli_close($conn);
        }
    }

    class Carrinho {
        public static function add($usuario_id, $flor_id) {
            $conn = connect();

            $request = mysqli_query($conn, "SELECT * FROM carrinho WHERE usuario_id='$usuario_id' AND flor_id='$flor_id'");

            if ($request->num_rows > 0) {
                mysqli_query($conn, "UPDATE carrinho SET quantidade = quantidade + 1 WHERE usuario_id = '$usuario_id' AND flor_id = '$flor_id'");
            } else {
                mysqli_query($conn, "INSERT INTO carrinho (usuario_id, flor_id) VALUES ('$usuario_id', '$flor_id')");
            }

            mysqli_close($conn);
        }

        public static function get_all() {
            $conn = connect();
            $request = mysqli_query($conn, "SELECT * FROM carrinho");
            $carts = array();
            if ($request->num_rows > 0) {
                $carts = $request->fetch_all(MYSQLI_ASSOC);
            }
            mysqli_close($conn);
            return $carts;
        }


        public static function delete_item($usuario_id, $flor_id) {
            $conn = connect();
            mysqli_query($conn, "DELETE FROM carrinho WHERE usuario_id='$usuario_id' AND flor_id='$flor_id'");
            mysqli_close($conn);
        }
        
        public static function delete_all($usuario_id) {
            $conn = connect();
            mysqli_query($conn, "DELETE FROM carrinho WHERE usuario_id='$usuario_id'");
            mysqli_close($conn);
        }
    }
?>