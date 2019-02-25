<?php

/******************************************/
/************** * SETTINGS * **************/
/******************************************/

/****

Selection

0 | direct_connection()
1 | public_proxy_http()
2 | public_proxy_https()
3 | public_proxy_socks4()
4 | public_proxy_socks5()
5 | torguard_server_http_https()
6 | torguard_server_socks5()
7 | pia_server_socks5()
8 | nordvpn_server_socks5()
9 | proxyrack_socks5()
10 | proxyrack_http()
11 | proxyrack_random()

 ****/

$selection = 1;

######

$test_against = 'default';
$how_much_times = 10000; // depends on maximum the index number

$public_proxy_txt['proxy-http'] = 'proxy-http.txt';
$public_proxy_txt['proxy-https'] = 'proxy-https.txt';
$public_proxy_txt['proxy-socks4'] = 'proxy-socks.txt';
$public_proxy_txt['proxy-socks5'] = 'proxy-socks5.txt';

$timeout['CURLOPT_CONNECTTIMEOUT'] = 5;
$timeout['CURLOPT_TIMEOUT']  = 10;

/******

Credentials

	NordVPN
	TorGuard
	Private Internet Access
	Proxy Rack

 ******/

$credentials['nordvpn'] = 'USERNAME:PASSWORD';
$credentials['torguard'] = 'USERNAME:PASSWORD';
$credentials['pia'] = 'USERNAME:PASSWORD';
$credentials['proxyrack'] = 'USERNAME:PASSWORD';



#if(file_exists('credentials.php')){

 #   require_once('credentials.php');

#}


/******************************************/
/************** * SETTINGS * **************/
/******************************************/

function cvf_convert_object_to_array($data) {

    if (is_object($data)) {
        $data = get_object_vars($data);
    }

    if (is_array($data)) {
        return array_map(__FUNCTION__, $data);
    }
    else {
        return $data;
    }
}

function direct_connection($headers ,$timeout){

    $cookies = 'cookies/';

    $options = array(

        CURLOPT_MAXREDIRS       => 4,
        CURLOPT_CONNECTTIMEOUT  => $timeout['CURLOPT_CONNECTTIMEOUT'],
        CURLOPT_ENCODING        => '',
        CURLOPT_FOLLOWLOCATION  => true,
        #CURLOPT_HEADER         => true,
        CURLOPT_HTTPGET         => true,
        CURLOPT_HTTPHEADER      => $headers,
        CURLOPT_RETURNTRANSFER  => true,
        CURLOPT_SSL_VERIFYHOST  => false,
        CURLOPT_SSL_VERIFYPEER  => false,
        CURLOPT_TIMEOUT         => $timeout['CURLOPT_TIMEOUT'],
        CURLOPT_VERBOSE         => false,
        CURLOPT_COOKIE          => $cookies,
        CURLOPT_COOKIEFILE      => $cookies,
        CURLOPT_COOKIEJAR       => $cookies,
        CURLOPT_COOKIESESSION   => $cookies,
        CURLOPT_COOKIELIST      => $cookies,
        CURLOPT_RETURNTRANSFER  => 1,
        CURLOPT_CUSTOMREQUEST   => 'GET',
        CURLOPT_ENCODING        => 'gzip, deflate',


    );

    $information['options'] = $options;
    $information['server'] = null;
    
    return $information;

}

