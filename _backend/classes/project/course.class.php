<?php

class Course {

    public $id = 0;
    public $db = null;
    public static $last = null;
    public $name = 'Kurs';
    public $inserted = '01.01.2000';
    public $updated = '01.01.2000';
    public $deleted = '01.01.2000';
    public $is_deleted = false;
    public $_CACHE = array('times' => null);

    public function __construct($id) {
        $id = Validate::strict_int($id);
        if ($id > 0) {
            $this->id = $id;
            $this->db = Xjsondb::select_first('courses', $this->id);
            $this->name = trim(isset($this->db['name']) && is_string($this->db['name']) ? $this->db['name'] : 'Kurs');
            $this->inserted = date('H:i d.m.Y', $this->db['insert_date']);
            $this->updated = date('H:i d.m.Y', $this->db['update_date']);
            $this->deleted = date('H:i d.m.Y', $this->db['delete_date']);
            $this->is_deleted = is_numeric($this->db['delete_date']);
            self::$last = $this;
        }
    }

    public function times() {
        if (!is_array($this->_CACHE['times']) || empty($this->_CACHE['times'])) {
            $times = isset($this->db['times']) && is_array($this->db['times']) ? $this->db['times'] : array();
            $times_sorted = array();
            usort($times, 'times_sort');
            foreach ($times as $time) {
                $day = $time['day'];
                if (!isset($times_sorted[$day])) {
                    $times_sorted[$day] = array();
                }
                array_push($times_sorted[$day], $time);
            }
            $this->_CACHE['times'] = $times_sorted;
        }
        return $this->_CACHE['times'];
    }

    public function times_formatted() {
        $html = '<div class="course_times">';
        foreach ($this->times() as $time_day => $time_spans) {
            $html .= '<div class="course_times_row">';
            $html .= '<div class="course_times_day">' . $time_day . '</div>';
            foreach ($time_spans as $time) {
                $html .= '<div class="course_times_span">' . $time['time'] . '</div>';
            }
            $html .= '</div>';
        }
        $html .= '<div class="course_times">';
        return $html;
    }

}

function times_sort($a, $b) {
    return $a['order'] - $b['order'];
}
