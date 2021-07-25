<?php

class NotificationModel extends CI_Model
{
    private $_table = "notification";

    public function get()
    {
    	return $this->db->get($this->_table);
    }

    public function getNotRead($user_id)
    {
        $this->db->where('is_read', 0);
        return $this->db->get($this->_table);
    }

    public function count($user_id)
    {
        return $this->db->query("
        SELECT 
            COUNT(*) as total from notification
            WHERE is_read = 0
        ")->row();
    }

    public function insert($data)
    {
        return $this->db->insert($this->_table, $data);
    }

    public function getById($id)
    {
        $this->db->where('id', $id);
        return $this->db->get($this->_table);
    }      

    public function update($data, $user_id, $inbox_id)
    {        
        $this->db->where('inbox_id', $inbox_id);
        return $this->db->update($this->_table, $data);
    }    

    public function destroy($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete($this->_table);
    } 
}