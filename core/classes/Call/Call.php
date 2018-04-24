<?php

class Call {
    public function __construct($call_id) {
        global $db;

        $db->where('call_id', (int)$call_id);

        $result = $db->getOne('calls');
        if(count($result) == 0) throw new Exception('Call doesn\'t exists with ID: '.(int)$call_id);

        $this->id = $result['call_id'];
        $this->date = new DateTime($result['call_date']);
        $this->callback_date = new DateTime($result['callback_date']);
        $this->agent = new User($result['agent']);

        $this->spoke = new stdClass();
        $this->spoke->id = null;
        $this->spoke->fullname = '';
        if($result['spoke'] != null) {
            $this->spoke = new Speaker($result['spoke']);
        }

        $this->call_id = $result['id'];
        $this->country = $result['country'];
        $this->note = $result['note'];
        $this->date_added = new DateTime($result['date_added']);
        $this->date_updated = new DateTime($result['date_updated']);
    }

    public static function add($date, $callback_date, $agent, $speaker, $id, $country, $note) {
        global $db;

        $data = [
            'call_date' => $date->format('Y-m-d H:i:s'),
            'callback_date' => $callback_date->format('Y-m-d H:i:s'),
            'agent' => $agent->id,
            'spoke' => $speaker->id,
            'id' => (int)$id,
            'country' => $db->escape(htmlspecialchars($country)),
            'note' => $db->escape(htmlspecialchars($note))
        ];

        return $db->insert('calls', $data);
    }
    public function update() {
        global $db;

        $data = [
            'call_date' => $this->date->format('Y-m-d H:i:s'),
            'callback_date' => $this->callback_date->format('Y-m-d H:i:s'),
            'agent' => $this->agent->id,
            'spoke' => $this->spoke->id,
            'id' => (int)$this->id,
            'country' => $db->escape(htmlspecialchars($this->country)),
            'note' => htmlspecialchars($this->note)
        ];
        $db->where('call_id', $this->id);
        return $db->update('calls', $data);
    }
    public function remove() {
        global $db;

        $data = ['deleted' => true];
        $db->where('call_id', $this->id);

        return $db->update('calls', $data);
    }

    public static function get_calls($date_range, $args = []) {
        global $db;

        $db->where('call_date', $date_range, 'BETWEEN');
        $db->where('deleted', false);
        foreach ($args as $key => $value) {
            $db->where($key, $db->escape(htmlspecialchars($value)));
        }

        $result = $db->get('calls', null, 'call_id');
        $calls = [];
        foreach ($result as $call) {
            $calls[] = new Call($call['call_id']);
        }

        return $calls;
    }
}