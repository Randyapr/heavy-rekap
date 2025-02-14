function confirmDelete(id, name, route) {
    document.getElementById('deleteItemName').textContent = name;
    document.getElementById('deleteForm').action = route;
} 