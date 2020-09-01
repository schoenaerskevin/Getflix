//refresh chat div
function refreshTimer() {
    new Ajax.PeriodicalUpdater('chatBox', '/chat.php', {
       method: 'post', frequency: 3, decay: 2
    });
 }