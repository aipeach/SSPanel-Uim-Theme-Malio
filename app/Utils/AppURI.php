<?php

namespace App\Utils;

use App\Services\Config;

class AppURI
{
    public static function getSurgeURI($item, $version)
    {
        $return = null;
        switch ($version) {
            case 2:
                if ($item['obfs'] == 'v2ray') {
                    break;
                }
                if ($item['type'] == 'ss') {
                    $return = ($item['remark'] . ' = custom, ' . $item['address'] . ', ' . $item['port'] . ', ' . $item['method'] . ', ' . $item['passwd'] . ', https://raw.githubusercontent.com/lhie1/Rules/master/SSEncrypt.module' . URL::getSurgeObfs($item));
                }
                break;
            default:
                switch ($item['type']) {
                    case 'ss':
                        if ($item['obfs'] == 'v2ray') {
                            break;
                        }
                        $return = ($item['remark'] . ' = ss, ' . $item['address'] . ', ' . $item['port'] . ', encrypt-method=' . $item['method'] . ', password=' . $item['passwd'] . URL::getSurgeObfs($item) . ', udp-relay=true');
                        break;
                    case 'vmess':
                        if (!in_array($item['net'], ['ws', 'tcp'])) {
                            break;
                        }
                        $tls = ($item['tls'] == 'tls'
                            ? ', tls=true'
                            : '');
                        $ws = ($item['net'] == 'ws'
                            ? ', ws=true, ws-path=' . $item['path'] . ', ws-headers=host:' . $item['host']
                            : '');
                        $return = $item['remark'] . ' = vmess, ' . $item['add'] . ', ' . $item['port'] . ', username = ' . $item['id'] . $ws . $tls;
                        break;
                    case 'trojan':
                        $return = ($item['remark'] . ' = trojan, ' . $item['address'] . ', ' . $item['port'] . ', password=' . $item['passwd']) . ", sni=" . $item['host'];
                        break;
                }
                break;
        }
        return $return;
    }

    public static function getQuantumultURI($item, $base64_encode = false)
    {
        $return = null;
        switch ($item['type']) {
            case 'ss':
                if ($item['obfs'] == 'v2ray') {
                    break;
                }
                $return = ($item['remark'] . ' = shadowsocks, ' . $item['address'] . ', ' . $item['port'] . ', ' . $item['method'] . ', "' . $item['passwd'] . '", upstream-proxy=false, upstream-proxy-auth=false' . URL::getSurgeObfs($item) . ', group=' . Config::get('appName') . '_ss');
                break;
            case 'ssr':
                $return = ($item['remark'] . ' = shadowsocksr, ' . $item['address'] . ', ' . $item['port'] . ', ' . $item['method'] . ', "' . $item['passwd'] . '", protocol=' . $item['protocol'] . ', protocol_param=' . $item['protocol_param'] . ', obfs=' . $item['obfs'] . ', obfs_param="' . $item['obfs_param'] . '", group=' . Config::get('appName'));
                break;
            case 'vmess':
                if (!in_array($item['net'], ['ws', 'tcp', 'http'])) {
                    break;
                }
                $tls = ', over-tls=false, certificate=1';
                if ($item['tls'] == 'tls') {
                    $tls = ', over-tls=true';
                    if ($item['verify_cert']) {
                        $tls .=', tls-host=' . $item['host'];
                        $tls .= ', certificate=1';
                    } else {
                        $tls .=', tls-host=' . $item['host'];
                        $tls .= ', certificate=0';
                    }
                }
                $obfs = '';
                if (in_array($item['net'], ['ws', 'http'])) {
                    $obfs = ', obfs=' . $item['net'] . ', obfs-path="' . $item['path'] . '", obfs-header="Host: ' . $item['host'] . '[Rr][Nn]User-Agent: Mozilla/5.0 (iPhone; CPU iPhone OS 18_0_0 like Mac OS X) AppleWebKit/888.8.88 (KHTML, like Gecko) Mobile/6666666"';
                }
                $return = ($item['remark'] . ' = vmess, ' . $item['add'] . ', ' . $item['port'] . ', chacha20-ietf-poly1305, "' . $item['id'] . '", group=' . Config::get('appName') . '_VMess' . $tls . $obfs);
                if ($base64_encode === true) {
                    $return = 'vmess://' . base64_encode($return);
                }
                break;
        }
        return $return;
    }

