<?php

namespace App\Services;

class AppsProfiles
{
    /**
     * Surge 策略组配置
     *
     * @return array
     */
    public static function Surge()
    {
        $Apps_Profiles = [
            'lhie1' => [
                'Checks' => ['🇭🇰 香港', '🇯🇵 日本', '🇸🇬 坡坡', '🇨🇳 台湾', '🇺🇸 美国', '🇰🇷 韩国', '🇨🇳 中继'],
                'ProxyGroup' => [
                    [
                        'name' => '🍃 Proxy',
                        'type' => 'select',
                        'content' => [
                            'left-proxies' => ['🇭🇰 香港', '🇯🇵 日本', '🇸🇬 坡坡', '🇨🇳 台湾', '🇺🇸 美国', '🇰🇷 韩国', '🇨🇳 中继', '🚀 Direct']
                        ]
                    ],
                    [
                        'name' => '🍂 Domestic',
                        'type' => 'select',
                        'content' => [
                            'left-proxies' => ['🚀 Direct', '🍃 Proxy', '🇨🇳 中继']
                        ]
                    ],
                    [
                        'name' => '🍎 Only',
                        'type' => 'select',
                        'content' => [
                            'left-proxies' => ['🚀 Direct', '🇭🇰 香港', '🇯🇵 日本', '🇸🇬 坡坡', '🇨🇳 台湾', '🇺🇸 美国', '🇰🇷 韩国', '🇨🇳 中继']
                        ]
                    ],
                    [
                        'name' => '☁️ Others',
                        'type' => 'select',
                        'content' => [
                            'left-proxies' => ['🍃 Proxy', '🍂 Domestic']
                        ]
                    ],
                    [
                        'name' => '🇭🇰 香港',
                        'type' => 'select',
                        'content' => [
                            'regex' => '(香港|HK)'
                        ],
                        'url' => 'http://www.qualcomm.cn/generate_204',
                        'interval' => 3600
                    ],
                    [
                        'name' => '🇯🇵 日本',
                        'type' => 'select',
                        'content' => [
                            'regex' => '(日本|JP)'
                        ],
                        'url' => 'http://www.qualcomm.cn/generate_204',
                        'interval' => 3600
                    ],
                    [
                        'name' => '🇸🇬 坡坡',
                        'type' => 'select',
                        'content' => [
                            'regex' => '(新加坡|SG)'
                        ],
                        'url' => 'http://www.qualcomm.cn/generate_204',
                        'interval' => 3600
                    ],
                    [
                        'name' => '🇨🇳 台湾',
                        'type' => 'select',
                        'content' => [
                            'regex' => '(台湾|TW)'
                        ],
                        'url' => 'http://www.qualcomm.cn/generate_204',
                        'interval' => 3600
                    ],
                    [
                        'name' => '🇺🇸 美国',
                        'type' => 'select',
                        'content' => [
                            'regex' => '(美国|US)'
                        ],
                        'url' => 'http://www.qualcomm.cn/generate_204',
                        'interval' => 3600
                    ],
                    [
                        'name' => '🇰🇷 韩国',
                        'type' => 'select',
                        'content' => [
                            'regex' => '(韩国|KR)'
                        ],
                        'url' => 'http://www.qualcomm.cn/generate_204',
                        'interval' => 3600
                    ],
                    [
                        'name' => '🇨🇳 中继',
                        'type' => 'select',
                        'content' => [
                            'regex' => '(中继|中转|中国|回国|China)'
                        ],
                        'url' => 'http://www.qualcomm.cn/generate_204',
                        'interval' => 3600
                    ]
                ]
            ],
            '123456' => [
                'Checks' => [],
                'ProxyGroup' => [
                    [
                        'name' => '🍃 Proxy',
                        'type' => 'select',
                        'content' => [
                            'regex' => '(.*)'
                        ]
                    ],
                    [
                        'name' => '🍂 Domestic',
                        'type' => 'select',
                        'content' => [
                            'left-proxies' => ['🚀 Direct', '🍃 Proxy']
                        ]
                    ],
                    [
                        'name' => '🍎 Only',
                        'type' => 'select',
                        'content' => [
                            'left-proxies' => ['🚀 Direct', '🍃 Proxy']
                        ]
                    ],
                    [
                        'name' => '☁️ Others',
                        'type' => 'select',
                        'content' => [
                            'left-proxies' => ['🍃 Proxy', '🍂 Domestic']
                        ]
                    ]
                ]
            ]
        ];

        return $Apps_Profiles;
    }

