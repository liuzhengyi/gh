var $ = function(id) {
    return document.getElementById(id);
}
/*视频滑动门*/
function show_menu(num) {
    for (i = 0; i < 100; i++) {
        if ($('li0' + i)) {
            $('h0' + i).style.display = 'none';
            $('li0' + i).style.display = 'none';
            $('f0' + i).className = 'td';
        }
    }
    $('h0' + num).style.display = 'block'; //触发以后标题块
    $('li0' + num).style.display = 'block'; //触发以后信息块
    $('f0' + num).className = 'td1'; //触发以后TAG样式
}

/* 详细信息 滑动门 */
function show_menud(num2) {
    for (i = 0; i < 100; i++) {
        if ($('dli0' + i)) {
            $('dli0' + i).style.display = 'none';
            $('df0' + i).className = 'xiangxidowntop02';
        }
    }
    $('dli0' + num2).style.display = 'block';
    $('df0' + num2).className = 'xiangxidowntop01';
}


/* 楼盘相册 楼盘样板间 */
function show_menu1(id1, id2, index, count, classcurrent, classname) {
    for (var i = 0; i < count; i++) {
        $(id2.toString() + i).style.display = "none";
        $(id1.toString() + i).className = classname;
    }
    $(id2.toString() + index).style.display = "block";
    $(id1.toString() + index).className = classcurrent;


    $("more" + index).style.display = "";
    $("more" + Math.abs(index - 1)).style.display = "none";
}
/*分类导航*/
function show_menuc2(id1, id2, index, count, classcurrent, classname) {
    for (var i = 0; i < count; i++) {
        $(id2.toString() + i).style.display = "none";
        $(id1.toString() + i).className = classname;
    }
    $(id2.toString() + index).style.display = "block";
    $(id1.toString() + index).className = classcurrent;
}
/*添加选房单*/
function PostSelect(domains) {
    if (Get_Cookie('new_loginid') == null) {

        var vurl = "/house/web/dopost.php?msg=" + escape('没有登陆') + "&newcode=" + newcode + "&name=" + projn + "&address=" + address + "&city=" + vcity + "&price=" + priceright + "&pricetype=" + pricetyperight + "&face=" + face + "&houseurl=" + houseurl + "&time=" + new Date().getTime();
        if (document.getElementById("newhouse_login").style.display == "block") {
            document.getElementById("newhouse_login").style.display = "none";
            document.getElementById("iframe_selecthouse_login").src = vurl;
        }
        if (document.getElementById("newhouse_login").style.display == "none") {
            document.getElementById("newhouse_login").style.display = "block";
        }
    }
    else {
        document.getElementById("iframe_selecthouse_login").src = 'loading.htm';
        var vurl = "/house/web/dopost.php?msg=" + escape('没有登陆') + "&newcode=" + newcode + "&name=" + projn + "&address=" + address + "&city=" + vcity + "&price=" + priceright + "&pricetype=" + pricetyperight + "&face=" + face + "&houseurl=" + houseurl + "&time=" + new Date().getTime();

        document.getElementById("iframe_selecthouse_login").src = vurl;
        if (document.getElementById("newhouse_login").style.display == "none")
            document.getElementById("newhouse_login").style.display = "block";
        //Xml.Request(vurl,null,ResultMsg,null);
    }
}

function PrintNoHdr() {
    t = new ActiveXObject("WScript.Shell");
    t.RegWrite("HKCU\\Software\\Microsoft\\InternetExplorer\\PageSetup\\header", "");
    t.RegWrite("HKCU\\Software\\Microsoft\\InternetExplorer\\PageSetup\\footer", "");
    window.print()
}
function CommonUser() {
    var _this = this;
    _this.Country = "";
    _this.Newcode = "";  
    _this.WriteHtml = function() {

    document.write("<form id=\"adduserform\" action=\"http://world.soufun.com/world.webui/DataModule/HouseAddUser.ashx\" method=\"post\" onsubmit=\"return JdagetText();\">");
    document.write("<table width=\"90%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">");
    document.write("<tr>");
    document.write("<td width=\"21%\">");
    document.write("姓 名： </td> <td width=\"79%\">");
    document.write("<input type=\"text\" name=\"txtName\" id=\"txtName\" class=\"getinput\" />");
    document.write("</td>");
    document.write(" </tr> <tr><td>手 机： </td>");
    document.write("<td> <input type=\"text\" name=\"txtPhone\" id=\"txtPhone\" class=\"getinput\" /></td>");
    document.write("</tr><tr> <td> 邮 箱： </td> ");
    document.write("<td> <input type=\"text\" name=\"txtEmail\" id=\"txtEmail\" class=\"getinput\" /> </td>");
    document.write("</tr> <tr> <td valign=\"top\">   留 言：  </td>");
    document.write("<td><label><textarea name=\"txtMessage\" id=\"txtMessage\" style=\"width: 160px; height: 50px; border: 1px solid #d7d7d7;color: #888;\" onclick=\"javascript:if(this.value=='我对此房源及类似房源感兴趣，希望能获得信息咨询或购房帮助。'){this.value='';}\" onblur=\"javascript:if(this.value==''){this.value='我对此房源及类似房源感兴趣，希望能获得信息咨询或购房帮助。';}\">我对此房源及类似房源感兴趣，希望能获得信息咨询或购房帮助。</textarea>");
   document.write(" </label> </td> </tr> <tr>   <td>   &nbsp;  </td>");
   document.write(" <td>  <label>  <input type=\"checkbox\" name=\"ispost\" id=\"ispost\" value=\"1\" />   </label>");
   document.write("  <span class=\"blue\">订阅会员周刊</span>");
   document.write(" </td>  </tr>  <tr> <td> &nbsp;<input type=\"hidden\" name=\"txtCountry\" id=\"txtCountry\" value=\""+ _this.Country+"\" />");
   document.write("<input type=\"hidden\" name=\"txtNewcode\" id=\"txtNewcode\" value=\""+_this.Newcode+"\" />");
   document.write("<input type=\"hidden\" name=\"code\" id=\"code\" value=\"asdflsdfa!$@@$i8\" />");
   document.write("  </td> <td> <label><input type=\"submit\" name=\"Submit\" value=\"提交\" class=\"button01\" />");
   document.write(" </label>  </td>  </tr></table>");
   document.write("</form>");
    }

}
function JdagetText() {
    var username = document.getElementById("txtName").value;
    username = username.replace(/^\s+|\s+$/g, ""); //去掉空格
    var telephone = document.getElementById("txtPhone").value;
    telephone = telephone.replace(/^\s+|\s+$/g, "");
    var email = document.getElementById("txtEmail").value;
    email = email.replace(/^\s+|\s+$/g, "");
    if (username == "") {
        alert("用户名不能为空");
        return false;
    }
    if (telephone == "") {
        alert("手机号码不能为空");
        return false;
    }
    var reg = /^1\d{10}$/;

    if (!reg.test(telephone)) {

        alert("手机号格式不正确");

        document.getElementById("txtPhone").focus();

        return false;
    }
    if (email == "") {
        alert("邮箱不能为空");
        return false;
    }
    if (email == '') {
        alert('邮箱不能为空！');
        return false;
    }
    var pat = /^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/;

    if (!pat.test(email)) {
        alert("邮箱格式不正确");
        return false;
    }
}
