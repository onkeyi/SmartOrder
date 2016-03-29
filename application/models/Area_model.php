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
class Area_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all()
    {
        $this->db->select('*');
        $this->db->from("area_list_view");
        $this->db->where('area_language_id', $this->siteLangCode);
        $this->db->order_by('area_id');
        $query = $this->db->get();

        return $query->result();
    }


    public function get_area_by_id($areaId)
    {
        $this->db->select("*");
        $this->db->from("area_list_view");
        $this->db->where('area_id', $areaId);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return NULL;
    }


    public function get_used()
    {
        $this->db->select("*");
        $this->db->from("area_list_view");
        $this->db->where('use_yn', 'Y');
        $this->db->where('area_language_id', $this->siteLangCode);
        $this->db->order_by('area_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function add($data)
    {
        $this->db->trans_begin();
        $lang = isset($data['site_lang_code']) ? $data['site_lang_code'] :  $this->siteLangCode;
        $this->db->query("INSERT INTO area_master(date_created) VALUES('" . date('Y-m-d H:i:s') . "')");
        $categoryDescription = isset($data['area_description']) ? $data['area_description'] : 'NO DATA';
        $sql = "INSERT INTO area_language(area_id,language_id,area_name,area_description) VALUES(" . $this->db->insert_id() . ',' . $lang . ",'" . $data['area_name'] . "','"  . $categoryDescription . "')";
        $this->db->query($sql);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        }
        $this->db->trans_commit();
        return TRUE;
    }

    public function update($data)
    {
        if (!isset($data['area_id'])) throw new Exception('set area_id in data');

        $this->db->trans_begin();
        $lang = isset($data['site_lang_code']) ? $data['site_lang_code'] :  $this->siteLangCode;
        if (isset($data['use_yn'])) {
            $this->db->query("UPDATE area_master SET use_yn='" . $data['use_yn'] . "' WHERE area_id=" . $data['area_id']);
        }

        if (isset($data['area_name'])) {
            $this->db->query("UPDATE area_language SET area_name='" . $data['area_name'] . "' WHERE area_id=" . $data['area_id'] . " AND language_id=" . $lang);
        }

        if (isset($data['area_description'])) {
            $this->db->query("UPDATE area_language SET area_description='" . $data['area_description'] . "' WHERE area_id=" . $data['area_id'] . " AND language_id=" . $lang);
        }

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        }
        $this->db->trans_commit();
        return TRUE;
    }
}
