$("document").ready(function () {
    
    load_data();
    
    function load_data(key) {
        $.ajax({
            url: "search.php",
            method: "POST",
            data: {
                keywords: key
            },
            success: function (data) {
                console.log(data);
                $('#search-result').html(data);
            }
        });
    }
    $('#search-text').keyup(function () {
        var search = $(this).val();
        console.log(search);
        if (search != '') {
            load_data(search);
        } else {
            load_data();
        }
    });
    
});