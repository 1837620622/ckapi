 

/*瀵艰埅鏍忕洰鍒囨崲鏍峰紡*/ 
$(".border-bottom").css({"transition":"0s all"}); 
var navnow = $("header nav .hover").index(); 
if (navnow >= 0) { 
$(".border-bottom").css({ "display": "block", "left": $("header nav li").eq(navnow).position().left + parseInt($("header nav li").eq(navnow).css("padding-left")), "width": $("header nav li").eq(navnow).width() }); 
} else { 
$(".border-bottom").hide(); 
} 
$(".border-bottom").css({"transition":"0.2s all"});  
$("header nav li").hover(function (e) { 
$(".border-bottom").show(); 
$("header nav .hover").removeClass("hover"); 
$(this).addClass("hover"); 
$(".border-bottom").css({"left": $(this).position().left + parseInt($("header nav li").eq(navnow).css("padding-left")), "width": $(this).width()}); }, function (e) { 
$("header nav .hover").removeClass("hover"); if (navnow >= 0) { $("header nav li").eq(navnow).addClass("hover"); $(".border-bottom").css({ "left": $("header nav li").eq(navnow).position().left + parseInt($("header nav li").eq(navnow).css("padding-left")), "width": $("header nav div").eq(navnow).width() }); return; } $(".border-bottom").hide(); }); 
/*鏄惁浠婂ぉ*/
function isToday(date) {
    date = /\s*/.test(date) ? date.split(" ")[0] : date;
    var now = new Date();
    var seperator1 = "-";
    var month = now.getMonth() + 1;
    var strDate = now.getDate();
    var year = now.getFullYear();
    if (month >= 1 && month <= 9) {
        month = "0" + month;
    }
    if (strDate >= 0 && strDate <= 9) {
        strDate = "0" + strDate;
    }
    var currentdate = year + seperator1 + month + seperator1 + strDate;
    return currentdate === date;
}
/*鍔犺浇褰撳墠鏃堕棿*/
$(".time").html(getTimeHtml());
setInterval(function () {
    $(".time").html(getTimeHtml());
}, 1000);
/*鑾峰彇褰撳墠鏃堕棿娈�*/
function getTimeHtml() {
    var now = new Date();
    var year = now.getFullYear();
    var month = now.getMonth() + 1;
    var day = now.getDate();
    var hh = now.getHours();
    var mm = now.getMinutes();
    var ss = now.getSeconds();
    if (month < 10) month = "0" + month;
    if (day < 10) day = "0" + day;
    if (hh < 10) hh = "0" + hh;
    if (mm < 10) mm = "0" + mm;
    if (ss < 10) ss = "0" + ss;
    return "<span>" + month + "</span> <small>月</small> <span>" + day + "</span> <small>" + hh + ":" + mm + ":" + ss + " 周" + "零一二三四五六七".charAt(new Date().getDay()) + "</small>";
}
 /*杩斿洖椤堕儴*/ if($(".backtop").length>0){ if($(document).scrollTop()>200){ $(".backtop").show(); }else{ $(".backtop").hide(); }  $(document).scroll(function(e) { if($(this).scrollTop()>200){ $(".backtop").show(); }else{ $(".backtop").hide(); } }); $(".backtop").click(function(){ $('html,body').animate({scrollTop: 0},'slow'); }); } 