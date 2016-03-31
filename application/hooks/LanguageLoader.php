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
 * @package    SmartOrder
 * @author    onkeyi
 * @license    http://opensource.org/licenses/MIT	MIT License
 * @link    http://onkeyi.github.io/SmartOrder/
 * @filesource
 */
class LanguageLoader
{
    function initialize()
    {
        $ci =& get_instance();
        $ci->load->helper('language');

        $adminUrl = uri_string();
        // admin site
        if (strlen($adminUrl) >= 5 && substr($adminUrl,0,5) === "admin") {
            $isLogin = $ci->session->userdata('userdata');
            if (!isset($isLogin)) {
                $ci->load->view('admin/login');
            }
            // jp
            $ci->session->set_userdata('site_lang', 1);
            return;
        }

        $site_lang = $ci->session->userdata('site_lang');

        if (isset($site_lang)) {
            $ci->lang->load('message', $site_lang);
            return;
        }

        $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
        echo $lang;
        $langCode = $ci->language_model->get_language_code($lang);

        if (isset($langCode)) {
            $ci->lang->load('message', $lang);
            $ci->session->set_userdata('site_lang', $lang);
        } else {
            $ci->lang->load('message', "ja");
            $ci->session->set_userdata('site_lang', $lang);
        }
    }
}
