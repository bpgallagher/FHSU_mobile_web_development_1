self.addEventListener('push', function(e) {
  var title = e.data.text();
  e.waitUntil(
    self.registration.showNotification(title)
  );
});
