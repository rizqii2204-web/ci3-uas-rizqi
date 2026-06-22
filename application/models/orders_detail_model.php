<?php
class orders_detail_model extends CI_Model {

    public function get_by_order($id_order)
    {
        $this->db->select('order_detail.*, produk.nama_produk');
        $this->db->from('order_detail');
        $this->db->join('produk', 'produk.id = order_detail.id_produk');
        $this->db->where('id_order', $id_order);

        return $this->db->get()->result();
    }

    public function insert($data)
    {
        return $this->db->insert('order_detail', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('order_detail', ['id' => $id]);
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('order_detail', ['id' => $id])->row();
    }
    
    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('order_detail', $data);
    }

}