        var srax = document.getElementById("strPrice0_a");
        srax.onfocus = function() { if (this.value == this.defaultValue) this.value = '' };
        srax.onblur = function() { if (/^\s*$/.test(this.value)) { this.value = this.defaultValue; this.style.color = '#333' } }
        srax.onkeydown = function() { this.style.color = '#333' }

        var s = document.getElementById("input_keyw0");
        s.onfocus = function() { if (this.value == this.defaultValue) this.value = '' };
        s.onblur = function() { if (/^\s*$/.test(this.value)) { this.value = this.defaultValue; this.style.color = '#888' } }
        s.onkeydown = function() { this.style.color = '#333' }

        var sr = document.getElementById("strDistrict0_a");
        sr.onfocus = function() { if (this.value == this.defaultValue) this.value = '' };
        sr.onblur = function() { if (/^\s*$/.test(this.value)) { this.value = this.defaultValue; this.style.color = '#333' } }
        sr.onkeydown = function() { this.style.color = '#333' }

        var sra = document.getElementById("strPurpose0_a");
        sra.onfocus = function() { if (this.value == this.defaultValue) this.value = '' };
        sra.onblur = function() { if (/^\s*$/.test(this.value)) { this.value = this.defaultValue; this.style.color = '#333' } }
        sra.onkeydown = function() { this.style.color = '#333' }

        function getId() {
            document.getElementById("span1").style.display = "none";
        }
        function outId(e) {
            var targ
            if (!e) var e = window.event
            if (e.target) targ = e.target
            else if (e.srcElement) targ = e.srcElement
            if (targ.nodeType == 3) // defeat Safari bug
                targ = targ.parentNode
            var tname
            tname = targ.id
            if (document.getElementById("input_keyw0").value == "" && tname != "input_keyw0") {
                document.getElementById("span1").style.display = "block";
            }
        }
        function Id() {
            document.getElementById("input_keyw0").select();
            getId();
        }


        // 轮播
        jq(function() {
            var sWidth = jq("#worldFocus_Box").width();

            var len = jq("#show_pic  li").length;
            var index = 0;
            var picTimer;
            jq("#icon_num li").mouseenter(function() {
                index = jq("#icon_num li").index(this);
                showPics(index);
            }).eq(0).trigger("mouseenter");
            jq("#show_pic").css("width", sWidth * (len + 1));
            jq("#worldFocus_Box").hover(function() {
                clearInterval(picTimer);
            }, function() {
                picTimer = setInterval(function() {
                    if (index == len) {
                        showFirPic();
                        index = 0;
                    } else {
                        showPics(index);
                    }
                    index++;
                }, 3000);
            }).trigger("mouseleave");

            function showPics(index) {
                var nowLeft = -index * sWidth;
                jq("#show_pic").stop(true, false).animate({ "left": nowLeft }, 500);
                jq("#icon_num li").removeClass("on").eq(index).addClass("on");
            }
            function showFirPic() {
                jq("#show_pic").append(jq("#show_pic li:first").clone());
                var nowLeft = -len * sWidth;
                jq("#worldFocus_Box ul").stop(true, false).animate({ "left": nowLeft }, 500, function() {
                    jq("#show_pic").css("left", "0");
                });
                jq("#icon_num li").removeClass("on").eq(0).addClass("on");
            }

            if (jq("#dbtl1").html() != "")
                jq("#adbtl1").html(jq("#dbtl1").html());
            if (jq("#tl14").html() != "")
                jq("#atl14").html(jq("#tl14").html());
            if (jq("#tl19").html() != "")
                jq("#atl19").html(jq("#tl19").html());
            if (jq("#tl25").html() != "")
                jq("#atl25").html(jq("#tl25").html());
            if (jq("#tl36").html() != "")
                jq("#atl36").html(jq("#tl36").html());
            if (jq("#tl36").html() != "")
                jq("#atl36").html(jq("#tl36").html());
            if (jq("#tl210").html() != "")
                jq("#atl210").html(jq("#tl210").html());
            if (jq("#tl47").html() != "")
                jq("#atl47").html(jq("#tl47").html());
            if (jq("#tl58").html() != "")
                jq("#atl58").html(jq("#tl58").html());
        });

