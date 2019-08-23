var thd = new Date();
var utc = thd.getTime() + (thd.getTimezoneOffset() * 60000);
var nd = new Date(utc + (3600000*'+8'));
var ares_cache_obj = {};

if(localStorage.getItem('ares_path_cache') === null){
  ares_cache_obj[nd.toLocaleString()] = decodeURI(window.location.pathname);
  localStorage.setItem('ares_path_cache', JSON.stringify(ares_cache_obj));
}else{
  ares_cache_obj = JSON.parse(localStorage.getItem('ares_path_cache'));
  if(Object.keys(ares_cache_obj).length > 9){
    var first_key = Object.keys(ares_cache_obj)[0];
    delete ares_cache_obj[first_key];
  }
  ares_cache_obj[nd.toLocaleString()] = decodeURI(window.location.pathname);
  localStorage.setItem('ares_path_cache', JSON.stringify(ares_cache_obj));
}
