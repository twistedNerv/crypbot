$(function() {
    $('#single-box-edit').on('click', function() {
        $('.single-box').toggleClass('resizible');
        $('#save-boxes').toggle();
        $('#add-box').toggle();
        $('.box-settings-wrapper').toggle();
    });

    $('#add-box').on('click', function() {
        $.ajax({
            url: 'index/add_box', 
            success: function(result){
                $.post('elements/new_empty_box', function(data){
                    var data = data.replace('col-sm-6 single-box', 'col-sm-6 single-box resizible');
                    $('#content > .row').append(data);
                    $('.box-settings-wrapper').show();
                });
            }
        });
    });
    
    $('#save-boxes').on('click', function() {
        var attrArray = [];
        $('.single-box').each(function(i) {
            var cleanId = $(this).attr('id').replace('box','');
            attrArray[i] = [];
            attrArray[i][0] = cleanId;
            attrArray[i][1] = $(this).width();
            attrArray[i][2] = $(this).height();
            attrArray[i][3] = $(this).attr('position');
        })
        $.ajax({
            type: "POST",
            url: "index/save_state",
            data: {params: attrArray},
            success: function(result){
                console.log(result);
            }
        });
    });
    
    $('.delete-box').on('click', function() {
        var boxId = $(this).closest('div.single-box').attr('id');
        $.ajax({
            url: 'index/remove_box/' + boxId.replace('box',''), 
            success: function(result){
                $('#' + boxId).remove();
            }
        });
    });
    
    $('.update-box-content').on('click', function() {
        var boxId = $(this).closest('div.single-box').attr('id');
        var interface = $('#' + boxId + ' .update-box-content-interface');
        var select = $('#' + boxId + ' .select-content-interface');
        var content = $('#' + boxId + ' .box-content');
        
        interface.toggle();
        select.bind('change', function() {
            $.post(select.val(), function(data){
                select = $('#' + boxId + ' .select-content-interface');
                $(content).html(data);
            });
            var updateParams = boxId + '-v-' + select.val().replace(/\//g,'-o-');
            $.post('index/update_box/' + updateParams, function() {
                
            });
        })
    });
    
    
});