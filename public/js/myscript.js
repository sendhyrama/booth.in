function inputangka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
 
    return false;
    return true;
}

function klikfile(){
    document.querySelector('#gambar').click();
}

//untuk preview gambar di upload stand
function tampilkanGambar(e){
    if(e.files[0]){
        var reader = new FileReader();

        reader.onload = function(e){
            document.querySelector('#gambar').setAttribute('src', e.target.result);    
        }
        reader.readAsDataURL(e.files[0]);
    }
}
