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
class Admin_reservation_model extends MY_AdminModel
{
    public function __construct()
    {
        parent::__construct();

    }

    public function get_all()
    {
        $this->db->select('*');
        $this->db->from("reservation");
        $this->db->join('area_language_view','area_language_view.area_id=reservation.reservation_area_id','left outer');
        $this->db->join('menu_language_view','menu_language_view.menu_id=reservation.reservation_menu_id','left outer');
        $this->db->where('language_id', $this->siteLangCode);
        $this->db->where('area_language_id', $this->siteLangCode);
        $this->db->order_by('reservation_date DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_reservation()
    {
        $this->db->select('*');
        $this->db->from("reservation");
        $this->db->join('area_language_view','area_language_view.area_id=reservation.reservation_area_id','left outer');
        $this->db->join('menu_language_view','menu_language_view.menu_id=reservation.reservation_menu_id','left outer');
        $this->db->where('language_id', $this->siteLangCode);
        $this->db->where('area_language_id', $this->siteLangCode);
        $this->db->where('reservation_date>=' . "'" . date("Y-m-d 00:00:00") . "'");
        $this->db->order_by('reservation_date DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_by_reservation_id($id) {
        $this->db->select('*');
        $this->db->from("reservation");
        $this->db->where('reservation_id',$id);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_all_count() {
        return $this->db->count_all('reservation');
    }

    public function add($data) {
        $this->db->insert('reservation',$data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function update($data) {
        $this->db->where('reservation_id',$data['reservation_id']);
        return $this->db->update('reservation',$data);
    }

    public function delete($id) {
        $this->db->where('reservation_id',$id);
        $this->db->delete('reservation');
    }
}
