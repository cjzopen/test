$("#全選input的id").change(function () {
    $('.tableName').find("input:checkbox").prop('checked', $(this).prop("checked"));
});