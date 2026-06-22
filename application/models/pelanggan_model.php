<?php
class pelanggan_model extends CI_Model {

public function get_all()
{
    return $this->db->get('pelanggan')->result();
}

public function insert($data)
{
    return $this->db->insert('pelanggan', $data);
}

public function get_by_id($id)
{
    return $this->db->get_where('pelanggan', ['id' => $id])->row();
}

public function update($id, $data)
{
    return $this->db->where('id', $id)->update('pelanggan', $data);
}

public function delete($id)
{
    return $this->db->delete('pelanggan', ['id' => $id]);
}
}