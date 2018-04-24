<?php

class Speaker {
    public function __construct($speaker_id) {
        global $db;

        $db->where('speaker_id', (int)$speaker_id);
        $result = $db->getOne('speakers');

        if(count($result) == 0) throw new Exception('Speaker doesn\'t exists with ID: '.(int)$speaker_id);

        $this->id = $result['speaker_id'];
        $this->firstname = $result['speaker_firstname'];
        $this->lastname = $result['speaker_lastname'];
        $this->fullname = $this->firstname.' '.$this->lastname;
    }

    public function update() {
        global $db;

        $data = [
            'speaker_firstname' => $db->escape(htmlspecialchars($this->firstname)),
            'speaker_lastname' => $db->escape(htmlspecialchars($this->lastname))
        ];

        $db->where('speaker_id', $this->id);
        return $db->update('speakers', $data);
    }

    public static function add($firstname, $lastname) {
        global $db;

        $data = [
            'speaker_firstname' => $db->escape(htmlspecialchars($firstname)),
            'speaker_lastname' => $db->escape(htmlspecialchars($lastname))
        ];

        return $db->insert('speakers', $data);
    }
    public function remove() {
        global $db;

        $data = ['deleted' => true];
        $db->where('speaker_id', $this->id);

        return $db->update('speakers', $data);
    }

    public static function get_speakers() {
        global $db;

        $db->where('deleted', false);
        $result = $db->get('speakers', null, 'speaker_id');
        $speakers = [];
        foreach ($result as $speaker) {
            $speakers[] = new Speaker($speaker['speaker_id']);
        }

        return $speakers;
    }
}