    public static function getQuantumultXURI($item)
    {
        $return = null;
        switch ($item['type']) {
            case 'ss':
                // ;shadowsocks=example.com:80, method=chacha20, password=pwd, obfs=http, obfs-host=bing.com, obfs-uri=/resource/file, fast-open=false, udp-relay=false, server_check_url=http://www.apple.com/generate_204, tag=ss-01
                // ;shadowsocks=example.com:80, method=chacha20, password=pwd, obfs=http, obfs-host=bing.com, obfs-uri=/resource/file, fast-open=false, udp-relay=false, tag=ss-02
                // ;shadowsocks=example.com:443, method=chacha20, password=pwd, obfs=tls, obfs-host=bing.com, fast-open=false, udp-relay=false, tag=ss-03
                // ;shadowsocks=example.com:80, method=aes-128-gcm, password=pwd, obfs=ws, fast-open=false, udp-relay=false, tag=ss-ws-01
                // ;shadowsocks=example.com:80, method=aes-128-gcm, password=pwd, obfs=ws, obfs-uri=/ws, fast-open=false, udp-relay=false, tag=ss-ws-02
                // ;shadowsocks=example.com:443, method=aes-128-gcm, password=pwd, obfs=wss, obfs-uri=/ws, fast-open=false, udp-relay=false, tag=ss-ws-tls
                $return = ('shadowsocks=' . $item['address'] . ':' . $item['port'] . ', method=' . $item['method'] . ', password=' . $item['passwd']);
                switch ($item['obfs']) {
                    case 'simple_obfs_http':
                        $return .= ', obfs=http';
                        $return .= ($item['obfs_param'] != '' ? ', obfs-host=' . $item['obfs_param'] : ', obfs-host=wns.windows.com');
                        $return .= ', obfs-uri=/';
                        break;
                    case 'simple_obfs_tls':
                        $return .= ', obfs=tls';
                        $return .= ($item['obfs_param'] != '' ? ', obfs-host=' . $item['obfs_param'] : ', obfs-host=wns.windows.com');
                        $return .= ', obfs-uri=/';
                        break;
                    case 'v2ray';
                        $return .= ($item['tls'] == 'tls' ? ', obfs=wss' : ', obfs=ws');
                        $return .= ', obfs-uri=' . $item['path'];
                        break;
                }
                $return .= (', tag=' . $item['remark']);
                break;
            case 'ssr':
                // ;shadowsocks=example.com:443, method=chacha20, password=pwd, ssr-protocol=auth_chain_b, ssr-protocol-param=def, obfs=tls1.2_ticket_fastauth, obfs-host=bing.com, tag=ssr
                $return = ('shadowsocks=' . $item['address'] . ':' . $item['port'] . ', method=' . $item['method'] . ', password=' . $item['passwd']);
                $return .= (', ssr-protocol=' . $item['protocol']);
                $return .= (', ssr-protocol-param=' . $item['protocol_param']);
                $return .= (', obfs=' . $item['obfs']);
                $return .= (', obfs-host="' . $item['obfs_param']);
                $return .= (', tag=' . $item['remark']);
                break;
            case 'vmess':
                // ;vmess=example.com:80, method=none, password=23ad6b10-8d1a-40f7-8ad0-e3e35cd32291, fast-open=false, udp-relay=false, tag=vmess-01
                // ;vmess=example.com:80, method=aes-128-gcm, password=23ad6b10-8d1a-40f7-8ad0-e3e35cd32291, fast-open=false, udp-relay=false, tag=vmess-02
                // ;vmess=example.com:443, method=none, password=23ad6b10-8d1a-40f7-8ad0-e3e35cd32291, obfs=over-tls, fast-open=false, udp-relay=false, tag=vmess-tls
                // ;vmess=example.com:80, method=chacha20-poly1305, password=23ad6b10-8d1a-40f7-8ad0-e3e35cd32291, obfs=ws, obfs-uri=/ws, fast-open=false, udp-relay=false, tag=vmess-ws
                // ;vmess=example.com:443, method=chacha20-poly1305, password=23ad6b10-8d1a-40f7-8ad0-e3e35cd32291, obfs=wss, obfs-uri=/ws, fast-open=false, udp-relay=false, tag=vmess-ws-tls
                if (!in_array($item['net'], ['ws', 'tcp'])) {
                    break;
                }
                $return = ('vmess=' . $item['add'] . ':' . $item['port'] . ', method=chacha20-poly1305' . ', password=' . $item['id']);
                switch ($item['net']) {
                    case 'ws':
                        $return .= ($item['tls'] == 'tls' ? ', obfs=wss' : ', obfs=ws');
                        $return .= ', obfs-uri=' . $item['path'];
                        break;
                    case 'tcp':
                        $return .= ($item['tls'] == 'tls' ? ', obfs=over-tls' : '');
                        break;
                }
                $return .= (', tag=' . $item['remark']);
                break;
            case 'trojan':
                // ;trojan=example.com:443, password=pwd, over-tls=true, tls-verification=true, fast-open=false, udp-relay=false, tag=trojan-tls-01
                $return  = ('trojan=' . $item['address'] . ':' . $item['port'] . ', password=' . $item['passwd'] . ', tls-host=' . $item['host']);
                $return .= ', over-tls=true, tls-verification=true';
                $return .= (', tag=' . $item['remark']);
                break;
        }
        return $return;
    }

