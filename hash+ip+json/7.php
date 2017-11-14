<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8" />
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="apple-mobile-web-app-capable" content="yes"/>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>
<style>
img{width: 200px;}
</style>
<body>
<script>
                $.ajax({
                    url: '6.php',
                    type: "GET",
                    dataType:'json'
                })
                .done(function(data){
                    console.log(data);
                    $.each(data, function(index, element) {
                        // $('#t').append($('<article>', { text: element.title }));
                        $('#t').append('<article><img src="'+ element.photo +'" alt="'+ element.title +'"><h2>'+ element.title +'</h2><time>'+ element.date +'</time><p>'+ element.description +'</p></article>');
                    });
                })
                .fail(function(jqXHR, status, errorThrown) {
                    var errMsg;
                    if (jqXHR.status === 0) {
                        errMsg = 'Not connect.  Verify Network.';
                    } else if (jqXHR.status == 404) {
                        errMsg = 'Requested page not found. [404]';
                    } else if (jqXHR.status == 500) {
                        errMsg = 'Internal Server Error [500].';
                    } else if (status === 'parsererror') {
                        errMsg = 'Requested JSON parse failed.';
                    } else if (status === 'timeout') {
                        errMsg = 'Time out error.';
                    } else if (status === 'abort') {
                        errMsg = 'Ajax request aborted.';
                    } else {
                         errMsg = 'Uncaught Error./n' + jqXHR.responseText;
                    }
                    $('section.list').html(errMsg);
                    $('.paging a').removeClass('act');
                    console.log('header load Error: ' + errorThrown)
                    console.log('Status: ' + status)
                    console.dir(jqXHR)
                })
                .always(function() {
                });
</script>
<div id="t">hello</div>
</body>
</html>