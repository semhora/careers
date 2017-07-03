<?php

class EventoDAO extends DB {

    public function insert(Evento $e) {
        $sql = 'INSERT eventos(nome, descricao, local, hora_inicio, imagem, status)
                VALUES ("' . $e->getNome() . '","' . $e->getDescricao() . '","' . $e->getLocal() . '","' . $e->getHoraInicio() . '","' . $e->getImagem() . '",' . $e->getStatus() . ')';

        if ($this->execSQL($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function update(Evento $e) {
        $sql = 'UPDATE eventos SET '
                . 'nome = "' . $e->getNome() . '", '
                . 'descricao = " ' . $e->getDescricao() . '", '
                . 'local = "' . $e->getLocal() . '",'
                . ' hora_inicio = "' . $e->getHoraInicio() . '",';

        $sql .= ($e->getImagem() != '') ? 'imagem = "' . $e->getImagem() . '", ' : null;
        $sql .= 'status = ' . $e->getStatus() . ' WHERE id = ' . $e->getId();

        if ($this->execSQL($sql)) {
            return true;
        } else {
            return false;
        }
    }


    public function getById($id) {
        $sql = 'SELECT * FROM eventos WHERE id = ' . addslashes($id);

        $query = $this->execReader($sql);

        $e = new Evento();

        while ($row = $query->fetch_array(MYSQLI_ASSOC)) {

            $e->setId($row['id']);
            $e->setNome($row['nome']);
            $e->setDescricao($row['descricao']);
            $e->setLocal($row['local']);
            $e->setHoraInicio($row['hora_inicio']);
            $e->setImagem($row['imagem']);
            $e->setStatus($row['status']);
        }

        return $e;
    }

    public function getAll($status) {
        $sql = 'SELECT * FROM eventos WHERE status = ' . addslashes($status);

        $query = $this->execReader($sql);

        return $query;
    }

}

?>