    public static function getSurfboardURI($item)
    {
        $return = null;
        switch ($item['type']) {
            case 'ss':
                if ($item['obfs'] == 'v2ray') {
                    break;
                }
                $return = ($item['remark'] . ' = custom, ' . $item['address'] . ', ' . $item['port'] . ', ' . $item['method'] . ', ' . $item['passwd'] . ', https://raw.githubusercontent.com/lhie1/Rules/master/SSEncrypt.module' . URL::getSurgeObfs($item));
                break;
        }
        return $return;
    }

    public static function getClashURI($item, $ssr_support = false)
    {
        $return = null;
        if ($item['type'] == 'ssr' && $ssr_support === false) {
            return $return;
        }
        switch ($item['type']) {
            case 'ss':
                $method = ['rc4-md5-6', 'camellia-128-cfb', 'camellia-192-cfb', 'camellia-256-cfb', 'bf-cfb', 'cast5-cfb', 'des-cfb', 'des-ede3-cfb', 'idea-cfb', 'rc2-cfb', 'seed-cfb', 'salsa20', 'chacha20', 'xsalsa20', 'none'];
                if (in_array($item['method'], $method)) {
                    // 不支持的
                    break;
                }
                $return = [
                    'name' => $item['remark'],
                    'type' => 'ss',
                    'server' => $item['address'],
                    'port' => $item['port'],
                    'cipher' => $item['method'],
                    'password' => $item['passwd'],
                    'udp' => true
                ];
                if ($item['obfs'] != 'plain') {
                    switch ($item['obfs']) {
                        case 'simple_obfs_http':
                            $return['plugin'] = 'obfs';
                            $return['plugin-opts']['mode'] = 'http';
                            break;
                        case 'simple_obfs_tls':
                            $return['plugin'] = 'obfs';
                            $return['plugin-opts']['mode'] = 'tls';
                            break;
                        case 'v2ray':
                            $return['plugin'] = 'v2ray-plugin';
                            $return['plugin-opts']['mode'] = 'websocket';
                            if ($item['tls'] == 'tls') {
                                $return['plugin-opts']['tls'] = true;
                                if ($item['verify_cert'] == false) {
                                    $return['plugin-opts']['skip-cert-verify'] = true;
                                }
                            }
                            $return['plugin-opts']['host'] = $item['host'];
                            $return['plugin-opts']['path'] = $item['path'];
                            break;
                    }
                    if ($item['obfs'] != 'v2ray') {
                        if ($item['obfs_param'] != '') {
                            $return['plugin-opts']['host'] = $item['obfs_param'];
                        } else {
                            $return['plugin-opts']['host'] = 'windowsupdate.windows.com';
                        }
                    }
                }
                break;
            case 'ssr':
                if (
                    in_array($item['method'], ['rc4-md5-6', 'des-ede3-cfb', 'xsalsa20', 'none'])
                    ||
                    in_array($item['protocol'], array_merge(Config::getSupportParam('allow_none_protocol'), ['verify_deflate']))
                    ||
                    in_array($item['obfs'], ['tls1.2_ticket_fastauth'])
                ) {
                    // 不支持的
                    break;
                }
                $return = [
                    'name' => $item['remark'],
                    'type' => 'ssr',
                    'server' => $item['address'],
                    'port' => $item['port'],
                    'cipher' => $item['method'],
                    'password' => $item['passwd'],
                    'protocol' => $item['protocol'],
                    'protocolparam' => $item['protocol_param'],
                    'obfs' => $item['obfs'],
                    'obfsparam' => $item['obfs_param']
                ];
                break;
            case 'vmess':
                if (!in_array($item['net'], array('ws', 'tcp'))) {
                    break;
                }
                $return = [
                    'name' => $item['remark'],
                    'type' => 'vmess',
                    'server' => $item['add'],
                    'port' => $item['port'],
                    'uuid' => $item['id'],
                    'alterId' => $item['aid'],
                    'cipher' => 'auto',
                    'udp' => true
                ];
                if ($item['net'] == 'ws') {
                    $return['network'] = 'ws';
                    $return['ws-path'] = $item['path'];
                    $return['ws-headers']['Host'] = ($item['host'] != '' ? $item['host'] : $item['add']);
                }
                if ($item['tls'] == 'tls') {
                    $return['tls'] = true;
                    if ($item['verify_cert'] == false) {
                        $return['skip-cert-verify'] = true;
                    }
                }
                break;
            case 'vless':
                if (!in_array($item['net'], ['tcp', 'ws', 'grpc', 'h2', 'http'])) {
                    break;
                }
                $server = (isset($item['add']) ? $item['add'] : $item['address']);
                $sni = (isset($item['sni']) && trim((string) $item['sni']) !== ''
                    ? (string) $item['sni']
                    : (isset($item['host']) && trim((string) $item['host']) !== ''
                        ? (string) $item['host']
                        : (string) $server));
                $security = strtolower(trim((string) ($item['security'] ?? '')));
                if ($security === '' && isset($item['tls']) && $item['tls'] === 'tls') {
                    $security = 'tls';
                }
                $return = [
                    'name' => $item['remark'],
                    'type' => 'vless',
                    'server' => $server,
                    'port' => $item['port'],
                    'uuid' => $item['id'],
                    'network' => $item['net'],
                    'udp' => true
                ];
                if ($item['net'] == 'ws') {
                    $return['ws-path'] = $item['path'];
                    $return['ws-headers']['Host'] = (isset($item['host']) && $item['host'] != '' ? $item['host'] : $server);
                }
                if (in_array($security, ['tls', 'reality'], true)) {
                    $return['tls'] = true;
                    $return['servername'] = $sni;
                    if (isset($item['verify_cert']) && $item['verify_cert'] == false) {
                        $return['skip-cert-verify'] = true;
                    }
                }
                if ($security === 'reality') {
                    if (isset($item['pbk']) && trim((string) $item['pbk']) !== '') {
                        $return['reality-opts']['public-key'] = (string) $item['pbk'];
                    }
                    if (isset($item['sid']) && trim((string) $item['sid']) !== '') {
                        $return['reality-opts']['short-id'] = (string) $item['sid'];
                    }
                    if (isset($item['fp']) && trim((string) $item['fp']) !== '') {
                        $return['client-fingerprint'] = (string) $item['fp'];
                    }
                }
                if (isset($item['flow']) && trim((string) $item['flow']) !== '') {
                    $return['flow'] = (string) $item['flow'];
                }
                break;
            case 'trojan':
                $return = [
                    'name'        => $item['remark'],
                    'type'        => 'trojan',
                    'server'      => $item['address'],
                    'port'        => $item['port'],
                    'password'    => $item['passwd'],
                    'sni'         => $item['host']
                ];
                break;
            case 'anytls':
                $return = [
                    'name'                        => $item['remark'],
                    'type'                        => 'anytls',
                    'server'                      => $item['address'],
                    'port'                        => $item['port'],
                    'password'                    => $item['passwd'],
                    'client-fingerprint'          => (isset($item['client_fingerprint']) && trim((string) $item['client_fingerprint']) !== '')
                        ? (string) $item['client_fingerprint']
                        : 'chrome',
                    'udp'                         => (array_key_exists('udp', $item) ? self::isTruthy($item['udp']) : true),
                    'idle-session-check-interval' => (isset($item['idle_session_check_interval']) ? (int) $item['idle_session_check_interval'] : 30),
                    'idle-session-timeout'        => (isset($item['idle_session_timeout']) ? (int) $item['idle_session_timeout'] : 30),
                    'min-idle-session'            => (isset($item['min_idle_session']) ? (int) $item['min_idle_session'] : 0),
                ];
                if (isset($item['host']) && trim((string) $item['host']) !== '') {
                    $return['sni'] = (string) $item['host'];
                }
                if (isset($item['insecure']) && self::isTruthy($item['insecure'])) {
                    $return['skip-cert-verify'] = true;
                }
                break;
        }
        return $return;
    }

