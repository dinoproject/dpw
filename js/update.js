$(function() {
  $(document).on('click','.open-modal-update',function(e) {
    e.preventDefault();
    $("#get-data-update").modal("show");
    $.post('modal_update.php', {id:$(this).attr('data-id')},
      function(html) {
        $(".modal-body-update").html(html);
      });
  });
});