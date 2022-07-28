//melakukan live search
// const tombolCari = document.querySelector('.tombol-cari');
// const keyword = document.querySelector('.keyword');
// const container = document.querySelector(".daftar");


//menghilangkan tombol cari
// tombolCari.style.display = 'none';
// event ketika menulis keyword
// keyword.addEventListener('keyup', function(){
    // ajax
    //xmlhttprequest
    // const xhr = new XMLHttpRequest();

    // xhr.onreadystatechange = function () {
    //     if (xhr.readyState == 4 && xhr.status == 200) {
    //         // console.log(xhr.responseText);
    //         container.innerHTML = xhr.responseText;
    //     }

    // };
    //eksekusi ajax
    // xhr.open('get', 'ajax/ajax_cari.php?keyword=' + keyword.value);
    // xhr.send();

    // memkaia fetch
//     fetch('ajax/ajax_cari.php?keyword=' + keyword.value)
//         .then((response) => response.text())
//         .then((response) => (container.innerHTML = response));
// });  


//Melakukan live search dengan jquery
$(document).ready(function(){
    //menghilangkan tombol cari
    $('.tombol-cari').hide();
    //live search
    $('.keyword').on('keyup', function () {
        $('.daftar').load('ajax/ajax_cari.php?keyword=' + $('.keyword').val());
    });
});