<?php
namespace App\Model;

use App\Model\Model;
use Psr\Http\Message\UploadedFileInterface;

class Event extends Model
{
    public $table = "events";

    public function getAll()
    {
        return $this->find()
            ->select('*')
            ->from('events')
            ->where(['status' => 1])
            ->execute()
            ->fetchAll('assoc');
    }

    public function getById(int $id)
    {
        return $this->find()
            ->select('*')
            ->from('events')
            ->where(['id' => $id])
            ->execute()
            ->fetchAll('assoc');
    }

    public function save(array $event, UploadedFileInterface $eventFile)
    {
        $event['status'] = ($event['status'] == 'on') ? 1 : 0;
        $event['img'] = $eventFile->getClientFilename();
        $event['begin_date_time'] = $event['date'] . ' ' . $event['time'];
        unset($event['date']);
        unset($event['time']);
        $this->connection->begin();
        try {
            $this->connection->insert('events', $event);
            $this->connection->commit();
            $eventFile->moveTo(__DIR__ . '/../../webroot/img/' . $event['img']);
            return true;
        } catch (Exception $e) {
            $this->connection->rollback();
            return false;
        }
    }
}
