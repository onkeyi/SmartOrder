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
class Welcome extends MY_Controller
{

    /**
     * Index page.
     */
    public function index($param = NULL)
    {
        if (!isset($param)) {
            show_404();
        }

        $this->load->library('encrypt');
        $tableNo = $this->encrypt->decode($param);
        $dbresult = $this->area_model->get_area_by_id($tableNo);

        if (!isset($dbresult)) show_404();

        $areaId = $this->session->area_id;
        if ($areaId == $tableNo) {
            redirect("/welcome/main/");
            return;
        }

        $this->session->set_userdata('area_id', $tableNo);

        $data['theme'] = $this->theme;
        $data['area_id'] = $this->session->area_id;

        $this->load->view("go/" . $this->theme . "/welcome", $data);

    }

    public function checkin($param = NULL) {
        if (!isset($param)) show_404();

        $this->load->library('encrypt');
        $this->load->model('user_master_model');

        $userNo = $this->encrypt->decode($param);

        $result = $this->user_master_model->get_user_by_no($userNo);
        if (empty($result)) show_404();

        $data['user_name'] = $result[0]->user_name;
        $this->load->view('checkin',$data);

    }

    public function main()
    {

        $areaId = $this->session->area_id;
        if (!isset($areaId)) {
            echo 'session timeout';
            return;
        }

        $sessionid = $this->area_session_model->get_area_session_id($areaId);

        if (isset($sessionid)) {
            $data['theme'] = $this->theme;
            $data['categorys'] = $this->category_model->get_all_used_category();

            $this->load->view('go/' . $this->theme . '/index', $data);
            return;
        }

        $data['session_id'] = random_string('unique', 16);
        $data['area_id'] = $this->session->area_id;

        $data['area_start_date'] = date('Y-m-d H:i:s');
        $data['created_from_ip'] = $this->input->ip_address();
        $data['date_created'] = date('Y-m-d H:i:s');

        $this->area_session_model->add($data);

        $data['theme'] = $this->theme;
        $data['categorys'] = $this->category_model->get_all_used_category();

        $this->load->view('go/' . $this->theme . '/index', $data);
    }

    /**
     * 言語変更
     * @param null $languageName
     */
    public function changeLanguage($languageName = NULL)
    {
        if (isset($languageName)) {
            $data = $this->language_model->get_language_code($languageName);
            if (isset($data)) {
                $this->session->set_userdata('site_lang', $languageName);
                $this->session->set_userdata('site_lang_code', $data->language_id);
            }
        }
        redirect("/welcome/main");
    }

    public function testqr()
    {
        $this->load->library('ciqrcode');

        $params['data'] = 'This is a text to encode become QR Code';
        $params['level'] = 'H';
        $params['size'] = 10;
        $params['savename'] = '/home/yabo/www/smartorder/web/web_root/assets/qr/test.png';
        $this->ciqrcode->generate($params);

        echo '<img src="' . base_url() . '/assets/test.png" />';
    }

}
