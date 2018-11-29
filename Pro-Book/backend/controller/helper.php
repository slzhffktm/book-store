<?php
    require_once 'backend/model/Auth/Auth_service.php';

    function get_browser_name($user_agent) {
        if (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR/')) return 'Opera';
        elseif (strpos($user_agent, 'Edge')) return 'Edge';
        elseif (strpos($user_agent, 'Chrome')) return 'Chrome';
        elseif (strpos($user_agent, 'Safari')) return 'Safari';
        elseif (strpos($user_agent, 'Firefox')) return 'Firefox';
        elseif (strpos($user_agent, 'MSIE') || strpos($user_agent, 'Trident/7')) return 'Internet Explorer';
        return 'Other';
    }

    function getRealIpAddr() {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
        {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
        {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    function getLocationForPort($wsdl, $portName) {
        $file = file_get_contents($wsdl);

        $xml = new SimpleXmlElement($file);

        $query = "wsdl:service/wsdl:port[@name='$portName']/soap:address";
        $address = $xml->xpath($query);
        if (!empty($address)) {
            $location = (string)$address[0]['location'];
            return $location;
        }

        return false;
    }

    function connectToBookWebService() {
        $wsdl = 'http://localhost:9000/BookCatalogueWebService?wsdl';
        $client = new SoapClient($wsdl, array(
            "trace" => 1,
            "exceptions" => 0));
        return $client;
    }

    function checkAccessToken() {
        $as = new AuthService;
        if (isset($_COOKIE['accessToken'])) {
            $browser = get_browser_name($_SERVER['HTTP_USER_AGENT']);
            $ip = getRealIpAddr();
            $user_access_token = $_COOKIE["accessToken"];
            $user = $as->checkAccessToken($user_access_token, $browser, $ip);

            if ($user) {
                return $user;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

?>