    /**
     * Surfboard 策略组配置
     *
     * @return array
     */
    public static function Surfboard()
    {
        $Apps_Profiles = [
            'lhie1' => [
                'Checks' => ['🇭🇰 香港', '🇯🇵 日本', '🇸🇬 坡坡', '🇨🇳 台湾', '🇺🇸 美国', '🇰🇷 韩国', '🇨🇳 中继'],
                'ProxyGroup' => [
                    [
                        'name' => '🍃 Proxy',
                        'type' => 'select',
                        'content' => [
                            'left-proxies' => ['🇭🇰 香港', '🇯🇵 日本', '🇸🇬 坡坡', '🇨🇳 台湾', '🇺🇸 美国', '🇰🇷 韩国', '🇨🇳 中继', '🚀 Direct']
                        ]
                    ],
                    [
                        'name' => '🍂 Domestic',
                        'type' => 'select',
                        'content' => [
                            'left-proxies' => ['🚀 Direct', '🍃 Proxy', '🇨🇳 中继']
                        ]
                    ],
                    [
                        'name' => '☁️ Others',
                        'type' => 'select',
                        'content' => [
                            'left-proxies' => ['🍃 Proxy', '🍂 Domestic']
                        ]
                    ],
                    [
                        'name' => '🇭🇰 香港',
                        'type' => 'select',
                        'content' => [
                            'regex' => '(香港|HK)'
                        ],
                        'url' => 'http://www.qualcomm.cn/generate_204',
                        'interval' => 3600
                    ],
                    [
                        'name' => '🇯🇵 日本',
                        'type' => 'select',
                        'content' => [
                            'regex' => '(日本|JP)'
                        ],
                        'url' => 'http://www.qualcomm.cn/generate_204',
                        'interval' => 3600
                    ],
                    [
                        'name' => '🇸🇬 坡坡',
                        'type' => 'select',
                        'content' => [
                            'regex' => '(新加坡|SG)'
                        ],
                        'url' => 'http://www.qualcomm.cn/generate_204',
                        'interval' => 3600
                    ],
                    [
                        'name' => '🇨🇳 台湾',
                        'type' => 'select',
                        'content' => [
                            'regex' => '(台湾|TW)'
                        ],
                        'url' => 'http://www.qualcomm.cn/generate_204',
                        'interval' => 3600
                    ],
                    [
                        'name' => '🇺🇸 美国',
                        'type' => 'select',
                        'content' => [
                            'regex' => '(美国|US)'
                        ],
                        'url' => 'http://www.qualcomm.cn/generate_204',
                        'interval' => 3600
                    ],
                    [
                        'name' => '🇰🇷 韩国',
                        'type' => 'select',
                        'content' => [
                            'regex' => '(韩国|KR)'
                        ],
                        'url' => 'http://www.qualcomm.cn/generate_204',
                        'interval' => 3600
                    ],
                    [
                        'name' => '🇨🇳 中继',
                        'type' => 'select',
                        'content' => [
                            'regex' => '(中继|中转|中国|回国|China)'
                        ],
                        'url' => 'http://www.qualcomm.cn/generate_204',
                        'interval' => 3600
                    ]
                ]
            ],
            '123456' => [
                'Checks' => [],
                'ProxyGroup' => [
                    [
                        'name' => '🍃 Proxy',
                        'type' => 'select',
                        'content' => [
                            'regex' => '(.*)'
                        ]
                    ],
                    [
                        'name' => '🍂 Domestic',
                        'type' => 'select',
                        'content' => [
                            'left-proxies' => ['🚀 Direct', '🍃 Proxy']
                        ]
                    ],
                    [
                        'name' => '☁️ Others',
                        'type' => 'select',
                        'content' => [
                            'left-proxies' => ['🍃 Proxy', '🍂 Domestic']
                        ]
                    ]
                ]
            ]
        ];

        return $Apps_Profiles;
    }

