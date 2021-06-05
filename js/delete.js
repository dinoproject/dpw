$(function() {
  $(document).on('click','.open-modal-delete',function(e) {
    e.preventDefault();
    $("#get-data-delete").modal("show");
    $.post('modal_delete.php', {id:$(this).attr('data-id')},
      function(html) {
        $(".modal-body-delete").html(html);
      });
  });
});