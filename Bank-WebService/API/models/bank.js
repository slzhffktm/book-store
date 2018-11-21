var mysql = require('mysql');

var con = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: "bank"
});

con.connect(function(err){
  if(err){
    console.log('Error connecting to Db');
    return;
  }
  console.log('Database connected');
});

var Bank = function(){};

Bank.validateCard = function(cardId, result) {
  con.query("SELECT * FROM nasabah WHERE nomor_kartu = ?", cardId, function(err, res) {
    if(err) {
      console.log("error: ", err);
      result(err, null);
    }
    else{
      console.log(res);
      result(null, res);
    }
  });
};

Bank.getBalanceByCardNumber = function(cardId, result) {
  con.query("SELECT saldo FROM nasabah WHERE nomor_kartu = ?", cardId, function(err, res) {
    if(err) {
      console.log("error: ", err);
      result(err, null);
    }
    else{
      console.log(res);
      result(null, res);
    }
  });
}

Bank.substractBalanceByCardNumber = function(deltaSaldo, cardId, result) {
  con.query("UPDATE nasabah SET saldo = saldo - ? WHERE nomor_kartu = ?", [deltaSaldo, cardId], function(err, res) {
    if(err) {
      console.log("error: ", err);
      result(err, null);
    }
    else{
      console.log(res);
      result(null, res);
    }
  });
}

Bank.addBalanceByCardNumber = function(deltaSaldo, cardId, result) {
  con.query("UPDATE nasabah SET saldo = saldo + ? WHERE nomor_kartu = ?", [deltaSaldo, cardId], function(err, res) {
    if(err) {
      console.log("error: ", err);
      result(err, null);
    }
    else{
      console.log(res);
      result(null, res);
    }
  });
}

Bank.createTransaction = function(senderCardNumber, recCardNumber, deltaSaldo, result) {
  con.query("INSERT INTO transaksi (nomor_pengirim, nomor_penerima, jumlah) VALUES (?, ?, ?)", [senderCardNumber, recCardNumber, deltaSaldo], function(err, res) {
    if(err) {
      console.log("error: ", err);
      result(err, null);
    }
    else{
      console.log(res);
      result(null, res);
    }
  });
}

// function select(query, callback) 
// {
//     con.query(query,function(err,rows){
//         if(err) throw err;
//         return callback(rows);
//     });
// }

// function insert(query, callback)
// {
//   con.query(query,function(err,rows){
//     if(err) throw err;
//     return callback(rows);
//   });
// }

module.exports = Bank;