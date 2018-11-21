package BookCatalogueWebService;

import org.json.JSONArray;
import org.json.JSONObject;

public class GoogleBookResultHandler {

    public JSONObject parseSearch(String jsonString) throws Exception {

        JSONObject jsonResult = new JSONObject(jsonString);

        JSONArray foundBooks = jsonResult.getJSONArray("items");
        for (int i = 0; i < foundBooks.length(); i++) {

            JSONObject book = foundBooks.getJSONObject(i);
            System.out.println("ID : " + getBookId(book));
            System.out.println("URL : " + getBookUrl(book));
            System.out.println("Title : " + getBookTitle(book));
            System.out.println("SubTitle : " + getBookSubTitle(book));
            System.out.println("Author : " + getBookAuthor(book));
            System.out.println("Description : " + getBookDescription(book));
            System.out.println("Price : " + getBookPrice(book));
            System.out.println("Thumbnail : " + getBookThumbnail(book));
            System.out.println();
        }

        System.out.println(jsonResult);

        return jsonResult;
    }

    public JSONObject parseBookDetail(String jsonString) throws Exception {

        JSONObject jsonResult = new JSONObject(jsonString);

        System.out.println(jsonResult);
        return new JSONObject();
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
            authors = authors.replaceAll("(\\\"|\\]|\\[)", "");
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
            if (saleability.equals("FOR_SALE")) {

                JSONObject saleInfo = book.getJSONObject("saleInfo");
                JSONObject listPrice = saleInfo.getJSONObject("listPrice");
                Double price = listPrice.getDouble("amount");
                String currency = listPrice.getString("currencyCode");

                return price.toString() + " " + currency;
            } else {
                return saleability;
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
//    private String getBookSaleability(JSONObject book){
//        try{
//            JSONObject saleability = book.getJSONObject("saleInfo");
//            return saleability.getString("saleability");
//        } catch (Exception e){
//            return "Undefined";
//        }
//    }


}
