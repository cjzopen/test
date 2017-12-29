// set cookie
function setCookie(name,value,days){
  if (days)  {
    var date = new Date();
    date.setTime(date.getTime()+(days*24*60*60*1000));
    var expires = "; expires="+date.toGMTString();
  }
  else var expires = "";
  document.cookie = name+"="+value+expires+"; path=/";
}
// get cookie value
function getCookie(name) {
  var arr = document.cookie.match(new RegExp("(^| )" + name + "=([^;]*)(;|$)"));
  if (arr != null) return unescape(arr[2]);
  return null;
}
var ckname = 'my_cookie_name';
if(document.cookie.indexOf(ckname) > -1){
  var cookieV = getCookie(ckname);
  if(cookieV == 1){
    // 刪除 cookie
    document.cookie = ckname + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
  }
}