/*
| Definition javascript for theme SAP PBB
| Build by @gilangtetsuya
*/
if (typeof jQuery === 'undefined') {
    throw new Error("Definisi element memerlukan jQuery!");
}
/*
| Autotab form permohonan 
*/
function autotab(original,destination) {
    original.value = original.value.replace(/[^\d]/g,'');
    if (original.getAttribute&&original.value.length==original.getAttribute('maxlength'))
        destination.focus();
}
/**
 * General definitions
 */
/*
| Validasi form
*/
+ function ($) {
'use strict';
   
   const btnPelayanan = $('._subPer');
   const statKol = $('._statKol');
   const jnsPelayanan = $('._jnsPelayanan');

   btnPelayanan.on('click', function () {
       if (statKol.val() == '') {
          alert("Status kolektif harus di isi!");
          statKol.focus();
          return false;
       }   
       if (jnsPelayanan.val() == "")  {
          alert("Pilih jenis pelayanan permohonan!");
          jnsPelayanan.focus();
          return false;
       } 
   });

   $('._regis').on('click', function() {
        $('.msg-tmp').empty();
        if ($('.user').val() == "") {
            $('.msg-tmp').append('<div class="alert alert-warning">' + "Username harus di isi!" + "</div>");
            $('.user').focus();
            return false;
        }
        if ($('.nip').val() == "") {
            $('.msg-tmp').append('<div class="alert alert-warning">' + "NIP harus di isi!" + "</div>");
            $('.nip').focus();
            return false;
        }
        if ($('.pass').val() != $('.pconf').val()) {
            $('.msg-tmp').append('<div class="alert alert-warning">' + "Masukkan password yang benar!" + "</div>");
            $('.pass').focus();
            return false;
        }
        if ($('.level').val() == "") {
            $('.msg-tmp').append('<div class="alert alert-warning">' + "User level harus di isi!" + "</div>");
            $('.level').focus();
            return false;
        } else {
            $.ajax({
                type: "POST",
                url: "../app/lib-ajax/_addDataUsers.php",
                data: { user: $('.user').val(), pass: $('.pass').val(), nip: $('.nip').val(), level: $('.level').val(), status: $('.status').val() },
                success: function(data) {
                    $('.msg-tmp').append( data );
                    $('.user').val("");
                    $('.pass').val("");
                    $('.pconf').val("");
                    $('.nip').val("");
                    $('.level').val("");
                }
            });
            return false;
        }
   });

   $('._res').on('click', function() {
        $('.msg-tmp').empty(); 
   });

}(jQuery);
// sidemenu toggle 
+ function ($) {
'use strict';

  var btnToggle    = document.querySelectorAll('#menu-toggle'); 
  var toggleMobile = '.toggle-visible';
  var sidenav      = $('.sidenav');  
  var sidenavEl    = $('.sidenav__container');

  const sidenavElCon = document.querySelector('.sidenav__container');
  const detabinator  = new Detabinator(sidenavElCon);
  detabinator.inert = true;
  
  var height = document.querySelector('body').scrollHeight;

  $('.sidenav').css('height', height);

  $('body').resize(function () {
       $('.sidenav').css('height', height); 
  });

  $(window).scroll(function() {
      if ($(window).scrollTop() + $(window).height() > $(document).height() - 100) {
            var h = document.querySelector('body').scrollHeight;
            $('.sidenav').css('height', h);
      }    
  });

  $('.sidenav > .navbar-brand').removeAttr('tabindex');

  $.each(btnToggle, function(e, btn) {
       $(btn).on('click', function() {
           $(this).next().slideToggle(300);  
       });  
  });

  $(document).on('click', toggleMobile,function () {
       sidenavEl.addClass('sidenav--visible');
       detabinator.inert = false;
  });

  sidenav.on('click', function (e) {
      e.stopPropagation();
  });
  
  $('.js-sidenav').on('click', function () {
       $(this).removeClass('sidenav--visible');
  });
 
}(jQuery);  
// datatable definition
+ function ($) {
  "use strict";
  
  var tableEl = $('table');
  var zona = $('.zona').val();
  var tahun = $('.tahun').val();
  
  // get data lampiran dokumen
  $(document).on('click', '#dokumen', function () {
        var noPelayanan = $(this).attr('data-id');
        $.ajax({
           type: "GET",
           url: "../app/lib-ajax/_getDataLampiran.php",
           data: { no_pelayanan: noPelayanan },
           dataType: "JSON",
           success: function (res) {
              $.each(res, function (e, data) {
                  $('.js-lampiran').append('<li>' + data + '</li>');  
              });              
           } 
        });  
  });

  $('.modal-header .close').on('click', function() {
       $('.js-lampiran').empty(); 
  });

   $('.modal').on('click', function() {
       $('.js-lampiran').empty(); 
  });

  if (tableEl.hasClass('tableHome')) {
       var table1 = $('.table_1').DataTable({
                 responsive: true,
                 "processing": true,
                 "serverside": true,
                 "ajax": "../app/lib-ajax/_getDataBerkasByTglSelesai.php?zona=1"
       });
       var table2 = $('.table_2').DataTable({
                 responsive: true,
                 "processing": true,
                 "serverside": true,
                 "ajax": "../app/lib-ajax/_getDataBerkasByTglSelesai.php?zona=2"
       });
       var table3 = $('.table_3').DataTable({
                 responsive: true,
                 "processing": true,
                 "serverside": true,
                 "ajax": "../app/lib-ajax/_getDataBerkasByTglSelesai.php?zona=3"
       });
       var table4 = $('.table_4').DataTable({
                 responsive: true,
                 "processing": true,
                 "serverside": true,
                 "ajax": "../app/lib-ajax/_getDataBerkasByTglSelesai.php?zona=4"
       });
       new $.fn.dataTable.FixedHeader( table1, table2, table3, table4 );
  }

  if (tableEl.hasClass('dataTables_1')) {
       var dataTables = $('.dataTables_1').DataTable({
             responsive: true,
             "processing": true,
             "serverside": true,
             "ajax": `../app/lib-ajax/_getDataBerkas.php?zona=${zona}&tahun=${tahun}`
       });
       new $.fn.dataTable.FixedHeader( dataTables );
  }
  
}(jQuery);
// definition datepicker 
+ function ($) {
'use strict';
  
  var date  = [
      '#date-1',
      '#date-2',
      '#date-3' 
  ];

  var output = date.join(",");

  $(output).datepicker({
      dateFormat: "dd-mm-yyyy",
      language: "en"
  });

}(jQuery);
// search from method 
+ function ($) {
'use strict';

  const method  = $('#method');
  const formId = [
      '#input-1',
      '#input-2',
      '#input-3',
      '#input-4'
  ];
  const inputId1 = [
       '#tahun',
       '#bundel',
       '#urut'  
  ];
  const inputId2 = [
       '#prov',
       '#dati2',
       '#kec',
       '#kel',
       '#blok',
       '#no_urut',
       '#jns_op'  
  ];
  const inputId3 = '#pemohon';
  const inputId4 = [
        '#date-1',
        '#date-2'
  ];

  method.change(changeMethod);

  function changeMethod () {
     if (method.val() == '1') {
        $(formId[0]).fadeIn(300, function () {
            $(this).removeClass('none');
        });    
        $(inputId1.join(", ")).removeAttr('disabled');  
     } else {
        $(formId[0]).fadeOut(300, function () {
            $(this).addClass('none');
        });    
        $(inputId1.join(", ")).attr('disabled', '');
     }
     if (method.val() == '2') {
        $(formId[1]).fadeIn(300, function () {
            $(this).removeClass('none');
        });    
        $(inputId2.join(", ")).removeAttr('disabled');  
     } else {
        $(formId[1]).fadeOut(300, function () {
            $(this).addClass('none');
        });    
        $(inputId2.join(", ")).attr('disabled', '');
     }
     if (method.val() == '3') {
        $(formId[2]).fadeIn(300, function () {
            $(this).removeClass('none');
        });    
        $(inputId3).removeAttr('disabled');  
     } else {
        $(formId[2]).fadeOut(300, function () {
            $(this).addClass('none');
        });    
        $(inputId3).attr('disabled', '');
     }
     if (method.val() == '4') {
        $(formId[3]).fadeIn(300, function () {
            $(this).removeClass('none');
        });    
        $(inputId4.join(", ")).removeAttr('disabled');  
     } else {
        $(formId[3]).fadeOut(300, function () {
            $(this).addClass('none');
        });    
        $(inputId4.join(", ")).attr('disabled', '');
     }
  }

}(jQuery);