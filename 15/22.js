self.addEventListener('notificationclick', function(event) {
  var notification = event.notification;
  var action = event.action;
  if (action === 'close') {
    notification.close();
  } else {
    clients.openWindow('http://www.example.com');
  }
});
	