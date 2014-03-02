var $ = function(a) {
        return document.getElementById(a)
    };
var SFXHR = function(b, c, d, f, g, h) {
        var j = this;
        var k = function() {
                var a = false;
                if (window.XMLHttpRequest) {
                    a = new XMLHttpRequest()
                } else if (window.ActiveXObject) {
                    try {
                        a = new ActiveXObject("Msxml2.XMLHTTP")
                    } catch (e) {
                        try {
                            a = new ActiveXObject("Microsoft.XMLHTTP")
                        } catch (e) {
                            a = false
                        }
                    }
                }
                return a
            };
        var l = function() {
                if (j.XHR.readyState == 4) {
                    if (j.XHR.status == 200 || j.XHR.status == 304) {
                        if (f) {
                            f(j.XHR)
                        }
                    } else {
                        if (g) {
                            g(j.XHR)
                        }
                    }
                }
            };
        var m = function() {
                if (h) {
                    h()
                }
                var a = '';
                for (var i in d) {
                    a += i + '=' + d[i] + '&'
                }
                j.XHR.onreadystatechange = l;
                if ('post' == j.method) {
                    j.XHR.open("POST", b, true);
                    j.XHR.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    j.XHR.send(a)
                } else {
                    b += '?' + a + 'random=' + Math.random();
                    j.XHR.open("GET", b, true);
                    j.XHR.setRequestHeader('Content-type', 'text/html; charset=gb2312');
                    j.XHR.send(null)
                }
            };
        j.XHR = k();
        j.method = ('get' == c.toLowerCase()) ? 'get' : 'post';
        m()
    };
var SFUtil = {
    eventAdd: function(a, b, c) {
        if (document.addEventListener) {
            a.addEventListener(b, c, false)
        } else if (document.attachEvent) {
            a.attachEvent("on" + b, c)
        }
    },
    containNode: function(a, b) {
        if (a == b) {
            return true
        } else {
            while (b = b.parentNode) {
                if (a == b) {
                    return true
                }
            }
        }
    }
};
var SFUI = {
    show: function(a) {
        var b;
        var c = a.tagName.toLowerCase();
        if ('span' == c) {
            b = 'inline'
        } else {
            b = 'block'
        }
        a.style.display = b
    },
    hide: function(a) {
        a.style.display = 'none'
    },
    showId: function(a) {
        var b = document.getElementById(a);
        this.show(b)
    },
    hideId: function(a) {
        var b = document.getElementById(a);
        this.hide(b)
    },
    getAbsPoint: function(e) {
        var x = e.offsetLeft;
        var y = e.offsetTop;
        while (e = e.offsetParent) {
            x += e.offsetLeft;
            y += e.offsetTop
        }
        return {
            'x': x,
            'y': y
        }
    },
    getRealStyle: function(a) {
        var b;
        if (a.currentStyle) {
            b = a.currentStyle
        } else if (window.getComputedStyle) {
            b = window.getComputedStyle(a, null)
        }
        return b
    },
    getStyleNum: function(a) {
        var b = parseInt(a);
        return (b > 0) ? b : 0
    },
    setInput: function(a, b) {
        var c = $(a);
        if (c) {
            c.value = b
        }
    },
    setA: function(a, b) {
        var c = $(a);
        if (c) {
            var d = c.getElementsByTagName('span');
            if (1 == d.length) {
                c = d[0]
            }
            c.innerHTML = b
        }
    },
    setInputA: function(a, b, c) {
        this.setInput(a, b);
        this.setA(a + '_a', c)
    },
    toggleHint: function(a, b) {
        var c = document.activeElement;
        var d = b || a.defaultValue;
        var e = a.value;
        if ('' == e && c != a) {
            a.value = d
        } else if (e == d && c == a) {
            a.value = ''
        }
    }
};
var Flyer = function(a, b) {
        var c = this;
        c.nodeId = a;
        var d = document.getElementById(a);
        var b = b || 100;
        if (!d) {
            d = document.createElement('div');
            d.id = a;
            d.style.position = 'absolute';
            d.style.zIndex = b;
            document.body.insertBefore(d, document.body.firstChild)
        }
        c.panel = d;
        c.popper = null
    };