    /**
     * Clash 策略组配置
     *
     * @return array
     */
    public static function Clash()
    {
        $Apps_Profiles = [
            'lhie1' => [
                'Checks' => ['香港', '日本', '坡坡', '台湾', '美国', '韩国', '中继'],
                'ProxyGroup' => [
                    [
                        'name' => '香港',
                        'type' => 'url-test',
                        'content' => [
                            'regex' => '(香港|HK)'
                        ],
                        'url' => 'http://www.qualcomm.cn/generate_204',
                        'interval' => 3600
                    ],
                    [
                        'name' => '日本',
                        'type' => 'url-test',
                        'content' => [
                            'regex' => '(日本|JP)'
                        ],
                        'url' => 'http://www.qualcomm.cn/generate_204',
                        'interval' => 3600
                    ],
                    [
                        'name' => '坡坡',
                        'type' => 'url-test',
                        'content' => [
                            'regex' => '(新加坡|SG)'
                        ],
                        'url' => 'http://www.qualcomm.cn/generate_204',
                        'interval' => 3600
                    ],
                    [
                        'name' => '美国',
                        'type' => 'url-test',
                        'content' => [
                            'regex' => '(美国|US)'
                        ],
                        'url' => 'http://www.qualcomm.cn/generate_204',
                        'interval' => 3600
                    ],
                    [
                        'name' => '台湾',
                        'type' => 'url-test',
                        'content' => [
                            'regex' => '(台湾|TW)'
                        ],
                        'url' => 'http://www.qualcomm.cn/generate_204',
                        'interval' => 3600
                    ],
                    [
                        'name' => '韩国',
                        'type' => 'url-test',
                        'content' => [
                            'regex' => '(韩国|KR)'
                        ],
                        'url' => 'http://www.qualcomm.cn/generate_204',
                        'interval' => 3600
                    ],
                    [
                        'name' => '中继',
                        'type' => 'url-test',
                        'content' => [
                            'regex' => '(中继|中转|中国|回国|China)'
                        ],
                        'url' => 'http://www.qualcomm.cn/generate_204',
                        'interval' => 3600
                    ],
                    [
                        'name' => 'Proxy',
                        'type' => 'select',
                        'content' => [
                            'left-proxies' => ['香港', '日本', '坡坡', '台湾', '美国', '韩国', '中继']
                        ]
                    ],
                    [
                        'name' => 'Domestic',
                        'type' => 'select',
                        'content' => [
                            'left-proxies' => ['DIRECT', 'Proxy', '中继']
                        ]
                    ],
                    [
                        'name' => 'AsianTV',
                        'type' => 'select',
                        'content' => [
                            'left-proxies' => ['Domestic', 'Proxy', '中继']
                        ]
                    ],
                    [
                        'name' => 'GlobalTV',
                        'type' => 'select',
                        'content' => [
                            'left-proxies' => ['Proxy', '香港', '日本', '坡坡', '台湾', '美国', '韩国', '中继']
                        ]
                    ],
                    [
                        'name' => 'Others',
                        'type' => 'select',
                        'content' => [
                            'left-proxies' => ['Proxy', 'Domestic']
                        ]
                    ]
                ]
            ],
            'ConnersHua_Pro' => [
                'Checks' => ['香港', '日本', '坡坡', '台湾', '美国', '韩国', '中继'],
                'ProxyGroup' => [
                    [
                        'name' => '香港',
                        'type' => 'url-test',
                        'content' => [
                            'regex' => '(香港|HK)'
                        ],
                        'url' => 'http://www.qualcomm.cn/generate_204',
                        'interval' => 3600
                    ],
                    [
                        'name' => '日本',
                        'type' => 'url-test',
                        'content' => [
                            'regex' => '(日本|JP)'
                        ],
                        'url' => 'http://www.qualcomm.cn/generate_204',
                        'interval' => 3600
                    ],
                    [
                        'name' => '坡坡',
                        'type' => 'url-test',
                        'content' => [
                            'regex' => '(新加坡|SG)'
                        ],
                        'url' => 'http://www.qualcomm.cn/generate_204',
                        'interval' => 3600
                    ],
                    [
                        'name' => '美国',
                        'type' => 'url-test',
                        'content' => [
                            'regex' => '(美国|US)'
                        ],
                        'url' => 'http://www.qualcomm.cn/generate_204',
                        'interval' => 3600
                    ],
                    [
                        'name' => '台湾',
                        'type' => 'url-test',
                        'content' => [
                            'regex' => '(台湾|TW)'
                        ],
                        'url' => 'http://www.qualcomm.cn/generate_204',
                        'interval' => 3600
                    ],
                    [
                        'name' => '韩国',
                        'type' => 'url-test',
                        'content' => [
                            'regex' => '(韩国|KR)'
                        ],
                        'url' => 'http://www.qualcomm.cn/generate_204',
                        'interval' => 3600
                    ],
                    [
                        'name' => '中继',
                        'type' => 'url-test',
                        'content' => [
                            'regex' => '(中继|中转|中国|回国|China|CN)'
                        ],
                        'url' => 'http://www.qualcomm.cn/generate_204',
                        'interval' => 3600
                    ],
                    [
                        'name' => 'PROXY',
                        'type' => 'select',
                        'content' => [
                            'left-proxies' => ['香港', '日本', '坡坡', '台湾', '美国', '韩国', '中继']
                        ]
                    ],
                    [
                        'name' => 'Final',
                        'type' => 'select',
                        'content' => [
                            'left-proxies' => ['PROXY', 'DIRECT']
                        ]
                    ],
                    [
                        'name' => 'ForeignMedia',
                        'type' => 'select',
                        'content' => [
                            'left-proxies' => ['PROXY', '香港', '日本', '坡坡', '台湾', '美国', '韩国', '中继']
                        ]
                    ],
                    [
                        'name' => 'DomesticMedia',
                        'type' => 'select',
                        'content' => [
                            'left-proxies' => ['DIRECT', 'PROXY', '中继']
                        ]
                    ],
                    [
                        'name' => 'Apple',
                        'type' => 'select',
                        'content' => [
                            'left-proxies' => ['DIRECT', 'PROXY']
                        ]
                    ],
                    [
                        'name' => 'Hijacking',
                        'type' => 'select',
                        'content' => [
                            'left-proxies' => ['DIRECT', 'REJECT']
                        ]
                    ]
                ]
            ],
            'ConnersHua_BacktoCN' => [
                'Checks' => [],
                'ProxyGroup' => [
                    [
                        'name' => 'PROXY',
                        'type' => 'select',
                        'content' => [
                            'regex' => '(中继|中转|中国|回国|China)'
                        ]
                    ]
                ]
            ],
            'RXaY4euoGR5m' => [
                'Checks' => ['🇭🇰 香港节点', '🇹🇼 台湾节点', '🇺🇲 美国节点', '🇯🇵 日本节点', '🇸🇬 新加坡节点'],
                'ProxyGroup' => [
                    [
                        'name' => '✈️ 手动切换',
                        'type' => 'select',
                        'content' => [
                            'regex' => '(.*)'
                        ]
                    ],
                    [
                        'name' => '♻️ 自动选择',
                        'type' => 'url-test',
                        'content' => [
                            'regex' => '(.*)'
                        ],
                        'url' => 'http://cp.cloudflare.com/generate_204',
                        'interval' => 300
                    ],
                    [
                        'name' => '🔯 故障转移',
                        'type' => 'fallback',
                        'content' => [
                            'regex' => '(.*)'
                        ],
                        'url' => 'http://cp.cloudflare.com/generate_204',
                        'interval' => 180
                    ],
                    [
                        'name' => '🇭🇰 香港节点',
                        'type' => 'url-test',
                        'content' => [
                            'left-proxies' => ['✈️ 手动切换'],
                            'regex' => '(香港|HK)'
                        ],
                        'url' => 'http://cp.cloudflare.com/generate_204',
                        'interval' => 600
                    ],
                    [
                        'name' => '🇹🇼 台湾节点',
                        'type' => 'url-test',
                        'content' => [
                            'left-proxies' => ['✈️ 手动切换'],
                            'regex' => '(台湾|台灣|TW)'
                        ],
                        'url' => 'http://cp.cloudflare.com/generate_204',
                        'interval' => 600
                    ],
                    [
                        'name' => '🇺🇲 美国节点',
                        'type' => 'url-test',
                        'content' => [
                            'left-proxies' => ['✈️ 手动切换'],
                            'regex' => '(美国|US)'
                        ],
                        'url' => 'http://cp.cloudflare.com/generate_204',
                        'interval' => 600
                    ],
                    [
                        'name' => '🇯🇵 日本节点',
                        'type' => 'url-test',
                        'content' => [
                            'left-proxies' => ['✈️ 手动切换'],
                            'regex' => '(日本|JP)'
                        ],
                        'url' => 'http://cp.cloudflare.com/generate_204',
                        'interval' => 600
                    ],
                    [
                        'name' => '🇸🇬 新加坡节点',
                        'type' => 'url-test',
                        'content' => [
                            'left-proxies' => ['✈️ 手动切换'],
                            'regex' => '(新加坡|狮城|SG)'
                        ],
                        'url' => 'http://cp.cloudflare.com/generate_204',
                        'interval' => 600
                    ],
                    [
                        'name' => '🚀 节点选择',
                        'type' => 'select',
                        'content' => [
                            'left-proxies' => ['🇭🇰 香港节点', '🇹🇼 台湾节点', '🇺🇲 美国节点', '🇯🇵 日本节点', '🇸🇬 新加坡节点', '✈️ 手动切换', '♻️ 自动选择', '🔯 故障转移', '🎯 全球直连']
                        ]
                    ],
                    [
                        'name' => '📹 Youtube油管',
                        'type' => 'select',
                        'content' => [
                            'left-proxies' => ['🚀 节点选择', '🇭🇰 香港节点', '🇹🇼 台湾节点', '🇺🇲 美国节点', '🇯🇵 日本节点', '🇸🇬 新加坡节点', '✈️ 手动切换', '♻️ 自动选择', '🎯 全球直连']
                        ]
                    ],
                    [
                        'name' => '🎥 Netflix奈飞',
                        'type' => 'select',
                        'content' => [
                            'left-proxies' => ['🚀 节点选择', '🇭🇰 香港节点', '🇹🇼 台湾节点', '🇺🇲 美国节点', '🇯🇵 日本节点', '🇸🇬 新加坡节点', '✈️ 手动切换', '♻️ 自动选择', '🎯 全球直连']
                        ]
                    ],
                    [
                        'name' => '📺 巴哈姆特',
                        'type' => 'select',
                        'content' => [
                            'left-proxies' => ['🇹🇼 台湾节点', '🚀 节点选择', '✈️ 手动切换', '🎯 全球直连']
                        ]
                    ],
                    [
                        'name' => '📺 哔哩哔哩',
                        'type' => 'select',
                        'content' => [
                            'left-proxies' => ['🎯 全球直连', '🇹🇼 台湾节点', '🇭🇰 香港节点']
                        ]
                    ],
                    [
                        'name' => '📀 EMBY影视',
                        'type' => 'select',
                        'content' => [
                            'left-proxies' => ['🇭🇰 香港节点', '🇹🇼 台湾节点', '🇸🇬 新加坡节点', '🎯 全球直连']
                        ]
                    ],
                    [
                        'name' => '🌍 国外媒体',
                        'type' => 'select',
                        'content' => [
                            'left-proxies' => ['🚀 节点选择', '🇭🇰 香港节点', '🇹🇼 台湾节点', '🇺🇲 美国节点', '🇯🇵 日本节点', '🇸🇬 新加坡节点', '✈️ 手动切换', '♻️ 自动选择', '🎯 全球直连']
                        ]
                    ],
                    [
                        'name' => '🌏 国内媒体',
                        'type' => 'select',
                        'content' => [
                            'left-proxies' => ['🎯 全球直连', '🚀 节点选择', '✈️ 手动切换']
                        ]
                    ],
                    [
                        'name' => '📲 Telegram电报',
                        'type' => 'select',
                        'content' => [
                            'left-proxies' => ['🇭🇰 香港节点', '🇹🇼 台湾节点', '🇺🇲 美国节点', '🇯🇵 日本节点', '🇸🇬 新加坡节点', '✈️ 手动切换', '♻️ 自动选择', '🎯 全球直连']
                        ]
                    ],
                    [
                        'name' => '📱 Twitter推特',
                        'type' => 'select',
                        'content' => [
                            'left-proxies' => ['🇭🇰 香港节点', '🇹🇼 台湾节点', '🇺🇲 美国节点', '🇯🇵 日本节点', '🇸🇬 新加坡节点', '✈️ 手动切换', '♻️ 自动选择', '🎯 全球直连']
                        ]
                    ],
                    [
                        'name' => '🎶 网易云音乐',
                        'type' => 'select',
                        'content' => [
                            'left-proxies' => ['🎯 全球直连']
                        ]
                    ],
                    [
                        'name' => '⛓️ 微软云盘',
                        'type' => 'select',
                        'content' => [
                            'left-proxies' => ['🎯 全球直连', '🚀 节点选择', '🇭🇰 香港节点', '🇺🇲 美国节点', '✈️ 手动切换']
                        ]
                    ],
                    [
                        'name' => '🍎 苹果服务',
                        'type' => 'select',
                        'content' => [
                            'left-proxies' => ['🎯 全球直连', '🚀 节点选择', '🇭🇰 香港节点', '🇺🇲 美国节点', '✈️ 手动切换']
                        ]
                    ],
                    [
                        'name' => '🎮 游戏平台',
                        'type' => 'select',
                        'content' => [
                            'left-proxies' => ['🇭🇰 香港节点', '🇺🇲 美国节点', '🚀 节点选择', '✈️ 手动切换', '🎯 全球直连']
                        ]
                    ],
                    [
                        'name' => '📢 谷歌FCM',
                        'type' => 'select',
                        'content' => [
                            'left-proxies' => ['🎯 全球直连', '🚀 节点选择', '🇭🇰 香港节点', '🇺🇲 美国节点', '✈️ 手动切换']
                        ]
                    ],
                    [
                        'name' => '🤖 AI',
                        'type' => 'select',
                        'content' => [
                            'left-proxies' => ['🇭🇰 香港节点', '🇹🇼 台湾节点', '🇺🇲 美国节点', '🇯🇵 日本节点', '🇸🇬 新加坡节点', '🎯 全球直连']
                        ]
                    ],
                    [
                        'name' => '📧 邮件客户端',
                        'type' => 'select',
                        'content' => [
                            'left-proxies' => ['🇭🇰 香港节点', '🚀 节点选择', '🎯 全球直连']
                        ]
                    ],
                    [
                        'name' => '🛩 特殊网站',
                        'type' => 'select',
                        'content' => [
                            'left-proxies' => ['🇭🇰 香港节点', '🇹🇼 台湾节点', '🇺🇲 美国节点', '🇯🇵 日本节点', '🇸🇬 新加坡节点', '✈️ 手动切换', '♻️ 自动选择']
                        ]
                    ],
                    [
                        'name' => '🎯 全球直连',
                        'type' => 'select',
                        'content' => [
                            'left-proxies' => ['DIRECT']
                        ]
                    ],
                    [
                        'name' => '🛑 广告拦截',
                        'type' => 'select',
                        'content' => [
                            'left-proxies' => ['REJECT', 'DIRECT']
                        ]
                    ],
                    [
                        'name' => '🍃 应用净化',
                        'type' => 'select',
                        'content' => [
                            'left-proxies' => ['REJECT', 'DIRECT']
                        ]
                    ],
                    [
                        'name' => '🕹 规则之外',
                        'type' => 'select',
                        'content' => [
                            'left-proxies' => ['🚀 节点选择', '✈️ 手动切换', '🎯 全球直连']
                        ]
                    ]
                ]
            ],
            '123456' => [
                'Checks' => [],
                'ProxyGroup' => [
                    [
                        'name' => 'Proxy',
                        'type' => 'select',
                        'content' => [
                            'regex' => '(.*)'
                        ]
                    ],
                    [
                        'name' => 'Domestic',
                        'type' => 'select',
                        'content' => [
                            'left-proxies' => ['DIRECT', 'Proxy']
                        ]
                    ],
                    [
                        'name' => 'AsianTV',
                        'type' => 'select',
                        'content' => [
                            'left-proxies' => ['Domestic', 'Proxy']
                        ]
                    ],
                    [
                        'name' => 'GlobalTV',
                        'type' => 'select',
                        'content' => [
                            'left-proxies' => ['Proxy']
                        ]
                    ],
                    [
                        'name' => 'Others',
                        'type' => 'select',
                        'content' => [
                            'left-proxies' => ['Proxy', 'Domestic']
                        ]
                    ]
                ]
            ]
        ];

        return $Apps_Profiles;
    }
}
