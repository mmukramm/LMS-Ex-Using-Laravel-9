let modal = document.getElementsByClassName("modal_container")[0];
let deleteAlert = document.getElementsByClassName("modaldel_container")[0];
console.log(modal);
function closeModal() {
    modal.style.display = "none";
    deleteAlert.style.display = "none";
}

function openModal(status) {
    document.getElementById("password").type = "password";
    document.getElementById("password_txt").style.display = "block";
    modal.style.display = "block";
    if (status == 'dosen') {
        document.getElementById('modal_form').setAttribute('action', '/cms/dosen/adddosen')
        console.log(document.getElementById('modal_form').getAttribute('action'));
        document.getElementById("id").value = '';
        document.getElementById("nama").value = '';
        document.getElementById("nomorInduk").value = '';
        document.getElementById("notelp").value = '';
        document.getElementById("alamat_dosen").value = '';
        document.getElementById("password").value = '';
    } else if (status == 'mahasiswa') {
        document.getElementById('modal_form').setAttribute('action', '/cms/mahasiswa/addmahasiswa')
        console.log(document.getElementById('modal_form').getAttribute('action'));
        document.getElementById("id").value = '';
        document.getElementById("nama").value = '';
        document.getElementById("angkatan").value = 'Pilih Angkatan';
        document.getElementById("notelp").value = '';
        document.getElementById("alamat").value = '';
        document.getElementById("password").value = '';
    }
}

function showEditAlert(classname, index, status) {
    modal.style.display = "block";
    let dosen = JSON.parse(document.getElementsByClassName(classname)[index].value);
    document.getElementById("password").type = "hidden";
    document.getElementById("password_txt").style.display = "none";
    // document.getElementById('password_area').setAttribute('type', 'hidden')
    if (status == 'dosen'){
        document.getElementById('modal_form').setAttribute('action', '/cms/dosen/editdosen')
        console.log(document.getElementById('modal_form').getAttribute('action'));
        document.getElementById("id").value = dosen['id'];
        document.getElementById("nama").value = dosen['name'];
        document.getElementById("nomorInduk").value = dosen['noInduk'];
        document.getElementById("notelp").value = dosen['notelp'];
        document.getElementById("alamat_dosen").value = dosen['alamat'];
    }
}

function showDeleteAlert(classname, index) {
    document.getElementById("id_delete").value = document.getElementsByClassName(classname)[index].value;
    deleteAlert.style.display = "block";
}
