<?php
namespace Vmsdk\Vmsdk;
class Vmsdk {
    var $url;
    var $api_key;

    public function __construct($url, $api_key){
        $this->api_key = $api_key;
        $this->url = $url;
    }

    public function newvm($name, $cluster, $node, $storage, $account, $domain, $os, $password, $ram_mib, $hdd_mib, $cpu_number, $ipv4_number, $comment){
        $url = "$this->url/vm/v3/host";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "accept: application/json",
            "Content-Type: application/json",
            "x-xsrf-token: $this->api_key",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_POSTFIELDS, "{\n  \"name\": \"$name\",\n  \"cluster\": $cluster,\n  \"node\": $node,\n  \"storage\": $storage,\n  \"account\": $account,\n  \"domain\": \"$domain\",\n  \"os\": $os,\n  \"ignore_recipe_filters\": true,\n  \"password\": \"$password\",\n  \"ram_mib\": $ram_mib,\n  \"hdd_mib\": $hdd_mib,\n  \"cpu_number\": $cpu_number,\n  \"net_bandwidth_mbitps\": 10000,\n  \"ipv4_number\": $ipv4_number,\n  \"comment\": \"$comment\",\n  \"send_email_mode\": \"default\"\n}");
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $resp = curl_exec($curl);
        curl_close($curl);
        $arData = json_decode($resp, 1);
        return $resp;
    }

    public function ipv4($id){
        $url = "$this->url/vm/v3/host/$id/ipv4";
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "accept: application/json",
            "x-xsrf-token: $this->api_key",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($curl);
        curl_close($curl);
        return $resp;
    }

    public function changeowner($serverid, $account){
        $url = "$this->url/vm/v3/host/$serverid/account";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "accept: application/json",
            "Content-Type: application/json",
            "x-xsrf-token: $this->api_key",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        curl_setopt($curl, CURLOPT_POSTFIELDS, '{"account": '.$account.'}');
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($curl);
        curl_close($curl);
        return $resp;
    }

    public function offserver($serverid){
        $url = "$this->url/vm/v3/host/$serverid/stop";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "accept: application/json",
            "x-xsrf-token: $this->api_key",
            "Content-Length: 0",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($curl);
        curl_close($curl);
        return $resp;
    }

    public function startserver($serverid){
        $url = "$this->url/vm/v3/host/$serverid/start";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "accept: application/json",
            "x-xsrf-token: $this->api_key",
            "Content-Length: 0",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($curl);
        curl_close($curl);
        return $resp;
    }

    public function restartserver($serverid){
        $url = "$this->url/vm/v3/host/$serverid/restart";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "accept: application/json",
            "x-xsrf-token: $this->api_key",
            "Content-Length: 0",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($curl);
        curl_close($curl);
        return $resp;
    }

    public function repasswordserver($serverid, $password){
        $url = "$this->url/vm/v3/host/$serverid/password";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "accept: */*",
            "Content-Type: application/json",
            "x-xsrf-token: $this->api_key",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        curl_setopt($curl, CURLOPT_POSTFIELDS, '{"password": "'.$password.'"}');
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($curl);
        curl_close($curl);
        return $resp;
    }
}