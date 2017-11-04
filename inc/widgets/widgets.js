
// Image Uploader
jQuery(document).ready( function() {
    jQuery( ".dt-logo-upload" ).live( "click", function () {
        var jw_attachment_link = wp.media.editor.send.attachment;
        var button = jQuery(this);
        wp.media.editor.send.attachment = function (props, attachment) {
            jQuery(button).prev().prev().attr('src', attachment.url);
            jQuery(button).prev().val(attachment.url);
            wp.media.editor.send.attachment = jw_attachment_link;
        };
        wp.media.editor.open(button);
        return false;
    });
});
