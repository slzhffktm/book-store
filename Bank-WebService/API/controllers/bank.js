
var mysql = require('../models/bank');
exports.validate_card = function(req, res) {
    mysql.select("SELECT * FROM nasabah WHERE nomor_kartu=" + req.query.card, function(rows) {
        if (rows.length == 0) {
            res.json("no")
        } else {
            res.json("yes")
        }
    });
  };
  