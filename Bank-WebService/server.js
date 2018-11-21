var express = require('express'),
app = express(),
port = process.env.PORT || 3000,
mysql = require('mysql'),
Task = require('./api/models/bank'), //created model loading here
bodyParser = require('body-parser');
  var routes = require('./api/routes/bank'); //importing route
  routes(app); //register the route
  app.listen(port);

console.log('todo list RESTful API server started on: ' + port);