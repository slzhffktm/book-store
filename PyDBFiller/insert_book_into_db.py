import requests
from mysql import open_database


def search_books(search_query):
    google_book_url = "https://www.googleapis.com/books/v1/volumes"
    param = {
        "key": "AIzaSyArcL_wLDUdT3I8ryhyYvWRGc-yo5WlwAk",
        "maxResults": 40,
        "q": None,
    }

    search_result = []
    for query in search_query:

        param['q'] = query
        req = requests.get(google_book_url, params=param)
        print("Made request to {}".format(req.url))

        req_json = req.json()
        for book in req_json['items']:

            book_id = book['id']
            book_title = book['volumeInfo']['title']
            book_saleability = book['saleInfo']['saleability']

            if book_saleability == "FOR_SALE":
                book_price_currency = book['saleInfo']['listPrice']['currencyCode']
                book_price = book['saleInfo']['listPrice']['amount']
                book_price = '{:,.2f} {}'.format(book_price, book_price_currency)

            elif book_saleability == "NOT_FOR_SALE":
                book_price = "Not available"
            elif book_saleability == "FREE":
                book_price = "Free"
            else:
                book_price = book_saleability

            search_result.append((book_id, book_title, book_price))

    return search_result


def insert_into_db(db, search_result):
    insert_query = """
        INSERT INTO bookprices (Id, Title, Price)
        VALUES ("{0}", "{1}", "{2}")
        """

    skipped = 0

    for book in search_result:
        try:
            try:
                query = insert_query.format(book[0], book[1], book[2])
                print(query)
                db.query(query)
            except:
                query = insert_query.format(book[0], book[1].encode('utf-8'), book[2])
                print(">>>>", query)
                db.query(query)
        except:
            skipped += 1

    print("Insert success, {} skipped".format(skipped))
    db.commit()


if __name__ == "__main__":
    search_query = [
        "Clean code",
        "みんなの日本語",
        "A LADDER TO THE SKY",
        "THE LIFE AND DEATH",
        "ALL THE LIVES WE NEVER LIVED",
        "Educated: A Memoir",
        "The Great Alone",
        "The Feather Thief",
        "The Woman in the Window",
        "Girls Burn Brighter",
        "The Line Becomes A River: Dispatches from the Border",
        "The Electric Woman: A Memoir",
        "Children of Blood and Bone",
        "The Immportalists",
        "There There",
        "Harry Potter",
        "Lord of the rings",
        "Fantastic beast",
        "Silberschatz",
        "Those Who Knew",
        "Nine Perfect Strangers",
        "The Kinship of Secrets",
        "Becoming",
        "Insurrecto",
        "My Sister, The Serial Killer",
        "The Reckonings ",
        "All You Can Ever Know",
        "The Witch Elm",
        "Grand Blue",
        "Made in Abyss",
        "One Punch-Man",
        "Natsume Yuujinchou",
        "Haikyuu!!",
        "Shigatsu wa Kimi no Uso",
        "Do Androids Dream of Electric Sheep?",
        "Galaxy",
        "Me and you",
        "Houses",
        "Photography",
        "Sociology",
        "Motivate",
        "Elevate",
        "Journey",
        "Sky walker",
        "Chicken soup",
        "Money power",
        "Wicked and the Witch",
        "Folklore",
        "Disney",
        "Beauty and the Beast",
        "Nut Cracker",
        "Sherlock Holmes",
        "Trilogy",
        "Murder",
        "Hunger Games",
        "Midnight",
        "Phantom",
        "Star",
        "Alice",
        "Asian"
    ]
    search_result = search_books(search_query)

    db = open_database("book")
    insert_into_db(db, search_result)

    db.close()
