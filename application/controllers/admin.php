<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
        
        if ($this->session->userdata('role') != 'admin') {
            redirect('auth');
        }
    }

    public function index() {
        $this->dashboard();
    }

    public function dashboard()
    {
        $data['title'] = 'Dashboard Admin';
        #$data['total_produk'] = 10;
        #$data['total_pelanggan'] = 5;
        #$data['total_orders'] = 12;

        $data['total_produk'] = $this->db->count_all('produk');
        $data['total_pelanggan'] = $this->db->count_all('pelanggan');
        $data['total_orders'] = $this->db->count_all('orders');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');        
        $this->load->view('admin/dashboard', $data);        
        $this->load->view('templates/footer');
    }

    // ================= PRODUK =================

    public function produk()
    {
        $this->load->model('produk_model');

        $data['title'] = 'Data Produk';
        $data['produk'] = $this->produk_model->get_all();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/produk/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_produk()
    {
        $this->load->model('produk_model');

        if ($this->input->post()) {
            $data = [
                'kode_produk' => $this->input->post('kode_produk'),
                'nama_produk' => $this->input->post('nama_produk'),
                'harga' => $this->input->post('harga'),
                'stok' => $this->input->post('stok'),
            ];

            $this->produk_model->insert($data);
            redirect('admin/produk');
        }

        $data['title'] = 'Tambah Produk';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/produk/tambah', $data);
        $this->load->view('templates/footer');
    }

    public function edit_produk($id)
    {
        $this->load->model('produk_model');

        if ($this->input->post()) {
            $data = [
                'kode_produk' => $this->input->post('kode_produk'),
                'nama_produk' => $this->input->post('nama_produk'),
                'harga' => $this->input->post('harga'),
                'stok' => $this->input->post('stok'),
            ];

            $this->produk_model->update($id, $data);
            redirect('admin/produk');
        }

        $data['title'] = 'Edit Produk';
        $data['produk'] = $this->produk_model->get_by_id($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/produk/edit', $data);
        $this->load->view('templates/footer');
    }

    public function hapus_produk($id)
    {
        $this->load->model('produk_model');
        $this->produk_model->delete($id);

        redirect('admin/produk');
    }

    // ================= PELANGGAN =================

    public function pelanggan()
    {
        $this->load->model('pelanggan_model');

        $data['title'] = 'Data Pelanggan';
        $data['pelanggan'] = $this->pelanggan_model->get_all();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/pelanggan/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_pelanggan()
    {
        $this->load->model('pelanggan_model');

        if ($this->input->post()) {

            $nama = $this->input->post('nama');
        
            if (empty($nama)) {
                echo "Nama tidak boleh kosong";
                return;
            }
        
            $data = [
                'nama' => $nama,
                'alamat' => $this->input->post('alamat'),
                'telepon' => $this->input->post('telepon'),
            ];
        
            $this->pelanggan_model->insert($data);
            redirect('admin/pelanggan');
        }

        $data['title'] = 'Tambah Pelanggan';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/pelanggan/tambah', $data);
        $this->load->view('templates/footer');
    }

    public function edit_pelanggan($id)
    {
        $this->load->model('pelanggan_model');

        if ($this->input->post()) {
            $data = [
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'telepon' => $this->input->post('telepon'),
            ];

            $this->pelanggan_model->update($id, $data);
            redirect('admin/pelanggan');
        }

        $data['title'] = 'Edit Pelanggan';
        $data['pelanggan'] = $this->pelanggan_model->get_by_id($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/pelanggan/edit', $data);
        $this->load->view('templates/footer');
    }

    public function hapus_pelanggan($id)
    {
        $this->load->model('pelanggan_model');
        $this->pelanggan_model->delete($id);

        redirect('admin/pelanggan');
    }

    // ================= ORDERS =================

    public function orders()
    {
        $this->load->model('orders_model');

        $data['title'] = 'Data Orders';
        $data['orders'] = $this->orders_model->get_all();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/orders/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_orders()
    {
        $this->load->model('orders_model');
        $this->load->model('pelanggan_model');
        $this->load->model('produk_model');
        $data['produk'] = $this->produk_model->get_all();
        $this->load->model('sales_model');
        $data['sales'] = $this->sales_model->get_all(); // filter role sales

        $data['title'] = 'Tambah Orders';
        $data['pelanggan'] = $this->pelanggan_model->get_all();

        if ($this->input->post()) {

            $data_insert = [
                'id_pelanggan' => $this->input->post('id_pelanggan'),
                'tanggal' => $this->input->post('tanggal'),
                'status' => $this->input->post('status'),
                'total' => 0,
                'id_sales' => $this->input->post('id_sales')
            ];
        
            // ambil id order terakhir
            $id_order = $this->orders_model->insert($data_insert);
        
            // ambil input detail
            $id_produk = $this->input->post('id_produk');
            $jumlah = $this->input->post('jumlah');
        
            if ($id_produk && $jumlah) {
                $this->load->model('produk_model');
                $this->load->model('orders_detail_model');
        
                $produk = $this->produk_model->get_by_id($id_produk);
        
                $data_detail = [
                    'id_order' => $id_order,
                    'id_produk' => $id_produk,
                    'jumlah' => $jumlah,
                    'harga' => $produk->harga,
                    'subtotal' => $produk->harga * $jumlah
                ];
        
                $this->orders_detail_model->insert($data_detail);
        
                // update total
                $this->orders_model->update_total($id_order);
            }
        
            redirect('admin/orders');
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/orders/tambah', $data);
        $this->load->view('templates/footer');
    }

    public function edit_orders($id)
    {
        $this->load->model('orders_model');
        $this->load->model('pelanggan_model');
    
        $data['title'] = 'Edit Orders';
        $data['orders'] = $this->orders_model->get_by_id($id);
        $data['pelanggan'] = $this->pelanggan_model->get_all();
    
        if ($this->input->post()) {
    

            $order_lama = $this->orders_model->get_by_id($id);
    
            $data_update = [
                'id_pelanggan' => $this->input->post('id_pelanggan'),
                'status' => $this->input->post('status')
            
            ];
    
            $this->orders_model->update($id, $data_update);
            redirect('admin/orders');
        }
    
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/orders/edit', $data);
        $this->load->view('templates/footer');
    }
    
    public function detail_orders($id)
    {
        $this->load->model('orders_model');
        $this->load->model('orders_detail_model');
        $this->load->model('produk_model');
    
        $data['title'] = 'Detail Orders';
        $data['orders'] = $this->orders_model->get_by_id($id);
    
        $data['detail'] = $this->orders_detail_model->get_by_order($id);
    
        $data['produk'] = $this->produk_model->get_all();
    
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/orders/detail', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_detail($id_order)
    {
        $this->load->model('orders_detail_model');
        $this->load->model('produk_model');
        $this->load->model('orders_model');
    
        $id_produk = $this->input->post('id_produk');
        $jumlah = $this->input->post('jumlah');
    
        // ambil harga produk
        $produk = $this->produk_model->get_by_id($id_produk);
    
        $harga = $produk->harga;
        $subtotal = $harga * $jumlah;
    
        // insert ke detail
        $data = [
            'id_order' => $id_order,
            'id_produk' => $id_produk,
            'jumlah' => $jumlah,
            'harga' => $harga,
            'subtotal' => $subtotal
        ];
    
        $this->orders_detail_model->insert($data);
    
        // UPDATE TOTAL OTOMATIS
        $this->update_total($id_order);
    
        redirect('admin/detail_orders/'.$id_order);
    }

    public function update_total($id_order)
    {
        $this->load->model('orders_detail_model');
        $this->load->model('orders_model');
    
        $detail = $this->orders_detail_model->get_by_order($id_order);
    
        $total = 0;
        foreach ($detail as $d) {
            $total += $d->subtotal;
        }
    
        $this->orders_model->update($id_order, [
            'total' => $total
        ]);
    }

    public function batalkan_order($id)
    {
        $this->load->model('orders_model');

        $this->orders_model->update($id, [
            'status' => 'dibatalkan'
        ]);

        redirect('admin/orders');
    }

    public function update_detail($id, $id_order)
    {
        $this->load->model('orders_detail_model');
        $this->load->model('orders_model');
    
        $jumlah = $this->input->post('jumlah');
    
        $detail = $this->orders_detail_model->get_by_id($id);
    
        $subtotal = $detail->harga * $jumlah;
    
        $this->orders_detail_model->update($id, [
            'jumlah' => $jumlah,
            'subtotal' => $subtotal
        ]);
    
        $this->orders_model->update_total($id_order);
    
        redirect('admin/detail_orders/'.$id_order);
    }

    public function hapus_detail($id, $id_order)
    {
        $this->load->model('orders_detail_model');
        $this->load->model('orders_model');
    
        $this->orders_detail_model->delete($id);
    
        $this->orders_model->update_total($id_order);
    
        redirect('admin/detail_orders/'.$id_order);
    }

}