    public static function getShadowrocketURI($item)
    {
        $return = null;
        switch ($item['type']) {
            case 'ss':
                if (in_array($item['obfs'], Config::getSupportParam('ss_obfs'))) {
                    $return = (URL::getItemUrl($item, 1));
                } else {
                    if ($item['obfs'] == 'v2ray') {
                        $v2rayplugin = [
                            'address' => $item['address'],
                            'port' => (string) $item['port'],
                            'path' => $item['path'],
                            'host' => $item['host'],
                            'mode' => 'websocket',
                        ];
                        $v2rayplugin['tls'] = $item['tls'] == 'tls' ? true : false;
                        if  ($v2rayplugin['tls']) {
                            if ($v2rayplugin['host'] != '' && $v2rayplugin['host'] != 'microsoft.com'){
                                $v2rayplugin['peer'] = $v2rayplugin['host'];
                            }else {
                                $v2rayplugin['peer'] =  $v2rayplugin['address'];
                            }
                        }else {
                            $v2rayplugin['peer'] = '';
                        }

                        $return = ('ss://' . Tools::base64_url_encode($item['method'] . ':' . $item['passwd'] . '@' . $item['address'] . ':' . $item['port']) . '?v2ray-plugin=' . base64_encode(json_encode($v2rayplugin)) . '#' . rawurlencode($item['remark']));
                    }
                    if ($item['obfs'] == 'plain') {
                        $return = (URL::getItemUrl($item, 2));
                    }
                }
                break;
            case 'ssr':
                $return = (URL::getItemUrl($item, 0));
                break;
            case 'vmess':
                if (!in_array($item['net'], ['tcp', 'ws', 'http', 'h2'])) {
                    break;
                }
                $obfs = '';
                switch ($item['net']) {
                    case 'ws':
                        $obfs .= ($item['host'] != ''
                            ? ('&obfsParam=' . $item['host'] . '&path=' . $item['path'] . '&obfs=websocket')
                            : ('&obfsParam=' . $item['add'] . '&path=' . $item['path'] . '&obfs=websocket'));
                        break;
                    case 'kcp':
                        $obfs .= 'obfsParam={"header":' . '"' . ($item['headerType'] == '' || $item['headerType'] == 'noop' ? 'none' : $item['headerType']) . '"' . '}&obfs=mkcp';
                        break;
                    case 'mkcp':
                        $obfs .= 'obfsParam={"header":' . '"' . ($item['headerType'] == '' || $item['headerType'] == 'noop' ? 'none' : $item['headerType']) . '"' . '}&obfs=mkcp';
                        break;
                    case 'h2':
                        $obfs .= ($item['host'] != ''
                            ? ('&obfsParam=' . $item['host'] . '&path=' . $item['path'] . '&obfs=h2')
                            : ('&obfsParam=' . $item['add'] . '&path=' . $item['path'] . '&obfs=h2'));
                        break;
                    default:
                        $obfs .= '&obfs=none';
                        break;
                }
                $tls = '';
                if ($item['tls'] == 'tls') {
                    $tls = '&tls=1';
                    if ($item['verify_cert'] == false){
                        $tls .= '&allowInsecure=1';
                    }
                    $tls .= '&peer=' . $item['host'];
                }
                $return = ('vmess://' . Tools::base64_url_encode('chacha20-poly1305:' . $item['id'] . '@' . $item['add'] . ':' . $item['port']) . '?remarks=' . rawurlencode($item['remark']) . $obfs . $tls);
                break;
            case 'trojan':
                $return  = ('trojan://' . $item['passwd'] . '@' . $item['address'] . ':' . $item['port']);
                $return .= ('?peer=' . $item['host'] . '#' . rawurlencode($item['remark']));
                break;
            case 'anytls':
                $return = self::buildAnytlsURI($item);
                if (isset($item['remark']) && trim((string) $item['remark']) !== '') {
                    $return .= '#' . rawurlencode((string) $item['remark']);
                }
                break;
            case 'vless':
                $return = self::getVlessURI($item);
                break;
        }
        return $return;
    }

