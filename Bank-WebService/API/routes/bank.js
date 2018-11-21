'use strict';
module.exports = function(app) {
  var bankController = require('../controllers/bank');

  // bank_controller Routes
  app.route('/validateCard/:cardId')
    .get(bankController.validate_card);
  app.route('/transfer')
    .post(bankController.transfer);

};