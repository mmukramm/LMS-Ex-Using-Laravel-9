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
    let item = JSON.parse(document.getElementsByClassName(classname)[index].value);
    console.log(item);
    document.getElementById("password").type = "hidden";
    document.getElementById("password_txt").style.display = "none";
    if (status == 'dosen'){
        document.getElementById('modal_form').setAttribute('action', '/cms/dosen/editdosen')
        console.log(document.getElementById('modal_form').getAttribute('action'));
        document.getElementById("id").value = item['id'];
        document.getElementById("nama").value = item['name'];
        document.getElementById("nomorInduk").value = item['noInduk'];
        document.getElementById("notelp").value = item['notelp'];
        document.getElementById("alamat_dosen").value = item['alamat'];
    } else if (status == 'mahasiswa') {
        document.getElementById('modal_form').setAttribute('action', '/cms/mahasiswa/editmahasiswa')
        console.log(document.getElementById('modal_form').getAttribute('action'));
        document.getElementById("id").value = item['id'];
        document.getElementById("nama").value = item['name'];
        var noAngkatan = '20' + (item['noInduk'].substring(4, 6));
        document.getElementById("angkatan").value = noAngkatan;
        console.log(noAngkatan);
        document.getElementById("notelp").value = item['notelp'];
        document.getElementById("alamat").value = item['alamat'];
    }
}

function showDeleteAlert(classname, index) {
    document.getElementById("id_delete").value = document.getElementsByClassName(classname)[index].value;
    deleteAlert.style.display = "block";
}
