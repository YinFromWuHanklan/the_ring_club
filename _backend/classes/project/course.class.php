<?php

class Course {

    public $id = 0;
    public $db = null;
    public static $last = null;
    public $inserted = '01.01.2000';
    public $updated = '01.01.2000';
    public $deleted = '01.01.2000';
    public $is_deleted = false;

    public function __construct($id) {
        $id = Validate::strict_int($id);
        if ($id > 0) {
            $this->id = $id;
            $this->db = Xjsondb::select_first('courses', $this->id);
            $this->inserted = date('H:i d.m.Y', $this->db['insert_date']);
            $this->updated = date('H:i d.m.Y', $this->db['update_date']);
            $this->deleted = date('H:i d.m.Y', $this->db['delete_date']);
            $this->is_deleted = is_numeric($this->db['delete_date']);
            self::$last = $this;
        }
    }

}
