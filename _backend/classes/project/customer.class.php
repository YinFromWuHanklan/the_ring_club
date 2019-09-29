<?php

class Customer {

    public $id = 0;
    public $db = null;
    public static $last = null;

    public function __construct($id) {
        $id = Validate::strict_int($id);
        if ($id > 0) {
            $this->id = $id;
            $this->db = Xjsondb::select_first('customers', $this->id);

            self::$last = $this;
        }
    }

}
