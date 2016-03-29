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
class Menu_model extends MY_Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all()
    {
        $this->db->select('*');
        $this->db->from("menu_list_view");
        $this->db->where('menu_language_id', $this->siteLangCode);
        $this->db->where('category_language_id', $this->siteLangCode);
        $this->db->order_by('menu_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_all_used_menu()
    {
        $this->db->select("*");
        $this->db->from("menu_list_view");
        $this->db->where('use_yn', 'Y');
        $this->db->where('menu_language_id', $this->siteLangCode);
        $this->db->where('category_language_id', $this->siteLangCode);
        //if (isset($category)) $this->db->where('category_id',$categoryId);
        $this->db->order_by('menu_id');
        $query = $this->db->get();
        return $query->result();
    }


    public function get_by_category_menu($categoryId)
    {
        $this->db->select("*");
        $this->db->from("menu_list_view");
        $this->db->where('use_yn', 'Y');
        $this->db->where('menu_language_id', $this->siteLangCode);
        $this->db->where('category_language_id', $this->siteLangCode);
        $this->db->where('category_id',$categoryId);
        $this->db->order_by('menu_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_menu_by_id($menuId) {
        $this->db->select("*");
        $this->db->from("menu_list_view");
        $this->db->where('use_yn', 'Y');
        $this->db->where('menu_language_id', $this->siteLangCode);
        $this->db->where('category_language_id', $this->siteLangCode);
        $this->db->where('menu_id',$menuId);
        $this->db->limit(1);
        $query = $this->db->get();
        if(is_array($query->result()))
            return $query->result()[0];
        return NULL;

    }

    public function get_menu_images($menuId) {
        $this->db->select('*');
        $this->db->from('menu_image');
        $this->db->where('menu_id',$menuId);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_menu_options($menuId) {
        $this->db->select('*');
        $this->db->from('option_master');
        $this->db->where('menu_id',$menuId);
        $query = $this->db->get();
        return $query->result();
    }

    public function add($data)
    {
        $this->db->trans_begin();
        $lang = isset($data['site_lang_code']) ? $data['site_lang_code'] : $this->siteLangCode;
        // insert menu master
        $this->db->query("INSERT INTO menu_master(category_id,price,date_created) VALUES(" . $data['category_id'] . "," . $data['price'] . ",'" . date('Y-m-d H:i:s') . "')");
        $menuDescription = isset($data['menu_description']) ? $data['menu_description'] : 'NO DATA';

        // insert menu language.
        $lastID = $this->db->insert_id();
        $sql = "INSERT INTO menu_language(menu_id,language_id,menu_name,menu_description) VALUES(" . $lastID . ',' . $lang . ",'" . $data['menu_name'] . "','"  . $menuDescription . "')";
        $this->db->query($sql);

        // insert menu image
        if (isset($data['images'])) {
            foreach($data['images'] as $image) {
                $imageName = isset($image['image_name']) ? $image['image_name'] : "";
                $imagePath = $image['image_path'];
                $imageSQL = "INSERT INTO menu_image (menu_id,image_name,image_path) VALUES(" . $lastID . "," . "'" . $imageName . "','" . $imagePath . "')";
                $this->db->query($imageSQL);
            }
        }

        // insert menu option
        if (isset($data['options'])) {
            foreach($data['options'] as $option) {
                $optionName = isset($option['option_name']) ? $option['option_name'] : "";
                $optionDescription = $option['option_description'];
                $optionValue = $option['option_value'];
                $optionSQL = "INSERT INTO option_master (menu_id,option_value) VALUES(" . $lastID . ",'" . $optionValue . "')";
                $this->db->query($optionSQL);
                $optionID = $this->db->insert_id();
                $optionLanguageSQL = "INSERT INTO option_language (option_id,language_id,option_name,option_description) VALUES (" . $optionID . "," . $lang . ",'" . $optionName . "','" . $optionDescription . "')";
                $this->db->query($optionLanguageSQL);
            }
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

        $this->db->trans_begin();
        $lang = isset($data['site_lang_code']) ? $data['site_lang_code'] : $this->siteLangCode;
        if (isset($data['use_yn'])) {
            $this->db->query("UPDATE menu_master SET use_yn='" . $data['use_yn'] . "' WHERE menu_id=" . $data['menu_id']);
        }

        if (isset($data['menu_name'])) {
            $this->db->query("UPDATE menu_language SET menu_name='" . $data['menu_name'] . "' WHERE menu_id=" . $data['menu_id'] . " AND language_id=" . $lang);
        }

        if (isset($data['menu_description'])) {
            $this->db->query("UPDATE menu_language SET menu_description='" . $data['menu_description'] . "' WHERE menu_id=" . $data['menu_id'] . " AND language_id=" . $lang);
        }


        if (isset($data['images'])) {
            // delete all data.
            $deleteAllImageSQL = "DELETE FROM menu_image where menu_id=". $data['menu_id'];
            $this->db->query($deleteAllImageSQL);
            // insert
            foreach($data['images'] as $image) {
                $imageName = isset($image['image_name']) ? $image['image_name'] : NULL;
                $imagePath = $image['image_path'];
                $imageSQL = "INSERT INTO menu_image (menu_id,image_name,image_path) VALUES(" . $data['menu_id'] . "," . "'" . $imageName . "','" . $imagePath . "')";
                $this->db->query($imageSQL);
            }
        }

        // insert menu option
        if (isset($data['options'])) {
            $deleteOptionSQL = "DELETE FROM option_master WHERE menu_id=" . $data['menu_id'];
            $this->db->query($deleteOptionSQL);
            foreach($data['options'] as $option) {
                $optionName = isset($option['option_name']) ? $option['option_name'] : "";
                $optionDescription = $option['option_description'];
                $optionValue = $option['option_value'];
                $optionSQL = "INSERT INTO option_master (menu_id,option_value) VALUES(" . $data['menu_id'] . ",'" . $optionValue . "')";
                $this->db->query($optionSQL);
                $optionID = $this->db->insert_id();
                $optionLanguageSQL = "INSERT INTO option_language (option_id,language_id,option_name,option_description) VALUES (" . $optionID . "," . $lang . ",'" . $optionName . "','" . $optionDescription . "')";
                $this->db->query($optionLanguageSQL);
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
}
