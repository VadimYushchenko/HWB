jQuery(document).ready(function() {
     jQuery('.simple_slider_upload_button').click(function() {
    	 jQuery('.simple_slider_upload_button').each(function (){
    		 formfield = jQuery(this).id;
    		 alert(formfield); false;
    		 tb_show('', 'media-upload.php?type=image&amp;amp;TB_iframe=true');
    		 return false;
    	 });
    	 
     //formfield = jQuery('.simple_slider_upload').attr('name');
     //tb_show('', 'media-upload.php?type=image&amp;amp;TB_iframe=true');
     //return false;
});

window.send_to_editor = function(html) {
     imgurl = jQuery('img',html).attr('src');
     jQuery('.simple_slider_upload').val(imgurl);
     tb_remove();
    }
});