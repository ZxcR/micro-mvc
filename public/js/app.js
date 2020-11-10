$(document).ready(function(){
    console.log("test");
    if($('table').length > 0) {
        $('table').DataTable({
            'pageLength': 3
        });
    }

    $('.task_checked').on('change', function(){
        var id = $(this).data("id");
        var status = $(this).prop("checked");
    
        $.ajax({
            type: "GET",
            url: `task/change-status?id=${id}`,
            success: function(data) {
                res = JSON.parse(data);
                if(res.status == "open") {
                    $('[data-status-id="'+id+'"]').removeClass("badge-success");
                    $('[data-status-id="'+id+'"]').addClass("badge-warning");
                } else {
                    $('[data-status-id="'+id+'"]').removeClass("badge-warning");
                    $('[data-status-id="'+id+'"]').addClass("badge-success");
                }
    
                $('[data-status-id="'+id+'"]').text(res.status);
            }
        });
    
    });
});