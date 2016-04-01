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
class Welcome extends MY_AdminController
{

    public function index()
    {
        //$this->load->view('admin/page');
        $this->top();
    }

    public function testqr() {
        $this->load->library('ciqrcode');

        $params['data'] = 'This is a text to encode become QR Code';
        $params['level'] = 'H';
        $params['size'] = 5;
        $params['savename'] = $this->config->item('upload_path') .'tes.png';
        $this->ciqrcode->generate($params);

        echo '<img src="http://localhost/static/upload/tes.png" />';

    }

    public function checkin($param = NULL) {
        $this->load->library('encrypt');

        //if (!isset($param)) show_404();

        $userNo = $this->encrypt->decode($param);
        echo $userNo;

        $resutl = $this->admin_user_master_model->get_user_by_no($userNo);
        //if (!isset($result)) show_404();

        $data['user_name'] = $resutl[0]->user_name;
        $this->load->view('admin/checkin',$data);

    }

    public function login()
    {
        $this->load->view('admin/login');
    }

    public function loginapi() {
        $postdata = $this->input->post();
        if (!empty($postdata)) {
            $userId = $postdata['user_id'];
            $pwd = $postdata['password'];
            if (isset($userId) && isset($pwd)) {
                $result = $this->admin_user_master_model->get_user_by_id($userId);
                if (!empty($result[0])) {
                    $password = $result[0]->password;
                    if (sha1($pwd) == $password) {
                        $this->session->set_userdata('userdata', $result[0]);
                        $this->output
                            ->set_content_type('application/json')
                            ->set_output(json_encode(array('result' => 'OK')));
                        return;
                    }
                }
            }
        }
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(array('result' => 'NG')));
    }

    public function top($data = NULL)
    {
        $data['reservation'] = $this->admin_reservation_model->get_reservation();

        if (!isset($data)) {
            $this->load->view('admin/page');
        } else {
            $this->load->view('admin/page', $data);
        }
    }
}