    public static function getKitsunebiURI($item)
    {
        $return = null;
        switch ($item['type']) {
            case 'ss':
                if (in_array($item['obfs'], ['v2ray', 'simple_obfs_http', 'simple_obfs_tls'])) {
                    break;
                }
                $return = (URL::getItemUrl($item, 2));
                break;
            case 'vmess':
                $network = ($item['net'] == 'tls'
                    ? '&network=tcp'
                    : ('&network=' . $item['net']));
                $protocol = '';
                switch ($item['net']) {
                    case 'kcp':
                        $protocol .= ('&kcpheader=' . $item['headerType']);
                        break;
                    case 'ws':
                        $protocol .= ('&wspath=' . $item['path'] . '&wsHost=' . $item['host']);
                        break;
                    case 'h2':
                        $protocol .= ('&h2Path=' . $item['path'] . '&h2Host=' . $item['host']);
                        break;
                }
                $tls = '';
                if ($item['tls'] == 'tls') {
                    $tls = '&tls=1';
                    if ($item['verify_cert'] == false) {
                        $tls .= '&allowInsecure=1';
                    }
                }
                $return .= ('vmess://' . base64_encode('auto:' . $item['id'] . '@' . $item['add'] . ':' . $item['port']) . '?remark=' . rawurlencode($item['remark']) . $network . $protocol . '&aid=' . $item['aid'] . $tls);
                break;
        }
        return $return;
    }