function public_proxy_http($public_proxy_txt, $headers, $index, $timeout){

    $proxy_http = file_get_contents($public_proxy_txt['proxy-http']);
    $lines_proxy_http = explode("\n", $proxy_http);
    $count_lines_proxy_http = count($lines_proxy_http);

    $proxy_http = $lines_proxy_http[$index];

    $cookies = 'cookies/';

    $options = array(

        CURLOPT_MAXREDIRS       => 4,
        CURLOPT_CONNECTTIMEOUT  => $timeout['CURLOPT_CONNECTTIMEOUT'],
        CURLOPT_ENCODING        => '',
        CURLOPT_FOLLOWLOCATION  => false,
        #CURLOPT_HEADER         => true,
        CURLOPT_HTTPGET         => true,
        CURLOPT_HTTPHEADER      => $headers,
        CURLOPT_HTTPPROXYTUNNEL => true,
        CURLOPT_PROXY           => $proxy_http,
        CURLOPT_RETURNTRANSFER  => true,
        CURLOPT_SSL_VERIFYHOST  => false,
        CURLOPT_SSL_VERIFYPEER  => false,
        CURLOPT_TIMEOUT         => $timeout['CURLOPT_TIMEOUT'],
        CURLOPT_VERBOSE         => false,
        CURLOPT_COOKIE          => $cookies,
        CURLOPT_COOKIEFILE      => $cookies,
        CURLOPT_COOKIEJAR       => $cookies,
        CURLOPT_COOKIESESSION   => $cookies,
        CURLOPT_COOKIELIST      => $cookies,
        CURLOPT_RETURNTRANSFER  => 1,
        CURLOPT_CUSTOMREQUEST   => 'GET',
        CURLOPT_ENCODING        => 'gzip, deflate',

    );
    
    $information['options'] = $options;
    $information['server'] = $proxy_http;
    
    return $information;

}
function public_proxy_https($public_proxy_txt, $headers, $index, $timeout){

    $proxy_https = file_get_contents($public_proxy_txt['proxy-https']);
    $lines_proxy_https = explode("\n", $proxy_https);
    $count_lines_proxy_https = count($lines_proxy_https);

    $proxy_https = $lines_proxy_https[$index];

    $cookies = 'cookies/';

    $options = array(

        CURLOPT_MAXREDIRS       => 4,
        CURLOPT_CONNECTTIMEOUT  => $timeout['CURLOPT_CONNECTTIMEOUT'],
        CURLOPT_ENCODING        => '',
        CURLOPT_FOLLOWLOCATION  => false,
        #CURLOPT_HEADER         => true,
        CURLOPT_HTTPGET         => true,
        CURLOPT_HTTPHEADER      => $headers,
        CURLOPT_HTTPPROXYTUNNEL => true,
        CURLOPT_PROXY           => $proxy_https,
        CURLOPT_RETURNTRANSFER  => true,
        CURLOPT_SSL_VERIFYHOST  => false,
        CURLOPT_SSL_VERIFYPEER  => false,
        CURLOPT_TIMEOUT         => $timeout['CURLOPT_TIMEOUT'],
        CURLOPT_VERBOSE         => false,
        CURLOPT_COOKIE          => $cookies,
        CURLOPT_COOKIEFILE      => $cookies,
        CURLOPT_COOKIEJAR       => $cookies,
        CURLOPT_COOKIESESSION   => $cookies,
        CURLOPT_COOKIELIST      => $cookies,
        CURLOPT_RETURNTRANSFER  => 1,
        CURLOPT_CUSTOMREQUEST   => 'GET',
        CURLOPT_ENCODING        => 'gzip, deflate',

    );

    $information['options'] = $options;
    $information['server'] = $proxy_https;
    
    return $information;

}
function public_proxy_socks4($public_proxy_txt, $headers, $index, $timeout){

    $proxy_socks4 = file_get_contents($public_proxy_txt['proxy-socks4']);
    $lines_proxy_socks4 = explode("\n", $proxy_socks4);
    $count_lines_proxy_socks4 = count($lines_proxy_socks4);

    $proxy_socks4 = $lines_proxy_socks4[$index];

    $cookies = 'cookies/';

    $options = array(

        CURLOPT_MAXREDIRS       => 4,
        CURLOPT_CONNECTTIMEOUT  => $timeout['CURLOPT_CONNECTTIMEOUT'],
        CURLOPT_ENCODING        => '',
        CURLOPT_FOLLOWLOCATION  => false,
        #CURLOPT_HEADER         => true,
        CURLOPT_HTTPGET         => true,
        CURLOPT_HTTPHEADER      => $headers,
        CURLOPT_HTTPPROXYTUNNEL => true,
        CURLOPT_PROXY           => $proxy_socks4,
        CURLOPT_PROXYTYPE       => 7,
        CURLOPT_RETURNTRANSFER  => true,
        CURLOPT_SSL_VERIFYHOST  => false,
        CURLOPT_SSL_VERIFYPEER  => false,
        CURLOPT_TIMEOUT         => $timeout['CURLOPT_TIMEOUT'],
        CURLOPT_VERBOSE         => false,
        CURLOPT_COOKIE          => $cookies,
        CURLOPT_COOKIEFILE      => $cookies,
        CURLOPT_COOKIEJAR       => $cookies,
        CURLOPT_COOKIESESSION   => $cookies,
        CURLOPT_COOKIELIST      => $cookies,
        CURLOPT_RETURNTRANSFER  => 1,
        CURLOPT_CUSTOMREQUEST   => 'GET',
        CURLOPT_ENCODING        => 'gzip, deflate',

    );

    $information['options'] = $options;
    $information['server'] = $proxy_socks4;
    
    return $information;

}
function public_proxy_socks5($public_proxy_txt, $headers, $index, $timeout){

    $proxy_socks5 = file_get_contents($public_proxy_txt['proxy-socks5']);
    $lines_proxy_socks5 = explode("\n", $proxy_socks5);
    $count_lines_proxy_socks5 = count($lines_proxy_socks5);

    $proxy_socks5 = $lines_proxy_socks5[$index];

    $cookies = 'cookies/';

    $options = array(

        CURLOPT_MAXREDIRS       => 4,
        CURLOPT_CONNECTTIMEOUT  => $timeout['CURLOPT_CONNECTTIMEOUT'],
        CURLOPT_ENCODING        => '',
        CURLOPT_FOLLOWLOCATION  => false,
        #CURLOPT_HEADER         => true,
        CURLOPT_HTTPGET         => true,
        CURLOPT_HTTPHEADER      => $headers,
        CURLOPT_HTTPPROXYTUNNEL => true,
        CURLOPT_PROXY           => $proxy_socks5,
        CURLOPT_PROXYTYPE       => 7,
        CURLOPT_RETURNTRANSFER  => true,
        CURLOPT_SSL_VERIFYHOST  => false,
        CURLOPT_SSL_VERIFYPEER  => false,
        CURLOPT_TIMEOUT         => $timeout['CURLOPT_TIMEOUT'],
        CURLOPT_VERBOSE         => false,
        CURLOPT_COOKIE          => $cookies,
        CURLOPT_COOKIEFILE      => $cookies,
        CURLOPT_COOKIEJAR       => $cookies,
        CURLOPT_COOKIESESSION   => $cookies,
        CURLOPT_COOKIELIST      => $cookies,
        CURLOPT_RETURNTRANSFER  => 1,
        CURLOPT_CUSTOMREQUEST   => 'GET',
        CURLOPT_ENCODING        => 'gzip, deflate',

    );

    $information['options'] = $options;
    $information['server'] = $proxy_socks5;
    
    return $information;

}
function nordvpn_server_socks5($headers, $index, $timeout, $credentials){

    $nordvpn_json = 'server.json';

    $nordvpn_file = cvf_convert_object_to_array(json_decode(file_get_contents($nordvpn_json, true)));

    $nordvpn_socks = array();

    $i = 0;

    foreach ($nordvpn_file as $tmp) {

        if($tmp['features']['socks'] == 1){

            $nordvpn_socks['domain'][$i] = $tmp['domain'];
            $nordvpn_socks['ip_address'][$i] = $tmp['domain'];

        }

        $i++;

    }

    $count_nordvpn_socks_domain = count($nordvpn_socks['domain']);
    $count_nordvpn_socks_ip_address = count($nordvpn_socks['ip_address']);


    $nordvpn_socks = $nordvpn_socks['domain'][$index];

    if(isset($nordvpn_socks['domain'][$index])){

        #$nordvpn_socks = false;
        $nordvpn_socks = $nordvpn_socks['ip_address'][$index];

    }

    $cookies = 'cookies/';

    $options = array(

        CURLOPT_MAXREDIRS       => 4,
        CURLOPT_CONNECTTIMEOUT  => $timeout['CURLOPT_CONNECTTIMEOUT'],
        CURLOPT_ENCODING        => '',
        CURLOPT_FOLLOWLOCATION  => false,
        #CURLOPT_HEADER         => true,
        CURLOPT_HTTPGET         => true,
        CURLOPT_HTTPHEADER      => $headers,
        CURLOPT_HTTPPROXYTUNNEL => true,
        CURLOPT_PROXY           => $nordvpn_socks,
        CURLOPT_PROXYUSERPWD    => $credentials['nordvpn'],
        CURLOPT_PROXYPORT       => '1080',
        CURLOPT_PROXYTYPE       => 7,
        CURLOPT_RETURNTRANSFER  => true,
        CURLOPT_SSL_VERIFYHOST  => false,
        CURLOPT_SSL_VERIFYPEER  => false,
        CURLOPT_TIMEOUT         => $timeout['CURLOPT_TIMEOUT'],
        CURLOPT_VERBOSE         => false,
        CURLOPT_COOKIE          => $cookies,
        CURLOPT_COOKIEFILE      => $cookies,
        CURLOPT_COOKIEJAR       => $cookies,
        CURLOPT_COOKIESESSION   => $cookies,
        CURLOPT_COOKIELIST      => $cookies,
        CURLOPT_RETURNTRANSFER  => 1,
        CURLOPT_CUSTOMREQUEST   => 'GET',
        CURLOPT_ENCODING        => 'gzip, deflate',

    );

    $information['options'] = $options;
    $information['server'] = $nordvpn_socks;
    
    return $information;

}
function torguard_server_socks5($headers, $timeout, $credentials){

    $cookies = 'cookies/';

    $options = array(

        CURLOPT_MAXREDIRS       => 4,
        CURLOPT_CONNECTTIMEOUT  => $timeout['CURLOPT_CONNECTTIMEOUT'],
        CURLOPT_ENCODING        => '',
        CURLOPT_FOLLOWLOCATION  => false,
        #CURLOPT_HEADER         => true,
        CURLOPT_HTTPGET         => true,
        CURLOPT_HTTPHEADER      => $headers,
        CURLOPT_HTTPPROXYTUNNEL => true,
        CURLOPT_PROXY           => 'proxy.torguard.org',
        CURLOPT_PROXYUSERPWD    => $credentials['torguard'],
        CURLOPT_PROXYPORT       => '1080',
        CURLOPT_PROXYTYPE       => 7,
        CURLOPT_RETURNTRANSFER  => true,
        CURLOPT_SSL_VERIFYHOST  => false,
        CURLOPT_SSL_VERIFYPEER  => false,
        CURLOPT_TIMEOUT         => $timeout['CURLOPT_TIMEOUT'],
        CURLOPT_VERBOSE         => false,
        CURLOPT_COOKIE          => $cookies,
        CURLOPT_COOKIEFILE      => $cookies,
        CURLOPT_COOKIEJAR       => $cookies,
        CURLOPT_COOKIESESSION   => $cookies,
        CURLOPT_COOKIELIST      => $cookies,
        CURLOPT_RETURNTRANSFER  => 1,
        CURLOPT_CUSTOMREQUEST   => 'GET',
        CURLOPT_ENCODING        => 'gzip, deflate',

    );

    $information['options'] = $options;
    $information['server'] = 'proxy.torguard.org';
    
    return $information;

}
function proxyrack_random($headers, $timeout, $credentials){


    $cookies = 'cookies/';

    $options = array(

        CURLOPT_MAXREDIRS       => 4,
        CURLOPT_CONNECTTIMEOUT  => $timeout['CURLOPT_CONNECTTIMEOUT'],
        CURLOPT_ENCODING        => '',
        CURLOPT_FOLLOWLOCATION  => false,
        #CURLOPT_HEADER         => true,
        CURLOPT_HTTPGET         => true,
        CURLOPT_HTTPHEADER      => $headers,
        CURLOPT_HTTPPROXYTUNNEL => true,
        CURLOPT_PROXY           => 'megaproxy.rotating.proxyrack.net:222',
        CURLOPT_PROXYUSERPWD    => $credentials['proxyrack'],
        CURLOPT_RETURNTRANSFER  => true,
        CURLOPT_SSL_VERIFYHOST  => false,
        CURLOPT_SSL_VERIFYPEER  => false,
        CURLOPT_TIMEOUT         => $timeout['CURLOPT_TIMEOUT'],
        CURLOPT_VERBOSE         => false,
        CURLOPT_COOKIE          => $cookies,
        CURLOPT_COOKIEFILE      => $cookies,
        CURLOPT_COOKIEJAR       => $cookies,
        CURLOPT_COOKIESESSION   => $cookies,
        CURLOPT_COOKIELIST      => $cookies,
        CURLOPT_RETURNTRANSFER  => 1,
        CURLOPT_CUSTOMREQUEST   => 'GET',
        CURLOPT_ENCODING        => 'gzip, deflate',

    );

    $information['options'] = $options;
    $information['server'] = 'megaproxy.rotating.proxyrack.net:222';
    
    return $information;

}
function torguard_server_http_https($headers, $index, $timeout, $credentials){

    $torguard_http_server = array(

        'br.torguardvpnaccess.com',
        'chil.torguardvpnaccess.com',
        'ca.torguardvpnaccess.com',
        'vanc.ca.west.torguardvpnaccess.com',
        'cr.torguardvpnaccess.com',
        'mx.torguardvpnaccess.com',
        'atl.east.usa.torguardvpnaccess.com',
        'la.west.usa.torguardvpnaccess.com',
        'fl.east.usa.torguardvpnaccess.com',
        'dal.central.usa.torguardvpnaccess.com',
        'nj.east.usa.torguardvpnaccess.com',
        'ny.east.usa.torguardvpnaccess.com',
        'chi.central.usa.torguardvpnaccess.com',
        'lv.west.usa.torguardvpnaccess.com',
        'sf.west.usa.torguardvpnaccess.com',
        'sa.west.usa.torguardvpnaccess.com',
        'aus.torguardvpnaccess.com',
        'bg.torguardvpnaccess.com',
        'bul.torguardvpnaccess.com',
        'cp.torguardvpnaccess.com',
        'czech.torguardvpnaccess.com',
        'den.torguardvpnaccess.com',
        'fin.torguardvpnaccess.com',
        'fr.torguardvpnaccess.com',
        'gr.torguardvpnaccess.com',
        'gre.torguardvpnaccess.com',
        'hg.torguardvpnaccess.com',
        'ice.torguardvpnaccess.com',
        'ire.torguardvpnaccess.com',
        'it.torguardvpnaccess.com',
        'lv.torguardvpnaccess.com',
        'lux.torguardvpnaccess.com',
        'nl.torguardvpnaccess.com',
        'no.torguardvpnaccess.com',
        'pl.torguardvpnaccess.com',
        'por.torguardvpnaccess.com',
        'ro.torguardvpnaccess.com',
        'mos.ru.torguardvpnaccess.com',
        'ru.torguardvpnaccess.com',
        'slk.torguardvpnaccess.com',
        'sp.torguardvpnaccess.com',
        'swe.torguardvpnaccess.com',
        'swiss.torguardvpnaccess.com',
        'turk.torguardvpnaccess.com',
        'ukr.torguardvpnaccess.com',
        'uk.torguardvpnaccess.com',
        'au.torguardvpnaccess.com',
        'melb.au.torguardvpnaccess.com',
        'hk.torguardvpnaccess.com',
        'jp.torguardvpnaccess.com',
        'sk.torguardvpnaccess.com',
        'my.torguardvpnaccess.com',
        'nz.torguardvpnaccess.com',
        'singp.torguardvpnaccess.com',
        'loc2.singp.torguardvpnaccess.com',
        'tw.torguardvpnaccess.com',
        'thai.torguardvpnaccess.com',
        'vn.torguardvpnaccess.com',
        'egy.torguardvpnaccess.com',
        'loc2.in.torguardvpnaccess.com',
        'in.torguardvpnaccess.com',
        'isr.torguardvpnaccess.com',
        'za.torguardvpnaccess.com',
        'saudi.torguardvpnaccess.com',
        'tun.torguardvpnaccess.com',
        'uae.torguardvpnaccess.com',
        'cz.anyconnect.host',
        'ger.anyconnect.host',
        'hk.anyconnect.host',
        'id.anyconnect.host',
        'it.anyconnect.host',
        'nl.anyconnect.host',
        'pl.anyconnect.host',
        'sg.anyconnect.host',
        'tw.anyconnect.host',
        'uk.anyconnect.host',
        'la.usa.anyconnect.host',
        'ny.usa.anyconnect.host',
        'ger.sstp.host',
        'hk.sstp.host',
        'nl.sstp.host',
        'spa.sstp.host',
        'uk.sstp.host',
        'usa.sstp.host',

    );

    $count_torguard_http_server = count($torguard_http_server, $index);

    $cookies = 'cookies/';

    $tor_guard = $torguard_http_server[$index];


    $options = array(

        CURLOPT_MAXREDIRS       => 4,
        CURLOPT_CONNECTTIMEOUT  => $timeout['CURLOPT_CONNECTTIMEOUT'],
        CURLOPT_ENCODING        => '',
        CURLOPT_FOLLOWLOCATION  => false,
        #CURLOPT_HEADER         => true,
        CURLOPT_HTTPGET         => true,
        CURLOPT_HTTPHEADER      => $headers,
        CURLOPT_HTTPPROXYTUNNEL => true,
        CURLOPT_PROXY           => $tor_guard,
        CURLOPT_PROXYUSERPWD    => $credentials['torguard'],
        CURLOPT_PROXYPORT       => '6060',
        CURLOPT_RETURNTRANSFER  => true,
        CURLOPT_SSL_VERIFYHOST  => false,
        CURLOPT_SSL_VERIFYPEER  => false,
        CURLOPT_TIMEOUT         => 10,
        CURLOPT_VERBOSE         => false,
        CURLOPT_COOKIE          => $cookies,
        CURLOPT_COOKIEFILE      => $cookies,
        CURLOPT_COOKIEJAR       => $cookies,
        CURLOPT_COOKIESESSION   => $cookies,
        CURLOPT_COOKIELIST      => $cookies,
        CURLOPT_RETURNTRANSFER  => 1,
        CURLOPT_CUSTOMREQUEST   => 'GET',
        CURLOPT_ENCODING        => 'gzip, deflate',

    );

    $information['options'] = $options;
    $information['server'] = $tor_guard;
    
    return $information;

}
function proxyrack_http($headers, $index, $timeout, $credentials){

    $proxyrack_http_server = array(

            '209.205.212.34:1200',
            '209.205.212.34:1201',
            '209.205.212.34:1202',
            '209.205.212.34:1203',
            '209.205.212.34:1204',
            '209.205.212.34:1205',
            '209.205.212.34:1206',
            '209.205.212.34:1207',
            '209.205.212.34:1208',
            '209.205.212.34:1209',
            '209.205.212.34:1210',
            '209.205.212.34:1211',
            '209.205.212.34:1212',
            '209.205.212.34:1213',
            '209.205.212.34:1214',
            '209.205.212.34:1215',
            '209.205.212.34:1216',
            '209.205.212.34:1217',
            '209.205.212.34:1218',
            '209.205.212.34:1219',
            '209.205.212.34:1220',
            '209.205.212.34:1221',
            '209.205.212.34:1222',
            '209.205.212.34:1223',
            '209.205.212.34:1224',
            '209.205.212.34:1225',
            '209.205.212.34:1226',
            '209.205.212.34:1227',
            '209.205.212.34:1228',
            '209.205.212.34:1229',
            '209.205.212.34:1230',
            '209.205.212.34:1231',
            '209.205.212.34:1232',
            '209.205.212.34:1233',
            '209.205.212.34:1234',
            '209.205.212.34:1235',
            '209.205.212.34:1236',
            '209.205.212.34:1237',
            '209.205.212.34:1238',
            '209.205.212.34:1239',
            '209.205.212.34:1240',
            '209.205.212.34:1241',
            '209.205.212.34:1242',
            '209.205.212.34:1243',
            '209.205.212.34:1244',
            '209.205.212.34:1245',
            '209.205.212.34:1246',
            '209.205.212.34:1247',
            '209.205.212.34:1248',
            '209.205.212.34:1249',
            '209.205.212.34:1250',
            '209.205.212.34:222',
            '209.205.212.35:222',
            '209.205.212.36:222',
            '209.205.212.37:222',
            '209.205.212.38:222',

    );

    $count_proxyrack_http_server = count($proxyrack_http_server, $index);

    $cookies = 'cookies/';

    $proxyrack = $proxyrack_http_server[$index];


    $options = array(

        CURLOPT_MAXREDIRS       => 4,
        CURLOPT_CONNECTTIMEOUT  => $timeout['CURLOPT_CONNECTTIMEOUT'],
        CURLOPT_ENCODING        => '',
        CURLOPT_FOLLOWLOCATION  => false,
        #CURLOPT_HEADER         => true,
        CURLOPT_HTTPGET         => true,
        CURLOPT_HTTPHEADER      => $headers,
        CURLOPT_HTTPPROXYTUNNEL => true,
        CURLOPT_PROXY           => $proxyrack,
        CURLOPT_PROXYUSERPWD    => $credentials['proxyrack'],
        CURLOPT_RETURNTRANSFER  => true,
        CURLOPT_SSL_VERIFYHOST  => false,
        CURLOPT_SSL_VERIFYPEER  => false,
        CURLOPT_TIMEOUT         => 10,
        CURLOPT_VERBOSE         => false,
        CURLOPT_COOKIE          => $cookies,
        CURLOPT_COOKIEFILE      => $cookies,
        CURLOPT_COOKIEJAR       => $cookies,
        CURLOPT_COOKIESESSION   => $cookies,
        CURLOPT_COOKIELIST      => $cookies,
        CURLOPT_RETURNTRANSFER  => 1,
        CURLOPT_CUSTOMREQUEST   => 'GET',
        CURLOPT_ENCODING        => 'gzip, deflate',

    );

    $information['options'] = $options;
    $information['server'] = $proxyrack;
    
    return $information;

}
function proxyrack_socks5($headers, $index, $timeout, $credentials){

    $proxyrack_http_server = array(

            '209.205.212.34:1200',
            '209.205.212.34:1201',
            '209.205.212.34:1202',
            '209.205.212.34:1203',
            '209.205.212.34:1204',
            '209.205.212.34:1205',
            '209.205.212.34:1206',
            '209.205.212.34:1207',
            '209.205.212.34:1208',
            '209.205.212.34:1209',
            '209.205.212.34:1210',
            '209.205.212.34:1211',
            '209.205.212.34:1212',
            '209.205.212.34:1213',
            '209.205.212.34:1214',
            '209.205.212.34:1215',
            '209.205.212.34:1216',
            '209.205.212.34:1217',
            '209.205.212.34:1218',
            '209.205.212.34:1219',
            '209.205.212.34:1220',
            '209.205.212.34:1221',
            '209.205.212.34:1222',
            '209.205.212.34:1223',
            '209.205.212.34:1224',
            '209.205.212.34:1225',
            '209.205.212.34:1226',
            '209.205.212.34:1227',
            '209.205.212.34:1228',
            '209.205.212.34:1229',
            '209.205.212.34:1230',
            '209.205.212.34:1231',
            '209.205.212.34:1232',
            '209.205.212.34:1233',
            '209.205.212.34:1234',
            '209.205.212.34:1235',
            '209.205.212.34:1236',
            '209.205.212.34:1237',
            '209.205.212.34:1238',
            '209.205.212.34:1239',
            '209.205.212.34:1240',
            '209.205.212.34:1241',
            '209.205.212.34:1242',
            '209.205.212.34:1243',
            '209.205.212.34:1244',
            '209.205.212.34:1245',
            '209.205.212.34:1246',
            '209.205.212.34:1247',
            '209.205.212.34:1248',
            '209.205.212.34:1249',
            '209.205.212.34:1250',
            '209.205.212.34:222',
            '209.205.212.35:222',
            '209.205.212.36:222',
            '209.205.212.37:222',
            '209.205.212.38:222',

    );

    $count_proxyrack_http_server = count($proxyrack_http_server, $index);

    $cookies = 'cookies/';

    $proxyrack = $proxyrack_http_server[$index];

    $options = array(

        CURLOPT_MAXREDIRS       => 4,
        CURLOPT_CONNECTTIMEOUT  => $timeout['CURLOPT_CONNECTTIMEOUT'],
        CURLOPT_ENCODING        => '',
        CURLOPT_FOLLOWLOCATION  => false,
        #CURLOPT_HEADER         => true,
        CURLOPT_HTTPGET         => true,
        CURLOPT_HTTPHEADER      => $headers,
        CURLOPT_HTTPPROXYTUNNEL => true,
        CURLOPT_PROXY           => $proxyrack,
        CURLOPT_PROXYUSERPWD    => $credentials['proxyrack'],
        CURLOPT_PROXYTYPE       => 7,
        CURLOPT_RETURNTRANSFER  => true,
        CURLOPT_SSL_VERIFYHOST  => false,
        CURLOPT_SSL_VERIFYPEER  => false,
        CURLOPT_TIMEOUT         => 10,
        CURLOPT_VERBOSE         => false,
        CURLOPT_COOKIE          => $cookies,
        CURLOPT_COOKIEFILE      => $cookies,
        CURLOPT_COOKIEJAR       => $cookies,
        CURLOPT_COOKIESESSION   => $cookies,
        CURLOPT_COOKIELIST      => $cookies,
        CURLOPT_RETURNTRANSFER  => 1,
        CURLOPT_CUSTOMREQUEST   => 'GET',
        CURLOPT_ENCODING        => 'gzip, deflate',

    );

    $information['options'] = $options;
    $information['server'] = $proxyrack;
    
    return $information;

}
function cURL($selection, $test_against, $index, $timeout, $credentials, $public_proxy_txt){

    if(!is_dir('cookies/')){

        mkdir('cookies/');

    }

    if($test_against === 'default'){

        $url = 'https://api.ipify.org/';

    }

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

    $headers = array();
    $headers[] = 'Connection: keep-alive';
    $headers[] = 'Cache-Control: max-age=0';
    $headers[] = 'Upgrade-Insecure-Requests: 1';
    $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36';
    $headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8';
    $headers[] = 'Accept-Encoding: gzip, deflate, br';
    $headers[] = 'Accept-Language: en';
    $options = array();

    if($selection === 0){

        $information = direct_connection($headers, $timeout);
        $direct = true;
        $type = 'direct';

    }if($selection === 1){

        $information = public_proxy_http($public_proxy_txt, $headers, $index, $timeout);
        $direct = false;
        $type = 'http';

    }
    if($selection === 2){

        $information = public_proxy_https($public_proxy_txt, $headers, $index, $timeout);
        $direct = false;
        $type = 'https';
    }
    if($selection === 3){

        $information = public_proxy_socks4($public_proxy_txt, $headers, $index, $timeout);
        $direct = false;
        $type = 'socks4';

    }
    if($selection === 4){

        $information = public_proxy_socks5($public_proxy_txt, $headers, $index, $timeout);
        $direct = false;
        $type = 'socks5';

    }
    if($selection === 5){

        $information = torguard_server_http_https($headers, $index, $timeout, $credentials);
        $direct = false;
        $type = 'torguard_http_https';

    }
    if($selection === 6){

        $information = torguard_server_socks5($headers, $timeout, $credentials);
        $direct = false;
        $type = 'torguard_socks5';

    }
    if($selection === 7){

        $information = pia_server_socks5($headers, $timeout, $credentials);
        $direct = false;
        $type = 'pia_socks5';

    }
    if($selection === 8){

        $information = nordvpn_server_socks5($headers, $index, $timeout, $credentials);
        $direct = false;
        $type = 'nordvpn_socks5';


    }
    if($selection === 9){

        $information = proxyrack_socks5($headers, $index, $timeout, $credentials);
        $direct = false;
        $type = 'proxyrack_socks5';


    }
    if($selection === 10){

        $information = proxyrack_http($headers, $index, $timeout, $credentials);
        $direct = false;
        $type = 'proxyrack_http';


    }if($selection === 11){

        $information = proxyrack_random($headers, $timeout, $credentials);
        $direct = false;
        $type = 'proxyrack_random';


    }

    curl_setopt_array($ch, $information['options']);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);

    if (curl_errno($ch)) {

        if($direct == false){

            logs_fail($information['server'], $type);
            return 'Error: ' . curl_error($ch).' '.$information['server'];

        } else {
            return 'Error:' . curl_error($ch);

        }
    } else {

        if($direct == true){

            if($test_against == 'default'){

                logs_good_result($result, $type);
                return 'Working: - '.$result;

            } else {
                return 'Working!';

            }

        } else {

            if($test_against == 'default'){

                logs_good($information['server'], $type);
                logs_good_result($result, $type);
                return "Working: ".$result. " <---> ".$information['server'];

            } else {

                logs_good($information['server'], $type);
                return 'Working: '.$information['server'];

            }

        }

    }

    curl_close ($ch);

}
function logs_good_result($ip, $type){

    $fp = fopen("proxy-good-result-".$type.".txt", "a+");
    fwrite($fp, $ip."\n");
    fclose($fp);

}
function logs_good($ip, $type){

    $fp = fopen("proxy-good-".$type.".txt", "a+");
    fwrite($fp, $ip."\n");
    fclose($fp);

}
function logs_fail($ip, $type){

    $fp = fopen("proxy-fail-".$type.".txt", "a+");
    fwrite($fp, $ip."\n");
    fclose($fp);


}

for($index = 0; $index < $how_much_times; $index++){

    print cURL($selection, $test_against, $index, $timeout, $credentials, $public_proxy_txt)."\n";
    flush();

}


?>
