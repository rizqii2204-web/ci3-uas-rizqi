<?php
class sales_model extends CI_Model {

public function get_all()
{
    return $this->db->get('sales')->result();
}

public function get_by_id($id)
{
    return $this->db->get_where('sales', ['id' => $id])->row();
}

public function insert($data)
{
    return $this->db->insert('sales', $data);
}

public function update($id, $data)
{
    $this->db->where('id', $id);
    return $this->db->update('sales', $data);
}

public function delete($id)
{
    return $this->db->delete('sales', ['id' => $id]);
}

public function get_orders_by_user($user_id)
{
    $this->db->select('
        orders.*,
        pelanggan.nama AS nama_pelanggan,
        users.username AS nama_sales
    ');
    $this->db->from('orders');

    $this->db->join('pelanggan', 'pelanggan.id = orders.id_pelanggan');

    $this->db->join('users', 'users.id = orders.user_id');
    $this->db->where('orders.user_id', $user_id);

    return $this->db->get()->result();
}


}