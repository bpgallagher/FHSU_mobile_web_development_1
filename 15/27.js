navigator.serviceWorker.ready.then(function(reg) {
	reg.pushManager.getSubscription().then(function(sub) {
		if (sub == undefined) {
			// ask user to register for Push
		} else {
			// You have subscription, update the database on your server
		}
	});
});
