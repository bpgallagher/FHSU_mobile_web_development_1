self.addEventListener('notificationclose', function(event) {
  var notification = event.notification;
  var primaryKey = notification.data.primaryKey;
  console.log('Closed notification: ' + primaryKey);
});
