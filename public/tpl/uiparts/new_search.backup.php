<!--新搜索20120413 begin-->
    <script type="text/javascript">
        loadScript("js/origion_sfsf.js", function() { loadScript("js/origion_sfsf_dev.js?v=1", function() { setTimeout(function() { SFSF.init(); }, 0) }) });
    </script>
   
<div class="top" style="margin-top: 20px; margin-bottom: 20px;">
    <div class="toplogo" id="dsy_B01_29">
      <a href="<?php echo $_cfg_siteRoot;?>index.php" id="world_B04_20" target="_blank"> <img src="./image/ui/newlogo.png" alt="<?php echo $_cfg_logo_alt; ?>" width="260" style="padding-top: 13px;" ></a>
    </div>
   
    <div class="topright">
        <div class="toprightnav">
        </div>
        <div class="toprightform">
             <form target="_blank" id="form_newhouse" name="form_newhouse" onsubmit="SFSF.house.submitForm();" action="<?php echo $_cfg_siteRoot;?>house_list.php" method="post" class="search20090622080118from" accept-charset="gbk">
                <div class="tr01">
                    <span id="world_B04_29">
                        <input type="text" maxlength="40" onmousedown="javascript:getId();" onfocus="SFUI.toggleHint(this);this.className=&#39;inputstyle_on&#39;;this.onmouseout=&#39;&#39;" value="   请输入关键字(楼盘名/地名/开发商等)" class="inputstyle_out" id="input_keyw0" autocomplete="off" style="color: rgb(150, 150, 150);">
                        <span class="inpbj" id="span1" onclick="javascript:Id();"></span>
                    </span>
                    <span id="world_B04_30">
                        <input type="image" src="./image/ui/schh111.gif" style="width: auto; height: auto; margin-left: 3px;">
                    </span>
                </div>
                <div class="tr02">
                    <input type="hidden" id="strCity" name="strCity" value="海外">
                    <input type="hidden" id="strDistrict0" name="strDistrict"> 
                    <input type="hidden" id="strRailway0" name="Railway">
                    <input type="hidden" id="strRoundStation0" name="strRoundStation">
                    <input type="hidden" id="strPurpose0" name="strPurpose">
                    <input type="hidden" id="strPrice0" name="strPrice">
                    <input type="hidden" id="strNamekeyword0" name="strNamekeyword">
                    <input type="hidden" id="show_type0" name="show_type">
                   <span id="dsy_B01_40">
                       <a href="javascript:;" target="_self" class="menubar" style="font-size: 12px;" id="strDistrict0_a" onclick="SFSF.house.menuDistrict(this);return false;"><span>国家</span></a>
                   </span>
                    <a href="javascript:;" target="_self" class="menubar" style="font-size: 12px;" id="strPurpose0_a" onclick="SFSF.house.menuPurpose(this);return false;"><span>物业类型</span></a>
                    <span id="dsy_B01_42"><a href="javascript:;" target="_self" class="menubar" style="font-size: 12px;" id="strPrice0_a" onclick="SFSF.house.menuPrice(this, $(&#39;strPurpose0&#39;).value);return false;"> <span>价格范围</span></a>
                    </span> 
                </div>
            </form>
        </div>
    </div>
</div>

