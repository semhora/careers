<?php

class UsuarioDAO extends DB {

    public function insert(Usuario $u) {

        $sql = 'INSERT usuarios(nome, email, senha, status)  VALUES ("' . $u->getNome() . '","' . $u->getEmail() . '","' . md5($u->getSenha()) . '",' . $u->getStatus() . ')';

        if ($this->execSQL($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function update(Usuario $u) {
        $sql = 'UPDATE usuarios SET nome = "' . $u->getNome() . '", email = "' . $u->getEmail() . '", senha = "' .  md5($u->getSenha()) . '",status = ' . $u->getStatus() . ' WHERE id = ' . $u->getId();

        if ($this->execSQL($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function getById($id) {
        $sql = 'SELECT * FROM usuarios WHERE id = ' . addslashes($id);

        $query = $this->execReader($sql);

        $usuario = new Usuario();

        while ($row = $query->fetch_array(MYSQLI_ASSOC)) {

            $usuario->setId($row['id']);
            $usuario->setNome($row['nome']);
            $usuario->setEmail($row['email']);
            $usuario->setSenha($row['senha']);
            $usuario->setStatus($row['status']);
        }

        return $usuario;
    }

    public function getUser(Usuario $u) {
        $sql = 'SELECT * FROM usuarios WHERE email = "' . $u->getEmail() . '" AND senha = "' .  md5($u->getSenha()) . '" AND status = 1';

        $query = $this->execReader($sql);
        
        while ($row = $query->fetch_array(MYSQLI_ASSOC)) {

            $u->setId($row['id']);
            $u->setNome($row['nome']);
            $u->setEmail($row['email']);
            $u->setSenha($row['senha']);
            $u->setStatus($row['status']);
        }

        return $u;
    }

    public function getAll($status) {
        $sql = 'SELECT * FROM usuarios WHERE status = ' . addslashes($status);

        $query = $this->execReader($sql);

        return $query;
    }

}

?>