<?php namespace Sukohi\LaravelAbsoluteUrl;

class LaravelAbsoluteUrl {

    private $_root_url;
    private $_current_url;

    public function baseUrl($url) {

        $this->_root_url = $this->getRootUrl($url);
        $this->_current_url = $this->getCurrentUrl($url);
        return $this;

    }

    public function get($relative_url) {

        $first_str = substr($relative_url, 0, 1);

        if($first_str == '/') {

            return $this->_root_url . substr($relative_url, 1);

        } else if(substr($relative_url, 0, 2) == './') {

            return $this->_current_url . substr($relative_url, 2);

        } else if(strstr($relative_url, '../')) {

            return $this->getOverUrl($relative_url);

        } else if(substr($relative_url, 0, 7) != 'http://' && substr($relative_url, 0, 8) != 'https://') {

            return $this->_current_url . $relative_url;

        }

        return $relative_url;

    }

    private function getOverUrl($url) {

        $current_url = $this->_current_url;
        $over_count = substr_count($url, '../');

        for($loop = 0; $loop < $over_count; $loop++) {

            $current_url = $this->getParentUrl($current_url);

        }

        return $current_url . substr($url, $over_count*3);

    }

    private function getRootUrl($url) {

        $url_parts = parse_url($url);
        return $url_parts['scheme'] .'://'. $url_parts['host'] .'/';

    }

    private function getCurrentUrl($url) {

        $return = '';
        $url_parts = explode('/', $url);
        $url_parts_count = count($url_parts);

        for($loop = 0; $loop < $url_parts_count; $loop++) {

            if($loop == $url_parts_count-1) {

                return $return;

            }

            $return .= $url_parts[$loop] .'/';

        }

        return $return;

    }

    private function getParentUrl($url) {

        if($url == $this->_root_url) {

            return $url;

        };

        $return = '';
        $url_parts = explode('/', $url);
        $url_parts_count = count($url_parts);

        for($loop = 0; $loop < $url_parts_count; $loop++) {

            if($loop == $url_parts_count-2) {

                return $return;

            }

            $return .= $url_parts[$loop] .'/';

        }

        return $return;

    }

}