Flyer.prototype.setContent = function(a) {
    var b = this;
    b.panel.innerHTML = a
};
Flyer.prototype.show = function(a, b, c) {
    var d = SFUI.getRealStyle(a);
    var e = SFUI.getAbsPoint(a);
    var f = this;
    f.popper = a;
    if ('menubar' == a.className) {
        a.blur()
    }
    f.panel.style.display = 'block';
    var b = b || e.x;
    var c = c || (e.y + parseInt(a.offsetHeight));
    f.panel.style.left = b + 'px';
    f.panel.style.top = c - 1 + 'px'
};
Flyer.prototype.hide = function(e) {
    var a = this;
    var e = e || window.event;
    var b = e.target || e.srcElement;
    if ('span' == b.tagName.toLowerCase() && 'a' == b.parentNode.tagName.toLowerCase()) {
        b = b.parentNode
    }
    if (a.popper != b) {
        if (a.popper) {}
        a.panel.style.display = 'none'
    }
};
var SFSF = {
    showTab: function(a) {
        var b;
        var c = a.parentNode.getElementsByTagName('div');
        for (var i = 0; i < c.length; i++) {
            c[i].className = 'search2009062203';
            var d = c[i].id;
            b = d.substring(d.length - 2);
            var e = $('zbli' + b);
            if (e) {
                SFUI.hide(e)
            }
        }
        if (c[0].id == a.id) {
            a.className = 'search2009062204 first'
        } else {
            a.className = 'search2009062204'
        }
        b = a.id;
        b = b.substring(b.length - 2);
        var e = $('zbli' + b);
        SFUI.show(e)
    },
    showFlyer: function(a, b, c) {
        if (b.setContent) {
            b.setContent(c);
            b.show(a)
        }
    },
    hideFlyer: function(a, b, c) {
        var d = false;
        var a = a || window.event;
        var e = a.target || a.srcElement;
        var c = c || [];
        if (c.length > 0) {
            for (var i = 0; i < c.length; i++) {
                if ($(c[i]) && SFUtil.containNode($(c[i]), e)) {
                    d = true;
                    break
                }
            }
        }
        if (b && !d) {
            b.hide(a)
        }
    },
    info: {
        m: {
            house: {
                column: 3,
                l: ['公寓', '别墅'],
                jz: [1000, 2000, 3000, 5000, 6000, 8000]
            }
        }
    },
    getInfo: function(a, b) {
        if (this.city in this.info) {
            var c = this.info[this.city][a];
            return (b in c) ? c[b] : this.info.m[a][b]
        }
    },
    getGeo: function(a) {
        var b = this.info[this.city][a]['d'];
        if (b) {
            var c = b;
            if (!c[0]['data'][0]['text']) {
                for (var i = 0; i < c.length; i++) {
                    var d = [];
                    var e = c[i]['data'];
                    var f = e.length;
                    if (f > 0) {
                        for (var j = 0; j < f; j++) {
                            d.push({
                                'text': e[j],
                                'value': e[j]
                            })
                        }
                    } else {
                        for (var g in e) {
                            d.push({
                                'text': g,
                                'value': e[g]
                            })
                        }
                    }
                    c[i]['data'] = d
                }
            }
            return c
        }
    },
    getPurpose: function(a) {
        var b = this.getInfo(a, 'l');
        return b
    },
    seperate2range: function(a, b) {
        var c = [];
        var b = b || '';
        var d = a.length;
        var e = 1;
        var f = d;
        if (0 == a[0]) {
            e = 2;
            c.push(a[1] + '以下' + b)
        }
        if ('+' == a[d - 1]) {
            f--
        }
        for (var i = e; i < f; i++) {
            c.push(a[i - 1] + '-' + a[i] + b)
        }
        if ('+' == a[d - 1]) {
            c.push(a[d - 2] + '以上' + b)
        }
        return c
    },
    getPrice: function(a, b) {
        var c;
        var d = [];
        var e = {};
        var f = '万';
        var i;
        var g = {
            '住宅': 'jz',
            '经济适用房': 'jj',
            '别墅': 'jb',
            '写字楼': 'jx',
            '商铺': 'js',
            '厂房仓库': 'jc'
        };
        if (c = this.getInfo(a, g[b])) {
            if (c.length > 0) {
                d = this.seperate2range(c, '')
            } else {
                if ('d' in c) {
                    d = this.seperate2range(c.d, '')
                } else {
                    d = this.getInfo(this.city, 'jz');
                    d = this.seperate2range(d, '')
                }
            }
            e['d'] = d;
            if ('t' in c) {
                d = this.seperate2range(c.t, f);
                e['t'] = d
            }
            if ('z' in c) {
                d = this.seperate2range(c.z, '天');
                e['z'] = d
            }
            if ('y' in c) {
                d = this.seperate2range(c.y, '月');
                e['y'] = d
            }
            return e
        } else {
            c = this.getInfo(a, 'jz');
            if (c) {
                c = this.seperate2range(c, '');
                e['d'] = c;
                return e
            }
        }
    },
    makeMenu: function(a, b, c, d, e) {
        this.popperId = a.id;
        var f = 'panel_' + (a.id);
        var g = '<div id="' + f + '" class="paneltable">' + c + '</div>';
        this.showFlyer(a, b, g);
        var h = document.getElementById(f);
        if (d != 'auto') {
            if (!d) {
                var i = SFUI.getRealStyle(a);
                if (SFUI.getStyleNum(i.width) > 0) {
                    var d = SFUI.getStyleNum(i.borderLeftWidth) + SFUI.getStyleNum(i.paddingLeft) + SFUI.getStyleNum(i.width) + SFUI.getStyleNum(i.paddingRight) + SFUI.getStyleNum(i.borderRightWidth)
                }
            }
            if (d > 0) {
                h.style.width = d - 4 + 'px'
            }
        }
        if (e) {
            h.style.height = e + 'px'
        }
    },
    makeMenuOpt: function(a, b, c, d, e, f) {
        this.popperId = a.id;
        var g = a.id;
        var h = g.substr(0, g.length - 2);
        var j = document.getElementById(h).value;
        var d = d || 1;
        var k = c;
        if (c.length > 0) {
            k = {};
            for (var i = 0; i < c.length; i++) {
                k[c[i]] = c[i]
            }
            if ('undefined' != c.t_31958_t) {
                k.t_31958_t = c.t_31958_t
            }
        }
        var l = '<table cellspacing="0" width="100%"><tr>';
        if ('object' == typeof(k['t_31958_t'])) {
            var m = k['t_31958_t'];
            var i = 0;
            for (i in m) {
                if (0 == i) {} else {
                    l += '</tr><tr><td class="tbheadmore">' + m[i] + '</td>'
                }
            }
            delete k['t_31958_t']
        }
        var i = 0;
        for (i in k) {
            if (d != 1 && 0 == i % d) {
                l += '</tr><tr>'
            }
            l += '</tr><tr><td><a href="javascript:;" onclick="SFUI.setInputA(&quot;' + h + '&quot;,&quot;' + i + '&quot;,&quot;' + k[i] + '&quot;);return false;"';
            l += (j == i) ? ' class="panelcurrent" ' : '';
            l += '>' + k[i] + '</a></td>';
            i++
        }
        l += '</tr></table>';
        this.makeMenu(a, b, l, e, f)
    },
    isNum: function(a) {
        var b = /^\d+$/;
        var c = a.value;
        if (!b.test(c)) {
            alert('请填写整数！');
            return false
        } else {
            return true
        }
    },
    userSetPrice: function(a, b, c) {
        var d = b.minPrice.value;
        var e = b.maxPrice.value;
        var f = false;
        if ('' == d && '' == e) {
            f = true
        } else if (this.isNum(b.minPrice) && this.isNum(b.maxPrice)) {
            if (parseInt(d) >= parseInt(e)) {
                alert('价格上限需大于下限！');
                return false
            }
            var g = d + '-' + e;
            SFUI.setInputA(c, g, g);
            f = true
        }
        if (f) {
            this.menu.hide(a)
        }
    },
    menuDistrict: function(a, b, c) {
        var d = this;
        var c = c || 3;
        var e = a.id;
        var f = e.substr(0, e.length - 2);
        var g = a.getElementsByTagName('span');
        var h = (1 == g.length) ? g[0].innerHTML : a.innerHTML;
        var k = d.getGeo(b);
        var l = k.length;
        if (l > 0) {
            var m = k[0]['hint'];
            if (l > 1) {
                for (var i = 1; i < l - 1; i++) {
                    m += '、' + k[i]['hint']
                }
                m += '或' + k[i]['hint']
            }
            var n = '<table cellspacing="0"><tr></tr>';
            for (var i = 0; i < l; i++) {
                var o = k[i];
                var p = k[i]['id'];
                n += '<tr><td colspan="' + c + '" class="tbheadmore"><span>按' + o['hint'] + '</span>查询</td></tr>';
                var q = o['data'];
                q = [{
                    'text': '全部' + o['hint'],
                    'value': ''
                }].concat(q);
                var r = '';
                for (var j = 0; j < l; j++) {
                    if (p != k[j]['id']) {
                        r += 'SFUI.setInput(&quot;' + k[j]['id'] + '&quot;,&quot;&quot;);'
                    }
                }
                for (var j = 0; j < q.length; j++) {
                    if (0 == j % c) {
                        n += '</tr><tr>'
                    }
                    var s = q[j]['text'];
                    var t = q[j]['value'];
                    n += '<td><a href="javascript:;" ' + ((h == s) ? ' class="panelcurrent" ' : '') + 'onclick="SFUI.setA(&quot;' + e + '&quot;,&quot;' + s + '&quot;);SFUI.setInput(&quot;' + p + '&quot;,&quot;' + t + '&quot;);';
                    n += r + 'return false;">' + s + '</a></td>'
                }
            }
            n += '</tr></table>';
            d.makeMenu(a, d.menu, n, 'auto')
        }
    },
    house: {
        channel: 'house',
        menuDistrict: function(a, b) {
            var c = SFSF;
            var b = c.getInfo(this.channel, 'column');
            c.menuDistrict(a, this.channel, b)
        },
        menuPurpose: function(a) {
            var b = SFSF;
            var c = '全部';
            var d = $('strPurpose0').value;
            var e = '<table width="100%" cellspacing="0">';
            var f = b.getPurpose(this.channel);
            if (f) {
                f = [c].concat(f);
                for (var i = 0; i < f.length; i++) {
                    var g = f[i];
                    e += '<tr><td><a href="javascript:;" ';
                    e += (d == g) ? ' class="panelcurrent" ' : '';
                    e += 'onclick="SFUI.setInputA(&quot;strPurpose0&quot;,&quot;' + ((c == g) ? '' : g) + '&quot;,&quot;' + g + '&quot;);return false;">' + g + '</a></td></tr>'
                }
            }
            e += '</table>';
            b.makeMenu(a, b.menu, e);
            SFUI.setInputA('strPrice0', '', '价格范围')
        },
        menuPrice: function(f) {
            var g = SFSF;
            var h = '全部';
            var j = 'strPurpose0';
            var k = 'strPrice0';
            var l = '元/㎡';
            var m = '';
            var n = '';
            var o = $(j).value;
            o = ('' == o) || (h == o) ? '住宅' : o;
            var p = $(k).value;
            var q = '<table cellspacing="0"><tr>';
            if (p.indexOf('-') > -1) {
                var r = p.split('-');
                m = parseInt(r[0]);
                n = parseInt(r[1])
            }
            var s = g.getPrice(this.channel, o);
            if (s) {
                var t = function(a, b) {
                        var c = '<th class="tbheadmore">' + a + '</th></tr><tr>';
                        c += '<td><a href="javascript:;" onclick="SFUI.setInputA(&quot;' + k + '&quot;,&quot;&quot;,&quot;' + h + '&quot;);return false;">' + h + '</a></td>';
                        for (var i = 0; i < b.length; i++) {
                            var d = b[i];
                            if ((m + '-' + n) == d) {
                                m = '';
                                n = ''
                            }
                            var e = d;
                            if ('总价(万元/套)' == a) {
                                e = e.replace(/万/, '')
                            }
                            if ('租价(元/㎡.天)' == a) {
                                e = e.replace(/天/, '')
                            }
                            if ('租价(元/㎡.月)' == a) {
                                e = e.replace(/月/, '')
                            }
                            c += '</tr><tr><td><a href="javascript:;" ';
                            c += (p == d) ? ' class="panelcurrent" ' : '';
                            c += 'onclick="SFUI.setInputA(&quot;' + k + '&quot;,&quot;' + d + '&quot;,&quot;' + e + '&quot;);return false;">' + e + '</a></td>'
                        }
                        return c
                    };
                q += t('总价(万元/套)', s.d);
                if (('别墅' == o) && ('t' in s)) {
                    q += '</tr><tr><th class="tbheadmore">-------------------</th></tr><tr>';
                    q += t('总价(万元/套)', s.t)
                }
                if ((('写字楼' == o) || ('商铺' == o)) && ('z' in s)) {
                    q += '</tr><tr><th class="tbheadmore">-------------------</th></tr><tr>';
                    q += t('租价(元/㎡.天)', s.z)
                }
                if ((('写字楼' == o) || ('商铺' == o)) && ('y' in s)) {
                    q += '</tr><tr><th class="tbheadmore">-------------------</th></tr><tr>';
                    q += t('租价(元/㎡.月)', s.y)
                }
            }
            if ('住宅' == o) {
                q += '</tr><tr><td class="priceself"></td>'
            }
            q += '</tr></table>';
            g.makeMenu(f, g.menu, q, 'auto')
        },
        suggest_selected: 0,
        suggest: function(e, f) {
            var g = SFSF;
            var e = e || window.event;
            var h = e.keyCode;
            var j = f.id;
            if (h == 13) {} else if ((h < 37) || (h > 40)) {
                this.suggest_selected = 0;
                var k = 'get';
                var l = {
                    'atype': 4,
                    'city': escape(g.city),
                    'q': escape(f.value)
                };
                var m = function(a) {
                        var b = a.responseText;
                        if ('' != b) {
                            var c = b.split(',');
                            var d = '<div id="suggestsearch">';
                            for (var i = 0; i < c.length; i++) {
                                d += '<a href="javascript:;" onclick="SFUI.setInput(\'' + j + '\',\'' + c[i] + '\');SFSF.house.submitForm();document.forms[\'form_newhouse\'].submit();return false;//clearClass();">' + c[i] + '</a>'
                            }
                            d += '</div>';
                            g.makeMenu(f, g.menu, d)
                        } else {
                            g.menu.panel.style.display = 'none'
                        }
                    };
                var n = new SFXHR(g.info[g.city].house.suggest_url, k, l, m)
            } else {
                var o = document.getElementById('suggestsearch');
                if (o) {
                    var p = o.childNodes;
                    var q = p.length;
                    if ((38 == h) || (40 == h)) {
                        if ((38 == h) && (1 < this.suggest_selected)) {
                            this.suggest_selected--
                        }
                        if ((40 == h) && (this.suggest_selected < q)) {
                            this.suggest_selected++
                        }
                        for (var i = 0; i < q; i++) {
                            p[i].className = (i == (this.suggest_selected - 1)) ? 'suggest_selected' : ''
                        }
                        var r = p[this.suggest_selected - 1].childNodes;
                        SFUI.setInput('input_keyw0', r[0].data)
                    }
                }
            }
        },
        submitForm: function() {
            var a = SFSF;
            if ('全部区县' == $('strDistrict0').value) {
                $('strDistrict0').value = '';
                $('strRailway0').value = '';
                $('show_type0').value = ''
            } else if ('' != $('strRailway0').value) {
                $('show_type0').value = 'rail'
            } else if ('' == $('strRailway0').value) {
                $('show_type0').value = '';
            }
            if ($('strDistrict0_a').innerHTML.indexOf('全部地铁') > -1 && $('strRailway0').value == '' && $('strDistrict0').value == '') {
                $('show_type0').value = 'rail';
            }
            var q = $('input_keyw0').value;
            if (q == $('input_keyw0').defaultValue) {
                $('strNamekeyword0').value = ''
            } else {
                $('strNamekeyword0').value = q
            }
        }
    },
    bbs: {
        bbsHint: function(a) {
            var b = $('q_bbs');
            var c = b.value;
            if ('' == c || '输入关键字(楼盘名/小区名/论坛名等)' == c || '输入关键字或作者名' == c) {
                b.value = a
            }
            b.defaultValue = a;
            var d = function() {
                    SFUI.toggleHint(b, a)
                };
            b.onblur = d;
            b.onfocus = d
        },
        menuSt: function(a) {
            var b = {
                '0': {
                    d: '论坛',
                    h: '输入关键字(楼盘名/小区名/论坛名等)'
                },
                '1': {
                    d: '帖子',
                    h: '输入关键字或作者名'
                }
            };
            var c = SFSF;
            var d = '<table width="100%" cellspacing="0">';
            this.popperId = a.id;
            var e = a.id;
            var f = e.substr(0, e.length - 2);
            var g = document.getElementById(f).value;
            var b = b;
            for (var h in b) {
                d += '<tr><td><a href="javascript:;" ';
                d += (g == h) ? ' class="panelcurrent" ' : '';
                d += 'onclick="SFUI.setInputA(&quot;' + f + '&quot;,&quot;' + h + '&quot;,&quot;' + b[h].d + '&quot;);SFSF.bbs.bbsHint(&quot;' + b[h].h + '&quot;);return false;">' + b[h].d + '</a></td></tr>'
            }
            d += '</table>';
            c.makeMenu(a, c.menu, d)
        },
        submitForm: function() {
            var a = SFSF;
            var b = $('form_bbs');
            var q = b.q;
            var c = b.sl;
            var d = b.st.value;
            var e = '';
            if (q.value == q.defaultValue) {
                q.value = ''
            }
            if ('1' == d || '2' == d) {
                if (q.value == q.defaultValue || '' == q.value) {
                    e = 'http://search.71cg.com/bbs'
                } else {
                    c.value = ('2' == d) ? 'author' : '';
                    e = 'http://search.71cg.com/bbs/search.jsp'
                }
            } else {
                var f = b.key;
                f.value = q.value;
                e = a.info[a.city].bbs.action
            }
            b.action = e
        }
    },
    popperId: '',
    menu: {},
    city: '',
    init: function() {
        var a = this;
        var b = '';
        for (var c in a.info) {
            b = c
        }
        a.city = b;
        SFUI.setInput('strCity', b);
        var d = a.info[b].house.action;
        if (d) {
            $("form_newhouse").action = d
        }
        a.menu = new Flyer('SFmenu');
        SFUtil.eventAdd(document, 'click', function(e) {
            a.hideFlyer(e, a.menu, ['houseprice', 'esfprice', 'rentprice'])
        })
    }
};

