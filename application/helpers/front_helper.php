<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
* site instance
* Added By Rajan Singh
*/

if (!function_exists('CI'))
{    
    function CI()
    {        
        $CI =& get_instance(); // making instance of CI        
        return $CI; // Its returning an object for CI class        
    }    
}

if (!function_exists('CheckFrontLoginSession')) {
    
    function CheckFrontLoginSession()
    {
        $login_data = CI()->session->userdata('login_data');
        if (empty($login_data)) {
            redirect('login', 'refresh');
        }
    }
}

if (!function_exists('frontUserLogin')) {
    function frontUserLogin()
    {
        $user_id = CI()->session->userdata('userID');
        if (empty($user_id)) {
            redirect('login', 'refresh');
        } else {
            return 1;
        }
    }
}


if (!function_exists('get_upcoming_events')) {
    function get_upcoming_events()
    {
        CI()->db->select('*');
        CI()->db->where('status', 1);
        CI()->db->where('starttime >=', date('Y-m-d'));
        $query    = CI()->db->get('events');
        $rowCount = $query->num_rows();
        if ($rowCount > 0) {
            $results = $query->result();
            return $results;
        } else {
            return false;
        }
    }
}

if (!function_exists('jBreadcrumb'))
{
    function jBreadcrumb()
    {
        $ci =& get_instance();
        $i    = 1;
        $uri  = $ci->uri->segment($i);
        $link = '<ol class="breadcrumb">';
        $link .= '<li><a href="' . site_url() . '">Home</a></li>';
        while ($uri != '') {
            $prep_link = '';
            for ($j = 1; $j <= $i; $j++) {
                $prep_link .= $ci->uri->segment($j) . '/';
            }
            if ($ci->uri->segment($i + 1) == '') {
                if ($ci->uri->segment(2) == "profile") {
                    $userID = base64_decode($ci->uri->segment(3));
                    if ($userID == "") {
                        $userID = CI()->session->userdata('userID');
                    }
                    $username = getUserName($userID);
                    $link .= '<li class="active"><a href="' . site_url($prep_link) . '">';
                    $link .= ucwords($username) . '</a></li> ';
                } else {
                    $link .= '<li class="active"><a href="' . site_url($prep_link) . '">';
                    $link .= ucwords(str_replace('_', ' ', str_replace('-', ' ', $ci->uri->segment($i)))) . '</a></li> ';
                }
            } else {
                $link .= '<li><a href="' . site_url($prep_link) . '">';
                $link .= ucwords(str_replace('_', ' ', str_replace('-', ' ', $ci->uri->segment($i)))) . '</a><span class="divider"></span></li> ';
            }
            
            $i++;
            $uri = $ci->uri->segment($i);
        }
        $link .= '</ol>';
        return $link;
    }
}

if (!function_exists('get_projects')) {
    function get_projects()
    {
        CI()->db->select('*');
        CI()->db->where('status', 1);
        $query    = CI()->db->get('projects');
        $rowCount = $query->num_rows();
        if ($rowCount > 0) {
            $results = $query->result();
            return $results;
        } else {
            return false;
        }
    }
}

if (!function_exists('frontPagination')) {
    function frontPagination($total_rows, $per_page = 10, $limit = 10, $url = '')
    {
        $config['use_page_numbers']   = TRUE;
        $config['num_links']          = 3;
        $config['full_tag_open']      = '<div class="pagination-area text-center">';
        $config['full_tag_close']     = '</div>';
        $config['first_link']         = 'First';
        $config['first_tag_open']     = '<span class="page-numbers firsttag">';
        $config['first_tag_close']    = '</span>';
        $config['last_link']          = 'Last';
        $config['last_tag_open']      = '<span class="page-numbers lasttag">';
        $config['last_tag_close']     = '</span>';
        $config['num_tag_open']       = '<span class="page-numbers">';
        $config['num_tag_close']      = '</span>';
        $config['next_link']          = '<i class="fa fa-angle-double-right"></i>';
        $config['next_tag_open']      = '<span class="page-numbers">';
        $config['next_tag_close']     = '</span>';
        $config['prev_link']          = '<i class="fa fa-angle-double-left"></i>';
        $config['prev_tag_open']      = '<span class="page-numbers">';
        $config['prev_tag_close']     = '</span>';
        $config['cur_tag_open']       = '<span class="page-numbers current" aria-current="page">';
        $config['cur_tag_close']      = '</span>';
        $config['reuse_query_string'] = true;
        CI()->pagination->initialize($config);
        $config               = array();
        if(!empty($url))
        {
            $config["base_url"]   = $url;
        }
        else
        {
            $config["base_url"]   = base_url() . '/' . CI()->uri->segment(1);
        }
        
        $config["total_rows"] = $total_rows;
        $config["per_page"]   = $per_page;
        CI()->pagination->initialize($config);
        return CI()->pagination->create_links();
    }
}
