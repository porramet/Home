function openEditBuildingModal(id, name) {
    $('#editBuildingModal').modal('show');
    $('#editBuildingId').val(id);
    $('#editBuildingName').val(name);
}

function confirmDeleteBuilding(id) {
    if (confirm('Are you sure you want to delete this building?')) {
        $.ajax({
            url: '/rooms/' + id,
            type: 'DELETE',
            success: function(result) {
                location.reload();
            },
            error: function(err) {
                alert('Error deleting building: ' + err.responseText);
            }
        });
    }
}

