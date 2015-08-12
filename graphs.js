$.ajax({
    url: "getData.php",
    type: "POST",
    data: { },
    dataType: 'script',
    cache: false,
    success: function (response) {
        if (response != '') 
        {
            $(document.body).append(response);
        }
    }
});