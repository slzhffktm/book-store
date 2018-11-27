package BookCatalogueWebService;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import javax.jws.WebService;
import javax.jws.soap.SOAPBinding;
import javax.xml.ws.Endpoint;

@WebService()
@SOAPBinding()
public class BookCatalogueImpl implements BookCatalogue {

    private GoogleBookAPI googleBookAPI = new GoogleBookAPI();
    private GoogleBookResultHandler resultHandler = new GoogleBookResultHandler();

    public String searchBook(String title) throws Exception{
        String result = googleBookAPI.searchBook(title);
        return resultHandler.parseSearch(result);
    }

    public String getBookDetail(String bookId) throws Exception{
        String result = googleBookAPI.getBookDetail(bookId);

        return resultHandler.parseBookDetail(result);
    }

    public boolean buyBook(String id, String cardId, int total) throws  Exception {
        System.out.println("buybook");
        String result =  getBookDetail(id);
        System.out.println(result);
        JSONObject jsonResult = new JSONObject(result);
        String[] genre = jsonResult.getString("Category").replaceAll(" ","").split("/");
        float cost = BuyBook.getCost(id) * total;
        System.out.println("Cost: " + cost);
        boolean response = false    ;
        try{
            if (cost < 0){
                throw new Exception();
            }
            String postResponse = BuyBook.sendPost(cardId, cost);
            JSONObject res = new JSONObject(postResponse);
            if(! res.getBoolean("err")){
                System.out.println("UPDATE");
                response = BuyBook.upsert(id, genre, total);
            }else{
                response = false;
            }
        } catch (Exception e){

        }

        return response;
    }

    public String getRecommendation(String[] genres) throws Exception{
        String result = Recommendation.get(genres);
        String bookDetail = "";
        if (result == "[]") {
            // TODO: add function from ayrton
        } else {
            JSONArray jsonArray;
            JSONObject jsonObject;
            String bookID = "";
            try {
                jsonArray = new JSONArray(result);
                jsonObject = jsonArray.getJSONObject(0);
                bookID = jsonObject.getString("book_id");
            } catch (JSONException e) {
                System.out.println(e);
            }

            bookDetail = getBookDetail(bookID);
        }

        return bookDetail;
    }

    // Publisher part
    public static void main(String[] argv) {
        Object implementor = new BookCatalogueImpl();
        String address = "http://localhost:9000/BookCatalogueWebService";
        Endpoint.publish(address, implementor);

        System.out.println("Service is up !");
    }
}
