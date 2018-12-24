let routes = { 
    'passport.authorizations.authorize': 'http://projectflyer.test/oauth/authorize', 
    'passport.authorizations.approve': 'http://projectflyer.test/oauth/authorize', 
    'passport.authorizations.deny': 'http://projectflyer.test/oauth/authorize', 
    'passport.token': 'http://projectflyer.test/oauth/token', 
    'passport.tokens.index': 'http://projectflyer.test/oauth/tokens', 
    'passport.tokens.destroy': 'http://projectflyer.test/oauth/tokens/{token_id}', 
    'passport.token.refresh': 'http://projectflyer.test/oauth/token/refresh', 
    'passport.clients.index': 'http://projectflyer.test/oauth/clients', 
    'passport.clients.store': 'http://projectflyer.test/oauth/clients', 
    'passport.clients.update': 'http://projectflyer.test/oauth/clients/{client_id}', 
    'passport.clients.destroy': 'http://projectflyer.test/oauth/clients/{client_id}', 
    'passport.scopes.index': 'http://projectflyer.test/oauth/scopes', 
    'passport.personal.tokens.index': 'http://projectflyer.test/oauth/personal-access-tokens', 
    'passport.personal.tokens.store': 'http://projectflyer.test/oauth/personal-access-tokens', 
    'passport.personal.tokens.destroy': 'http://projectflyer.test/oauth/personal-access-tokens/{token_id}', 
    'flyers.index': 'http://projectflyer.test/flyers', 
    'flyers.create': 'http://projectflyer.test/flyers/create', 
    'flyers.store': 'http://projectflyer.test/flyers', 
    'flyers.edit': 'http://projectflyer.test/flyers/{flyer}/edit', 
    'flyers.update': 'http://projectflyer.test/flyers/{flyer}', 
    'flyers.destroy': 'http://projectflyer.test/flyers/{flyer}', 
    'flyers.show': 'http://projectflyer.test/flyers/{zip}/{street}', 
    'flyers.add_photo': 'http://projectflyer.test/flyers/{flyer}/photos', 
    'login': 'http://projectflyer.test/login', 
    'logout': 'http://projectflyer.test/logout', 
    'register': 'http://projectflyer.test/register', 
    'password.request': 'http://projectflyer.test/password/reset', 
    'password.email': 'http://projectflyer.test/password/email', 
    'password.reset': 'http://projectflyer.test/password/reset/{token}', 
    'password.update': 'http://projectflyer.test/password/reset', 
    'home': 'http://projectflyer.test/home', 

 }; 
 export default routes