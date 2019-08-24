<?php

class XDB {

    public $type;
    public $engine = null;

    public static function connect_default() {
        return new self('jsondb');
    }

    public function __construct($type = null) {
        if (is_string($type)) {
            switch ($type) {
                case 'jsondb':
                case 'json':
                case 'files':
                    $this->type = 'jsondb';
                    break;
            }
            return true;
        } else {
            return null;
        }
    }

    public function init() {
        switch ($this->type) {
            case 'jsondb':
                $this->engine = Xjsondb::startup();
                break;
        }
    }

    public function add_validations($tables) {
        if (is_array($tables) && !empty($tables)) {
            foreach ($tables as $table_name => $table_validation) {
                if (is_array($table_validation) && !empty($table_validation) && !empty($table_name)) {
                    $this->add_validation($table_name, $table_validation);
                }
            }
        }
    }

    public function add_validation($table_name, $table_validation) {
        if ($this->type == 'jsondb') {
            Xjsondb::$config_connections[$table_name] = $table_validation;
        }
    }

    public function add_tables($tables) {
        if (is_array($tables) && !empty($tables)) {
            foreach ($tables as $table_name => $table_config) {
                if (is_array($table_config) && !empty($table_config) && !empty($table_name)) {
                    $this->add_table($table_name, $table_config);
                }
            }
        }
    }

    public function add_table($table_name, $table_config) {
        if ($this->type == 'jsondb') {
            Xjsondb::$config_tables[$table_name] = $table_config;
        }
    }

}
