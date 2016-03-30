<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * SmartOrder
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2016, SunflowerStudio
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	SmartOrder
 * @author	onkeyi
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	http://onkeyi.github.io/SmartOrder/
 * @filesource
 */
class User extends MY_AdminController
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->input->is_ajax_request()) {
            show_404();
        }
    }

    function initPage($config)
    {
        $config['per_page'] = 20;
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['last_link'] = '最後';
        $config['first_link'] = '最初';
        return $config;
    }

    public function attendanceList() {
        $userId = $this->session->userdata('userdata')->user_id;
        $group = $this->session->userdata('userdata')->group;
        if ($group != 1) {
            $data['attendance'] = $this->admin_attendance_model->get_all(date('Y-m-d'),$userId);
        } else {
            $data['attendance'] = $this->admin_attendance_model->get_all(date('Y-m-d'));
        }
        $this->load->library('pagination');
        $config['base_url'] = uri_string();
        $config['total_rows'] = $this->admin_reservation_model->get_all_count();
        $this->pagination->initialize($this->initPage($config));

        $this->load->view('admin/user/attendance_list',$data);
    }

}
