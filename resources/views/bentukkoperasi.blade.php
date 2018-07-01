<?php
/**
 * Created by PhpStorm.
 * User: sansob
 * Date: 01/07/18
 * Time: 15.00
 */
?>

@extends('voyager::master')


@section('content')

    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-lock"></i> Roles
        </h1>
        <a href="http://127.0.0.1:8000/admin/roles/create" class="btn btn-success btn-add-new">
            <i class="voyager-plus"></i> <span>Add New</span>
        </a>
        <a class="btn btn-danger" id="bulk_delete_btn"><i class="voyager-trash"></i> <span>Bulk Delete</span></a>


        <!-- /.modal -->

        <script>
            window.onload = function () {
                // Bulk delete selectors
                var $bulkDeleteBtn = $('#bulk_delete_btn');
                var $bulkDeleteModal = $('#bulk_delete_modal');
                var $bulkDeleteCount = $('#bulk_delete_count');
                var $bulkDeleteDisplayName = $('#bulk_delete_display_name');
                var $bulkDeleteInput = $('#bulk_delete_input');
                // Reposition modal to prevent z-index issues
                $bulkDeleteModal.appendTo('body');
                // Bulk delete listener
                $bulkDeleteBtn.click(function () {
                    var ids = [];
                    var $checkedBoxes = $('#dataTable input[type=checkbox]:checked').not('.select_all');
                    var count = $checkedBoxes.length;
                    if (count) {
                        // Reset input value
                        $bulkDeleteInput.val('');
                        // Deletion info
                        var displayName = count > 1 ? 'Roles' : 'Role';
                        displayName = displayName.toLowerCase();
                        $bulkDeleteCount.html(count);
                        $bulkDeleteDisplayName.html(displayName);
                        // Gather IDs
                        $.each($checkedBoxes, function () {
                            var value = $(this).val();
                            ids.push(value);
                        })
                        // Set input value
                        $bulkDeleteInput.val(ids);
                        // Show modal
                        $bulkDeleteModal.modal('show');
                    } else {
                        // No row selected
                        toastr.warning('You haven&#039;t selected anything to delete');
                    }
                });
            }
        </script>
    </div>

@endsection
