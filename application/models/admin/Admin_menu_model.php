<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
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
class Admin_menu_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all()
    {
        $this->db->select('*');
        $this->db->from("menu_list_view");
        $this->db->where('menu_language_id', $this->session->userdata('site_lang'));
        $this->db->where('category_language_id', $this->session->userdata('site_lang'));
        $this->db->order_by('menu_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_used()
    {
        $this->db->select("*");
        $this->db->from("menu_list_view");
        $this->db->where('use_yn', 'Y');
        $this->db->where('menu_language_id', $this->session->userdata('site_lang'));
        $this->db->where('category_language_id', $this->session->userdata('site_lang'));
        $this->db->order_by('menu_id');
        $query = $this->db->get();
        return $query->result();
    }


    public function get_menu_names($menuId)
    {
        $this->db->where("menu_id", $menuId);
        $this->db->from('menu_language_view');
        $this->db->order_by('language_id');
        $query = $this->db->get();

        return $query->result();
    }

    public function get_menu_by_id($menuId)
    {
        $this->db->select("*");
        $this->db->from("menu_list_view");
        $this->db->where('menu_id', $menuId);
        $this->db->where('menu_language_id', $this->session->userdata('site_lang'));
        $this->db->where('category_language_id', $this->session->userdata('site_lang'));
        $query = $this->db->get();
        return $query->result();
    }

    public function get_menu_by_name($menuName)
    {
        $this->db->select("*");
        $this->db->from("menu_list_view");
        $this->db->where('menu_name', $menuName);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return NULL;
    }


    public function add($data)
    {
        $this->db->trans_begin();
        $menus = $data['menu_name'];
        $menuDescription = $data['menu_description'];
        $images = $data['images'];
        $options = $data['options'];

        unset($data['menu_name']);
        unset($data['menu_description']);
        unset($data['images']);
        unset($data['options']);

        $data['date_created'] = date('Y-m-d H:i:s');
        $this->db->insert('menu_master', $data);
        $lastID = $this->db->insert_id();

        // 言語分挿入
        $languages = $this->language_model->get_used();
        $i = 0;
        $ms = explode(',', $menus);
        foreach ($languages as $l) {

            $mn = isset($ms[$i]) ? $ms[$i] : "";

            $insertLanguageData = array(
                'menu_id' => $lastID,
                'language_id' => $l->language_id,
                'menu_name' => $mn,
                'menu_description' => $menuDescription);
            $this->db->insert('menu_language', $insertLanguageData);
            $i++;
        }

        // insert menu image
        foreach ($images as $image) {
            $imageName = isset($image['image_name']) ? $image['image_name'] : "";
            $imagePath = $image['image_path'];
            $insertImageData = array(
                'menu_id' => $lastID,
                'image_name' => $imageName,
                'image_path' => $imagePath
            );
            $this->db->insert('menu_image', $insertImageData);
        }

        // insert menu option
        foreach ($options as $option) {
            $optionName = isset($option['option_name']) ? $option['option_name'] : "";
            $optionDescription = $option['option_description'];
            $optionValue = $option['option_value'];
            $insertOptionData = array(
                'menu_id' => $lastID,
                'option_value' => $optionValue
            );
            $this->db->insert('option_master', $insertOptionData);

            $optionID = $this->db->insert_id();
            $insertOptionLanguageData = array(
                'option_id' => $optionID,
                'language_id' => $this->session->userdata('site_lang'),
                'option_name' => $optionName,
                'option_description' => $optionDescription
            );
            $this->db->insert('option_language', $insertOptionLanguageData);
        }

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        }
        $this->db->trans_commit();
        return TRUE;
    }

    /**
     * @param $data
     *  MUST : menu_id
     *  OPTION : use_yn,menu_name,menu_description,images
     * @return bool
     */
    public function update($data)
    {
        if (!isset($data['menu_id'])) throw new Exception('set menu_id in data');
        $menus = $data['menu_name'];
        $menuDescription = $data['menu_description'];
        $images = isset($data['images']) ? $data['images'] : NULL;
        $options = isset($data['options']) ? $data['options'] : NULL;

        unset($data['menu_name']);
        unset($data['menu_description']);
        unset($data['images']);
        unset($data['options']);

        $this->db->trans_begin();

        $this->db->where('menu_id', $data['menu_id']);
        $this->db->update('menu_master', $data);


        if (isset($menus)) {
            $languages = $this->language_model->get_used();
            $i = 0;

            $ms = explode(',', $menus);

            foreach ($languages as $l) {
                $mn = isset($ms[$i]) ? $ms[$i] : "";
                $insertMenuLanguageData = array(
                    'menu_id' => $data['menu_id'],
                    'language_id' => $l->language_id,
                    'menu_name' => $mn,
                    'menu_description' => $menuDescription
                );
                $this->db->replace('menu_language',$insertMenuLanguageData);
                $i++;
            }
        }

        if (isset($images)) {
            // delete all data.
            $this->db->where('menu_id', $data['menu_id']);
            $this->db->delete('menu_image');

            // insert
            foreach ($data['images'] as $image) {
                $imageName = isset($image['image_name']) ? $image['image_name'] : NULL;
                $imagePath = $image['image_path'];

                $insertImageData = array(
                    'menu_id' => $data['menu_id'],
                    'image_name' => $imageName,
                    'image_path' => $imagePath
                );
                $this->db->insert('menu_image', $insertImageData);
            }
        }

        // insert menu option
        if (isset($options)) {
            $this->db->where('menu_id', $data['menu_id']);
            $this->db->delete('option_master');
            foreach ($data['options'] as $option) {
                $optionName = isset($option['option_name']) ? $option['option_name'] : "";
                $optionDescription = $option['option_description'];
                $optionValue = $option['option_value'];
                $insertOptionData = array('menu_id' => $data['menu_id'], 'option_value' => $optionValue);
                $this->db->insert('option_master', $insertOptionData);
                // TODO comment
                /*
                $optionID = $this->db->insert_id();
                $insertOptionLanguageData = array('option_id' => $optionID, 'language_id' => $lang, 'option_name' => $optionName, 'option_description' => $optionDescription);
                $this->db->insert('option_language', $insertOptionLanguageData);
                */
            }
        }

        if ($this->db->trans_status() === FALSE) {
            echo "ROLLBACK";
            $this->db->trans_rollback();
            return FALSE;
        }

        $this->db->trans_commit();
        return TRUE;
    }

    public function delete_all() {
        return $this->db->delete('menu_master');
    }
}