    public static function getSSDURI($item)
    {
        $return = null;
        switch ($item['type']) {
            case 'ss':
                # 666
                $return['remarks']      = $item['remark'];
                $return['server']       = $item['address'];
                $return['port']         = $item['port'];
                $return['encryption']   = $item['method'];
                $return['password']     = $item['passwd'];
                $plugin_options         = '';
                if ($item['obfs'] != 'plain') {
                    switch ($item['obfs']) {
                        case 'simple_obfs_http':
                            $return['plugin'] = 'simple-obfs';
                            $plugin_options .= 'obfs=http;obfs-host=' . $item['obfs_param'];
                            break;
                        case 'simple_obfs_tls':
                            $return['plugin'] = 'simple-obfs';
                            $plugin_options .= 'obfs=tls;obfs-host=' . $item['obfs_param'];
                            break;
                        case 'v2ray':
                            $return['plugin'] = 'v2ray';
                            if ($item['net'] == 'ws') {
                                $plugin_options .= 'mode=ws';
                            }
                            if ($item['tls'] == 'tls') {
                                $plugin_options .= ';security=tls';
                            } else {
                                $plugin_options .= ';security=none';
                            }
                            $plugin_options .= ';path=' . $item['path'];
                            if ($item['host'] != '') {
                                $plugin_options .= ';host=' . $item['host'];
                            } else {
                                $plugin_options .= ';host=' . $item['address'];
                            }
                            break;
                    }
                }
                $return['plugin_options'] = $plugin_options;
                $return['ratio']          = $item['ratio'];
                break;
        }
        return $return;
    }

