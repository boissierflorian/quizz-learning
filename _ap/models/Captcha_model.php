<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Captcha_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function insert($captcha)
    {
        $data = array(
            'captcha_time' => $captcha['time'],
            'ip_address' => $captcha['ip_address'],
            'word' => $captcha['word']
        );
        $query = $this->db->insert_string('t_captcha', $data);
        $this->db->query($query);
    }

    public function verify($word, $ip_address)
    {
        // Delete old captchas
        $expiration = time() - 7200;
        $this->db->where('captcha_time < ', $expiration)->delete('t_captcha');

        // Verify the given captcha
        $sql = 'SELECT COUNT(*) AS count FROM t_captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?';
        $binds = array($word, $ip_address, $expiration);
        $query = $this->db->query($sql, $binds);
        $row = $query->row();

        return $row->count != 0;
    }
}