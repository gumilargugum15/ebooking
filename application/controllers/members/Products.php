<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("product_model");
        $this->load->model("booking_model");
        $this->load->library('form_validation');
        $this->load->library(array('ion_auth', 'form_validation'));
		$this->lang->load('auth');
    }

    public function index()
    {
        if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		else
		{
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			//list the users
			$this->data['users'] = $this->ion_auth->users()->result();
			foreach ($this->data['users'] as $k => $user)
			{
				$this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			}
			$data["products"] = $this->product_model->getAll();
            $this->load->view("members/product/list", $data);
			
			

		}
        
    }


    public function add()
    {
        $product = $this->product_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/product/new_form");
    }

    public function detail($id = null)
    {
        if (!isset($id)) redirect('members/products');
       
        $product = $this->product_model;
        
        $data["product"] = $product->getById($id);
        if (!$data["product"]) show_404();
        
        $this->load->view("members/product/detail", $data);
    }
    public function booking($id = null){
        if (!isset($id)) redirect('members/products');
        $user = $this->ion_auth->user()->row();
        $username = $user->username;

        $booking = $this->booking_model;
        $booking->booking($id);
        $data = [];
        $data['cart'] = $booking->getcart($username)->result();
        //print_r($data['cart']);
        //die();
        $this->load->view("members/booking/list", $data);


    }

    public function deletebooking($id=null,$bookid = null)
    {
        // echo $id."/".$bookid;
        // die();
        if (!isset($id)) show_404();
        
        if ( $booking = $this->booking_model->deletebooking($id,$bookid)) {
            $booking = $this->booking_model;
            $user = $this->ion_auth->user()->row();
            $username = $user->username;
            $data['cart'] = $booking->getcart($username)->result();
            $this->load->view("members/booking/list", $data);
        }
    }
    public function updatebooking()
    {
        $qty = $this->input->post('qty');
        $id  = $this->input->post('produkid');
        $bookid  = $this->input->post('bookid');
        //echo $qty."-".$id."-".$bookid;
        //die();
        if (!isset($id)) show_404();
        
        if ( $booking = $this->booking_model->updatebooking($qty,$id,$bookid)) {
            $booking = $this->booking_model;
            $user = $this->ion_auth->user()->row();
            $username = $user->username;
            $data['cart'] = $booking->getcart($username)->result();
            $this->load->view("members/booking/list", $data);
        }
    }
}