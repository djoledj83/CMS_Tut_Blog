window.onload = function() {
    CKEDITOR.replace( 'my_editor', {
        customConfig: ''
        // customConfig: '/js/ckeditor_config.js'
    });
}

$(document).ready(function(){

$('#selectAllBoxes').click(function(event){

    if(this.checked){
        $('.checkBoxes').each(function(){
            this.checked = true;
        })
    } else {
        $('.checkBoxes').each(function(){
            this.checked = false;
        })
    }
})

});
