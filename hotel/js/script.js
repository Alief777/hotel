const upload = document.getElementById("upload");
const text_gambar = document.getElementById("text-gambar");

upload.addEventListener('change', function() {
    const files = upload.files[0];
    const fileReader = new FileReader();
    fileReader.readAsDataURL(files);
    fileReader.addEventListener('load', function() {
        text_gambar.value = files.name;
    })
})