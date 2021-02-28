document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
const dropZoneElement = inputElement.closest(".drop-zone");

dropZoneElement.addEventListener("click", (e) => {
    inputElement.click();
});

inputElement.addEventListener("change", (e) => {
    if (inputElement.files.length) {
    updateThumbnail(dropZoneElement, inputElement.files[0]);
    }
});

dropZoneElement.addEventListener("dragover", (e) => {
    e.preventDefault();
    dropZoneElement.classList.add("drop-zone--over");
});

["dragleave", "dragend"].forEach((type) => {
    dropZoneElement.addEventListener(type, (e) => {
    dropZoneElement.classList.remove("drop-zone--over");
    });
});

dropZoneElement.addEventListener("drop", (e) => {
    e.preventDefault();

    if (e.dataTransfer.files.length) {
    inputElement.files = e.dataTransfer.files;
    updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
    }

    dropZoneElement.classList.remove("drop-zone--over");
});
});

/**
 * Updates the thumbnail on a drop zone element.
 *
 * @param {HTMLElement} dropZoneElement
 * @param {File} file
 */
function updateThumbnail(dropZoneElement, file) {
let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");

// First time - remove the prompt
if (dropZoneElement.querySelector(".drop-zone__prompt")) {
    dropZoneElement.querySelector(".drop-zone__prompt").remove();
}

// First time - there is no thumbnail element, so lets create it
if (!thumbnailElement) {
    thumbnailElement = document.createElement("div");
    thumbnailElement.classList.add("drop-zone__thumb");
    dropZoneElement.appendChild(thumbnailElement);
}

thumbnailElement.dataset.label = file.name;

// Show thumbnail for image files
if (file.type.startsWith("image/")) {
    const reader = new FileReader();

    reader.readAsDataURL(file);
    reader.onload = () => {
    thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
    };
} else {
    thumbnailElement.style.backgroundImage = null;
}
}




//Admin Paneli

//Proje Sil
function Delete(id) {
    var txt;
    var r = confirm("Bu kaydı silmek istediğinizie emin misin?");
    if (r == true) {
      window.location = "projeler.php?KID="+id;
    } else {
      txt = "You pressed Cancel!";
    }
}

//Projenin Detayı
function OpenProject(index) {
    window.location = "projeDetay.php?DetayID="+index;
}

//projeyi Düzenle
function Edit(index) {
    window.location = "projeyiDuzenle.php?KID="+index;
}

//daha fazla foto ekleS
function AddIMG(index) {
    window.location = "projeFotografEkle.php?KID="+index;
}


function deletePhoto(index) {
    var txt;
    var r = confirm("Bu kaydı silmek istediğinizie emin misin?");
    if (r == true) {
      window.location = "fotograflar.php?PID="+index;
    } else {
      txt = "You pressed Cancel!";
    }
}


function tamamlandı(index) {
    window.location = "projeler.php?tamamlandi="+index;
}

function devamEdiyor(index) {
    window.location = "projeler.php?DevamEdiyor="+index;
}