    public static function getSSJSON($item)
    {
        $return = null;
        switch ($item['type']) {
            case 'ss':
                # 666
                $return['remarks']      = $item['remark'];
                $return['server']       = $item['address'];
                $return['server_port']  = $item['port'];
                $return['method']       = $item['method'];
                $return['password']     = $item['passwd'];
                if ($item['obfs'] != 'plain') {
                    $plugin_options         = '';
                    switch ($item['obfs']) {
                        case 'simple_obfs_http':
                            $return['plugin'] = 'simple-obfs';
                            $plugin_options .= 'obfs=http;obfs-host=' . $item['obfs_param'];
                            break;
                        case 'simple_obfs_tls':
                            $return['plugin'] = 'simple-obfs';
                            $plugin_options .= 'obfs=tls;obfs-host=' . $item['obfs_param'];
                            break;
                        case 'v2ray':
                            $return['plugin'] = 'v2ray';
                            if ($item['net'] == 'ws') {
                                $plugin_options .= 'mode=ws';
                            }
                            if ($item['tls'] == 'tls') {
                                $plugin_options .= ';security=tls';
                            } else {
                                $plugin_options .= ';security=none';
                            }
                            $plugin_options .= ';path=' . $item['path'];
                            if ($item['host'] != '') {
                                $plugin_options .= ';host=' . $item['host'];
                            } else {
                                $plugin_options .= ';host=' . $item['address'];
                            }
                            break;
                    }
                    $return['plugin_opts'] = $plugin_options;
                }
                break;
        }
        return $return;
    }

    public static function getTrojanURI(array $item)
    {
        $return = null;
        switch ($item['type']) {
            case 'trojan':
                $return  = ('trojan://' . $item['passwd'] . '@' . $item['address'] . ':' . $item['port']);
                $return .= ('?peer=' . $item['host'] . '#' .  rawurlencode($item['remark']));
                break;
            case 'anytls':
                $return = self::buildAnytlsURI($item);
                if (isset($item['remark']) && trim((string) $item['remark']) !== '') {
                    $return .= '#' . rawurlencode((string) $item['remark']);
                }
                break;
        }
        return $return;
    }

    public static function getAnytlsURI(array $item)
    {
        if (!isset($item['type']) || $item['type'] !== 'anytls') {
            return null;
        }
        $return = self::buildAnytlsURI($item);
        if (isset($item['remark']) && trim((string) $item['remark']) !== '') {
            $return .= '#' . rawurlencode((string) $item['remark']);
        }
        return $return;
    }

    public static function getVlessURI(array $item)
    {
        if (!isset($item['type']) || $item['type'] !== 'vless') {
            return null;
        }
        $return = self::buildVlessURI($item);
        if ($return === null) {
            return null;
        }
        if (isset($item['remark']) && trim((string) $item['remark']) !== '') {
            $return .= '#' . rawurlencode((string) $item['remark']);
        }
        return $return;
    }

