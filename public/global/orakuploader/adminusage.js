$('#photo').orakuploader({
    orakuploader_path         : url+'/',
    orakuploader_ckeditor         : true,
    orakuploader_use_dragndrop            : true,
    orakuploader_use_sortable   : false,
    orakuploader_main_path : 'uploads/temp/',
    orakuploader_thumbnail_path : 'uploads/temp/',
    orakuploader_thumbnail_real_path : asset+'uploads/temp/',
    orakuploader_loader_image       : asset+'images/loader.gif',
    orakuploader_no_image       : asset+'images/no-image.jpg',
    orakuploader_add_label       : 'เลือกรูปภาพ',
    orakuploader_use_rotation: true,
    orakuploader_maximum_uploads : 1,
    orakuploader_hide_on_exceed : true,
});

function editphoto(path){
    $('#editphoto').parent().html('<div id="editphoto" orakuploader="on"></div>');
    if(path){
        $('#editphoto').orakuploader({
            orakuploader_path         : url+'/',
            orakuploader_ckeditor         : true,
            orakuploader_use_dragndrop            : true,
            orakuploader_use_sortable   : true,
            orakuploader_main_path : 'uploads/temp/',
            orakuploader_thumbnail_path : 'uploads/temp/',
            orakuploader_thumbnail_real_path : asset+'uploads/temp/',
            orakuploader_loader_image       : asset+'images/loader.gif',
            orakuploader_no_image       : asset+'images/noimage.jpg',
            orakuploader_add_label       : 'เลือกรูปภาพ',
            orakuploader_use_rotation: true,
            orakuploader_hide_on_exceed : true, 
            orakuploader_maximum_uploads : 0,
            orakuploader_attach_images: [path],
        });
    }else{
        $('#editphoto').orakuploader({
            orakuploader_path         : url+'/',
            orakuploader_ckeditor         : true,
            orakuploader_use_dragndrop            : true,
            orakuploader_use_sortable   : true,
            orakuploader_main_path : 'uploads/temp/',
            orakuploader_thumbnail_path : 'uploads/temp/',
            orakuploader_thumbnail_real_path : asset+'uploads/temp/',
            orakuploader_loader_image       : asset+'images/loader.gif',
            orakuploader_no_image       : asset+'images/no-image.jpg',
            orakuploader_add_label       : 'เลือกรูปภาพ',
            orakuploader_use_rotation: true,
            orakuploader_hide_on_exceed : true, 
            orakuploader_maximum_uploads : 1,
        });
    }
}