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
class Api extends MY_AdminController
{
    public function __construct()
    {
        parent::__construct();
        $isLogin = $this->session->userdata('userdata');
        if (!isset($isLogin)) {
            show_404();
            return;
        }
        $method = $this->input->method(TRUE);
        if ($method != 'POST') {
            show_404();
        }

    }


    private function ok()
    {
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(array('result' => 'OK')));
    }

    private function ng($error = "err")
    {

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(array('result' => 'NG', 'status' => $error)));
    }

    /**
     *  Ajax POST DATA
     */
    public function saveArea()
    {
        $postdata = $this->input->post();

        // update.
        if (!empty($postdata['area_id'])) {
            if ($this->admin_area_model->update($postdata)) {
                $this->generateQR($postdata['area_id']);
                $this->ok();
            } else {
                $this->ng();
            }
            return;
        }

        // insert.
        $lastId = $this->admin_area_model->add($postdata);
        if ($lastId != FALSE) {
            $this->generateQR($postdata['area_id']);
            $this->ok();
            return;
        }

        $this->ng();
    }

    private function generateUserQR($userNo) {
        $this->load->library('ciqrcode');
        $this->load->library('encrypt');
        $this->load->helper('url');

        $fileName = $this->config->item('upload_path') .'user_' . $userNo . '.png';
        if (is_file($fileName)) {
            unlink($fileName);
        }
        $params['data'] = site_url('welcome/checkin/' . $this->encrypt->encode($userNo));
        $params['level'] = 'H';
        $params['size'] = 3;
        $params['savename'] = $fileName;
        $this->ciqrcode->generate($params);
    }


    private function generateQR($tableId) {
        $this->load->library('ciqrcode');
        $this->load->library('encrypt');
        $fileName = $this->config->item('upload_path') .'talbe_' . $tableId . '.png';
        if (is_file($fileName)) {
            unlink($fileName);
        }
        $params['data'] = site_url('welcome/index/' . $this->encrypt->encode($tableId));
        $params['level'] = 'H';
        $params['size'] = 3;
        $params['savename'] = $fileName;
        $this->ciqrcode->generate($params);
    }

    public function deleteArea()
    {
        $postdata = $this->input->post();
        $areaId = $postdata['area_id'];
        if (!empty($areaId)) {
            if ($this->admin_area_model->delete($areaId)) {
                $this->ok();
                return;
            }
        }
        $this->ng();
    }

    public function saveCategory()
    {
        $postdata = $this->input->post();

        // update.
        if (!empty($postdata['category_id'])) {
            if ($this->admin_category_model->update($postdata)) {
                $this->ok();
            } else {
                $this->ng();
            }
            return;
        }

        // insert.
        if ($this->admin_category_model->add($postdata)) {
            $this->ok();
            return;
        }

        $this->ng();
    }

    public function deleteCategory()
    {
        $postdata = $this->input->post();
        $categoryId = $postdata['category_id'];
        if (!empty($categoryId)) {
            if ($this->admin_category_model->delete($categoryId)) {
                $this->ok();
                return;
            }
        }

        $this->ng();
    }

    public function uploadFile()
    {
        if (!empty($_FILES['userfile']['name'])) {
            $filePath = $this->config->item('upload_path');//'/home/yabo/www/smartorder/web/web_root/static/upload/';
            $file_element_name = 'userfile';
            $config['upload_path'] = $filePath;
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 1024 * 8;
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload($file_element_name)) {
                $msg = $this->upload->display_errors('', '');
                $this->ng($msg);
                return;
            }

            // upload file.
            $data = $this->upload->data();

            $filename = $this->security->sanitize_filename($data['file_name']);
            // thumbnail.
            $config['image_library'] = 'gd2';
            $config['source_image'] = $filePath . $filename;
            $config['create_thumb'] = FALSE;
            $config['width'] = 140;
            $config['height'] = 140;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            if ($this->saveMenu($filename)) {
                $this->ok();
                return;
            } else {
                unlink($data['full_path']);
            }
            @unlink($_FILES[$file_element_name]);
        }

        if ($this->saveMenu()) {
            $this->ok();
            return;
        }

        $this->ng();
    }

    private function saveMenu($fileName = '')
    {
        $postdata = $this->input->post();
        if (!empty($fileName)) $postdata['main_image'] = $fileName;

        // update.
        if (!empty($postdata['menu_id'])) {

            if ($this->admin_menu_model->update($postdata)) {
                return TRUE;
            }
            return FALSE;
        }

        // insert.
        if ($this->admin_menu_model->add($postdata)) {
            return TRUE;
        }
        return FALSE;
    }

    public function saveLanguage()
    {
        $postdata = $this->input->post();

        // update.
        if (!empty($postdata['language_id'])) {
            if ($this->admin_language_model->update($postdata)) {
                $this->ok();
            } else {
                $this->ng();
            }
            return;
        }

        // insert.
        if ($this->admin_language_model->add($postdata)) {
            $this->ok();
            return;
        }

        $this->ng();
    }


    public function savereservation()
    {
        $postdata = $this->input->post();

        // update.
        if (!empty($postdata['reservation_id'])) {
            if ($this->admin_reservation_model->update($postdata)) {
                $this->ok();
            } else {
                $this->ng('update error.');
            }
            return;
        }

        // insert.
        if ($this->admin_reservation_model->add($postdata)) {
            $this->ok();
            return;
        }

        $this->ng('insert error');
    }

    public function saveUser()
    {
        $postdata = $this->input->post();

        // update.
        if (!empty($postdata['user_no'])) {
            if ($this->admin_user_master_model->update($postdata)) {
                $this->generateUserQR($postdata['user_no']);
                $this->ok();
            } else {
                $this->ng('update error.');
            }
            return;
        }

        // insert.
        $lastInsertId = $this->admin_user_master_model->add($postdata);
        if ($lastInsertId != FALSE) {
            $this->generateUserQR($lastInsertId);
            $this->ok();
            return;
        }

        $this->ng('insert error');
    }


    public function deleteUser()
    {
        $postdata = $this->input->post();
        $userId = $postdata['user_no'];
        if (!empty($userId)) {
            if ($this->admin_user_master_model->delete($userId)) {
                $this->ok();
                return;
            }
        }

        $this->ng();
    }

    public function logout()
    {
        $this->session->sess_destroy();
    }

    public function uploadLogoFile()
    {
        if (!empty($_FILES['userfile']['name'])) {
            $filePath = $this->config->item('upload_path'); //'/home/yabo/www/smartorder/web/web_root/static/upload/';
            $file_element_name = 'userfile';
            $config['upload_path'] = $filePath;
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 1024 * 8;
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload($file_element_name)) {
                $msg = $this->upload->display_errors('', '');
                $this->ng($msg);
                return;
            }

            // upload file.
            $data = $this->upload->data();

            $filename = $this->security->sanitize_filename($data['file_name']);
            // thumbnail.
            $config['image_library'] = 'gd2';
            $config['source_image'] = $filePath . $filename;
            $config['create_thumb'] = FALSE;
            $config['width'] = 140;
            $config['height'] = 140;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            if ($this->saveClient($filename)) {
                $this->ok();
                return;
            } else {
                unlink($data['full_path']);
            }
            @unlink($_FILES[$file_element_name]);
        }

        if ($this->saveClient()) {
            $this->ok();
            return;
        }

        $this->ng();
    }


    public function saveClient($fileName)
    {

        $postdata = $this->input->post();
        if (!empty($fileName)) $postdata['logo_image'] = $fileName;

        // update.
        if (!empty($postdata['no'])) {

            if ($this->admin_client_model->update($postdata)) {
                return TRUE;
            }
            return FALSE;
        }

        // insert.
        if ($this->admin_client_model->add($postdata)) {
            return TRUE;
        }
        return FALSE;
    }


    public function uploadcsv($action)
    {
        if (!empty($_FILES['userfile']['name'])) {
            $filePath = $this->config->item('upload_path');//'/home/yabo/www/smartorder/web/web_root/static/upload/';
            $file_element_name = 'userfile';
            $config['upload_path'] = $filePath;
            $config['allowed_types'] = 'csv';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload($file_element_name)) {
                $msg = $this->upload->display_errors('', '');
                $this->ng($msg);
                return;
            }

            // upload file.
            $data = $this->upload->data();

            $filename = $data['file_name'];

            switch ($action) {
                case 'menu' :
                    if ($this->insertcsvmenu($filename)) {
                        $this->ok();
                        return;
                    }
                    break;
                case 'table' :
                    if ($this->insertcsvtable($filename)) {
                        $this->ok();
                        return;
                    }
                    break;
                case 'zaiko' :
                    if ($this->insertcsvzaiko($filename)) {
                        $this->ok();
                        return;
                    }
                    break;
                case 'user' :
                    if ($this->insertcsvuser($filename)) {
                        $this->ok();
                        return;
                    }
                    break;
                default :
                    break;
            }
            unlink($data['full_path']);
            @unlink($_FILES[$file_element_name]);
        }
        //$this->ng();
    }



    /**
     * メニューインポート
     * @param $filename
     */
    public function insertcsvmenu($filename)
    {

        $this->load->library('CSVReader');
        $result = $this->csvreader->parse_file($this->config->item('upload_path') . $filename);
        echo "カテゴリ読み込み...";
        // --------------- カテゴリ ---------
        // カテゴリー取得
        foreach ($result as $r) {
            if (!isset($r['category_name1'])) {
                echo "間違いCSV フォーマットエラー";
                return;
            }

            $category1[] = $r['category_name1'];
            $category2[] = $r['category_name2'];
            $category3[] = $r['category_name3'];
            $category4[] = $r['category_name4'];
        }

        //重複カテゴリ削除
        $category1 = array_values(array_unique($category1));
        $category2 = array_values(array_unique($category2));
        $category3 = array_values(array_unique($category3));
        $category4 = array_values(array_unique($category4));
        $cnt = count($category1);

        echo "日本語カテゴリ：" . json_encode($category1);
        echo "英語カテゴリ：" . json_encode($category2);
        echo "韓国語カテゴリ：" . json_encode($category3);
        echo "中国語カテゴリ：" . json_encode($category4);

        if ($cnt != count($category2) || $cnt != count($category3) || $cnt != count($category4)) {
            echo count($category1) . " : " . count($category2) . " : " . count($category3) . ' : ' . count($category4);
            echo  "カテゴリーに不備があります。";
            return;
        }

        // DB　Insert用配列
        $i = 0;
        foreach ($category1 as $r) {
            $categorys[] = array(
                'category_name' => array($r, $category2[$i], $category3[$i], $category4[$i]),
                'category_description' => $r);
            $i++;
        }


        // DB 挿入
        $i = 0;
        $isInserted = FALSE;
        foreach ($categorys as $c) {
            $categoryNames = $c['category_name'];
            foreach ($categoryNames as $cn) {
                // DB 検索
                $r = $this->admin_category_model->get_category_by_name($cn);
                if (isset($r)) {
                    $isInserted = TRUE;
                    unset($c['category_name'][$i]);
                }
                $i++;
            }
            if ($isInserted) {
                $isInserted = FALSE;
                continue;
            }
            if (isset($c)) {
                if (!$this->admin_category_model->add($c)) {
                    echo "失敗！！！category ";
                    $this->admin_category_model->delete_all();
                    return;
                }
            }

        }
        echo "カテゴリテーブルインポート完了";
        //------------------ メニュー　------------

        // DBカテゴリ一覧
        $dbcategorys = $this->admin_category_model->get_all_by_language_id(1);
        foreach ($result as $r) {
            $cid = 0;
            // カテゴリID取得
            foreach ($dbcategorys as $c) {
                if ($r['category_name1'] == $c->category_name) {
                    $cid = $c->category_id;
                    break;
                }
            }

            if ($cid == 0) {
                echo  "カテゴリID取得失敗！！" . json_encode($r);
                return;
            }

            $m1 = $r['menu_name1'];
            $m2 = $r['menu_name2'];
            $m3 = $r['menu_name3'];
            $m4 = $r['menu_name4'];

            // 同じ名前あるか。。
            $r1 = $this->admin_menu_model->get_menu_by_name($m1);
            if (isset($r1)) {
                continue;
            }

            echo "メニュー　" . $m1 . ' : ' . $m2 . ' : ' . $m3 . ' : ' . $m4;
            if (empty($m1) || empty($m2) || empty($m3) || empty($m4)) {
                echo  "メニュー名が足りないです。";
                $this->admin_category_model->delete_all();
                return;
            }

            if (empty($r['price'])) {
                echo  "メニュー価格が足りないです。";
                $this->admin_category_model->delete_all();
                return;
            }

            $mm = $m1 . "," . $m2 . "," . $m3 . "," . $m4;
            $menus[] = array('category_id' => $cid, 'menu_name' => $mm, 'price' => $r['price'], 'menu_description' => $r['menu_name1'], 'images' => array(), 'options' => array());
        }

        // メニュー挿入
        if (isset($menus)) {
            foreach ($menus as $m) {
                if (!$this->admin_menu_model->add($m)) {
                    $this->admin_category_model->delete_all();
                    $this->admin_menu_model->delete_all();
                    echo "失敗menu！";
                    return;
                }
            }
        }
        echo "インポート完了";

    }

    public function insertcsvtable($filename) {
        $this->load->library('CSVReader');
        $result = $this->csvreader->parse_file($this->config->item('upload_path') . $filename);
        echo "テーブル読み込み...";
        // --------------- カテゴリ ---------
        // カテゴリー取得
        foreach ($result as $r) {
            if (!isset($r['table_name1'])) {
                echo "間違いCSV フォーマットエラー";
                return;
            }

            $tableName[] = $r['table_name1'];
            $tableName[] = $r['table_name2'];
            $tableName[] = $r['table_name3'];
            $tableName[] = $r['table_name4'];
            $data = array('area_name'=>$tableName,'area_description'=>$tableName[0]);
            $dbname = $this->admin_area_model->get_area_by_name($tableName[0]);
            if (isset($dbname)) continue;
            $lastId = $this->admin_area_model->add($data);

            if (!$lastId) {
                echo "テーブルインポート失敗" . json_encode($data);
                return;
            }

            $this->generateQR($lastId);
            unset($tableName);
        }

        echo "完了";

    }


    public function insertcsvzaiko($filename) {

    }

    public function insertcsvuser($filename) {
        $this->load->library('CSVReader');
        $result = $this->csvreader->parse_file($this->config->item('upload_path') . $filename);
        echo "ユーザー読み込み...";
        // --------------- カテゴリ ---------
        // カテゴリー取得
        foreach ($result as $r) {
            if (!isset($r['user_id'])) {
                echo "間違いCSV フォーマットエラー";
                return;
            }

            $data['user_id'] = $r['user_id'];
            $data['password'] = $r['password'];
            $data['user_name'] = $r['user_name'];
            $data['group'] = $r['group'];

            $dbname = $this->admin_user_master_model->get_user_by_name($data['user_name']);
            if (isset($dbname)) continue;

            if (!$this->admin_user_master_model->add($data)) {
                echo "ユーザーインポート失敗" . json_encode($data);
                return;
            }
            unset($data);
        }

        echo "完了";
    }


    public function uploadzip() {
        if (!empty($_FILES['userfile']['name'])) {
            $filePath = $this->config->item('upload_path');//'/home/yabo/www/smartorder/web/web_root/static/upload/';
            $file_element_name = 'userfile';
            $config['upload_path'] = $filePath;
            $config['allowed_types'] = 'zip';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload($file_element_name)) {
                $msg = $this->upload->display_errors('', '');
                $this->ng($msg);
                return;
            }

            // upload file.
            $data = $this->upload->data();

            $this->load->library('unzip');

            $this->unzip->allow(array('css', 'js', 'png', 'gif', 'jpeg', 'jpg', 'tpl', 'html', 'swf'));
            $uploadDir = $this->config->item('upload_path') . "menu/";
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir,0777,TRUE);
            }
            $this->unzip->extract($data['full_path'], $uploadDir);

            unlink($data['full_path']);
            @unlink($_FILES[$file_element_name]);
        }
    }



}
