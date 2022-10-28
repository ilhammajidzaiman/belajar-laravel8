function previewImg() {
    const sampul = document.querySelector('#file');
    const img_preview = document.querySelector('.img-preview');
    const file_sampul = new FileReader();
    file_sampul.readAsDataURL(sampul.files[0]);
    file_sampul.onload = function(e) {
        img_preview.src = e.target.result;
    }
}