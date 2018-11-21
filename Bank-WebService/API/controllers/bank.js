
var Bank = require('../models/bank');

// exports.validate_card = function(req, res) {
//     mysql.select("SELECT * FROM nasabah WHERE nomor_kartu=" + req.query.card, function(rows) {
//         if (rows.length == 0) {
//             res.json("True")
//         } else {
//             res.json("False")
//         }
//     });
// };

exports.validate_card = function(req, res) {
    Bank.validateCard(req.params.cardId, function(err, nasabah) {
        if (err) {
            res.send(err);
        } else {
            if (nasabah.length == 0) {
                res.json("False");
            } else {
                res.json("True");
            }
        }
    });
};

exports.transfer = function(req, res) {
    console.log(req.body.nomor_pengirim);
    Bank.getBalanceByCardNumber(req.body["nomor_pengirim"], function(err, saldo) {
        if (err) {
            res.send(err);
        } else {
            if (saldo < req.body["jumlah"]) {
                res.json({message: "Saldo tidak mencukupi."});
            } else {
                Bank.substractBalanceByCardNumber(req.body["jumlah"], req.body["nomor_pengirim"], function(err, nasabah) {
                    if (err) {
                        res.send(err);
                    }
                });
                Bank.addBalanceByCardNumber(req.body["jumlah"], req.body["nomor_penerima"], function(err, nasabah) {
                    if (err) {
                        res.send(err);
                    }
                });
                Bank.createTransaction(req.body["nomor_pengirim"], req.body["nomor_penerima"], req.body["jumlah"], function(err, transaksi) {
                    if (err) {
                        res.send(err);
                    } else {
                        res.json(transaksi);
                    }
                });
            }
        }
    });
};