function base_url() {
	var pathparts = window.location.pathname.split('/');
	if (location.host == 'localhost') {
		return window.location.origin + '/' + pathparts[1].trim('/') + '/';
	} else {
		return window.location.origin + '/';
	}
}

// const flashData = $('.flash-data').data('flashdata');

// if (flashData) {
// 	Swal.fire({
// 		title: 'Pendaftaran ',
// 		text: 'Berhasil ' + flashData,
// 		type: 'success'
// 	});
// }

// if (flashData) {
//     Swal.fire({
//         title: 'Berhasil ',
//         text: 'Berhasil ' + flashData,
//         type: 'success'
//     }, function(){
//         window.location.assign('https://arkalearn.com/login/index.php')
//     });
// }

$(document).on('keyup', 'input', function () {
	$(this).removeClass('is-invalid');
	$(this).next().empty();
});

$(document).on('change', 'select', function () {
	$(this).removeClass('is-invalid');
});

$(document).on('change', 'textarea', function () {
	$(this).removeClass('is-invalid');
	$(this).next().empty();
});

// $(document).on('submit', '#formDaftar', function (e) {
//     e.preventDefault();
//     $.ajax({
//         url: base_url() + 'register/create',
//         method: 'POST',
//         data: $('#formDaftar').serialize(),
//         dataType: 'json',
//         success: function (data) {
//             console.log(data)
//             if(data.status == 'failed'){
//                 $.each(data.errors.messages, function (key, value) {
//                     let element = $('#' + key);
//                     element.closest('.form-control')
// 						.removeClass('is-invalid')
// 						.addClass(value.length > 0 ? 'is-invalid' : '')
// 						.find('.help-block')
// 						.remove();
// 					element.after(value);
//                 });
//             }
// 		},
// 		error: function (jqXHR, textStatus, errorThrown) {
// 			alert('ajax error');
// 		}
//     });
// });

$(".lembaga").hide();
$("#perseorangan_lembaga").change(function (){
    if($(this).val() == "Lembaga"){
        $('.lembaga').show();
    }else{
        $('.lembaga').hide();
    }
});

$(document).ready(function(){
    $("#provinsi").change(function (){
        $.ajax({
            url: base_url() + 'register/readKota/' + $(this).val(),
            method: 'GET',
            success: function (data) {
                $('#kota').prop("disabled", false);
                $("#kota").html(data);
            }
        })
    });

    $("#provinsi_lembaga").change(function (){
        $.ajax({
            url: base_url() + 'register/readKota/' + $(this).val(),
            method: 'GET',
            success: function (data) {
                $('#kota_lembaga').prop("disabled", false);
                $("#kota_lembaga").html(data);
            }
        })
    });

    $("#kota").change(function (){
        $.ajax({
            url: base_url() + 'register/readKecamatan/' + $(this).val(),
            method: 'GET',
            success: function (data) {
                $('#kecamatan').prop("disabled", false);
                $("#kecamatan").html(data);
            }
        })
    });

    $("#kota_lembaga").change(function (){
        $.ajax({
            url: base_url() + 'register/readKecamatan/' + $(this).val(),
            method: 'GET',
            success: function (data) {
                $('#kecamatan_lembaga').prop("disabled", false);
                $("#kecamatan_lembaga").html(data);
            }
        })
    });

    $("#kecamatan").change(function (){
        $.ajax({
            url: base_url() + 'register/readDesa/' + $(this).val(),
            method: 'GET',
            success: function (data) {
                $('#desa').prop("disabled", false);
                $("#desa").html(data);
            }
        })
    });

    $("#kecamatan_lembaga").change(function (){
        $.ajax({
            url: base_url() + 'register/readDesa/' + $(this).val(),
            method: 'GET',
            success: function (data) {
                $('#desa_lembaga').prop("disabled", false);
                $("#desa_lembaga").html(data);
            }
        })
    });
});

$('.select2').select2();
$('.select2bs4').select2({
	theme: 'bootstrap4',
});