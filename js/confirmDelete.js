function NoteDeleteConfirm(noteId, title) {
    event.preventDefault();
    if (confirm("Czy na pewno chcesz usunąć wpis '" + title + "'") == true) {
        console.log("WCISNALES GIT");
        window.location.href = "../deleteNote.php?id=" + noteId;
    }
}
function UserDeleteConfirm(userId, login) {
    event.preventDefault();
    if(confirm("Czy na pewno chcesz usunąć użytkownika '" + login+ "'" ) == true) {
        window.location.href = "deleteUser.php?id=" + userId;
    }
}