<?php

class Customer {

    public $id = 0;
    public $db = null;
    public static $last = null;
    public $name = 'Unknown';
    public $anrede = '';
    public $inserted = '01.01.2000';
    public $updated = '01.01.2000';
    public $deleted = '01.01.2000';
    public $is_deleted = false;

    public function __construct($id) {
        $id = Validate::strict_int($id);
        if ($id > 0) {
            $this->id = $id;
            $this->db = Xjsondb::select_first('customers', $this->id);
            $this->name = $this->db['firstname'] . ' ' . $this->db['lastname'];
            $this->inserted = date('H:i d.m.Y', $this->db['insert_date']);
            $this->updated = date('H:i d.m.Y', $this->db['update_date']);
            $this->deleted = date('H:i d.m.Y', $this->db['delete_date']);
            $this->is_deleted = is_numeric($this->db['delete_date']);
            switch($this->db['gender']) {
                case 'm':
                    $this->anrede = 'Herr';
                    break;
                case 'f':
                    $this->anrede = 'Frau';
                    break;
                case 'd':
                    $this->anrede = '';
                    break;
            }
            self::$last = $this;
        }
    }

}
