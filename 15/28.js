navigator.serviceWorker.getRegistration()
.then(function(reg) {
  reg.pushManager.subscribe({
    userVisibleOnly: true
  }).then(function(sub) {
    // send sub.toJSON() to server
  });
});
