import MySQLdb

query_create_table = """
    CREATE TABLE BookPrices (
        Id  VARCHAR(50) NOT NULL PRIMARY KEY ,
        Title VARCHAR(250),
        Price VARCHAR(50))
"""

delete_all_query = """
DELETE FROM bookprices WHERE Id != NULL
"""

show_all = """ SELECT * FROM bookprices"""


def open_database(database):
    db = MySQLdb.connect("localhost", "root", "", database)
    return db
