$(document).ready(function () {
  $('button[data-type="list_delete_item"]').click(function () {
    listDelete(this);
    return false;
  });
});

function listDelete(object) {
  let ids_delete = [];
  $('input:checkbox:checked').each(function () {
    ids_delete.push($(this).data('id'));
  });
  if (ids_delete.length <= 0) {
    alert("Выберете объекты для удаления.");
    return false;
  }
  let check = confirm("Вы уверены?");
  if (check === false) {
    return false;
  }
  let form_data = new FormData();
  form_data.append('ids_delete', ids_delete.join(","));
  postAjax($(object).data('href'), form_data, null, function () {
    $('input:checkbox:checked').each(function () {
      $(this).closest('tr').remove();
    });
    Message.showMessageSuccessBtn('Объекты успешно удалены!');
  });
}