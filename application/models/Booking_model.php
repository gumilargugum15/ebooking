<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Booking_model extends CI_Model
{
    private $_table1 = "booking_h";
    private $_table2 = "booking_d";
    private $_table3 = "products";

    public $booking_id;
    public $tgl_booking;
    public $checkout;
    public $tgl_checkout;
    public $members;

    public function getbookingbychek($username)
    {
        return $this->db->get_where($this->_table1, ["checkout" =>0,"members"=>$username]);
    }
    public function getproductbyid($id){
        return $this->db->get_where($this->_table3, ["product_id" =>$id]);
    }
    public function getbook_d($id,$bookid){
        return $this->db->get_where($this->_table2, ["product_id" =>$id,"booking_id"=>$bookid]);
    }
    public function getcart($username){
        $this->db->select('booking_h.*,booking_d.product_id,booking_d.name,booking_d.price,booking_d.qty,products.image');
        $this->db->from('booking_h');
        $this->db->join('booking_d', 'booking_d.booking_id = booking_h.booking_id','right');
        $this->db->join('products','products.product_id=booking_d.product_id');
        $this->db->where(["checkout"=>0,"members"=>$username]);
        $query = $this->db->get();
        
        return $query;
    }
    public function booking($id){
        $user = $this->ion_auth->user()->row();
        $username = $user->username;
        
        //print_r($getbooking);
        //die();
        $cekrow = $this->getbookingbychek($username)->num_rows();
        if($cekrow == 0){
            //insert to header booking
            $bookingid = uniqid();
            $this->booking_id =  $bookingid;
            $this->tgl_booking = date("Y-m-d H:i:s");
            $this->checkout = 0;
            $this->members = $username;
        
            if($this->db->insert($this->_table1, $this)){
                //insert to detail booking
            $product = $this->getproductbyid($id)->row();
            $data = ["booking_id"=>$bookingid,
                     "product_id"=>$id,
                     "name"=>$product->name,
                     "price"=>$product->price,
                     "qty"  =>1,
                     "tgl_booking"=> date("Y-m-d H:i:s")];
            $this->db->insert($this->_table2, $data);
            }
            
        }else{
            $getbooking = $this->getbookingbychek($username)->row();
            $bookid = $getbooking->booking_id;
            $cekbook_d = $this->getbook_d($id,$bookid)->num_rows();
            //echo $cekbook_d;
            //die();
            if($cekbook_d > 0){
                $book_d = $this->getbook_d($id,$bookid)->row();
                $qty = $book_d->qty;
                $newqty = $qty+1;
                $data = ["qty"=>$newqty,"tgl_booking"=>date("Y-m-d H:i:s")];
                $this->db->update($this->_table2, $data, ["product_id" =>$id,"booking_id"=>$bookid]);

            }else{
                $product = $this->getproductbyid($id)->row();
                $data = ["booking_id"=>$bookid,
                        "product_id"=>$id,
                        "name"=>$product->name,
                        "price"=>$product->price,
                        "qty"  =>1,
                        "tgl_booking"=> date("Y-m-d H:i:s")];
                $this->db->insert($this->_table2, $data);
            }
        }
      
    }
    public function deletebooking($id,$bookid){
        return $this->db->delete($this->_table2, array("product_id" => $id,"booking_id"=>$bookid));
    }
    public function updatebooking($qty,$id,$bookid){
        $data = ["qty"=>$qty];
        return $this->db->update($this->_table2, $data, ["product_id" =>$id,"booking_id"=>$bookid]);

    }

}