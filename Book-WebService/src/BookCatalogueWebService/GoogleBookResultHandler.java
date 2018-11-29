package BookCatalogueWebService;

import org.json.JSONArray;
import org.json.JSONObject;
import java.util.Arrays;

import java.util.StringJoiner;

class GoogleBookResultHandler {

    String parseSearch(String jsonString) throws Exception {

        StringBuilder parsedResult = new StringBuilder();
        parsedResult.append("{\"Result\" :");

        StringJoiner resultList = new StringJoiner(",", "[", "]");

        JSONObject jsonResult = new JSONObject(jsonString);
        JSONArray foundBooks = jsonResult.getJSONArray("items");
        for (int i = 0; i < foundBooks.length(); i++) {

            JSONObject book = foundBooks.getJSONObject(i);
            StringJoiner parsedBook = new StringJoiner(",", "{", "}");

            parsedBook.add(("\"ID\" :\"" + getBookId(book) + '"'));
            parsedBook.add(("\"URL\" :\"" + getBookUrl(book) + '"'));
            parsedBook.add(("\"Title\" :\"" + escapeSpecialChar(getBookTitle(book)) + '"'));
            parsedBook.add(("\"SubTitle\" :\"" + escapeSpecialChar(getBookSubTitle(book)) + '"'));
            parsedBook.add(("\"Category\" :\"" + getBookCategory(book) + '"'));
            parsedBook.add(("\"Author\" :\"" + getBookAuthor(book) + '"'));
            parsedBook.add(("\"Description\" :\"" + escapeSpecialChar(getBookDescription(book)) + '"'));
            parsedBook.add(("\"Thumbnail\" :\"" + getBookThumbnail(book) + '"'));

            resultList.add(parsedBook.toString());
        }

        parsedResult.append(resultList.toString());
        parsedResult.append("}");

        return parsedResult.toString();
    }

    String parseBookDetail(String jsonString) throws Exception {

        JSONObject book = new JSONObject(jsonString);

        StringJoiner parsedBook = new StringJoiner(",", "{", "}");
        parsedBook.add(("\"ID\" :\"" + getBookId(book) + '"'));
        parsedBook.add(("\"URL\" :\"" + getBookUrl(book) + '"'));
        parsedBook.add(("\"Title\" :\"" + escapeSpecialChar(getBookTitle(book)) + '"'));
        parsedBook.add(("\"SubTitle\" :\"" + escapeSpecialChar(getBookSubTitle(book)) + '"'));
        parsedBook.add(("\"Category\" :\"" + getBookCategory(book) + '"'));
        parsedBook.add(("\"Author\" :\"" + getBookAuthor(book) + '"'));
        parsedBook.add(("\"Description\" :\"" + escapeSpecialChar(getBookDescription(book)) + '"'));
        parsedBook.add(("\"Thumbnail\" :\"" + getBookThumbnail(book) + '"'));

        return parsedBook.toString();
    }

    private String getBookId(JSONObject book) {
        try {
            return book.getString("id");
        } catch (Exception e) {
            return "Undefined";
        }
    }
    private String getBookUrl(JSONObject book) {
        try {
            return book.getString("selfLink");
        } catch (Exception e) {
            return "Undefined";
        }
    }

    private String getBookTitle(JSONObject book) {
        try {
            JSONObject details = book.getJSONObject("volumeInfo");
            return details.getString("title");

        } catch (Exception e) {
            return "Undefined";
        }
    }

    private String getBookSubTitle(JSONObject book) {
        try {
            JSONObject details = book.getJSONObject("volumeInfo");
            return details.getString("subtitle");

        } catch (Exception e) {
            return "Undefined";
        }
    }

    private String getBookAuthor(JSONObject book) {
        try {
            JSONObject details = book.getJSONObject("volumeInfo");
            JSONArray authorList = details.getJSONArray("authors");

            String authors = authorList.toString();
            authors = authors.replaceAll("(\"|]|\\[)", "");
            authors = authors.replaceAll("(,)", ", ");
            return authors;

        } catch (Exception e) {
            return "Undefined";
        }
    }

    private String getBookDescription(JSONObject book) {
        try {
            JSONObject details = book.getJSONObject("volumeInfo");
            return details.getString("description");

        } catch (Exception e) {
            return "Undefined";
        }
    }

    private String getBookCategory(JSONObject book){
        try {
            JSONObject details = book.getJSONObject("volumeInfo");
            JSONArray categoryList = details.getJSONArray("categories");
            String categories = categoryList.toString();
            categories = categories.replaceAll("(\"|]|\\[)", "");
            categories = categories.replaceAll("(,)", "/");

            return categories;

        } catch (Exception e) {
            return "Undefined";
        }
    }

    private String getBookThumbnail(JSONObject book) {
        try {
            JSONObject details = book.getJSONObject("volumeInfo");
            JSONObject images = details.getJSONObject("imageLinks");
            return images.getString("thumbnail");
        } catch (Exception e) {
            return "Undefined";
        }
    }

    private String getBookPrice(JSONObject book) {
        try {
            String saleability = getBookSaleability(book);

            switch (saleability) {
                case ("FOR_SALE"): {
                    JSONObject saleInfo = book.getJSONObject("saleInfo");
                    JSONObject listPrice = saleInfo.getJSONObject("listPrice");
                    Double price = listPrice.getDouble("amount");
                    String currency = listPrice.getString("currencyCode");

                    return String.format("%,.2f", price) + " " + currency;
                }
                case ("FREE"): {
                    return "Free";
                }
                case ("NOT_FOR_SALE"): {
                    return "Not available";
                }
                default: {
                    return saleability;
                }
            }
        } catch (Exception e) {
            return "Undefined";
        }
    }

    private String getBookSaleability(JSONObject book) {
        try {
            JSONObject saleInfo = book.getJSONObject("saleInfo");
            return saleInfo.getString("saleability");
        } catch (Exception e) {

            return "Undefined";
        }
    }

    private String escapeSpecialChar(String input) {
        String regex = "(\"|\\\\)";
        return input.replaceAll(regex, "\\\\$1");
    }

}
