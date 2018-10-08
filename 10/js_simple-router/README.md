# Simplest jQuery router
Basic Javascript + jQuery router.

**Requires jQuery**

## Route management
### Adding a route
The router needs 3 items:
- key: the name of the route
- pattern: the regex pattern that matches the route
- action: the callback that handles the route

```javascript
hxRouter.addRoute({
	'key':'hello','pattern':/^hello$/,'action':function(){
        console.log('hello!!!!');
    }
});
```

### Adding a dynamic route (e.g., product ID)
Complex regex patterns and group capturing can be utilized to match IDs and slugs.

The function getGroups() can be utilized to retrieve the captured groups.

```javascript
hxRouter.addRoute({
	'key':'products','pattern':/^products\/(?<id>\d+)\/?$/,'action':function(){
		console.log(hxRouter.getGroups(this.pattern));
	}
});
```

### Using a route
1. Routes begin with #/

```html
<a href="#/products/2">Product with ID</a>
```

## Basic example
Create a link to a route
```html
<a href="#/hello">Hello</a>
```

2. Define a route in your code
```javascript
hxRouter.addRoute({
	'key':'hello','pattern':/^hello$/,'action':function(){
        console.log('hello!!!!');
    }
});
```

3. Load the route
Navigate to page or to page#/hello.
If the current window location has no hash, the router will redirect to the first available route. 

## Functions
To be completed