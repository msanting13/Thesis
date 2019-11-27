$(document).ready(function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });   

$('#openSchoolYear').submit(function(e){
e.preventDefault();
let pwd = $('#adminPassword').val();

// $.ajax({
// url:'/admin/settings/school-year/store',
// type:"POST",
// dataType:"json",
// data:$(this).serialize(),
// success:function(data){
//    if (data.success == true) {
//         $('#editAdmissionResult')[0].reset();
//    }
// }
// });
});


}); 