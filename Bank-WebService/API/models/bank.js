var mysql = require('mysql');

var con = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "1234",
  database: "bank"
});

con.connect(function(err){
  if(err){
    console.log('Error connecting to Db');
    return;
  }
  console.log('Database connected');
});

function select(query, callback) 
{
    con.query(query,function(err,rows){
        if(err) throw err;
        return callback(rows);
    });
}

module.exports =
{
    select: select
}



