﻿SFSF.info['海外'] = {
    house: {
//        action: "SearchResult.asp",
        action: "house_list.php",
//        suggest_url: '/SearchResult.asp',
        suggest_url: '/house_list.php',


        d: [{
            hint: '国家',
            id: 'strDistrict0',
            data: ['美国', '加拿大', '德国', '法国', '英国', '爱尔兰', '西班牙', '塞浦路斯', '荷兰', '意大利', '葡萄牙', '澳大利亚', '日本', '新西兰', '马来西亚', '香港', '台湾', '韩国', '新加坡']
        }],


        jz: [0, 100, 200, 300, 500, '+'],


        jb: {
            d: [0, 100, 200, 300, 500, '+']
        },


        jx: {
            d: [0, 10000, 20000, 30000, 50000, '+'],
            z: [0, 3, 5, 8, 10, '+']
        },
        js: {
            d: [0, 10000, 20000, 30000, 50000, '+'],
            z: [0, 3, 5, 8, 10, '+']
        }
    },
    bbs: {
//        action: 'SearchResult.asp'
        action: 'house_list.php'
    }
};
