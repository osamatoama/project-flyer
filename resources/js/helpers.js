export default {
	proccesRoute(name, params)  {
		let route = '';
		for(var i in params) {
			route += window.routes[name].replace('{' + i + '}', params[i]);
		}
		return route;
	}
}
