$(document).ready(()=>{
    var path = "autocomplete";

     $('#receiver').typeahead({
            source:  (query, process) => {
                return $.get(path, {
                    query: query
                }, (data) => {
                    $('#receiver_id').val(data['id']);
                    $('#currency').val(data['currency']);
                    return process(data['name']);
                });
            }
        });

});