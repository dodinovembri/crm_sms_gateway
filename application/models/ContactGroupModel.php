<?php

class ContactGroupModel extends CI_Model
{
    private $_table = "contact_group";

    public function get()
    {
    	return $this->db->get($this->_table);
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
    
    public function getByWhere($id)
    {
        $this->db->where('group_id', $id);
        return $this->db->get($this->_table);
    }

    public function getByWhereWithJoin($id)
    {
        $this->db->select('*');
        $this->db->from('contact_group');
        $this->db->join('contact', 'contact.id = contact_group.contact_id');
        $this->db->where('group_id', $id);
        return $this->db->get();
    }

    public function update($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->_table, $data);
    }    

    public function destroy($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete($this->_table);
    } 
}