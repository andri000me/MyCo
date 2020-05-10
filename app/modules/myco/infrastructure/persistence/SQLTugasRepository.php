<?php
namespace Index\Modules\MyCo\Infrastructure\Persistence;

use Index\Modules\MyCo\Domain\Model\Tugas;
use Index\Modules\MyCo\Domain\Repository\TugasRepository;
use Phalcon\Db\Adapter\Pdo\Mysql;
use PDO;

class SqlTugasRepository implements TugasRepository
{

    private $db;

    public function __construct(Mysql $db)
    {
        $this->db = $db;
    }
    public function save(Tugas $tugas){
        return "simpan tugas";
    }
    
    public function getAll(){
        $statement = sprintf("SELECT p.nama as nama_pegawai,p.id as id_pegawai,t.tugas as nama_tugas, t.id as id_tugas,t.tenggat_waktu,st.status FROM penugasan pn 
        INNER JOIN tugas t ON pn.tugas = t.id 
        INNER JOIN pegawai p ON pn.pegawai = p.id
        INNER JOIN status_tugas st ON t.status = st.id");

        return $this->db->query($statement)
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete(Tugas $tugas){
        return "delete tugas";
    }

    public function edit(Tugas $tugas){
        return "edit tugas";
    }

}