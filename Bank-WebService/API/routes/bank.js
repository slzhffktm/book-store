'use strict';
module.exports = function(app) {
  var bank_controller = require('../controllers/bank');

  // bank_controller Routes
  app.route('/validateCard')
    .get(bank_controller.validate_card)


};