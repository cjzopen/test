function remove_a_query_key( key ){
  const [ head, tail ] = location.href.split( '?' );
  if(tail.includes("&")){
    history.replaceState({}, document.title,head + '?' + tail.replace( new RegExp( `&${key}=[^&]*|${key}=[^&]*&` ), '' ));
  }else{
    history.replaceState({}, document.title,head);
  }
}
