@push('style')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
@endpush
@push('scrypt')
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<!-- Datatables -->
<script src="{{ asset('atlantis/assets/js/plugin/datatables/datatables.min.js') }}"></script>
<script>
    $('#{{ $tableName }}').DataTable();

    function deleteCompany(that) {
    //console.log(that);
    $.confirm({
        title: '{{ trans("general.delete") }}',
        content: '{{ trans("general.delete_confirmation") }}',
        type: 'red',
        typeAnimated: true,
        buttons: {
            delete: {

                text: '{{ trans("general.delete") }}',
                btnClass: 'btn-red',
                action: function() {
                    that.closest("form").submit()
                    return true;
                }
            },
            cancel: function () {
                //return false;
            },
        }
    });
    return false;
}
</script>
@endpush