    private static function buildAnytlsURI(array $item)
    {
        $address = (isset($item['address']) ? trim((string) $item['address']) : '');
        $address = self::normalizeUriHost($address);
        $port = (isset($item['port']) ? (int) $item['port'] : 443);

        $return = 'anytls://' . $item['passwd'] . '@' . $address;
        if ($port > 0 && $port !== 443) {
            $return .= ':' . $port;
        }

        $query = [];
        $sni = (isset($item['host']) ? trim((string) $item['host']) : '');
        if ($sni !== '') {
            $query['sni'] = $sni;
        }
        if (isset($item['insecure']) && self::isTruthy($item['insecure'])) {
            $query['insecure'] = '1';
        }

        $return .= '/';
        if ($query !== []) {
            $return .= '?' . http_build_query($query, '', '&', PHP_QUERY_RFC3986);
        }

        return $return;
    }

    private static function buildVlessURI(array $item)
    {
        $address = trim((string) ($item['add'] ?? $item['address'] ?? ''));
        $address = self::normalizeUriHost($address);
        $uuid = trim((string) ($item['id'] ?? $item['uuid'] ?? ''));
        if ($address === '' || $uuid === '') {
            return null;
        }
        $port = (isset($item['port']) ? (int) $item['port'] : 443);
        if ($port <= 0 || $port > 65535) {
            $port = 443;
        }

        $network = strtolower(trim((string) ($item['net'] ?? 'tcp')));
        if ($network === '') {
            $network = 'tcp';
        }
        $security = strtolower(trim((string) ($item['security'] ?? '')));
        if ($security === '' && isset($item['tls']) && $item['tls'] === 'tls') {
            $security = 'tls';
        }

        $query = [
            'encryption' => 'none',
            'type' => $network
        ];
        if ($security !== '' && $security !== 'none') {
            $query['security'] = $security;
        }
        if (isset($item['flow']) && trim((string) $item['flow']) !== '') {
            $query['flow'] = (string) $item['flow'];
        }
        $sni = trim((string) ($item['sni'] ?? $item['host'] ?? ''));
        if ($sni !== '') {
            $query['sni'] = $sni;
        }
        if (isset($item['fp']) && trim((string) $item['fp']) !== '') {
            $query['fp'] = (string) $item['fp'];
        }
        if (isset($item['pbk']) && trim((string) $item['pbk']) !== '') {
            $query['pbk'] = (string) $item['pbk'];
        }
        if (isset($item['sid']) && trim((string) $item['sid']) !== '') {
            $query['sid'] = (string) $item['sid'];
        }
        if ($network === 'ws') {
            $query['path'] = (isset($item['path']) && trim((string) $item['path']) !== '' ? (string) $item['path'] : '/');
            if (isset($item['host']) && trim((string) $item['host']) !== '') {
                $query['host'] = (string) $item['host'];
            }
        } elseif ($network === 'tcp' && isset($item['headerType']) && trim((string) $item['headerType']) !== '' && trim((string) $item['headerType']) !== 'none') {
            $query['headerType'] = (string) $item['headerType'];
        }
        if (isset($item['verify_cert']) && $item['verify_cert'] == false) {
            $query['allowInsecure'] = '1';
        }

        $return = 'vless://' . $uuid . '@' . $address . ':' . $port;
        if ($query !== []) {
            $return .= '?' . http_build_query($query, '', '&', PHP_QUERY_RFC3986);
        }

        return $return;
    }

    private static function normalizeUriHost($host)
    {
        $host = trim($host);
        if ($host === '') {
            return '';
        }
        $rawHost = trim($host, '[]');
        if (filter_var($rawHost, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) !== false) {
            return '[' . $rawHost . ']';
        }
        return $host;
    }

    private static function isTruthy($value)
    {
        if (is_bool($value)) {
            return $value;
        }
        $value = strtolower(trim((string) $value));
        return in_array($value, ['1', 'true', 'yes', 'on'], true);
    }
}
