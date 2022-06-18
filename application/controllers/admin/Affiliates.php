<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Affiliates extends CI_Controller
{
    
    public $tbl_name = "affiliates";
    public $tbl_affiliates_cards = "affiliates_cards";
    public $tbl_affiliates_shippings = "affiliates_shippings";
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('master_model');
    }
    
    public function index()
    {
        $data['records'] = getDataRecords($this->tbl_name, array(), 0, '', "DESC");
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/affiliates/list', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }
    
    public function add()
    {
        $admin_id       = $this->session->userdata('admin_id');
        $post_data      = $this->input->post();
        $data           = array();
        if (!empty($post_data))
        { 
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
            $this->form_validation->set_rules('name', 'name', 'required');
            $this->form_validation->set_rules('identification_number', 'identification number', 'required');
            $this->form_validation->set_rules('contact_number', 'contact number', 'required');
            $this->form_validation->set_rules('email_id', 'email id', 'required');
            if ($this->form_validation->run() != FALSE)
            { 
                $config = array(
                    'table' => $this->tbl_name,
                    'id' => 'id',
                    'field' => 'slug',
                    'title' => 'title',
                    'replacement' => 'dash' // Either dash or underscore
                );
                $this->slug->set_config($config);
                $data = array(
                    'title' => $this->input->post('name'),
                );
                $slug = $this->slug->create_uri($data);   
                
                
                $dataArr['name'] = $post_data['name'];
                $dataArr['slug'] = $slug;
                $dataArr['identification_number'] = $post_data['identification_number'];
                $dataArr['contact_number'] = $post_data['contact_number'];
                $dataArr['email_id'] = $post_data['email_id'];
                $dataArr['address1'] = $post_data['address1'];
                $dataArr['address2'] = $post_data['address2'];
                $dataArr['city'] = $post_data['city'];
                $dataArr['state'] = $post_data['state'];
                $dataArr['country'] = $post_data['country'];
                $dataArr['pincode'] = $post_data['pincode'];
                $dataArr['status'] = 1;
                
                $card_selected = $post_data['card_selected'];
                $offer_price = $post_data['offer_price'];
                $shipment_selected = $post_data['shipment_selected'];
                $shipping_price = $post_data['shipping_price'];
                
                //pre($shipping_price); die();
                $insert_id = setInsertData($this->tbl_name, $dataArr);
                if ($insert_id > 0)
                {
                    if (!empty($_FILES["partner_logo"]["name"]))
                    {
                        $partner_logo      = do_upload('affiliates','partner_logo');
                        $data_partner_logo = array('partner_logo' => $partner_logo);
                        setUpdateData($this->tbl_name, $data_partner_logo, $insert_id);
                    }
                    
                    if(!empty($card_selected))
                    {
                        foreach($card_selected as $card_id)
                        {
                            $dataCardArr['affiliate_id'] = $insert_id;
                            $dataCardArr['card_id'] = $card_id;
                            $dataCardArr['offer_price'] = $offer_price[$card_id];
                            setInsertData($this->tbl_affiliates_cards, $dataCardArr);
                        }
                    }
                    
                    if(!empty($shipment_selected))
                    {
                        foreach($shipment_selected as $card_type)
                        {
                            $dataShippingArr['affiliate_id'] = $insert_id;
                            $dataShippingArr['shipping_type'] = $card_type;
                            $dataShippingArr['price'] = (!empty($card_type) && $card_type=='delivery')?$shipping_price[$card_type]:0;
                            setInsertData($this->tbl_affiliates_shippings, $dataShippingArr);
                        }
                    }
                    
                    $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been added successfully !!'));
                    redirect('admin/affiliates', 'refresh');
                }
            }
        }
        $data['cards'] = get_records('tbl_products', array('status' => 1));
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/affiliates/add', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }
    
    public function edit()
    {
        $post_data      = $this->input->post();
        $edit_id        = $this->uri->segment(4);
        if (!empty($post_data))
        {
            $this->form_validation->set_rules('name', 'name', 'required');
            $this->form_validation->set_rules('identification_number', 'identification number', 'required');
            $this->form_validation->set_rules('contact_number', 'contact number', 'required');
            $this->form_validation->set_rules('email_id', 'email id', 'required');
            if ($this->form_validation->run() != FALSE)
            {
                $config = array(
                    'table' => $this->tbl_name,
                    'id' => 'id',
                    'field' => 'slug',
                    'title' => 'title',
                    'replacement' => 'dash' // Either dash or underscore
                );
                $this->slug->set_config($config);
                $data = array(
                    'title' => $this->input->post('name'),
                );
                $slug = $this->slug->create_uri($data,$edit_id);
                $dataArr['name'] = $post_data['name'];
                $dataArr['slug'] = $slug;
                $dataArr['identification_number'] = $post_data['identification_number'];
                $dataArr['contact_number'] = $post_data['contact_number'];
                $dataArr['email_id'] = $post_data['email_id'];
                $dataArr['address1'] = $post_data['address1'];
                $dataArr['address2'] = $post_data['address2'];
                $dataArr['city'] = $post_data['city'];
                $dataArr['state'] = $post_data['state'];
                $dataArr['country'] = $post_data['country'];
                $dataArr['pincode'] = $post_data['pincode'];
                
                $card_selected = $post_data['card_selected'];
                $offer_price = $post_data['offer_price'];
                $shipment_selected = $post_data['shipment_selected'];
                $shipping_price = $post_data['shipping_price'];
                
                if (!empty($_FILES["partner_logo"]["name"]))
                {
                    $partner_logo      = do_upload('affiliates','partner_logo');
                    $dataArr['partner_logo'] = $partner_logo;
                }
                
                //pre($shipping_price); die();
                setUpdateData($this->tbl_name, $dataArr,$edit_id);
                if(!empty($card_selected))
                {
                    deleteRecords($this->tbl_affiliates_cards,array('affiliate_id'=>$edit_id));
                    foreach($card_selected as $card_id)
                    {
                        $dataCardArr['affiliate_id'] = $edit_id;
                        $dataCardArr['card_id'] = $card_id;
                        $dataCardArr['offer_price'] = $offer_price[$card_id];
                        setInsertData($this->tbl_affiliates_cards, $dataCardArr);
                    }
                }
                
                if(!empty($shipment_selected))
                {
                    deleteRecords($this->tbl_affiliates_shippings,array('affiliate_id'=>$edit_id));
                    foreach($shipment_selected as $card_type)
                    {
                        $dataShippingArr['affiliate_id'] = $edit_id;
                        $dataShippingArr['shipping_type'] = $card_type;
                        $dataShippingArr['price'] = (!empty($card_type) && $card_type=='delivery')?$shipping_price[$card_type]:0;
                        setInsertData($this->tbl_affiliates_shippings, $dataShippingArr);
                    }
                }
                
                $this->session->set_flashdata('notification', array('error' => 0,'message' => 'Record has been updated successfully !!'));
                redirect(current_url(), 'refresh');
            }
        }
        $data['editdata'] = getDataRecord($this->tbl_name, array('id' => $edit_id));
        $data['cards'] = get_records('tbl_products', array('status' => 1));
        $affiliates_cards = get_records($this->tbl_affiliates_cards, array('affiliate_id' => $edit_id));
        $affiliates_shipping = get_records($this->tbl_affiliates_shippings, array('affiliate_id' => $edit_id));
        
        $affCardArr = array();
        if(!empty($affiliates_cards))
        {
            foreach($affiliates_cards as $row)
            {
                $affCardArr[$row->card_id] = $row->offer_price;
            }
        }
        $data['affiliates_cards'] = $affCardArr;
        
        $affShippingArr = array();
        if(!empty($affiliates_cards))
        {
            foreach($affiliates_shipping as $row)
            {
                $affShippingArr[$row->shipping_type] = $row->price;
            }
        }
        $data['affiliates_shipping'] = $affShippingArr;
        
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/main-header');
        $this->load->view('admin/include/main-sidebar', $data);
        $this->load->view('admin/affiliates/edit', $data);
        $this->load->view('admin/include/main-footer');
        $this->load->view('admin/include/footer');
    }
    
    public function delete()
    {
        CheckLoginSession();
        $id = $this->uri->segment(4);
        setDeleteData($this->tbl_name, $id);
        
        deleteRecords($this->tbl_affiliates_cards,array('affiliate_id'=>$id));
        deleteRecords($this->tbl_affiliates_shippings,array('affiliate_id'=>$id));
        $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Record has been delete successfully !!'));
        redirect('admin/affiliates', 'refresh');
    }
    
    public function status()
    {
        $id             = $this->uri->segment(4);
        $statusId       = getStatusById($this->tbl_name, $id);
        $data['status'] = (empty($statusId) || $statusId == 0) ? 1 : 0;
        $rec_id         = setUpdateData($this->tbl_name, $data, $id);
        $this->session->set_flashdata('notification', array('error' => 0, 'message' => 'Status has been updated successfully !!'));
        redirect('admin/affiliates', 'refresh');
    }
}