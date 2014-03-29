var jq = jQuery.noConflict();
function loadScript(B, D) {
    var A = document.createElement("script"), C = document.documentElement.firstChild;
    A.type = "text/javascript";
    if (A.readyState) {
        A.onreadystatechange = function() { if (A.readyState == "loaded" || A.readyState == "complete") { A.onreadystatechange = null; D() } }
    } else {
        A.onload = function() { D() }
    }
    A.src = B;
    C.insertBefore(A, C.firstChild)
};

function MM_preloadImages() { //v3.0
  var d=document;
  if(d.images){
    if(!d.MM_p) {
        d.MM_p=new Array();
    }
    var i, j=d.MM_p.length, a=MM_preloadImages.arguments;
    for(i=0; i<a.length; i++) {
        if (a[i].indexOf("#")!=0){
            d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];
        }
    }
  }
}

