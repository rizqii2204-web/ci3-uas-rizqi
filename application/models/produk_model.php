<?php
class produk_model extends CI_Model {

public function get_all()
{
    return $this->db->get('produk')->result();
}

public function insert($data)
{
    return $this->db->insert('produk', $data);
}

public function get_by_id($id)
{
    return $this->db->get_where('produk', ['id' => $id])->row();
}

public function update($id, $data)
{
    return $this->db->where('id', $id)->update('produk', $data);
}

public function delete($id)
{
    return $this->db->delete('produk', ['id' => $id]);
}
}