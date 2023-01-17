$(document).ready(()=>{
  $('#receiver').on('change', function() {
    const data = JSON.parse($(this).val());
    $('#receiver_id').val(data['id']);
    $('#currency').val(data['accounts'][0]['currency']);
  });

});